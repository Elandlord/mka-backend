@extends('layouts.master')

@section('content')
    <div class="col-lg-12 bg-light shadow-xs space-inside-md space-outside-up-xl space-inside-left-md">      
        <h1>Customers</h1>    
        
        <div v-cloak>        
            <tabs cache-lifetime="10">
                <tab name="Alle customers">
                    @include('crud.read.read', ['objects' => $customers, 'fields' => $customer_fields])
                </tab>
                <tab name="Voeg customer toe">
                    @include('crud.customers.operations.add')
                </tab>
            </tabs>
        </div>
    </div>
@endsection