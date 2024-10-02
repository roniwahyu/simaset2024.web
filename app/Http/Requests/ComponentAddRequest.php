<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComponentAddRequest extends FormRequest
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
            
				"supplierid" => "required|numeric",
				"typeid" => "required|numeric",
				"brandid" => "required|numeric",
				"name" => "required|string",
				"serial" => "required|string",
				"quantity" => "required|string",
				"purchasedate" => "required|date",
				"cost" => "required|string",
				"warranty" => "required|string",
				"status" => "required|string",
				"picture" => "nullable",
				"description" => "nullable",
				"locationid" => "required|numeric",
				"checkstatus" => "required|numeric",
            
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
