<?php
class CaseAction extends CommonAction{
//显示模板，规范为下划线“_“分离
public function graduate_update($id=0){ 
 $graduate  = M('Data');
    $this->vo= $graduate->find($id);

  $this->display('Index/case/graduate_update');
}
public function carveout_update($id=0){ 
 $graduate  = M('Data');
    $this->vo= $graduate->find($id);

  $this->display('Index/case/carveout_update');
}
public function graduate_add(){ 
   $this->display('Index/case/graduate_add');
}
public function carveout_add(){ 
   $this->display('Index/case/carveout_add');
}
/***************************以下是操作方法，请遵守注释规范******************/

//--添加
public function graduateAdd(){
  $Users   =   M('Data');
    $Users->create();
     $Users->time=date('Y-m-d');
     $Users->column='毕业生风采';
	$Users->add();
    $this->redirect('carveout_list');
}
public function carveoutAdd(){
  $Users   =   M('Data');
     $Picture   =   M('Picture');
   $headline=$this->_post('headline');
    $Users->create();
     $Users->time=date('Y-m-d');
     $Users->column='创业案例';
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
    $this->redirect('carveout_list');
	}
}
//--查询所有
public function graduate_list(){
       $graduate= M('Data');
//--模糊查询
$keyword=$this->_post('keyword');
// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
$map['column']='毕业生风采';
$map['headline|newscontent|time|column'] = array('like binary','%'.$keyword.'%');
import('ORG.Util.Page');// 导入分页类
 $count  = $graduate->where($map)->count();// 查询满足要求的总记录数
$Page       = new Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数
$show       = $Page->show();// 分页显示输出
// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
$this->data = $graduate->where($map)->limit($Page->firstRow.','.$Page->listRows)->select();
$this->assign('page',$show);// 赋值分页输出
$this->assign('keyword',$keyword);
$this->display('Index/case/graduate_list'); // 输出模板
}
public function carveout_list(){
       $graduate= M('Data');
//--模糊查询
$keyword=$this->_post('keyword');

// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
$map['column']='创业案例';
$map['headline|newscontent|time|column'] = array('like binary','%'.$keyword.'%');
import('ORG.Util.Page');// 导入分页类
 $count  = $graduate->where($map)->count();// 查询满足要求的总记录数
$Page       = new Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数
$show       = $Page->show();// 分页显示输出
// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
$this->data = $graduate->where($map)->limit($Page->firstRow.','.$Page->listRows)->select();
$this->assign('page',$show);// 赋值分页输出
$this->assign('keyword',$keyword);
$this->display('Index/case/carveout_list'); // 输出模板
}

//--修改
public function graduateUpdate(){
    $graduate   =   M('Data');
    $graduate->create();
    $graduate->save();
    $this->redirect('graduate_list');
}//--修改
public function carveoutUpdate(){
    $graduate   =   M('Data');
    $graduate->create();
    $graduate->save();
    $this->redirect('carveout_list');
}//批量删除
public function graduateDelete($id=0){

     $Data = M('Data');
     $Data->delete($id);
     $this->redirect('graduate_list');

}
public function carveoutDelete($id=0){
     $Data = M('Data');
	 $Picture = M('Picture');
	 $tpc=$Data->select($id);
	 $savenamea = $Picture->getFieldByTheir($tpc[0]['headline'],'savename');
	 unlink('./Public/photograph/m_'.$savenamea);
     $Data->delete($id);
     $this->redirect('carveout_list');
}






//上传
public function upload() {
  $Essay = M('Essay');
  $columnid= $this->_post('columnid');
  $condition['columnid'] = $columnid;
    import('ORG.Net.UploadFile');
    $upload = new UploadFile();// 实例化上传类
    $upload->maxSize  = 3145728 ;// 设置附件上传大小
    $upload->allowExts  = array('swf');// 设置附件上传类型
    $upload->savePath =  './Public/Uploads/';// 设置附件上传目录
    if(!$upload->upload()) {// 上传错误提示错误信息
    $this->error($upload->getErrorMsg());
    }else{
      $info = $upload->getUploadFileInfo();//取得成功上传的文件信息
      $model = M('Upload');
      $data['savename'] = $info[0]['savename'];//保存当前数据对象
      $data['savepath'] = $info[0]['savepath'];
      $data['size'] = $info[0]['size'];
      $data['time'] = NOW_TIME;
      $data['name'] =  $info[0]['name'];
      $condition['article']=$info[0]['name'];
      $name = $info[0]['name'];
      $result = $Essay->add($condition);
      $id =$Essay->getFieldByArticle($name,'id');
      $data['fileid']=$id;
      $model->add($data);
        $this->success('上传成功！');
    }
}



//去后缀
public function articleCheck($id=0){
     $Upload = M('Upload');
     $savepath =$Upload->getFieldByFileid($id,'savepath');
     $savename = $Upload->getFieldByFileid($id,'savename');
     $str = $savename;
     $savenamedz = substr($str,0,strrpos($str,'.'));  
     $str = $savepath;
     $savepathdz = substr($str,1);
     $this->assign('savenamedz',$savenamedz);
     $this->assign('savepathdz',$savepathdz );
     $this->display();
}


}



?>