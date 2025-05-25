<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\attribute;
use App\Models\categoryattribute;
use Illuminate\Http\Request;
use App\Models\category;
use App\Traits\ApiResponse;
use Illuminate\Routing\CreatesRegularExpressionRouteConstraints;
class categorycontroller extends Controller
{
    use ApiResponse;
    public function index()
    {
        $data = category::get();
        return view('admin.category.category', get_defined_vars());

    }


    public function store(Request $request)
    {
        if ($request->parent_id != 0) {
            category::updateOrCreate(['name' => $request->text, 'slug' => $request->slug, 'parent_id' => $request->parent_id]);
        } else {
            category::updateOrCreate(['name' => $request->text, 'slug' => $request->slug]);
        }
        return $this->success(['reload' => true], 'successfully submitted');
    }


    public function categoryattributeindex()
    {

        $cat = category::get();
        $att = attribute::get();
    $data = categoryattribute::with('attribute', 'category')->get();

        return view('admin.category.categoryattribute', get_defined_vars());
    }
    public function storeaddcatattri(Request $request)
    {




        categoryattribute::updateOrCreate( ['id'=>$request->id],[

            'category_id' => $request->catt_id,
            'attribute_id' => $request->att_id
        ]);

        return $this->success(['reload'=>true],'successfully');
    }

}
