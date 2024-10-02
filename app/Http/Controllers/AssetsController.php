<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\AssetsAddRequest;
use App\Http\Requests\AssetsEditRequest;
use App\Http\Requests\AssetsAddPageListRequest;
use App\Models\Assets;
use Illuminate\Http\Request;
use \PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AssetsListExport;
use Illuminate\Support\Facades\Validator;
use Exception;
class AssetsController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.assets.list";
		$query = Assets::query();
		$limit = $request->limit ?? 25;
		if($request->search){
			$search = trim($request->search);
			Assets::search($query, $search); // search table records
		}
		$query->join("brand", "assets.brandid", "=", "brand.id");
		$query->join("supplier", "assets.supplierid", "=", "supplier.id");
		$query->join("asset_type", "assets.typeid", "=", "asset_type.id");
		$orderby = $request->orderby ?? "assets.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		// if request format is for export example:- product/index?export=pdf
		if($this->getExportFormat()){
			return $this->ExportList($query); // export current query
		}
		$records = $query->paginate($limit, Assets::listFields());
		return $this->renderView($view, compact("records"));
	}
	

	/**
     * Import csv file data into a table 
     * @return data
     */
	function importdata(Request $request){
		$importSettings = config("upload.import");
		$maxFileSize = intval($importSettings["max_file_size"]) * 1000; //in kilobyte
		$validator = Validator::make($request->all(), 
			[
				"file" => "file|required|max:$maxFileSize|mimes:csv,txt",
			]
		);
		if ($validator->fails()) {
			return back()->withErrors($validator->errors());
		}
		$csvOptions = array(
			'fields' => '', //leave empty to use the first row as the columns
			'delimiter' => ',', 
			'quote' => '"'
		);
		$filePath = $request->file('file')->getRealPath();
		$modeldata = parse_csv_file($filePath, $csvOptions);
		Assets::insert($modeldata);
		return $this->redirect(url()->previous(), "Data imported successfully");
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = Assets::query();
		$query->join("brand", "assets.brandid", "=", "brand.id");
		$query->join("supplier", "assets.supplierid", "=", "supplier.id");
		$query->join("asset_type", "assets.typeid", "=", "asset_type.id");
		$record = $query->findOrFail($rec_id, Assets::viewFields());
		return $this->renderView("pages.assets.view", ["data" => $record]);
	}
	

	/**
     * Display Master Detail Pages
	 * @param string $rec_id //master record id
     * @return \Illuminate\View\View
     */
	function masterDetail($rec_id = null){
		return View("pages.assets.detail-pages", ["masterRecordId" => $rec_id]);
	}
	

	/**
     * Display form page
     * @return \Illuminate\View\View
     */
	function add(){
		return $this->renderView("pages.assets.add");
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function store(AssetsAddRequest $request){
		$modeldata = $this->normalizeFormData($request->validated());
		
		if( array_key_exists("picture", $modeldata) ){
			//move uploaded file from temp directory to destination directory
			$fileInfo = $this->moveUploadedFiles($modeldata['picture'], "picture");
			$modeldata['picture'] = $fileInfo['filepath'];
		}
		
		//save Assets record
		$record = Assets::create($modeldata);
		$rec_id = $record->id;
		return $this->redirect("assets", "Record added successfully");
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(AssetsEditRequest $request, $rec_id = null){
		$query = Assets::query();
		$record = $query->findOrFail($rec_id, Assets::editFields());
		if ($request->isMethod('post')) {
			$modeldata = $this->normalizeFormData($request->validated());
		
		if( array_key_exists("picture", $modeldata) ){
			//move uploaded file from temp directory to destination directory
			$fileInfo = $this->moveUploadedFiles($modeldata['picture'], "picture");
			$modeldata['picture'] = $fileInfo['filepath'];
		}
			$record->update($modeldata);
			return $this->redirect("assets", "Record updated successfully");
		}
		return $this->renderView("pages.assets.edit", ["data" => $record, "rec_id" => $rec_id]);
	}
	

	/**
     * Delete record from the database
	 * Support multi delete by separating record id by comma.
	 * @param  \Illuminate\Http\Request
	 * @param string $rec_id //can be separated by comma 
     * @return \Illuminate\Http\Response
     */
	function delete(Request $request, $rec_id = null){
		$arr_id = explode(",", $rec_id);
		$query = Assets::query();
		$query->whereIn("id", $arr_id);
		//to raise audit trail delete event, use Eloquent 'get' before delete
		$query->get()->each(function ($record, $key) {
			$record->delete();
		});
		$redirectUrl = $request->redirect ?? url()->previous();
		return $this->redirect($redirectUrl, "Record deleted successfully");
	}
	

	/**
     * Display form page
     * @return \Illuminate\View\View
     */
	function addpagelist(){
		return $this->renderView("pages.assets.addpagelist");
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function addpagelist_store(AssetsAddPageListRequest $request){
		$modeldata = $this->normalizeFormData($request->validated());
		
		if( array_key_exists("picture", $modeldata) ){
			//move uploaded file from temp directory to destination directory
			$fileInfo = $this->moveUploadedFiles($modeldata['picture'], "picture");
			$modeldata['picture'] = $fileInfo['filepath'];
		}
		
		//save Assets record
		$record = Assets::create($modeldata);
		$rec_id = $record->id;
		return $this->redirect("assets", "Record added successfully");
	}
	

	/**
     * Export table records to different format
	 * supported format:- PDF, CSV, EXCEL, HTML
	 * @param \Illuminate\Database\Eloquent\Model $query
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
	private function ExportList($query){
		ob_end_clean(); // clean any output to allow file download
		$filename = "ListAssetsReport-" . date_now();
		$format = $this->getExportFormat();
		if($format == "print"){
			$records = $query->get(Assets::exportListFields());
			return view("reports.assets-list", ["records" => $records]);
		}
		elseif($format == "pdf"){
			$records = $query->get(Assets::exportListFields());
			$pdf = PDF::loadView("reports.assets-list", ["records" => $records]);
			return $pdf->download("$filename.pdf");
		}
		elseif($format == "csv"){
			return Excel::download(new AssetsListExport($query), "$filename.csv", \Maatwebsite\Excel\Excel::CSV);
		}
		elseif($format == "excel"){
			return Excel::download(new AssetsListExport($query), "$filename.xlsx", \Maatwebsite\Excel\Excel::XLSX);
		}
	}
}
