<?php

namespace App\Http\Controllers;

use App\User;
use App\Tweet;
use App\Follow;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTweetPost;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        // // 現在のUserを取得
        // $now = DB::table('Users')->where('id', '5')->value('id');
        // // 現在のUserがF中のUserを取得
        // $fol = DB::table('Follows')->where('user_id', '=', $now)->pluck('follow_id');
        // // F中のUserの投稿のみ表示
        // $fol = DB::table('Tweets')->whereIn('user_id', $fol)->get();
        //
        return view('user.index',['user' => $user]);
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
    public function store(StoreTweetPost $request)
    {
      $article = new Tweet;
      $article->user_name = $request->user_name;
      $article->comment = $request->comment;
      $article->user_id = $request->user_id;
      $article->save();
      return redirect('/')->with('message', '投稿が完了しました');
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
}
