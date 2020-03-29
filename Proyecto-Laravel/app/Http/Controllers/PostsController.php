<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Comment;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('getUser')->paginate(5);
        return view('/adminListPosts',['posts' => $posts]);
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
        $request->validate([
            'title'=>'string',
            'body'=>'string'
        ]);
        $post = new Post();
        $post->title = $request['title'];
        $post->body = $request['body'];
        $post->img_name = PostsController::validateImg($request);
        //validateImage recibe $request, valida la imagen, la guarda donde corresponde y retorna unicamente su nombre
        $post->user_id = session('user_id');

        $post->save();
        return redirect('/myPosts')
            ->with('postMessage', 'Posting done');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::where('post_id',$id)->with('getUser')->get();
        $post = $post[0];
        session(['guest' => false]);
        if (session('user_id') != $post->user_id) {
            session(['guest' => true]);
        }
        $postComments = Comment::where('post_id',$id)->with('getUser')->get();
        return view('/postDetails',['post' => $post,'postComments' => $postComments]);
    }
    public function showMyPosts()
    {
        $user_id = session('user_id');
        $posts = Post::where('user_id',$user_id)->get();
        $postsComments = [];
        foreach ($posts as $post) {
            $postsComments[] = Comment::where('post_id',$post->post_id)->with('getUser')->get();   
        }
        // $postsComments trae todos los comentarios de todos los posteos del usuario
        // cada posicion del array tiene todos los comentarios de un solo post
        return view('/myPosts',['posts' => $posts,'postsComments' => $postsComments]);
    }
    // public function showFriendsPosts($id)
    // {
    //     $post = Post::find($id);
    //     return view('/postDetails',['post' => $post]);
    // }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        if (!(session('role_id') == 1 || session('user_id') == $post->user_id)) {
            return 'Usted no está autorizado a modificar este posteo';
        }
        return view('/formEditPost',['post'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'title'=>'string',
            'body'=>'string'
        ]);
        // Falta hacer la validación completa
        $post = Post::find($request['id']);
        $post->title = $request['title'];
        $post->body = $request['body'];
        if ($request['img']) {
            $post->img_name = PostsController::validateImg($request);
        };
        //validateImage recibe $request, valida la imagen, la guarda donde corresponde y retorna unicamente su nombre
        $post->user_id = session('user_id');

        $post->save();
        return redirect('/myPosts')
            ->with('mensaje', 'Posting update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user_id = session('user_id');
        $user = User::find($user_id);
        if ($user->role_id == 2) {
            return 'Tu no tiene autorización para eliminar este posteo';
        }
        $post = Post::findOrFail($id);
        $comments = Comment::where('post_id',$id)->get();
        $comments->delete();
        $post->delete();
        return redirect('/listPosts');
    }
    public function destroyMyPost($id)
    {
        $post = Post::findOrFail($id);
        $user_id = session('user_id');
        if (!($post->user_id == $user_id)) {
            return 'Usted no es el propietario de este posteo, no puede borrarlo';
            exit;
        }
        $comments = Comment::where('post_id',$id)->get();
        $comments->delete();
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
            $request->img->move(public_path('/storage/images/posts'), $imageName);
        }
        return $imageName;
    }

}
