<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\ImageResizeTrait;

class PhotoController extends Controller {

    use ImageResizeTrait;

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('auth_user');
    }

    public function index(Request $request) {


        $Data = \App\Photo::with('createdBy', 'updatedBy', 'deletedBy');

        if (!empty($request->title)) {
            $Data = $Data->where('title', 'like', "%" . $request->title . '%');
        }
        if (!empty($request->display)) {
            $Data = $Data->where('display', $request->display);
        }
        if (!empty($request->featured)) {
            $Data = $Data->where('featured', $request->featured);
        }
        if (!empty($request->with_deleted) && $request->with_deleted == 'Yes') {
            $Data = $Data->withTrashed();
        }
        $Data = $Data->orderBy('display_order', 'asc')->paginate(100);


        return view('new-admin.' . $request->route()->getName(), ['SearchData' => $Data, 'title' => "Photo List"]);
    }

    public function create(Request $request) {
        return view('new-admin.' . $request->route()->getName(), ['title' => "Photo Create"]);
    }

    public function store(Request $request) {
        $Required = [
            'file' => 'required',
            'file.*' => 'image|mimes:jpg,jpeg,png,JPG,JPEG,PNG|max:1024',
        ];


        $Message = [
            'file.required' => 'You must enter photo.',
            'file.*' => 'Photo file did not upload to server.',
            'file.*.image' => 'Photo is not a valid image file.',
            'file.*.mimes' => 'Photo file must be jpg,jpeg or png.',
            'file.*.dimensions' => 'Photo must be 1200x675 px size.',
            'file.*.max' => 'Photo cannot be more than 1024KB.',
        ];

        $request->validate($Required, $Message);

        $ReturnData = [];

        foreach ($request->file as $uploadFile) {
            $File = $uploadFile->store('public');
            $Resized = $this->resizeImage($File);

            $Data = new \App\Photo();
            $Data->file_name = $File;
            $Data->file_name_resized = $Resized;
            $Data->display = "Yes";
            $Data->created_by = auth()->id();
            $Data->updated_by = auth()->id();

            $Data->save();

            $Data->display_order = $Data->id;

            $Data->save();

            $ReturnData[] = ['id' => $Data->id, 'image' => \Storage::url($Resized), 'display_order' => $Data->display_order];
        }

        //$request->session()->flash('Category created successfully. Category name: ' . $request->category_name . " and display order:" . $request->category_order);

        return response(['message' => "Photo uploaded successfully.", 'data' => $ReturnData]);
    }

    public function edit(Request $request, $Category) {
        $Data = \App\Photo::find($Category);
        if ($Data != null) {
            return view('new-admin.' . $request->route()->getName(), ['title' => "Photo Edit", 'Data' => $Data]);
        } else {
            return back()->with('error', 'Invalid category data given to delete.');
        }
    }

    public function update(Request $request, $Photo) {
        $Required = [
            'title' => 'required|max:1000',
            'title_en' => 'max:1000',
            'display_order' => 'required|numeric',
            'file' => 'image|mimes:jpg,jpeg,png,JPG,JPEG,PNG|max:1024',
            'display' => 'required',
            'featured' => 'required',
        ];


        $Message = [
            'title.required' => 'You must enter title.',
            'title.max' => 'Title cannot be more than 255 character.',
            'title_en.max' => 'Title in English cannot be more than 255 character.',
            'display_order.required' => 'You must enter photo display order.',
            'display_order.numeric' => 'Photo display order must be number.',
            'file.required' => 'You must enter Photo.',
            'file.file' => 'Photo file did not upload to server.',
            'file.image' => 'Photo is not a valid image file.',
            'file.mimes' => 'Photo file must be jpg,jpeg or png.',
            'file.dimensions' => 'Photo must be 1200x675 px size.',
            'file.max' => 'Photo cannot be more than 1024KB.',
            'display.required' => 'You must select display status.',
            'featured.required' => 'You must select featured status.',
        ];

        $request->validate($Required, $Message);

        $File = $Resized = null;

        if ($request->hasFile('file')) {
            $File = $request->file->store('public');
            $Resized = $this->resizeImage($File);
        }

        $Data = \App\Photo::find($Photo);
        if ($Data != null) {
            $Data->title = $request->title;
            $Data->title_en = $request->title_en;
            $Data->display = $request->display;
            if ($File != null) {
                $Data->file_name = $File;
                $Data->file_name_resized = $Resized;
            }
            $Data->display_order = $request->display_order;
            $Data->featured = $request->featured;
            $Data->updated_by = auth()->id();

            $Data->save();

            $request->session()->flash('success', 'Data updated successfully.');

            return response(['status' => true]);
        } else {
            return response(['message' => "Invalid data given to edit."], 422);
        }
    }

    public function destroy(Request $request, $Category) {
        $Data = \App\Photo::find($Category);

        if ($Data != null) {
            $Data->deleted_by = auth()->id();
            $Data->save();
            $Data->delete();

            return ['status' => true];
        } else {
            return response("Invalid data given.", 422);
        }
    }

    public function mass_update(Request $request) {
        $Required = [
            'id' => 'required',
            'id.*' => 'required',
            'title' => 'required',
            'title.*' => 'required|max:1000',
            'title_en.*' => 'max:1000',
            'featured' => 'required',
            'featured.*' => 'required',
            'display_order' => 'required',
            'display_order.*' => 'required',
        ];

        $Message = [
            'id.required' => 'Invalid data given (id missing).',
            'id.*.required' => 'Invalid data given (id missing individual).',
            'title.required' => 'You must enter all title.',
            'title.*.required' => 'You must enter title of all photos.',
            'title.*.max' => 'Title cannot be more than 1000 character.',
            'title_en.*.max' => 'Title in English cannot be more than 1000 character.',
            'featured.required' => 'You must enter featured status.',
            'featured.*.required' => 'You must enter featured status of all photos.',
            'display_order.required' => 'You must enter display order.',
            'display_order.*.required' => 'You must enter display order of all photos.',
        ];

        $request->validate($Required, $Message);

        foreach ($request->id as $key => $value) {
            $Data = \App\Photo::find($value);
            $Data->title = $request->input('title.' . $key);
            $Data->title_en = $request->input('title_en.' . $key);
            $Data->featured = $request->input('featured.' . $key);
            $Data->display_order = $request->input('display_order.' . $key);
            $Data->save();
        }

        return response(['message' => "All photo has been updated."]);
    }

}
