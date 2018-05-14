@extends('layouts.master')

@section('content')
    <div class="col-lg-12 bg-light shadow-xs space-inside-md space-outside-up-xl">      
        <h1 class="space-inside-left-md">Tenants</h1>    

        <div v-cloak>
            <tabs>
                <tab name="Alle tenants">
                    @include('crud.read.read', ['objects' => $tenants, 'fields' => $tenant_fields])
                </tab>
                <tab name="Tenant toevoegen">
                    Toevoegen
                </tab>
            </tabs>
        </div>
    </div>
@endsection