<?php

namespace App\Http\Controllers;

use App\Models\color;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
class ColorController extends Controller
{
    use ApiResponse;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $data=Color::get();
    return view('admin.color.color',get_defined_vars());
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
 color::Create(
$request->all()



);

return $this->success(['reload'=>true],'submitted successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(color $color)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(color $color)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, color $color)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(color $color)
    {
        //
    }
}
