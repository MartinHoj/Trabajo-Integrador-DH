<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\UsersController;
use App\Post;
use App\Comment;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Mail\Mailer;

class HomeController extends Controller
{

    public function welcome()
    {
        if (session('log') || session('remember')) {
            return redirect('/home');
        }
        return view('welcome');
    }

    public function resetPasswordForm()
    {
        if (session('log')) {
            return redirect('/home');
        }
        return view('resetPasswordForm');
    }

    public function resetPassword(Request $request)
    {
        //Manda un mail y anota algo en la tabla de dicho usuario para cambiar la contra
        {
            //Este metodo debera enviar un mail a un desarrollador o administrador con el contacto del usuario y sus datos para que sea respondida su inquietud
            $request->validate([
                'email' => 'string|email|required'
            ]);
            $user = User::where('email',$request['email'])->get();
            if(!(isset($user[0]))){
                $errors = 'We don´t have any account registered with that email, if you want, create one';
                return view('resetPasswordForm',['error' => $errors]);
            }
            $request['reset_password'] = HomeController::rand_string(12);
            $user = $user[0];
            $user->reset_password = $request['reset_password'];
            $user->save();
            $data = [
                'request' => $request
            ];
            $mail = $request['email'];
            session(['email'=>$mail]);
            Mail::send('emails.resetPassword',$data,function($message){
        
                $message->from('admin@gmail.com','Reset Password Email');
                $message->to(session('email'))->subject('Reset Password');    
            });
            session()->forget('email');
            return redirect('/home');
        }
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
        $notifications = HomeController::notifications();
        session(['notifications' => $notifications]);
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

    public function storeContact(Request $request)
    {
        //Este metodo debera enviar un mail a un desarrollador o administrador con el contacto del usuario y sus datos para que sea respondida su inquietud
        $data = [
            'request' => $request
        ];
        Mail::send('emails.contactUsMail',$data,function($message){
    
            $message->from('userspan2@gmail.com','Contact Us Email');
            $message->to('admin@gmail.com')->subject('Contact Us Mail');    
        });
        return redirect('/home');
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
    public function rand_string( $length ) {

        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        return substr(str_shuffle($chars),0,$length);
    
    }
    public static function notifications(){
        $userFriends = UsersController::friends(session('user_id'));
        $notifications = [];
        foreach ($userFriends as $userFriend) {
            if ($userFriend->status == false && $userFriend->yoInvite == true) {
                $notifications[] = $userFriend;
            }
        }
        return $notifications;
    }
}
