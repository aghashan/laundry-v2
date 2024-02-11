<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MemberController extends Controller
{
    public function index(): View
    {
        $members = Member::all();
        return view('/content/member/index', compact('members'));
    }

    public function create(): View
    {
        return view('/content/member/add');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'max:255'],
            'alamat' => ['required', 'max:255'],
            'no_tlp' => ['required', 'string', 'max:13', 'regex:/^[0-9]*$/'],
        ]);

        Member::create([
            'name' => $request->name,
            'alamat' => $request->alamat,
            'no_tlp' => $request->no_tlp,
        ]);

        return response()->json(['success' => 'Member add successfully']);
    }

    public function edit($id): View
    {
        $member = Member::find($id);

        return view('/content/member/edit', compact('member'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => ['required', 'max:255'],
            'alamat' => ['required', 'max:255'],
            'no_tlp' => ['required', 'string', 'max:13', 'regex:/^[0-9]*$/'],
        ]);

        $member = Member::find($id);

        $member->update([
            'name' => $request->name,
            'alamat' => $request->alamat,
            'no_tlp' => $request->no_tlp,
        ]);

        return response()->json(['success'=>'Member updated successfully']);
    }

    public function destroy($id)
    {
        Member::find($id)->delete();

        return response()->json(['success' => 'Member deleted successfully']);
    }
}
