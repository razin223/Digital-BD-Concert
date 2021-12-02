<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\ImageResizeTrait;

class ContentController extends Controller {

    use ImageResizeTrait;

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('auth_user');
    }

    public function index(Request $request) {


        $Data = \App\Content::with('getCategory', 'createdBy', 'updatedBy');
//        if (!empty($request->category_id)) {
//            $Data = $Data->with(['getSubCategory' => function($query)use($request) {
//                    $query->where('sub_categories.category_id', $request->category_id);
//                }]);
//        }

        if (!empty($request->category_id)) {
            $Data = $Data->where('category_id', $request->category_id);
        }
        if (!empty($request->type)) {
            $Data = $Data->where('type', $request->type);
        }
        if (!empty($request->display)) {
            $Data = $Data->where('display', $request->display);
        }
        if (!empty($request->featured)) {
            $Data = $Data->where('featured', $request->featured);
        }

        $Data = $Data->paginate(100);


        return view('new-admin.' . $request->route()->getName(), ['SearchData' => $Data, 'title' => "Content List"]);
    }

    public function create(Request $request) {
        return view('new-admin.' . $request->route()->getName(), ['title' => "Content Create"]);
    }

    public function store(Request $request) {
        $Required = [
            'category_id' => 'required',
            'type' => 'required',
            'language' => 'required',
            'title' => 'required|max:1000',
            'content' => 'required',
            'display_order' => 'required|numeric',
            'cover_image' => 'required|image|mimes:jpg,jpeg,png,JPG,JPEG,PNG|max:1024',
            'cover_image_en' => 'image|mimes:jpg,jpeg,png,JPG,JPEG,PNG|max:1024',
            'display' => 'required',
            'featured' => 'required',
        ];



        $Message = [
            'category_id.required' => 'You must select category.',
            'type.required' => 'You must select content type.',
            'language.required' => 'You must select the language.',
            'title.required' => 'You must enter title.',
            'title.max' => 'Title cannot be more than 1000 character.',
            'title_en.max' => 'Title in English cannot be more than 1000 character.',
            'content.required' => "You must enter the content.",
            'display_order.required' => 'You must enter content display order.',
            'display_order.numeric' => 'Content display order must be number.',
            'cover_image.required' => 'You must enter Content Cover image.',
            'cover_image.file' => 'Content Cover image file did not upload to server.',
            'cover_image.image' => 'Content Cover image is not a valid image file.',
            'cover_image.mimes' => 'Content Cover image file must be jpg,jpeg or png.',
            'cover_image.dimensions' => 'Content Cover image must be 1200x675 px size.',
            'cover_image.max' => 'Content Cover image cannot be more than 1024KB.',
            'cover_image_en.required' => 'You must enter Content Cover (English) image.',
            'cover_image_en.file' => 'Content Cover (English) image file did not upload to server.',
            'cover_image_en.image' => 'Content Cover (English) image is not a valid image file.',
            'cover_image_en.mimes' => 'Content Cover (English) image file must be jpg,jpeg or png.',
            'cover_image_en.dimensions' => 'Content Cover (English) image must be 1200x675 px size.',
            'cover_image_en.max' => 'Content Cover (English) image cannot be more than 1024KB.',
            'display.required' => 'You must select display status.',
        ];

        $request->validate($Required, $Message);

        $File = $ResizedImage = $FileEn = $ResizedImageEn = null;
        if ($request->hasFile('cover_image')) {

            $File = $request->cover_image->store('public');

            $ResizedImage = $this->resizeImage($File);
        }
        
        $Data = new \App\Content();
        $Data->category_id = $request->category_id;
        $Data->type = $request->type;
        $Data->language = $request->language;
        $Data->title = $request->title;
        $Data->content = $request->content;
        $Data->display_order = $request->display_order;
        $Data->cover_image = $File;
        $Data->cover_image_resized = $ResizedImage;
        $Data->display = $request->display;
        $Data->featured = $request->featured;
        $Data->created_by = auth()->id();
        $Data->updated_by = auth()->id();

        $Data->save();


        return response(['message' => 'Content created successfully. Title: "' . $request->title . '" and Display order:' . $request->display_order]);
    }

    public function show(Request $request, $Content) {
        $Data = \App\Content::find($Content);
        if ($Data == null) {
            return back()->with('error', 'Invalid data given.');
        }
        return view('new-admin.' . $request->route()->getName(), ['title' => "Content Show", 'Data' => $Data]);
    }

    public function edit(Request $request, $Content) {
        $Data = \App\Content::find($Content);

        if ($Data == null) {
            return back()->with('error', 'Invalid data given.');
        }
        return view('new-admin.' . $request->route()->getName(), ['title' => "Content Edit", 'Data' => $Data]);
    }

    public function update(Request $request, $Content) {
        $Required = [
            'category_id' => 'required',
            'language' => 'required',
            'type' => 'required',
            'title' => 'required|max:1000',
            'title_en' => 'max:1000',
            'content' => 'required',
            'display_order' => 'required|numeric',
            'cover_image' => 'image|mimes:jpg,jpeg,png,JPG,JPEG,PNG|max:1024',
            'cover_image' => 'image|mimes:jpg,jpeg,png,JPG,JPEG,PNG|max:1024',
            'display' => 'required',
            'featured' => 'required',
        ];


        $Message = [
            'category_id.required' => 'You must select category.',
            'language.required' => 'You must select the language.',
            'type.required' => 'You must select content type.',
            'title.required' => 'You must enter title.',
            'title.max' => 'Title cannot be more than 1000 character.',
            'title_en.max' => 'Title in English cannot be more than 1000 character.',
            'content.required' => "You must enter the content.",
            'display_order.required' => 'You must enter content display order.',
            'display_order.numeric' => 'Content display order must be number.',
            'cover_image.required' => 'You must enter Content Cover image.',
            'cover_image.file' => 'Content Cover image file did not upload to server.',
            'cover_image.image' => 'Content Cover image is not a valid image file.',
            'cover_image.mimes' => 'Content Cover image file must be jpg,jpeg or png.',
            'cover_image.dimensions' => 'Content Cover image must be 1200x675 px size.',
            'cover_image.max' => 'Content Cover image cannot be more than 1024KB.',
            'cover_image_en.required' => 'You must enter Content Cover (English) image.',
            'cover_image_en.file' => 'Content Cover (English) image file did not upload to server.',
            'cover_image_en.image' => 'Content Cover (English) image is not a valid image file.',
            'cover_image_en.mimes' => 'Content Cover (English) image file must be jpg,jpeg or png.',
            'cover_image_en.dimensions' => 'Content Cover (English) image must be 1200x675 px size.',
            'cover_image_en.max' => 'Content Cover (English) image cannot be more than 1024KB.',
            'display.required' => 'You must select display status.',
        ];

        $request->validate($Required, $Message);

        $Data = \App\Content::find($Content);

        if ($Data == null) {
            return response(['message' => "Invalid data given to edit."], 422);
        }

        $File = $ResizedImage = $FileEn = $ResizedImageEn = null;
        if ($request->hasFile('cover_image')) {

            $File = $request->cover_image->store('public');

            $ResizedImage = $this->resizeImage($File);

            $Data->cover_image = $File;
            $Data->cover_image_resized = $ResizedImage;
        }


        $Data->category_id = $request->category_id;
        $Data->type = $request->type;
        $Data->language = $request->language;
        $Data->title = $request->title;
        $Data->content = $request->content;
        $Data->display_order = $request->display_order;
        $Data->display = $request->display;
        $Data->featured = $request->featured;
        $Data->updated_by = auth()->id();

        $Data->save();

        $request->session()->flash('success', 'Data update successful.');

        return ['status' => true];
    }

    public function destroy(Request $request, $Content) {
        $Data = \App\Content::find($Content);
        if ($Data != null) {
            $Data->deleted_by = auth()->id();
            $Data->save();
            $Data->delete();
            if (isset($request->mode) && $request->mode == 'ajax') {
                return ['status' => true];
            }
            return redirect(route('Content.index'))->with('success', 'Content deleted successfully.');
        } else {
            return redirect(route('Content.index'))->with('error', 'Invalid data given to delete.');
        }
    }

}
