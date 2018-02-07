<?php
    include($_SERVER['DOCUMENT_ROOT']."/api/v1/db.php");

    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        
        if(isset($_GET['crop_id'])){
            $sql = "SELECT * from crops where crop_id = '".$_GET['crop_id']."'";
            $crops = mysqli_query($conn, $sql);
            if ($crops) {
                if (mysqli_num_rows($crops) > 0) {
                    foreach ($crops as $key => $crop) {
                
                        header('Content-Type: application/json');
                                echo json_encode($crop);
                                http_response_code(200);



                    }
                }else{http_response_code(404);}
                //  Server Failed
            }else{http_response_code(500);}
            //
       
        }else if (isset($_GET['user_id'])) {

            $sql = "SELECT * from crops where user_id = '".$_GET['user_id']."'";
            $crops = mysqli_query($conn, $sql);
            if ($crops) {
                if (mysqli_num_rows($crops) > 0) {
                    foreach ($crops as $key => $crop) {
                
                       $object[] = $crop; 


                    }

                     header('Content-Type: application/json');
                                echo json_encode($object);
                                http_response_code(200);

                }else{http_response_code(404);}
                //  Server Failed
            }else{http_response_code(500);}

           
        

        }else{


            $sql = "SELECT * from crops";
            $crops = mysqli_query($conn, $sql);
            if ($crops) {
                if (mysqli_num_rows($crops) > 0) {
                    foreach ($crops as $key => $crop) {
                
                       $object[] = $crop; 


                    }

                     header('Content-Type: application/json');
                                echo json_encode($object);
                                http_response_code(200);

                }else{http_response_code(404);}
                //  Server Failed
            }else{http_response_code(500);}


}
       


    }else if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if (isset($_GET['action']) && $_GET['action'] == 'insert') {
            

    $cropName = mysqli_real_escape_string($conn, $_POST['crop_name']);
    $cropPrice = mysqli_real_escape_string($conn, $_POST['crop_price']);
    $cropDescription = mysqli_real_escape_string($conn, $_POST['crop_description']);
    $cropLocation = mysqli_real_escape_string($conn, $_POST['crop_location']);
    $userid = mysqli_real_escape_string($conn, $_POST['user_id']);
    $longitude = mysqli_real_escape_string($conn, $_POST['longitude']);
    $latitude = mysqli_real_escape_string($conn, $_POST['latitude']);


   
    
    //Error Handler
    
    if (empty($cropName) ){
        
       http_response_code(400);
        
    }else {
                if (is_uploaded_file($_FILES['image']['tmp_name'])) {
                    $target_dir = $_SERVER['DOCUMENT_ROOT']."/uploads/crops/cropimage";
                    if (!file_exists($target_dir)) {
                        mkdir($_SERVER['DOCUMENT_ROOT']."/uploads/crops/cropimage");
                    }

                

                    $allowed_file_types = array('jpg', 'JPG');
                    $FileType = pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION);
                    if(!in_array($FileType, $allowed_file_types)) {
                        exit(http_response_code(415));
                    }
                    $newFileName = uniqid('', true).'.'.$FileType;
                    $target_file = $target_dir.'/'.$newFileName;
                    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file) or exit(http_response_code(500));
                
                }

                if (is_uploaded_file($_FILES['video']['tmp_name'])) {
                    $target_dir = $_SERVER['DOCUMENT_ROOT']."/uploads/crops/cropvideo";
                    if (!file_exists($target_dir)) {
                        mkdir($_SERVER['DOCUMENT_ROOT']."/uploads/crops/cropvideo");
                    }

                
                    $allowed_file_types = array('mp4');
                    $FileType = pathinfo($_FILES['video']['name'],PATHINFO_EXTENSION);
                    if(!in_array($FileType, $allowed_file_types)) {
                        exit(http_response_code(415));
                    }
                    $newVideoName = uniqid('', true).'.'.$FileType;
                    $target_file = $target_dir.'/'.$newVideoName;
                    move_uploaded_file($_FILES["video"]["tmp_name"], $target_file) or exit(http_response_code(500));
                
                }
                  

                if (is_uploaded_file($_FILES['audio']['tmp_name'])) {
                    $target_dir = $_SERVER['DOCUMENT_ROOT']."/uploads/crops/cropaudio";
                    if (!file_exists($target_dir)) {
                        mkdir($_SERVER['DOCUMENT_ROOT']."/uploads/crops/cropaudio");
                    }

                
                    $allowed_file_types = array('ogg');
                    $FileType = pathinfo($_FILES['audio']['name'],PATHINFO_EXTENSION);
                    if(!in_array($FileType, $allowed_file_types)) {
                        exit(http_response_code(415));
                    }
                    $newAudioName = uniqid('', true).'.'.$FileType;
                    $target_file = $target_dir.'/'.$newAudioName;
                    move_uploaded_file($_FILES["audio"]["tmp_name"], $target_file) or exit(http_response_code(500));
                
                }

                //insert user into database
                
                $sql = "INSERT INTO crops (crop_name, crop_price, crop_description, crop_location, user_id, latitude, longitude, imageLink, videoLink, audioLink) VALUES ('$cropName', '$cropPrice', '$cropDescription', '$cropLocation', '$userid', '$longitude', '$latitude', '$newFileName', '$newVideoName', '$newAudioName');";
                
                
                $insert = mysqli_query($conn, $sql);

                if($insert){
                    http_response_code(200);

                }else{

                    http_response_code(500);
                }

                
               
                
            }


        }else if(isset($_GET['action']) && $_GET['action'] == 'update'){

            $crop_id = $_GET['crop_id'];
            $cropName = mysqli_real_escape_string($conn, $_POST['crop_name']);
            $cropPrice = mysqli_real_escape_string($conn, $_POST['crop_price']);
            $cropDescription = mysqli_real_escape_string($conn, $_POST['crop_description']);
            $cropLocation = mysqli_real_escape_string($conn, $_POST['crop_location']);
            $longitude = mysqli_real_escape_string($conn, $_POST['longitude']);
            $latitude = mysqli_real_escape_string($conn, $_POST['latitude']);



            $sql = "UPDATE `crops` SET `crop_name`= '$cropName',`crop_price`= '$cropPrice',`crop_description`= '$cropDescription',`crop_location`= '$cropLocation', `longitude`= '$longitude',`latitude`= '$latitude' WHERE `crop_id` = '$crop_id'";

                 $insert = mysqli_query($conn, $sql);

                if($insert){
                    http_response_code(200);

                }else{

                    http_response_code(500);
                }




        }
    }else if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {


        $crop_id = $_GET['crop_id'];

        $sql = "DELETE FROM `crops` WHERE crop_id = '$crop_id' ";

          $insert = mysqli_query($conn, $sql);

                if($insert){
                    http_response_code(200);

                }else{

                    http_response_code(500);
                }

        
    }else{ http_response_code(405); }    

?>