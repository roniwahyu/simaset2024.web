<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use OwenIt\Auditing\Contracts\Auditable;
class Settings extends Model implements Auditable
{
	use \OwenIt\Auditing\Auditable;
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'settings';
	

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
		'company','address','email','phonenumber','country','logo','formatdate','currency','language'
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
				company LIKE ?  OR 
				address LIKE ?  OR 
				email LIKE ?  OR 
				phonenumber LIKE ?  OR 
				country LIKE ?  OR 
				logo LIKE ?  OR 
				formatdate LIKE ?  OR 
				currency LIKE ?  OR 
				language LIKE ? 
		)';
		$search_params = [
			"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
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
			"company",
			"address",
			"email",
			"phonenumber",
			"country",
			"logo",
			"formatdate",
			"created_at",
			"updated_at",
			"currency",
			"language" 
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
			"company",
			"address",
			"email",
			"phonenumber",
			"country",
			"logo",
			"formatdate",
			"created_at",
			"updated_at",
			"currency",
			"language" 
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
			"company",
			"address",
			"email",
			"phonenumber",
			"country",
			"logo",
			"formatdate",
			"created_at",
			"updated_at",
			"currency",
			"language" 
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
			"company",
			"address",
			"email",
			"phonenumber",
			"country",
			"logo",
			"formatdate",
			"created_at",
			"updated_at",
			"currency",
			"language" 
		];
	}
	

	/**
     * return edit page fields of the model.
     * 
     * @return array
     */
	public static function editFields(){
		return [ 
			"company",
			"address",
			"email",
			"phonenumber",
			"country",
			"logo",
			"formatdate",
			"currency",
			"language",
			"id" 
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
