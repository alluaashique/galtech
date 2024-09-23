<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Treatment;

use Brian2694\Toastr\Facades\Toastr;

class TreatmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.treatments.list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.treatments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'treatments' => 'required|max:255|unique:treatments,name'
        ],
        [
            'treatments.required' => 'The treatment name is required.',
            'treatments.unique' => 'The treatment name must be unique.',
            'treatments.max' => 'The treatment name may not be greater than 255 characters.',
        ]);
        $treatmentSave = Treatment::create([
            'name' => $request->treatments
        ]);

        if ($treatmentSave) {
            Toastr::success('Treatment created successfully.');
            return redirect()->route('admin.treatments.index');
        }
        else {
            Toastr::error('Something went wrong.');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
