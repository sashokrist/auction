<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable = ['bet'];
    protected $dates = ['available'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bidder()
    {
        return $this->belongsTo(Bidder::class);
    }
}
