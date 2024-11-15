<?php
defined("BASEPATH") or exit("No direct script access allowed");

class UserModel extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Adding data using the api in database
    public function AddUserDataModel($userdata)
    {
        return $this->db->insert("newapitable", $userdata);
    }


    public function GetUserDataModel()
    {
        return $this->db->get("newapitable")->result();
    }


    function DeleteUserModel($id)
    {
        $this->db->where("id", $id);
        return $this->db->delete("newapitable");
    }
}

?>