<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use HelloHi\ApiClient\Client;
use HelloHi\ApiClient\Model;

use App\Models\Permission;

use Toastr;

class PermissionController extends Controller
{
    public function getPermissions()
    {
        $currentPage = request()->get('page');
        $perPage = 15;
        $response = Model::all('permissions', ['creator'], $perPage, $currentPage);

        $permissions = [];

        foreach($response as $permission){
            $newPermission = $this->makeNewPermission($permission);
            array_push($permissions, $newPermission);
        }

        $range = range(1, $response->total());
        $pagination = $this->paginate($range, $perPage);
    
        return [
            "pagination" => $pagination,
            "permissions" => $permissions
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = $this->getPermissions();

        $pagination = $response['pagination'];
        $permissions = $response['permissions'];

        $permission_fields = Permission::FIELDS;

        $entity_name = "permissions";

        return view('crud.permissions.index', compact('permissions', 'permission_fields', 'entity_name', 'pagination'));        
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
        $response = Model::create('permissions', $request->all());
        
        if($response != null) {
            Toastr::success('U heeft zojuist een Permission toegevoegd.', 'Gelukt!', ["positionClass" => "toast-top-right"]);
            return redirect('/permissions');
        }

        $client = Client::getInstance();
        Toastr::error("Er is iets misgegaan. Error: ". $client->lastError, 'Mislukt!', ["positionClass" => "toast-top-right"]);
        return redirect('/permissions');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $response = Model::byId('permissions', $id);

        $permission = $this->makeNewPermission($response);

        return view('crud.permissions.view', compact('permission'));
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
        $permission = Model::byId('permissions', $id);
        $permission->delete();

        Toastr::success('U heeft zojuist een Permission verwijderd.', 'Gelukt!', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
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
