<?php

defined("BASEPATH") or ("No Direct Script Access Allowed");
class Creation extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('UserModel');
    }



    public function AddUser()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $formdata = $this->input->post();
            $event = $this->UserModel->AddUserDataModel($formdata);

            if ($event != null) {
                $this->output->set_status_header(200);
                $response = array("status" => "success", "message" => "Data added successfully");
            } else {
                $this->output->set_status_header(404);
                $response = array("status" => "error", "message" => "Data not added");
            }
        } else {
            $this->output->set_status_header(405);

            $response = array("status" => "error", "message" => "Bad Request");
        }
        $this->output->set_content_type("application/json")->set_output(json_encode($response));
    }



    public function GetUserData()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $event = $this->UserModel->GetUserDataModel();

            if ($event != null) {
                $this->output->set_status_header(200);
                $response = array("status" => "success", "data" => $event, "message" => "data fetched successfully");
            } else {
                $this->output->set_status_header(404);
                $response = array("status" => "error", "message" => "Data not fetched");
            }
        } else {
            $this->output->set_status_header(405);

            $response = array("status" => "error", "message" => "Bad Request");
        }
        $this->output->set_content_type("application/json")->set_output(json_encode($response));
    }



    public function DeleteUserData($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $event = $this->UserModel->DeleteUserModel($id);

            if ($event != null) {
                $this->output->set_status_header(200);
                $response = array("status" => "success", "message" => "Data deleted successfully");
            } else {
                $this->output->set_status_header(404);
                $response = array("status" => "error", "message" => "Data not deleted");
            }
        } else {
            $this->output->set_status_header(405);

            $response = array("status" => "error", "message" => "Bad Request");
        }
        $this->output->set_content_type("application/json")->set_output(json_encode($response));

    }
}
?>