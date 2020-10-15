<?php
    session_start();
    if(isset($_SESSION['admin_user_id'])){
        echo"<script>location.href='main.php';</script>";
    }else{
        echo"<script>location.href='login.php';</script>";
    }
?>