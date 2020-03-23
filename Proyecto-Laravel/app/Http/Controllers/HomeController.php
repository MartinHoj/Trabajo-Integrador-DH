<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Comment;

class HomeController extends Controller
{

    public function welcome()
    {
        if (session('log') || session('remember')) {
            return redirect('/home');
        }
        return view('welcome');
    }

    public function index()
    {
        if (session('log')) {
        $users = UsersController::friends(session('user_id'));
        $users[] = User::find(session('user_id'));
        foreach ($users as $user) {
            $users_id[]=$user->user_id;
        }
        $allPosts = Post::whereIn('user_id',$users_id)->orderBy('created_at','desc')->with('getUser')->get();
        $postsComments = [];
        foreach ($allPosts as $post) {
            if (count(Comment::where('post_id',$post->post_id)->get()) != 0) {
                $postsComments[] = Comment::where('post_id',$post->post_id)->with('getUser')->get();
            }   
        }
        return view('/home',['allPosts' => $allPosts,'postsComments' => $postsComments]);
        }
        else {
          return redirect('/');
        };
    }

    public function faqs()
    {
        return view('/faqs');
    }

    public function config()
    {
        return view('/myConfig');
    }

    public function contactUs()
    {
        return view('/contactUs');
    }

    public function storeContact()
    {
        //Este metodo debera enviar un mail a un desarrollador o administrador con el contacto del usuario y sus datos para que sea respondida su inquietud
    }

    public function search(Request $request)
    {
        $search = '%'.$request->input('search').'%';
        $users = User::where('username', 'like', $search)->orWhere('name','like',$search)->orWhere('surname','like',$search)->get();
        $posts = Post::where('title', 'like', $search)->orWhere('body','like',$search)->orderBy('created_at','desc')->with('getUser')->get();
        return view('search',['users' => $users,'posts'=>$posts]);
    }

    public function destroy($id)
    {
        //
    }
}
