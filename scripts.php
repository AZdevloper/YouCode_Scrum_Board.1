<?php

    //INCLUDE DATABASE FILE
    include('database.php');
    

    //ROUTING
    if(isset($_POST['save']))        saveTask();
    if(isset($_POST['update']))      updateTask();
    // if(isset($_POST['update']))      updateTask();
    if(isset($_GET['id']))      deleteTask();
    // if(isset($_GET['upid']))      $stor_index = $_GET['upid'];;

    
function getTasks($task_status)
     { 
        
    //SESSSION IS A WAY TO STORE DATA TO BE USED ACROSS MULTIPLE PAGES
    
      
        global $result;
        //CODE HERE
        
      foreach($result as $row){
           
                $title = $row['title'];
                $id = $row['id'];
                $date =$row['task_datetime'] ;
                $description =$row['descreption'];
                $priority = $row['periority'];
                $type =$row['type']; 
                $status =$row['status'] ; 

                if(  $status == 'To Do' ){
                    $icon = '<i class="  fs-25px text-danger-900 p-5px fa-regular fa-circle-question "></i> ';
                }elseif ( $status  == 'In progress' ) {
                   $icon = '  <i class="m-1 text-danger-100  fs-30px spinner-border"></i>  ';
                }elseif ($status  == 'Done') {
                   $icon = '   <i class="fas fs-25px fa-chevron-circle-down fa-1x text-success p-2"></i>';
                }
               
            
        if ($task_status  == 'To_Do' &&  $status == 'To Do' || $status  == 'In progress' && $task_status == "in_progress" || $status  == 'Done' && $task_status == 'Done' ) {
            
                 
                    echo ' 
                <button class="d-flex  text-start mb-1 rounded-3 p-0 " id="'.$id.'" draggable="true">
                    
                    <div class="icon">
                    '.$icon.'
                    </div>
                
                    <div class="Title">
                        <div data="'.$title.'" id="title'.$id.'" class="fw-800">'.$title.'</div>
                
                        <div class="date and descreption">
                            <div class="fw-100" data="'.$date.'" id="date'.$id.'">#'.$id.' created in '.$date.'</div>
                            <div class="fw-600" id="description'.$id.'" title="'.$description.'">'.$description.'</div>
                        </div>
                        <i class="bi bi-pencil-square"></i>
                    
                        <div class="priority and type">
                                <span class="btn btn-primary fs-10px py-3px m-1 fw-800 rounded-pill" data="'.$row['priority_id'].'" id="priority'.$id.'" >'.$priority.' </span>
                                <span class="btn btn-secondary fs-10px py-3px m-1 fw-800 rounded-pill " datastatus="'.$row['status_id'].'" data="'.$row['type_id'].'" id="type'.$id.'" >'.$type.'</span>
                
                                <div class=" mx-4 d-inline-block   ">

                                    <a onclick="update('.$id.')" data-bs-toggle="modal" href="#modal-task"> 
                                        <i class=" mx-3 fs-19px   fa fa-edit  "    style="color: green; "  ></i> 
                                    </a>
                                    <a href="scripts.php?id='.$id.'" > 
                                        <i class=" fs-19px fa  fa-trash  "  style="color: red;" > </i> 
                                    </a>
                                
                                </div>
                        
                        </div>
                    </div>
            
            </button>';
        

        } 


                }
    }




function saveTask()
        {include('database.php');
            
            $title = $_POST["title"];
            $type = $_POST["task-type"];
            $Priority = $_POST["Priority"];
            $Status = $_POST["Status"];
            $date = $_POST["Date"];
            $description = $_POST["Description"];
            

    if (empty($type) || empty( $title ) ||empty($Priority) || empty($Status) ||empty($date) || empty($description) ) {
        $_SESSION['form_vide_message'] = "pleas fill all the form !";
    }else{


            
    $sql = "INSERT INTO tasks ( title, type_id, priority_id, status_id, task_datetime, descreption)"
            ." VALUES ('$title','$type','$Priority','$Status','$date','$description')";

    $result = mysqli_query($conn,$sql);


    if (!$result) {
        $_SESSION['message'] = "Task did not  added !";
        header('location: index.php');
        
    }else {

        $_SESSION['message'] = "Task has been added successfully !";
        header('location: index.php');
    }
        

            
    }        
        }











function updateTask()
    { 
    include('database.php');

   

    if(isset($_POST['update']))  $id = $_POST['input-hidden'];
    $title = $_POST["title"];
    $type = $_POST["task-type"];
    $Priority = $_POST["Priority"];
    $Status = $_POST["Status"];
    $date = $_POST["Date"];
    $description = $_POST["Description"];
   
    

    if (empty($type) || empty( $title ) ||empty($Priority) || empty($Status) ||empty($date) || empty($description) ) {
    $_SESSION['form_vide_message'] = "pleas fill all the form !";
    }else{


        
 
        $sql ="    UPDATE `tasks` SET `title`='$title',`type_id`='$type',`priority_id`='$Priority',`status_id`='$Status',
                        `task_datetime`='$date',`descreption`='$description',`id`='$id' WHERE id = $id";
 
    $result = mysqli_query($conn,$sql);


    if (!$result) {
    $_SESSION['message'] = "Task did not  updated !";
    header('location: index.php');

    }else {

    $_SESSION['message'] = "Task has been updated successfully !";
    header('location: index.php');
    }


        
    }   
   
}


function deleteTask()


{     include('database.php');
    $id = $_GET['id'];
    //CODE HERE
   $sql = "  DELETE FROM `tasks` WHERE id = $id";
   $result = mysqli_query($conn,$sql);

   if (!$result){

    $_SESSION['message'] = "Task did not  deleted!";

        header('location: index.php');}

    else {
        $_SESSION['message'] = "Task has been deleted successfully!";
        header('location: index.php');
    }
}

?>