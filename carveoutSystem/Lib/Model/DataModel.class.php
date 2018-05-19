<?php
  class DataModel extends Model{
  protected $_validate = array(
  array('headline','require','标题必须填'),
  array('headline','','已存在相同标题文字！',0,'unique',1), 
  );
}
?>
