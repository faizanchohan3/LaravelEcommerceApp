<?php

namespace App\Http\Controllers;

use App\Models\attributevalue;
use Illuminate\Http\Request;
use App\Models\attribute;
use App\Traits\ApiResponse;
class AttributevalueController extends Controller
{

    use ApiResponse;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=attributevalue::with('singleattribute')->get();
        $attribure=attribute::get();
        return view('admin.attributes.attributevalue',get_defined_vars());
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

        attributevalue::updateOrCreate(
        ['attribute_id'=>$request->selectoption,'values'=>$request->values]
        );
        return $this->success(['reload'=>true],'submitted successfully on'.$request->selectoption.'values');
    }

    /**
     * Display the specified resource.
     */
    public function show(attributevalue $attributevalue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(attributevalue $attributevalue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, attributevalue $attributevalue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(attributevalue $attributevalue)
    {
        //
    }
}
