<?php
    
//CONNECT TO MYSQL DATABASE USING MYSQLI
 
            $servername = 'localhost';
            $username = 'root';
            $password = '';
            $database = 'youcodescrumboard';
            // établit la connexion
            $conn = mysqli_connect($servername, $username, $password,$database);
            //vérifie la connexion

            if(!$conn){ 
                die('Erreur : ' .mysqli_connect_error()); 
            }
           
 // 
 $sql = "SELECT t.id, t.priority_id, t.type_id  ,t.title,t.status_id , p.name as periority, s.name as status, tp.name as type, t.task_datetime,t.descreption 
                    FROM tasks t
                    INNER JOIN priorities p ON t.priority_id = p.id 
                    INNER JOIN statuses s ON s.id = t.status_id 
                    INNER JOIN types tp on tp.id = t.type_id"       ;

$result = mysqli_query($conn,$sql);


?>