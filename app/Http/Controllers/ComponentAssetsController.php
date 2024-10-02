<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\ComponentAssetsAddRequest;
use App\Http\Requests\ComponentAssetsEditRequest;
use App\Models\ComponentAssets;
use Illuminate\Http\Request;
use \PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ComponentassetsListExport;
use Illuminate\Support\Facades\Validator;
use Exception;
class ComponentAssetsController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.componentassets.list";
		$query = ComponentAssets::query();
		$limit = $request->limit ?? 25;
		if($request->search){
			$search = trim($request->search);
			ComponentAssets::search($query, $search); // search table records
		}
		$orderby = $request->orderby ?? "component_assets.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		// if request format is for export example:- product/index?export=pdf
		if($this->getExportFormat()){
			return $this->ExportList($query); // export current query
		}
		$records = $query->paginate($limit, ComponentAssets::listFields());
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
		ComponentAssets::insert($modeldata);
		return $this->redirect(url()->previous(), "Data imported successfully");
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = ComponentAssets::query();
		$record = $query->findOrFail($rec_id, ComponentAssets::viewFields());
		return $this->renderView("pages.componentassets.view", ["data" => $record]);
	}
	

	/**
     * Display form page
     * @return \Illuminate\View\View
     */
	function add(){
		return $this->renderView("pages.componentassets.add");
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function store(ComponentAssetsAddRequest $request){
		$modeldata = $this->normalizeFormData($request->validated());
		
		//save ComponentAssets record
		$record = ComponentAssets::create($modeldata);
		$rec_id = $record->id;
		return $this->redirect("componentassets", "Record added successfully");
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(ComponentAssetsEditRequest $request, $rec_id = null){
		$query = ComponentAssets::query();
		$record = $query->findOrFail($rec_id, ComponentAssets::editFields());
		if ($request->isMethod('post')) {
			$modeldata = $this->normalizeFormData($request->validated());
			$record->update($modeldata);
			return $this->redirect("componentassets", "Record updated successfully");
		}
		return $this->renderView("pages.componentassets.edit", ["data" => $record, "rec_id" => $rec_id]);
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
		$query = ComponentAssets::query();
		$query->whereIn("id", $arr_id);
		//to raise audit trail delete event, use Eloquent 'get' before delete
		$query->get()->each(function ($record, $key) {
			$record->delete();
		});
		$redirectUrl = $request->redirect ?? url()->previous();
		return $this->redirect($redirectUrl, "Record deleted successfully");
	}
	

	/**
     * Export table records to different format
	 * supported format:- PDF, CSV, EXCEL, HTML
	 * @param \Illuminate\Database\Eloquent\Model $query
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
	private function ExportList($query){
		ob_end_clean(); // clean any output to allow file download
		$filename = "ListComponentAssetsReport-" . date_now();
		$format = $this->getExportFormat();
		if($format == "print"){
			$records = $query->get(ComponentAssets::exportListFields());
			return view("reports.componentassets-list", ["records" => $records]);
		}
		elseif($format == "pdf"){
			$records = $query->get(ComponentAssets::exportListFields());
			$pdf = PDF::loadView("reports.componentassets-list", ["records" => $records]);
			return $pdf->download("$filename.pdf");
		}
		elseif($format == "csv"){
			return Excel::download(new ComponentassetsListExport($query), "$filename.csv", \Maatwebsite\Excel\Excel::CSV);
		}
		elseif($format == "excel"){
			return Excel::download(new ComponentassetsListExport($query), "$filename.xlsx", \Maatwebsite\Excel\Excel::XLSX);
		}
	}
}
