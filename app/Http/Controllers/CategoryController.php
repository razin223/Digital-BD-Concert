<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\ImageResizeTrait;

class CategoryController extends Controller {

    use ImageResizeTrait;

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('auth_user');
    }

    public function index(Request $request) {


        $Data = \App\Category::with('createdBy', 'updatedBy', 'deletedBy');
        if (!empty($request->category_name)) {
            $Data = $Data->where('category_name', 'like', '%' . $request->category_name . "%");
        }
        if (!empty($request->display)) {
            $Data = $Data->where('display', $request->display);
        }
        if (!empty($request->with_deleted) && $request->with_deleted == 'Yes') {
            $Data = $Data->withTrashed();
        }
        $Data = $Data->orderBy('category_order', 'asc')->paginate(100);


        return view('new-admin.' . $request->route()->getName(), ['SearchData' => $Data, 'title' => "Category List"]);
    }

    public function create(Request $request) {
        return view('new-admin.' . $request->route()->getName(), ['title' => "Category Create"]);
    }

    public function store(Request $request) {
        $Required = [
            'category_name' => 'required|max:255',
            'category_name_en' => 'max:255',
            'category_order' => 'required|numeric',
            'file' => 'image|mimes:jpg,jpeg,png,JPG,JPEG,PNG|max:1024',
            'display' => 'required',
        ];


        $Message = [
            'category_name.required' => 'You must enter category name.',
            'category_name.max' => 'Category name cannot be more than 255 character.',
            'category_name_en.max' => 'Category name in English cannot be more than 255 character.',
            'category_order.required' => 'You must enter category display order.',
            'category_order.numeric' => 'Category display order must be number.',
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

        $Data = new \App\Category();
        $Data->category_name = $request->category_name;
        $Data->category_name_en = $request->category_name_en;
        $Data->category_order = $request->category_order;
        $Data->category_image = $File;
        $Data->category_image_resized = $Resized;
        $Data->display = $request->display;
        $Data->created_by = auth()->id();
        $Data->updated_by = auth()->id();

        $Data->save();

        //$request->session()->flash('Category created successfully. Category name: ' . $request->category_name . " and display order:" . $request->category_order);

        return response(['message' => "Category created successfully." . '<br/> Category name: ' . $request->category_name . " <br/> Display order: " . $request->category_order]);
    }

    public function edit(Request $request, $Category) {
        $Data = \App\Category::find($Category);
        if ($Data != null) {
            return view('new-admin.' . $request->route()->getName(), ['title' => "Category Edit", 'Data' => $Data]);
        } else {
            return back()->with('error', 'Invalid category data given to delete.');
        }
    }

    public function update(Request $request, $Category) {
        $Required = [
            'category_name' => 'required|max:255',
            'category_name_en' => 'max:255',
            'category_order' => 'required|numeric',
            'file' => 'image|mimes:jpg,jpeg,png,JPG,JPEG,PNG|max:1024',
            'display' => 'required',
        ];


        $Message = [
            'category_name.required' => 'You must enter category name.',
            'category_name.max' => 'Category name cannot be more than 255 character.',
            'category_name_en.max' => 'Category name in English cannot be more than 255 character.',
            'category_order.required' => 'You must enter category display order.',
            'category_order.numeric' => 'Category display order must be number.',
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

        $Data = \App\Category::find($Category);
        if ($Data != null) {
            $Data->category_name = $request->category_name;
            $Data->category_name_en = $request->category_name_en;
            $Data->category_order = $request->category_order;
            if ($File != null) {
                $Data->category_image = $File;
                $Data->category_image_resized = $Resized;
            }
            $Data->display = $request->display;
            $Data->updated_by = auth()->id();

            $Data->save();

            $request->session()->flash('success', 'Data updated successfully.');

            return response(['status' => true]);
        } else {
            return response(['message' => "Invalid data given to edit."], 422);
        }
    }

    public function destroy(Request $request, $Category) {
        $Data = \App\Category::find($Category);

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
