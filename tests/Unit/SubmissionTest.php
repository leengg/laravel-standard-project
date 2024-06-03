<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Support\Str;
use App\Repositories\SubmissionRepository;
use App\Services\SubmissionService;
use Log;
use App\Models\Submission;

class SubmissionTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $this->assertTrue(true);
    }

    public function test_store_submission(): void
    {
        $submissionData = [
            'name'      => Str::random(8),
            'email'     => 't_unit@' . Str::random(4) . '.test',
            'message'   => Str::random(40),
        ];

        $submissionService = new SubmissionService(app()->make(SubmissionRepository::class));
        $submission = $submissionService->store($submissionData);
        $storedData = $submission->only('name', 'email', 'message');

        $this->assertEquals($submissionData, $storedData);
    }
}
