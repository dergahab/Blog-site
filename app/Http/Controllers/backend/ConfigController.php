<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Config;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
class ConfigController extends Controller
{
    public function index(){
      $config= Config::find(1);

      return view('backend.config.index',compact('config'));
    }

    public function update(Request $request){
      $config=Config::find(1);
      $config->title=$request->title;
      $config->facebook=$request->facebook;
      $config->instagram=$request->instagram;
      $config->medium=$request->medium;
      $config->active=$request->active;

      if($request->hasFile('logo')){
        $logo=Str::slug($request->title).time().'-'.rand(0,999).".".$request->logo->getClientOriginalExtension();
        $request->logo->move(public_path('uploads'),$logo);
        $config->logo='uploads/'.$logo;
      }

      if($request->hasFile('favicon')){
        $favicon=Str::slug($request->title).time().'-'.rand(0,999).".".$request->favicon->getClientOriginalExtension();
        $request->favicon->move(public_path('uploads/'),$favicon);
        $config->favicon='uploads/'.$favicon;
      }


      $config->save();
      return redirect()->back();
    }
}
