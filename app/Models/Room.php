<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    /**
     * type
     *
     * @return void
     */
    public function type()
    {
        return $this->belongsTo(Type::class);
    }
    
    /**
     * status
     *
     * @return void
     */
    public function status()
    {
        return $this->belongsTo(Status::class);
    }
    
    /**
     * facilities
     *
     * @return void
     */
    public function facility()
    {
        return $this->belongsToMany(Facilitie::class);
    }
    
    /**
     * images
     *
     * @return void
     */
    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
