@extends('layouts.master')

@section('content')
    <div class="col-lg-12 bg-light shadow-xs space-inside-md space-outside-up-xl">      
        <h1 class="space-inside-left-sm"><strong class="text-color-main">Persons</strong> • beheren</h1>    

        <div v-cloak>
            <tabs>
                <tab name="Alle Persons">
                    @include('crud.read.read', ['objects' => $persons, 'fields' => $person_fields])
                </tab>
                <tab name="Person toevoegen">
                    @include('crud.persons.operations.add')
                </tab>
            </tabs>
        </div>
    </div>
@endsection