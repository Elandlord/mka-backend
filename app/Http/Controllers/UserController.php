<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use HelloHi\ApiClient\Client;
use HelloHi\ApiClient\Model;

use App\Models\User;
use App\Models\Permission;
use App\Models\Role;

use Carbon\Carbon;

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

    public function getRoles()
    {
        $response = Model::all('roles', ['creator']);

        $roles = [];

        foreach($response as $role){
            $newRole = $this->makeNewRole($role);
            array_push($roles, $newRole);
        }

        return $roles;
    }

    public function getUsers()
    {
        $currentPage = request()->get('page');
        $perPage = 15;
        $response = Model::all('users', ['creator', 'roles'], $perPage, $currentPage);

        $users = [];

        foreach($response as $user){
            $newUser = $this->makeNewUser($user);
            array_push($users, $newUser);
        }

        $range = range(1, $response->total());
        $pagination = $this->paginate($range, $perPage);


        return [
            "pagination" => $pagination,
            "users" => $users
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = $this->getUsers();

        $pagination = $response['pagination'];
        $users = $response['users'];

        $roles = $this->getRoles();

        $user_fields = User::FIELDS;

        $entity_name = "users";

        return view('crud.users.index', compact('users', 'roles', 'user_fields', 'entity_name', 'pagination'));
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
        $newUser->created_at = Carbon::createFromTimestamp($user->created_at);
        $newUser->updated_at = Carbon::createFromTimestamp($user->updated_at);
        $newUser->readable_created_at = $user->readable_created_at;
        $newUser->readable_updated_at = $user->readable_updated_at;
        $newUser->real_id = $user->real_id;
        $newUser->deleted_at = $user->deleted_at;
        $newUser->roles = collect($user->roles)->pluck('id')->toArray();
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

    public function makeNewRole($role)
    {
        $newRole = new Role;
        $newRole->id = $role->id;
        $newRole->name = $role->name;
        $newRole->description = $role->description;
        $newRole->display_name = $role->display_name;
        $newRole->permissions = $role->permissions;
        return $newRole;
    }

    public function roles(Request $request)
    {
        if($insertion = $request->get('user_insertion')){
            $name = $request->get('user_first_name') . " ". $insertion  ." ". $request->get('user_last_name');
        }else{
            $name = $request->get('user_first_name') ." ". $request->get('user_last_name');
        }


        $user_id = $request->get('user_id');
        $roles_ids = $request->get('roles');

        $client = Client::getInstance();

        $data = [
            "user_id" => $user_id,
            "roles_ids" => $roles_ids
        ];

        $response = $client->post('roles/sync', $data);

        Toastr::success("U heeft de roles van ". $name ." succesvol aangepast", 'Gelukt!', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
}
