<?php
    $path_controller = $_SERVER['DOCUMENT_ROOT'] . '/proy_navid/ProyectoGio/';
    // include($path . "module/user/model/DAOUser.php");
    
    include ($path_controller . "module/sing_in/model/DAOuser.php");

    // include ("module/sing_in/model/DAOuser.php");

    // echo "<script>console.log( 'op: " . $_GET['op'] . "' );</script>";

    switch($_GET['op']){



        case 'list';
            try{
                $daouser = new DAOUser();
                $rdo = $daouser->select_all_user();
            }catch (Exception $e){
                $callback = 'index.php?page=503';
                die('<script>window.location.href="'.$callback .'";</script>');
            }
            
            if(!$rdo){
                $callback = 'index.php?page=503';
                die('<script>window.location.href="'.$callback .'";</script>');
            }else{
                include("module/sing_in/view/list_user/list_sing_in.php");
            }
            break;
            


        case 'create';

            if (isset($_GET['check'])){
                
                try{
                    $daouser = new DAOUser();
                    $rdo = $daouser->insert_user($_SESSION['user']);
                }catch (Exception $e){
                    $callback = 'index.php?page=503';
                    die('<script>window.location.href="'.$callback .'";</script>');
                }
                
                if($rdo){
                    echo '<script language="javascript">alert("Registrado en la base de datos correctamente")</script>';
                    $callback = 'index.php?page=sing_in&op=list';
                    die('<script>window.location.href="'.$callback .'";</script>');
                }else{
                    $callback = 'index.php?page=503';
                    die('<script>window.location.href="'.$callback .'";</script>');
                }
            }

            include("module/sing_in/view/createUpdate_user/view/create_user.php");
            break;
          


        case 'update';
            
            if (isset($_GET['id'])) {
                # code...
                try{
                    $daouser = new DAOUser();
                    $rdo = $daouser->select_user($_GET['id']);
                    $user=get_object_vars($rdo);
                   // $_SESSION['user_update']=$user
                }catch (Exception $e){
                    $callback = 'index.php?page=503';
                    die('<script>window.location.href="'.$callback .'";</script>');
                }
                
                if(!$rdo){
                    $callback = 'index.php?page=503';
                    die('<script>window.location.href="'.$callback .'";</script>');
                }else{
                    include("module/sing_in/view/createUpdate_user/view/update_user.php");
                }
            }


            if (isset($_GET['check'])){
                
                try{
                    $daouser = new DAOUser();
                    $rdo = $daouser->update_user($_SESSION['user']);
                }catch (Exception $e){
                    $callback = 'index.php?page=503';
                    die('<script>window.location.href="'.$callback .'";</script>');
                }
                
                if($rdo){
                    echo '<script language="javascript">alert("actualizado")</script>';
                    $callback = 'index.php?page=sing_in&op=list';
                    die('<script>window.location.href="'.$callback .'";</script>');
                }else{
                    $callback = 'index.php?page=503';
                    die('<script>window.location.href="'.$callback .'";</script>');
                }
            }

            break;
            





        case 'read';

        $user=$_GET['modal'];
            try{
                // $daouser = new DAOUser();
                // $rdo = $daouser->select_user();

        // echo "<script>console.log( 'modal: " . $_GET['modal'] . $user. "' );</script>";
                $daouser = new DAOUser();
                $rdo = $daouser->select_user($user);
                
             }catch (Exception $e){
                //echo "<script>console.log( 'catch: " . $rdo . "' );</script>";
                echo json_encode("error");
                exit;
            }

            if(!$rdo){
                //echo "<script>console.log( 'rdo: " . $rdo . "' );</script>";
                echo json_encode("error");
                exit;
            }else{
                $user=get_object_vars($rdo);
        //         echo "<script>console.log( 'catch: " . $user['cmpy'] . "' );</script>";
        // exit;
                echo json_encode($user);
                //echo json_encode("error");
                exit;
            }
            break;




            
        case 'delete';

            if (isset($_GET['modal'])) {
                $user=$_GET['modal'];
                $_SESSION['userToDelete']=$user;
                // echo $_SESSION['userToDelete'];
                // exit;
                try{
                    $daouser = new DAOUser();
                    $rdo = $daouser->select_user($user);
                    
                 }catch (Exception $e){
                    echo json_encode("error");
                    exit;
                }

                if(!$rdo){
                    echo json_encode("error");
                    exit;
                }else{
                    $user=get_object_vars($rdo);
                    echo json_encode($user);
                    exit;
                }
                break;
            }elseif (isset($_GET['answer'])) {
                $answer=$_GET['answer'];

                try{
                    $daouser = new DAOUser();
                    $rdo = $daouser->delete_user($answer);
                    
                 }catch (Exception $e){
                    echo json_encode("error");
                    exit;
                }

                if(!$rdo){
                    echo json_encode("error");
                    exit;
                }else{
                    $rt="succes";
                    echo json_encode($rt);
                    exit;
                }
                break;
            }
            
        default;
            include("view/inc/error404.php");
            break;
    }




