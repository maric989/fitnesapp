<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $title
 * @property integer $difficulty_id
 * @property integer $intensity_id
 * @property integer $coach_id
 */
class LessonListFilterRequest extends FormRequest
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
            'title' => ['nullable', 'string'],
            'difficulty_id' => ['nullable', 'integer', 'exists:difficulties,id'],
            'intensity_id' => ['nullable', 'integer', 'exists:intensities,id'],
            'coach_id' => ['nullable', 'integer', 'exists:coaches,id'],
        ];
    }
}
