<?php

Class CommonAction extends Action{
	public function _initialize(){
		if(!isset($_SESSION['administrator'])){ 
			$this->redirect('Index/index');
			}
		}
   function _empty(){
        header("HTTP/1.0 404 Not Found");//使HTTP返回404状态码
        $this->display("Index/404");
    }
	}
     

?>