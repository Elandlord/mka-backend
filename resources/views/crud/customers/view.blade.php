@extends('layouts.master')

@section('content')
    <div class="col-lg-12 bg-light shadow-xs space-inside-md space-outside-up-xl space-inside-left-md">      
        <h1><strong class="text-color-main">{{ $customer->name }}</strong> • bewerken</h1> 

        @include('decorators.back-button')

        <div class="row space-outside-md">
            <div class="col-lg-6">
                <form method="POST" action="/customers/{{ $customer->id }}">
                    @csrf
                    <input name="_method" type="hidden" value="PUT">
                    <div class="form-group">
                        <label for="name">Naam</label>
                        <input type="text" class="form-control" placeholder="Naam" name="name" id="name" value="{{ $customer->name }}" required/>
                    </div>
                    <div class="form-group">
                        {{-- To-do: add foreach with types -> check if selected --}}
                        <label for="type">Type</label>
                        <select name="type" class="form-control" id="type">
                            @foreach($customer_types as $type)
                                @if($customer->type == $type)
                                    <option value="{{ $type }}" selected>{{ ucfirst($type) }}</option>                                    
                                @else
                                    <option value="{{ $type }}">{{ ucfirst($type) }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        {{-- To-do: add foreach with statuses -> check if selected --}}
                        <label for="status">Status</label>
                        <select name="status" class="form-control" id="status">
                            @foreach($customer_statuses as $status)
                                @if($customer->status == $status)
                                    <option value="{{ $status }}" selected>{{ ucfirst($status) }}</option>                                    
                                @else
                                    <option value="{{ $status }}">{{ ucfirst($status) }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" placeholder="Email" name="email" id="email" value="{{ $customer->email }}" required/>
                    </div>
                    <div class="form-group">
                        <label for="phone">Telefoonnummer</label>
                        <input type="text" class="form-control" placeholder="Telefoonnummer" name="phone" id="phone" value="{{ $customer->phone }}" required/>
                    </div>
                    <div class="form-group">
                        <label for="website">Website</label>
                        <input type="text" class="form-control" placeholder="Website" name="website" id="website" value="{{ $customer->website }}" required/>
                    </div>
                    <div class="form-group">
                        <label for="address">Adres</label>
                        <input type="text" class="form-control" placeholder="Adres" name="address" id="address" value="{{ $customer->address }}" required/>
                    </div>
                    <div class="form-group">
                        <label for="address2">Adres 2</label>
                        <input type="text" class="form-control" placeholder="Adres 2" name="address2" id="address2" value="{{ $customer->address2 }}" required/>
                    </div>
                    <div class="form-group">
                        <label for="city">Plaats</label>
                        <input type="text" class="form-control" placeholder="Plaats" name="city" id="city" value="{{ $customer->city }}" required/>
                    </div>
                    <div class="form-group">
                        <label for="district">District</label>
                        <input type="text" class="form-control" placeholder="District" name="district" id="district" value="{{ $customer->district }}" required/>
                    </div>
                    <div class="form-group">
                        <label for="postal_code">Postcode</label>
                        <input type="text" class="form-control" placeholder="Postcode" name="postal_code" id="postal_code" value="{{ $customer->postal_code }}" required/>
                    </div>
                    <div class="form-group">
                        <label for="country_code">Landcode</label>
                        <select name="country_code" id="country_code" class="form-control">
                            @foreach($country_codes as $country_code)
                                @if($country_code == $customer->country_code)
                                    <option value="{{ $country_code }}" selected>{{ $country_code}}</option>
                                @else
                                    <option value="{{ $country_code }}">{{ $country_code}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="mailing_address">Postbus adres</label>
                        <input type="text" class="form-control" placeholder="Postbus adres" name="mailing_address" id="mailing_address" value="{{ $customer->mailing_address }}" required/>
                    </div>
                    <div class="form-group">
                        <label for="mailing_address2">Postbus adres 2</label>
                        <input type="text" class="form-control" placeholder="Postbus adres 2" name="mailing_address2" id="mailing_address2" value="{{ $customer->mailing_address2 }}" required/>
                    </div>
                    <div class="form-group">
                        <label for="mailing_city">Postbus plaats</label>
                        <input type="text" class="form-control" placeholder="Postbus plaats" name="mailing_city" id="mailing_city" value="{{ $customer->mailing_city }}" required/>
                    </div>
                    <div class="form-group">
                        <label for="mailing_district">Postbus district</label>
                        <input type="text" class="form-control" placeholder="Postbus district" name="mailing_district" id="mailing_district" value="{{ $customer->mailing_district }}" required/>
                    </div>
                    <div class="form-group">
                        <label for="mailing_postal_code">Postbus postcode</label>
                        <input type="text" class="form-control" placeholder="Postbus postcode" name="mailing_postal_code" id="mailing_postal_code" value="{{ $customer->mailing_postal_code }}" required/>
                    </div>
                    <div class="form-group">
                        <label for="mailing_country_code">Postbus landcode</label>
                        <select name="mailing_country_code" id="mailing_country_code" class="form-control">
                            @foreach($country_codes as $country_code)
                                @if($country_code == $customer->mailing_country_code)
                                    <option value="{{ $country_code }}" selected>{{ $country_code}}</option>
                                @else
                                    <option value="{{ $country_code }}">{{ $country_code}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="fiscal_number">Fiscaal nummer</label>
                        <input type="text" class="form-control" placeholder="Fiscaal nummer" name="fiscal_number" id="fiscal_number" value="{{ $customer->fiscal_number }}" required/>
                    </div>
                    <div class="form-group">
                        <label for="vat_number">BTW-nummer</label>
                        <input type="text" class="form-control" placeholder="BTW-nummer" name="vat_number" id="vat_number" value="{{ $customer->vat_number }}" required/>
                    </div>
                    <div class="form-group">
                        <label for="tax_number">Belastingnummer</label>
                        <input type="text" class="form-control" placeholder="Belastingnummer" name="tax_number" id="tax_number" value="{{ $customer->tax_number }}" required/>
                    </div>
                    <div class="form-group">
                        <label for="legal">Legal</label>
                        <input type="text" class="form-control" placeholder="Legal" name="legal" id="legal" value="{{ $customer->legal }}" required/>
                    </div>
                    <div class="form-group">
                        <label for="fiscal_number">Fiscaal nummer</label>
                        <input type="text" class="form-control" placeholder="Fiscaal nummer" name="fiscal_number" id="fiscal_number" value="{{ $customer->fiscal_number }}" required/>
                    </div>
                    <div class="form-group">
                        <label for="bank_account">Bankrekeningnummer</label>
                        <input type="text" class="form-control" placeholder="Bankrekeningnummer" name="bank_account" id="bank_account" value="{{ $customer->bank_account }}" required/>
                    </div>
                    <div class="form-group">
                        <label for="kvk">KVK-nummer</label>
                        <input type="text" class="form-control" placeholder="KVK-nummer" name="kvk" id="kvk" value="{{ $customer->kvk }}" required/>
                    </div>
                    <div class="form-group">
                        <label for="currency">Valuta</label>
                        <select name="currency" id="currency" class="form-control">
                            @foreach($currencies as $currency)
                                @if($currency == $customer->currency)
                                    <option value="{{ $currency }}" selected>{{ $currency}}</option>                                    
                                @else
                                    <option value="{{ $currency }}">{{ $currency}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pay_term">Betalingstermijn</label>
                        <input type="text" class="form-control" placeholder="Betalingstermijn" name="pay_term" id="pay_term" value="{{ $customer->pay_term }}" required/>
                    </div>
                    <div class="form-group">
                        <label for="comment">Notitie</label>
                        <input type="text" class="form-control" placeholder="Notitie" name="comment" id="comment" value="{{ $customer->comment }}" required/>
                    </div>
                    <div class="form-group">
                        <label for="location">Locatie</label>
                        <input type="text" class="form-control" placeholder="Locatie" name="location" id="location" value="{{ $customer->location }}" required/>
                    </div>
                    <div class="form-group">
                        <label for="branch_id">Branch</label>
                        <select name="branch_id" id="branch_id" class="form-control">
                            @foreach($branches as $branch)
                                @if($branch->id == $customer->branch_id)
                                    <option value="{{ $branch->id }}" selected>{{ $branch->name }}</option>                                    
                                @else
                                    <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="contact_person_id">Contactpersoon</label>
                        <select name="contact_person_id" id="contact_person_id" class="form-control">
                            @foreach($contact_persons as $person)
                                @if($person->id == $customer->contact_person_id)
                                    <option value="{{ $person->id }}" selected>{{ $person->first_name }} {{ $person->last_name }}</option>                                    
                                @else
                                    <option value="{{ $person->id }}">{{ $person->first_name }} {{ $person->last_name }}</option>
                                @endif
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