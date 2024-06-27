<?php

namespace App\Http\Controllers;

use App\User;
use App\UserInfo;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function __construct()
    {
        return $this->middleware("auth");
    }

    public function formView()
    {
        return view('student.form');
    }

    public function formRequest(Request $request)
    {
        $student = new UserInfo();
        $student->name = $request->input('name');
        $student->gender = $request->input('gender');
        $student->phone = $request->input('phone');

        if($student->save()) {
            return $student->all();
        }
        return 'register fail';
    }

    public function list()
    {
        $student = new UserInfo();
//        $output = $student->all();
//        $output = $student->first();
//        $output = $student->find('3');
//        $output = $student->where('gender', '1')->get();
//        $output = $student->where('id', '>', 3)->get();
//        $output = $student->where('id', '>', 3)->count();
//        $output = $student->where('id', '>', 3)->first();
//        $output = $student->orderBy('name')->take(3)->get();
        $output = $student->orderBy('name', 'desc')->paginate(5);
        return view('student.list', compact('output'));
    }

    public function detail($id)
    {
        $student = new UserInfo();
        $result = $student->find($id);
        return $result;
    }

    public function delete($id)
    {
        $student = new UserInfo();
        $result = $student->find($id)->delete();
        if($result) {
            return back();
        }else {
            return "Some Error";
        }
    }

    public function edit($id)
    {
        $student = new UserInfo();
        $result = $student->find($id);
        return view('student.edit-form', compact('result'));
    }

    public function update(Request $request)
    {
        return $request;

        $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'phone' => 'required'
        ]);

        $row = UserInfo::find($request->input('id'));
        $row->name = $request->input('name');
        $row->phone = $request->input('phone');
        $row->gender = $request->input('gender');

        if($row->save()) {
            return redirect(route('list'));
        }else {
            return "Updated failed";
        }
    }
}
