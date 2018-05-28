<?php
namespace App\Models;

use App\Models\Model;

class User extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'insertion',
        'phone_number',
        'job',
        'description',
        'email',
        'password',
        'device',
        'platform',
        'gender',
        'birth',
        'social_provider',
        'social_token',
        'social_refresh_token',
        'social_expires_in',
        'social_token_secret',
        'social_id',
        'social_avatar',
        'social_avatar_original',
        'social_nickname',
        'is_confirmed',
        'is_client',
        'roles',
    ];

    const FIELDS = [
        'ID',
        'Voornaam',
        'Achternaam',
        'Tussenvoegsel',
        'Emailadres',
        'Bevestigd',
        'Gemaakt op',
        'Gewijzigd op',
        'Gemaakt op',
        'Gewijzigd op',
        'Real ID',
        'Verwijderd op',
        'Roles',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}