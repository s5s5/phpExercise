<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Page extends CI_Controller
{
    function useradd()
    {
        $this->load->model('test_m');
        for ($i = 4; $i <= 100; $i++) {
            $name = 'u' . $i;
            $arr = array('uname' => $name, 'upass' => '1234');
            $this->test_m->user_insert($arr);
        }
    }

    function pagelist($id)
    {
        $this->load->model('test_m');
        $user = $this->test_m->user_select_all();
//        var_dump($user);
        $pageall = count($user);
        $pagenum = 10;

        $config['total_rows'] = $pageall;
        $config['per_page'] = $pagenum;
        $config['num_links'] = 3;
        $config['base_url'] = '/index.php/page/pagelist';
        $config['use_page_numbers'] = true;

        $this->load->library('pagination');
        $this->pagination->initialize($config);
        echo $this->pagination->create_links();

        echo '<br>';
        $id = $id ? $id : 1;
        $start = ($id - 1) * $pagenum;
        $list = $this->test_m->user_select_limit($start, $pagenum);
        foreach ($list as $item) {
            echo $item->uname . '<br>';
        }
    }
}
