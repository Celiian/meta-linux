<?php
require_once __DIR__ . '/../db.php';
session_start();
$res = $_POST;

//SELECT USER FROM DB WITH EMAIL
$sql = 'SELECT * FROM user WHERE email = :username';
$query = $db->prepare($sql);
$query->execute([
    ':username' => $res["username"],
]);
$data = $query->fetch(PDO::FETCH_ASSOC);

//CHECK IF INPUT NOT EMPTY
if (!empty($_POST['username']) && !empty($_POST['password'])) {
    //HASH PASSWORD
    $password = hash('sha256', $_POST['password']);
    //CHECK IF EMAIL AND PASSWORD ARE CORRECT
    if ($res["username"] == $data["email"] && $password == $data["password"]) {
        //GIVE DATA SESSION USER
        $_SESSION['user'] = $data;
        $_SESSION['connect'] = true;
        //TOASTR
        $_SESSION['toastr'] = array(
            'type'      => 'success',
            'message' => "Welcome, {$data['username']}",
            'title'     => ''
        );
        if (isset($_SESSION['lastPage'])) {
            header("Location: /" . $_SESSION['lastPage']);
        } else {
            header("Location: /index.php?name=Home");
        }
    } else {
        //CHECK IF EMAIL EXIST
        if ($res["username"] != $data["email"]) {
            $_SESSION['toastr'] = array(
                'type'      => 'error',
                'message' => "This email account doesn't exist",
                'title'     => ''
            );
            //$_SESSION['signup_error']= $enJson['form']['error']['signup'];
            if (isset($_SESSION['lastPage'])) {
                header("Location: /" . $_SESSION['lastPage']);
            } else {
                header("Location: /index.php?name=Home");
            };
        } else {
            //CHECK IF PASSWORD IS CORRECT
            $_SESSION['toastr'] = array(
                'type'      => 'error',
                'message' => "Warning password wrong",
                'title'     => ''
            );

            //$_SESSION['signup_error']= $enJson['form']['error']['password'];
            header("Location: /index.php?name=Login ");
        }
    }
} else {
    header("Location: /index.php?name=Login ");
}