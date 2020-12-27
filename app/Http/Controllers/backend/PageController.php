<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Http\Requests;
use App\Models\Pages;
class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $pages = Pages::all();

        return view('backend.pages.index',compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.creat');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validateData = $request->validate([
        'title'=>'min:3|required',
        'content'=>'min:10|required',
        'image'=>'mimes:jpg,png,jpeg'
      ]);

      $pages = new Pages;

      $pages->title=$request->title;
      $pages->content=$request->content;
      $pages->slug=Str::slug($request->title,'-');
      $pages->order=10;

      if($request->hasFile('image')){
          $imageName = Str::slug($request->title,'-').time().'-'.rand(0,999).".".$request->image->getClientOriginalExtension();
          $request->image->move(public_path('uploads'),$imageName);
          $pages->image='uploads/'.$imageName;
      }

     $pages->save();

     return redirect()->route('admin.page.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      //return $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = Pages::findOrFail($id);
        return view('backend.pages.edit',compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

      $validateData = $request->validate([
        'title'=>'min:3|required',
        'content'=>'min:10|required',
        'image'=>'mimes:jpg,png,jpeg'
      ]);

      $pages = Pages::findOrFail($id);

      $pages->title=$request->title;
      $pages->content=$request->content;
      $pages->slug=Str::slug($request->title,'-');
      $pages->order=11;

      if($request->hasFile('image')){
          $imageName = Str::slug($request->title,'-').time().'-'.rand(0,999).".".$request->image->getClientOriginalExtension();
          $request->image->move(public_path('uploads'),$imageName);
          $pages->image='uploads/'.$imageName;
      }
        $pages->save();
           return redirect()->route('admin.page.index')->with('success','Page saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $page = Pages::findOrFail($id);
      if(File::exists($page->image)){
        File::delete(public_path($page->image));
      }
        $page->delete();
        return redirect()->back()->with('success','Delete action wos sucessfuly');
    }
}
