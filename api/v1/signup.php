
<?php
     require_once($_SERVER['DOCUMENT_ROOT']."/api/v1/db.php");

    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        
       

    }else if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if (isset($_GET['action']) && $_GET['action'] == 'insert') {

                $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
                $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
                $email = mysqli_real_escape_string($conn, $_POST['email']);
                $numberp = mysqli_real_escape_string($conn, $_POST['numberp']);
                $password = mysqli_real_escape_string($conn, $_POST['password']);
                $type = mysqli_real_escape_string($conn, $_POST['type']);






    
    if (empty($firstname) || empty($lastname) || empty($email) || empty($numberp) || empty($password) || empty($type) ){
        
        header("location: ../signup.php?signup=empty");
        exit();
        
    } else {
        
        //Checking input characters are valid
        if (!preg_match("/^[a-zA-Z]*$/", $firstname) || !preg_match("/^[a-zA-Z]*$/", $lastname) )  {
            
             header("location: ../signup.php?signup=invalid");
             exit();
         

        }else {
            //check if email is valid
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                
             header("location: ../signup.php?signup=email");
             exit();
                
            } else {
                //Hashing Pawword
                $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                
                //insert user into database
                
                $sql = "INSERT INTO users (firstname, lastname, email, numberp, password, type) VALUES ('$firstname', '$lastname', '$email', '$numberp', '$hashedPwd', '$type');";
                
                $insert = mysqli_query($conn, $sql);

                if($insert){
                    http_response_code(200);

                }else{

                    http_response_code(500);
                }
                
            }
            
            
            
        }
    }




            
        }else if(isset($_GET['action']) && $_GET['action'] == 'update'){

        }
    }else if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
        
    }else{ http_response_code(405); }    

?>