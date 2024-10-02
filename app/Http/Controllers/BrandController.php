<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\BrandAddRequest;
use App\Http\Requests\BrandEditRequest;
use App\Http\Requests\BrandAddPageModalRequest;
use App\Http\Requests\BrandAddBrandModalonAddAssetRequest;
use App\Models\Brand;
use Illuminate\Http\Request;
use \PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\BrandListExport;
use Illuminate\Support\Facades\Validator;
use Exception;
class BrandController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.brand.list";
		$query = Brand::query();
		$limit = $request->limit ?? 25;
		if($request->search){
			$search = trim($request->search);
			Brand::search($query, $search); // search table records
		}
		$orderby = $request->orderby ?? "brand.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		// if request format is for export example:- product/index?export=pdf
		if($this->getExportFormat()){
			return $this->ExportList($query); // export current query
		}
		$records = $query->paginate($limit, Brand::listFields());
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
		Brand::insert($modeldata);
		return $this->redirect(url()->previous(), "Data imported successfully");
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = Brand::query();
		$record = $query->findOrFail($rec_id, Brand::viewFields());
		return $this->renderView("pages.brand.view", ["data" => $record]);
	}
	

	/**
     * Display form page
     * @return \Illuminate\View\View
     */
	function add(){
		return $this->renderView("pages.brand.add");
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function store(BrandAddRequest $request){
		$modeldata = $this->normalizeFormData($request->validated());
		
		//save Brand record
		$record = Brand::create($modeldata);
		$rec_id = $record->id;
		return $this->redirect("brand", "Record added successfully");
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(BrandEditRequest $request, $rec_id = null){
		$query = Brand::query();
		$record = $query->findOrFail($rec_id, Brand::editFields());
		if ($request->isMethod('post')) {
			$modeldata = $this->normalizeFormData($request->validated());
			$record->update($modeldata);
			return $this->redirect("brand", "Record updated successfully");
		}
		return $this->renderView("pages.brand.edit", ["data" => $record, "rec_id" => $rec_id]);
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
		$query = Brand::query();
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
	function addpagemodal(){
		return $this->renderView("pages.brand.addpagemodal");
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function addpagemodal_store(BrandAddPageModalRequest $request){
		$modeldata = $this->normalizeFormData($request->validated());
		
		//save Brand record
		$record = Brand::create($modeldata);
		$rec_id = $record->id;
		return $this->redirect("brand", "Record added successfully");
	}
	

	/**
     * Display form page
     * @return \Illuminate\View\View
     */
	function addbrandmodalonaddasset(){
		return $this->renderView("pages.brand.addbrandmodalonaddasset");
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function addbrandmodalonaddasset_store(BrandAddBrandModalonAddAssetRequest $request){
		$modeldata = $this->normalizeFormData($request->validated());
		
		//save Brand record
		$record = Brand::create($modeldata);
		$rec_id = $record->id;
		return $this->redirect("assets/add/", "Record added successfully");
	}
	

	/**
     * Export table records to different format
	 * supported format:- PDF, CSV, EXCEL, HTML
	 * @param \Illuminate\Database\Eloquent\Model $query
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
	private function ExportList($query){
		ob_end_clean(); // clean any output to allow file download
		$filename = "ListBrandReport-" . date_now();
		$format = $this->getExportFormat();
		if($format == "print"){
			$records = $query->get(Brand::exportListFields());
			return view("reports.brand-list", ["records" => $records]);
		}
		elseif($format == "pdf"){
			$records = $query->get(Brand::exportListFields());
			$pdf = PDF::loadView("reports.brand-list", ["records" => $records]);
			return $pdf->download("$filename.pdf");
		}
		elseif($format == "csv"){
			return Excel::download(new BrandListExport($query), "$filename.csv", \Maatwebsite\Excel\Excel::CSV);
		}
		elseif($format == "excel"){
			return Excel::download(new BrandListExport($query), "$filename.xlsx", \Maatwebsite\Excel\Excel::XLSX);
		}
	}
}
