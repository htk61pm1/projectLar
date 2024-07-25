<?php

namespace App\Http\Controllers;

use App\Http\Middleware\PreventRequestsDuringMaintenance;
use App\Models\Woman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WomanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $women = Woman::orderBy('id', 'desc')->get();
        return view('women.index', compact('women'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('women.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string',
            'biography' => 'required|string',
            'field_of_work' => 'required|string',
            'image' => 'required|image|max:2048',
            'birth_date' => 'required|date'
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = 'storage/'.$image->store('imgs', 'public');
        }

        $errors = $validator->errors();

        if ($errors->any()) {
            return redirect()->back()->with('failed', ['title' => 'Failed!', 'message' => 'Failed to create profile! Error:'.'<br>'."$errors"]);
        }
        else {
            $validatedData = $validator->valid();
            $validatedData['image'] = $imagePath;

            if(Woman::create($validatedData)){
                return redirect()->route('women.index')->with('success', ['title' => 'Success!', 'message' => 'Woman profile created successfully!']);
            }
            else {
                return redirect()->back()->withErrors('failed', ['title' => 'Failed!', 'message' => 'Unknown error: Failed to create a profile! ']);
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Woman $woman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Woman $woman)
    {
        return view('women.edit', compact('woman'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Woman $woman)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'biography' => 'required|string',
            'field_of_work' => 'required|string',
            'birth_date' => 'required|date'
        ]);

        $errors = $validator->errors();

        if ($errors->any()) {
            return redirect()->back()->with('failed', ['title' => 'Failed!', 'message' => 'Failed to update profile!'.$errors]);
        }
        else {
            $validatedData = $validator->valid();
            if ($request->hasFile('image')){
                $image = $request->file('image');
                $imagePath = 'storage/'.$image->store('imgs', 'public');
                $validatedData['image'] = $imagePath;
            }
            if($woman->update($validatedData)){
                return redirect()->route('women.index')->with('success', ['title' => 'Success!', 'message' => 'Woman profile updated successfully!']);
            }
            else {
                return redirect()->back()->withErrors('failed', ['title' => 'Failed!', 'message' => 'Failed to update profile!']);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Woman $woman)
    {
        if($woman->delete()){
            return redirect()->route('women.index')->with('success', ['title' => 'Success!', 'message' => 'Woman profile deleted successfully!']);
        }
        else {
            return redirect()->back()->withErrors('failed', ['title' => 'Failed!', 'message' => 'Failed to delete profile!']);
        }
    }
}
