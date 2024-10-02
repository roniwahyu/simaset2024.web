<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComponentEditRequest extends FormRequest
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
            
				"supplierid" => "filled|numeric",
				"typeid" => "filled|numeric",
				"brandid" => "filled|numeric",
				"name" => "filled|string",
				"serial" => "filled|string",
				"quantity" => "filled|string",
				"purchasedate" => "filled|date",
				"cost" => "filled|string",
				"warranty" => "filled|string",
				"status" => "filled|string",
				"picture" => "nullable",
				"description" => "nullable",
				"locationid" => "filled|numeric",
				"checkstatus" => "filled|numeric",
            
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
