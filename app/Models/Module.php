<?php
namespace App\Models;

use App\Models\Model;

class Module extends Model
{
    protected $fillable = [
        'name',
        'description',
        'logo',
        'action',
        'is_active',
        'key',
        'priority'
    ];
    
    const FIELDS = [
        "ID",
        "Naam",
        "Beschrijving",
        "Logo",
        "Action",
        "Key",
        "Prioriteit",
        "Actief",
        "Gemaakt op",
        "Aangepast op",
        "Real ID",
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}