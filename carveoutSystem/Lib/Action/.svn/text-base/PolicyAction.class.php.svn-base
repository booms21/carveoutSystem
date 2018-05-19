<?php
class PolicyAction extends CommonAction{
//显示模板，规范为下划线“_“分离
public function country_update($id=0){ 
  
    $Data  = M('Data');
    $this->vo= $Data->find($id);
  $this->display('Index/policy/country_update');
}
public function school_update($id=0){ 
  
    $Data  = M('Data');
    $this->vo= $Data->find($id);

  $this->display('Index/policy/school_update');
}
public function country_add(){ 
   $this->display('Index/policy/country_add');
}
public function school_add(){ 
   $this->display('Index/policy/school_add');
}
/***************************以下是操作方法，请遵守注释规范******************/
//--添加
public function countryAdd(){
  $Users   =   M('Data');
    $Users->create();
     $Users->time=date('Y-m-d');
     $Users->column='国家政策 ';
    $Users->add();
    $this->redirect('country_list');
}
public function schoolAdd(){
    $Users   =   M('Data');
    $Users->create();
     $Users->time=date('Y-m-d');
     $Users->column='学校措施 ';
    $Users->add();
    $this->redirect('school_list');
}
//--查询所有
public function country_list(){
       $Data= M('Data');
//--模糊查询
$keyword=$this->_post('keyword');

// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
$map['column']='国家政策';
$map['headline|newscontent|time|column'] = array('like binary','%'.$keyword.'%');
import('ORG.Util.Page');// 导入分页类
 $count  = $Data->where($map)->count();// 查询满足要求的总记录数
$Page       = new Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数
$show       = $Page->show();// 分页显示输出
// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
$this->data = $Data->where($map)->limit($Page->firstRow.','.$Page->listRows)->select();
$this->assign('page',$show);// 赋值分页输出
$this->assign('keyword',$keyword);
$this->display('Index/policy/country_list'); // 输出模板
}
public function school_list(){
       $Data= M('Data');
//--模糊查询
$keyword=$this->_post('keyword');

// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
$map['column']='学校措施';
$map['headline|newscontent|time|column'] = array('like binary','%'.$keyword.'%');
import('ORG.Util.Page');// 导入分页类
 $count  = $Data->where($map)->count();// 查询满足要求的总记录数
$Page       = new Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数
$show       = $Page->show();// 分页显示输出
// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
$this->data = $Data->where($map)->limit($Page->firstRow.','.$Page->listRows)->select();
$this->assign('page',$show);// 赋值分页输出
$this->assign('keyword',$keyword);
$this->display('Index/policy/school_list'); // 输出模板
}

//--修改
public function countryUpdate(){
    $Data   =   M('Data');
    $Data->create();
    $Data->save();
    $this->redirect('country_list');
}
public function schoolUpdate(){
    $Data   =   M('Data');
    $Data->create();
    $Data->save();
    $this->redirect('school_list');
}
//批量删除
public function countryDelete($id=0){
     $Data = M('Data');
     $Data->delete($id);
     $this->redirect('country_list');
}
public function schoolDelete($id=0){
     $Data = M('Data');
     $Data->delete($id);
     $this->redirect('school_list');
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