<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use HelloHi\ApiClient\Client;
use HelloHi\ApiClient\Model;

use App\Models\Customer;
use App\Models\Branch;
use App\Models\Person;

use Collection;

use Toastr;

class CustomerController extends Controller
{
    public $country_codes = [
        "ABW","AFG","AGO","AIA","ALA","ALB","AND","ANT","ARE","ARG","ARM","ASM","ATA","ATF","ATG","AUS","AUT","AZE","BDI","BEL","BEN","BFA","BGD","BGR","BHR","BHS",
        "BIH","BLM","BLR","BLZ","BMU","BOL","BRA","BRB","BRN","BTN","BVT","BWA","CAF","CAN","CCK","CHE","CHL","CHN","CIV","CMR","COD","COG","COK","COL","COM","CPV",
        "CRI","CUB","CXR","CYM","CYP","CZE","DEU","DJI","DMA","DNK","DOM","DZA","ECU","EGY","ERI","ESH","ESP","EST","ETH","FIN","FJI","FLK","FRA","FRO","FSM","GAB",
        "GBR","GEO","GGY","GHA","GIB","GIN","GLP","GMB","GNB","GNQ","GRC","GRD","GRL","GTM","GUF","GUM","GUY","HKG","HMD","HND","HRV","HTI","HUN","IDN","IMN","IND",
        "IOT","IRL","IRN","IRQ","ISL","ISR","ITA","JAM","JEY","JOR","JPN","KAZ","KEN","KGZ","KHM","KIR","KNA","KOR","KWT","LAO","LBN","LBR","LBY","LCA","LIE","LKA",
        "LSO","LTU","LUX","LVA","MAC","MAF","MAR","MCO","MDA","MDG","MDV","MEX","MHL","MKD","MLI","MLT","MMR","MNE","MNG","MNP","MOZ","MRT","MSR","MTQ","MUS","MWI",
        "MYS","MYT","NAM","NCL","NER","NFK","NGA","NIC","NIU","NLD","NOR","NPL","NRU","NZL","OMN","PAK","PAN","PCN","PER","PHL","PLW","PNG","POL","PRI","PRK","PRT",
        "PRY","PSE","PYF","QAT","REU","ROU","RUS","RWA","SAU","SDN","SEN","SGP","SGS","SHN","SJM","SLB","SLE","SLV","SMR","SOM","SPM","SRB","STP","SUR","SVK","SVN",
        "SWE","SWZ","SYC","SYR","TCA","TCD","TGO","THA","TJK","TKL","TKM","TLS","TON","TTO","TUN","TUR","TUV","TWN","TZA","UGA","UKR","UMI","URY","USA","UZB","VAT",
        "VCT","VEN","VGB","VIR","VNM","VUT","WLF","WSM","YEM","ZAF","ZMB","ZWE"
    ];

    public $currencies = [
        "AED","AFN","ALL","AMD","ANG","AOA","ARS","AUD","AWG","AZN","BAM","BBD","BDT","BGN","BHD","BIF","BMD","BND","BOB","BRL","BSD","BTN","BWP","BYN","BZD","CAD",
        "CDF","CHF","CLP","CNY","COP","CRC","CUC","CUP","CVE","CZK","DJF","DKK","DOP","DZD","EGP","ERN","ETB","EUR","FJD","FKP","GBP","GEL","GGP","GHS","GIP","GMD",
        "GNF","GTQ","GYD","HKD","HNL","HRK","HTG","HUF","IDR","ILS","IMP","INR","IQD","IRR","ISK","JEP","JMD","JOD","JPY","KES","KGS","KHR","KMF","KPW","KRW","KWD",
        "KYD","KZT","LAK","LBP","LKR","LRD","LSL","LYD","MAD","MDL","MGA","MKD","MMK","MNT","MOP","MRU","MUR","MVR","MWK","MXN","MYR","MZN","NAD","NGN","NIO","NOK",
        "NPR","NZD","OMR","PAB","PEN","PGK","PHP","PKR","PLN","PYG","QAR","RON","RSD","RUB","RWF","SAR","SBD","SCR","SDG","SEK","SGD","SHP","SLL","SOS","SPL","SRD",
        "STN","SVC","SYP","SZL","THB","TJS","TMT","TND","TOP","TRY","TTD","TVD","TWD","TZS","UAH","UGX","USD","UYU","UZS","VEF","VND","VUV","WST","XAF","XCD","XDR",
        "XOF","XPF","YER","ZAR","ZMW","ZWD"
    ];

