<?php

include_once "../config.php";


class signup extends db
{
    public function __construct()
    {
        parent::__construct();
     
        $form_data = json_decode(file_get_contents("php://input"));
        $type = $form_data->stype;

        if ($type == 'saveData') {
            $this->saveData();
        }
        if ($type == 'getData') {
            $this->getData();
        }

        if ($type == 'fetchData') {
            $this->fetchData();
        }
        if ($type == 'editData') {
            $this->editData();
        }
        if ($type == 'deleteData') {
            $this->deleteData();
        }
    }

   public function saveData()
    {
        global $form_data, $conn;
        $message = '';
        $validation_error = '';
        if (empty($form_data->name)) {
            $error[] = 'Name is Required';
        } else {
            $data[':name'] = $form_data->name;
        }

        if (empty($form_data->email)) {
            $error[] = 'Email is Required';
        } else {
            if (!filter_var($form_data->email, FILTER_VALIDATE_EMAIL)) {
                $error[] = 'Invalid Email Format';
            } else {
                $data[':email'] = $form_data->email;
            }
        }

        if (empty($form_data->password)) {
            $error[] = 'Password is Required';
        } else {
            $data[':password'] = password_hash($form_data->password, PASSWORD_DEFAULT);
        }

        if (empty($form_data->phone)) {
            $error[] = 'Phone no. is Required';
        } else {
            $data[':phone'] = ($form_data->phone);
        }

        if (empty($error)) {
            $query = "INSERT INTO `users_data` (name, email, password, phone) VALUES (:name, :email, :password,:phone)";
            $statement = $this->conn->prepare($query);
            if ($statement->execute($data)) {
                $output = [
                    'status' => 200,
                    'message' => 'Registration Completed'
                ];
            }
        } else {
            $validation_error = implode(", ", $error);
            $output = array(
                'error'  => $validation_error,
                // 'message' => $message
            );
        }



        echo json_encode($output);
    }

 public function getData()
    {
        global $conn;
        $user_data = $this->conn->prepare("SELECT * FROM `users_data` ORDER BY `id` desc");
        $user_data->execute();
        $result = $user_data->fetchAll();
        // print_r($result);
        echo json_encode($result);
    }


   public function fetchData()
    {
        global $form_data, $conn;
        $id = $form_data->id;
        $query = "SELECT * FROM `users_data` WHERE id= $id";
        $user_data = $this->conn->prepare($query);
        $user_data->execute();
        $result = $user_data->fetchAll();
        foreach ($result as $row) {
            $output['name'] = $row['name'];
            $output['email'] = $row['email'];
            $output['password'] = '';
            $output['phone'] = $row['phone'];
        }
        echo json_encode($output);
    }

   public function editData()
    {
        global $form_data, $conn;
        // echo "<pre>";
        // print_r($form_data);
        // die();
        $data = [
            ':name' => $form_data->form_value->name,
            ':email' => $form_data->form_value->email,
            ':password' => $form_data->form_value->password,
            ':phone' => $form_data->form_value->phone,
            ':id' => $form_data->id
        ];
        $query = "UPDATE `users_data` SET name = :name, email = :email, password = :password, phone = :phone 
    WHERE id = :id";
        $statement = $this->conn->prepare($query);
        if ($statement->execute($data)) {
            $output = [
                'status' => 200,
                'message' => 'Registration Updated'
               
            ];
        }

        echo json_encode($output);
    }


  public function deleteData()
    {
        global $conn, $form_data;
        $query = "DELETE FROM `users_data` WHERE id='" . $form_data->id . "'";
        $statement = $this->conn->prepare($query);
        if ($statement->execute()) {
            $output = [
                'status' => 200,
                'message' => "User's Data has been deleted"
            ];
        }

        echo json_encode($output);
    }

    public function __destruct() {
    }
}
