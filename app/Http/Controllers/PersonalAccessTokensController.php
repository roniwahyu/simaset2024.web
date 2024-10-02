<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\PersonalAccessTokensAddRequest;
use App\Models\PersonalAccessTokens;
use Illuminate\Http\Request;
use \PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PersonalaccesstokensListExport;
use App\Exports\PersonalaccesstokensViewExport;
use Illuminate\Support\Facades\Validator;
use Exception;
class PersonalAccessTokensController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.personalaccesstokens.list";
		$query = PersonalAccessTokens::query();
		$limit = $request->limit ?? 25;
		if($request->search){
			$search = trim($request->search);
			PersonalAccessTokens::search($query, $search); // search table records
		}
		$orderby = $request->orderby ?? "personal_access_tokens.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		// if request format is for export example:- product/index?export=pdf
		if($this->getExportFormat()){
			return $this->ExportList($query); // export current query
		}
		$records = $query->paginate($limit, PersonalAccessTokens::listFields());
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
		PersonalAccessTokens::insert($modeldata);
		return $this->redirect(url()->previous(), "Data imported successfully");
	}
	

	/**
     * Export table records to different format
	 * supported format:- PDF, CSV, EXCEL, HTML
	 * @param \Illuminate\Database\Eloquent\Model $query
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
	private function ExportList($query){
		ob_end_clean(); // clean any output to allow file download
		$filename = "ListPersonalAccessTokensReport-" . date_now();
		$format = $this->getExportFormat();
		if($format == "print"){
			$records = $query->get(PersonalAccessTokens::exportListFields());
			return view("reports.personalaccesstokens-list", ["records" => $records]);
		}
		elseif($format == "pdf"){
			$records = $query->get(PersonalAccessTokens::exportListFields());
			$pdf = PDF::loadView("reports.personalaccesstokens-list", ["records" => $records]);
			return $pdf->download("$filename.pdf");
		}
		elseif($format == "csv"){
			return Excel::download(new PersonalaccesstokensListExport($query), "$filename.csv", \Maatwebsite\Excel\Excel::CSV);
		}
		elseif($format == "excel"){
			return Excel::download(new PersonalaccesstokensListExport($query), "$filename.xlsx", \Maatwebsite\Excel\Excel::XLSX);
		}
	}
	

	/**
     * Export single record to different format
	 * supported format:- PDF, CSV, EXCEL, HTML
	 * @param \Illuminate\Database\Eloquent\Model $record
	 * @param string $rec_id
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
	private function ExportView($query, $rec_id){
		ob_end_clean();// clean any output to allow file download
		$filename ="ViewPersonalAccessTokensReport-" . date_now();
		$format = $this->getExportFormat();
		if($format == "print"){
			$record = $query->findOrFail($rec_id, PersonalAccessTokens::exportViewFields());
			return view("reports.personalaccesstokens-view", ["record" => $record]);
		}
		elseif($format == "pdf"){
			$record = $query->findOrFail($rec_id, PersonalAccessTokens::exportViewFields());
			$pdf = PDF::loadView("reports.personalaccesstokens-view", ["record" => $record]);
			return $pdf->download("$filename.pdf");
		}
		elseif($format == "csv"){
			return Excel::download(new PersonalaccesstokensViewExport($query, $rec_id), "$filename.csv", \Maatwebsite\Excel\Excel::CSV);
		}
		elseif($format == "excel"){
			return Excel::download(new PersonalaccesstokensViewExport($query, $rec_id), "$filename.xlsx", \Maatwebsite\Excel\Excel::XLSX);
		}
	}
}
