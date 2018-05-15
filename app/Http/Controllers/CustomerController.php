<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use HelloHi\ApiClient\Client;
use HelloHi\ApiClient\Model;

use App\Models\Customer;
use Collection;

use Toastr;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = Model::all('customers', ['creator']);

        $customers = [];

        foreach($response as $customer){
            $newCustomer = $this->makeNewCustomer($customer);
            array_push($customers, $newCustomer);
        }

        $customers = collect($customers);

        $customer_fields = Customer::FIELDS;

        $entity_name = "customers";

        return view('crud.customers.index', compact('customers', 'customer_fields', 'entity_name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$response = Client::create('customers', $request->all());
        $customers = collect(Model::customers(['creator']));
        $customer = $customers->first();

        $customer->create('customers', $request->all());

        Toastr::success('U heeft zojuist een Customer toegevoegd.', 'Gelukt!', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $response = Model::byId('customers', $id);

        $customer = $this->makeNewCustomer($response);

        return view('crud.customers.view', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Model::byId('customers', $id);
        $customer->delete();

        Toastr::success('U heeft zojuist een Customer verwijderd.', 'Gelukt!', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }

    public function makeNewCustomer($customer)
    {
        $newCustomer = new Customer;
        $newCustomer->id = $customer->id;
        $newCustomer->id = $customer->id;
        $newCustomer->name = $customer->name;
        $newCustomer->type = $customer->type;
        $newCustomer->status = $customer->status;
        $newCustomer->email = $customer->email;
        $newCustomer->phone = $customer->phone;
        $newCustomer->website = $customer->website;
        $newCustomer->address = $customer->address;
        $newCustomer->address2 = $customer->address2;
        $newCustomer->city = $customer->city;
        $newCustomer->district = $customer->district;
        $newCustomer->postal_code = $customer->postal_code;
        $newCustomer->country_code = $customer->country_code;
        $newCustomer->mailing_address = $customer->mailing_address;
        $newCustomer->mailing_address2 = $customer->mailing_address2;
        $newCustomer->mailing_city = $customer->mailing_city;
        $newCustomer->mailing_district = $customer->mailing_district;
        $newCustomer->mailing_postal_code = $customer->mailing_postal_code;
        $newCustomer->mailing_country_code = $customer->mailing_country_code;
        $newCustomer->fiscal_number = $customer->fiscal_number;
        $newCustomer->vat_number = $customer->vat_number;
        $newCustomer->tax_number = $customer->tax_number;
        $newCustomer->legal = $customer->legal;
        $newCustomer->bank_account = $customer->bank_account;
        $newCustomer->kvk = $customer->kvk;
        $newCustomer->currency = $customer->currency;
        $newCustomer->pay_term = $customer->pay_term;
        $newCustomer->comment = $customer->comment;
        $newCustomer->location = $customer->location;
        $newCustomer->branch_id = $customer->branch_id;
        $newCustomer->contact_person_id = $customer->contact_person_id;
        return $newCustomer;
    }
}
