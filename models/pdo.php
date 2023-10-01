<?php
        $dns='mysql:host=localhost;dbname=app-exam';
        $user = 'root';
        $password='';
        $pdo=new PDO($dns,$user,$password,[
            PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_OBJ
                ]);
