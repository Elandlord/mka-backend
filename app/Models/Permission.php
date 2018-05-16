<?php
namespace App\Models;

use App\Models\Model;

class Permission extends Model
{
    protected $fillable = [

    ];
    
    const FIELDS = [
        "ID",
        "Naam",
        "Beschrijving",
        "Display Naam",
    ];

    protected $dates = [

    ];
}