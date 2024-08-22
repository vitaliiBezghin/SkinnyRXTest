<?php

namespace App\Jobs;

use App\DTO\SubmissionDTO;
use App\Events\SubmissionEvent;
use App\Repositories\SubmissionRepository;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SubmissionJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public SubmissionDTO $data,
        public SubmissionRepository $repository
    )
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->repository->create($this->data->toArray());
        SubmissionEvent::dispatch($this->data);
    }
}
