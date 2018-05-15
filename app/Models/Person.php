<?php
namespace App\Models;

use App\Models\Model;

class Person extends Model
{
    protected $fillable = [
        'salutation',
        'initials',
        'first_name',
        'last_name',
        'insertion',
        'gender',
        'bio',
        'date_of_birth',
        'phone_number_private',
        'email_private',
        'address',
        'address2',
        'district',
        'city',
        'postal_code',
        'user_id'
    ];

    const FIELDS = [
        "ID",
        "Aanhef",
        "Initialen",
        "Voornaam",
        "Achternaam",
        "Tussenvoegsel",
        "Geslacht",
        "Bio",
        "Geboortedatum",
        "Prive telefoonnummer",
        "Prive emailadres",
        "Adres",
        "Adres 2",
        "District",
        "Plaats",
        "Postcode",
        "User ID",
        "Gemaakt op",
        "Aangepast op",
        "Real ID",
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];
}