@extends('layouts.master')

@section('content')
    <div class="col-lg-12 bg-light shadow-xs space-inside-md space-outside-up-xl">      
        <h1 class="space-inside-left-sm"><strong class="text-color-main">Customers</strong> • beheren</h1> 
        
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