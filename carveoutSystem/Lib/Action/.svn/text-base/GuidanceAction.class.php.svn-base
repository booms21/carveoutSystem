<?php
class GuidanceAction extends CommonAction{
//------------就业技巧数据表开始-------------
//跳转添加页面
public function technique_add(){ 
   $this->display('Index/guidance/technique_add');
}
//跳转修改页面
public function technique_update($id=0){ 
    $Data  = M('Data');
    $this->vo= $Data->find($id);
  $this->display('Index/guidance/technique_update');
}

//添加
public function techniqueAdd(){
  $Users   =   M('Data');
    $Users->create();
     $Users->time=date('Y-m-d');
     $Users->column='就业技巧';
    $Users->add();
    $this->redirect('technique_list');
}
//修改
public function techniqueUpdate(){
    $Data   =   M('Data');
    $Data->create();
    $Data->save();
    $this->redirect('technique_list');
}
//删除
public function techniqueDelete($id=0){
     $Data = M('Data');
     $Data->delete($id);
     $this->redirect('technique_list');
}
//数据查询
public function technique_list(){
$Data= M('Data');
$keyword=$this->_post('keyword');
$map['column']='就业技巧';
$map['headline|newscontent|time|column'] = array('like binary','%'.$keyword.'%');
import('ORG.Util.Page');
 $count  = $Data->where($map)->count();
$Page       = new Page($count,10);
$show       = $Page->show();
$this->data = $Data->where($map)->limit($Page->firstRow.','.$Page->listRows)->select();
$this->assign('page',$show);
$this->assign('keyword',$keyword);
$this->display('Index/guidance/technique_list'); 
}
//------------就业技巧数据表结束-------------

//------------就业问题数据表开始-------------
//跳转添加页面
public function question_add(){ 
   $this->display('Index/guidance/question_add');
}
//跳转修改页面
public function question_update($id=0){ 
    $Data  = M('Data');
    $this->vo= $Data->find($id);
  $this->display('Index/guidance/question_update');
}

//添加
public function questionAdd(){
  $Users   =   M('Data');
    $Users->create();
     $Users->time=date('Y-m-d');
     $Users->column='就业问题';
    $Users->add();
    $this->redirect('question_list');
}
//修改
public function questionUpdate(){
    $Data   =   M('Data');
    $Data->create();
    $Data->save();
    $this->redirect('question_list');
}
//删除
public function questionDelete($id=0){
     $Data = M('Data');
     $Data->delete($id);
     $this->redirect('question_list');
}
//数据查询
public function question_list(){
$Data= M('Data');
$keyword=$this->_post('keyword');
$map['column']='就业问题';
$map['headline|newscontent|time|column'] = array('like binary','%'.$keyword.'%');
import('ORG.Util.Page');
 $count  = $Data->where($map)->count();
$Page       = new Page($count,10);
$show       = $Page->show();
$this->data = $Data->where($map)->limit($Page->firstRow.','.$Page->listRows)->select();
$this->assign('page',$show);
$this->assign('keyword',$keyword);
$this->display('Index/guidance/question_list'); 
}
//------------就业问题数据表结束-------------

//------------职业岗位数据表开始-------------
//跳转添加页面
public function profession_add($id=0){
	 $Specialty  = M('Specialty'); 
	 $this->data = $Specialty->select();
   $this->display('Index/guidance/profession_add');
}
//跳转修改页面
public function profession_update($id=0){ 
    $Station  = M('Station');
    $this->vo= $Station->find($id);
	$Specialty  = M('Specialty'); 
	 $this->data = $Specialty->select();
 $this->display('Index/guidance/profession_update');
}

//添加
public function professionAdd(){
  $Users   =   M('Station');
    $Users->create();
     $Users->time=date('Y-m-d');
   $Users->add();
    $this->redirect('profession_list');
}
//修改
public function professionUpdate(){
    $Station   =   M('Station');
    $Station->create();
    $Station->save();
    $this->redirect('profession_list');
}
//删除
public function professionDelete($id=0){
     $Station = M('Station');
     $Station->delete($id);
     $this->redirect('profession_list');
}
//数据查询
public function profession_list(){
$Station= M('Station');
$keyword=$this->_post('keyword');
$map['headline|newscontent|time|specialty'] = array('like binary','%'.$keyword.'%');
import('ORG.Util.Page');
 $count  = $Station->where($map)->count();
$Page       = new Page($count,10);
$show       = $Page->show();
$this->data = $Station->where($map)->limit($Page->firstRow.','.$Page->listRows)->select();
$this->assign('page',$show);
$this->assign('keyword',$keyword);
$this->display('Index/guidance/profession_list'); 
}
//------------职业岗位数据表结束-------------

//------------自荐书模版数据表开始-------------
//跳转添加页面
public function resource_add($id=0){ 
   $this->display('Index/guidance/resource_add');
}

//添加
public function resourceinsert(){
    import('ORG.Net.UploadFile');
    $upload = new UploadFile();
    $upload->maxSize  = 3145728 ;
    $upload->allowExts  = array('zip','rar');
    $upload->savePath =  './Public/Uploads/';
    if(!$upload->upload()) {
    $this->error($upload->getErrorMsg());
    }else{
    $info = $upload->getUploadFileInfo();
    $Vlai   =   M('Vlai');
	$data['name'] = $info[0]['name'];
	$data['savename'] = $info[0]['savename'];
	$data['path'] = $info[0]['savepath'];
	$data['size'] = $info[0]['size'];
    $data['time'] = NOW_TIME;
    $Vlai ->add($data);
	$this->redirect('resource_list');
	}
}

//删除
public function resourceDelete($id=0){
     $Vlai = M('Vlai');
     $Vlai->delete($id);
     $this->redirect('resource_list');
}
//数据查询
public function resource_list(){
$Vlai= M('Vlai');
$keyword=$this->_post('keyword');
$map['name|savename|path|savename|size|time'] = array('like binary','%'.$keyword.'%');
import('ORG.Util.Page');
 $count  = $Vlai->where($map)->count();
$Page       = new Page($count,10);
$show       = $Page->show();
$this->data = $Vlai->where($map)->limit($Page->firstRow.','.$Page->listRows)->select();
$this->assign('page',$show);
$this->assign('keyword',$keyword);
$this->display('Index/guidance/resource_list'); 
}
//------------自荐书模版数据表结束-------------
}
?>