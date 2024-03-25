<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InfoService;
use App\Models\NameService;
use Illuminate\Http\Request;

class InformationService extends Controller
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
        $aSerice = NameService::where('slug',$request['slug_service'])->first();
        if ($aSerice['is_generate'] == 0) return redirect()->back();

        $request->validate([
            'slug_service' => 'required',
            'logo' => 'required|image|mimes:jpeg,png,webp,jpg|max:2048',
            'city_img' => 'required|image|mimes:jpeg,png,webp,jpg|max:2048',
            'header_baner' => 'required|image|mimes:jpeg,png,webp,jpg|max:2048',
            'header_title_1' => 'required',
            'header_title_2' => 'required',
            'footer_title' => 'required',
            'footer_description' => 'required',
            'info' => 'required',
        ]);

        $fileLogo = $request->file('logo');
        $fileCity_img = $request->file('city_img');
        $fileHeader_baner = $request->file('header_baner');

        $Logo = "upload/info/logo-".$request['slug_service']."-".rand(0,1000)."-".time()."." . $fileLogo->getClientOriginalExtension();
        $City_img = "upload/info/city_img-".$request['slug_service'].'-'.rand(0,1000)."-".time()."." . $fileCity_img->getClientOriginalExtension();
        $Header_baner = "upload/info/header_baner-".$request['slug_service'].'-'.rand(0,1000)."-".time()."." . $fileHeader_baner->getClientOriginalExtension();

        $fileLogo->move('upload/info',$Logo);
        $fileCity_img->move('upload/info',$City_img);
        $fileHeader_baner->move('upload/info',$Header_baner);


        $result = InfoService::create([
           'slug_service' => $request['slug_service'] ,
           'service_id' => $aSerice['id'],
           'logo' => $Logo ,
           'city_img' => $City_img ,
           'header_baner' => $Header_baner ,
           'header_title_1' => $request['header_title_1'] ,
           'header_title_2' => $request['header_title_2'] ,
           'footer_title' => $request['footer_title'] ,
           'footer_description' => $request['footer_description'] ,
           'info' => $request['info'] ,
        ]);
        NameService::where('slug',$request['slug_service'])->update(['is_setting' => 1]);

        if ($result) return redirect()->route('register.index')->with('status','اطلاعات سرویس با موفقیت ذخیره شد');

        return redirect()->back();


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $aSerice = NameService::where('slug',$id)->first();
        $aInfoService = InfoService::where('slug_service',$id)->first();
        if ($aSerice['is_generate'] == 0) return redirect()->back();

        if (empty($aInfoService)){
            return view('admin.pages.info-service.create',compact('id'));
        }else{
            return view('admin.pages.info-service.update',compact('aInfoService','aSerice','id'));
        }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $aInfo = InfoService::find($id);
        $aSerice = NameService::where('slug',$aInfo['slug_service'])->first();

        if ($aSerice['is_generate'] == 0) return redirect()->back();

        $request->validate([
            'logo' => 'sometimes|image|mimes:jpeg,png,webp,jpg|max:2048',
            'city_img' => 'sometimes|image|mimes:jpeg,png,webp,jpg|max:2048',
            'header_baner' => 'sometimes|image|mimes:jpeg,png,webp,jpg|max:2048',
            'header_title_1' => 'required',
            'header_title_2' => 'required',
            'footer_title' => 'required',
            'footer_description' => 'required',
            'info' => 'required',
        ]);

        $aRecord = [];


        $aRecord = [
           'header_title_1' => $request['header_title_1'] ,
           'header_title_2' => $request['header_title_2'] ,
           'footer_title' => $request['footer_title'],
           'footer_description' => $request['footer_description'],
           'info' => $request['info'] ,
        ];

        if (!empty($request['logo'])){
            $fileLogo = $request->file('logo');
            $Logo = "upload/info/logo-".$aSerice['slug']."-".rand(0,1000)."-".time()."." . $fileLogo->getClientOriginalExtension();
            if (file_exists($aInfo['logo'])) unlink($aInfo['logo']);
            $aRecord['logo'] = $Logo;
            $fileLogo->move('upload/info',$Logo);
        }

        if (!empty($request['city_img'])){
            $fileCity_img = $request->file('city_img');
            $City_img = "upload/info/city_img-".$aSerice['slug'].'-'.rand(0,1000)."-".time()."." . $fileCity_img->getClientOriginalExtension();
            if (file_exists($aInfo['city_img'])) unlink($aInfo['city_img']);
            $aRecord['city_img'] = $City_img;
            $fileCity_img->move('upload/info',$City_img);
        }

        if (!empty($request['header_baner'])){
            $fileHeader_baner = $request->file('header_baner');
            $Header_baner = "upload/info/header_baner-".$aSerice['slug'].'-'.rand(0,1000)."-".time()."." . $fileHeader_baner->getClientOriginalExtension();
            if (file_exists($aInfo['header_baner'])) unlink($aInfo['header_baner']);
            $aRecord['header_baner'] = $Header_baner;
            $fileHeader_baner->move('upload/info',$Header_baner);
        }

        $result = InfoService::where('slug_service',$aInfo['slug_service'])->where('id', $id)->update($aRecord);
        NameService::where('slug',$aInfo['slug_service'])->update(['is_setting' => 1]);

        if ($result) return redirect()->route('register.index')->with('status','اطلاعات سرویس با موفقیت بروزرسانی شد');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
