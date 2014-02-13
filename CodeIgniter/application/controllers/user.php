<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller
{
    function insert()
    {
        $this->load->model('test_m');
        $arr = array('uname' => 'u2', 'upass' => '1234');
        $this->test_m->user_insert($arr);
    }

    function update()
    {
        $this->load->model('test_m');
        $arr = array('uname' => 'u2', 'upass' => '4651234');
        $this->test_m->user_update(1, $arr);
    }

    function del()
    {
        $this->load->model('test_m');
        $this->test_m->user_del(1);
    }

    function select()
    {
        $this->load->model('test_m');
        $user = $this->test_m->user_select(2);
//        print_r($user);
//        var_dump($user);
        foreach ($user[0] as $i) {
            echo $i . '<br>';
        }
    }

}
