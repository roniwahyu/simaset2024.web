<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssetsAddRequest extends FormRequest
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
            
				"supplierid" => "required",
				"typeid" => "required",
				"brandid" => "required",
				"assettag" => "nullable|string",
				"serial" => "nullable|string",
				"quantity" => "required|string|alpha_num",
				"purchasedate" => "nullable|date",
				"warranty" => "nullable|string",
				"status" => "nullable",
				"cost" => "nullable|string",
				"picture" => "nullable",
				"description" => "nullable",
				"locationid" => "required",
            	"captcha" => "required|captcha",
        ];
    }

	public function messages()
    {
        return [
			"captcha" => "Invalid captcha code",
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
