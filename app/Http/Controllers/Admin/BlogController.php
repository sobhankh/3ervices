<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Menu;
use App\Models\NameService;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $aService = NameService::find($id);
        if (empty($aService) or $aService['is_generate'] == 0) abort('404');

        $aBlog = Blog::where('name_services_id',$id)->orderBy('id', 'DESC')->paginate(10);

        return view('admin.pages.blog.index',compact('id', 'aBlog', 'aService'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        if (empty($id)) abort('404');
        $menus = Menu::where('name_services_id',$id)->get();
        return view('admin.pages.blog.create', compact('id','menus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $request->validate([
            'title' => 'required|max:300|string',
            'description' => 'required|max:500|string',
            'img' => 'required|image|mimes:jpeg,png,webp,jpg|max:2048',
            'content' => 'required',
            'tags' => 'required',
            'menu_id' => 'required|int|exists:App\Models\Menu,id',
        ]);
        
        
        
        $fileimg = $request->file('img');
        
        $img = "upload/blog/img-".rand(0,1000)."-".time()."." . $fileimg->getClientOriginalExtension();

        $fileimg->move('upload/blog/',$img);
        
        $result = Blog::create([
            'img' => $img,
            'title' => $request['title'] ,
            'description' => $request['description'] ,
            'content' => $request['content'] ,
            'tags' => $request['tags'] ,
            'menu_id' => $request['menu_id'],
            'name_services_id' => $request['id']
        ]);
        

        if ($result) return redirect()->route('blog.index',$request['id'])->with('status','مقاله با موفقیت ایجاد شد');

        abort('404');
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
        $blog = Blog::find($id);
        if (empty($blog)) abort('404');

        $menus = Menu::where('name_services_id',$blog['name_services_id'])->get();

        return view('admin.pages.blog.update',compact('blog','menus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $aInfo = Blog::find($id);

        $request->validate([
            'title' => 'required|max:300|string',
            'description' => 'required|max:500|string',
            'img' => 'sometimes|image|mimes:jpeg,png,webp,jpg|max:2048',
            'content' => 'required',
            'tags' => 'required',
            'menu_id' => 'required|int|exists:App\Models\Menu,id',
        ]);

        $aRecord = [
            'title' => $request['title'] ,
            'description' => $request['description'] ,
            'content' => $request['content'] ,
            'tags' => $request['tags'] ,
            'menu_id' => $request['menu_id'],
        ];

        if (!empty($request['img'])){

            $fileimg = $request->file('img');
            $img = "upload/blog/img-".rand(0,1000)."-".time()."." . $fileimg->getClientOriginalExtension();
            if (!empty($aInfo['img'])){
                if (file_exists($aInfo['img'])) unlink($aInfo['img']);
            }
            $aRecord['img'] = $img;
            $fileimg->move('upload/blog/',$img);
        }

        $result = Blog::where('id',$id)->update($aRecord);

        if ($result) return redirect()->route('blog.index',$aInfo['name_services_id'])->with('status','مقاله با موفقیت آپدیت شد');
        abort('404');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog = Blog::find($id);
        $redirect = $blog['name_services_id'];
        if (!empty($blog['img'])){
            if (file_exists($blog['img'])){
                unlink($blog['img']);
            }
        }
        $result = Blog::destroy($id);

        if ($result)  return redirect()->route('blog.index',$redirect)->with('status','وبلاگ حذف شد');

        return redirect()->back();
    }

    public function status($id){
        $ablog = Blog::find($id);

        $msg = '';

        if ($ablog['status'] == 1){
            Blog::where('id',$id)->update(['status' => 0]);
            $msg = "با موفقیت غیر فعال شد";
        }else{
            Blog::where('id',$id)->update(['status' => 1]);
            $msg = "با موفقیت  فعال شد";
        }

        return redirect()->route('blog.index',$ablog['name_services_id'])->with('status',$msg);
    }
}
