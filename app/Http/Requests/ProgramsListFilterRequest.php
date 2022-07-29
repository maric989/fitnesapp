<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string s
 * @property string focus_id
 * @property string difficulty_id
 * @property string intensity_id
 */
class ProgramsListFilterRequest extends FormRequest
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
            's' => ['nullable', 'string'],
            'focus_id' => ['nullable', 'integer', 'exists:focuses,id'],
            'difficulty_id' => ['nullable', 'integer', 'exists:difficulties,id'],
            'intensity_id' => ['nullable', 'integer', 'exists:intensities,id'],
        ];
    }
}
