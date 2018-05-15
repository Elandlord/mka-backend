@extends('layouts.master')

@section('content')
    <div class="col-lg-12 bg-light shadow-xs space-inside-md space-outside-up-xl space-inside-left-md">      
        <h1><strong class="text-color-main">{{ $tenant->name }}</strong> • bewerken</h1> 

        @include('decorators.back-button')

        <div class="row space-outside-md">
            <div class="col-lg-6">
                <form method="POST" action="/tenants">
                    @csrf
                    <div class="form-group">
                        <label for="name">Naam</label>
                        <input type="text" class="form-control" placeholder="Naam" name="name" id="name" value="{{ $tenant->name }}" required/>
                    </div>
                    <div class="form-group">
                        <label for="subdomain">Subdomein</label>
                        <input type="text" class="form-control" placeholder="Subdomein" name="subdomain" id="subdomain" value="{{ $tenant->subdomain }}" required/>
                    </div>
                    <div class="form-group">
                        <label for="primary_color">Primaire kleur</label>
                        <input type="text" class="form-control" placeholder="Naam" name="primary_color" id="primary_color" value="{{ $tenant->primary_color }}" required/>
                    </div>
                    <div class="form-group">
                        <label for="primary_color_text">Primaire tekstkleur</label>
                        <input type="text" class="form-control" placeholder="Primaire tekstkleur" name="primary_color_text" id="primary_color_text" value="{{ $tenant->primary_color_text }}" required/>
                    </div>
                    <div class="form-group">
                        <label for="secondary_color">Secundaire kleur</label>
                        <input type="text" class="form-control" placeholder="Secundaire kleur" name="secondary_color" id="secondary_color" value="{{ $tenant->secondary_color }}" required/>
                    </div>
                    <div class="form-group">
                        <label for="secondary_color_text">Secundaire tekstkleur</label>
                        <input type="text" class="form-control" placeholder="Secundaire tekstkleur" name="secondary_color_text" id="secondary_color_text" value="{{ $tenant->secondary_color_text }}" required/>
                    </div>
                    <div class="form-group">
                        <button class="btn bg-secondary bg-secondary-hover-lighten-xs transition-fast text-color-light">Opslaan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection