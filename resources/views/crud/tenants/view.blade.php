@extends('layouts.master')

@section('content')
    <div class="col-lg-12 bg-light shadow-xs space-inside-md space-outside-up-xl space-inside-left-md">      
        <h1><strong class="text-color-main">{{ $tenant->name }}</strong> • bewerken</h1> 

        @include('decorators.back-button')

        <div class="row space-outside-md">
            <div class="col-lg-6">
                <form method="POST" action="/tenants/{{ $tenant->id }}">
                    @csrf
                    <input name="_method" type="hidden" value="PUT">                    
                    <div class="form-group">
                        <label for="name">Naam</label>
                        <input type="text" class="form-control" placeholder="Naam" name="name" id="name" value="{{ $tenant->name }}" required/>
                    </div>
                    <div class="form-group">
                        <label for="subdomain">Subdomein</label>
                        <input type="text" class="form-control" placeholder="Subdomein" name="subdomain" id="subdomain" value="{{ $tenant->subdomain }}" required/>
                    </div>
                    <div class="form-group">
                        <label for="hexcolor-primary">Primaire kleur</label>
                        <input type="color" id="colorpicker-primary" name="color" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" value="{{ $tenant->primary_color }}"> 
                        <input type="text" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" class="form-control" name="primary_color" value="{{ $tenant->primary_color }}" id="hexcolor-primary"></input>
                    </div>
                    <div class="form-group">
                        <label for="hexcolor-primary-text-color">Primaire tekstkleur</label>
                        <input type="color" id="colorpicker-primary-text" name="color" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" value="{{ $tenant->primary_color_text }}"> 
                        <input type="text" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" class="form-control" name="primary_color_text" value="{{ $tenant->primary_color_text }}" id="hexcolor-primary-text-color"></input>
                    </div>
                    <div class="form-group">
                        <label for="hexcolor-secondary-color">Secundaire kleur</label>
                        <input type="color" id="colorpicker-secondary" name="color" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" value="{{ $tenant->secondary_color }}"> 
                        <input type="text" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" class="form-control" name="secondary_color" value="{{ $tenant->secondary_color }}" id="hexcolor-secondary-color"></input>
                    </div>
                    <div class="form-group">
                        <label for="hexcolor-secondary-text-color">Secundaire tekstkleur</label>
                        <input type="color" id="colorpicker-secondary-text" name="color" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" value="{{ $tenant->secondary_color_text }}"> 
                        <input type="text" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" class="form-control" name="secondary_color_text" value="{{ $tenant->secondary_color_text }}" id="hexcolor-secondary-text-color"></input>
                    </div>
                    <div class="form-group">
                        <button class="btn bg-secondary bg-secondary-hover-lighten-xs transition-fast text-color-light">Opslaan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection