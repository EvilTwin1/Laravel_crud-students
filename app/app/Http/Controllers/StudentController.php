<?php

namespace App\Http\Controllers;

use App\Providers\EventServiceProvider;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class StudentController extends Controller
{
    public function index()
    {
        $students =  Student::orderBy('id','desc')->paginate(5);
        $relatedStudents = Student::limit(3)->orderBy('view_count','desc')->where('view_count', '>', 4)->get();
        return view('partial.list', ['students'=> $students,'relatedStudents'=>$relatedStudents]);
    }


    public function create()
    {
        return view('partial.create');
    }

    public function show($id)
    {
        $currentStudent = Student::findOrFail($id);
        event('studentHasViewed', $currentStudent);
        return view('partial.show', compact('currentStudent'));
    }

    public function edit($id)
    {
        $currentStudent = Student::findOrFail($id);
        return view('partial.edit', compact('currentStudent'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'course' => 'required',
            'image' => 'image'
        ]);

        $student = new Student();

        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->phone = $request->input('phone');
        $student->_token = $request->input('_token');
        $student->course = $request->input('course');

        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/students', $filename);
            $student->image =$filename;
        }

        $student->save();

        return redirect('/')->with('message','Student added successfully');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'course' => 'required',
            'image' => 'image'
        ]);

        $student = Student::find($id);

        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->phone = $request->input('phone');
        $student->_token = $request->input('_token');
        $student->course = implode(" ", $request->input('course'));

        if($request->hasFile('image')){
            unlink(public_path('uploads/students/' . $student->image));
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/students', $filename);

            $student->image =$filename;
        }

        $student->save();

        return redirect('/')->with('message','Student edited successfully');
    }

    public function delete($id)
    {
        $student = Student::findOrFail($id);
        if ($student->image != null){
            unlink(public_path('uploads/students/' . $student->image));
        }

        $student->delete();

        return redirect('/')->with('message','Student deleted successfully');
    }

    public function search(Request $request)
    {
        $request->validate([
            'search' => 'required'
        ]);
        $search = $request->get('search');
        $students = Student::where('name', 'like', '%' . $search . '%')->paginate(5);
        return view('partial.search', ['students'=>$students, 'search'=>$search]);
    }
}
