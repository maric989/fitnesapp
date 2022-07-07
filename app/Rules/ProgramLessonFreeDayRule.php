<?php

namespace App\Rules;

use App\Models\ProgramLessonDay;
use Illuminate\Contracts\Validation\Rule;

class ProgramLessonFreeDayRule implements Rule
{
    protected $programId;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(int $programId)
    {
        $this->programId = $programId;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $valid = true;
        $freeDay = ProgramLessonDay::where('program_id', $this->programId)
            ->where('day', $value)
            ->whereNull('lesson_id')
            ->first();

        if (empty($freeDay)) {
            $valid = false;
        }

        return $valid;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The day is already taken';
    }
}
