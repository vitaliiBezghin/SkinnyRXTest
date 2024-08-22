<?php

namespace App\Http\Controllers;

use App\DTO\SubmissionDTO;
use App\Http\Requests\SubmitRequest;
use App\Models\Submission;
use App\Services\ResolvesServices;
use Illuminate\Http\JsonResponse;

class SubmissionController extends Controller
{
    use ResolvesServices;

    /**
     * @uses \App\Services\Submission\SubmissionSubmitService
     * */
    public function submit(SubmitRequest $request): JsonResponse
    {
        return response()->json($this->getService(__METHOD__)->execute(SubmissionDTO::fromArray($request->validated())));
    }
}
