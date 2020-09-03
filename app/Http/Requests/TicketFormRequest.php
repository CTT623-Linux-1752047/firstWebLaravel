<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TicketFormRequest extends FormRequest
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
            //đặt ra luật cho class TicketFormRequest, ở phần title phải có ít nhất 3 character và content là 10 
            'title' => 'required|min:3',
            'content' => 'required|min:10',
        ];
    }
}
