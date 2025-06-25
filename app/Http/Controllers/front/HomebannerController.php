<?php

namespace App\Http\Controllers\front;

use App\Models\cart;
use App\Models\Size;
use App\Models\brand;
use App\Models\color;
use App\Models\Product;
use App\Models\category;
use App\Models\tempuser;
use App\Models\Homebanner;
use App\Models\ProductAttr;
use App\Traits\ApiResponse;
use App\Models\ProductImage;
use App\Models\sub_category;
use Illuminate\Http\Request;
use App\Models\categoryattribute;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;



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
        $banner['sub_category'] = category::with('parent')->where('parent_id', null)->get();

        return $this->success(['data' => $banner], 'successfully ');


    }

    public function GetSubcateforydata(Request $request)
    {
        $data = [];
        $data['sub_category'] = category::with('parent')->with('children')->get();
        $data['category'] = category::with('parent')->where('parent_id', null)->get();
        return $this->success(['data' => $data], 'successfully ');
    }

    public function AddSubcateforydata(Request $request)
    {

        return view('category');

    }
    public function getcategory(Request $request)
    {
        $slug = $request->slug;
        $attribute = $request->attribute;
        $brand = $request->brand;
        $size = $request->size;
        $color = $request->color;
        $lowprice = $request->lowprice;
        $highprice = $request->highprice;

        // Ensure arrays are properly formatted
        $brand = is_array($brand) ? array_filter($brand) : [];
        $size = is_array($size) ? array_filter($size) : [];
        $color = is_array($color) ? array_filter($color) : [];
        $attribute = is_array($attribute) ? array_filter($attribute) : [];

        $category = Category::where('slug', $slug)->first();

        if (isset($category->id)) {
            $products = $this->getfiltereddata($category->id, $slug, $attribute, $brand, $size, $color, $lowprice, $highprice);

            $data = [];

            $data['category'] = category::where('slug', $slug)->with('product')->paginate(11);

            if ($data['category'][0]->parent_id == Null || $data['category'][0]->parent_id == '') {

                $data['cat'] = category::where('parent_id', $data['category'][0]->id)->get();


            } else {
                $data['cat'] = category::where('parent_id', $data['category'][0]->parent_id)->where('id', '!=', $data['category'][0]->id)->get();

            }
            $data['lowprice'] = ProductAttr::orderBy('price', 'asc')->pluck('price')->first();
            $data['highprice'] = ProductAttr::orderBy('price', 'desc')->pluck('price')->first();
            $data['brand'] = brand::all();
            $data['sizecategory'] = ProductAttr::with('size')->get();
            $data['size'] = Size::all();
            $data['color'] = color::all();
            $data['categoryatribute'] = categoryattribute::where('category_id', $data['category'][0]->id)->with('attribute')->get();

            return $this->success(['data' => $data], 'suxxe');
        }
    }
    function getfiltereddata($category_id, $slug, $attribute, $brand, $size, $color, $lowprice, $highprice)
    {
        $products = Product::where('category_id', $category_id);

        if (!empty($brand) && is_array($brand)) {
            $products = $products->whereIn('brand_id', $brand);
        }

        if (!empty($attribute) && is_array($attribute)) {
            $products = $products->withWhereHas('product_attribute', function ($q) use ($attribute) {
                $q->whereIn('atributevalue_id', $attribute);
            });
        }

        if (!empty($size) && is_array($size)) {
            $products = $products->withWhereHas('product_attr', function ($q) use ($size) {
                $q->whereIn('size_id', $size);
            });
        }

        if (!empty($color) && is_array($color)) {
            $products = $products->withWhereHas('product_attr', function ($q) use ($color) {
                $q->whereIn('color_id', $color);
            });
        }

        if (!empty($lowprice) && !empty($highprice)) {
            $products = $products->withWhereHas('product_attr', function ($q) use ($lowprice, $highprice) {
                $q->whereBetween('price', [$lowprice, $highprice]);
            });
        }

        $products = $products->with('product_attr')->select('id', 'name', 'slug', 'item_code')->paginate(10);
        return $products;
    }
    public function getuserdata(Request $request)
    {

        $token = $request->token;
        $checkUser = tempuser::where('token', $token)->first();
        if (isset($checkUser->id)) {
            $data['user_type'] = $checkUser->user_type;
            $data['token'] = $checkUser->token;
            if (chektokenexpiryminutes($checkUser->updated_at, 60)) {
                $token = generaterandomtoken();
                $checkUser->token = $token;
                $checkUser->updated_at = date('Y-m-s h:i:s a', time());
                $checkUser->save();
                $data['token'] = $token;
            }
        } else {
            $user_id = rand(1111, 9999);
            $token = generaterandomtoken();
            $time = date('Y-m-s h:i:s a', time());
            tempuser::create(['user_id' => $user_id, 'token' => $token, 'created_at' => $time, 'updated_at' => $time]);

            $data['user_type'] = 2;
            $data['token'] = $token;
        }
        return $this->success(['data' => $data], 'successfull');
    }


    public function getcartdata(Request $request)
    {

        $validation = Validator::make($request->all(), [
            'token' => 'required|exists:tempusers,token',


        ]);


        if ($validation->fails()) {

            return $this->error($validation->errors()->first(), 400, []);
        } else {

            $usertoken = tempuser::where('token', $request->token)->first();
            $data = cart::where('user_id', $usertoken->id)->with('products')->get();

            return $this->success(['data' => $data], 'successfully hry');

        }

    }


    public function addtocart(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'token' => 'required|exists:tempusers,token',
            'product_id' => 'required|exists:products,id',
            'qty' => 'required|numeric|min:0|not-in:0',
            'product_attr_id' => 'required|exists:product_attrs,id',
        ]);
        if ($validation->fails()) {
            return $this->error($validation->errors()->first(), 400, []);
        } else {
            $usertoken = tempuser::where('token', $request->token)->first();
            $data = cart::where([
                'user_id' => $usertoken->id,
                'user_type' => $usertoken->user_type,
                'product_id' => $request->product_id,
                'product_attr_id' => $request->product_attr_id
            ])->first();

            if ($data) {
                // Increment the quantity
                $data->qty += $request->qty;
                $data->save();
            } else {
                // Create new cart item
                $data = cart::create([
                    'user_id' => $usertoken->id,
                    'user_type' => $usertoken->user_type,
                    'product_id' => $request->product_id,
                    'product_attr_id' => $request->product_attr_id,
                    'qty' => $request->qty
                ]);
                       return $this->success(['data' => $data], 'successfully ff update');

        }

    }
    }
    public function removecart(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'token' => 'required|exists:tempusers,token',
            'product_id' => 'required|exists:products,id',
            'qty' => 'required|numeric|min:0|not-in:0',
            'product_attr_id' => 'required|exists:product_attrs,id',
        ]);
        if ($validation->fails()) {
            return $this->error($validation->errors()->first(), 400, []);
        } else {
            $usertoken = tempuser::where('token', $request->token)->first();
            $cart = cart::where([
                'user_id' => $usertoken->id,
                'user_type' => $usertoken->user_type,
                'product_id' => $request->product_id,
                'product_attr_id' => $request->product_attr_id
            ])->first();

            if ($cart) {
                if ($cart->qty > $request->qty) {
                    $cart->qty -= $request->qty;
                    $cart->save();
                } else {
                    // If qty to remove is equal or more, delete the cart item
                    $cart->delete();
                }
            }

            return $this->success([], 'Cart updated successfully');
        }
    }
    public function getproduct($item_code='',$slug=''){
    $product=Product::where(['item_code'=>$item_code,'slug'=>$slug])->first();
if(isset($product)){

    $data=Product::where(['item_code'=>$item_code,'slug'=>$slug])->with('product_attr')->first();
    $data['otherproduct']=Product::where('category_id',$data->category_id)->with('product_attr')->get();
    return $this->success(['data'=>$data],'successfully updata');

}
else
{
    return $this->error('data not found',400,[]);
}



    }
}
