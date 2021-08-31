<?php include_once "../base.php";

$que=$Que->find($_POST['id']);
$que['sh']=$_POST['sh'];
$Que->save($que);