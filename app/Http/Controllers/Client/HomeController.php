<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\InfoService;
use App\Models\Menu;
use App\Models\NameService;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(string $id){
        if (empty($id)) abort('404');
        $aService = NameService::where("slug",$id)->where("status",1)->where("is_generate",1)->where("is_setting",1)->first();
        if (empty($aService)) abort('404');
        $blog = Blog::all()->where("name_services_id",$aService['id'])->where('status',1);
        $blogHome = Blog::where("name_services_id",$aService['id'])->where('status',1)->orderBy('id', 'DESC')->paginate(16);
        $info = InfoService::where("slug_service",$id)->first();
        $menu = Menu::all()->where("name_services_id",$aService['id']);
        $city = Service::all()->where("name_service_slug",$id);

        return view('client.index',compact('aService', 'blog', 'info', 'menu','id','city','blogHome'));
    }

    public function categories(string $id,$cat){
        if (empty($id)) abort('404');
        $aService = NameService::where("slug",$id)->where("status",1)->where("is_generate",1)->where("is_setting",1)->first();
        if (empty($aService)) abort('404');
        $blog = Blog::all()->where("name_services_id",$aService['id'])->where('status',1);
        $info = InfoService::where("slug_service",$id)->first();
        $menu = Menu::all()->where("name_services_id",$aService['id']);
        $menuInfo = Menu::where("id",$cat)->first();
        $blogCate = Blog::where("name_services_id",$aService['id'])->where('status',1)->where('menu_id',$cat)->orderBy('id', 'DESC')->paginate(8);
        $city = Service::all()->where("name_service_slug",$id);

        return view('client.categori',compact('aService', 'blog', 'info', 'menu','id','city','blogCate','menuInfo'));
    }

    public function showBlog(string $id,$idblog){
        if (empty($id)) abort('404');
        $aService = NameService::where("slug",$id)->where("status",1)->where("is_generate",1)->where("is_setting",1)->first();
        if (empty($aService)) abort('404');
        $blog = Blog::all()->where("name_services_id",$aService['id'])->where('status',1);
        $info = InfoService::where("slug_service",$id)->first();
        $menu = Menu::all()->where("name_services_id",$aService['id']);
        $blogInfo = Blog::where('status',1)->find($idblog);

        return view('client.blog',compact('aService', 'blogInfo', 'menu', 'blogInfo','id','blog','info'))->render(function($view, $content) { 
            return preg_replace(
                    ['/\>[^\S ]+/s', '/[^\S ]+\</s', '/(\s)+/s'],
                    ['>', '<', '\\1'],
                    $content
            ); }
        );

    }
    public function showCity(string $id,$city){
        if (empty($id)) abort('404');
        $aService = NameService::where("slug",$id)->where("status",1)->where("is_generate",1)->where("is_setting",1)->first();
        if (empty($aService)) abort('404');
        $blog = Blog::all()->where("name_services_id",$aService['id'])->where('status',1);
        $info = InfoService::where("slug_service",$id)->first();
        $menu = Menu::all()->where("name_services_id",$aService['id']);

        $city = Service::where("id",$city)->where("name_service_slug",$id)->first();

        $data = Service::all()->where("province_id",$city['province_id'])->where("name_service_slug",$id);
        $user = User::find($city['user_id']);
        return view('client.city',compact('id', 'aService','blog','info','menu','city','data','user'))->render(function($view, $content) { 
            return preg_replace(
                    ['/\>[^\S ]+/s', '/[^\S ]+\</s', '/(\s)+/s'],
                    ['>', '<', '\\1'],
                    $content
            ); }
        );
    }

}
