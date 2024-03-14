<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Appointment;
use App\Models\SkillCard;
use App\Models\Customer;
use Illuminate\Support\Facades\Storage;
use DB;
use File;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $request)
    {
       // Validation
    //    dd($request);
       $request->validate([
        'fname' => 'required',
        'lname' => 'required',
        'phoneNum' => 'required|string|max:12',
        'address' => 'required',
        'username' => 'required|unique:employees',
        'password' => 'required',
        'images' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);
    // dd($request);
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
     // Create employee
     Employee::create([
        'fname' => $request->input('fname'),
        'lname' => $request->input('lname'),
        'phoneNum' => $request->input('phoneNum'),
        'address' => $request->input('address'),
        'username' => $request->input('username'),
        'password' => bcrypt($request->input('password')),
        'images' => $imageName,
    ]);
    return redirect()->route('employees.index')->with('success', 'Employee created successfully.');

    }

    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        return view('employees.edit', compact('employee'));
    }

    public function update(Request $request)
    {
        $query = DB::table('employees')
        ->select('employees.images')
        ->where('employees.id', '=', $request->id)
        ->first();

        // dd($query);

       $request->validate([
        'fname' => 'required',
        'lname' => 'required',
        'phoneNum' => 'required|string|max:12',
        'address' => 'required',
        'username' => 'required|unique:employees,username,' . $request->id,
        'password' => 'required',
        'images' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);
    $directory = public_path('profiles');
    $filePath = $directory . '/' . $query->images;


     // Handle image upload
     $imageName = null; // Default value

     if ($request->hasFile('images')) {
         $image = $request->file('images');
         $fileName = time() . '_' . $image->getClientOriginalName();
         $image->move(public_path('profiles'), $fileName);
         $filepath= public_path('profiles/' . $fileName);
         $imageName = $fileName; // Adjust the path accordingly
         File::delete($filePath);
     }
     else {

        $imageName = $query->images; // Keep the existing image if no new image is provided
    }
     // Update Employee
     $employee = Employee::findOrFail($request->id);
     $employee->update([
         'fname' => $request->input('fname'),
         'lname' => $request->input('lname'),
         'phoneNum' => $request->input('phoneNum'),
         'address' => $request->input('address'),
         'username' => $request->input('username'),
         'password' => bcrypt($request->input('password')),
         'images' => $imageName,
     ]);

     return redirect(PHP_WINDOWS_EVENT_CTRL_BREAK)->route('employees.index')->with('success', 'Employee updated successfully.');
    }

    public function delete($id)
    {
        $query = DB::table('employees')
        ->select('employees.images')
        ->where('employees.id', '=', $id)
        ->first();

        $directory = public_path('profiles');
    $filePath = $directory . '/' . $query->images;
 //    dd($filePath);
    File::delete($filePath);

        $employee = Employee::findOrFail($id);
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully!');
    }

    public function appointments($id)
    {
        // dd($id);
        $appointments = Appointment::where('employee_id', '=', $id)->get();
        // dd($appointments);
        // $customer = Customer::findOrFail($appointments->customer_id);
        return view('handled.index', compact('appointments'));
    }

    public function confirm($id)
    {

        Appointment::where('status', 'booked')->where('id', $id)->update(['status' => 'confirmed']);
        return redirect()->route('employees.appointment', auth()->guard('employee')->user()->id);
    }

    public function decline($id)
    {
        Appointment::where('status', 'booked')->where('id', $id)->update(['status' => 'declined']);
        return redirect()->route('employees.appointment', auth()->guard('employee')->user()->id);
    }

    public function skillcards($id)
    {
        // dd($id);
        $skill = SkillCard::where('employee_id', '=', $id)->first();
        // dd($skill);
        return view('employeeskillcards.index', compact('skill'));
    }

    public function skillcards_create($id)
    {
        // dd($id);
        return view('employeeskillcards.create');
    }
    public function skillcards_store(request $request)
    {
        // dd($id);
        // dd($request);

        $insert = [
            'specialization'=> $request->Specialization,
            'description'=> $request->Description,
            'knowledges'=> $request->Knowledges,
            'employee_id'=> auth()->guard('employee')->user()->id
        ];
        // dd($insert);
        SkillCard::create($insert);
        return view('employeeskillcards.index');
    }
}
