@extends('layouts.master')

@section('content')
    <div class="col-lg-12 bg-light shadow-xs space-inside-md space-outside-up-xl">      
        <h1 class="space-inside-left-sm"><strong class="text-color-main">Users</strong> • beheren</h1>    

        <div v-cloak>
            <tabs>
                <tab name="Alle Users">
                    @include('crud.read.read', ['objects' => $users, 'fields' => $user_fields])
                </tab>
                <tab name="User toevoegen">
                    @include('crud.users.operations.add')
                </tab>
                <tab name="Roles per User">
                    @include('crud.users.operations.roles')
                </tab>
            </tabs>
        </div>
    </div>
@endsection