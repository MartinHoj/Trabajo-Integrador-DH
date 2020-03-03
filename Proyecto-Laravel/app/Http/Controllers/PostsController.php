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
        //
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
        return redirect('/adminPosts')
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
        //
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
