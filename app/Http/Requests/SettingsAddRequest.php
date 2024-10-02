<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingsAddRequest extends FormRequest
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
            
				"company" => "required|string",
				"address" => "required|string",
				"email" => "required|email",
				"phonenumber" => "required|string",
				"country" => "required|string",
				"logo" => "required",
				"formatdate" => "required|date",
				"currency" => "required|string",
				"language" => "required|string",
            
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
