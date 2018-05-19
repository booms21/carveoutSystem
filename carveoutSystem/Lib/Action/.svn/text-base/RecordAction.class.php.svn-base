<?php
class RecordAction extends CommonAction{
//------------学生成长档案数据表开始-------------
//跳转添加页面
public function studentfile_add($id=0){ 
   $this->display('Index/Record/studentfile_add');
}
//跳转修改页面
public function studentfile_update($id=0){ 
    $Studentfile  = M('Studentfile');
    $this->vo= $Studentfile->find($id);
  $this->display('Index/Record/studentfile_update');
}


//添加
public function studentfileinsert(){
	$Studentfile   =   D('Studentfile');
	if($Studentfile->create()) {
     $result =   $Studentfile->add();
            if($result) {
                $this->redirect('studentfile_list');
            }else{
                $this->error('写入错误！');
            }
        }else{
            $this->error($Studentfile->getError());
        }

	
}
//修改
public function studentfileUpdate(){
    $Studentfile   =   M('Studentfile');
    $Studentfile->create();
    $Studentfile->save();
    $this->redirect('studentfile_list');
}
//删除
public function studentfileDelete($id=0){
     $Studentfile = M('Studentfile');
     $Studentfile->delete($id);
     $this->redirect('studentfile_list');
}
//数据查询
public function studentfile_list(){
$Studentfile= M('Studentfile');
$keyword=$this->_post('keyword');
$map['username|name|sex|age|nation|politics|birthday|standya|majorname|phone|email'] = array('like','%'.$keyword.'%');
import('ORG.Util.Page');
$count  = $Studentfile->where($map)->count();
$Page       = new Page($count,10);
$show       = $Page->show();
$this->data = $Studentfile->where($map)->limit($Page->firstRow.','.$Page->listRows)->select();
$this->assign('page',$show);
$this->assign('keyword',$keyword);
$this->display('Index/Record/studentfile_list'); 
}
//------------学生成长档案数据表结束-------------

//------------企业档案数据表开始-------------
//跳转添加页面
public function firmarchives_add($id=0){ 
   $this->display('Index/Record/firmarchives_add');
}
//跳转修改页面
public function firmarchives_update($id=0){ 
    $Firmarchives  = M('Firmarchives');
    $this->vo= $Firmarchives->find($id);
  $this->display('Index/Record/firmarchives_update');
}


//添加
public function firmarchivesinsert(){
	$Firmarchives   =   D('Firmarchives');
	if($Firmarchives->create()) {
     $result =   $Firmarchives->add();
            if($result) {
                $this->redirect('firmarchives_list');
            }else{
                $this->error('写入错误！');
            }
        }else{
            $this->error($Firmarchives->getError());
        }

	
}
//修改
public function firmarchivesUpdate(){
    $Firmarchives   =   M('Firmarchives');
    $Firmarchives->create();
    $Firmarchives->save();
    $this->redirect('firmarchives_list');
}
//删除
public function firmarchivesDelete($id=0){
     $Firmarchives = M('Firmarchives');
     $Firmarchives->delete($id);
     $this->redirect('firmarchives_list');
}
//数据查询
public function firmarchives_list(){
$Firmarchives= M('Firmarchives');
$keyword=$this->_post('keyword');
$map['username|firmname|synopsis|establish|site|phone|email'] = array('like','%'.$keyword.'%');
import('ORG.Util.Page');
$count  = $Firmarchives->where($map)->count();
$Page       = new Page($count,10);
$show       = $Page->show();
$this->data = $Firmarchives->where($map)->limit($Page->firstRow.','.$Page->listRows)->select();
$this->assign('page',$show);
$this->assign('keyword',$keyword);
$this->display('Index/Record/firmarchives_list'); 
}
//------------企业档案数据表结束-------------

}
?>