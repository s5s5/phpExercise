<?php
include("../conn.php");
//print_r($_SESSION);
include_once('config.php');
include_once('saetv2.ex.class.php');
//==============
$sql = "SELECT * FROM `user` WHERE `weibo_key` = '" . $_SESSION['token']['access_token'] . "'";
$query = mysql_query($sql);
$rs = mysql_fetch_array($query);
if ($rs[0]) {
    $_SESSION['uid'] = $rs['id'];
    echo "<script>alert('登陆成功');location.href='../my.php'</script>";
} else {

    /*
      1、检测用户是否登录
      2、如果用户登录了，我们提示立刻绑定
      3、如果用户没有登录，提示用户登录或者注册一个新账号
    */

    if (!empty($_SESSION['uid'])) {
        $sql = "UPDATE `user` SET `weibo_key` = '" . $_SESSION['token']['access_token'] . "' WHERE `id` = '" . $_SESSION['uid'] . "'";
        mysql_query($sql);
        echo "绑定成功";

    } else {
        echo "请先<a href='../login.php'>登录</a>或者注册一个账号";
    }


}

if (!empty($_POST['sub'])) {
    $sql = "INSERT INTO `user` SET `id` = null , `username` = '" . $_POST['u'] . "' , `passwd` = '" . md5($_POST['p']) . "', `weibo_key` = '" . $_POST['w'] . "', `name` = '测试'";
    mysql_query($sql);
    echo "您在该网站成功注册并绑定了一个账号";

}

//==============

$c = new SaeTClientV2(WB_AKEY, WB_SKEY, $_SESSION['token']['access_token']);
$ms = $c->home_timeline(); // done
$uid_get = $c->get_uid();
$uid = $uid_get['uid'];
$user_message = $c->show_user_by_id($uid); //根据ID获取用户等基本信息

?>
<form action="" method="post">
    用户<input type="text" name='u'><br> 密码<input type="text" name='p'><br>
    <input type="hidden" name="w" value="<?php echo $_SESSION['token']['access_token']; ?>">
    <input type="submit" name="sub" value="注册并绑定">
</form>







