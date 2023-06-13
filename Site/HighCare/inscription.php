<?php
    require_once 'database.php';
    if (isset($_POST['pseudo']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password_retype'])){
            $pseudo=htmlspecialchars($_POST['pseudo']);
            $email=htmlspecialchars($_POST['email']);
            $password=htmlspecialchars($_POST['password']);
            $password_retype=htmlspecialchars($_POST['password_retype']);

            $check=$bdd->prepare('SELECT pseudo, email,password FROM utilisateurs WHERE email=?'); //on insère dans la base de donnée
            $check->execute(array($email));
            $data=$check->fetch();
            $row=$check->rowCount();

            if($row==0){
                if(strlen($pseudo)<=100){
                    if(strlen($email)<=100){
                            if($password==$password_retype){
                                $password=hash('sha256',$password);
                                $ip=$_SERVER['REMOTE_ADDR'];
                                $insert=$bdd->prepare('INSERT INTO utilisateurs(pseudo,email,password, ip, admin) VALUES(:pseudo,:email,:password, :ip, 0)'); //c'est pour prévenir l'utilisateur dans le cas ou il y a une connection avec une autre ip
                                $insert->execute(array(
                                    'pseudo'=>$pseudo,
                                    'email'=>$email,
                                    'password'=>$password,
                                    'ip'=>$ip
                                ));
                                //on redirige avec le message de succès
                                header ('Location:page_inscription.php?reg_err=success');
                            }else header ('Location:page_inscription.php?reg_err=password');
                    }else header ('Location:page_inscription.php?reg_err=email_length');
                }else header ('Location:page_inscription.php?reg_err=pseudo_length');
            }else header ('Location:page_inscription.php?reg_err=already');
    }
    
    ?>