<?php

namespace notenest\notenest\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class priorityRule implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {

        if (! in_array($value, ['HIGH', 'MEDIUM', 'LOW'])) {
            $fail('The :attribute is invalid priority.');
        }
    }
}
