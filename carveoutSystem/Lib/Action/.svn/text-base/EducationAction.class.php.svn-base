<?php
class EducationAction extends CommonAction{
//------------创业课程数据表开始-------------
//跳转添加页面
public function course_add($id=0){ 
   $this->display('Index/education/course_add');
}
//跳转修改页面
public function course_update($id=0){ 
    $Data  = M('Data');
    $this->vo= $Data->find($id);
  $this->display('Index/education/course_update');
}

//添加
public function courseAdd(){
  $Users   =   M('Data');
    $Users->create();
     $Users->time=date('Y-m-d');
     $Users->column='创业课程';
    $Users->add();
    $this->redirect('course_list');
}
//修改
public function courseUpdate(){
    $Data   =   M('Data');
    $Data->create();
    $Data->save();
    $this->redirect('course_list');
}
//删除
public function courseDelete($id=0){
     $Data = M('Data');
     $Data->delete($id);
     $this->redirect('course_list');
}
//数据查询
public function course_list(){
$Data= M('Data');
$keyword=$this->_post('keyword');
$map['column']='创业课程';
$map['headline|newscontent|time|column'] = array('like binary','%'.$keyword.'%');
import('ORG.Util.Page');
 $count  = $Data->where($map)->count();
$Page       = new Page($count,10);
$show       = $Page->show();
$this->data = $Data->where($map)->limit($Page->firstRow.','.$Page->listRows)->select();
$this->assign('page',$show);
$this->assign('keyword',$keyword);
$this->display('Index/education/course_list'); 
}
//------------创业课程数据表结束-------------

//------------创业技巧数据表开始-------------
//跳转添加页面
public function technique_add($id=0){ 
   $this->display('Index/education/technique_add');
}
//跳转修改页面
public function technique_update($id=0){ 
    $Data  = M('Data');
    $this->vo= $Data->find($id);
  $this->display('Index/education/technique_update');
}

//添加
public function techniqueAdd(){
  $Users   =   M('Data');
    $Users->create();
     $Users->time=date('Y-m-d');
     $Users->column='创业技巧';
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
$map['column']='创业技巧';
$map['headline|newscontent|time|column'] = array('like binary','%'.$keyword.'%');
import('ORG.Util.Page');
 $count  = $Data->where($map)->count();
$Page       = new Page($count,10);
$show       = $Page->show();
$this->data = $Data->where($map)->limit($Page->firstRow.','.$Page->listRows)->select();
$this->assign('page',$show);
$this->assign('keyword',$keyword);
$this->display('Index/education/technique_list'); 
}
//------------创业技巧数据表结束-------------

//------------创业技巧数据表开始-------------
//跳转添加页面
public function problem_add($id=0){ 
   $this->display('Index/education/problem_add');
}
//跳转修改页面
public function problem_update($id=0){ 
    $Data  = M('Data');
    $this->vo= $Data->find($id);
  $this->display('Index/education/problem_update');
}

//添加
public function problemAdd(){
  $Users   =   M('Data');
    $Users->create();
     $Users->time=date('Y-m-d');
     $Users->column='创业问题';
    $Users->add();
    $this->redirect('problem_list');
}
//修改
public function problemUpdate(){
    $Data   =   M('Data');
    $Data->create();
    $Data->save();
    $this->redirect('problem_list');
}
//删除
public function problemDelete($id=0){
     $Data = M('Data');
     $Data->delete($id);
     $this->redirect('problem_list');
}
//数据查询
public function problem_list(){
$Data= M('Data');
$keyword=$this->_post('keyword');
$map['column']='创业问题';
$map['headline|newscontent|time|column'] = array('like binary','%'.$keyword.'%');
import('ORG.Util.Page');
 $count  = $Data->where($map)->count();
$Page       = new Page($count,10);
$show       = $Page->show();
$this->data = $Data->where($map)->limit($Page->firstRow.','.$Page->listRows)->select();
$this->assign('page',$show);
$this->assign('keyword',$keyword);
$this->display('Index/education/problem_list'); 
}
//------------创业技巧数据表结束-------------

//------------创业流程数据表开始-------------
//跳转添加页面
public function process_add($id=0){ 
   $this->display('Index/education/process_add');
}
//跳转修改页面
public function process_update($id=0){ 
    $Carveoutflow  = M('Data');
    $this->vo= $Carveoutflow->find($id);
  $this->display('Index/education/process_update');
}

//添加
public function processAdd(){
  $Users   =   M('Data');
    $Users->create();
     $Users->time=date('Y-m-d');
     $Users->column='创业流程';
    $Users->add();
    $this->redirect('process_list');
}
//修改
public function processUpdate(){
    $Carveoutflow   =   M('Data');
    $Carveoutflow->create();
    $Carveoutflow->save();
    $this->redirect('process_list');
}
//删除
public function processDelete(){
     $Carveoutflow = M('Data');
     $Carveoutflow->delete($id);
     $this->redirect('process_list');
}
//数据查询
public function process_list(){
$Carveoutflow= M('Data');
$keyword=$this->_post('keyword');
$map['column']='创业流程';
$map['headline|newscontent|time|column'] = array('like binary','%'.$keyword.'%');
import('ORG.Util.Page');
 $count  = $Carveoutflow->where($map)->count();
$Page       = new Page($count,10);
$show       = $Page->show();
$this->data = $Carveoutflow->where($map)->limit($Page->firstRow.','.$Page->listRows)->select();
$this->assign('page',$show);
$this->assign('keyword',$keyword);
$this->display('Index/education/process_list'); 
}
//------------创业流程数据表结束-------------

}
?>