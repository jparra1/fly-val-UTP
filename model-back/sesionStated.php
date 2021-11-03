<?php
    session_start();
    if(count($_SESSION)!=0 && $_SESSION['estado']=='off'){
        session_destroy();
    }
    echo json_encode($_SESSION);
?>