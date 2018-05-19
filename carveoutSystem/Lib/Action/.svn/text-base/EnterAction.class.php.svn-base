<?php
class EnterAction extends CommonAction{
public function home(){
    $this->display('Index/home');
}
public function greet(){
    $this->display('Index/greet');
}
public function users_update($id=0){ 
  
    $Users  = M('Users');
    $this->vo= $Users->find($id);

  $this->display('Index/users/users_update');
}
public function users_add($id=0){ 
   $this->display('Index/users/users_add');
}

//--添加
public function usersAdd(){
    $Users   =   M('Users');
     $Users->create();
// 把创建的数据对象写入数据库
$Users->add();
 $this->redirect('users_list');
}
//--查询所有
public function users_list(){
       $Users= M('Users');
//--模糊查询
$keyword=$this->_post('keyword');

// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
$map['username|name|password|usertype'] = array('like','%'.$keyword.'%');//需要模糊查询的字段
import('ORG.Util.Page');// 导入分页类
 $count  = $Users->where($map)->count();// 查询满足要求的总记录数
$Page       = new Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数
$show       = $Page->show();// 分页显示输出
// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
$this->data = $Users->where($map)->limit($Page->firstRow.','.$Page->listRows)->select();
$this->assign('page',$show);// 赋值分页输出
$this->assign('keyword',$keyword);
$this->display('Index/users/users_list'); // 输出模板
}

//--修改
public function usersUpdate(){
    $Users   =   M('Users');
    $Users->create();
    $Users->save();
    $this->redirect('users_list');
}
//--删除
public function usersDelete($id=0){
     $Users = M('Users');
     $Users->delete($id);
     $this->redirect('users_list');
}





//批量删除
public function users_batch(){
$id=$this->_post('gettext');
D("Users")->execute('DELETE FROM __TABLE__ where `id` IN ('.$id.')');
$this->redirect('users_list');
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
//查询学生用户未通过
public function inquirepupil(){
$Users= M('Users');
$keyword=$this->_post('keyword');
$map['usertype&pass'] =array(3,2,'_multi'=>true);
import('ORG.Util.Page');
$count  = $Users->where($map)->count();
$Page       = new Page($count,5);
$show       = $Page->show();
$this->data = $Users->where($map)->limit($Page->firstRow.','.$Page->listRows)->select();
$this->assign('page',$show);
$this->assign('keyword',$keyword);
$this->display('Index/users/users_list'); 
}

//查询企业用户未通过
public function inquirefirm(){
$Users= M('Users');
$keyword=$this->_post('keyword');
$map['usertype&pass'] =array(2,2,'_multi'=>true);
import('ORG.Util.Page');
$count  = $Users->where($map)->count();
$Page       = new Page($count,5);
$show       = $Page->show();
$this->data = $Users->where($map)->limit($Page->firstRow.','.$Page->listRows)->select();
$this->assign('page',$show);
$this->assign('keyword',$keyword);
$this->display('Index/users/users_list'); 
}
//设置通过
public function audit(){
	$Users   =   M('Users');
	$id = $this->_post('gettextid');
	$Users->where('id  in ('.$id.')')->data(array('pass'=>1))->save();
    $this->redirect('users_list');
}
//撤销通过
	public function noaudit(){
	$Users   =   M('Users');
	$id = $this->_post('nogettextid');
	$Users->where('id  in ('.$id.')')->data(array('pass'=>2))->save();
    $this->redirect('users_list');
}
	
}
?>