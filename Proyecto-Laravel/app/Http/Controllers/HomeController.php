<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Comment;

class HomeController extends Controller
{


    public function index()
    {
        if (session('log')) {
        $users = UsersController::friends(session('user_id'));
        $users[] = User::find(session('user_id'));
        $allPosts = [];
        foreach ($users as $user) {
            if (count(Post::where('user_id',$user->user_id)->get()) != 0) {
                $allPosts[] = Post::where('user_id',$user->user_id)->with('getUser')->get();   
            }
        }
        $postsComments = [];
        foreach ($allPosts as $userPosts) {
            foreach ($userPosts as $post) {
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

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
