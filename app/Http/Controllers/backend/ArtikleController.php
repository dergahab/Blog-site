<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\Articles;
use App\Models\Category;


class ArtikleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Articles::orderBy('created_at','DESC')->get();
        return view('backend.artikles.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('backend.artikles.create',compact('categories'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'min:3',
            'image'=>'required|image|mimes:jpg,png,jpeg|max:600'
        ]);

        $artikle = new Articles;

        $artikle->title=$request->title;
        $artikle->content=$request->content;
        $artikle->categori_id=$request->category;
        $artikle->slug=Str::slug($request->title,'-');

        if($request->hasFile('image')){
            $imageName = Str::slug($request->title,'-').time().'-'.rand(0,999).".".$request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'),$imageName);
            $artikle->image='uploads/'.$imageName;
        }

       $artikle->save();

       return redirect()->route('admin.artikle.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Articles::findorFail($id);

        $categories = Category::all();
        return view('backend.artikles.update',compact('categories','article'));
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
        $request->validate([
            'title'=>'min:3',
            'image'=>'image|mimes:jpg,png,jpeg|max:600'
        ]);

        $artikle =Articles::findOrFail($id);

        $artikle->title=$request->title;
        $artikle->content=$request->content;
        $artikle->categori_id=$request->category;
        $artikle->slug=Str::slug($request->title,'-');

        if($request->hasFile('image')){
            $imageName = Str::slug($request->title,'-').time().'-'.rand(0,999).".".$request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'),$imageName);
            $artikle->image='uploads/'.$imageName;
        }

       $artikle->save();

       return redirect()->route('admin.artikle.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */



    public function trashed(){
        $articles = Articles::onlyTrashed()->orderBy('deleted_at',"ASC")->get();
        return view('backend.artikles.trashed',compact('articles'));

    }

    public function recover($id){
            Articles::onlyTrashed()->find($id)->restore();
             return redirect()->route('admin.artikle.index');
    }

     public function hardDelete($id){
        $article=Articles::onlyTrashed()->find($id);
       if(File::exists($article->image)){
        File::delete(public_path($article->image));
       }
       $article->forceDelete();
       return redirect()->route('admin.artikle.index');
    }

  

}
