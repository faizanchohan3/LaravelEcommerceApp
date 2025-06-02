<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use App\Models\Homebanner;
use App\Models\category;
use App\Models\brand;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\sub_category;
class HomebannerController extends Controller
{
    use ApiResponse;
    public function getHomeData()
    {
        $banner = [];
        $banner['banner'] = Homebanner::get();
        $banner['category'] = category::with('product')->get();
        $banner['brand'] = brand::get();
        $banner['product'] = product::with('product_attribute')->get();
        $banner['sub_category'] = category::with('parent')->where('parent_id',null)->get();

        return $this->success(['data' => $banner], 'successfully ');


    }

    public function GetSubcateforydata(Request $request){
$data=[];
        $data['sub_category'] = category::with('parent')->with('children')->get();
        $data['category'] = category::with('parent')->where('parent_id',null)->get();
        return $this->success(['data' => $data], 'successfully ');
    }


}
