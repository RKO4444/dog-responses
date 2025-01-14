<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DogListItem extends Model
{
    use HasFactory;
    
    protected $fillable = ['dog_list_id', 'response_code', 'image_url'];

    public function list() {
        return $this->belongsTo(DogList::class, 'dog_list_id');
    }
}

