<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    /**
     * rooms
     *
     * @return void
     */
    public function rooms()
    {
        return $this->belongsToMany(Room::class);
    }
}
