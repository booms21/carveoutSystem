<?php
class PioneerparkAction extends CommonAction{
//------------创业园介绍数据表开始-------------
//跳转添加页面
public function innovationpark_add($id=0){ 
   $this->display('Index/Pioneerpark/innovationpark_add');
}
//跳转修改页面
public function innovationpark_update($id=0){ 
    $Data  = M('Data');
    $this->vo= $Data->find($id);
  $this->display('Index/Pioneerpark/innovationpark_update');
}

//添加
public function innovationparkAdd(){
  $Users   =   M('Data');
    $Users->create();
     $Users->time=date('Y-m-d');
     $Users->column='创业园介绍';
    $Users->add();
    $this->redirect('innovationpark_list');
}
//修改
public function innovationparkUpdate(){
    $Data   =   M('Data');
    $Data->create();
    $Data->save();
    $this->redirect('innovationpark_list');
}
//删除
public function innovationparkDelete(){
     $Data = M('Data');
     $Data->delete($id);
     $this->redirect('innovationpark_list');
}
//数据查询
public function innovationpark_list(){
$Data= M('Data');
$keyword=$this->_post('keyword');
$map['column']='创业园介绍';
$map['headline|newscontent|time|column'] = array('like binary','%'.$keyword.'%');
import('ORG.Util.Page');
 $count  = $Data->where($map)->count();
$Page       = new Page($count,10);
$show       = $Page->show();
$this->data = $Data->where($map)->limit($Page->firstRow.','.$Page->listRows)->select();
$this->assign('page',$show);
$this->assign('keyword',$keyword);
$this->display('Index/Pioneerpark/innovationpark_list'); 
}
//------------创业园介绍数据表结束-------------

//------------成果展示数据表开始---------------
//跳转添加页面
public function achievement_add(){
     $Specialty  = M('Specialty'); 
     $this->data = $Specialty->select();
   $this->display('Index/Pioneerpark/achievement_add');
}
//跳转修改页面
public function achievement_update($id=0){ 
    $Data  = M('Data');
    $this->vo= $Data->find($id);
  $this->display('Index/Pioneerpark/achievement_update');
}

//添加
public function achievementAdd(){
  $Users   =   M('Data');
    $Users->create();
     $Users->time=date('Y-m-d');
     $Users->column='成果展示';
    $Users->add();
    $this->redirect('achievement_list');
}
//修改
public function leagueUpdate(){
    $Data   =   M('Data');
    $Data->create();
    $Data->save();
    $this->redirect('league_list');
}
//删除
public function achievementDelete($id=0){
     $Data = M('Data');
     $Data->delete($id);
     $this->redirect('achievement_list');
}
//数据查询
public function achievement_list(){
$Data= M('Data');
$keyword=$this->_post('keyword');
$map['column']='成果展示';
$map['headline|newscontent|time|column'] = array('like binary','%'.$keyword.'%');
import('ORG.Util.Page');
 $count  = $Data->where($map)->count();
$Page       = new Page($count,10);
$show       = $Page->show();
$this->data = $Data->where($map)->limit($Page->firstRow.','.$Page->listRows)->select();
$this->assign('page',$show);
$this->assign('keyword',$keyword);
$this->display('Index/Pioneerpark/achievement_list'); 
}
//------------成果展示数据表结束-------------

//------------创业园加盟数据表开始-------------
//跳转添加页面
public function league_add($id=0){ 
   $this->display('Index/Pioneerpark/league_add');
}
//申请
public function league_update($id=0){ 
    $League  = M('League');
	$Users = M('Users');
   $username = $League->getFieldById($id,'username');
   $league = $Users->getFieldByUsername($username,'league');
   $usersid = $Users->getFieldByUsername($username,'id');
    if($league==2){
    $data['id'] = $usersid;
	$data['league'] = 1;	
    $Users->save($data);
	$data['id'] = $id;
	$data['league'] = 1;	
    $League->save($data);
	$this->redirect('league_list');
    }else{
    $data['id'] = $usersid;
	$data['league'] = 2;	
	$Users->save($data);
	$data['id'] = $id;
	$data['league'] = 2;	
    $League->save($data);
    $this->redirect('league_list');
    }
    
}
//查询学生用户未通过
public function inquirepupil(){
$League= M('League');
$keyword=$this->_post('keyword');
$map['role&league'] =array('学生',2,'_multi'=>true);
import('ORG.Util.Page');
$count  = $League->where($map)->count();
$Page       = new Page($count,10);
$show       = $Page->show();
$this->data = $League->where($map)->limit($Page->firstRow.','.$Page->listRows)->select();
$this->assign('page',$show);
$this->assign('keyword',$keyword);
$this->display('Index/pioneerpark/league_list'); 
}

//查询企业用户未通过
public function inquirefirm(){
$League= M('League');
$keyword=$this->_post('keyword');
$map['role&league'] =array('企业',2,'_multi'=>true);
import('ORG.Util.Page');
$count  = $League->where($map)->count();
$Page       = new Page($count,10);
$show       = $Page->show();
$this->data = $League->where($map)->limit($Page->firstRow.','.$Page->listRows)->select();
$this->assign('page',$show);
$this->assign('keyword',$keyword);
$this->display('Index/pioneerpark/league_list'); 
}
//设置通过
    public function league_audit(){
	$League  = M('League');
	$Users   =   M('Users');
	$id = $this->_post('gettextid');
	$League->where('id  in ('.$id.')')->data(array('league'=>1))->save();
	$zhipassid = $League->where('id  in ('.$id.')')->field('usernameid')->select();
	$length=count($zhipassid);
	for ($i = 0; $i <$length; $i++){$stra .=$zhipassid[$i]['usernameid'].',';}
    $usernametgid = substr($stra,0,strrpos($stra,','));  															
	$Users->where('id in ('.$usernametgid.')')->data(array('league'=>1))->save();
	$this->redirect('league_list');	
} 
//撤销通过
	public function league_noaudit(){
	$League  = M('League');
	$Users   =   M('Users');
	$id = $this->_post('nogettextid');
	$League->where('id  in ('.$id.')')->data(array('league'=>2))->save();
	$zhipassid = $League->where('id  in ('.$id.')')->field('usernameid')->select();
	$length=count($zhipassid);
	for ($i = 0; $i <$length; $i++){$stra .=$zhipassid[$i]['usernameid'].',';}
    $usernametgid = substr($stra,0,strrpos($stra,','));  														
	$Users->where('id in ('.$usernametgid.')')->data(array('league'=>2))->save();
	$this->redirect('league_list');
}

//添加	
public function leagueinsert(){
	$League   =   M('League');
	if($League->create()) {
     $result =   $League->add();
            if($result) {
                $this->redirect('league_list');
            }else{
                $this->error('写入错误！');
            }
        }else{
            $this->error($League->getError());
        }

	
}

//删除
public function leagueDelete($id=0){
     $League = M('League');
     $League->delete($id);
     $this->redirect('league_list');
}
//数据查询
public function league_list(){
$League= M('League');
$keyword=$this->_post('keyword');
$map['headline|content|role|time|username|league'] = array('like binary','%'.$keyword.'%');
import('ORG.Util.Page');
$count  = $League->where($map)->count();
$Page       = new Page($count,10);
$show       = $Page->show();
$this->data = $League->where($map)->limit($Page->firstRow.','.$Page->listRows)->select();
$this->assign('page',$show);
$this->assign('keyword',$keyword);
$this->display('Index/Pioneerpark/league_list'); 
}
//------------创业园加盟数据表结束-------------

//------------办事流程数据表开始-------------
//跳转添加页面
public function work_add($id=0){ 
   $this->display('Index/Pioneerpark/work_add');
}
//跳转修改页面
public function work_update($id=0){ 
    $Work  = M('Work');
    $this->vo= $Work->find($id);
  $this->display('Index/Pioneerpark/work_update');
}

//添加
public function workAdd(){
  $Users   =   M('Work');
    $Users->create();
     $Users->time=date('Y-m-d');
    $Users->add();
    $this->redirect('work_list');
}
//修改
public function workUpdate(){
    $Work   =   M('Work');
    $Work->create();
    $Work->save();
    $this->redirect('work_list');
}
//删除
public function workDelete($id=0){
     $Work = M('Work');
     $Work->delete($id);
     $this->redirect('work_list');
}
//数据查询
public function work_list(){
$Work= M('Work');
$keyword=$this->_post('keyword');
$map['headline|content|time|genre'] = array('like binary','%'.$keyword.'%');
import('ORG.Util.Page');
 $count  = $Work->where($map)->count();
$Page       = new Page($count,10);
$show       = $Page->show();
$this->data = $Work->where($map)->limit($Page->firstRow.','.$Page->listRows)->select();
$this->assign('page',$show);
$this->assign('keyword',$keyword);
$this->display('Index/Pioneerpark/work_list'); 
}
//------------办事流程数据表结束-------------

}
?>