<?php
class InfoAction extends CommonAction{
//显示模板，规范为下划线“_“分离
public function selloneself_update($id=0){ 
  
    $selloneself  = M('selloneself');
    $this->vo= $selloneself->find($id);

  $this->display('Index/info/selloneself_update');
}
public function selloneself_add($id=0){ 
   $this->display('Index/info/selloneself_add');
}
/***************************以下是操作方法，请遵守注释规范******************/

//--添加
public function selloneselfAdd(){
    $selloneself   =   M('Selloneself');
     $selloneself->create();
// 把创建的数据对象写入数据库
$selloneself->add();
 $this->redirect('selloneself_list');
}
//--查询所有
public function selloneself_list(){
       $selloneself= M('Selloneself');
//--模糊查询
$keyword=$this->_post('keyword');

// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
$map['sex|age|nation|politics|birthday|standya|majorname|phone|email|resume|vlai'] = array('like','%'.$keyword.'%');//需要模糊查询的字段
import('ORG.Util.Page');// 导入分页类
 $count  = $selloneself->where($map)->count();// 查询满足要求的总记录数
$Page       = new Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数
$show       = $Page->show();// 分页显示输出
// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
$this->data = $selloneself->where($map)->limit($Page->firstRow.','.$Page->listRows)->select();
$this->assign('page',$show);// 赋值分页输出
$this->assign('keyword',$keyword);
$this->display('Index/info/selloneself_list'); // 输出模板
}

//--修改
public function selloneselfUpdate(){
    $selloneself   =   M('Selloneself');
    $selloneself->create();
    $selloneself->save();
    $this->redirect('selloneself_list');
}
//--删除
public function selloneselfDelete($id=0){
     $selloneself = M('Selloneself');
     $selloneself->delete($id);
     $this->redirect('selloneself_list');
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
      $data['time'] = date('Y-m-d');
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

/*栏目管理表开始*/
//跳转添加页面
public function specialty_add(){ 
   $this->display('Index/info/specialty_add');
}
//跳转修改页面
public function specialty_update($id=0){ 
    $Specialty  = M('Specialty');
    $this->vo= $Specialty->find($id);
  $this->display('Index/info/specialty_update');
}
//添加
public function specialtyAdd(){
    $Specialty   =   M('Specialty');
    $Specialty->create();
	$Specialty->add();
    $this->redirect('specialty_list');
}
//修改
public function specialtyUpdate(){
    $Specialty   =   M('Specialty');
    $Specialty->create();
    $Specialty->save();
    $this->redirect('specialty_list');
} 
//删除
public function specialtyDelete($id=0){
     $Specialty = M('Specialty');
     $Specialty->delete($id);
     $this->redirect('specialty_list');
}
//数据查询
public function specialty_list(){
$Specialty= M('Specialty');
$keyword=$this->_post('keyword');
$map['major'] = array('like binary','%'.$keyword.'%');
import('ORG.Util.Page');
$count  = $Specialty->where($map)->count();
$Page       = new Page($count,10);
$show       = $Page->show();
$this->data = $Specialty->where($map)->limit($Page->firstRow.','.$Page->listRows)->select();
$this->assign('page',$show);
$this->assign('keyword',$keyword);
$this->display('Index/info/specialty_list'); 
}
/*栏目管理表结束*/


/*图片管理表开始*/
//删除
public function pictureDelete($id=0){
     $Picture = M('Picture');
	 $tpc=$Picture->select($id);
	 unlink('./Public/photograph/'.$tpc[0]['savename']);
     $Picture->delete($id);
     $this->redirect('picture_list');
}
//数据查询
public function picture_list(){
$Picture= M('Picture');
$keyword=$this->_post('keyword');
$map['major'] = array('like binary','%'.$keyword.'%');
import('ORG.Util.Page');
$count  = $Picture->where($map)->count();
$Page       = new Page($count,10);
$show       = $Page->show();
$this->data = $Picture->where($map)->limit($Page->firstRow.','.$Page->listRows)->select();
$this->assign('page',$show);
$this->assign('keyword',$keyword);
$this->display('Index/info/picture_list'); 
}
/*图片管理表结束*/


/*成果图片表开始*/
public function achievement_add(){ 
   $this->display('Index/info/achievement_add');
}
//添加
public function achievementAdd(){
    $Achievement = M('Achievement');
	import('ORG.Net.UploadFile');
    $upload = new UploadFile();
	$upload->thumb = true;
    $upload->maxSize  = 3145728 ;
    $upload->allowExts  = array('jpg', 'png', 'jpeg');
    $upload->savePath =  './Public/fruit/';
	if(!$upload->upload()) {
        $this->error($upload->getErrorMsg());
    }else{
    $info = $upload->getUploadFileInfo();
    $data['savename'] = $info[0]['savename'];
	$data['savepath'] = $info[0]['savepath'];
	$data['size'] = $info[0]['size'];
	$data['time'] = date('Y-m-d');
    $Achievement->add($data);
    $this->redirect('achievement_list');
    }
}
//删除
public function achievementDelete($id=0){
     $Achievement = M('Achievement');
	 $tpc=$Achievement->select($id);
	 unlink('./Public/fruit/'.$tpc[0]['savename']);
     $Achievement->delete($id);
     $this->redirect('achievement_list');
}
//数据查询
public function achievement_list(){
$Achievement= M('Achievement');
import('ORG.Util.Page');
$count  = $Achievement->count();
$Page       = new Page($count,10);
$show       = $Page->show();
$this->data = $Achievement->where($map)->limit($Page->firstRow.','.$Page->listRows)->select();
$this->assign('page',$show);
$this->display('Index/info/achievement_list'); 
}
/*成果图片表结束*/
}
?>