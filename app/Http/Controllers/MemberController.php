<?php

namespace App\Http\Controllers;

use App\Member;

class MemberController extends Controller
{
    public function getHandle()
    {
        $members = Member::all();
        // dd($member);
        return view('member.index', compact('members'));
    }

    public function updateHandle(Member $member)
    {
        dd($member);
    }

    public function deleteHandle(Member $member)
    {
        $member->delete();
        return redirect('member');
    }
}