<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierEditRequest extends FormRequest
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
            
				"name" => "filled|string",
				"email" => "filled|email",
				"city" => "filled|string",
				"country" => "nullable|string",
				"zip" => "nullable|string",
				"phone" => "filled|string",
				"address" => "nullable",
            
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
