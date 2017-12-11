<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // 表单提交回来了
  // 接收用户输入
  if (empty($_POST['username']) || empty($_POST['password'])) {
    // 表单填写不完整
    echo '会不会玩';
  } else if (empty($_POST['agree']) || $_POST['agree'] !== 'on') {
    echo '不同意不行';
  } else {
    $new = $_POST['username'] . '|' . $_POST['password'];
    file_put_contents('users.txt', $new . "n", FILE_APPEND);
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>注册用户</title>
</head>
<body>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <table>
      <tr>
        <td>用户名</td>
        <td><input type="text" name="username"></td>
      </tr>
      <tr>
        <td>密码</td>
        <td><input type="password" name="password"></td>
      </tr>
      <tr>
        <td>同意注册协议</td>
        <td><input type="checkbox" name="agree"></td>
      </tr>
      <tr>
        <td></td>
        <td><button type="submit">注册</button></td>
      </tr>
    </table>
  </form>
</body>
</html>
