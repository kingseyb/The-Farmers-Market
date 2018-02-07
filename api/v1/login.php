<?php
    
    require_once($_SERVER['DOCUMENT_ROOT']."/api/v1/db.php");

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        $sql = "SELECT * FROM users WHERE email = '$email'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {

            foreach ($result as $key => $value) {

                if (password_verify($password, $value['password'])) {

                    header('Content-Type: application/json');
                    echo json_encode($value);
                    http_response_code(200);

                }else{http_response_code(401);}

            }

        }else{http_response_code(404);}

    }else{http_response_code(405);}
?>