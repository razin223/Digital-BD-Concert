<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\ImageResizeTrait;

class VideoController extends Controller {

    use ImageResizeTrait;

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('auth_user');
    }

    public function index(Request $request) {


        $Data = \App\Video::with('createdBy', 'updatedBy', 'deletedBy');

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


        return view('new-admin.' . $request->route()->getName(), ['SearchData' => $Data, 'title' => "Video List"]);
    }

    public function create(Request $request) {
        return view('new-admin.' . $request->route()->getName(), ['title' => "Video Create"]);
    }

    public function store(Request $request) {
        $Required = [
            'title' => 'required|max:1000',
            'title_en' => 'max:1000',
            'link' => 'required',
            'display' => 'required',
            'display_order' => 'required',
            'featured' => 'required'
        ];


        $Message = [
            'title.required' => 'You must enter title of the video.',
            'title.max' => 'Title cannot be more than 1000 character.',
            'title_en.max' => 'Title in English cannot be more than 1000 character.',
            'link.required' => 'You must enter youtube link.',
            'display.required' => 'You must enter display status.',
            'display_order.required' => 'You must enter video display order.',
            'featured.required' => 'You must enter video featured status.'
        ];

        $request->validate($Required, $Message);

        $Data = new \App\Video();
        $Data->title = $request->title;
        $Data->title_en = $request->title_en;
        $Data->link = $request->link;
        $Data->display = $request->display;
        $Data->display_order = $request->display_order;
        $Data->featured = $request->featured;
        $Data->created_by = auth()->id();
        $Data->updated_by = auth()->id();
        $Data->save();

        return response(['status' => true, 'message' => "Photo uploaded successfully."]);
    }

    public function edit(Request $request, $Category) {
        $Data = \App\Video::find($Category);
        if ($Data != null) {
            return view('new-admin.' . $request->route()->getName(), ['title' => "Video Edit", 'Data' => $Data]);
        } else {
            return back()->with('error', 'Invalid video data given to edit.');
        }
    }

    public function update(Request $request, $Video) {
        $Required = [
            'title' => 'required|max:1000',
            'title_en' => 'max:1000',
            'link' => 'required',
            'display' => 'required',
            'display_order' => 'required',
            'featured' => 'required'
        ];


        $Message = [
            'title.required' => 'You must enter title of the video.',
            'title.max' => 'Title cannot be more than 1000 character.',
            'title_en.max' => 'Title in English cannot be more than 1000 character.',
            'link.required' => 'You must enter youtube link.',
            'display.required' => 'You must enter display status.',
            'display_order.required' => 'You must enter video display order.',
            'featured.required' => 'You must enter video featured status.'
        ];

        $request->validate($Required, $Message);



        $Data = \App\Video::find($Video);
        if ($Data != null) {
            $Data->title = $request->title;
            $Data->title_en = $request->title_en;
            $Data->link = $request->link;
            $Data->display = $request->display;
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
        $Data = \App\Video::find($Category);

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
