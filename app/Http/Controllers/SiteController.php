<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller {

    private $exam_time = 21;
    private $final_exam_time = 21;
    private $ExamSetting = [
        'Ka' => [
            'start' => "2021-12-10 19:00:00+06:00",
            'end' => "2021-12-10 20:00:00+06:00",
            'question' => 100,
        ],
        'Kha' => [
            'start' => "2021-12-10 19:00:00+06:00",
            'end' => "2021-12-10 20:00:00+06:00",
            'question' => 100,
        ],
        'Ga' => [
            'start' => "2021-12-10 19:00:00+06:00",
            'end' => "2021-12-10 20:00:00+06:00",
            'question' => 100,
        ]
    ];

    public function __construct() {
        $this->middleware('auth');
    }

    public function quiz() {
        $UserData = \App\User::find(auth()->id());
        if ($UserData->gender == null) {
            return redirect(route('quiz_profile'))->with('error', 'দয়া করে প্রোফাইল আপডেট করুন। অন‌্যথায় কুইজে অংশগ্রহণ করতে পারবেন না।');
        }

        if (session()->has('questions') && session()->has('exam_end')) {
            if (time() < session('exam_end')) {
                return view('quiz.quiz', ['type' => 'exam']);
            } else {
                $Data = \App\Exam::where('user_id', $UserData->id)->first();

                $Time = date("Y-m-d H:i:s");
                $MicroTime = microtime(true);

                $QuestionIds = explode(",", $Data->questions);
                $QuestionList = \App\Question::whereIn('id', $QuestionIds)->get();
                $Questions = [];
                foreach ($QuestionList as $value) {
                    $Questions[$value->id] = $value;
                }

                $Mark = 0;
                $Answer = json_decode($Data->answer_submitted, true);
                if (!empty($Answer) && count($Answer)) {
                    foreach ($Answer as $key => $value) {
                        if ($Questions[$key]->answer == (int) $value) {
                            $Mark++;
                        }
                    }
                }

                $Data->submitted = $Time;
                $Data->submitted_micro = $MicroTime;
                $Data->time_taken = $MicroTime - $Data->started_micro;
                $Data->mark_obtained = $Mark;
                $Data->save();

                session()->forget(['exam_start']);
                session()->forget(['start_time_micro']);
                session()->forget(['exam_end']);
                session()->forget(['questions']);
                session()->forget(['id']);

                return view('quiz.quiz', ['type' => 'list']);
            }
        } else {
            $Data = \App\Exam::where('user_id', $UserData->id)->first();
            if ($Data != null) {
                if (time() < strtotime($Data->exam_end_at)) {
                    if (empty($Data->submitted)) {
                        session(['exam_start' => strtotime($Data->started)]);
                        session(['start_time_micro' => $Data->started_micro]);
                        session(['exam_end' => strtotime($Data->exam_end_at)]);
                        session(['questions' => $Data->questions]);
                        session(['id' => $Data->id]);
                        return view('quiz.quiz', ['type' => 'exam']);
                    }
                }
            }
            return view('quiz.quiz', ['type' => 'list', 'ExamSetting' => $this->ExamSetting[$UserData->group]]);
        }
    }

    public function quiz_start(Request $request) {

        $Group = auth()->user()->group;

        if (time() < strtotime($this->ExamSetting[$Group]['start'])) {
            return response(['status' => false, 'message' => "কুইজের সময় শুরু হয় নাই। "]);
        }
        if (time() > strtotime($this->ExamSetting[$Group]['end'])) {
            return response(['status' => false, 'message' => "কুইজের সময় শেষ হয়েছে। আর কুইজ দেওয়া যাবে না।"]);
        }
        $Data = \App\Exam::where('user_id', auth()->id())->first();
        if ($Data != null) {
            return response(['status' => false, 'message' => "আপনি ইতিমধ‌্যে একবার অংশগ্রহণ করেছেন। আর অংশগ্রহণ করতে পারবেন না।"]);
        }




        $Question = \App\Question::where('group', $Group)->inRandomOrder()->limit($this->ExamSetting[$Group]['question'])->get();

        if ($Question->count() == $this->ExamSetting[$Group]['question']) {
            $QuestionList = [];

            foreach ($Question as $value) {
                $QuestionList[] = $value->id;
            }
            $Time = date("Y-m-d H:i:s");
            $StartTimeMicrotime = microtime(true);
            $End = strtotime($Time . " +" . $this->final_exam_time . " minutes");


            $Data = new \App\Exam;
            $Data->user_id = auth()->id();
            $Data->questions = implode(",", $QuestionList);
            $Data->started = $Time;
            $Data->started_micro = $StartTimeMicrotime;
            $Data->exam_time = $this->final_exam_time;
            $Data->exam_end_at = date("Y-m-d H:i:s", $End);
            $Data->save();

            $ID = $Data->id;

            session(['exam_start' => strtotime($Time)]);
            session(['start_time_micro' => $StartTimeMicrotime]);
            session(['exam_end' => $End]);
            session(['questions' => implode(",", $QuestionList)]);
            session(['id' => $Data->id]);

            return response(['status' => true]);
        }
    }

    public function quiz_save(Request $request) {
        $Data = \App\Exam::where('user_id', auth()->id())->first();
        if ($Data != null) {
            if (time() < strtotime($Data->exam_end_at)) {
                if ($request->has('answer')) {
                    $Data->answer_submitted = json_encode($request->answer);
                    $Data->save();
                    return response(['status' => true]);
                } else {
                    return response(['status' => false, 'message' => "কোন উত্তর দাগানো হয় নাই।"]);
                }
            } else {
                return response(['status' => false, 'message' => "পরীক্ষার সময় শেষ। দয়া করে সাবমিট করুন।"]);
            }
        } else {
            return response(['status' => false, 'message' => "কোন পরীক্ষা পাওয়া যায় নাই।"]);
        }
    }

    public function quiz_submit(Request $request) {
        $Data = \App\Exam::where('user_id', auth()->id())->first();
        if ($Data != null) {
            if ($request->has('answer')) {
                $Time = date("Y-m-d H:i:s");
                $MicroTime = microtime(true);

                $QuestionIds = explode(",", $Data->questions);
                $QuestionList = \App\Question::whereIn('id', $QuestionIds)->get();
                $Questions = [];
                foreach ($QuestionList as $value) {
                    $Questions[$value->id] = $value;
                }

                $Mark = 0;
                if ($request->has('answer')) {
                    foreach ($request->answer as $key => $value) {
                        if ($Questions[$key]->answer == (int) $value) {
                            $Mark++;
                        }
                    }
                }

                $Data->submitted = $Time;
                $Data->submitted_micro = $MicroTime;
                $Data->time_taken = $MicroTime - $Data->started_micro;
                $Data->mark_obtained = $Mark;
                $Data->answer_submitted = json_encode($request->answer);
                $Data->save();

                session()->forget(['exam_start']);
                session()->forget(['start_time_micro']);
                session()->forget(['exam_end']);
                session()->forget(['questions']);
                session()->forget(['id']);

                return response(['status' => true]);
            } else {
                return response(['status' => false, 'message' => "কোন উত্তর পাওয়া যায় নাই।"]);
            }
        } else {
            return response(['status' => false, 'message' => "কোন পরীক্ষা পাওয়া যায় নাই।"]);
        }
    }

    public function profile() {
        $ExamSetting = $this->ExamSetting;
        return view('quiz.profile', compact('ExamSetting'));
    }

    public function logout() {
        \Auth::logout();
        return redirect(route('landing'));
    }

}
