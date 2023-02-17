<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\post;
use App\Models\comment;
class blogcontroller extends Controller
{
    public function storeuser(Request $request)
    {
       $user=new User();
       $user->username=$request->input('username');
       $user->email=$request->input('email');
       $user->password=$request->input('password');
       if ($request->hasFile('image')){ 
        $name2 = $request->file('image')->getClientOriginalName() ;
        $path2 = $request->file('image')->store('public/images', 'public');}
        else {
            $name2 = '';
            $path2= 'public/images/default.jpg';
        }
        $user->name2 = $name2;
        $user->path2 = $path2;
       $user->save();
       return redirect()->route('login');
    }
    public function login(Request $request)
    {
      
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

       
        $user = User::where('username', $request->username)->first();
        if ($user && $user->password == $request->password) {
            
            session(['user_id' => $user->id]);
            return redirect()->route('blog');
        } else {
        
            return redirect('/login')->with('error', 'The provided credentials do not match our records.');
        }
    }
    public function storeblog(Request $request)
    {
        
       $post=new post();
       $post->title=$request->input('title');
       $post->body=$request->input('body');
       $post->user_id = $request->user_id;
       if ($request->hasFile('image')){ 
        $name = $request->file('image')->getClientOriginalName() ;
        $path = $request->file('image')->store('public/images', 'public');}
        else {
            $name = '';
            $path = 'public/images/default.jpg';
        }
        $post->name = $name;
        $post->path = $path;
       $post->save();
       
       return redirect()->route('blog');
    }

    public function blog(){

    $users=user::all();
    
    //return view('blog',compact('users'));
    }
    public function cmntstore(Request $request){
        $cmnt= new comment();
        $cmnt->cmnt=$request->input('cmnt');
        $cmnt->user_id = $request->input('user_id');
        $cmnt->post_id = $request->input('post_id');
        if ($request->hasFile('image')){ 
            $name1 = $request->file('image')->getClientOriginalName() ;
            $path1 = $request->file('image')->store('public/images', 'public');}
            else {
                $name1 = '';
                $path1 = 'public/images/default.jpg';
            }
            $cmnt->name1 = $name1;
            $cmnt->path1 = $path1;
        $cmnt->save();
        
        return redirect()->route('blog');
            }
    public function bl(){
        $users=user::all();
        $posts = Post::with('user','comments')->get();

        return view('blog', compact('posts','users'));
    }



}
