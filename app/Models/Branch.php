<?php
namespace App\Models;

use App\Models\Model;

class Branch extends Model
{
    protected $fillable = [
        'sbi',
        'name',
        'description'
    ];

    const FIELDS = [
        'ID',
        'SBI',
        'Naam',
        'Beschrijving',
        'Gemaakt op',
        'Aangepast op',
        'Real ID',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];
}