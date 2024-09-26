<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Department;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['departments'] = Department::get();
        return view('admin.departments.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.departments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'departments' => 'required|max:255|unique:departments,name',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ],
        [
            'departments.required' => 'The department name is required.',
            'departments.unique' => 'The department name must be unique.',
            'departments.max' => 'The department name may not be greater than 255 characters.',
        ]);

        DB::beginTransaction();
        try {
            $filePath = null;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = uniqid() . '-' . time() . '.' . $image->getClientOriginalExtension();
                $path = $image->storeAs('departments', $filename, 'public');
                $filePath = "departments/".$filename;
            }
            $departmentSave = Department::create([
                'name' => $request->departments,
                'slug' => Str::slug($request->departments),
                // 'short_description' => $request->short_description,
                'short_description' => substring_without_breaking_word($request->description),
                'description' => $request->description,
                'image' => $filePath
            ]);
            if ($departmentSave) {
                DB::commit();
                Toastr::success('Department created successfully.');
                return redirect()->route('admin.departments.index');
            }
            else {
                DB::rollBack();
                Toastr::error('Something went wrong.');
                return redirect()->back()->withInput();
            }
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error("DepartmentController::store");
            \Log::error($e);
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
        $data['department'] = Department::findorfail($id);
        return view('admin.departments.create',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'departments' => 'required|max:255|unique:departments,name,'.$id,
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ],
        [
            'departments.required' => 'The department name is required.',
            'departments.unique' => 'The department name must be unique.',
            'departments.max' => 'The department name may not be greater than 255 characters.',
        ]);

        DB::beginTransaction();
        try {
            $filePath = null;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = uniqid() . '-' . time() . '.' . $image->getClientOriginalExtension();
                $path = $image->storeAs('departments', $filename, 'public');
                $filePath = "departments/".$filename;
            }
            $departmentSave = Department::findorfail($id)->update([
                'name' => $request->departments,
                'slug' => Str::slug($request->departments),
                // 'short_description' => $request->short_description,
                'short_description' => $this->substring_without_breaking_word($request->description),
                'description' => $request->description,
                'image' => $filePath
            ]);
            if ($departmentSave) {
                DB::commit();
                Toastr::success('Department updated successfully.');
                return redirect()->route('admin.departments.index');
            }
            else {
                DB::rollBack();
                Toastr::error('Something went wrong.');
                return redirect()->back()->withInput();
            }
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error("DepartmentController::update");
            \Log::error($e);
            Toastr::error('Something went wrong.');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $isdepartmentExist = Department::findorfail($id);//->delete();
        $isdepartmentDelete = $isdepartmentExist->delete();
        if ($isdepartmentDelete) {
            Toastr::success('Department deleted successfully.');
            return redirect()->route('admin.departments.index');
        }
        else {
            Toastr::error('Something went wrong.');
            return redirect()->back()->withInput();
        }
    }
    function substring_without_breaking_word($text, $max_length = 500) {
        $text = strip_tags($text);
        if (strlen($text) <= $max_length) {
            return $text;
        }
        $trimmed = substr($text, 0, $max_length);
        $last_space = strrpos($trimmed, ' ');
        if ($last_space !== false) {
            $trimmed = substr($trimmed, 0, $last_space);
        }
        return $trimmed . '...';
    }
}
