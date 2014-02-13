<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Hello extends CI_Controller
{
    function sayhello($name, $name2)
    { // ???????
        echo $name . ' and ' . $name2 . 'hello world!';
    }

    function show()
    {
        $name = "s5s5";
        $count = file_get_contents('./num.txt');
        $count = $count ? $count : 0; // ???????????
        $count++;

        $re = fopen('./num.txt', 'w');
        fwrite($re, $count);
        fclose($re);

        $arr = array('a' => 'a', 'b' => 'b');
        $data = array('v_name' => $name, 'v_count' => $count, 'v_array' => $arr);

        $this->load->view('test_view', $data);
        $this->load->view('test_view_foot');
    }
}
