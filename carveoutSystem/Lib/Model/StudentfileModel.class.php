<?php
  class StudentfileModel extends Model{
  protected $_validate = array(
  array('age','number','������д���淶',2),
  array('phone','number','��ϵ�绰��д���淶',2),
  array('email','email','�����ʼ���д���淶',2),
  );
}
?>