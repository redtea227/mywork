<fieldset style="width: 80%;margin: auto;">
  <legend>新增問卷</legend>
  <form action="api/admin_que.php" method="post">
    <div style="display:flex">
      <div class="clo" style="width: 40%;">問卷名稱</div>
      <div style="width: 60%;">
        <input type="text" name="subject" style="width:95%">
      </div>
    </div>
    <div id="options">
      選項<input type="text" name="opts[]" style="width:80%">
      <input type="button" value="更多" onclick="more()">
    </div>
    <div>
      <input type="submit" value="新增">
      <input type="reset" value="清空">
    </div>
  </form>
</fieldset>
<script>
  function more() {
    let opt = `
    選項<input type="text" name="opts[]" style="width:80%"><br>
    `
    $("#options").prepend(opt)
  }
</script>

<fieldset style="width: 80%;margin: auto;">
  <legend>問卷列表</legend>
  <table>
    <tr>
      <td class="clo">問卷名稱</td>
      <td class="clo" width="10%">投票數</td>
      <td class="clo" width="10%">開放</td>
    </tr>
    <?php
    $ques = $Que->all(['parent' => 0]);
    foreach ($ques as $key => $value) {
    ?>
      <tr>
        <td><?= $key + 1 . '. ' . $value['text']; ?></td>
        <td><?= $value['vote']; ?></td>
        <td>
          <!-- <button onclick="sh('<?=($value['sh'] == 1)?'open':'close';?>',<?=$value['id'];?>)"><?=($value['sh'] == 1)?'開放':'關閉';?></button> -->
          <?php
          if ($value['sh'] == 1) {
            echo "<button onclick=sh('open',{$value['id']})>";
            echo "開放";
            echo "</button>";
          } else {
            echo "<button onclick=sh('close',{$value['id']})>";
            echo "關閉";
            echo "</button>";
          }
          ?>
        </td>
      </tr>
    <?php
    } ?>
  </table>
</fieldset>
<script>
  function sh(action, id) {
    let sh = (action == 'open') ? 0 : 1;
    $.post("api/show.php", {
      id,
      sh
    }, () => {
      location.reload()
    })
  }
</script>