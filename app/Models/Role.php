<?php
namespace App\Models;

use App\Models\Model;

class Role extends Model
{
    protected $fillable = [
        'name',
        'description',
        'display_name',
        'permissions',
    ];

    const FIELDS = [
        "ID",
        "Naam",
        "Beschrijving",
        "Display naam",
        "Permissies",
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];
}