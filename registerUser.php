<?php
    include_once("config.inc.php");
    $return = new stdClass;
        $return->error = '';

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if(!empty($_POST) && (!empty($_POST['name']))){

                    $name = $_POST['name'];
                    $company = $_POST['company'];
                    $phone = $_POST['phone'];
                    $msj = $_POST['msj'];
                    

                    if($_POST['name'] != ""){
                        $name = $_POST['name'];
                    }

                    if($_POST['company'] != ""){
                        $company = $_POST['company'];
                    }

                    if($_POST['phone'] != ""){
                        $telephone = $_POST['phone'];
                    }

                    if($_POST['msj'] != ""){
                        $message = $_POST['msj'];
                    }

                    $mail = $_POST['mail'];

                    /*$userInfo = array(
                        "name"=>$name,
                        "mail"=>$mail,
                        "company"=>$company,
                        "phone"=>$phone,
                        "msj"=>$msj
                    );*/

                    $mysqli = mysqli_init();
                    if (@$mysqli) {
                        if (@$mysqli->options(MYSQLI_OPT_CONNECT_TIMEOUT, 5)) {
                            if (@$mysqli->real_connect($_dbHost, $_dbUser, $_dbPass, $_dbBase, $_dbPort)){
                                if ($stmt = $mysqli->prepare("INSERT INTO register (name, company, mail, telephone, message) VALUES (?, ?, ?, ?, ?)")){
                                    $stmt->bind_param("sssss", $name, $company, $mail, $telephone, $message);
                                    if (!$stmt->execute()) {
                                     $return->error = 'Invalid data';
                                    }else{
                                        $return->response = "1";
                                    }
                                }
                                $mysqli->close();
                            } else {
                                $return->error = 'Invalid data';
                            }
                        } else {
                            $return->error = 'Invalid data';
                        }
                    } else {
                        $return->error = 'Invalid data';
                    }

                    //$support = new connector_EntitySupport();
                    //$result = $support->save($userInfo,"Register");
                    
                    echo json_encode($return);
                    
                }
            }else{
                $return->error = 'Invalid data';
                echo json_encode($return);
            }
        
?>