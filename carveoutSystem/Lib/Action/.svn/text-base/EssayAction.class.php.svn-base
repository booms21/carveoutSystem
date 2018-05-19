<?php
class EssayAction extends Action{
//空就跳转404页面
function _empty(){
header("HTTP/1.0 404 Not Found");//使HTTP返回404状态码
$this->display("Index/404");
}
//计算机专业部
public function computerasr_essay(){
$Data= M('Data');
$Recruit= M('Recruit');
import('ORG.Util.Page');
$map['column']='新闻';
$counta  = $Data->where($map)->count();
$Pagea       = new Page($counta,11);
$this->dataxw = $Data->where($map)->limit($Pagea->firstRow.','.$Pagea->listRows)->select();
$countb  = $Recruit->count();
$Pageb       = new Page($countb,11);
$this->datazp = $Recruit->where($map)->limit($Pageb->firstRow.','.$Pageb->listRows)->select();
if(session('valuea')==1){
	$map['column']='新闻';
	$this->assign('price','新闻');
}else if(session('valuea')==2){
	$map['column']='计算机专业部';
	$this->assign('price','计算机专业部');
}else if(session('valuea')==3){
	$map['column']='汽车工程专业部';
	$this->assign('price','汽车工程专业部');
}else if(session('valuea')==4){
	$map['column']='校企合作';
	$this->assign('price','校企合作');
}else if(session('valuea')==5){
	$map['column']='创业园介绍';
	$this->assign('price','创业园介绍');
}else if(session('valuea')==6){
	$map['column']='成果展示';
	$this->assign('price','成果展示');
}else if(session('valuea')==7){
	$map['column']='创业课程';
	$this->assign('price','创业课程');
}else if(session('valuea')==8){
	$map['column']='创业技巧';
	$this->assign('price','创业技巧');
}else if(session('valuea')==9){
	$map['column']='创业问题';
	$this->assign('price','创业问题');
}else if(session('valuea')==10){
	$map['column']='就业技巧';
	$this->assign('price','就业技巧');
}else if(session('valuea')==11){
	$map['column']='就业问题';
	$this->assign('price','就业问题 ');
}else if(session('valuea')==12){
	$map['column']='毕业生风采';
	$this->assign('price','毕业生风采');
}else if(session('valuea')==13){
	$map['column']='创业案例';
	$this->assign('price','创业案例');
}else if(session('valuea')==14){
	$map['column']='国家政策';
	$this->assign('price','国家政策');
}else if(session('valuea')==15){
	$map['column']='学校措施';
	$this->assign('price','学校措施');
}else if(session('valuea')==16){
	$map['column']='创业流程';
	$this->assign('price','创业流程');
}
session('valuea',null);
$count  = $Data->where($map)->count();
$Page       = new Page($count,7);
$show       = $Page->show();
$this->data = $Data->where($map)->limit($Page->firstRow.','.$Page->listRows)->select();
$this->assign('page',$show);
$this->display('Index/subpage/index_essay'); 
}
//新闻
public function news_essay(){
session('valuea',1);	 
$this->redirect('computerasr_essay');
}
//计算机专业部
public function computer_essay(){
session('valuea',2);
$this->redirect('computerasr_essay');
}
//汽车工程专业部
public function car_essay(){
session('valuea',3);
$this->redirect('computerasr_essay');
}
//校企合作
public function cooperation_essay(){
session('valuea',4);
$this->redirect('computerasr_essay');
}
//创业园介绍
public function innovationpark_essay(){
session('valuea',5);	 
$this->redirect('computerasr_essay');
}
//成果展示
public function achievement_essay(){
session('valuea',6);	 
$this->redirect('computerasr_essay');
}
//创业课程
public function course_essay(){
session('valuea',7);	 
$this->redirect('computerasr_essay');
}
//创业技巧
public function technique_essay(){
session('valuea',8);	 
$this->redirect('computerasr_essay');
}
//创业问题
public function problem_essay(){
session('valuea',9); 
$this->redirect('computerasr_essay');
}
//就业技巧
public function techniquea_essay(){
session('valuea',10);	 
$this->redirect('computerasr_essay');
}
//就业问题
public function question_essay(){
session('valuea',11); 
$this->redirect('computerasr_essay');
}
//毕业生风采
public function graduate_essay(){
session('valuea',12);	 
$this->redirect('computerasr_essay');
}
//创业案例
public function carveout_essay(){
session('valuea',13);	 
$this->redirect('computerasr_essay');
}
//国家政策
public function country_essay(){
session('valuea',14);	 
$this->redirect('computerasr_essay');
}
//学校措施
public function school_essay(){
session('valuea',15);	 
$this->redirect('computerasr_essay');
}
//创业流程
public function process_essay(){
session('valuea',16);	 
$this->redirect('computerasr_essay');
}
//进入创业园加盟页面
public function league_essay(){
		$this->assign('price','创业园加盟');
	$this->display('Index/subpage/league_essay');
}
//创业园加盟
public function league_essayasp(){
	$Users  = M('Users');
	$League= M('League');
	$usernamea = $this->_post('username');
	$data['usernameid'] = $Users->getFieldByUsername($usernamea,'id');
	$data['headline'] =$this->_post('headline');
	$data['content'] =$this->_post('content');
	$data['role'] =$this->_post('role');
	$data['username'] =$this->_post('username');
	$data['time'] =date('Y-m-d');
	$data['league'] = 2;
	$League->add($data);
	$this->assign('price','创业园加盟');
	$this->redirect('applyfor');
}
//跳转加盟申请成功页面
public function applyfor(){
	$this->display('Index/subpage/applyfor');
}
//办事流程
public function flow_essay($genrea=0){
$Data= M('Data');
$Work= M('Work');
import('ORG.Util.Page');
if($genrea==1){
	$this->assign('wjg',1);
	$map['genre']='企业';
}else if($genrea==2){
	$this->assign('wjg',2);
	$map['genre']='学生';
}else if($genrea!=1&&genrea!=2){
	$this->assign('wjg',3);
	$map['genre'] = array('like binary','%'.$keyword.'%');
}
$countb  = $Work->where($map)->count();
$Pageb       = new Page($countb,7);
$show       = $Pageb->show();
$this->data = $Work->where($map)->limit($Pageb->firstRow.','.$Pageb->listRows)->select();
$this->assign('page',$show);
$map['column']='新闻';
$count  = $Data->where($map)->count();
$Page       = new Page($count,11);
$this->dataxw = $Data->where($map)->limit($Page->firstRow.','.$Page->listRows)->select();
$map['column']='创业案例';
$counta  = $Data->where($map)->count();
$Pagea       = new Page($counta,11);
$this->datazp = $Data->where($map)->limit($Pagea->firstRow.','.$Pagea->listRows)->select();
$this->assign('price','办事流程');
$this->display('Index/subpage/flow_essay');
}
//短期项目
public function item_essay(){
$Data= M('Data');
$Project= M('Project');
import('ORG.Util.Page');
$countb  = $Project->count();
$Pageb       = new Page($countb,7);
$show       = $Pageb->show();
$this->data = $Project->where($map)->limit($Pageb->firstRow.','.$Pageb->listRows)->select();
$this->assign('page',$show);
$map['column']='新闻';
$count  = $Data->where($map)->count();
$Page       = new Page($count,11);
$this->dataxw = $Data->where($map)->limit($Page->firstRow.','.$Page->listRows)->select();
$map['column']='创业案例';
$counta  = $Data->where($map)->count();
$Pagea       = new Page($counta,11);
$this->datazp = $Data->where($map)->limit($Pagea->firstRow.','.$Pagea->listRows)->select();
$this->assign('price','短期项目');
$this->display('Index/subpage/item_essay');
}
//招聘信息
public function recruit_essay(){
$Data= M('Data');
$Recruit= M('Recruit');
import('ORG.Util.Page');
$countb  = $Recruit->count();
$Pageb       = new Page($countb,7);
$show       = $Pageb->show();
$this->data = $Recruit->where($map)->limit($Pageb->firstRow.','.$Pageb->listRows)->select();
$this->assign('page',$show);
$map['column']='新闻';
$count  = $Data->where($map)->count();
$Page       = new Page($count,11);
$this->dataxw = $Data->where($map)->limit($Page->firstRow.','.$Page->listRows)->select();
$map['column']='创业案例';
$counta  = $Data->where($map)->count();
$Pagea       = new Page($counta,11);
$this->datazp = $Data->where($map)->limit($Pagea->firstRow.','.$Pagea->listRows)->select();
$this->assign('price','招聘信息');
$this->display('Index/subpage/recruit_essay');
}
//岗位需求
public function selloneself_essay($genreb=0){
$Data= M('Data');
$Station= M('Station');
import('ORG.Util.Page');
if($genreb==''){
	$map['specialty'] = array('like binary','%'.$keyword.'%');
}else{
	$this->assign('wjg',$genreb);
	$map['specialty'] =$genreb;
}
$countb  = $Station->where($map)->count();
$Pageb       = new Page($countb,7);
$show       = $Pageb->show();
$this->data = $Station->where($map)->limit($Pageb->firstRow.','.$Pageb->listRows)->select();
$this->assign('page',$show);
$Specialty  = M('Specialty'); 
$this->asxi = $Specialty->select();
$map['column']='新闻';
$count  = $Data->where($map)->count();
$Page       = new Page($count,11);
$this->dataxw = $Data->where($map)->limit($Page->firstRow.','.$Page->listRows)->select();
$map['column']='创业案例';
$counta  = $Data->where($map)->count();
$Pagea       = new Page($counta,11);
$this->datazp = $Data->where($map)->limit($Pagea->firstRow.','.$Pagea->listRows)->select();
$this->assign('price','岗位需求');
$this->display('Index/subpage/selloneself_essay');
}
//自荐信息
public function station_essay(){
$Data= M('Data');
$Selloneself= M('Selloneself');
import('ORG.Util.Page');
$countb  = $Selloneself->count();
$Pageb       = new Page($countb,7);
$show       = $Pageb->show();
$this->data = $Selloneself->where($map)->limit($Pageb->firstRow.','.$Pageb->listRows)->select();
$this->assign('page',$show);
$map['column']='新闻';
$count  = $Data->where($map)->count();
$Page       = new Page($count,11);
$this->dataxw = $Data->where($map)->limit($Page->firstRow.','.$Page->listRows)->select();
$map['column']='创业案例';
$counta  = $Data->where($map)->count();
$Pagea       = new Page($counta,11);
$this->datazp = $Data->where($map)->limit($Pagea->firstRow.','.$Pagea->listRows)->select();
$this->assign('price','自荐信息');
$this->display('Index/subpage/station_essay');
}
//跳转发布招聘
public function recruitment_essay(){
	$this->assign('price','发布招聘');
	$this->display('Index/subpage/recruitmentadd_essay');
}
//发布招聘添加
public function recruitmentadd_essay(){
	$Recruit  = M('Recruit');
	$Firmarchives  = M('Firmarchives');
	$data['headline'] = $this->_post('headline');
	$data['synopsis'] =$this->_post('synopsis');
	$data['content'] =$this->_post('content');
	$data['time'] =date('Y-m-d');
	$usernamea = $this->_post('username');
	$data['issuename'] = $Firmarchives->getFieldByUsername($usernamea,'firmname');
	$data['username'] = $usernamea;
	$Recruit->add($data);
		$this->assign('price','发布招聘');
    $this->redirect('recruitment_essay');
}
//跳转发布项目
public function project_essay(){
	$this->assign('price','发布项目');
	$this->display('Index/subpage/projectadd_essay');
}
//发布项目添加
public function projectadd_essay(){
	$Project  = M('Project');
	$Firmarchives  = M('Firmarchives');
	$data['headline'] = $this->_post('headline');
	$data['synopsis'] =$this->_post('synopsis');	
	$data['content'] =$this->_post('content');
	$data['time'] =date('Y-m-d');
	$usernamea = $this->_post('username');
	$data['issuename'] = $Firmarchives->getFieldByUsername($usernamea,'firmname');
	$data['username'] = $usernamea;
	$Project->add($data);
	$this->assign('price','发布项目');
    $this->redirect('project_essay');
}

//跳转发布自荐书页面
public function selladd_essay(){
    $Studentfile = M("Studentfile");
    $condition['username'] = session('username');
    $this->data = $Studentfile->where($condition)->select(); 
	$this->assign('price','自荐书');
	$this->display('Index/subpage/selladd_essay');
}
//AJ验证自荐书到达5次
public function sellaj_essay(){
	$Selloneself = M("Selloneself");
	$condition['username'] = session('username');
    $absi = $Selloneself->where($condition)->select(); 
	if($absi){
		if(count($absi)<5){
			 $this->ajaxReturn(1,0);
		}else{
			 $this->ajaxReturn(2,0);
		}
	}else{
		$this->ajaxReturn(2,0);
		
	}
	
}

//发布添加自荐书
public function sellaadd_essay(){
    $Selloneself = M("Selloneself");
 	$Selloneself->create();
	$result=$Selloneself->add();
		if($result){
			$this->redirect('station_essay');
		}else{
			$this->redirect('station_essay');
		}
}
//跳转我的自荐书页面
public function sellstudent_essay(){
$Selloneself = M("Selloneself");
import('ORG.Util.Page');
$map['username'] = session('username');
$countb  = $Selloneself->where($map)->count();
$Pageb       = new Page($countb,5);
$show       = $Pageb->show();
$this->data = $Selloneself->where($map)->limit($Pageb->firstRow.','.$Pageb->listRows)->select();
$this->assign('price','我的自荐书');
$this->display('Index/subpage/sellstudent_essay');
}
//删除我的自荐书
public function selldelete_essay($id=0){
$Selloneself = M("Selloneself");
$Selloneself->delete($id);
$this->redirect('sellstudent_essay');
}

//跳转学生档案页面
public function pupilrecord_essay(){
	$Studentfile = M("Studentfile");
	$condition['username'] = session('username');
    $this->data = $Studentfile->where($condition)->select(); 
	$this->assign('price','学生档案');
    $this->display('Index/subpage/pupilrecord_essay');
}
//跳转企业档案页面
public function firmrecord_essay(){
	$Firmarchives = M("Firmarchives");
	$condition['username'] = session('username');
    $this->data = $Firmarchives->where($condition)->select(); 
	$this->assign('price','企业档案');
    $this->display('Index/subpage/firmrecord_essay');
}
//跳转修改学生业档案页面
public function pupilrecordamend_essay(){
	$Studentfile = M("Studentfile");
	$condition['username'] = session('username');
    $this->data = $Studentfile->where($condition)->select(); 
	$this->assign('price','修改学生档案');
	$this->display('Index/subpage/pupilrecordamend_essay');
}
//跳转修改企业档案页面
public function firmrecordamend_essay(){
	$Firmarchives = M("Firmarchives");
	$condition['username'] = session('username');
    $this->data = $Firmarchives->where($condition)->select(); 
	$this->assign('price','修改企业档案');
	$this->display('Index/subpage/firmrecordamend_essay');
}
//修改学生档案
public function pupilrecordamenda_essay(){
	$Studentfile = M("Studentfile");
	$Studentfile->create();
	$Studentfile->save();
	$this->redirect('pupilrecord_essay');
}
//修改企业档案
public function firmrecordamenda_essay(){
	$Firmarchives = M("Firmarchives");
	$Firmarchives->create();
	$Firmarchives->save();
	$this->redirect('firmrecord_essay');
}
//跳转企业档案页面(用户查看)
public function firmrexamine_essay($username=0){
	$Firmarchives = M("Firmarchives");
	$condition['username'] =$username;
    $this->data = $Firmarchives->where($condition)->select(); 
	$this->assign('price','企业档案');
    $this->display('Index/subpage/firmrexamine_essay');
}
//跳转自荐书模版下载
public function vlai_essay(){
$Vlai= M('Vlai');
$keyword=$this->_post('keyword');
$map['name|savename|path|savename|size|time'] = array('like binary','%'.$keyword.'%');
import('ORG.Util.Page');
$count  = $Vlai->where($map)->count();
$Page       = new Page($count,4);
$show       = $Page->show();
$this->data = $Vlai->where($map)->limit($Page->firstRow.','.$Page->listRows)->select();
$this->assign('page',$show);
$this->assign('keyword',$keyword);
$this->assign('price','自荐书模版下载');
$this->display('Index/subpage/vlai_essay');
}
//下载
    public function file_down($id=0)
    {
	   $Vlai=M('Vlai');
	    $data=$Vlai->find($id);
	    if(empty($data)){
		    	$this->redirect('vlai_essay');
	    }else{
		    $path='./public/Uploads/'.$data['savename'];
            header("content-type: application/octet-stream");
		    header('Content-Disposition: attachment; filename="'.$data['savename'].'"');
		    header('Content-Length:'.$data['size']);
		    ob_clean();
		    flush();
		    readfile($path);
	    }
    }

}
?>