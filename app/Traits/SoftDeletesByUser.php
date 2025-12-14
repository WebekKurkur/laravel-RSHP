<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\SoftDeletes as BaseSoftDeletes;

trait SoftDeletesByUser
{
    use BaseSoftDeletes {
        runSoftDelete as baseRunSoftDelete;
    }

    /**
     * Override runSoftDelete to set deleted_by together with deleted_at
     */
    protected function runSoftDelete()
    {
        $query = $this->newModelQuery()->where($this->getKeyName(), $this->getKey());
        $time = $this->freshTimestamp();

        $columns = [$this->getDeletedAtColumn() => $this->fromDateTime($time)];

        try {
            if (function_exists('auth') && auth()->check()) {
                $user = auth()->user();
                $userId = $user->iduser ?? $user->id ?? auth()->id();
                $columns['deleted_by'] = $userId;
            }
        } catch (\Throwable $e) {
            // ignore when auth not available
        }

        $query->update($columns);

        $this->{$this->getDeletedAtColumn()} = $time;
    }
}
