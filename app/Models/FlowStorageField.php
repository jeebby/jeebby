<?php

namespace App\Models;

use App\Models\Enums\StorageFieldType;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class FlowStorageField extends Model
{
    use SoftDeletes, HasUlids;

    protected $fillable = [
        'flow_id',
        'name',
        'type',
    ];

    protected $casts = [
        'type' => StorageFieldType::class,
    ];

    public function flow(): BelongsTo
    {
        return $this->belongsTo(Flow::class);
    }

    public function scopeFlow(Builder $query, string $flowId)
    {
        $query->where('flow_id', '=', $flowId);
    }
}
