<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EndofPatrolReport extends FormRequest
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
            'town_runs' => 'required|numeric',
            'out_town_runs' => 'required|numeric',
            'assists' => 'required|numeric',
            'vehicles_towed' => 'required|numeric',

            'misdemeanor' => 'required|numeric',
            'felony' => 'required|numeric',
            'warrant' => 'required|numeric',
            'DUI' => 'required|numeric',

            'cases' => 'required|numeric',
            'crash' => 'required|numeric',
            'deadly_force_used' => 'required',
            'taser_used' => 'required',

            'call_summary' => 'required',
            'other_report_numbers' => ''

        ];
    }
}
