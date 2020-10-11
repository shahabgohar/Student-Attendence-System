<?php

namespace App\Rules;

use App\Models\AttendenceDetail;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class ClassIdShouldNotBeInAttendenceDetails implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
            return !(AttendenceDetail::where('student_class_id','=',(int)$value));
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Seems like Attendence is already created against :attribute ';
    }
}
