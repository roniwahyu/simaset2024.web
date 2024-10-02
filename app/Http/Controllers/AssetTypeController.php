<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\AssetTypeAddRequest;
use App\Http\Requests\AssetTypeEditRequest;
use App\Models\AssetType;
use Illuminate\Http\Request;
use \PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AssettypeListExport;
use App\Exports\AssettypeAssettypeaddlistExport;
use Illuminate\Support\Facades\Validator;
use Exception;
class AssetTypeController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.assettype.list";
		$query = AssetType::query();
		$limit = $request->limit ?? 25;
		if($request->search){
			$search = trim($request->search);
			AssetType::search($query, $search); // search table records
		}
		$orderby = $request->orderby ?? "asset_type.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		// if request format is for export example:- product/index?export=pdf
		if($this->getExportFormat()){
			return $this->ExportList($query); // export current query
		}
		$records = $query->paginate($limit, AssetType::listFields());
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
		AssetType::insert($modeldata);
		return $this->redirect(url()->previous(), "Data imported successfully");
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = AssetType::query();
		$record = $query->findOrFail($rec_id, AssetType::viewFields());
		return $this->renderView("pages.assettype.view", ["data" => $record]);
	}
	

	/**
     * Display form page
     * @return \Illuminate\View\View
     */
	function add(){
		return $this->renderView("pages.assettype.add");
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function store(AssetTypeAddRequest $request){
		$modeldata = $this->normalizeFormData($request->validated());
		
		//save AssetType record
		$record = AssetType::create($modeldata);
		$rec_id = $record->id;
		return $this->redirect("assettype", "Record added successfully");
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(AssetTypeEditRequest $request, $rec_id = null){
		$query = AssetType::query();
		$record = $query->findOrFail($rec_id, AssetType::editFields());
		if ($request->isMethod('post')) {
			$modeldata = $this->normalizeFormData($request->validated());
			$record->update($modeldata);
			return $this->redirect("assettype", "Record updated successfully");
		}
		return $this->renderView("pages.assettype.edit", ["data" => $record, "rec_id" => $rec_id]);
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
		$query = AssetType::query();
		$query->whereIn("id", $arr_id);
		//to raise audit trail delete event, use Eloquent 'get' before delete
		$query->get()->each(function ($record, $key) {
			$record->delete();
		});
		$redirectUrl = $request->redirect ?? url()->previous();
		return $this->redirect($redirectUrl, "Record deleted successfully");
	}
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function assettypeaddlist(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.assettype.assettypeaddlist";
		$query = AssetType::query();
		$limit = $request->limit ?? 25;
		if($request->search){
			$search = trim($request->search);
			AssetType::search($query, $search); // search table records
		}
		$orderby = $request->orderby ?? "asset_type.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		// if request format is for export example:- product/index?export=pdf
		if($this->getExportFormat()){
			return $this->ExportAssettypeaddlist($query); // export current query
		}
		$records = $query->paginate($limit, AssetType::assettypeaddlistFields());
		return $this->renderView($view, compact("records"));
	}
	

	/**
     * Export table records to different format
	 * supported format:- PDF, CSV, EXCEL, HTML
	 * @param \Illuminate\Database\Eloquent\Model $query
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
	private function ExportList($query){
		ob_end_clean(); // clean any output to allow file download
		$filename = "ListAssetTypeReport-" . date_now();
		$format = $this->getExportFormat();
		if($format == "print"){
			$records = $query->get(AssetType::exportListFields());
			return view("reports.assettype-list", ["records" => $records]);
		}
		elseif($format == "pdf"){
			$records = $query->get(AssetType::exportListFields());
			$pdf = PDF::loadView("reports.assettype-list", ["records" => $records]);
			return $pdf->download("$filename.pdf");
		}
		elseif($format == "csv"){
			return Excel::download(new AssettypeListExport($query), "$filename.csv", \Maatwebsite\Excel\Excel::CSV);
		}
		elseif($format == "excel"){
			return Excel::download(new AssettypeListExport($query), "$filename.xlsx", \Maatwebsite\Excel\Excel::XLSX);
		}
	}
	

	/**
     * Export table records to different format
	 * supported format:- PDF, CSV, EXCEL, HTML
	 * @param \Illuminate\Database\Eloquent\Model $query
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
	private function ExportAssettypeaddlist($query){
		ob_end_clean(); // clean any output to allow file download
		$filename = "AssettypeaddlistAssetTypeReport-" . date_now();
		$format = $this->getExportFormat();
		if($format == "print"){
			$records = $query->get(AssetType::exportAssettypeaddlistFields());
			return view("reports.assettype-assettypeaddlist", ["records" => $records]);
		}
		elseif($format == "pdf"){
			$records = $query->get(AssetType::exportAssettypeaddlistFields());
			$pdf = PDF::loadView("reports.assettype-assettypeaddlist", ["records" => $records]);
			return $pdf->download("$filename.pdf");
		}
		elseif($format == "csv"){
			return Excel::download(new AssettypeAssettypeaddlistExport($query), "$filename.csv", \Maatwebsite\Excel\Excel::CSV);
		}
		elseif($format == "excel"){
			return Excel::download(new AssettypeAssettypeaddlistExport($query), "$filename.xlsx", \Maatwebsite\Excel\Excel::XLSX);
		}
	}
}
