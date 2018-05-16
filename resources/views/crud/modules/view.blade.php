@extends('layouts.master')

@section('content')
    <div class="col-lg-12 bg-light shadow-xs space-inside-md space-outside-up-xl space-inside-left-md">      
        <h1><strong class="text-color-main">{{ $module->name }}</strong> • bewerken</h1> 

        @include('decorators.back-button')

        <div class="row space-outside-md">
            <div class="col-lg-6">
                <form method="POST" action="/modules/{{ $module->id }}">
                    @csrf
                    <input name="_method" type="hidden" value="PUT">                    
                <div class="form-group">
                    <label for="name">Naam</label>
                    <input type="text" class="form-control" placeholder="Naam" name="name" id="name" value="{{ $module->name }}" required/>
                </div>
                <div class="form-group">
                    <label for="description">Beschrijving</label>
                    <textarea class="form-control" placeholder="Beschrijving" name="description" id="description" required>{{ $module->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="logo">Logo</label>
                    <input type="text" class="form-control" placeholder="Logo" name="logo" id="logo" value="{{ $module->logo }}" />
                </div>
                <div class="form-group">
                    <label for="action">Action</label>
                    <input type="text" class="form-control" placeholder="Action" name="action" id="action" value="{{ $module->action }}" required/>
                </div>
                <div class="form-group">
                    <label for="is_active">Actief</label>
                    <select class="form-control" name="is_active" id="is_active">
                        @if($module->is_active == 1)
                            <option value="1" selected>Actief</option>
                        @else
                            <option value="0" selected>Niet actief</option>
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <label for="key">Key</label>
                    <input type="text" class="form-control" placeholder="Key" name="key" id="key" value="{{ $module->key }}" required/>
                </div>
                <div class="form-group">
                    <label for="priority">Prioriteit</label>
                    <input type="number" class="form-control" placeholder="Prioriteit" name="priority" id="priority" value="{{ $module->priority }}"/>
                </div>
                    <div class="form-group">
                        <button class="btn bg-secondary bg-secondary-hover-lighten-xs transition-fast text-color-light">Opslaan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection