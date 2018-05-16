@extends('layouts.master')

@section('content')
    <div class="col-lg-12 bg-light shadow-xs space-inside-md space-outside-up-xl">      
        <h1 class="space-inside-left-sm"><strong class="text-color-main">Modules</strong> • beheren</h1>    

        <div v-cloak>
            <tabs>
                <tab name="Alle modules">
                    @include('crud.read.read', ['objects' => $modules, 'fields' => $module_fields])
                </tab>
                <tab name="Module toevoegen">
                    @include('crud.modules.operations.add')
                </tab>
            </tabs>
        </div>
    </div>
@endsection