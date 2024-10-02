<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use OwenIt\Auditing\Contracts\Auditable;
class Component extends Model implements Auditable
{
	use \OwenIt\Auditing\Auditable;
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'component';
	

	/**
     * The table primary key field
     *
     * @var string
     */
	protected $primaryKey = 'id';
	

	/**
     * Table fillable fields
     *
     * @var array
     */
	protected $fillable = [
		'supplierid','typeid','brandid','name','serial','quantity','purchasedate','cost','warranty','status','picture','description','locationid','checkstatus'
	];
	public $timestamps = false;
	

	/**
     * Set search query for the model
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 * @param string $text
     */
	public static function search($query, $text){
		//search table record 
		$search_condition = '(
				id LIKE ?  OR 
				name LIKE ?  OR 
				serial LIKE ?  OR 
				quantity LIKE ?  OR 
				cost LIKE ?  OR 
				warranty LIKE ?  OR 
				status LIKE ?  OR 
				description LIKE ? 
		)';
		$search_params = [
			"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
		];
		//setting search conditions
		$query->whereRaw($search_condition, $search_params);
	}
	

	/**
     * return list page fields of the model.
     * 
     * @return array
     */
	public static function listFields(){
		return [ 
			"id",
			"supplierid",
			"typeid",
			"brandid",
			"name",
			"serial",
			"quantity",
			"purchasedate",
			"cost",
			"warranty",
			"status",
			"picture",
			"description",
			"created_at",
			"updated_at",
			"locationid",
			"checkstatus" 
		];
	}
	

	/**
     * return exportList page fields of the model.
     * 
     * @return array
     */
	public static function exportListFields(){
		return [ 
			"id",
			"supplierid",
			"typeid",
			"brandid",
			"name",
			"serial",
			"quantity",
			"purchasedate",
			"cost",
			"warranty",
			"status",
			"picture",
			"description",
			"created_at",
			"updated_at",
			"locationid",
			"checkstatus" 
		];
	}
	

	/**
     * return view page fields of the model.
     * 
     * @return array
     */
	public static function viewFields(){
		return [ 
			"id",
			"supplierid",
			"typeid",
			"brandid",
			"name",
			"serial",
			"quantity",
			"purchasedate",
			"cost",
			"warranty",
			"status",
			"picture",
			"description",
			"created_at",
			"updated_at",
			"locationid",
			"checkstatus" 
		];
	}
	

	/**
     * return exportView page fields of the model.
     * 
     * @return array
     */
	public static function exportViewFields(){
		return [ 
			"id",
			"supplierid",
			"typeid",
			"brandid",
			"name",
			"serial",
			"quantity",
			"purchasedate",
			"cost",
			"warranty",
			"status",
			"picture",
			"description",
			"created_at",
			"updated_at",
			"locationid",
			"checkstatus" 
		];
	}
	

	/**
     * return edit page fields of the model.
     * 
     * @return array
     */
	public static function editFields(){
		return [ 
			"id",
			"supplierid",
			"typeid",
			"brandid",
			"name",
			"serial",
			"quantity",
			"purchasedate",
			"cost",
			"warranty",
			"status",
			"picture",
			"description",
			"locationid",
			"checkstatus" 
		];
	}
	

	/**
     * Audit log events
     * 
     * @var array
     */
	protected $auditEvents = [
		'created', 'updated', 'deleted'
	];
}
