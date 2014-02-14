<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{
    function index()
    {
        $this->load->view('login');
    }

    function checklogin()
    {
        $this->load->model('test_m');
        $user = $this->test_m->user_select2($_POST['uname']);
        if ($user) {
//            var_dump($user);
            if ($user[0]->upass == $_POST['upass']) {
                echo '密码正确';
                $this->load->library('session');
                $arr = array('uid' => $user[0]->uid);
                $this->session->set_userdata($arr);
                echo '<br>';
                echo $this->session->userdata('uid');
            } else {
                echo '密码不正确';
            }
        } else {
            echo '用户不存在';
        }
    }

    function checksession()
    {
        $this->load->library('session');
        if ($this->session->userdata('uid')) {
            echo '已经登录';
        } else {
            echo '没登录';
        }
    }

    function loginout()
    {
        $this->load->library('session');
        $this->session->unset_userdata('uid');
    }
}
