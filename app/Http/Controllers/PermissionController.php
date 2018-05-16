<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use HelloHi\ApiClient\Client;
use HelloHi\ApiClient\Model;

use App\Models\Permission;

class PermissionController extends Controller
{
    public function getPermissions()
    {
        $response = Model::all('permissions', ['creator']);

        $permissions = [];

        foreach($response as $permission){
            $newPermission = $this->makeNewPermission($permission);
            array_push($permissions, $newPermission);
        }

        return $permissions;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = $this->getPermissions();

        $permissions = collect($permissions);

        $permission_fields = Permission::FIELDS;

        $entity_name = "permissions";

        return view('crud.permissions.index', compact('permissions', 'permission_fields', 'entity_name'));        
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

    public function makeNewPermission($permission)
    {
        $newPermission = new Permission;
        $newPermission->id = $permission->id;
        $newPermission->name = $permission->name;
        $newPermission->description = $permission->description;
        $newPermission->display_name = $permission->display_name;
        return $newPermission;
    }
}
