<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\brand;
use App\Models\category;
use App\Models\categoryattribute;
use App\Models\color;
use App\Models\Product;
use App\Models\product_attribute_image;
use App\Models\ProductAttr;
use App\Models\ProductAttributes;
use App\Models\Size;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Illuminate\Support\Facades\Storage;

class productcontroller extends Controller
{
    use ApiResponse;

    public function manage_index($id=0){
        if($id==0){
            $pro=new Product();
            $cat=category::get();
            $size=Size::get();
            $color=color::get();
            $product_image=new product_attribute_image();
            $product_attr=new ProductAttr();
            $brand=brand::get();
            return view('admin/product/productmanage',get_defined_vars());
        }
        else{
            $data['id']=$id;

            $pro=Product::where('id',$id)->first();

            return view('admin/product/productmanage',get_defined_vars());
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Product::get();
        return view('admin/product/product',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function attributes(Request $request){
        $cat=$request->category;

        $data=categoryattribute::where('category_id',$cat)->with('attribute')->get();
        return $this->success($data,'submitted successfully');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $product = new Product();
        $product->name = $data['name'];
        $product->category_id = $data['category'];
        $product->item_code = $data['item_code'];
        $product->slug = $data['slug'];
        $product->brand_id = $data['brand'];
        $product->description = $data['description'];
        $product->keyword = $data['keyword'];

        // Handle image upload
        if ($request->hasFile('product_image')) {
            try {
                $image = $request->file('product_image');
                $imageName = time() . '_' . $image->getClientOriginalName();

                // Store the image
                $path = $image->storeAs('public/product_image'          , $imageName);

                if ($path) {
                    $product->image = '/public/product_image/' . $imageName;
                    \Log::info('Image uploaded successfully', [
                        'path' => $path,
                        'image_path' => $product->image
                    ]);
                }
            } catch (\Exception $e) {
                \Log::error('Error uploading image: ' . $e->getMessage());
            }
        }

        $product->save();

        $product_attr = new ProductAttributes();
        $product_attr->product_id = $product->id;
        $product_attr->category_id = $data['category'];
        $product_attr->atributevalue_id = $data['roles'];
        $product_attr->save();

        return $this->success(['reload'=>true], 'successfully Update');
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

    public function uploadImage(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();

            // Store in public disk under product-descriptions directory
            $path = $file->storeAs('product-descriptions', $filename, 'public');

            // Return the URL of the uploaded file
            return response()->json([
                'location' => asset('storage/' . $path)
            ]);
        }

        return response()->json(['error' => 'No file uploaded'], 400);
    }
}
