<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TemporaryExamController extends Controller {


    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request) {

        $Data = \App\SubCategory::with('getCategory', 'createdBy', 'updatedBy');

        if (!empty($request->sub_category_name)) {
            $Data = $Data->where('sub_category_name', 'like', '%' . $request->sub_category_name . "%");
        }

        if (!empty($request->category_id)) {
            $Data = $Data->where('category_id', $request->category_id);
        }

        if (!empty($request->display)) {
            $Data = $Data->where('display', $request->display);
        }
        if (!empty($request->with_deleted) && $request->with_deleted == 'Yes') {
            $Data = $Data->withTrashed();
        }

        if ($request->has('mode') && $request->mode == 'ajax') {
            return $Data->orderBy('sub_category_name', 'asc')->get()->toArray();
        }
        $Data = $Data->paginate(100);


        return view('new-admin.' . $request->route()->getName(), ['SearchData' => $Data, 'title' => "Sub Category List"]);
    }

    public function create(Request $request) {
        return view('new-admin.' . $request->route()->getName(), ['title' => "Sub Category Create"]);
    }

    public function store(Request $request) {
        $Required = [
            'category_id' => 'required',
            'sub_category_name' => 'required|max:255',
            'sub_category_order' => 'required|numeric',
            'file' => 'image|mimes:jpg,jpeg,png,JPG,JPEG,PNG|max:1024',
            'display' => 'required',
        ];


        $Message = [
            'category_id.required' => 'You must select the category.',
            'sub_category_name.required' => 'You must enter sub category name.',
            'sub_category_name.max' => 'Sub Category name cannot be more than 255 character.',
            'sub_category_order.required' => 'You must enter sub category display order.',
            'sub_category_order.numeric' => 'Sub Category display order must be number.',
            'file.required' => 'You must enter category image.',
            'file.file' => 'Category image file did not upload to server.',
            'file.image' => 'Category image is not a valid image file.',
            'file.mimes' => 'Category image file must be jpg,jpeg or png.',
            'file.dimensions' => 'Category image must be 1200x675 px size.',
            'file.max' => 'Category image cannot be more than 1024KB.',
            'display.required' => 'You must select display status.',
        ];

        $request->validate($Required, $Message);
        $File = $Resized = null;

        if ($request->hasFile('file')) {
            $File = $request->file->store('public');
            $Resized = $this->resizeImage($File);
        }


        $Data = new \App\SubCategory();
        $Data->category_id = $request->category_id;
        $Data->sub_category_name = $request->sub_category_name;
        $Data->sub_category_order = $request->sub_category_order;
        $Data->sub_category_image = $File;
        $Data->sub_category_image_resized = $Resized;
        $Data->display = $request->display;
        $Data->created_by = auth()->id();
        $Data->updated_by = auth()->id();

        $Data->save();

        //$request->session()->flash('Category created successfully. Category name: ' . $request->category_name . " and display order:" . $request->category_order);

        return response(['message' => "Sub Category created successfully." . '<br/> Sub Category name: ' . $request->sub_category_name . " <br/> Display order: " . $request->sub_category_order]);
    }

    public function edit(Request $request, $SubCategory) {
        $Data = \App\SubCategory::find($SubCategory);
        if ($Data == null) {
            return back()->with('error', 'Invalid data given.');
        }
        return view('new-admin.' . $request->route()->getName(), ['title' => "Sub Category Edit", 'Data' => $Data]);
    }

    public function update(Request $request, $SubCategory) {
        $Required = [
            'category_id' => 'required',
            'sub_category_name' => 'required|max:255',
            'sub_category_order' => 'required|numeric',
            'file' => 'image|mimes:jpg,jpeg,png,JPG,JPEG,PNG|max:1024',
            'display' => 'required',
        ];


        $Message = [
            'category_id.required' => 'You must select the category.',
            'sub_category_name.required' => 'You must enter sub category name.',
            'sub_category_name.max' => 'Sub Category name cannot be more than 255 character.',
            'sub_category_order.required' => 'You must enter sub category display order.',
            'sub_category_order.numeric' => 'Sub Category display order must be number.',
            'file.required' => 'You must enter category image.',
            'file.file' => 'Category image file did not upload to server.',
            'file.image' => 'Category image is not a valid image file.',
            'file.mimes' => 'Category image file must be jpg,jpeg or png.',
            'file.dimensions' => 'Category image must be 1200x675 px size.',
            'file.max' => 'Category image cannot be more than 1024KB.',
            'display.required' => 'You must select display status.',
        ];

        $request->validate($Required, $Message);

        $Data = \App\SubCategory::find($SubCategory);
        if ($Data == null) {
            return response(['message' => "Invalid data given.", 422]);
        }

        $File = $Resized = null;

        if ($request->hasFile('file')) {
            $File = $request->file->store('public');
            $Resized = $this->resizeImage($File);
            $Data->sub_category_image = $File;
            $Data->sub_category_image_resized = $Resized;
        }

        $Data->category_id = $request->category_id;
        $Data->sub_category_name = $request->sub_category_name;
        $Data->sub_category_order = $request->sub_category_order;
        $Data->display = $request->display;
        $Data->updated_by = auth()->id();

        $Data->save();

        $request->session()->flash('success', 'Data update successful.');

        return ['status' => true];
    }

    public function destroy(Request $request, $SubCategory) {
        $Data = \App\SubCategory::find($SubCategory);

        if ($Data != null) {
            $Data->deleted_by = auth()->id();
            $Data->save();
            $Data->delete();

            return ['status' => true];
        } else {
            return response("Invalid data given.", 422);
        }
    }

}
