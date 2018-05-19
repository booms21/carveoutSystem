<?php
class NewsAction extends CommonAction{
//------------新闻数据表开始-------------
//跳转添加页面
public function news_add(){ 
   $this->display('Index/news/news_add');
}
//跳转修改页面
public function news_update($id=0){ 
    $Data  = M('Data');
    $this->vo= $Data->find($id);
  $this->display('Index/news/news_update');
}
//添加
public function newsAdd(){
    $Users   =   M('Data');
    $Picture   =   M('Picture');
	$headline=$this->_post('headline');
    $Users->create();
    $Users->time=date('Y-m-d');
    $Users->column='新闻';
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
    $this->redirect('news_list');
    }
}
//修改
public function newsUpdate(){
    $Data   =   M('Data');
    $Data->create();
    $Data->save();
    $this->redirect('news_list');
} 
//删除
public function newsDelete($id=0){
     $Data = M('Data');
	 $Picture = M('Picture');
	 $tpc=$Data->select($id);
	 $savenamea = $Picture->getFieldByTheir($tpc[0]['headline'],'savename');
	 unlink('./Public/photograph/m_'.$savenamea);
     $Data->delete($id);
     $this->redirect('news_list');
}
//数据查询
public function news_list(){
$Data= M('Data');
$keyword=$this->_post('keyword');
$map['column']='新闻';
$map['headline|newscontent|time|column'] = array('like binary','%'.$keyword.'%');
import('ORG.Util.Page');
 $count  = $Data->where($map)->count();
$Page       = new Page($count,10);
$show       = $Page->show();
$this->data = $Data->where($map)->limit($Page->firstRow.','.$Page->listRows)->select();
$this->assign('page',$show);
$this->assign('keyword',$keyword);
$this->display('Index/news/news_list'); 
}
//------------新闻数据表结束-------------

}
?>