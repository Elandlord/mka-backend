@extends('layouts.master')

@section('content')
    <div class="col-lg-12 bg-light shadow-xs space-inside-md space-outside-up-xl space-inside-left-md">      
        <h1><strong class="text-color-main">{{ $user->first_name }} {{ $user->last_name }}</strong> • bewerken</h1> 

        @include('decorators.back-button')

        <div class="row space-outside-md">
            <div class="col-lg-6">
                <form method="POST" action="/users/{{ $user->id }}">
                    @csrf
                    <input name="_method" type="hidden" value="PATCH">                    
                    <div class="form-group">
                        <label for="first_name">Voornaam</label>
                        <input type="text" class="form-control" placeholder="Voornaam" name="first_name" id="first_name" value="{{ $user->first_name }}" required/>
                    </div>
                     <div class="form-group">
                        <label for="last_name">Achternaam</label>
                        <input type="text" class="form-control" placeholder="Achternaam" name="last_name" id="last_name" value="{{ $user->last_name }}" required/>
                    </div>
                    <div class="form-group">
                        <label for="insertion">Tussenvoegsel</label>
                        <input type="text" class="form-control" placeholder="Tussenvoegsel" name="insertion" id="insertion" value="{{ $user->insertion }}"/>
                    </div>
                    <div class="form-group">
                        <label for="email">Emailadres</label>
                        <input type="text" class="form-control" placeholder="Emailadres" name="email" id="email" value="{{ $user->email }}" required/>
                    </div>
                    <div class="form-group">
                        <label for="is_confirmed">Bevestigd</label>
                        <select class="form-control" name="is_confirmed" id="is_confirmed">
                            @if($user->is_confirmed)
                                <option value="true">Bevestigd</option>
                            @else
                                <option value="false">Niet bevestigd</option>
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <button class="btn bg-secondary bg-secondary-hover-lighten-xs transition-fast text-color-light">Opslaan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection