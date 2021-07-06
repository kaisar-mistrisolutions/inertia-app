<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class PersonalInformation extends Model
{
    use HasFactory;
    // protected $guarded = ['id'];

    protected $fillable = [
        'username',
        'about',
        'notification',
        'image',
    ];

    public function getImageAttribute($value){
        return $value?Storage::url($value):null;
    }
}
