<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index() {
        $users = User::all();
        return view('user/index',compact('users'));
    }

    public function search(Request $request) {
        $query = $request->q;
        if($query) {
            $users = User::where('name' , 'like' , '%'.$query.'%') -> orWhere('email' , 'like' , '%'.$query.'%') -> get();
        } else {
            $users = User::all();
        }
        return view('user/index' , compact('users'));
    }

    public function insert(Request $request) {
        $rules = array(
            'name' => 'required',
            'password' => 'required',
            'email' => 'required',
        );
        $messages = array(
            'required' => 'กรุณากรอกข้อมูล :attribute ให้ครบถ้วน'
        );

        $temp = array(
            'name' => $request->name,
            'password' => $request->password,
            'email' => $request->email,
        );

        $validator = Validator::make($temp, $rules, $messages);
        if ($validator->fails()) {
            return redirect('user/edit/')->withErrors($validator)->withInput();
        }

        $user = new User();
        $user->name = $request->name;
        $user->password = Hash::make($request->password);
        $user->email = $request->email;
        
        $user->save();

        return redirect('user')->with('ok', true)->with('msg', 'เพื่มข้อมูลเรียบร้อยแล้ว');
    }

    public function edit($id = null) {
        if($id) {
            $users = User::where('id', $id)->first();
            return view('user/edit')->with('users', $users);
        } else {
            return view('user/add');
        }
        $users = User::find($id);
        return view('user/edit')->with('users', $users);
    }

    public function update(Request $request) {
        $rules = array(
            'name' => 'required',
            'email' => 'required',
        );
        $messages = array(
            'required' => 'กรุณากรอกข้อมูล :attribute ให้ครบถ้วน'
        );

        $id = $request->id;
        $temp = array(
            'name' => $request->name,
            'email' => $request->email,
        );

        $validator = Validator::make($temp, $rules, $messages);
        if ($validator->fails()) {
            return redirect('user/edit/'.$id)->withErrors($validator)->withInput();
        }

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        
        $user->save();

        return redirect('user')->with('ok', true)->with('msg', 'บันทึกข้อมูลเรียบร้อยแล้ว');
    }

    public function remove($id) {
        User::find($id)->delete();
        return redirect('user')->with('ok', true)->with('msg','ลบข้อมูลสำเร็จ');
    }
}
