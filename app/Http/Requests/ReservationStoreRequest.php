<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationStoreRequest extends FormRequest
{
    protected $errorBag = 'reservations';

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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'date' => 'required|date|after:tommorrow',
            'time' => 'required|exists:times,time',
            'people' => 'required|numeric|min:1|max:12',
            'name' => 'required|string',
            'phone' => 'required',
            'email' => 'required|email',
        ];
    }
}
