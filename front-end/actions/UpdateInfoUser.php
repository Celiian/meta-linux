<?php
require_once __DIR__ . '/../db.php';
session_start();
$_SESSION['processUser'] = true; // FOR KEEP MODAL


// CHECK IF TYPE USERNAME IS GOOD
if (ctype_alnum($_POST['username'])) {
    // CHECK IF USERNAME IS NOT ALREADY USE
    $sql = 'SELECT * FROM user WHERE username = :username AND id != :id';
    $query = $db->prepare($sql);
    $query->execute([
        ':username' => $_POST["username"],
        ':id' => $_SESSION["user"]["id"]
    ]);
    $data = $query->fetch(PDO::FETCH_ASSOC);
    if(!$data){
        //CHECK IF EMAIL IS NOT ALREADY USE
        $sql = 'SELECT * FROM user WHERE email = :email AND id != :id';
        $query = $db->prepare($sql);
        $query->execute([
            ':email' => $_POST['email'],
            ':id' => $_SESSION["user"]["id"]
        ]);
        $mail = $query->fetch(PDO::FETCH_ASSOC);
        if (!$mail) {
            //CHECK IF AGE IS UP TO 13
            $dateBirth = explode("-", $_POST['dateBirth']);
            $newbirth = array_reverse($dateBirth);
            $yearsUser = HowOldAreYou($newbirth);
            if ($yearsUser > 13) {
                
            //SEND UPDATE DATA ON DB 
            $sql = 'UPDATE user set email =:email, username =:username ,birthday =:birthday,years=:years  WHERE id =:id ';
            $query = $db->prepare($sql);
            $query->execute([
                ':id'=> $_SESSION["user"]["id"],
                ':email' => $_POST['email'],
                ':username' => $_POST["username"],
                ':birthday' => $_POST['dateBirth'],
                ':years' => $yearsUser
            ]);
            //UPDATE DATA SESSION
            $_SESSION["user"]["email"]= $_POST['email'];
            $_SESSION["user"]["username"] =$_POST["username"];
            $_SESSION["user"]["birthday"] = $_POST['dateBirth'];
            $_SESSION["user"]["years"] = $yearsUser;
            //REMOVE PROCESS
            $_SESSION['processUser'] = false; // FOR KEEP MODAL
            $_SESSION['toastr'] = array(
                'type'      => 'success',
                'message' => 'Your account is update now.',
                'title'     => ''
            );
             header("Location: /index.php?name=Profile ");
            }else{
                $_SESSION['toastr'] = array(
                    'type'      => 'error',
                    'message' => 'Sorry access to Meta Tube is reserved to the person over 13 years.',
                    'title'     => ''
                );
                header("Location: /index.php?name=Profile ");
                }

        } else {
            

            
            $_SESSION['toastr'] = array(
                'type'      => 'error',
                'message' => 'This email is already use.',
                'title'     => ''
            );
            header("Location: /index.php?name=Profile ");
        }
    }else{
        
        $_SESSION['toastr'] = array(
            'type'      => 'error',
            'message' => 'Your username is already use.',
            'title'     => ''
        );
        header("Location: /index.php?name=Profile ");
    }
}else{
   
    header("Location: /index.php?name=Profile ");
    $_SESSION['toastr'] = array(
        'type'      => 'error',
        'message' => 'Your username is not valid',
        'title'     => ''
    );
}