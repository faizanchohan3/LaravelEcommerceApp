<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use App\Models\Homebanner;
use App\Models\category;
use App\Models\brand;
class HomebannerController extends Controller
{
    use ApiResponse;
    public function getHomeData(){
        $banner = [];
        $banner['banner'] = Homebanner::get();

        $banner['category'] = category::with('product')->get();


        $banner['brand'] = brand::get();


        return $this->success(['data'=>$banner],'successfully ');


    }
}
