<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $users = User::with('getRole')->get();
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
        return view('formRegister');
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

        $user->save();
        session(['log'=>true]);
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
        $user = User::findOrFail($id);
        $role = Role::find($user->role_id);
        return view('/userDetails',['user'=>$user,'role' => $role]);
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
      $user_id = session('user_id');
        if (User::find($user_id)->role_id == 2) {
          return 'Usted no está habilitado para modificar este usuario';
        };
        $user = User::findOrFail($id);
        return view('/formEdit',['user'=>$user]);
    }
    public function editUserData()
    {
      //Va a mostrar el formulario para modificar los datos propios del usuario
      $user_id = session('user_id');
      $user = User::find($user_id);
      return view('/formEditData',['user' => $user]);
    }
    public function editUserPassword()
    {
      //Va a mostrar el formulario para modificar la contraseña propia del usuario
      $user_id = session('user_id');
      $user = User::find($user_id);
      return view('/formEditPassword',['user' => $user]);
    }
    public function editUserAvatar()
    {
      //Va a mostrar el formulario para modificar el avatar propio del usuario
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
        $user->name = $request['name'];
        $user->surname = $request['surname'];
        $user->email = $request['email'];
        $user->username = $request['username'];
        $user->password = password_hash($request['password'],PASSWORD_DEFAULT);
        $user->phone = $request['phone'];
        $user->hobbie = $request['hobbie'];
        $user->country = $request['country'];
        // A traves de un Midleware este campo sera habilitado o no en el formulario. Sera por defecto el rol de cliente
        $user->role_id = $request['role_id'];
        $user->avatar_name = UsersController::validateAvatar($request);
        $user->save();
        return redirect('/adminListUsers')
            ->with('mensaje', 'User '.$user->name.' modificado con éxito');
    }
    public function updatetData(Request $request)
    {
      $user_id = session('user_id');
      $user = User::find($user_id);
      $request->validate([
        'name' => 'string|required|max:255',
        'surname' => 'string|required|max:255',
        'email' => 'bail|unique:users|string|email|required|max:255',
        'username' => 'unique:users|string|required|max:255',
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
      if (password_verify($request['lastPassword'],$user->password)) {
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
    public function updateAvatar(Request $request)
    {
      //Va a mostrar el formulario para modificar el avatar propio del usuario
      $user_id = session('user_id');
      $user = User::find($user_id);
      $user->avatar_name = UsersController::validateAvatar($request);
      return view('/formEditAvatar',['user' => $user]);
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
        $user->delete();
        return redirect('/adminListUsers');
    }
    public function destroyUser()
    {
        $user_id = session('user_id');
        $user = User::find($user_id);
        $user->delete();
        return redirect('/');
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
                if (password_verify($request['password'],$user->password)) {
                    session(['log'=>true]);
                    session(['user_id'=>$user->user_id]);
                    return redirect('/home');
                }
            }
        }
        $mensaje = 'No estás registrado aún, deberás registrarte para loguearte';
        return view('/welcome',['mensaje' => $mensaje]);

    }

}