    public $customer_statuses = [
        "customer", "prospect", "blocked", "canceled"
    ];

    public $customer_types = [
        "business", "person"
    ];

    public function getContactPersons()
    {
        $responseContactPersons = Model::all('persons', ['creator']);

        $contact_persons = [];

        foreach($responseContactPersons as $person){
            $newPerson = $this->makeNewPerson($person);
            array_push($contact_persons, $newPerson);
        }

        return $contact_persons;
    }

    public function getBranches()
    {
        $responseBranches = Model::all('branches', ['creator']);        

        $branches = [];

        foreach($responseBranches as $branch){
            $newBranch = $this->makeNewBranch($branch);
            array_push($branches, $newBranch);
        }

        return $branches;
    }

    public function getCustomers()
    {
        $response = Model::all('customers', ['creator']);

        $customers = [];

        foreach($response as $customer){
            $newCustomer = $this->makeNewCustomer($customer);
            array_push($customers, $newCustomer);
        }

        $pagiantedCustomers = $this->paginate($customers, 2);

        return $pagiantedCustomers;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = $this->getCustomers();
        $branches = $this->getBranches();
        $contact_persons = $this->getContactPersons();

        $customer_fields = Customer::FIELDS;

        $entity_name = "customers";

        $country_codes = $this->country_codes;
        $currencies = $this->currencies;
        $customer_statuses = $this->customer_statuses;
        $customer_types = $this->customer_types;

        return view('crud.customers.index', compact('customers', 'customer_fields', 'entity_name', 'country_codes', 'currencies', 'branches', 'contact_persons', 'customer_statuses', 'customer_types'));
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
        $response = Model::create('customers', $request->all());

        if($response != null) {
            Toastr::success('U heeft zojuist een Customer toegevoegd.', 'Gelukt!', ["positionClass" => "toast-top-right"]);
            return redirect()->back();
        }
        
        $client = Client::getInstance();
        var_dump($client->lastError);
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

        $branches = $this->getBranches();
        $contact_persons = $this->getContactPersons();

        $country_codes = $this->country_codes;
        $currencies = $this->currencies;
        $customer_statuses = $this->customer_statuses;
        $customer_types = $this->customer_types;

        return view('crud.customers.view', compact('customer', 'branches', 'contact_persons', 'country_codes', 'currencies', 'customer_statuses', 'customer_types'));
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
        $customer = Model::byId('customers', $id);
        $response = $customer->update($request->all());
        

        if($response != null) {
            Toastr::success('U heeft zojuist een Customer aangepast.', 'Gelukt!', ["positionClass" => "toast-top-right"]);
            return redirect('/customers');
        }

        $client = Client::getInstance();
        var_dump($client->lastError);
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

    public function makeNewBranch($branch)
    {
        $newBranch = new Branch;
        $newBranch->id = $branch->id;
        $newBranch->sbi = $branch->sbi;
        $newBranch->name = $branch->name;
        $newBranch->description = $branch->description;
        return $newBranch;
    }

    public function makeNewPerson($person)
    {
        $newPerson = new Person;
        $newPerson->id = $person->id;
        $newPerson->salutation = $person->salutation;
        $newPerson->initials = $person->initials;
        $newPerson->first_name = $person->first_name;
        $newPerson->last_name = $person->last_name;
        $newPerson->insertion = $person->insertion;
        $newPerson->gender = $person->gender;
        $newPerson->bio = $person->bio;
        $newPerson->date_of_birth = $person->date_of_birth;
        $newPerson->phone_number_private = $person->phone_number_private;
        $newPerson->email_private = $person->email_private;
        $newPerson->address = $person->address;
        $newPerson->address2 = $person->address2;
        $newPerson->district = $person->district;
        $newPerson->city = $person->city;
        $newPerson->postal_code = $person->postal_code;
        $newPerson->user_id = $person->user_id;
        $newPerson->created_at = $person->created_at;
        $newPerson->updated_at = $person->updated_at;
        $newPerson->real_id = $person->real_id;
        return $newPerson;
    }
}
