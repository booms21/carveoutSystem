<?php
class BuildAction extends CommonAction{
//------------计算机专业部数据表开始-------------
//跳转添加页面
public function computer_add($id=0){ 
   $this->display('Index/build/computer_add');
}
//跳转修改页面
public function computer_update($id=0){ 
    $Data  = M('Data');
    $this->vo= $Data->find($id);
  $this->display('Index/build/computer_update');
}


//添加
public function computerAdd(){
  $Users   =   M('Data');
  $Picture   =   M('Picture');
  $headline=$this->_post('headline');
    $Users->create();
     $Users->time=date('Y-m-d');
     $Users->column='计算机专业部 ';
    import('ORG.Net.UploadFile');
    $upload = new UploadFile();
	$upload->thumb = true;
	$upload->thumbPrefix = 'm_'; 
	$upload->thumbMaxWidth = '115';
	$upload->thumbMaxHeight = '105';
    $upload->maxSize  = 3145728 ;
    $upload->allowExts  = array('jpg', 'png', 'jpeg');
    $upload->savePath =  './Public/photograph/';
	if(!$upload->upload()) {
        $this->error($upload->getErrorMsg());
    }else{
    $info = $upload->getUploadFileInfo();
    $data['savename'] = $info[0]['savename'];
	$data['savepath'] = $info[0]['savepath'];
	$data['size'] = $info[0]['size'];
	$data['time'] = NOW_TIME;
	$data['their'] =  $headline;
    $Picture->add($data);
    $Users->add();
    $this->redirect('computer_list');
	}
}
//修改
public function computerUpdate(){
    $Data   =   M('Data');
    $Data->create();
    $Data->save();
    $this->redirect('computer_list');
}
//删除
public function computerDelete($id=0){
     $Data = M('Data');
	 $Picture = M('Picture');
	 $tpc=$Data->select($id);
	 $savenamea = $Picture->getFieldByTheir($tpc[0]['headline'],'savename');
	 unlink('./Public/photograph/m_'.$savenamea);
     $Data->delete($id);
     $this->redirect('computer_list');
}
//主页
public function computer_list(){
$Data= M('Data');
$keyword=$this->_post('keyword');
$map['column']='计算机专业部';
$map['headline|newscontent|time|column'] = array('like binary','%'.$keyword.'%');
import('ORG.Util.Page');
 $count  = $Data->where($map)->count();
$Page       = new Page($count,10);
$show       = $Page->show();
$this->data = $Data->where($map)->limit($Page->firstRow.','.$Page->listRows)->select();
$this->assign('page',$show);
$this->assign('keyword',$keyword);
$this->display('Index/build/computer_list'); 
}
//------------计算机专业部数据表结束-------------

//------------汽车工程专业数据表开始-------------
//跳转添加页面
public function car_add($id=0){ 
   $this->display('Index/build/car_add');
}
//跳转修改页面
public function car_update($id=0){ 
    $Data  = M('Data');
    $this->redirect('car_list');
}
//修改
public function carUpdate(){
    $this->vo= $Data->find($id);
  $this->display('Index/build/car_update');
}

//添加
public function carAdd(){
  $Users   =   M('Data');
    $Users->create();
     $Users->time=date('Y-m-d');
     $Users->column='汽车工程专业部 ';
    $Users->add();
    $Data   =   M('Data');
    $Data->create();
    $Data->save();
    $this->redirect('car_list');
}
//删除
public function carDelete($id=0){
     $Data = M('Data');
     $Data->delete($id);
     $this->redirect('car_list');
}
//数据查询
public function car_list(){
$Data= M('Data');
$keyword=$this->_post('keyword');
$map['column']='汽车工程专业部';
$map['headline|newscontent|time|column'] = array('like binary','%'.$keyword.'%');
import('ORG.Util.Page');
 $count  = $Data->where($map)->count();
$Page       = new Page($count,10);
$show       = $Page->show();
$this->data = $Data->where($map)->limit($Page->firstRow.','.$Page->listRows)->select();
$this->assign('page',$show);
$this->assign('keyword',$keyword);
$this->display('Index/build/car_list'); 
}
//------------汽车工程专业数据表结束-------------

//------------校企合作数据表开始-------------
//跳转添加页面
public function cooperation_add($id=0){ 
   $this->display('Index/build/cooperation_add');
}
//跳转修改页面
public function cooperation_update($id=0){ 
    $Data  = M('Data');
    $this->vo= $Data->find($id);
  $this->display('Index/build/cooperation_update');
}

//添加
public function cooperationAdd(){
  $Users   =   M('Data');
    $Users->create();
     $Users->time=date('Y-m-d');
     $Users->column='校企合作';
    $Users->add();
    $this->redirect('cooperation_list');
}
//修改
public function cooperationUpdate(){
    $Data   =   M('Data');
    $Data->create();
    $Data->save();
    $this->redirect('cooperation_list');
}
//删除
public function cooperationDelete($id=0){
     $Data = M('Data');
     $Data->delete($id);
     $this->redirect('cooperation_list');
}
//数据查询
public function cooperation_list(){
$Data= M('Data');
$map['column']='校企合作';
$map['headline|newscontent|time|column'] = array('like binary','%'.$keyword.'%');
import('ORG.Util.Page');
 $count  = $Data->where($map)->count();
$Page       = new Page($count,10);
$show       = $Page->show();
$this->data = $Data->where($map)->limit($Page->firstRow.','.$Page->listRows)->select();
$this->assign('page',$show);
$this->assign('keyword',$keyword);
$this->display('Index/build/cooperation_list'); 
}
//------------校企合作数据表结束-------------


}
?>