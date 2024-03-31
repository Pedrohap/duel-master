<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTournamentRequest extends FormRequest
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
            'id',
            'name' => 'required',
            'date' => 'required',
            'time' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'address' => 'required',
            'status' => 'required',
            'firstplace',
            'secondplace',
            'thirdplace',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ];
    }
}