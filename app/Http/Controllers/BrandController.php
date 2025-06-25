<?php

namespace App\Http\Controllers;

use App\Models\brand;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
class BrandController extends Controller
{
    use ApiResponse;
    public function index(){

        $data=brand::get();
        return view('admin.brand.brand',get_defined_vars());
    }
    public function store(Request $request){

        brand::updateOrCreate(['id'=>$request->id],['text'=>$request->name,'slug'=>$request->slug]);
    return $this->success(['reload'=>true],'successfully submitted');

    }
}
