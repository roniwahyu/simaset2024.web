<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CoreUsersAddRequest extends FormRequest
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
		
        return [
            
				"username" => "required|string|unique:core_users,username",
				"password" => "required|same:confirm_password",
				"email" => "required|email|unique:core_users,email",
				"phone" => "nullable|string",
				"picture" => "nullable",
            
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
