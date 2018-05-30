<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use HelloHi\ApiClient\Client;
use HelloHi\ApiClient\Model;

use App\Models\Person;

class PersonController extends Controller
{
    public function getPersons()
    {
        $currentPage = request()->get('page');
        $perPage = 15;
        $response = Model::all('persons', ['creator'], $perPage, $currentPage);

        $persons = [];

        foreach($response as $person){
            $newPerson = $this->makeNewPerson($person);
            array_push($persons, $newPerson);
        }

        $range = range(1, $response->total());
        $pagination = $this->paginate($range, $perPage);


        return [
            "pagination" => $pagination,
            "persons" => $persons
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = $this->getPersons();

        $pagination = $response['pagination'];
        $persons = $response['persons'];

        $person_fields = Person::FIELDS;

        $entity_name = "persons";

        return view('crud.persons.index', compact('persons', 'person_fields', 'entity_name', 'pagination'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
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
