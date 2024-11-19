<?php

defined("BASEPATH") or ("No Direct Script Access Allowed");
class Creation extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('UserModel');
        // Load Model 
    }


    // Add users from form API Creation
    public function AddUser()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $formdata = $this->input->post();

            $config['upload_path'] = 'uploads/';
            $config['allowed_types'] = 'jpg|JPG|jpeg|JPEG|png|PNG|gif|GIF';
            $config['max_size'] = 51200; // 50 MB in KB
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            $data = []; // Initialize an array to hold the response data

            // Check if a file is uploaded

            if (isset($_FILES["image"])) {
                if (!$this->upload->do_upload('image')) {
                    $data['error'] = $this->upload->display_errors();
                    print_r($data);
                } else {
                    $data['upload_data'] = $this->upload->data();
                    $formdata['image'] = $data['upload_data']['file_name'];
                }
            }
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


    // Get user data form database through the API Creation
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


    // Delete Operation using API Creation
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


    // Get Data function by ID using API Creation

    public function GetUserById($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $event = $this->UserModel->GetUserById($id);

            if ($event != null) {
                $this->output->set_status_header(200);
                $response = array("status" => "success", "data" => $event, "message" => "Data fetched successfully");
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


    public function UpdateUser($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $formdata = $this->input->post();



            $config['upload_path'] = 'uploads/';
            $config['allowed_types'] = 'jpg|JPG|jpeg|JPEG|png|PNG|gif|GIF';
            $config['max_size'] = 51200; // 50 MB in KB
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            $data = []; // Initialize an array to hold the response data

            // Check if a file is uploaded

            if (isset($_FILES["image"])) {
                if (!$this->upload->do_upload('image')) {
                    $data['error'] = $this->upload->display_errors();
                    print_r($data);
                } else {
                    $data['upload_data'] = $this->upload->data();
                    $formdata['image'] = $data['upload_data']['file_name'];
                }
            }



            $event = $this->UserModel->UpdateUser($formdata, $id);

            if ($event != null) {
                $this->output->set_status_header(200);
                $response = array("status" => "success", "message" => "Data updated successfully");
            } else {
                $this->output->set_status_header(404);
                $response = array("status" => "error", "message" => "Data not updated");
            }
        } else {
            $this->output->set_status_header(405);

            $response = array("status" => "error", "message" => "Bad Request");
        }
        $this->output->set_content_type("application/json")->set_output(json_encode($response));
    }
}
?>