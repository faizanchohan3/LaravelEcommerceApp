<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\homebanner;
use Illuminate\Http\Request;
use function Laravel\Prompts\table;
use App\Traits\ApiResponse;

use DB;
class homecontroller extends Controller
{
    use ApiResponse;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=homebanner::get();
    return view('admin.homebanner.home_banner',get_defined_vars());
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
        //
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
    public function destroy(string $id,string $table)
    {
        DB::table($table)->delete($id);

return $this->success(['reload'=>true],'successfully Update');
    }
}
