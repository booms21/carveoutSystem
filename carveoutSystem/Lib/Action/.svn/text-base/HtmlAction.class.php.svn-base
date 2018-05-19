<?php
class HtmlAction extends Action{
//空就跳转404页面
function _empty(){
header("HTTP/1.0 404 Not Found");//使HTTP返回404状态码
$this->display("Index/404");
}
//通用文章查询
public function data_html($id=0){
$Data = M("Data");
$condition['id'] = $id;
$this->data = $Data->where($condition)->select(); 
$Recruit= M('Recruit');
import('ORG.Util.Page');
$map['column']='新闻';
$counta  = $Data->where($map)->count();
$Pagea       = new Page($counta,11);
$this->dataxw = $Data->where($map)->limit($Pagea->firstRow.','.$Pagea->listRows)->select();
$countb  = $Recruit->count();
$Pageb       = new Page($countb,11);
$this->datazp = $Recruit->where($map)->limit($Pageb->firstRow.','.$Pageb->listRows)->select();
$this->display('Index/html/data_html'); 
	}
//招聘文章查询
public function recitem_html($id=0){
$Recruit = M("Recruit");
$Data= M('Data');
$condition['id'] = $id;
$this->data = $Recruit->where($condition)->select(); 
import('ORG.Util.Page');
$map['column']='新闻';
$counta  = $Data->where($map)->count();
$Pagea       = new Page($counta,11);
$this->dataxw = $Data->where($map)->limit($Pagea->firstRow.','.$Pagea->listRows)->select();
$map['column']='创业案例';
$counta  = $Data->where($map)->count();
$Pagea       = new Page($counta,11);
$this->datazp = $Data->where($map)->limit($Pagea->firstRow.','.$Pagea->listRows)->select();
$this->assign('price','招聘信息');
$this->display('Index/html/recitem_html'); 
	}
//项目文章查询
public function recitembi_html($id=0){
$Project = M("Project");
$Data= M('Data');
$condition['id'] = $id;
$this->data = $Project->where($condition)->select(); 
import('ORG.Util.Page');
$map['column']='新闻';
$counta  = $Data->where($map)->count();
$Pagea       = new Page($counta,11);
$this->dataxw = $Data->where($map)->limit($Pagea->firstRow.','.$Pagea->listRows)->select();
$map['column']='创业案例';
$counta  = $Data->where($map)->count();
$Pagea       = new Page($counta,11);
$this->datazp = $Data->where($map)->limit($Pagea->firstRow.','.$Pagea->listRows)->select();
$this->assign('price','招聘信息');
$this->display('Index/html/recitem_html'); 
	}
//流程文章查询
public function work_html($id=0){
$Work = M("Work");
$Data= M('Data');
$condition['id'] = $id;
$this->data = $Work->where($condition)->select(); 
import('ORG.Util.Page');
$map['column']='新闻';
$counta  = $Data->where($map)->count();
$Pagea       = new Page($counta,11);
$this->dataxw = $Data->where($map)->limit($Pagea->firstRow.','.$Pagea->listRows)->select();
$map['column']='创业案例';
$counta  = $Data->where($map)->count();
$Pagea       = new Page($counta,11);
$this->datazp = $Data->where($map)->limit($Pagea->firstRow.','.$Pagea->listRows)->select();
$this->assign('price','办事流程');
$this->display('Index/html/work_html');
	}
//岗位文章查询
public function station_html($id=0){
$Station = M("Station");
$Data= M('Data');
$condition['id'] = $id;
$this->data = $Station->where($condition)->select(); 
import('ORG.Util.Page');
$map['column']='新闻';
$counta  = $Data->where($map)->count();
$Pagea       = new Page($counta,11);
$this->dataxw = $Data->where($map)->limit($Pagea->firstRow.','.$Pagea->listRows)->select();
$map['column']='创业案例';
$counta  = $Data->where($map)->count();
$Pagea       = new Page($counta,11);
$this->datazp = $Data->where($map)->limit($Pagea->firstRow.','.$Pagea->listRows)->select();
$this->assign('price','办事流程');
$this->display('Index/html/station_html'); 
	}
//跳转查看自荐书页面
public function sell_essay($id=0){
    $Selloneself = M("Selloneself");
    $condition['id'] = $id;
    $this->data = $Selloneself->where($condition)->select(); 
	$this->assign('price','自荐书');
	$this->display('Index/subpage/sell_essay');
}


}
?>