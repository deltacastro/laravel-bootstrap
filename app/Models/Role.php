<?php

namespace App\Models;

use Spatie\Permission\Models\Role as Model;

class Role extends Model
{
    /**
     * SCOPES
     */

    public function scopeSearch($query)
    {
        return $query;
    }
}
