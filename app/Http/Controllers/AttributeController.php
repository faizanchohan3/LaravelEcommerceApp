<?php

namespace App\Http\Controllers;

use App\Models\attribute;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
   use ApiResponse;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=attribute::get();
return view('admin.attributes.attribute',get_defined_vars());

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        attribute::updateOrCreate(['name'=>$request->text,'slug'=>$request->slug]);
        return $this->success(['reload'=>true],'successfully ');
    }

    /**
     * Display the specified resource.
     */
    public function show(attribute $attribute)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(attribute $attribute)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, attribute $attribute)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(attribute $attribute)
    {
        //
    }
}
