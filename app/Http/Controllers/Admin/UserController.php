<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('active',1)->orderBy('id', 'DESC')->paginate(10);

        return view('admin.pages.user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $record = $request->validate([
           'name' => 'required|max:500',
            'phon' => 'required',
            'phon2' => 'required'
        ]);
        $result = User::create($record);
        if ($result){
            return redirect()->route('user.index')->with('status','کاربر با موفقیت ایجاد شد');
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
        $user = User::find($id);

        return view('admin.pages.user.update',compact('user','id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $result = $request->validate([
            'name' => 'required|max:500',
            'phon' => 'required',
            'phon2' => 'required'
        ]);

        if (User::where('id',$id)->update($result)){
            return redirect()->route('user.index')->with('status','کاربر با موفقیت آپدیت شد');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = User::destroy($id);

        if ($result) return redirect()->route('user.index')->with('status','کاربر با موفقیت حذف شد');
    }
}
