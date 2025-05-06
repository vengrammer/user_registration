<?php
    function connection(){
        $db_host = 'localhost';
        $db_username = 'root';
        $db_password = '';
        $db_name = 'user_db';

        try{
            $conn = mysqli_connect(
                    $db_host,
                    $db_username,
                    $db_password,
                    $db_name);
            return $conn;
        }catch(mysqli_sql_exception){
            return null;
        }
    }
?>