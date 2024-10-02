<?php 
namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
/**
 * Components data Model
 * Use for getting values from the database for page components
 * Support raw query builder
 * @category Model
 */
class ComponentsData{
	

	/**
     * assetid_option_list Model Action
     * @return array
     */
	function assetid_option_list(){
		$sqltext = "SELECT id as value, name as label FROM assets";
		$query_params = [];
		$arr = DB::select($sqltext, $query_params);
		return $arr;
	}
	

	/**
     * supplierid_option_list Model Action
     * @return array
     */
	function supplierid_option_list(){
		$sqltext = "SELECT  DISTINCT id AS value,name AS label FROM supplier";
		$query_params = [];
		$arr = DB::select($sqltext, $query_params);
		return $arr;
	}
	

	/**
     * typeid_option_list Model Action
     * @return array
     */
	function typeid_option_list(){
		$sqltext = "SELECT  DISTINCT id AS value,name AS label FROM asset_type";
		$query_params = [];
		$arr = DB::select($sqltext, $query_params);
		return $arr;
	}
	

	/**
     * brandid_option_list Model Action
     * @return array
     */
	function brandid_option_list(){
		$sqltext = "SELECT  DISTINCT id AS value,name AS label FROM brand";
		$query_params = [];
		$arr = DB::select($sqltext, $query_params);
		return $arr;
	}
	

	/**
     * locationid_option_list Model Action
     * @return array
     */
	function locationid_option_list(){
		$sqltext = "SELECT  DISTINCT id AS value,name AS label FROM location";
		$query_params = [];
		$arr = DB::select($sqltext, $query_params);
		return $arr;
	}
	

	/**
     * category_id_option_list Model Action
     * @return array
     */
	function category_id_option_list(){
		$sqltext = "SELECT  DISTINCT id AS value,name AS label FROM brand_category";
		$query_params = [];
		$arr = DB::select($sqltext, $query_params);
		return $arr;
	}
	

	/**
     * componentid_option_list Model Action
     * @return array
     */
	function componentid_option_list(){
		$sqltext = "SELECT id as value, name as label FROM component";
		$query_params = [];
		$arr = DB::select($sqltext, $query_params);
		return $arr;
	}
	

	/**
     * group_id_option_list Model Action
     * @return array
     */
	function group_id_option_list(){
		$sqltext = "SELECT id as value, name as label FROM core_groups";
		$query_params = [];
		$arr = DB::select($sqltext, $query_params);
		return $arr;
	}
	

	/**
     * user_id_option_list Model Action
     * @return array
     */
	function user_id_option_list(){
		$sqltext = "SELECT id as value, username as label FROM core_users";
		$query_params = [];
		$arr = DB::select($sqltext, $query_params);
		return $arr;
	}
	

	/**
     * Check if value already exist in CoreUsers table
	 * @param string $value
     * @return bool
     */
	function coreusers_username_value_exist(Request $request){
		$value = trim($request->value);
		$exist = DB::table('core_users')->where('username', $value)->value('username');   
		if($exist){
			return true;
		}
		return false;
	}
	

	/**
     * Check if value already exist in CoreUsers table
	 * @param string $value
     * @return bool
     */
	function coreusers_email_value_exist(Request $request){
		$value = trim($request->value);
		$exist = DB::table('core_users')->where('email', $value)->value('email');   
		if($exist){
			return true;
		}
		return false;
	}
	

	/**
     * institution_id_option_list Model Action
     * @return array
     */
	function institution_id_option_list(){
		$sqltext = "SELECT  DISTINCT id AS value,name AS label FROM institution";
		$query_params = [];
		$arr = DB::select($sqltext, $query_params);
		return $arr;
	}
	

	/**
     * maintenance_assetid_option_list Model Action
     * @return array
     */
	function maintenance_assetid_option_list(){
		$sqltext = "SELECT  DISTINCT id AS value,name AS label FROM assets";
		$query_params = [];
		$arr = DB::select($sqltext, $query_params);
		return $arr;
	}
	

	/**
     * building_id_option_list Model Action
     * @return array
     */
	function building_id_option_list(){
		$arr = [];
		if(request()->search){
			$search = trim(request()->search);
			$sqltext = "SELECT  DISTINCT id AS value,name AS label FROM building" ;
			$query_params = [];
			$query_params['search'] = "%$search%";
			$arr = DB::select($sqltext, $query_params);
		}
		return $arr;
	}
	

	/**
     * getcount_institution Model Action
     * @return int
     */
	function getcount_institution(){
		$sqltext = "SELECT COUNT(*) AS num FROM institution";
		$query_params = [];
		$val = DB::selectOne($sqltext, $query_params);
		return $val->num;
	}
	

	/**
     * getcount_department Model Action
     * @return int
     */
	function getcount_department(){
		$sqltext = "SELECT COUNT(*) AS num FROM department";
		$query_params = [];
		$val = DB::selectOne($sqltext, $query_params);
		return $val->num;
	}
	

	/**
     * getcount_location Model Action
     * @return int
     */
	function getcount_location(){
		$sqltext = "SELECT COUNT(*) AS num FROM location";
		$query_params = [];
		$val = DB::selectOne($sqltext, $query_params);
		return $val->num;
	}
	

	/**
     * getcount_assets Model Action
     * @return int
     */
	function getcount_assets(){
		$sqltext = "SELECT COUNT(*) AS num FROM assets";
		$query_params = [];
		$val = DB::selectOne($sqltext, $query_params);
		return $val->num;
	}
	

	/**
     * getcount_building Model Action
     * @return int
     */
	function getcount_building(){
		$sqltext = "SELECT COUNT(*) AS num FROM building";
		$query_params = [];
		$val = DB::selectOne($sqltext, $query_params);
		return $val->num;
	}
	

	/**
     * getcount_component Model Action
     * @return int
     */
	function getcount_component(){
		$sqltext = "SELECT COUNT(*) AS num FROM component";
		$query_params = [];
		$val = DB::selectOne($sqltext, $query_params);
		return $val->num;
	}
	

	/**
     * getcount_brand Model Action
     * @return int
     */
	function getcount_brand(){
		$sqltext = "SELECT COUNT(*) AS num FROM brand";
		$query_params = [];
		$val = DB::selectOne($sqltext, $query_params);
		return $val->num;
	}
	

	/**
     * getcount_maintenance Model Action
     * @return int
     */
	function getcount_maintenance(){
		$sqltext = "SELECT COUNT(*) AS num FROM maintenance";
		$query_params = [];
		$val = DB::selectOne($sqltext, $query_params);
		return $val->num;
	}
	

	/**
     * getcount_supplier Model Action
     * @return int
     */
	function getcount_supplier(){
		$sqltext = "SELECT COUNT(*) AS num FROM supplier";
		$query_params = [];
		$val = DB::selectOne($sqltext, $query_params);
		return $val->num;
	}
	

	/**
     * getcount_employees Model Action
     * @return int
     */
	function getcount_employees(){
		$sqltext = "SELECT COUNT(*) AS num FROM employees";
		$query_params = [];
		$val = DB::selectOne($sqltext, $query_params);
		return $val->num;
	}
}
