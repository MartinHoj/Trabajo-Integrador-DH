<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Friend;

class FriendsController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
        $friendRelation = new Friend();
        $friendRelation->user_id_actual = session('user_id');
        $friendRelation->user_id_friend = $id;
        $friendRelation->status = false;
        $friendRelation->save();
        return redirect("/userDetails/$id");
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
    public function update($id)
    {
        $friendRelation = Friend::where('user_id_friend',session('user_id'))->where('user_id_actual',$id)->get();
        $friendRelation = $friendRelation[0];
        $friendRelation->status = true;
        $friendRelation->save();
        return redirect("/userDetails/$id");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $friendRelation = Friend::where('user_id_actual',session('user_id'))->where('user_id_friend',$id)->get();
        $friendRelation = $friendRelation[0];
        $friendRelation->delete();
        return redirect("/userDetails/$id");
    }
    public function destroyFriendsRequest($id)
    {
        $friendRelation = Friend::where('user_id_actual',session('user_id'))->where('user_id_friend',$id)->get();
        $friendRelation = $friendRelation[0];
        $friendRelation->delete();
        return redirect("/userDetails/$id");
    }
    public function dontAccept($id)
    {
        $friendRelation = Friend::where('user_id_friend',session('user_id'))->where('user_id_actual',$id)->get();
        $friendRelation = $friendRelation[0];
        $friendRelation->delete();
        return redirect("/userDetails/$id");
    }
}
