<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use OwenIt\Auditing\Contracts\Auditable;
class CoreRoles extends Model implements Auditable
{
	use \OwenIt\Auditing\Auditable;
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'core_roles';
	

	/**
     * The table primary key field
     *
     * @var string
     */
	protected $primaryKey = 'role_id';
	

	/**
     * Table fillable fields
     *
     * @var array
     */
	protected $fillable = [
		'role_name','description','isactive','userid','created','modified','deleted','key'
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
				role_id LIKE ?  OR 
				role_name LIKE ?  OR 
				description LIKE ?  OR 
				key LIKE ? 
		)';
		$search_params = [
			"%$text%","%$text%","%$text%","%$text%"
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
			"role_id",
			"role_name",
			"description",
			"isactive",
			"userid",
			"created",
			"modified",
			"deleted",
			"key",
			"date_created",
			"date_updated" 
		];
	}
	

	/**
     * return exportList page fields of the model.
     * 
     * @return array
     */
	public static function exportListFields(){
		return [ 
			"role_id",
			"role_name",
			"description",
			"isactive",
			"userid",
			"created",
			"modified",
			"deleted",
			"key",
			"date_created",
			"date_updated" 
		];
	}
	

	/**
     * return view page fields of the model.
     * 
     * @return array
     */
	public static function viewFields(){
		return [ 
			"role_id",
			"role_name",
			"description",
			"isactive",
			"userid",
			"created",
			"modified",
			"deleted",
			"key",
			"date_created",
			"date_updated" 
		];
	}
	

	/**
     * return exportView page fields of the model.
     * 
     * @return array
     */
	public static function exportViewFields(){
		return [ 
			"role_id",
			"role_name",
			"description",
			"isactive",
			"userid",
			"created",
			"modified",
			"deleted",
			"key",
			"date_created",
			"date_updated" 
		];
	}
	

	/**
     * return edit page fields of the model.
     * 
     * @return array
     */
	public static function editFields(){
		return [ 
			"role_id",
			"role_name",
			"description",
			"isactive",
			"userid",
			"created",
			"modified",
			"deleted",
			"key" 
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
