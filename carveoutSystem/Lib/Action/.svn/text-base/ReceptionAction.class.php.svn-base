<?php
class ReceptionAction extends Action{
//空就跳转404页面
function _empty(){
header("HTTP/1.0 404 Not Found");//使HTTP返回404状态码
$this->display("Index/404");
}
//跳转前台页面
public function homepage(){
$Data= M('Data');
$Recruit= M('Recruit');
$Picture   =   M('Picture');
//行业新闻数据查询
$map['column']='新闻';
import('ORG.Util.Page');
$count  = $Data->where($map)->count();
$Page       = new Page($count,6);
$show       = $Page->show();
$this->press= $press= $Data->where($map)->order('time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
$synopsisa=$press[0]['synopsis']; 
$headlinea=$press[0]['headline']; 
$ida=$press[0]['id']; 
$savenamea = $Picture->getFieldByTheir($headlinea,'savename');
$savepatha = $Picture->getFieldByTheir($headlinea,'savepath');
$this->assign('ida',$ida);
$this->assign('synopsisa',$synopsisa);
$this->assign('headlinea',$headlinea);
$this->assign('savenamea',$savenamea);
$savepathlja = substr($savepatha,1);
$this->assign('savepathlja',$savepathlja);
//创业案例数据查询
$map['column']='创业案例';
import('ORG.Util.Page');
 $count  = $Data->where($map)->count();
$Page       = new Page($count,6);
$show       = $Page->show();
$this->carveout =$carveout = $Data->where($map)->order(	'time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
$synopsisb=$carveout[0]['synopsis']; 
$headlinehb=$carveout[0]['headline']; 
$idb=$carveout[0]['id']; 
$savenameb = $Picture->getFieldByTheir($headlinehb,'savename');
$savepathb = $Picture->getFieldByTheir($headlinehb,'savepath');
$this->assign('idb',$idb);
$this->assign('synopsisb',$synopsisb);
$this->assign('headlineb',$headlinehb);
$this->assign('savenameb',$savenameb);
$savepathljb = substr($savepathb,1);
$this->assign('savepathljb',$savepathljb);
//创业课程数据查询
$map['column']='创业课程';
import('ORG.Util.Page');
 $count  = $Data->where($map)->count();
$Page       = new Page($count,5);
$show       = $Page->show();
$this->course =$Data->where($map)->order('time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
//专业建设数据查询
$map['column']='计算机专业部';
import('ORG.Util.Page');
 $count  = $Data->where($map)->count();
$Page       = new Page($count,4);
$show       = $Page->show();
$this->construction =$construction= $Data->where($map)->order('time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
$synopsisc=$construction[0]['synopsis']; 
$headlinec=$construction[0]['headline']; 
$idc=$construction[0]['id']; 
$savenamec = $Picture->getFieldByTheir($headlinec,'savename');
$savepathc = $Picture->getFieldByTheir($headlinec,'savepath');
$this->assign('idc',$idc);
$this->assign('synopsisc',$synopsisc);
$this->assign('headlinec',$headlinec);
$this->assign('savenamec',$savenamec);
$savepathljc = substr($savepathc,1);
$this->assign('savepathljc',$savepathljc);
//创业技巧数据查询
$map['column']='创业技巧';
import('ORG.Util.Page');
 $count  = $Data->where($map)->count();
$Page       = new Page($count,10);
$show       = $Page->show();
$this->sybskill = $Data->where($map)->order('time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
//就业技巧数据查询
$map['column']='就业技巧';
import('ORG.Util.Page');
 $count  = $Data->where($map)->count();
$Page       = new Page($count,10);
$show       = $Page->show();
$this->careerskill = $Data->where($map)->order('time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
//招聘信息数据查询
import('ORG.Util.Page');
$count  = $Recruit->count();
$Page       = new Page($count,11);
$show       = $Page->show();
$this->recruit =  $Recruit->order('time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
//成果图片数据查询
$Achievement= M('Achievement');
import('ORG.Util.Page');
$count  = $Achievement->count();
$Page       = new Page($count,10);
$show       = $Page->show();
$this->fruit = $Achievement->where($map)->limit($Page->firstRow.','.$Page->listRows)->select();
$this->display('Index/Reception/homepage');
}
//登录方法
public function register(){
$Users = M("Users"); 
$juesl=$this->_post('usertype');
$condition['username'] = $this->_post('username');
$condition['password'] = $this->_post('password');
$userprice = $Users->where($condition)->select();
$passa=$userprice[0]['pass']; 
if($userprice&&$passa==1){
	$usertypea=$userprice[0]['usertype']; 
	$usernamea=$userprice[0]['username']; 
	$leaguea=$userprice[0]['league']; 
	if($usertypea==$juesl){
			if($juesl==3){
	$juesli='学生';
			}else if($juesl==2){
	$juesli='企业';	
			}
			if($leaguea==1){
	$leaguei='是';
			}else{
	$leaguei='否';	
			}	
	session('numeric',1);
	session('username',$usernamea);
	session('league',$leaguei);
	session('juesl',$juesli);
	$this->redirect('homepage');
	}else{
		session('numeric',3);	
	$this->redirect('homepage');
	}
}else{
	session('numeric',2);
	$this->redirect('homepage');
	
}

}
//注销方法
public function logout(){
session('numeric',null);	
session('username',null);
session('league',null);
session('juesl',null);
$this->redirect('homepage');
}
//跳转学生注册页面
public function pupilregister(){
	$this->display('Index/reception/pupilregister'); 
	}
//跳转企业注册页面
public function firmregister(){
		$this->display('Index/reception/firmregister'); 
	}
//学生注册
public function registerpupil(){
	$Users = M("Users"); 
	$Studentfile = M("Studentfile");
	session('username',$this->_post('username'));
	session('juesl','学生');
	session('numeric',1);
	session('league','否');
	$data['username'] = $this->_post('username');
	$data['password'] = $this->_post('password');
	$data['name'] = $this->_post('name');
	$data['usertype'] =3;
	$data['league'] = 2;
	$data['pass'] = 1;
	$Users ->add($data);
	$data['username'] = $this->_post('username');
	$data['name'] = $this->_post('name');
	$data['sex'] = $this->_post('sex');
	$data['age'] = $this->_post('age');
	$data['phone'] = $this->_post('phone');
	$data['email'] = $this->_post('email');
	$Studentfile ->add($data);
	$this->redirect('studentwin');
	}
//企业注册
public function registerfirm(){
	$Users = M("Users"); 
	$Firmarchives = M("Firmarchives");
	$data['username'] = $this->_post('username');
	$data['password'] = $this->_post('password');
	$data['name'] = $this->_post('name');
	$data['usertype'] =2;
	$data['league'] = 2;
	$data['pass'] = 2;
	$Users ->add($data);
	$data['username'] = $this->_post('username');
	$data['firmname'] = $this->_post('firmname');
	$data['site'] = $this->_post('site');
	$data['phone'] = $this->_post('phone');
	$data['email'] = $this->_post('email');
	$Firmarchives ->add($data);
	$this->redirect('studfirm');
	}
//跳转注册成功页面
public function studentwin(){
$this->assign('usernamei',session('username'));
	$this->display('Index/reception/studentwin'); 
}
//跳转注册成功页面
public function studfirm(){
	$this->display('Index/reception/studfirm'); 
}
/*注册用户名验证*/
public function ajuseryz()
{
	header("Content-type: text/html; charset=utf-8"); 
	$Users = M("Users"); 
	$usernameai = $this->_post('username');
	if($usernameai!=""){
	$passa = $Users->getFieldByUsername($usernameai,'pass');
    if($passa){
    	 $this->ajaxReturn(2,0);
    }else{
		 $this->ajaxReturn(1,0);
    }
}else{
	 $this->ajaxReturn(1,0);
}
}

}
?>