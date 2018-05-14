<?php
namespace App\Models;

use App\Models\Model;

class Customer extends Model
{
    protected $fillable = [
        'id',
        'name',
        'type',
        'status',
        'email',
        'phone',
        'website',
        'address',
        'address2',
        'city',
        'district',
        'postal_code',
        'country_code',
        'mailing_address',
        'mailing_address2',
        'mailing_city',
        'mailing_district',
        'mailing_postal_code',
        'mailing_country_code',
        'fiscal_number',
        'vat_number',
        'tax_number',
        'legal',
        'bank_account',
        'kvk',
        'currency',
        'pay_term',
        'comment',
        'location',
        'branch_id',
        'contact_person_id'
    ];

    const FIELDS = [
        'ID',
        'Naam',
        'Type',
        'Status',
        'Email',
        'Telefoonnummer',
        'Website',
        'Adres',
        'Adres 2',
        'Plaats',
        'District',
        'Postcode',
        'Landcode',
        'Postbus ',
        'Postbus 2',
        'Postbus plaats',
        'Postbus district',
        'Postbus postcode',
        'Postbus landcode',
        'Fiscaal nummer',
        'BTW-nummer',
        'Belastingnummer',
        'Legal',
        'Banknummer',
        'KVK',
        'Valuta',
        'Betalingstermijn',
        'Notitie',
        'Locatie',
        'Branch ID',
        'Contactpersoon ID'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}