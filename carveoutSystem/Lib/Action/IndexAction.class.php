<?php
class IndexAction extends Action{
public function index(){
    $this->display();
}
//--登陆验证
public function loginVerify(){
    $Users = M("Users");
    $condition= $Users->create();
	$userse=$Users->where($condition)->select();
	$qx=$userse[0]['usertype'];
       if($userse!=0|"")
       {
       	if($qx==1){
       			$usertypea=$userse[0]['username']; 
		session('administrator',$usertypea);	
       $this->display('Index/home');
       	}else{
       $this->assign('msg','用户权限错误');
	   $this->display('Index/index');
       	}
       }else
       {
       $this->assign('msg','用户名或密码错误');
	   $this->display('Index/index');
       }
}
//管理员注销
public function logout(){
	session('administrator',null);
	$this->display('Index/index');	
}

}
?>