<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CreateSubmissionRequest;
use App\Services\SubmissionService;
use App\Jobs\StoreSubmission;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Exceptions\SubmissionException;

class SubmissionController extends Controller
{
    public function __construct(private SubmissionService $submissionService)
    {
        //
    }

    public function submit(CreateSubmissionRequest $request) {

        try {
            StoreSubmission::dispatch($request->all());

            return response()->json(
                [
                    'status'    => 'OK',
                    'message'   => 'Submit successfully!'
                ], 200);

        } catch (Throwable $e) {
            throw new HttpResponseException(response()->json(
                [
                    'message' => 'An internal error occurred',
                ], JsonResponse::HTTP_INTERNAL_SERVER_ERROR)
            );
        }
    }
}
