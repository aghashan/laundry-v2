<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StatusController extends Controller
{
    public function index()
    {
        $statuses = Status::all();
        return view('/content/status/index', compact('statuses'));
    }

    public function create(): View
    {
        return view('/content/status/add');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        Status::create([
            'name' => $request->name,
        ]);

        session()->flash('success','Status add successfully');
        return redirect()->route('statuses.add');
    }

    public function edit($id): View
    {
        $status = Status::find($id);

        return view('/content/status/edit', compact('status'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => ['required'],
        ]);

        $status = Status::find($id);

        $status->update([
            'name' => $request->name,
        ]);

        return response()->json(['success' => 'Status updated successfully ']);
    }

    public function destroy($id)
    {
        Status::find($id)->delete();
        return redirect()->route('statuses.index');
    }
}
