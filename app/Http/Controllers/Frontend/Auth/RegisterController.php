<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Events\MemberRegisterEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\MemberRegisterFormRequest;
use App\Models\Member;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:member');
    }

    public function registerForm()
    {
        return view('frontend.auth.register');
    }

    public function register(MemberRegisterFormRequest $request)
    {
        $requestData                   = [];
        $requestData['title']          = $request->title;
        $requestData['name']           = $request->name;
        $requestData['email']          = $request->email;
        $requestData['contact_number'] = $request->contact_number;
        $requestData['institution']    = $request->institution;
        $requestData['password']       = $request->password;
        $requestData['created_date']   = now();

        $member = Member::create($requestData);

        MemberRegisterEvent::dispatch($member);

        return redirect()->back()->with('message', 'You have successfully created an account');
    }
}
