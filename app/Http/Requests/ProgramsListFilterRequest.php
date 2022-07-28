<?php

namespace App\Http\Requests;

use App\Dto\ProgramFilterDTO;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string s
 * @property string focus
 * @property string difficulty
 * @property string intensity
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
            'focus' => ['nullable', 'string'],
            'difficulty' => ['nullable', 'string'],
            'intensity' => ['nullable', 'string'],
        ];
    }

    public function convertToDTO()
    {
        return new ProgramFilterDTO(
            $this->s,
            $this->focus,
            $this->difficulty,
            $this->intensity
        );
    }
}
