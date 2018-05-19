<?php
class JoinusAction extends CommonAction{
//显示模板，规范为下划线“_“分离
public function project_update($id=0){ 
  
    $Users  = M('Project');
    $this->vo= $Users->find($id);

  $this->display('Index/Joinus/project_update');
}
public function recruitment_update($id=0){ 
  
    $Users  = M('Recruit');
    $this->vo= $Users->find($id);

  $this->display('Index/Joinus/recruitment_update');
}
public function project_add(){ 
   $this->display('Index/Joinus/project_add');
}
public function recruitment_add(){ 
   $this->display('Index/Joinus/recruitment_add');
}

/***************************以下是操作方法，请遵守注释规范******************/

public function projectAdd(){
  $Users   =   M('Project');
    $Users->create();
     $Users->time=date('Y-m-d');
    $Users->add();
    $this->redirect('project_list');
}
//--添加
public function recruitmentAdd(){
       $Users   =   M('Recruit');
    $Users->create();
     $Users->time=date('Y-m-d');
    $Users->add();
    $this->redirect('recruitment_list');

   }
//--查询所有
public function recruitment_list(){
       $Recruit= M('Recruit');
//--模糊查询
$keyword=$this->_post('keyword');

// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
$map['headline|content|time|issuename'] = array('like binary','%'.$keyword.'%');//需要模糊查询的字段
import('ORG.Util.Page');// 导入分页类
 $count  = $Recruit->where($map)->count();// 查询满足要求的总记录数
$Page       = new Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数
$show       = $Page->show();// 分页显示输出
// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
$this->data = $Recruit->where($map)->limit($Page->firstRow.','.$Page->listRows)->select();
$this->assign('page',$show);// 赋值分页输出
$this->assign('keyword',$keyword);
$this->display('Index/Joinus/recruitment_list'); // 输出模板
}
public function project_list(){
       $Project= M('Project');
//--模糊查询
$keyword=$this->_post('keyword');

// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
$map['headline|content|time|issuename'] = array('like','%'.$keyword.'%');//需要模糊查询的字段
import('ORG.Util.Page');// 导入分页类
 $count  = $Project->where($map)->count();// 查询满足要求的总记录数
$Page       = new Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数
$show       = $Page->show();// 分页显示输出
// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
$this->data = $Project->where($map)->limit($Page->firstRow.','.$Page->listRows)->select();
$this->assign('page',$show);// 赋值分页输出
$this->assign('keyword',$keyword);
$this->display('Index/Joinus/project_list'); // 输出模板
}

//--修改
public function projectUpdate(){
    $Users   =   M('Project');
    $Users->create();
    $Users->save();
    $this->redirect('project_list');
}
public function recruitmentUpdate(){
    $Users   =   M('Recruit');
    $Users->create();
    $Users->save();
    $this->redirect('recruitment_list');
}
//批量删除
public function projectDelete($id=0){
     $selloneself = M('Project');
     $selloneself->delete($id);
     $this->redirect('project_list');
}
public function recruitmentDelete($id=0){
     $selloneself = M('Recruit');
     $selloneself->delete($id);
     $this->redirect('recruitment_list');
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