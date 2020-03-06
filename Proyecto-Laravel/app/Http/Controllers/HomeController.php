<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;

class HomeController extends Controller
{


    public function index()
    {
        if (session('log')) {
          $user = User::find(session('user_id'));
          $posts = Post::where('user_id',$user->user_id)->get();
          return view('/home',['user' => $user,'posts' => $posts]);
        }
        else {
          return redirect('/');
        };
    }

    public function faqs()
    {
        return view('/faqs');
    }

    public function store()
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
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
