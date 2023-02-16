<?php
require_once __DIR__ . '/../db.php';
session_start();
$old_password =  $_SESSION['user']['password']; // OLD PASSWORD
$id = $_SESSION['user']['id']; // ID USER
$_SESSION['process'] = 'password'; // PROCESS FOR KEEP THE MODAL PASSWORD


//CHECK IF ALL INPUT HAVE VALUE
if(!empty($_POST['password']) || !empty($_POST['new-password']) || !empty($_POST['confirm-password'])){
    $password = hash('sha256',$_POST['old-password']);
    $new_password = hash('sha256',$_POST['new-password']);
    $confirm_password = hash('sha256',$_POST['confirm-password']);
    // CHECK IF OLD PASSWORD IS CORRECT
    if($password == $old_password){
        // CHECK IF NEW PASSWORD ARE SIMILAR
        if($new_password == $confirm_password){
            // UPTADE IN DATABASE 
            if($new_password != $old_password){
            $sql = 'UPDATE user SET password = :password WHERE id = :id';
            $query = $db->prepare($sql);
            $query->execute([
	            ":password" => $new_password,
                ":id" => $id
            ]);
            //TOASTR
            $_SESSION['toastr'] = array(
                'type'      => 'success', 
                'message' => 'Your password as be changed',
                'title'     => ''
            );
            //CHANGE PASSWORD IN SESSION
            $_SESSION['user']['password'] = $new_password;
            //FINISH PROCESS
            $_SESSION['process'] = '';
            header("Location: /index.php?name=Profile ");
        }else{
            $_SESSION['toastr'] = array(
                'type'      => 'error', 
                'message' => 'New password is similar to old',
                'title'     => ''
            );
        }
        }else{
            $_SESSION['toastr'] = array(
                'type'      => 'error', 
                'message' => 'Password is not similar',
                'title'     => ''
            );
        }
    }else{
        $_SESSION['toastr'] = array(
            'type'      => 'error', 
            'message' => 'Your old password is incorrect',
            'title'     => ''
        );
    }
}

header("Location: /index.php?name=Profile ");