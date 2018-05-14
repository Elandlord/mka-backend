<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use HelloHi\ApiClient\Client;
use HelloHi\ApiClient\Model;

use App\Models\Tenant;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = Model::all('tenants', ['creator']);

        $tenants = [];

        foreach($response as $tenant){
            $newTenant = new Tenant;
            $newTenant->id = $tenant->id;
            $newTenant->name = $tenant->name;
            $newTenant->subdomain = $tenant->subdomain;
            // $newTenant->db_hostname = $tenant->db_hostname;
            // $newTenant->db_database = $tenant->db_database;
            // $newTenant->db_username = $tenant->db_username;
            // $newTenant->db_password = $tenant->db_password;
            // $newTenant->db_encrypted = $tenant->db_encrypted;
            $newTenant->primary_color = $tenant->primary_color;
            $newTenant->primary_color_text = $tenant->primary_color_text;
            $newTenant->secondary_color = $tenant->secondary_color;
            $newTenant->secondary_color_text = $tenant->secondary_color_text;
            array_push($tenants, $newTenant);
        }

        $tenants = collect($tenants);

        $tenant_fields = Tenant::FIELDS;

        $entity_name = "tenants";

        return view('crud.tenants.index', compact('tenants', 'tenant_fields', 'entity_name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
