<?php

namespace App\Repositories;

use App\Models\Submission;
use Illuminate\Database\Eloquent\Model;

class SubmissionRepository extends BaseRepository
{
    public function __construct(Submission $model)
    {
        parent::__construct($model);
    }
}
