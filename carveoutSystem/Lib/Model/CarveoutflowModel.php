<?php
  class DataModel extends Model{
  protected $_validate = array(
  array('headline','require','���������'),
  array('headline','','�Ѵ�����ͬ�������֣�',0,'unique',1), 
  );
}
?>