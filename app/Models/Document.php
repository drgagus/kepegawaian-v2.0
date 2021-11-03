<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'employe_id',
        'title',
        'file'
    ];

    public function Employe()
    {
        return $this->belongsTo('App\Models\Employe');
    }
}
