<?php
if (!file_exists('num.txt')) {
  // 随机创建一个数字
  $num = random_int(0, 100);
  file_put_contents('num.txt', $num);
} else {
  $saved_num = (int)file_get_contents('num.txt');
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $postd_num = (int)$_POST['num'];
    $res = $postd_num - $saved_num;
    if ($res === 0) {
      $message = '猜对了';
      unlink('num.txt');
    } elseif ($res > 0) {
      $message = '太大了';
    } else {
      $message = '太小了';
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>猜数字</title>
  <style>
    body {
      padding: 100px 0;
      background-color: #2b3b49;
      color: #fff;
      text-align: center;
      font-size: 2.5em;
    }
    input {
      padding: 5px 20px;
      height: 50px;
      background-color: #3b4b59;
      border: 1px solid #c0c0c0;
      box-sizing: border-box;
      color: #fff;
      font-size: 20px;
    }
    button {
      padding: 5px 20px;
      height: 50px;
      font-size: 16px;
    }
  </style>
</head>
<body>
  <h1>猜数字游戏</h1>
  <p>Hi，我已经准备了一个 0 - 100 的数字，你需要在仅有的 10 机会之内猜对它。</p>
  <?php if (isset($message)): ?>
  <p><?php echo $message; ?></p>
  <?php endif ?>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <input type="number" min="0" max="100" name="num" placeholder="随便猜">
    <button type="submit">试一试</button>
  </form>
</body>
</html>
