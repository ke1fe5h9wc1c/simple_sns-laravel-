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

   public function __construct()
   {
     // ログイン強制
     $this->middleware('auth');
   }

    public function index()
    {
      // 現在のUserを取得
      $user = Auth::user();
      // 現在のUserがFoloowしているUserを取得
      $follow = Follow::where('user_id', $user->id)->pluck('follow_id');
      $tweets = Tweet::whereIn('user_id',$follow)->orWhere('user_id',$user->id)->get()->reverse();
      // 現在のUser + Follow中のUserの投稿のみ表示
      return view('users.index',['user' => $user,'tweets' => $tweets]);
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
      // Show_pageで表示するUser
      $show_user = User::find($id);
      // Show_pageで表示するUserのTweet
      $tweet = Tweet::where('user_id', $id)->get()->reverse();
      // Show_pageで表示するUserがFollowしているUser
      $follow = Follow::where('user_id', $id)->pluck('follow_id')->all();
      $folloew = User::whereIn('id',$follow)->get();
      // Show_pageで表示するUserを現在のUserがFollowしているか
      $collection = Follow::where('user_id', Auth::id())->get();
      $follow_check = $collection->where('follow_id', $id)->first();

      return view('users.show', ['show_user' => $show_user,'tweet' => $tweet,'folloew' => $folloew,'follow_check' => $follow_check,
    'collection' => $collection]);
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

    public function follow(Request $request)
    {
      $article = new Follow;
      $article->user_id = $request->user_id;
      $article->follow_id = $request->follow_id;
      $article->save();
      return back()->with('message', 'Followしました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     
    public function destroy($id)
    {
      // follow解除処理
      $un_follow = Follow::find($id);
      $tweet->delete();
      return back()->with('message', 'Followを解除しました');
    }

    public function logout()
    {
      Auth::logout();
      return redirect('/');
    }
}
