<?php
include 'model-back/ApiRest.php';
    date_default_timezone_set("UTC");
    header("Access-control-Allow-Origin: *");

        if($_SERVER['REQUEST_METHOD']=='POST'){
            header("HTTP/1.1 200 OK");
            $md5pass=md5($_POST['password_usuario']);
            $query="SELECT * FROM usuarios WHERE email_usuario='".$_POST['email_usuario']."' AND password_usuario ='".$md5pass."'";
            $resultado=methodGET($query);
            $info=$resultado->fetch(PDO::FETCH_ASSOC);
            if($info){
                if(!session_status()){
                    session_destroy();
                }else{
                    session_start();
                    $_SESSION['estado']='inlogin';
                    $_SESSION['id_usuario']=$info["id_usuario"];
                    $_SESSION['nombre_usuario']=$info["nombre_usuario"];
                    $_SESSION['email']=$_POST['email_usuario'];
                    $_SESSION['pass']=$info['password_usuario'];
                    $_SESSION['date_ingreso']=date('l jS \of F Y')."UTC:".time();;
                    echo json_encode($_SESSION);
                }
            }else{
                echo json_decode(array("estado"=>"error"));
            }
                exit();
        }
    header("HTTP/1.1 400 Bad Request");
?>