<?php

    include "../config.php";

    session_start();

    $form_data = json_decode(file_get_contents("php://input"));
    $type = $form_data->stype;

    if ($type == 'loginData') {
        loginData();
    }

    function loginData()
    {
        global $form_data, $conn;
        $validation_error = '';
        $message = '';

        if (empty($form_data->email)) {
            $error[] = 'Email is Required';
        } 
        else {
            if (!filter_var($form_data->email, FILTER_VALIDATE_EMAIL)) {
                $error[] = 'Invalid Email Format';
            } 
            else {
                $data[':email'] = $form_data->email;
            }
        }

        if (empty($form_data->password)) {
            $error[] = 'Password is Required';
        }

        if (empty($error)) {
            $query = "SELECT * FROM `users_data` WHERE email = :email";
            $statement = $conn->prepare($query);
            if ($statement->execute($data)) {
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                if ($statement->rowCount() > 0) {
                    foreach ($result as $row) {
                        // echo '<pre>';print_r($row['password']); 
                        // die('<br>'.__FILE__.' line no. '.__LINE__);
                        if (password_verify($form_data->password, $row["password"])) {  
                            $_SESSION["name"] = $row["name"];
                            $output = [
                                'status' => 200,
                                'message' => 'login Completed'
                            ];
                         
                        } else {
                            $output = [
                                'status' => 401,
                                'message' => 'Unauthorized, Please Check your Password'
                            ];
                        }
                    }
                } else {
                    
                    $validation_error = 'Wrong Email';
                }
                
            }
        } else {
            $validation_error = implode(", ", $error);
            $output = array(
                'error'  => $validation_error,
                'message' => $message
            );
        }

        echo json_encode($output);
    }

    // if(!isset( $_SESSION['name'] ) || (time() - $_SESSION['name']) > 600) {

    //     session_destroy();

    //     echo "-1";

    // } else {

    //     echo "1";

    // }


    ?>