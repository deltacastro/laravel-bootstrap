<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Person extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'last_name'
    ];

    protected $casts = [
        'extra_data' => 'array'
    ];

    /**
     * ACCESORS
     */

    public function getFullNameAttribute()
    {
        return Str::title("{$this->name} {$this->last_name}");
    }

    /**
     * Mutators
     */

    public function setNameAttribute($value) {
        $this->attributes['name'] = Str::title($value);
    }

    public function setLastNameAttribute($value) {
        $this->attributes['last_name'] = Str::title($value);
    }
}
