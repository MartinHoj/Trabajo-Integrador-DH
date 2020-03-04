<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('/adminPosts',['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/formCreatePost');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Falta hacer la validación completa
        $post = new Post();
        $post->title = $request['title'];
        $post->body = $request['body'];
        $post->img_name = Post::validateImg($request); 
        //validateImage recibe $request, valida la imagen, la guarda donde corresponde y retorna unicamente su nombre
        $post->user_id = session('user_id');
        
        $post->save();
        return redirect('/myPosts')
            ->with('mensaje', 'Posting done');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('/postDetails',['post' => $post]);
    }
    public function showMyPosts()
    {
        $user_id = session('user_id');
        $post = Post::where('user_id',$user_id)->get();
        return view('/postDetails',['post' => $post]);
    }
    public function showFriendsPosts($id)
    {
        $post = Post::find($id);
        return view('/postDetails',['post' => $post]);
    }
    
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect('/adminPosts');
    }
    public function destroyMyPost($id)
    {
        $post = Post::findOrFail($id);
        $user_id = session('user_id');
        if (!($post->user_id == $user_id)) {
            return 'Usted no es el propietario de este posteo, no puede borrarlo';
            exit;
        }
        $post->delete();
        return redirect('/adminPosts');
    }
    
    public function validateImg(Request $request)
    {
        $validacion = $request->validate([
            'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $imageName = 'noDisponible.jpg';
        if( $request->file('img') ) {
            //$imageName = time().'.'.request()->prdImagen->getClientOriginalExtension();
            $imagen = $request->file('img');
            //$imagen->getClientOriginalExtension();
            $imageName = $request->img->getClientOriginalName();
            $request->prdImagen->move(public_path('images/posts'), $imageName);
        }
        return $imageName;
    }
    
}
