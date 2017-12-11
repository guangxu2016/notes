<?php
if (count($_FILES)) {
  echo '<pre>';
  var_dump($_FILES);
  echo '</pre>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>登录</title>
</head>
<body>
  <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
<!-- 最终只会提交选中的那一项的 value -->
<input type="radio" name="gender" value="male">
<input type="radio" name="gender" value="female">
<!-- 没有设置 value 的 checkbox 选中提交的 value 是 on -->
<input type="checkbox" name="agree">
<!-- 设置了 value 的 checkbox 选中提交的是 value 值 -->
<input type="checkbox" name="agree" value="true">

<input type="checkbox" name="funs[]" id="" value="football">
<input type="checkbox" name="funs[]" id="" value="basketball">
<input type="checkbox" name="funs[]" id="" value="world peace">

<select name="subject">
  <!-- 设置 value 提交 value -->
  <option value="1">语文</option>
  <!-- 没有设置 value 提交 innerText -->
  <option>数学</option>
</select>
<br>

<input type="file" name="avatar" id="">
    <button type="submit">登录</button>
  </form>
</body>
</html>
