<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\InfoService;
use App\Models\Menu;
use App\Models\NameService;
use App\Models\Service;
use Illuminate\Http\Request;

class RegisterService extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aListService = NameService::paginate(10);
        return view('admin.pages.genrateservice.list',compact('aListService'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.genrateservice.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $valid = $request->validate([
           'service_name' => 'required|string|unique:name_services|max:255',
           'title' => 'required|string|unique:name_services',
           'slug' => 'required|string|unique:name_services',
        ]);

        $bool = NameService::create($valid);

        if ($bool){
            return redirect()->route('register.index');
        }else{
           echo "noting";
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

    }
    public function status(string $id){

        $aService = NameService::find($id);

        $msg = '';

        if ($aService['status'] == 1){
            NameService::where('id',$id)->update(['status' => 0]);
            $msg = "با موفقیت غیر فعال شد";
        }else{
            NameService::where('id',$id)->update(['status' => 1]);
            $msg = "با موفقیت  فعال شد";
        }

        return redirect()->route('register.index')->with('status',$msg);

    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $aNameService = NameService::find($id);
        $aService = Service::where('name_services_id',$id)->get();
        $info = InfoService::where('service_id',$id)->get();
        $blog = Blog::where('name_services_id',$id)->get();
        if (!empty($blog)){
            foreach ($blog as $item){
                if (!empty($item['img'])){
                    if (file_exists($item['img'])) unlink($item['img']);
                }
            }
        }

        if (!empty($info)){
            foreach ($info as $item){
                if (!empty($item['logo'])){
                    if (file_exists($item['logo'])) unlink($item['logo']);
                }
                if (!empty($item['city_img'])){
                    if (file_exists($item['city_img'])) unlink($item['city_img']);
                }
                if (!empty($item['header_baner'])){
                    if (file_exists($item['header_baner'])) unlink($item['header_baner']);
                }
            }
        }

        $menu = Menu::where('name_services_id',$id)->get();

        if (!empty($aNameService)) NameService::destroy($id);
        if (!empty($aService)) Service::where('name_services_id',$id)->delete();
        if (!empty($info)) InfoService::where('service_id',$id)->delete();
        if (!empty($blog)) Blog::where('name_services_id',$id)->delete();
        if (!empty($menu)) Menu::where('name_services_id',$id)->delete();

        return redirect()->back()->with('status',"خدمات با موفقیت حذف شد");
    }
}
