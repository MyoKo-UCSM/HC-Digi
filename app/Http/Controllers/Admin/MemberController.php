<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MemberFormRequest;
use App\Interfaces\Repositories\MemberRepositoryInterface;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public $page = 'member';
    private MemberRepositoryInterface $memberRepository;

    public function __construct(MemberRepositoryInterface $memberRepository)
    {
        $this->memberRepository = $memberRepository;
    }

    public function index()
    {
        $page = $this->page;

        return view('admin.member.index', compact('page'));
    }

    public function getMembers(Request $request)
    {
        return $this->memberRepository->getAllMemberList($request);
    }

    public function create()
    {
        $page = $this->page;

        return view('admin.member.create', compact('page'));
    }

    public function store(MemberFormRequest $request)
    {
        $this->memberRepository->saveMemberData($request);

        return redirect('/admin/member')->with('flash_message', 'Member Added!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $page   = $this->page;
        $member = $this->memberRepository->getMemberData($id);

        return view('admin.member.edit', compact('member', 'page'));
    }

    public function update(Request $request, $id)
    {
        $this->memberRepository->saveMemberData($request, $id);

        return redirect('/admin/member')->with('flash_message', 'Member Updated!');
    }

    public function destroy($id)
    {
        $this->memberRepository->deleteMember($id);

        return redirect('/admin/member')->with('warning', 'Member Updated!');
    }

    public function statusChange(Request $request)
    {
        $member = $this->memberRepository->memberStatusChange($request);

        return response()->json(["success" => true]);
    }
}
