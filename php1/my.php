<?php
include('conn.php');
if (!empty($_SESSION['uid'])) {
    $sql = "SELECT * FROM `user` WHERE `id` = '" . $_SESSION['uid'] . "'";
    $query = mysql_query($sql);
    $rs = mysql_fetch_array($query);
    echo "欢迎" . $rs['username'] . "，登录成功！<br> 你叫做：" . $rs['name'];

    if ($rs['weibo_key']) {
        echo "你以绑定微博账号，以后可以使用微博账号登录";
    } else {
        echo "是否要绑定微博账号<a href='weibo/index.php'>我要绑定</a>";
    }
} else {
    echo "登录失败，请重新<a href='login.php'>登录</a>";
}
?>

