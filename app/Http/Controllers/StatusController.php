<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\RedirectResponse;
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

    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        Status::create([
            'name' => $request->name,
        ]);

        return redirect()->route('statuses.index');
    }

    public function destroy($id): RedirectResponse
    {
        Status::find($id)->delete();

        return redirect()->route('statuses.index');
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

        return redirect()->route('statuses.index');
    }
}
