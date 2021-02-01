<?php

namespace App\Jobs;

use App\Http\Service\ModifyModService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ModifyModQueue implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $submissionId;
    protected $newSubmissionId;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(string $submissionId, string $newSubmissionId)
    {
        $this->submissionId = $submissionId;
        $this->newSubmissionId = $newSubmissionId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        (new ModifyModService())->run(
            $this->submissionId,
            $this->newSubmissionId
        );
    }
}
