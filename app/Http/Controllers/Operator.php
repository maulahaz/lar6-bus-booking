<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Operator_mdl;

class Operator extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //--Models:
        $dtOperators = Operator_mdl::get();
        // dd($dtOperators);

        $data['title'] = 'My Laravel Apps'; 
        $data['pageTitle'] = 'Bus Operators'; 
        $data['dtOperators'] = $dtOperators; 
        return view('operators.v_index', $data);
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
        return $request->all();
        $this->validate($request,[
            'operator_name'     => 'required',
            'operator_email'    => 'required',
            'operator_address'  => 'required',
            'operator_phone'    => 'required',
            'operator_logo'     => 'image|max:2048',
        ]);

        $image = $request->file('operator_logo');
        $image_name = rand().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('operator_images'), $image_name);

        $mdlOperator = new Operator_mdl;
        $mdlOperator->operator_name     = $request->operator_name;
        $mdlOperator->operator_email    = $request->operator_email;
        $mdlOperator->operator_address  = $request->operator_address;
        $mdlOperator->operator_phone    = $request->operator_phone;
        $mdlOperator->operator_logo     = $image_name;

        // dd($mdlOperator);
        $mdlOperator->save();

        return redirect()->back()->with('success', 'Operator Added Succssfully!');
        // $newID = $request::get('operator_id');
        // $mdlOperator = Operator_mdl::where('operator_id', $newID);
        // return view('operators.v_index', compact('operators'));
        return view('operators.v_index');
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
