@extends('layouts.master')

@section('content')
<div class="col-lg-12 bg-light shadow-xs space-inside-md space-outside-up-xl space-inside-left-md">      
    <h1><strong class="text-color-main">{{ $person->first_name }} {{ $person->last_name }}</strong> • bewerken</h1> 

    @include('decorators.back-button')
    <div class="row space-outside-sm">
        <div class="col-lg-6">
            <form method="POST" action="/persons/{{ $person->id }}">
                @csrf
                <input name="_method" type="hidden" value="PUT">        
                <div class="form-group">
                    <label for="salutation">Aanhef</label>
                    <input type="text" class="form-control" value="{{ $person->salutation }}" placeholder="Aanhef" name="salutation" id="salutation" required/>
                </div>
                <div class="form-group">
                    <label for="initials">Initialen</label>
                    <input type="text" class="form-control" value="{{ $person->initials }}" placeholder="Initialen" name="initials" id="initials" required/>
                </div>
                <div class="form-group">
                    <label for="first_name">Voornaam</label>
                    <input type="text" class="form-control" value="{{ $person->first_name }}" placeholder="Voornaam" name="first_name" id="first_name"/>
                </div>
                <div class="form-group">
                    <label for="last_name">Achternaam</label>
                    <input type="text" class="form-control" value="{{ $person->last_name }}" placeholder="Achternaam" name="last_name" id="last_name" required/>
                </div>
                <div class="form-group">
                    <label for="insertion">Tussenvoegsel</label>
                    <input type="text" class="form-control" value="{{ $person->insertion }}" placeholder="Tussenvoegsel" name="insertion" id="insertion" required/>
                </div>
                <div class="form-group">
                    <label for="gender">Geslacht</label>
                    <select class="form-control" name="gender" id="gender">
                        <option value="m">Man</option>
                        <option value="f">Vrouw</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="bio">Bio</label>
                    <textarea class="form-control" name="bio" id="bio" />{{ $person->bio }}</textarea>
                </div>
                <div class="form-group">
                    <label for="date_of_birth">Geboortedatum</label>
                    <input type="date" class="form-control" value="{{ $person->date_of_birth }}" placeholder="Geboortedatum" name="date_of_birth" id="date_of_birth" required/>
                </div>
                <div class="form-group">
                    <label for="phone_number_private">Telefoonnummer (Prive)</label>
                    <input type="text" class="form-control" value="{{ $person->phone_number_private }}" placeholder="Telefoonnummer (Prive)" name="phone_number_private" id="phone_number_private" required/>
                </div>
                <div class="form-group">
                    <label for="email_private">Emailadres (Prive)</label>
                    <input type="text" class="form-control" value="{{ $person->email_private }}" placeholder="Emailadres (Prive)" name="email_private" id="email_private" required/>
                </div>
                <div class="form-group">
                    <label for="address">Adres</label>
                    <input type="text" class="form-control" value="{{ $person->address }}" placeholder="Adres" name="address" id="address" required/>
                </div>
                <div class="form-group">
                    <label for="address2">Adres 2</label>
                    <input type="text" class="form-control" value="{{ $person->address2 }}" placeholder="Adres 2" name="address2" id="address2" required/>
                </div>
                <div class="form-group">
                    <label for="district">District</label>
                    <input type="text" class="form-control" value="{{ $person->district }}" placeholder="District" name="district" id="district" required/>
                </div>
                <div class="form-group">
                    <label for="city">Plaats</label>
                    <input type="text" class="form-control" value="{{ $person->city }}" placeholder="Plaats" name="city" id="city" required/>
                </div>
                <div class="form-group">
                    <label for="postal_code">Postcode</label>
                    <input type="text" class="form-control" value="{{ $person->postal_code }}" placeholder="Postcode" name="postal_code" id="postal_code" required/>
                </div>
                <div class="form-group">
                    <label for="user_id">User</label>
                    <select name="user_id" id="user_id" class="form-control">
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->first_name }} {{ $user->last_name }}</option>
                        @endforeach
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