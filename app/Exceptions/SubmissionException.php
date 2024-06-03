<?php

namespace App\Exceptions;

use Exception;

class SubmissionException extends Exception
{
    /**
     * Report or log an exception.
     *
     * @return void
     */
    public function report()
    {
        \Log::debug('Error submission!');
    }

    public function render($request)
    {
        dd(123);
    }
}
