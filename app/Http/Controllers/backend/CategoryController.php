<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Articles;
use Session;

class CategoryController extends Controller
{
    public function index(){
    	$categories = Category::all();
    	return view('backend.category.index',compact("categories"));
   }


   public function create(Request $request){

   		$category = new Category;
   		$category->name=$request->category;
   		$category->slug=Str::slug($request->category);
   		$category->save();
   		return redirect()->back();
   }

   public function delete(Request $request){
     $category =   Category::findOrFail($request->id);

        if($category->id==1){
          return redirect()->back();
        }
        $count = $category->articlecount();
        if($count>0){
          Articles::where('categori_id',$category->id)->update(['categori_id'=>1]);
        }
        $category->delete();
        return redirect()->back();
        // return redirect()->route('admin.category.index');
   }

   public function switch (Request $request) {
      $category = Category::findOrFail($request->id);
      $category->status= $requst->status == "truw" ? 1 :0 ;
      $category->save();
   }

    public function getData (Request $request) {
      $category = Category::findOrFail($request->id);
      return response()->json($category);
   }

   public function update(Request $request){
    $isSlug =Category::whereSlug(Str::slug($request->category))->whereNotIn('id',[$request->id])->first();
    $isName=Category::whereName($request->category)->whereNotIn('id',[$request->id])->first();

    if($isName or $isSlug){
      return redirect()->back();
    }
      $category = Category::find($request->id);
      $category->name=$request->category;
      $category->slug=Str::slug($request->$category);
      $category->save();
      return redirect()->back();
   }
}
