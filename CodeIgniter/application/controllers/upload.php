<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Upload extends CI_Controller
{
    function index()
    {
        $this->load->view('up');
    }

    function up2()
    {
        $config['upload_path'] = './';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '20000';
        $this->load->library("upload", $config);
        if ($this->upload->do_upload("upfile2")) {
            $data = array('upload_data' => $this->upload->data());
            var_dump($data);
        } else {
            $error = array('error' => $this->upload->display_errors());
            var_dump($error);
        }
    }

    function up()
    {
        if (!empty($_POST['sub'])) {
            $file = $_FILES['upfile'];
            if ($file['size'] >= 20000) {
                echo 'size no';
            } else {
                switch ($file['type']) {
                    case 'image/jpeg';
                        $hz = '.jpg';
                        break;
                    default;
                        $hz = false;
                        break;
                }

                if ($hz) {
                    move_uploaded_file($file['tmp_name'], "./logo{$hz}");
                } else {
                    echo 'type no';
                }
            }
        }
    }
}
