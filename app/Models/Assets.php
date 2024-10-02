<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use OwenIt\Auditing\Contracts\Auditable;
class Assets extends Model implements Auditable
{
	use \OwenIt\Auditing\Auditable;
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'assets';
	

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
		'supplierid','typeid','brandid','assettag','name','serial','quantity','purchasedate','warranty','status','cost','picture','description','locationid'
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
				assets.id LIKE ?  OR 
				assets.name LIKE ?  OR 
				supplier.name LIKE ?  OR 
				asset_type.name LIKE ?  OR 
				assets.quantity LIKE ?  OR 
				assets.serial LIKE ?  OR 
				brand.name LIKE ?  OR 
				asset_type.description LIKE ?  OR 
				brand.id LIKE ?  OR 
				brand.description LIKE ?  OR 
				supplier.id LIKE ?  OR 
				supplier.email LIKE ?  OR 
				supplier.city LIKE ?  OR 
				supplier.country LIKE ?  OR 
				supplier.zip LIKE ?  OR 
				supplier.phone LIKE ?  OR 
				supplier.address LIKE ?  OR 
				asset_type.id LIKE ?  OR 
				assets.assettag LIKE ?  OR 
				assets.cost LIKE ?  OR 
				assets.status LIKE ?  OR 
				assets.warranty LIKE ?  OR 
				assets.description LIKE ? 
		)';
		$search_params = [
			"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
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
			"assets.id AS id",
			"assets.name AS name",
			"supplier.name AS supplier_name",
			"asset_type.name AS assettype_name",
			"assets.quantity AS quantity",
			"assets.serial AS serial",
			"brand.id AS brand_id",
			"supplier.id AS supplier_id",
			"asset_type.id AS assettype_id" 
		];
	}
	

	/**
     * return exportList page fields of the model.
     * 
     * @return array
     */
	public static function exportListFields(){
		return [ 
			"assets.id AS id",
			"assets.name AS name",
			"supplier.name AS supplier_name",
			"asset_type.name AS assettype_name",
			"assets.quantity AS quantity",
			"assets.serial AS serial",
			"brand.id AS brand_id",
			"supplier.id AS supplier_id",
			"asset_type.id AS assettype_id" 
		];
	}
	

	/**
     * return view page fields of the model.
     * 
     * @return array
     */
	public static function viewFields(){
		return [ 
			"assets.id AS id",
			"assets.supplierid AS supplierid",
			"assets.typeid AS typeid",
			"assets.brandid AS brandid",
			"assets.assettag AS assettag",
			"assets.name AS name",
			"assets.serial AS serial",
			"assets.quantity AS quantity",
			"assets.purchasedate AS purchasedate",
			"assets.cost AS cost",
			"assets.warranty AS warranty",
			"assets.status AS status",
			"assets.picture AS picture",
			"assets.description AS description",
			"assets.created_at AS created_at",
			"assets.updated_at AS updated_at",
			"assets.locationid AS locationid",
			"assets.checkstatus AS checkstatus",
			"brand.id AS brand_id",
			"brand.name AS brand_name",
			"brand.description AS brand_description",
			"brand.created_at AS brand_created_at",
			"brand.updated_at AS brand_updated_at",
			"supplier.id AS supplier_id",
			"supplier.name AS supplier_name",
			"supplier.email AS supplier_email",
			"supplier.city AS supplier_city",
			"supplier.country AS supplier_country",
			"supplier.zip AS supplier_zip",
			"supplier.phone AS supplier_phone",
			"supplier.address AS supplier_address",
			"supplier.created_at AS supplier_created_at",
			"supplier.updated_at AS supplier_updated_at",
			"asset_type.id AS assettype_id",
			"asset_type.name AS assettype_name",
			"asset_type.description AS assettype_description",
			"asset_type.created_at AS assettype_created_at",
			"asset_type.updated_at AS assettype_updated_at",
			"asset_type.parents AS assettype_parents" 
		];
	}
	

	/**
     * return exportView page fields of the model.
     * 
     * @return array
     */
	public static function exportViewFields(){
		return [ 
			"assets.id AS id",
			"assets.supplierid AS supplierid",
			"assets.typeid AS typeid",
			"assets.brandid AS brandid",
			"assets.assettag AS assettag",
			"assets.name AS name",
			"assets.serial AS serial",
			"assets.quantity AS quantity",
			"assets.purchasedate AS purchasedate",
			"assets.cost AS cost",
			"assets.warranty AS warranty",
			"assets.status AS status",
			"assets.picture AS picture",
			"assets.description AS description",
			"assets.created_at AS created_at",
			"assets.updated_at AS updated_at",
			"assets.locationid AS locationid",
			"assets.checkstatus AS checkstatus",
			"brand.id AS brand_id",
			"brand.name AS brand_name",
			"brand.description AS brand_description",
			"brand.created_at AS brand_created_at",
			"brand.updated_at AS brand_updated_at",
			"supplier.id AS supplier_id",
			"supplier.name AS supplier_name",
			"supplier.email AS supplier_email",
			"supplier.city AS supplier_city",
			"supplier.country AS supplier_country",
			"supplier.zip AS supplier_zip",
			"supplier.phone AS supplier_phone",
			"supplier.address AS supplier_address",
			"supplier.created_at AS supplier_created_at",
			"supplier.updated_at AS supplier_updated_at",
			"asset_type.id AS assettype_id",
			"asset_type.name AS assettype_name",
			"asset_type.description AS assettype_description",
			"asset_type.created_at AS assettype_created_at",
			"asset_type.updated_at AS assettype_updated_at",
			"asset_type.parents AS assettype_parents" 
		];
	}
	

	/**
     * return edit page fields of the model.
     * 
     * @return array
     */
	public static function editFields(){
		return [ 
			"supplierid",
			"typeid",
			"brandid",
			"assettag",
			"name",
			"serial",
			"quantity",
			"purchasedate",
			"warranty",
			"status",
			"cost",
			"picture",
			"description",
			"locationid",
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
