<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{
    BelongsTo,
    HasOne
};

class SubmissionMod extends Model
{
    public function __construct()
    {
        $this->connection = config('sqlsvr.connection');
    }

    protected $guarded = [];
    protected $casts = [];

    public function outcomeType(): ?HasOne
    {
        return $this->hasOne(OutcomeType::class, 'id', 'outcome_type_id');
    }

    public function submission(): ?BelongsTo
    {
        return $this->belongsTo(Submission::class, 'submissions_id', 'id');
    }
}
