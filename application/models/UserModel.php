<?php
defined("BASEPATH") or exit("No direct script access allowed");

class UserModel extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        // Load Database library
    }

    // Adding model data using the api in database
    public function AddUserDataModel($userdata)
    {
        return $this->db->insert("newapitable", $userdata);
    }


    // Get User data Model 
    public function GetUserDataModel()
    {
        return $this->db->get("newapitable")->result();
    }


    // Delete User model 
    function DeleteUserModel($id)
    {
        $this->db->where("id", $id);
        return $this->db->delete("newapitable");
    }


    // Get data Model From database by id

    function GetUserById($id)
    {
        $this->db->where("id", $id);
        return $this->db->get("newapitable")->row();
    }

    function UpdateUser($userdata, $id)
    {
        $this->db->where("id", $id);
        return $this->db->update("newapitable", $userdata);
    }
}

?>