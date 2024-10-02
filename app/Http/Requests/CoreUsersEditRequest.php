<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CoreUsersEditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
		
		$rec_id = request()->route('rec_id');

        return [
            
				"ip_address" => "nullable|string",
				"username" => "filled|string|unique:core_users,username,$rec_id,id",
				"email_login_hash" => "nullable|email",
				"activation_selector" => "nullable|string",
				"activation_code" => "nullable|string",
				"remember_selector" => "nullable|string",
				"remember_code" => "nullable|string",
				"created_on" => "nullable|numeric",
				"last_login" => "nullable|numeric",
				"active" => "nullable|numeric",
				"first_name" => "nullable|string",
				"last_name" => "nullable|string",
				"company" => "nullable|string",
				"phone" => "nullable|string",
				"picture" => "nullable",
				"oauth_provider" => "nullable|string",
				"oauth_uid" => "nullable|string",
				"created" => "nullable|date",
				"nim" => "nullable|string",
				"claimed" => "nullable|date",
				"wa_activated" => "nullable|numeric",
				"email_activated" => "nullable|numeric",
				"activated" => "nullable|date",
				"otp" => "nullable|string",
				"otp_login_code" => "nullable|string",
				"otp_backup_code" => "nullable|string",
				"user_role_id" => "nullable|numeric",
				"user_group_id" => "nullable|numeric",
            
        ];
    }

	public function messages()
    {
        return [
			
            //using laravel default validation messages
        ];
    }

    /**
     *  Filters to be applied to the input.
     *
     * @return array
     */
    public function filters()
    {
        return [
            //eg = 'name' => 'trim|capitalize|escape'
        ];
    }
}
