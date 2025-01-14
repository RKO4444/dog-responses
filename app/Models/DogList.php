<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DogList extends Model
{
    use HasFactory;
    
    protected $fillable = ['user_id', 'name'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function items() {
        return $this->hasMany(DogListItem::class);
    }
}
