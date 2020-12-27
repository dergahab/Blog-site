<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Validator;
use Mail;

//Models
use App\Models\Category;
use App\Models\Articles;
use App\Models\Menu;
use App\Models\Pages;
use App\Models\Contact;


class HomepageController extends Controller
{
  public function __construct(){
    view()->share('menus',Pages::orderBy('order','ASC')->get());
    view()->share('categories',Category::inRandomOrder()->get());
  }

   public function index(){
   	$data['articles'] = Articles::orderBy('created_at','DESC')->paginate(5);


   	 return view('frontend.homepage',$data);
   }

   public function single($slug){
     $page= Articles::whereSlug($slug)->first() ?? abort(403,'Belebir sehife tapilmadi');
     $page->increment('hit');


     return view('frontend.single',['page'=>$page]);
   }


   public function about($slug){

   	$article = Articles::whereSlug($slug)->first() ?? abort(403,'Bele bir yazi movcud deyil');

   	return view('frontend.post',['article'=>$article]);
   }

   public function category($slug){
      $category = Category::whereSlug($slug)->first() ?? abort(403,'Bele bir yazi movcud deyil');

      $articles =Articles::where('categori_id',$category->id)->paginate(5);
      return view('frontend.categori',['category'=>$category,'articles'=>$articles]);
   }

   public function page($slug){
      $page = Pages::whereSlug($slug)->first() ?? abort(403,'Bele bir sehife tapilmadi');
      $data['page']=$page;
      return view('frontend.page',$data);

   }

   public function contact(){
    return view('frontend.contact');
   }


   public function contactpost(Request $request){
    $rouls = [
      'name'=>'required|min:5',
      'email'=>'required|email',
      'topic'=>'required'
      //'message'=>'required|min:10'
    ];

     $validate = Validator::make($request->post(),$rouls);

     if($validate->fails()){
      return redirect()->route('contact')->withErrors($validate)->withInput();
     }

     Mail::send([],[],function($message) use($request){
       $message->from('dergah.ab@gmail.com','Dergah');
       $message->to('dergah.ab@gmail.com');
       $message->setBody('Gonderen: '.$request->name.'</br>
                          Email: '.$request->email.'</br>
                          Mesaj: '.$request->message.'</br>
                          Tarix: '.now().'','text/html');
        $message->subject($request->topic);

     });

     // $contact = new Contact();
     // $contact->name=$request->name;
     // $contact->email=$request->email;
     // $contact->topic=$request->topic;
     // $contact->message=$request->message;
     //  $contact->save();

      return redirect()->route('contact')->with('success','Mesajiniz gonderildi');

   }
}
