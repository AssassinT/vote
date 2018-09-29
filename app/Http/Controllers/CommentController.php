<?php

namespace App\Http\Controllers;

use App\User;
use App\Vote;
use EasyWeChat\Factory;
use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $config = [
        'app_id' => 'wx8ed34585c55c40e3',
        'secret' => '4fe71cddb3bd8ce8dc892de307f726ae',
        'token' => 'easywechat',
        'response_type' => 'array',
        'mch_id' => '1364808702',
        'key' => 'lamplamplamplamplamplamplamplamp',

        'log' => [
            'level' => 'debug',
            'file' => __DIR__.'/wechat.log',
        ],
    ];
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
    public function store(Request $request)
    {
        
        if(request()->wechat=='true'){
            //微信获取授权
            if(!request()->code){
                $app = Factory::officialAccount($this->config);
                $response = $app->oauth->scopes(['snsapi_userinfo'])->redirect("http://ws.xiaohigh.com/comment/".request()->vote_id.'?c='.request()->comment_content);
                return $response;
            }
            dd(request()->all());
        }
        
        $comment = new Comment;
        $comment -> user_id = $request->session()->get('id');
        $comment -> vote_id = $request->vote_id;
        $comment -> comment_content = $request->comment_content;
        // dd($comment);
        if($comment -> save()){
            return redirect('/vote/'.$request->vote_id)->with('true','添加成功');
        }else{
            return back()->with('false','添加失败');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $app = Factory::officialAccount($this->config);

        $user = $app->oauth->user();

        $openid = $user->id;

        $username = $user->name;

        $avatar = $user->avatar;
        if(empty(User::where('openid',$openid)->first())){


        $users = new User;
            $users->user_name = $username;
            $users->openid = $openid;
            $users->head_pic = $avatar;
            $users->has_admin = '3';
            $users->has_vip = '0';
            $users->save();
        }
        $me = User::where([['has_admin','3'],['openid',$openid]])->first();

        $comment = new Comment;
        $comment -> user_id = $me['id'];
        $comment -> vote_id = $id;
        $comment -> comment_content = request()->c;
        // dd($comment);
        if($comment -> save()){
            return redirect('/vote/'.$id)->with('true','添加成功');
        }else{
            return redirect('/vote/'.$id)->with('true','添加失败');
        }

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
