<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Size;

use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Validator;
class sizecontroller extends Controller
{


    use ApiResponse;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Size::get();
        return view('admin.homebanner.size', get_defined_vars());
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
        $Validator=Validator::make($request->all(),[
'text'=>'required',
        ]);
if($Validator->fails()){
   return $this->error($Validator->errors()->first(),'400',[]);

}
else{

    Size::updateOrCreate(
        [

            'text' => $request->text,
        ]

    );
    return $this->success(['reload'=>true], 'successfully Update');


}

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
