<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class QuestionController extends Controller {

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('auth_user');
    }

    public function index(Request $request) {


        $Data = \App\Question::with('createdBy', 'updatedBy');
        if (!empty($request->group)) {
            $Data = $Data->where('group', $request->group);
        }

        if (!empty($request->question)) {
            $Data = $Data->where('question', 'like', "%" . $request->question . "%");
        }
        $Data = $Data->paginate(100);


        return view('new-admin.' . $request->route()->getName(), ['SearchData' => $Data, 'title' => "Question List"]);
    }

    public function create(Request $request) {
        return view('new-admin.' . $request->route()->getName(), ['title' => "Question Create"]);
    }

    public function store(Request $request) {
        $Required = [
            'group' => 'required',
            'question' => 'required|max:2000',
            'option_1' => 'required|max:2000',
            'option_2' => 'required|max:2000',
            'option_3' => 'required|max:2000',
            'option_4' => 'required|max:2000',
            'answer' => 'required',
        ];


        $Message = [
            'group.required' => 'You must select the group.',
            'question.required' => 'You must enter Question.',
            'question.max' => 'Question cannot be more than 2000 character.',
            'answer.required' => 'You must select an option as answer.',
        ];

        foreach (range(1, 4) as $value) {
            $Required["option_" . $value] = 'required|max:2000';
            $Message['option_' . $value . ".required"] = 'You must enter option ' . $value;
            $Message['option_' . $value . ".max"] = 'Option ' . $value . " cannot be more than 2000 character.";
        }

        $request->validate($Required, $Message);


        $Data = new \App\Question();
        $Data->group = $request->group;
        $Data->question = $request->question;
        foreach (range(1, 4) as $value) {
            $Parameter = "option_" . $value;
            $Data->$Parameter = $request->$Parameter;
        }
        $Data->answer = $request->answer;
        $Data->created_by = auth()->id();
        $Data->updated_by = auth()->id();

        $Data->save();

        //$request->session()->flash('success', 'Content created successfully. Title: "' . $request->title . '" and Display order:' . $request->display_order);

        return response(['message' => "Question created successfully."]);
    }

    public function edit(Request $request, $Content) {
        $Data = \App\Question::find($Content);
        if ($Data == null) {
            return back()->with('error', 'Invalid data given.');
        }
        return view('new-admin.' . $request->route()->getName(), ['title' => "Question Edit", 'Data' => $Data]);
    }

    public function update(Request $request, $Question) {
        $Required = [
            'group' => 'required',
            'question' => 'required|max:2000',
            'answer' => 'required',
        ];


        $Message = [
            'category_id.required' => 'You must select category.',
            'language.required' => 'You must select language.',
            'question.required' => 'You must enter title.',
            'question.max' => 'Question cannot be more than 2000 character.',
            'content.required' => "You must enter the content.",
            'answer.required' => 'You must select an option as answer.',
        ];

        foreach (range(1, 4) as $value) {
            $Required["option_" . $value] = 'required|max:2000';
            $Message['option_' . $value . ".required"] = 'You must enter option ' . $value;
            $Message['option_' . $value . ".max"] = 'Option ' . $value . " cannot be more than 2000 character.";
        }

        $request->validate($Required, $Message);

        $Data = \App\Question::find($Question);

        if ($Data != null) {
            $Data->group = $request->group;
            $Data->question = $request->question;
            foreach (range(1, 4) as $value) {
                $Parameter = "option_" . $value;
                $Data->$Parameter = $request->$Parameter;
            }
            $Data->answer = $request->answer;
            $Data->created_by = auth()->id();
            $Data->updated_by = auth()->id();

            $Data->save();
            return response(['message' => "Question updated successfully."]);
        } else {
            return response(['message' => "Invalid data given to edit."], 422);
        }
    }

    public function Question_upload_view(Request $request) {
        return view('new-admin.' . $request->route()->getName(), ['title' => "Question Create"]);
    }

    public function Question_upload(Request $request) {

        $Required = [
            'language' => 'required',
            'file' => 'required|mimes:xlsx,xls'
        ];

        $Message = [
            'category_id.required' => 'You must select category.',
            'language.required' => 'You must select language.',
            'file.required' => 'You must select excel file.',
            'file.mimes' => 'File must be xlsx or xls.'
        ];

        $request->validate($Required, $Message);

        $FileName = time() . "_" . auth()->id() . "_" . $request->file->getClientOriginalName();

        $request->file->move(public_path('excel'), $FileName);

        Excel::import(new \App\Excel\QuestionImport($request->category_id, $request->language), public_path('excel/' . $FileName));
        unlink(public_path('excel/' . $FileName));
        return response(['message' => "Question upload complete."]);
    }

    public function destroy(Request $request, $Content) {
        $Data = \App\Question::find($Content);
        if ($Data != null) {
            $Data->delete();
            return response(['message' => "Question deleted successfully."]);
        } else {
            return response(['message' => "Invalid data given to delete."], 422);
        }
    }

}
