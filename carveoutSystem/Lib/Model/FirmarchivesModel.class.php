<?php
  class FirmarchivesModel extends Model{
  protected $_validate = array(
  array('phone','number','��ϵ�绰��д���淶',2),
  array('email','email','�����ʼ���д���淶',2),
  );
}
?>