<?php

namespace App\Http\Controllers;

use App\Models\People;
use Illuminate\Http\Request;

class PeopleController extends Controller
{
    public function index()
    {
        $people = People::paginate(10);
        return view('dashboard.people.index', compact('people'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'Nama' => 'required|string|max:255',
            'No_WA' => 'required|string|max:20',
            'Role' => 'required|string',
            'Circle' => 'required|string',
            'Status' => 'required|string',
        ]);

        People::create($request->all());

        return redirect()->back()->with('success', 'Person added successfully');
    }

    public function destroy($id)
    {
        $person = People::findOrFail($id);
        $person->delete();

        return redirect()->back()->with('success', 'Person deleted successfully');
    }

    public function edit($id)
    {
        $person = People::findOrFail($id);
        return view('dashboard.people.editpeople', compact('person'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Nama' => 'required|string|max:255',
            'No_WA' => 'required|string|max:20',
            'Role' => 'required|string',
            'Circle' => 'required|string',
            'Status' => 'required|string',
        ]);

        $person = People::findOrFail($id);
        $person->update($request->all());

        return redirect()->route('dashboard.people')->with('success', 'Person updated successfully');
    }


    public function show($id)
    {
        $person = People::findOrFail($id);
        return view('dashboard.people.detailpeople', compact('person'));
    }


}
