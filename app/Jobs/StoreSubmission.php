<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Services\SubmissionService;
use App\Repositories\SubmissionRepository;
use App\Events\SubmissionSaved;


class StoreSubmission implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $params;
    private $submissionService;
    /**
     * Create a new job instance.
     */
    public function __construct($params)
    {
        $this->params = $params;
        $this->submissionService = new SubmissionService(app()->make(SubmissionRepository::class));
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $submission = $this->submissionService->store($this->params);
        event(new SubmissionSaved($submission));
    }
}
