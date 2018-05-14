<?php
namespace App\Models;

use App\Models\Model;

class Tenant extends Model
{
    protected $fillable = [
        'id',
        'name',
        'subdomain',
        'db_hostname',
        'db_database',
        'db_username',
        'db_password',
        'db_encrypted',
        'primary_color',
        'primary_color_text',
        'secondary_color',
        'secondary_color_text'
    ];
    
    const FIELDS = [
        'ID',
        'Naam',
        'Subdomein',
        // 'DB Hostname',
        // 'DB Database',
        // 'DB Username',
        // 'DB Wachtwoord',
        // 'DB Encrypted',
        'Primaire kleur',
        'Primare tekstkleur',
        'Secundaire kleur',
        'Secundaire tekstkleur'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}