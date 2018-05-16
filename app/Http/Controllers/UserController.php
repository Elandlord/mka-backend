<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use HelloHi\ApiClient\Client;
use HelloHi\ApiClient\Model;

use App\Models\User;
use App\Models\Permission;

use Toastr;

class UserController extends Controller
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

    public function getUsers()
    {
        $response = Model::all('users', ['creator']);

        $users = [];

        foreach($response as $user){
            $newUser = $this->makeNewUser($user);
            array_push($users, $newUser);
        }

        return $users;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->getUsers();
        $permissions = $this->getPermissions();

        $users = collect($users);

        $user_fields = User::FIELDS;

        $entity_name = "users";

        return view('crud.users.index', compact('users', 'permissions', 'user_fields', 'entity_name'));
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
        $response = Model::create('users', $request->all());
        
        if($response != null) {
            Toastr::success('U heeft zojuist een User toegevoegd.', 'Gelukt!', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }

        $client = Client::getInstance();
        Toastr::error("Er is iets misgegaan. Error: ". $client->lastError, 'Mislukt!', ["positionClass" => "toast-top-right"]);
        return redirect('/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $response = Model::byId('users', $id);

        $user = $this->makeNewUser($response);

        return view('crud.users.view', compact('user'));
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
        $user = Model::byId('users', $id);
        $response = $user->update($request->all());
        

        if($response != null) {
            Toastr::success('U heeft zojuist een User aangepast.', 'Gelukt!', ["positionClass" => "toast-top-right"]);
            return redirect('/users');
        }

        $client = Client::getInstance();
        Toastr::error("Er is iets misgegaan. Error: ". $client->lastError, 'Mislukt!', ["positionClass" => "toast-top-right"]);
        return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Model::byId('users', $id);
        $user->delete();

        Toastr::success('U heeft zojuist een User verwijderd.', 'Gelukt!', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }

    public function makeNewUser($user)
    {
        $newUser = new User;
        $newUser->id = $user->id;
        $newUser->first_name = $user->first_name;
        $newUser->last_name = $user->last_name;
        $newUser->insertion = $user->insertion;
        $newUser->email = $user->email;
        $newUser->is_confirmed = $user->is_confirmed;
        $newUser->created_at = $user->created_at;
        $newUser->updated_at = $user->updated_at;
        $newUser->readable_created_at = $user->readable_created_at;
        $newUser->readable_updated_at = $user->readable_updated_at;
        $newUser->real_id = $user->real_id;
        $newUser->deleted_at = $user->deleted_at;
        return $newUser;
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

    public function permissions(Request $request)
    {
        $name = $request->get('first_name') . " " . $request->get('last_name');
        $permissions = $request->get('permissions');

        // To-do SYNC permissions

        Toastr::success("U heeft de permissions voor ". $name ." succesvol aangepast", 'Gelukt!', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
}
