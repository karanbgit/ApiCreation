<?php

defined("BASEPATH") or ("No Direct Script Access Allowed");
class Creation extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('UserModel');
    }

}
?>