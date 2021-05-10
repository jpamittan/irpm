<?php

namespace App\Jobs;

use App\Http\Service\ModifyModService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\Request;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ModifyModQueue implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $request;
    protected $lineOfBusiness;
    protected $submissionId;
    protected $newSubmissionId;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        Request $request, 
        string $lineOfBusiness, 
        string $submissionId, 
        string $newSubmissionId
    ) {
        $this->request = $request;
        $this->lineOfBusiness = $lineOfBusiness;
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
            $this->request,
            $this->lineOfBusiness,
            $this->submissionId,
            $this->newSubmissionId
        );
    }
}
