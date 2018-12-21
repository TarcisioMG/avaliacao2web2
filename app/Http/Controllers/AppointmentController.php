<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointments=\App\Appointment::all();
        return view('appointment/index',compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('appointment/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $appointment= new \App\Appointment;
        $appointment->id_user=Auth::id();
        $appointment->id_doctor=$request->get('id_doctor');
        $appointment->date=$request->get('date');
        $appointment->time=$request->get('time');
        $appointment->save();
        
        return redirect('appointments')->with('success', 'Cadastrado com sucesso');
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
        $appointment = \App\Appointment::find($id);
        return view('appointment/edit',compact('appointment','id'));
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
        $appointment= \App\Appointment::find($id);
        $appointment->date=$request->get('date');
        $appointment->time=$request->get('time');
        $appointment->save();
        return redirect('appointments');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $appointment = \App\Appointment::find($id);
        $appointment->delete();
        return redirect('appointments')->with('success','Registo apagado');
    }
}
