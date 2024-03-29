<?php

namespace App\Http\Controllers;

use App\HouseProperty;
use Illuminate\Http\Request;
use App\Http\Resources\PropertyCollection;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties = HouseProperty::all()->Array();
        return array_reverse($properties);
    }

    /**
     * Show the form for creating a new resource.
     * @param $request
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $property = new HouseProperty([
            'name' => $request->input('name'),
        ]);
        $property->save();

        return response()->json('The book successfully added');
    }

    /**
     * @param Request $request
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HouseProperty  $property
     * @return \Illuminate\Http\Response
     */
    public function show(HouseProperty $property)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HouseProperty  $property
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $property = HouseProperty::find($id);
        return response()->json($property);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HouseProperty  $property
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $property = HouseProperty::find($id);
        $property->update($request->all());

        return response()->json('The book successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HouseProperty  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $property = HouseProperty::find($id);
        $property->delete();

        return response()->json('The book successfully deleted');
    }
}
