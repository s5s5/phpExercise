<?php
include('conn.php');
if (!empty($_POST['sub'])) {
    $u = trim($_POST['user']);
    $p = $_POST['pass'];

    $sql = "SELECT * FROM `user` WHERE `username` = '$u' && `passwd` = '$p'";
    $query = mysql_query($sql);
    $rs = mysql_fetch_array($query);
    if ($rs[0]) {
        $_SESSION['uid'] = $rs[0];
        echo "<script>alert('登录成功！');location.href = 'my.php';</script>";
    } else {
        echo "登录失败";
    }
//    print_r($rs);
}
?>
<form action="" method="post">
    user:<input type="text" name="user"><br>
    password:<input type="password" name="pass"><br>
    <input type="submit" name="sub" value="login">
</form>
<a href="weibo/">使用微博账号登陆</a>