
<?php
@session_start();
 $path_controller = $_SERVER['DOCUMENT_ROOT'] . '/proy_navid/ProyectoGio/';
    
    
    include ($path_controller . "module/homepage/model/DAOProducts.php");

     
     if (!isset($_GET['homepage'])) {
         try{
                $daouser = new DAOUser();
                $rdo = $daouser->select_all_products();
            }catch (Exception $e){
                $callback = 'index.php?page=503';
                die('<script>window.location.href="'.$callback .'";</script>');
            }
            
            if(!$rdo){
                $callback = 'index.php?page=503';
                die('<script>window.location.href="'.$callback .'";</script>');
            }else{
                
                include("module/homepage/view/homepage.php");
            }
             
     }else{

         switch ($_GET['homepage']) {

             case 'search':
                if (isset($_POST['data_location'])) {
                    $locationJSON = json_decode($_POST["data_location"], true);//convierte en un array asociativo
                    $daoproduct = new DAOUser();
                    $rdo = $daoproduct->search($locationJSON);
                    
                    $user = array();
                    //$usuario= array();
                    
                    // while($row = $rdo->fetch_assoc()){
                    //     $usuario['user'] = $row['user_name'];
                    //     $usuario['title'] = $row['title'];
                    //     $usuario['city'] = $row['city'];
                    //     // $user['"'.$row['user_name'].'"']=$usuario;
                    //     // $usuario['product'] = $row['title'];
                    //     array_push($user, $usuario);
                    // }
                    // echo json_encode($user);//pasa el array que viene de DAO

                     while($row = $rdo->fetch_assoc()){                                                
                        $usuario = array(
                            'user' => $row['user_name'],
                            'title' => $row['title'],
                            'city' => $row['city']
                        );
                        array_push($user, $usuario);
                    }
                    echo json_encode($user);//pasa el array que viene de DAO
                    exit;
                }else{
                    echo "string";
                    exit;
                }
                 // echo $_POST['word_wrotten'];
                 break;

            case 'btn_search':
                if (isset($_POST['data'])) {
                    $locationJSON = json_decode($_POST["data"], true);//convierte en un array asociativo
                    $daoproduct = new DAOUser();
                    $rdo = $daoproduct->search($locationJSON);
                    
                    $user = array();
                    //$usuario= array();
                    
                    // while($row = $rdo->fetch_assoc()){
                    //     $usuario['user'] = $row['user_name'];
                    //     $usuario['title'] = $row['title'];
                    //     $usuario['city'] = $row['city'];
                    //     // $user['"'.$row['user_name'].'"']=$usuario;
                    //     // $usuario['product'] = $row['title'];
                    //     array_push($user, $usuario);
                    // }
                    // echo json_encode($user);//pasa el array que viene de DAO

                     while($row = $rdo->fetch_assoc()){                                                
                        $usuario = array(
                            'user' => $row['user_name'],
                            'title' => $row['title'],
                            'phone' => $row['phone'],
                            'email' => $row['email'],
                            'product_type' => $row['product_type'],
                            'avatar' => $row['avatar'],
                            'date' => $row['date_today'],
                            'city' => $row['city']
                        );
                        array_push($user, $usuario);
                        $_SESSION['productos'] = $user;
                    }
                    echo json_encode($user);//pasa el array que viene de DAO
                    exit;
                }elseif ($draw="products" ) {
                    // echo $_SESSION['productos'][1]['phone'];
                    echo json_encode($_SESSION['productos']);
                    exit;
                }
                 // echo $_POST['word_wrotten'];
                 break;
             
             default:
                 try{
                    $daoproduct = new DAOUser();
                    $rdo = $daoproduct->select_all_products();
                }catch (Exception $e){
                    $callback = 'index.php?page=503';
                    die('<script>window.location.href="'.$callback .'";</script>');
                }
                
                if(!$rdo){
                    $callback = 'index.php?page=503';
                    die('<script>window.location.href="'.$callback .'";</script>');
                }else{
                    
                    include("module/homepage/view/homepage.php");
                }
                break;
                
         }
     }

     // }
?>
