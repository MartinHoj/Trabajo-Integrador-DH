<?php

namespace App\Http\Controllers;

use App\Friend;
use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Post;
use App\Comment;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!(session('log') && session('role_id')==1)) {
           return redirect('/');
        }
        $users = User::with('getRole')->paginate(5);
       return view('adminListUsers',
           [
               'users'=>$users
           ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/formRegister');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validacion en HomeController a editar
        $request->validate([
            'name' => 'string|required|max:255',
            'surname' => 'string|required|max:255',
            'email' => 'bail|unique:users|string|email|required|max:255',
            'username' => 'unique:users|string|required|max:255',
            'password' => 'required|string|max:255|min:6',
            'phone' => 'integer',
            'hobbie' => 'string|max:255',
            'country' => 'string|max:255'

        ]);

        $user = new User();
        $user->name = $request['name'];
        $user->surname = $request['surname'];
        $user->email = $request['email'];
        $user->username = $request['username'];
        $user->password = password_hash($request['password'],PASSWORD_DEFAULT);
        $user->phone = $request['phone'];
        $user->hobbie = $request['hobbie'];
        $user->country = $request['country'];
        // A traves de un Midleware este campo sera habilitado o no en el formulario. Sera por defecto el rol de cliente
        $user->role_id = 2;
        $user->avatar_name = UsersController::validateAvatar($request);
        $user->reset_password = '';

        $user->save();
        session(['log'=>true]);
        session(['user_id' => $user->user_id]);
        return redirect('/home')
        ->with('mensaje','Bienvenido');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!session('log')) {
            redirect('/');
        }
        session(['guest' => false]);
        if (session('user_id') != $id) {
            session(['guest' => true]);
        }
        $user = User::findOrFail($id);
        $role = Role::find($user->role_id);
        $friends = UsersController::friends($id);
        // Hacer aca la validacion de si son amigos o no y pasar con una variable de "relacion"
        // No son amigos ni nada
        $relation = 0;
        foreach ($friends as $friend) {
            if ($friend->user_id == session('user_id') && $friend->status) {
                // Ya son amigos
                $relation = 1;
            } elseif ($friend->user_id == session('user_id') && $friend->status==false && $friend->yoInvite) {
                // Yo invite a esa persona y estoy esperando su respuesta
                $relation = 2;
            } elseif ($friend->user_id == session('user_id') && $friend->status==false && $friend->yoInvite == false) {
                // Esa persona te invitó
                $relation = 3;
            }
        }
        return view('/userDetails',['user'=>$user,'role' => $role,'friends' => $friends,'relation' => $relation,'id' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editAdmin($id)
    {
      //Solo para administradores
      if (!session('log')) {
        redirect('/');
    }
        if (session('role_id') == 2) {
          return 'Usted no está habilitado para modificar este usuario';
        };
        $user = User::findOrFail($id);
        return view('/formEdit',['user'=>$user]);
    }
    public function editUserData()
    {
      //Va a mostrar el formulario para modificar los datos propios del usuario
      if (!session('log')) {
        redirect('/');
    }
      $user_id = session('user_id');
      $user = User::find($user_id);
      return view('/formEditData',['user' => $user]);
    }
    public function editUserPassword()
    {
      //Va a mostrar el formulario para modificar la contraseña propia del usuario
      if (!session('log')) {
        redirect('/');
    }
      $user_id = session('user_id');
      $user = User::find($user_id);
      return view('/formEditPassword',['user' => $user]);
    }
    public function editResetPassword()
    {
      //Va a mostrar el formulario para modificar la contraseña propia del usuario
      if (!session('log')) {
        redirect('/');
    }
      $user_id = session('user_id');
      $user = User::find($user_id);
      return view('/formEditResetPassword',['user' => $user]);
    }
    public function editUserAvatar()
    {
      //Va a mostrar el formulario para modificar el avatar propio del usuario
      if (!session('log')) {
        redirect('/');
    }
      $user_id = session('user_id');
      $user = User::find($user_id);
      return view('/formEditAvatar',['user' => $user]);
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

        $user = User::find($request->input('user_id'));
        if ($user->email == $request['email']) {
            $emailCondition = 'bail|string|email|required|max:255';
        } else {
            $emailCondition = 'bail|unique:users|string|email|required|max:255';
        }
        if ($user->username == $request['username']) {
          $usernameCondition = 'string|required|max:255';
        } else {
          $usernameCondition = 'unique:users|string|required|max:255';
        }
        if ($request['password']) {
            $passwordCondition = 'string|min:6|required_with:confirmPassword|same:confirmPassword';
            $confirmCondition = 'string';
        } else {
            $passwordCondition = '';
            $confirmCondition = '';
        }
        $request->validate([
            'name' => 'string|required|max:255',
            'surname' => 'string|required|max:255',
            'email' => $emailCondition,
            'username' => $usernameCondition,
            'password' => 'required|string|max:255|min:6',
            'phone' => 'integer',
            'hobbie' => 'string|max:255',
            'country' => 'string|max:255',
            'password' => $passwordCondition,
            'confirmPassword' => $confirmCondition,
            'role_id' => 'integer'
        ]);
        $user->name = $request['name'];
        $user->surname = $request['surname'];
        $user->email = $request['email'];
        $user->username = $request['username'];
        if ($request['password']) {
            $user->password = password_hash($request['password'],PASSWORD_DEFAULT);
        }
        $user->phone = $request['phone'];
        $user->hobbie = $request['hobbie'];
        $user->country = $request['country'];
        // A traves de un Midleware este campo sera habilitado o no en el formulario. Sera por defecto el rol de cliente
        $user->role_id = $request['role_id'];
        if ($request['avatar']) {
            $user->avatar_name = UsersController::validateAvatar($request);    
        }
        $user->save();
        return redirect('/listUsers')
            ->with('menssage', 'User '.$user->username.' modificado con éxito');
    }
    public function updateData(Request $request)
    {
      $user_id = session('user_id');
      $user = User::find($user_id);
      if ($user->email == $request['email']) {
          $emailCondition = 'bail|string|email|required|max:255';
      } else {
          $emailCondition = 'bail|unique:users|string|email|required|max:255';
      }
      if ($user->username == $request['username']) {
        $usernameCondition = 'string|required|max:255';
    } else {
        $usernameCondition = 'unique:users|string|required|max:255';
    }
    
      $request->validate([
        'name' => 'string|required|max:255',
        'surname' => 'string|required|max:255',
        'email' => $emailCondition,
        'username' => $usernameCondition,
        'phone' => 'integer',
        'hobbie' => 'string|max:255',
        'country' => 'string|max:255'

    ]);
    $user->name = $request['name'];
    $user->surname = $request['surname'];
    $user->email = $request['email'];
    $user->username = $request['username'];
    $user->phone = $request['phone'];
    $user->hobbie = $request['hobbie'];
    $user->country = $request['country'];
    $user->save();
    return redirect('/home');
    }
    public function updatePassword(Request $request)
    {
      $user_id = session('user_id');
      $user = User::find($user_id);
      $request->validate([
          'password' => 'string',
          'newPassword' => 'string|min:6|required_with:confirmPassword|same:confirmPassword',
          'confirmPassword' => 'string'
      ]);
      if (password_verify($request['password'],$user->password)) {
          if ($request['newPassword'] == $request['confirmPassword']) {
              $user->password = password_hash($request['newPassword'],PASSWORD_DEFAULT);
              $user->save();
              return redirect('/home');
          }
      } else {
          $errors = 'Wrong password';
      }
      return view('/formEditPassword',['user' => $user]);
    }
    public function updateResetPassword(Request $request)
    {
      $user_id = session('user_id');
      $user = User::find($user_id);
      $request->validate([
          'newPassword' => 'string|min:6|required_with:confirmPassword|same:confirmPassword',
          'confirmPassword' => 'string'
      ]);
      if ($request['newPassword'] == $request['confirmPassword']) {
            $user->password = password_hash($request['newPassword'],PASSWORD_DEFAULT);
            $user->reset_password = '';
            $user->save();
            return redirect('/home');
      } else {
          $errors = 'Wrong password';
      }
      return view('/formEditResetPassword',['user' => $user]);
    }
    public function updateAvatar(Request $request)
    {
      //Va a mostrar el formulario para modificar el avatar propio del usuario
      $user_id = session('user_id');
      $user = User::findOrFail($user_id);
      $user->avatar_name = UsersController::validateAvatar($request);
      $user->save();
      return redirect("/home");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $posts = Post::where('user_id',$id)->get();
        foreach ($posts as $post) {
            $posts_id[] = $post->post_id;
        }
        $comments = Comment::where('user_id',$id)->orWhereIn('post_id',$posts_id)->get();
        $comments->delete();
        $posts->delete();
        $user->delete();
        return redirect('/listUsers');
    }
    public function destroyUser()
    {
        if (!session('log')) {
            redirect('/');
        }
        $user_id = session('user_id');
        $user = User::find($user_id);
        $posts = Post::where('user_id',$user_id)->get();
        foreach ($posts as $post) {
            $posts_id[] = $post->post_id;
        }
        $comments = Comment::where('user_id',$user_id)->orWhereIn('post_id',$posts_id)->get();
        $posts->delete();
        $comments->delete();
        $user->delete();
        return redirect('/logout');
    }
    public function validateAvatar(Request $request)
    {
        $validacion = $request->validate([
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $imageName = 'noDisponible.jpg';
        if( $request->file('avatar') ) {
            //$imageName = time().'.'.request()->prdImagen->getClientOriginalExtension();
            $imagen = $request->file('avatar');
            //$imagen->getClientOriginalExtension();
            $imageName = $request->avatar->getClientOriginalName();
            $request->avatar->move(public_path('images/avatars'), $imageName);
        }
        return $imageName;
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'email',
            'password' => 'string|max:255'
        ]);

        $users = User::all();
        foreach ($users as $user) {
            if ($user->email == $request['email']) {
                session(['exist' => true]);
                if (password_verify($request['password'],$user->password)) {
                    session(['remember' => false]);
                    if ($request['remember']) {
                        session(['remember' => true]);
                    }
                    session(['log'=>true]);
                    session(['user_id'=>$user->user_id]);
                    session(['role_id'=>$user->role_id]);
                    $user->reset_password = '';
                    $user->save();
                    return redirect('/home');
                } elseif (!($user->reset_password == false)) {
                    if ($request['password'] == $user->reset_password) {
                        session(['remember' => false]);
                        if ($request['remember']) {
                            session(['remember' => true]);
                        }
                        session(['log'=>true]);
                        session(['user_id'=>$user->user_id]);
                        session(['role_id'=>$user->role_id]);
                        return redirect('/changeResetPassword');
                    }
                }
            }
        }
        if (session('exist')) {
            $message = 'The email or the password are wrong';
            session()->forget('exist');
        } else {
        $message = 'No estás registrado aún, deberás registrarte para loguearte';
        }
        return view('/welcome',['message' => $message]);

    }
    public function logout()
    {
        session()->forget('user_id');
        session()->forget('log');
        session()->forget('exist');
        session()->forget('role_id');
        session()->forget('remember');
        session()->forget('notifications');
        return view('/welcome');
    }
    public static function friends($user_id){
        $friends = Friend::where('user_id_actual',$user_id)->orWhere('user_id_friend',$user_id)->get();
        $users = [];
        $status = [];
        $yoInvite = [];
        foreach ($friends as $friend) {
            if ($friend->user_id_actual == $user_id) {
                $users[] = User::find($friend->user_id_friend);
                $status[] = $friend->status;
                $yoInvite[] = false;
            } else {
                $users[]=User::find($friend->user_id_actual);
                $status[] = $friend->status;
                $yoInvite[] = true;
            }
        }
        for ($i=0; $i < count($users); $i++) { 
            $users[$i]['status'] = $status[$i];
            $users[$i]['yoInvite'] = $yoInvite[$i];
        }
        return $users;
    }
}
