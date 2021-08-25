<?php  include_once "../base.php";
// print_r($_POST);
if(isset($_POST['del'])){
  foreach ($_POST['del'] as $id) {
    $Mem->del($id);
  }
}

to("../backend.php?do=acc");