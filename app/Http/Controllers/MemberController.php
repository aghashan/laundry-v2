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

    public function store(Request $request): RedirectResponse
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

        return redirect()->route('members.index');
    }

    public function destroy($id): RedirectResponse
    {
        Member::find($id)->delete();

        return redirect()->route('members.index');
    }
}
