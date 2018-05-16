<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use HelloHi\ApiClient\Client;
use HelloHi\ApiClient\Model;

use App\Models\Tenant;
use App\Models\Module;

use Toastr;

class TenantController extends Controller
{
    public function getModules()
    {
        $response = Model::all('modules', ['creator']);

        $modules = [];

        foreach($response as $module){
            $newModule = $this->makeNewModule($module);
            array_push($modules, $newModule);
        }

        return $modules;
    }

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
            $newTenant = $this->makeNewTenant($tenant);
            array_push($tenants, $newTenant);
        }

        $tenants = collect($tenants);

        $modules = $this->getModules();

        $tenant_fields = Tenant::FIELDS;

        $entity_name = "tenants";

        return view('crud.tenants.index', compact('tenants', 'tenant_fields', 'entity_name', 'modules'));
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
        $response = Model::create('tenants', $request->all());
        
        if($response != null) {
            Toastr::success('U heeft zojuist een Tenant toegevoegd.', 'Gelukt!', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }

        $client = Client::getInstance();
        var_dump($client->lastError);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $response = Model::byId('tenants', $id);

        $tenant = $this->makeNewTenant($response);

        return view('crud.tenants.view', compact('tenant'));
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
        $tenant = Model::byId('tenants', $id);

        $response = $tenant->update($request->all());

        if($response != null) {
            Toastr::success('U heeft zojuist een Tenant aangepast.', 'Gelukt!', ["positionClass" => "toast-top-right"]);
            return redirect('/tenants');
        }

        $client = Client::getInstance();
        var_dump($client->lastError);
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

    public function makeNewTenant($tenant)
    {
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
        return $newTenant;
    }

    public function makeNewModule($module)
    {
        $newModule = new Module;
        $newModule->id = $module->id;
        $newModule->name = $module->name;
        $newModule->description = $module->description;
        $newModule->logo = $module->logo;
        $newModule->action = $module->action;
        $newModule->key = $module->key;
        $newModule->priority = $module->priority;
        $newModule->is_active = $module->is_active;
        $newModule->created_at = $module->created_at;
        $newModule->updated_at = $module->updated_at;
        $newModule->real_id = $module->real_id;
        return $newModule;
    }

    public function modules(Request $request)
    {
        $tenant_id = $request->get('tenant_id');
        $tenant_name = $request->get('tenant_name');
        $modules = $request->get('modules');

        // To-do Sync modules
        
        $implode = implode(", ", $modules);

        Toastr::success("U heeft de modules voor ". $tenant_name ." bijgewerkt naar: ". $implode, 'Gelukt!', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
}
