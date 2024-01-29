<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\BrandDataTable;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\Brand;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BrandDataTable $dataTable)
    {
        abort_if(Gate::denies('brand_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return $dataTable->render('admin.master.brand.index');
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
        abort_if(Gate::denies('brand_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:brands,name',
        ]);  
        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->toArray()
            ]);
        }
        Brand::create(['name' => $request->name]);  
        return response()->json(['success' => 'Brand created successfully.']);
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
        abort_if(Gate::denies('brand_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $id =  decrypt($id);
        $validator = Validator::make($request->all(), [
            'name' => [
                'required',
                Rule::unique('brands', 'name')->ignore($id)->whereNull('deleted_at'),
            ]]);  
        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->toArray()
            ]);
        }
        Brand::where('id',$id)->update(['name' => $request->name]);  
        return response()->json(['success' => 'Brand Update successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        abort_if(Gate::denies('brand_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $record = Brand::find(decrypt($id));
        $record->delete();
        return response()->json(['success' => 'Brand Deleted successfully.']);
    }
}
