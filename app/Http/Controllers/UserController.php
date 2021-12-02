<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Traits\MobileNoValidatorTrait;
use PDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class UserController extends Controller {

    use MobileNoValidatorTrait;

    private $DateCheck = "2021-12-10";
    private $RegistrationStart = '2021-11-29 00:00:00';
    private $RegistrationEnd = '2021-12-09 23:59:59';

    public function __construct() {
        $this->middleware('auth', ['only' => [
                'get_user', 'create', 'store', 'index', 'edit', 'update', 'profile_update', 'profile_password_update'
            ]
        ]);
    }

    public function registration_view() {
        $RegistrationStart = $this->RegistrationStart;
        $RegistrationEnd = $this->RegistrationEnd;
        return view('register', compact('RegistrationStart', 'RegistrationEnd'));
    }

    public function registration(Request $request) {
        if (isset($request->agree)) {

            $Required = [
                'name' => 'required|max:255',
                'email' => 'required|email|unique:users,email',
                'mobile_number' => 'required|unique:users,mobile_number|max:11',
                'day' => 'required',
                'month' => 'required',
                'year' => 'required',
                'occupation' => 'required',
                'institute' => 'required|max:512',
                'gender' => 'required',
                'district_id' => 'required',
                'address' => 'required|max: 255',
                'captcha' => "required|captcha",
            ];

            $Message = [
                'name.required' => 'পূর্ণ নাম দিন',
                'name.max' => 'নাম সর্বোচ্চ ২৫৫ অক্ষর হতে পারবে।',
                'email.required' => "ইমেইল অ‌্যাড্রেস দিন।",
                'email.email' => 'ভ‌্যালিড ইমেইল অ‌্যাকাউন্ট প্রবেশ করান।',
                'email.unique' => 'এই ইমেইল অ‌্যাকাউন্ট দিয়ে ইতিমধ‌্যে রেজিস্ট্রেশন করা হয়েছে।',
                'mobile_number.required' => 'মোবাইল নম্বর লিখুন।',
                'mobile_number.max' => 'মোবাইল নম্বর সর্বোচ্চ ১১ ডিজিট হতে পারবে।',
                'mobile_number.unique' => 'এই মোবাইল নম্বর দিয়ে ইতিমধ‌্যে রেজিস্ট্রেশন করা হয়েছে।',
                'day.required' => 'জন্মতারিখের দিন নির্বাচন করুন।',
                'month.required' => 'জন্মতারিখের মাস নির্বাচন করুন।',
                'year.required' => 'জন্মতারিখের বছর নির্বাচন করুন।',
                'occupation.required' => 'পেশা নির্বাচন করুন।',
                'institute.required' => 'প্রতিষ্ঠানের নাম লিখুন।',
                'institute.max' => 'প্রতিষ্ঠানের নাম সর্বোচ্চ ৫১২ অক্ষর হতে পারবে।',
                'gender.required' => 'লিঙ্গ নির্বাচন করুন।',
                'district_id.required' => 'জেলা নির্বাচন করুন।',
                'address.required' => 'ঠিকানা লিখুন।',
                'address.max' => 'ঠিকানা সর্বোচ্চ ২৫৫ অক্ষর হতে পারবে।',
                'captcha.required' => "ক‌্যাপচা প্রবেশ করান।",
                'captcha.captcha' => "ক‌্যাপচা মিলে নাই।",
            ];
            $request->validate($Required, $Message);

            $Day = (int) $request->day;
            $Month = (int) $request->month;
            $Year = (int) $request->year;

            if (!checkdate($Month, $Day, $Year)) {
                return redirect()->back()->with('error', 'ভুল জন্মতারিখ দিয়েছেন। দয়া করে সঠিক জন্মতারিখ বসান।')->withInput();
            }

            $Day = ($Day < 10) ? "0" . $Day : $Day;
            $Month = ($Month < 10) ? "0" . $Month : $Month;

            $DateofBirth = $Year . "-" . $Month . "-" . $Day;

            if (!$this->mobileNoValidator($request->mobile_number)) {
                return redirect()->back()->with('error', 'ভুল মোবাইল নম্বর দিয়েছেন। দয়া করে সঠিক মোবাইল নম্বর লিখুন।')->withInput();
            }


            $User = new \App\User;
            $User->email = $request->email;
            $User->mobile_number = $request->mobile_number;
            $User->name = $request->name;
            $User->address = $request->address;
            $User->district_id = $request->district_id;
            $User->occupation = $request->occupation;
            $User->institute = $request->institute;
            $User->gender = $request->gender;
            $User->nid = $request->nid;
            $User->date_of_birth = $DateofBirth;
            $User->user_type = 'User';
            $User->status = 'Awaiting Verification';
            if ($User->save()) {
                $Id = $User->id;
                $RandomNumber = mt_rand(1000000, 10000000);
                $VerificationCode = $Id . $RandomNumber;
                $CheckDigit = $this->CheckDigit($VerificationCode);
                $VerificationCode .= $CheckDigit;
                $User->remember_token = $VerificationCode;
                if ($User->save()) {

                    $details = [
                        'name' => $request->name,
                        'to' => $request->email,
                        'from' => env("MAIL_FROM_ADDRESS"),
                        'from_name' => env("MAIL_FROM_NAME"),
                        'subject' => "ডিজিটাল বাংলাদেশ দিবস ২০২১ কনসার্ট ইমেইল ভেরিফিকেশন",
                        'id' => $User->id,
                        "code" => $VerificationCode
                    ];

                    \Config::set('mail.mailers.smtp.username', \App\TemporaryExam::getVariable('APP_HASH_2'));
                    \Config::set('mail.mailers.smtp.password', \App\TemporaryExam::getVariable('APP_HASH'));


                    \Mail::to($request->email)->send(new \App\Mail\Mailer($details));


                    return redirect(route('registration'))->with('success', 'রেজিস্ট্রেশন সম্পন্ন হয়েছে। দয়া করে আপনার ইমেইলের ইনবক্স/প্রোমোশন/সোসাল সেকশন এ দেখুন। যদি না পান তবে স্প‌্যামবক্স দেখুন।');
                }
            }
        } else {
            return redirect()->back()->withErrors(['দয়া করে শর্তাবলি মেনে নিয়ে টিক দিন।'])->withInput();
        }
    }

    public function register_view() {
        return view('register');
    }

    public function login_view() {
        if (Auth::check() || Auth::viaRemember()) {
            return redirect(route("quiz_profile"));
        } else {
            return view('login');
        }
    }

    public function login(Request $request) {

        $Required = [
            'email' => 'required|email',
            'password' => 'required|min:8',
        ];

        $Message = [
            'email.required' => 'ইমেইল অ‌্যাকাউন্ট প্রবেশ করান।',
            'email.email' => 'ভ‌্যালিড ইমেইল অ‌্যাকাউন্ট প্রবেশ করান।',
            'password.required' => 'পাসওয়ার্ড প্রবেশ করান।',
            'password.min' => 'পাসওয়ার্ড কমপক্ষে ৮ (আট) অক্ষরের হতে হবে।',
            'captcha.required' => "ক‌্যাপচা প্রবেশ করান।",
            'captcha.captcha' => "ক‌্যাপচা মিলে নাই।",
        ];
        $request->validate($Required, $Message);

        $credentials = $request->only('email', 'password');
        $Remember = isset($request->remember);

        $User = \App\User::where('email', $request->email)->first();
        if ($User) {
            if (password_verify($request->password, $User->password)) {
                if ($User->status == 'Active') {
                    if (Auth::attempt($credentials, $Remember)) {
                        if (in_array($User->user_type, ['Admin', 'Manager', 'Entry'])) {
                            return redirect()->route('admin.dashboard');
                        }
                        return redirect(route("quiz_profile"));
                    } else {
                        return redirect()->back()->with('error', 'সঠিক ইমেইল/পাসওয়ার্ড দিন।');
                    }
                } else {
                    if ($User->status == 'Awaiting Verification') {
                        return redirect()->back()->with('error', 'আপনার ইমেইল অ‌্যাকাউন্ট ভেরিফায়েড নয়। দয়া করে ভেরিফাই করুন।');
                    } else {
                        return redirect()->back()->with('error', 'আপনার অ‌্যাকাউন্ট ইন-অ‌্যাকটিভ। অ‌্যাডমিনের সাথে যোগাযোগ করুন।');
                    }
                }
            } else {
                return redirect()->back()->with('error', 'ভুল পাসওয়ার্ড দেওয়া হয়েছে।');
            }
        } else {
            return redirect()->back()->with('error', 'এই ইমেইল দিয়ে কোন অ‌্যাকাউন্ট পাওয়া যায় নাই।');
        }
    }

    public function message() {
        return view('process-messages')->with('message', 'রেজিস্ট্রেশন সম্পন্ন হয়েছে। দয়া করে ইমেইল ইনবক্স/প্রোমোশন/সোসাল সেকশন এ দেখুন। না পেলে স্প‌্যামবক্স দেখুন।');
    }

    private function CheckDigit($Digit) {
        if ((int) $Digit > 9) {
            $Sum = 0;
            $Digit = (string) $Digit;
            for ($i = 1; $i <= strlen($Digit); $i++) {
                $Sum += (int) substr($Digit, $i - 1, 1);
            }
            return $this->CheckDigit($Sum);
        } else {
            return $Digit;
        }
    }

    public function get_user(Request $request) {
        $Mobile = $request->mobile;

        $User = \App\User::where('mobile', $Mobile)->select('id', 'first_name', 'last_name')->get();

        $Data = [];
        foreach ($User as $value) {
            $Data[] = ['id' => $value->id, "name" => $value->first_name . " " . $value->last_name];
        }

        return $Data;
    }

    public function email_verify_resend() {
        return view('email_verify_resend');
    }

    public function email_verify_resend_code(Request $request) {

        $Required = [
            'email' => 'required|email',
            'captcha' => "required|captcha",
        ];

        $Message = [
            'email.required' => "ইমেইল অ‌্যাড্রেস দিন।",
            'email.email' => 'ভ‌্যালিড ইমেইল অ‌্যাকাউন্ট প্রবেশ করান।',
            'captcha.required' => "ক‌্যাপচা প্রবেশ করান।",
            'captcha.captcha' => "ক‌্যাপচা মিলে নাই।",
        ];

        $request->validate($Required, $Message);

        $User = \App\User::where('email', $request->email)->whereNull('email_verified_at')->where('status', 'Awaiting Verification')->first();
        if ($User != null) {
            $VerificationCode = $User->remember_token;



            $details = [
                'to' => $request->email,
                'name' => $User->name,
                'group' => $this->Group[$User->group],
                'from' => env("MAIL_FROM_ADDRESS"),
                'from_name' => env("MAIL_FROM_NAME"),
                'subject' => "ডিজিটাল বাংলাদেশ কুইজ ইমেইল ভেরিফিকেশন",
                'id' => $User->id,
                "code" => $VerificationCode
            ];


            \Config::set('mail.mailers.smtp.username', \App\TemporaryExam::getVariable('APP_HASH_2'));
            \Config::set('mail.mailers.smtp.password', \App\TemporaryExam::getVariable('APP_HASH'));





            \Mail::to($request->email)->send(new \App\Mail\Mailer($details));


            return redirect('/message')->with('success', 'ইমেইল ভেরিফিকেশন আপনার ইমেইলে আবার পাঠানো হয়েছে। দয়া করে আপনার ইমেইলের ইনবক্স/প্রোমোশন/সোসাল সেকশন এ দেখুন। যদি না পান তবে স্প‌্যামবক্স দেখুন।');
        } else {
            return redirect()->back()->withErrors(['ভুল ইমেইল অ‌্যড্রেস দেওয়া হয়েছে অথবা ইমেইল ইতিমধ‌্যে ভেরিফাইড হয়েছে।'])->withInput();
        }
    }

    public function email_verify(Request $request, $id, $code) {
        $User = \App\User::find($id);
        if ($User != null) {
            if ($User->email_verified_at == NULL) {
                if ($code == $User->remember_token) {
                    $User->email_verified_at = date("Y-m-d H:i:s");
                    $User->status = 'Active';
                    if ($User->save()) {

                        $Ticket = "DBD2021-" . str_pad($User->id, 7, "0", STR_PAD_LEFT);
                        $Ticket .= $this->CheckDigit($User->id);
                        $User->ticket = $Ticket;
                        $User->save();

                        $QRString = "Name: " . $User->name . "\n";
                        $QRString .= "Email: " . $User->email . "\n";
                        $QRString .= "Mobile: " . $User->mobile_no . "\n";
                        $QRString .= "Ticket No: " . $User->ticket;


                        $details = [
                            'name' => $User->name,
                            'mobile_number' => $User->mobile_number,
                            'email' => $User->email,
                            'ticket' => $User->ticket,
                            'ticket_qr' => base64_encode(QrCode::format('svg')->size(200)->errorCorrection('H')->generate($QRString))
                        ];

                        $PDF = PDF::loadView('Email.TicketPDF', $details);


                        $details = [
                            'to' => $User->email,
                            'name' => $User->name,
                            'ticket' => $User->ticket,
                            'from' => env("MAIL_FROM_ADDRESS"),
                            'from_name' => env("MAIL_FROM_NAME"),
                            'subject' => "ডিজিটাল বাংলাদেশ দিবস ২০২১ কনসার্ট টিকিট | টিকিট নং: " . $User->ticket,
                        ];


                        \Config::set('mail.mailers.smtp.username', \App\TemporaryExam::getVariable('APP_HASH_2'));
                        \Config::set('mail.mailers.smtp.password', \App\TemporaryExam::getVariable('APP_HASH'));





                        \Mail::to($request->email)->send(new \App\Mail\Mailer($details));

                        return redirect('/message')->with('success', 'ইমেইল ভেরিফিকেশন সফল হয়েছে। এখন সাইন ইন করুন।');
                    } else {
                        return redirect('/message')->with('error', 'ইমেইল ভেরিফিকেশন এ ভুল ডাটা দেওয়া হয়েছে। দয়া করে সঠিক ডাটা দিন।');
                    }
                } else {
                    return redirect('/message')->with('error', 'ইমেইল ভেরিফিকেশন এ ভুল ডাটা দেওয়া হয়েছে। দয়া করে সঠিক ডাটা দিন।');
                }
            } else {
                return redirect('/message')->with('error', 'অ‌্যাকাউন্ট ভেরিফিকেশন ইতিমধ‌্যে সম্পন্ন হয়েছে। দয়া করে সাইন ইন করুন। যদি পাসওয়ার্ড ভুলে গিয়ে থাকেন দয়া করে পাসওয়ার্ড রিসেট করে নিন।');
            }
        } else {
            return redirect('/message')->with('error', 'ইমেইল ভেরিফিকেশন এ ভুল ডাটা দেওয়া হয়েছে। দয়া করে সঠিক ডাটা দিন।');
        }
    }

    public function captcha() {
        return ["status" => true, 'src' => \Captcha::src('default')];
    }

    public function create(Request $request) {
        if (auth()->user()->user_type != 'Admin') {
            return redirect(route('admin.dashboard'))->with('error', "You do not have access to this page.");
        }
        return view('new-admin.' . $request->route()->getName(), ['title' => 'Create User']);
    }

    public function store(Request $request) {
        if (auth()->user()->user_type != 'Admin') {
            return redirect(route('admin.dashboard'))->with('error', "You do not have access to this page.");
        }
        $Required = [
            'name' => 'required',
            'email' => 'required|email:rfc|unique:App\User,email',
            'password' => 'required|confirmed|min:8',
            'user_type' => 'required',
        ];

        if ($request->hasFile('picture')) {
            $Required['picture'] = 'image|mimes:jpg,jpeg,png,JPG,JPEG,PNG|max:512';
        }

        $Message = [
            'name.required' => 'You must enter name.',
            'email.required' => 'You must enter email address.',
            'email.email' => 'Given email address is not a valid email address.',
            'email.unique' => 'User exist with given email address.',
            'password.required' => 'You must enter password.',
            'password.min' => 'Password must be minimum 8 character length.',
            'password.confirmed' => 'Password and confirm password does not match.',
            'user_type.required' => 'You must select user type.',
            'picture.image' => 'You must select a valid image for picture.',
            'picture.mimes' => 'Picture must be jpg,jpeg or png.',
            'picture.max' => 'Picture cannot be more than 512KB.',
        ];

        $request->validate($Required, $Message);
        $File = null;
        if ($request->hasFile('picture')) {
            $path = Storage::disk('s3')->put("profile-picture", $request->picture, 'public');
            $File = Storage::disk('s3')->url($path);
        }

        $Data = new \App\User;
        $Data->name = $request->name;
        $Data->email = $request->email;
        $Data->password = bcrypt($request->password);
        $Data->user_type = $request->user_type;
        $Data->picture = $File;
        $Data->status = 'Active';
        $Data->save();

        $request->session()->flash('success', 'User created successfully. Email: ' . $request->email . ", Name: " . $request->name);
        return response(['message' => "User created successfully."]);
    }

    public function index(Request $request) {
        if (auth()->user()->user_type != 'Admin') {
            return redirect(route('admin.dashboard'))->with('error', "You do not have access to this page.");
        }
        $Data = \App\User::where('id', '>', 1);
        if (!empty($request->email)) {
            $Data = $Data->where('email', $request->email);
        }
        $Data = $Data->paginate(100);
        return view('new-admin.' . $request->route()->getName(), ['title' => 'User List', 'SearchData' => $Data]);
    }

    public function edit(Request $request, $User) {
        if (auth()->user()->user_type != 'Admin') {
            return redirect(route('admin.dashboard'))->with('error', "You do not have access to this page.");
        }
        $Data = \App\User::find($User);
        if ($Data == null) {
            return back()->with('error', 'Invalid data given.');
        }
        return view('new-admin.' . $request->route()->getName(), ['title' => 'User Edit', 'UserData' => $Data]);
    }

    public function update(Request $request, $User) {
        if (auth()->user()->user_type != 'Admin') {
            return redirect(route('admin.dashboard'))->with('error', "You do not have access to this page.");
        }
        $Required = [
            'name' => 'required',
            'email' => 'required|email:rfc|unique:App\User,email,' . $User . ',id',
            'user_type' => 'required',
        ];

        if ($request->hasFile('picture')) {
            $Required['picture'] = 'image|mimes:jpg,jpeg,png,JPG,JPEG,PNG|max:512';
        }

        if ($request->filled('password')) {
            $Required['password'] = 'required|confirmed|min:8';
        }

        $Message = [
            'name.required' => 'You must enter name.',
            'email.required' => 'You must enter email address.',
            'email.email' => 'Given email address is not a valid email address.',
            'email.unique' => 'User exist with given email address.',
            'password.required' => 'You must enter password.',
            'password.min' => 'Password must be minimum 8 character length.',
            'password.confirmed' => 'Password and confirm password does not match.',
            'user_type.required' => 'You must select user type.',
            'picture.image' => 'You must select a valid image for picture.',
            'picture.mimes' => 'Picture must be jpg,jpeg or png.',
            'picture.max' => 'Picture cannot be more than 512KB.',
        ];

        $request->validate($Required, $Message);

        $Data = \App\User::find($User);

        $Data->name = $request->name;
        $Data->email = $request->email;
        if ($request->filled('password')) {
            $Data->password = bcrypt($request->password);
        }
        $Data->user_type = $request->user_type;
        $Data->status = $request->status;
        if ($request->hasFile('picture')) {
            $File = $request->picture->store('public');
            $Data->picture = $File;
        }
        $Data->save();
        $request->session()->flash('success', 'User updated successfully.');
        return response(['message' => "User updated successfully."]);
    }

    public function division_get(Request $request) {
        return \App\Division::where('country_id', $request->country_id)->orderBy($request->order_by, 'asc')->get();
    }

    public function district_get(Request $request) {
        return \App\District::where('division_id', $request->division_id)->orderBy($request->order_by, 'asc')->get();
    }

    public function profile_update(Request $request) {

        $Required = [
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'country_id' => 'required',
            'division_id' => 'required',
            'district_id' => 'required',
            'class' => 'required',
            'school' => 'required|max:512',
            //'date_of_birth' => 'required',
            'gender' => 'required',
            'nationality' => 'required',
            'mobile_number' => 'required|max:20',
        ];



        $Message = [
            'name.required' => 'আপনার নাম লিখুন।',
            'name.max' => 'নাম ২৫৫ অক্ষরের বেশি হতে পারবে না।',
            'address.required' => 'আপনার ঠিকানা লিখুন।',
            'address.max' => 'ঠিকানা ২৫৫ অক্ষরের বেশি হতে পারবে না।',
            'country_id.required' => 'আপনার দেশ নির্বাচন করুন।',
            'division_id.required' => 'আপনার বিভাগ/স্টেট নির্বাচন করুন।',
            'district_id.required' => 'আপনার জেলা/শহর নির্বাচন করুন।',
            'class.required' => 'আপনার শিক্ষাগত যোগ‌্যতা নির্বাচন করুন।',
            'school.required' => 'আপনার শিক্ষাপ্রতিষ্ঠানের নাম লিখুন।',
            'school.max' => 'শিক্ষাপ্রতিষ্ঠানের নাম ৫১২ অক্ষরের বেশি হতে পারবে না।',
            'date_of_birth.required' => 'আপনার জন্মতারিখ নির্বাচন করুন।',
            'gender.required' => 'আপনার লিঙ্গ নির্বাচন করুন।',
            'nationality.required' => 'আপনার জাতীয়তা নির্বাচন করুন।',
            'mobile_number.required' => 'আপনার মোবাইল নং লিখুন।',
            'mobile_number.max' => 'মোবাইল নং ২০ অক্ষরের বেশি হতে পারবে না।',
        ];

        if ($request->hasFile('file')) {
            $Required['file'] = "image|mimes:jpg,jpeg,png,JPG,JPEG,PNG|max:512";
            $Message['file.image'] = "সঠিক ফরমেটের ছবি নির্বাচন করুন।";
            $Message['file.mimes'] = "ছবি অবশ‌্যই jpg/jpeg/png হতে হবে।";
            $Message['file.max'] = "ছবি সর্বোচ্চ 512KB হতে পারবে।";
        }

        $request->validate($Required, $Message);

        $User = \App\User::find(auth()->id());
        $User->name = $request->name;
        $User->address = $request->address;
        $User->district_id = $request->district_id;
        $User->class = $request->class;
        $User->school = $request->school;
        //$User->date_of_birth = $request->date_of_birth;
        $User->gender = $request->gender;
        $User->nationality = $request->nationality;
        $User->mobile_number = $request->mobile_number;

        if ($request->hasFile('file')) {

            $path = Storage::disk('s3')->put("profile-picture", $request->file, 'public');
            $url = Storage::disk('s3')->url($path);
            //$File = $request->file->store('public');
            $User->picture = $url;
        }

        $User->save();

        return response(['status' => true]);
    }

    public function profile_password_update(Request $request) {


        $Required = [
            'current_password' => 'required',
            'new_password' => 'required|confirmed|min:8',
        ];



        $Message = [
            'current_password.required' => 'আপনার বর্তমান পাসওয়ার্ড দিন।',
            'new_password.required' => 'আপনার নতুন পাসওয়ার্ড দিন।',
            'new_password.confirmed' => 'নতুন পাসওয়ার্ড এবং পুনরায় প্রবেশ করানো পাসওয়ার্ড মিলে নাই।',
            'new_password.min' => 'নতুন পাসওয়ার্ড কমপক্ষে ৬ অক্ষরের হতে হবে।',
        ];

        $request->validate($Required, $Message);

        $Data = \App\User::find(auth()->id());

        if (\Hash::check($request->current_password, $Data->password)) {
            $Data->password = bcrypt($request->new_password);
            $Data->save();

            return ['status' => true];
        } else {
            return response(['message' => "আপনার বর্তমান পাসওয়ার্ড মিলে নাই।"], 422);
        }
    }

}
