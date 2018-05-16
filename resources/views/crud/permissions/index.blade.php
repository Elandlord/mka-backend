@extends('layouts.master')

@section('content')
    <div class="col-lg-12 bg-light shadow-xs space-inside-md space-outside-up-xl">      
        <h1 class="space-inside-left-sm"><strong class="text-color-main">Permissions</strong> • beheren</h1>    

        <div v-cloak>
            <tabs>
                <tab name="Alle permissions">
                    @include('crud.read.read', ['objects' => $permissions, 'fields' => $permission_fields])
                </tab>
                <tab name="Permission toevoegen">
                    @include('crud.permissions.operations.add')
                </tab>
            </tabs>
        </div>
    </div>
@endsection