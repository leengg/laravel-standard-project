<?php

namespace App\Services;

use App\Models\Submission;
use App\Repositories\SubmissionRepository;

class SubmissionService
{
    public function __construct(private SubmissionRepository $submissionRepository)
    {
        //
    }

    /**
    * Create Submission
    *
    * @param  array $submissionData
    * @return Submission
    */
    public function store(Array $params): Submission
    {

        $submission = [
            'name'      => $params['name'],
            'email' 	=> $params['email'],
            'message' 	=> $params['message'],
        ];

        $submission = $this->submissionRepository->create($submission);

        return $submission;
    }
}
