<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\NameService;
use Illuminate\Http\Request;

class MenoServices extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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

        $output = $request->validate([
            'title' => 'required|max:30',
            'sort' => 'required|int|max:10',
            'description' => 'required',
            'name_services_id' => 'required',
        ]);

        $result = Menu::create($output);

        if ($result) return redirect()->back()->with('status','دسته بندی ایجاد شد');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $aService = NameService::find($id);
        if (empty($aService)) return redirect()->back();

        $aMenue = Menu::where('name_services_id', $id)->paginate(10);

        return view('admin.pages.menu.index',compact('aService','aMenue','id'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $aMenu = Menu::find($id);
        return view('admin.pages.menu.update',compact('aMenu','id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $output = $request->validate([
            'title' => 'required|max:30',
            'sort' => 'required|int|max:10',
            'description' => 'required',
            'name_services_id' => 'required',
        ]);

        $result = Menu::where('id', $id)->where('name_services_id',$output['name_services_id'])->update($output);

        if ($result) return redirect()->route('menus.show',$output['name_services_id'])->with('status','دسته بندی آپدیت شد');
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $aMenu = Menu::find($id);
        $redirect = $aMenu['name_services_id'];
        $result = Menu::destroy($id);

        if ($result)  return redirect()->route('menus.show',$redirect)->with('status','دسته بندی حذف شد');

        return redirect()->back();
    }
}
