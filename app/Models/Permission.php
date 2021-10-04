<?php

namespace App\Models;

use Spatie\Permission\Models\Permission as Model;

class Permission extends Model
{
    /**
     * SCOPES
     */

    public function scopeSearch($query)
    {
        return $query;
    }
}
