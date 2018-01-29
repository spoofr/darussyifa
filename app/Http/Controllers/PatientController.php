<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patients;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Patients::all();
        return view('patients.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $patients = Patients::all();
        return view('patients.create', compact('patients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation
        $this->validate($request, [
            'name' => 'required|max:50',
            'ic_number' => 'required|max:20',
            'gender' => 'required',
            'phone_number' => 'required|max:15',
            'email' => 'required|max:20',
            'address' => 'required|max:100',
            'postcode' => 'required|max:10',
            'state' => 'required|max:20',
        ]);

        // Save to database
        $patient = new Patients;

        $patient->name = $request->name;
        $patient->ic_number = $request->ic_number;
        $patient->gender = $request->gender;
        $patient->phone_number = $request->phone_number;
        $patient->email = $request->email;
        $patient->address = $request->address;
        $patient->postcode = $request->postcode;
        $patient->state = $request->state;

        $patient->save();

        // Return view
        return redirect()->route('patient.create');
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
}
