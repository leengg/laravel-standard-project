<?php

namespace App\Repositories;

use App\Repositories\EloquentRepository;
use App\Models\Submission;

class SubmissionRepository extends EloquentRepository
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return Submission::class;
    }

}