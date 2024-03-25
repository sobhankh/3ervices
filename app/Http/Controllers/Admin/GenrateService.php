<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NameService;
use App\Models\Province;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Citie;

class GenrateService extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($param)
    {

        $sNameService = NameService::where('slug',$param)->first();
        if ($sNameService['is_generate'] == 1) return redirect()->route('register.index');

        $aUsers = User::all();
        $sService = $param;
        return view('admin.pages.genrateservice.genrate-city',compact('aUsers','sService','sNameService'));
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
    public function store(Request $request,$id)
    {
        $city = Citie::all();
        $sNameService = NameService::where('slug',$id)->first();
        if ($sNameService['is_generate'] == 1) return redirect()->back()->with('status','این سرویس موجود نیست');
        $aRecord = [];

        $userid = $request->validate(['user_id' => 'required|int']);

        foreach ($city as $iKey => $aItem)
        {
            $aRecord[$iKey]['province_id'] = $aItem['province_id'];
            $aRecord[$iKey]['citiey_id'] = $aItem['id'];
            $aRecord[$iKey]['title_city'] = varParams($sNameService['service_name'],['city' => $aItem['name']]);
            $aRecord[$iKey]['city_name'] = $aItem['name'];
            $aRecord[$iKey]['user_id'] = (int) $request['user_id'];
            $aRecord[$iKey]['name_services_id'] = (int)$sNameService['id'];
            $aRecord[$iKey]['name_service_slug'] = $id;
        }

       $result = Service::insert($aRecord);

        if ($result){
            $output = NameService::where('id',$sNameService['id'])->update(['is_generate' => 1]);
            if ($output) return redirect()->route('register.index')->with('status','جنریت شهر با موفقیت انجام شد!!');
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
        $service = NameService::where('slug', $id)->first();
        $aProvinces = Province::all();
        $aUsers = User::all();

        if (empty($service)) return redirect()->back()->with('status','این سرویس موجود نیست');



        return view('admin.pages.genrateservice.mangment-city',compact('service','aProvinces','aUsers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $serviceid = NameService::where("slug",$id)->first();


        $request->validate(
            [
                "province_id" => "required",
                "citiey_id" => "required",
                "user_id" => "required",
            ]
        );

        if ($request['citiey_id'] == "all"){
            unset($request['citiey_id']);
           $staus = Service::where('name_services_id',$serviceid['id'])->where('province_id',$request['province_id'])->update([
               'user_id' => $request['user_id']
           ]);
        }else{
          $staus =  Service::where('name_services_id',$serviceid['id'])->where('citiey_id',$request['citiey_id'])->update([
              'user_id' => $request['user_id'],
          ]);
        }

        if ($staus){
            return redirect()->route('register.index')->with('status',"شهر با موفقیت آپدیت شد");
        }else{
            return redirect()->back()->with("status","آپدیت نشد");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

    }

    public function getCity(Request $request)
    {
        $city = Service::all()->where("province_id",$request['id']);

        $data = "";
        foreach ($city as $item){
            $user = User::find($item['user_id']);

            $data .= "<option value='{$item['citiey_id']}'>{$item['city_name']} - {$user['name']} - {$user['phon']} </option>";
        }
        echo $data;

    }
}
