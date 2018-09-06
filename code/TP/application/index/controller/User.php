<?php


namesPace app\index\controller;
use think\Controller;
use RedisClient;

class User extends Controller
{
 			//添加
 	public function create()
 	{
 		return view('/user/create');
 	}
 			//插入
 	public function store()
    {
    	$data = $_POST;



    	$file = request()->file('pic');

    	if($file){
    		$path = ROOT_PATH . 'public' . DS . 'uploads';
    		$info = $file->move($path);
    		if($info){
    			
    			$data['pic'] = '/uploads/'.$info->getSaveName();

    			
    		}else{
    			echo $file -> getError();die;
    		}
    	}
    	$data['create_at'] = time();

    	$redis = RedisClient::getInstance();

		$redis = new \Redis;

		$redis->connect('localhost',6379);

		$redis->auth('123123');

		$redis->select(2);

		$user_id = $redis->incr('user_id');

		$key = 'user:'.$user_id;

		$data['id']=$user_id;

		$res = $redis -> hmset($key,$data);

		$res2 = $redis -> rpush('user_ids',$user_id);

		if($res && $res2){
			$this->success('提交成功','/user',3);
		}else{
			$this->error('提交失败');
		}
	

    }

    public function index()
    {
    	$ids = RedisClient::getInstance()->lrange('user_ids',0,50);

    	foreach($ids as $key => $value){
    		$key = 'user:'.$value;

    		$user = RedisClient::getInstance()->hmget($key, ['username','password','pic','created_at','id']);

    		$users[] = $user;
    	}

    	return view('user/index', ['users'=>$users]);
    }

    public function del($id)
    {
    	$data = 'user:'.$id;
		
    	$ids = RedisClient::getInstance()->del($data);

    	$ide = RedisClient::getInstance()->lrem('user_ids',$id);
    	
		if($ids && $ide){
			$this->success('删除成功','/user',3);
		}else{
			$this->error('删除失败');
		}

    }

      public function update($id)

    {
    	$data = $_POST;

    	$did = 'user:'.$id;
    	
		$file = request()->file('pic');

    	if($file){
    		$path = ROOT_PATH . 'public' . DS . 'uploads';
    		$info = $file->move($path);
    		if($info){
    			
    			$data['pic'] = '/uploads/'.$info->getSaveName();

    			
    		}else{
    			echo $file -> getError();die;
    		}
    	}

		$res = RedisClient::getInstance()-> hmset($did,$data);

		
			$this->success('修改成功','/user',1);

    }

         


         public function updatall($id)
    {
    	$data = 'user:'.$id;

		$res =RedisClient::getInstance()-> hmget($data, ['username','password','pic','created_at','id']);

		return view('user/updata',['res'=>$res]);


    }

    public function login()
    {
        return view('user/login');
    }

    public function dologin()
    {
        $data = request()->post();
 
        $key = sprintf('login:%s',$data['username']);
    
        $user = RedisClient::getInstance()->hmget($key, ['password','id']);
        if(!$user){
            $this->error('登录失败!', '/login', '' ,2);
        }

    
        if($data['password'] != $user['password']){
            $this->error('密码错误!', '/login', '' ,2);
        }
        
     
        session('uid', $user['id']);
        session('username', $data['username']);
        $redirectUrl = request()->post('redirectUrl') ?: '/user'; 
        $this->success('登录成功',$redirectUrl,'',2);
    }

    public function logout()
    {
         return view('user/login');
    }

    
    public function center()
    {
        return view('user/center');
    }
}