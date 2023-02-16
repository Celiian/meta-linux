<?php
require_once __DIR__ . '/../db.php';
session_start();

$id = giveId(); //GET ID
$email = $_POST['email']; // GET MAIL
// HASH PASSWORD
$password = hash('sha256', $_POST['password']);

//CHECK IF ALL INPUT HAVE VALUE
if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['dateBirth']) && !empty($_POST['email'])) {
    // CHECK IF TYPE OF USERNAME IS VALID
    if (ctype_alnum($_POST['username'])) {
        //CHECK IF USERNAME IS NOT ALREADY USE
        $sql = 'SELECT * FROM user WHERE username = :username ';
        $query = $db->prepare($sql);
        $query->execute([
            ':username' => $_POST["username"],
        ]);
        $dataUser = $query->fetch(PDO::FETCH_ASSOC);
        if (!$dataUser['username']) {
            // CHECK THE DATEBIRTH AND GET YEARS WITH FUNCTION
            $dateBirth = explode("-", $_POST['dateBirth']);
            $newbirth = array_reverse($dateBirth);
            $yearsUser = HowOldAreYou($newbirth);
            if ($yearsUser > 13) {
                //CHECK IS EMAIL IS NOT ALREADY USE
                $sql = 'SELECT * FROM user WHERE email = :email ';
                $query = $db->prepare($sql);

                $query->execute([
                    ':email' => $email,
                ]);
                $data = $query->fetch(PDO::FETCH_ASSOC);
                if (!$data) {
                    // CHECK IF AVATARE HAVE VALUE ELSE GET DEFAULT AVATAR
                    if (!empty($_FILES['avatar']['tmp_name'])) {
                        $tmpName = $_FILES['avatar']['tmp_name'];
                        $imgData = base64_encode(file_get_contents($tmpName));
                    } else {
                        $imgData = "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";
                    }
                    // INSERT DATA REGISTER IN TABLE USER 
                    $sql = 'INSERT INTO user(id,email, username, password, profilePicture, birthday,years) VALUES (:id,:email, :pseudo, :password, :photoProfil, :dateBirth,:years)';
                    $query = $db->prepare($sql);
                    $query->execute([
                        ':id' => $id,
                        ':email' => $email,
                        ':pseudo' => $_POST['username'],
                        ':password' => $password,
                        ':photoProfil' => $imgData,
                        ':dateBirth' => $_POST['dateBirth'],
                        ':years' => $yearsUser
                    ]);

                    // TOASTR SUCCESS
                    $_SESSION['toastr'] = array(
                        'type'      => 'success',
                        'message' => 'Your accompte as be created',
                        'title'     => ''
                    );

                    header("Location: /index.php?name=Login");
                } else {
                    $_SESSION['toastr'] = array(
                        'type'      => 'error',
                        'message' => 'Your email is already use.',
                        'title'     => ''
                    );
                    header("Location: /index.php?name=Register");
                }
            } else {
                // TOASTR ERROR
                $_SESSION['toastr'] = array(
                    'type'      => 'error',
                    'message' => 'Sorry access to MetaTube is reserved to the person over 13 years.',
                    'title'     => ''
                );
                header("Location: /index.php?name=Register ");
            }
        } else {
            // TOASTR ERROR
            $_SESSION['toastr'] = array(
                'type'      => 'error',
                'message' => 'This username is already use.',
                'title'     => ''
            );
            header("Location: /index.php?name=Register ");
        }
    } else {
        // TOASTR ERROR
        $_SESSION['toastr'] = array(
            'type'      => 'error',
            'message' => 'Your unsername is not respect the alphanumeric characters.',
            'title'     => ''
        );

        header("Location: index.php?name=Register ");
    }
} else {
    $_SESSION['toastr'] = array(
        'type'      => 'error',
        'message' => 'Your unsername is not respect the alphanumeric characters.',
        'title'     => ''
    );
    header("Location: /index.php?name=Register ");
}