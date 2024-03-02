<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manager;
use Illuminate\Support\Facades\Storage;
use DB;
use File;

class ManagerController extends Controller
{
    public function index()
    {
        $managers = Manager::all();
        return view('managers.index', compact('managers'));
    }

    public function create()
    {
        return view('managers.create');
    }

    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'phoneNum' => 'required|string|max:12',
            'address' => 'required',
            'username' => 'required|unique:managers',
            'password' => 'required',
            'images' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Handle image upload
        $imageName = null; // Default value

        if ($request->hasFile('images')) {
            $image = $request->file('images');
            $fileName = time() . '_' . $image->getClientOriginalName();
            // $filePath = $request->file('images')->storeAs('profiles', $fileName, 'public');
            $image->move(public_path('profiles'), $fileName);
            $filepath= public_path('profiles/' . $fileName);
            $imageName = $fileName; // Adjust the path accordingly

        }
        // Create manager
        Manager::create([
            'fname' => $request->input('fname'),
            'lname' => $request->input('lname'),
            'phoneNum' => $request->input('phoneNum'),
            'address' => $request->input('address'),
            'username' => $request->input('username'),
            'password' => $request->input('password'),
            'images' => $imageName,
        ]);

        return redirect()->route('managers.index')->with('success', 'Manager created successfully.');
    }

    public function edit($id)
    {
        $manager = Manager::findOrFail($id);
        return view('managers.edit', compact('manager'));
    }

    public function update(Request $request)
    {
        $query = DB::table('managers')
        ->select('managers.images')
        ->where('managers.id', '=', $request->id)
        ->first();

        // dd($query);
        // Validation

        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'phoneNum' => 'required|string|max:12',
            'address' => 'required',
            'username' => 'required|unique:managers,username,' . $request->id,
            'password' => 'required',
            'images' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $directory = public_path('profiles');
        $filePath = $directory . '/' . $query->images;


         // Handle image upload
         $imageName = null; // Default value

         if ($request->hasFile('images')) {
             $image = $request->file('images');
             $fileName = time() . '_' . $image->getClientOriginalName();
             // $filePath = $request->file('images')->storeAs('profiles', $fileName, 'public');
             $image->move(public_path('profiles'), $fileName);
             $filepath= public_path('profiles/' . $fileName);
             $imageName = $fileName; // Adjust the path accordingly
             File::delete($filePath);
         }
        else {

            $imageName = $query->images; // Keep the existing image if no new image is provided
        }

        // Update manager
        $manager = Manager::findOrFail($request->id);
        $manager->update([
            'fname' => $request->input('fname'),
            'lname' => $request->input('lname'),
            'phoneNum' => $request->input('phoneNum'),
            'address' => $request->input('address'),
            'username' => $request->input('username'),
            'password' => $request->input('password'),
            'images' => $imageName,
        ]);

        return redirect()->route('managers.index')->with('success', 'Manager updated successfully.');
    }

    public function delete($id)
    {
        $query = DB::table('managers')
        ->select('managers.images')
        ->where('managers.id', '=', $id)
        ->first();

        $directory = public_path('profiles');
            $filePath = $directory . '/' . $query->images;
            File::delete($filePath);

        $manager = Manager::findOrFail($id);
        $manager->delete();
        return redirect()->route('managers.index')->with('success', 'Manager deleted successfully.');
    }
}
