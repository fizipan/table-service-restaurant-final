<?php

namespace App\Http\Requests\Waiter;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'tables_id' => 'required|exists:tables,id',
            'custumer_name' => 'required|string|min:3|max:255',
            'phone_number' => 'required|max:12|min:8',
            'gender' => 'required',
            'address' => 'required|string|min:8',
        ];
    }
}
