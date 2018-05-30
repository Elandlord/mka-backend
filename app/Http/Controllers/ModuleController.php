<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use HelloHi\ApiClient\Client;
use HelloHi\ApiClient\Model;

use App\Models\Module;

use Carbon\Carbon;

use Toastr;

class ModuleController extends Controller
{
    public function getModules()
    {
        $currentPage = request()->get('page');
        $perPage = 15;
        $response = Model::all('modules', ['creator'], $perPage, $currentPage);

        $modules = [];

        foreach($response as $module){
            $newModule = $this->makeNewModule($module);
            array_push($modules, $newModule);
        }

        $range = range(1, $response->total());
        $pagination = $this->paginate($range, $perPage);


        return [
            "pagination" => $pagination,
            "modules" => $modules
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = $this->getModules();

        $pagination = $response['pagination'];
        $modules = $response['modules'];

        $module_fields = Module::FIELDS;

        $entity_name = "modules";

        return view('crud.modules.index', compact('modules', 'module_fields', 'entity_name', 'pagination'));
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
        $response = Model::create('modules', $request->all());
        
        if($response != null) {
            Toastr::success('U heeft zojuist een Module toegevoegd.', 'Gelukt!', ["positionClass" => "toast-top-right"]);
            return redirect('/modules');
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
        $response = Model::byId('modules', $id);

        if($response != null) {
            $module = $this->makeNewModule($response);
            return view('crud.modules.view', compact('module'));
        }

        $client = Client::getInstance();
        var_dump($client->lastError);
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
        $module = Model::byId('modules', $id);

        $response = $module->update($request->all());

        if($response != null) {
            Toastr::success('U heeft zojuist een Module aangepast.', 'Gelukt!', ["positionClass" => "toast-top-right"]);
            return redirect('/modules');
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
        $module = Model::byId('modules', $id);
        $module->delete();

        Toastr::success('U heeft zojuist een Module verwijderd.', 'Gelukt!', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
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
        $newModule->created_at = Carbon::createFromTimestamp($module->created_at);
        $newModule->updated_at = Carbon::createFromTimestamp($module->updated_at);
        $newModule->real_id = $module->real_id;
        return $newModule;
    }
}
