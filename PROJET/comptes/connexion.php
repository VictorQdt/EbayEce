<?php

$login = isset($_POST["identifiant"]) ? $_POST["identifiant"] : "";
$pass = isset($_POST["mdp"]) ? $_POST["mdp"] : "";

$database = "ebayece";

$db_handle = mysqli_connect('127.0.0.1', 'root', 'root');
$db_found = mysqli_select_db($db_handle, $database);

if ($db_found)
{
    

    
    $sql = "SELECT pwd FROM vendeurs WHERE login='".$login."'";
    $req = mysqli_query($db_handle, $sql);
    $data = mysqli_fetch_assoc($req);

    if(!password_verify($pass, $data['pwd'])) {
        $sql = "SELECT pwd FROM acheteurs WHERE login='".$login."'";
        $req = mysqli_query($db_handle, $sql);
        $data = mysqli_fetch_assoc($req);
        if(!password_verify($pass, $data['pwd'])) {
            $sql = "SELECT pwd FROM admin WHERE login='".$login."'";
            $req = mysqli_query($db_handle, $sql);
            $data = mysqli_fetch_assoc($req);
            if($pass != $data['pwd']) {
            echo '<script language="Javascript"> document.location.replace("login.php?erreur=1"); </script>';
            exit;
            }else{
                session_start();
                $statut = "administrateur";
                $_SESSION['login'] = $login;
                $_SESSION['statut'] = $statut;
                echo '<script language="Javascript"> document.location.replace("../comptes/moncompte_admin.php"); </script>';
                exit;
            }
        }
        else {
            session_start();
            $statut = "acheteur";
            $_SESSION['login'] = $login;
            $_SESSION['statut'] = $statut;
            $sql = "SELECT * FROM acheteurs WHERE login='".$login."'";
            $req = mysqli_query($db_handle, $sql);
            $data = mysqli_fetch_assoc($req);
            $_SESSION['id'] = $data['IDAcheteur'];
            echo '<script language="Javascript"> document.location.replace("../comptes/moncompte_acheteur.php"); </script>';
            exit;
        }
    }
    else {
        session_start();
        $statut = "vendeur";
        $_SESSION['login'] = $login;
        $_SESSION['statut'] = $statut;
        $sql = "SELECT * FROM vendeurs WHERE login='".$login."'";
        $req = mysqli_query($db_handle, $sql);
        $data = mysqli_fetch_assoc($req);
        $_SESSION['avatar'] = $data['file_url'];
        $_SESSION['fond'] = $data['cover_url'];
        $_SESSION['id'] = $data['IDVendeur'];
        echo '<script language="Javascript"> document.location.replace("../comptes/moncompte_vendeur.php"); </script>';
        exit;
    }
}


?>