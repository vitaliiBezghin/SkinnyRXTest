<?php

namespace App\Services\Submission;

use App\DTO\SubmissionDTO;
use App\Http\Resources\SubmissionResource;
use App\Jobs\SubmissionJob;
use App\Repositories\SubmissionRepository;
use App\Services\BaseService;

class SubmissionSubmitService extends BaseService
{
    public SubmissionRepository $repository;

    public function execute(SubmissionDTO $data)
    {
        SubmissionJob::dispatch($data, $this->repository)->delay(now()->addSeconds(10));
        return true;
    }
}
