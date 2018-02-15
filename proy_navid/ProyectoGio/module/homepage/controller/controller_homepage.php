
<?php
@session_start();
 $path_controller = $_SERVER['DOCUMENT_ROOT'] . '/proy_navid/ProyectoGio/';
    
    
    include ($path_controller . "module/homepage/model/DAOProducts.php");

     
     if (!isset($_GET['homepage'])) {
         try{
                $daouser = new DAOProducts();
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
                    $daoproduct = new DAOProducts();
                    $rdo = $daoproduct->Search($locationJSON);
                    
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
    //            function send_mailgun($email){
    //     $config = array();
    //     $config['api_key'] = "key-4af7c020fe32b5c88c0c034adafc5378"; //API Key
    //     $config['api_url'] = "https://api.mailgun.net/v2/sandbox4c1cb4d3fb9146438f1411d073994e1d.mailgun.org/messages"; //API Base URL

    //     $message = array();
    //     $message['from'] = "giogio@gmail.com";
    //     $message['to'] = $email;
    //     $message['h:Reply-To'] = "giogio@gmail.com";
    //     $message['subject'] = "Hello, this is a test";
    //     $message['html'] = '<strong>knfgkjnkjdbfgkjb</strong>Hello ' . $email . ',</br></br> This is a test</br><div><img src="http://www.coordinadora.com/wp-content/uploads/sidebar_usuario-corporativo.png" alt="">
            
    //     </div>';
     
    //     $ch = curl_init();
    //     curl_setopt($ch, CURLOPT_URL, $config['api_url']);
    //     curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    //     curl_setopt($ch, CURLOPT_USERPWD, "api:{$config['api_key']}");
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    //     curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
    //     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    //     curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    //     curl_setopt($ch, CURLOPT_POST, true); 
    //     curl_setopt($ch, CURLOPT_POSTFIELDS,$message);
    //     $result = curl_exec($ch);
    //     curl_close($ch);
    //     return $result;
    // }
    
    // $jjjson = send_mailgun('gmc.yanez@gmail.com');

                    $data_prod = json_decode($_POST["data_prod"], true);//convierte en un array asociativo
            
                    $daoproduct = new DAOProducts();
                    $rdo = $daoproduct->Search($data_prod);
                    
                    $All_productos = array();
                    
                     while($row = $rdo->fetch_assoc()){                                                
                        $producto = array(
                            'user' => $row['user_name'],
                            'title' => $row['title'],
                            'phone' => $row['phone'],
                            'email' => $row['email'],
                            'product_type' => $row['product_type'],
                            'avatar' => $row['avatar'],
                            'date' => $row['date_today'],
                            'city' => $row['city'],
                            'price' => $row['price'],
                            'cod_pro' => $row['cod_pro']
                        );
                        array_push($All_productos, $producto);                
                    }
                    echo json_encode($All_productos);//pasa el array que viene de DAO
                
                    exit;
                 
                 break;
             case 'prodToDetaills':
                    $id_prod=$_GET["id"];
                    
                    $daoproduct = new DAOProducts();
                    $rdo = $daoproduct->product_details($id_prod);
                    
                    $All_productos =$rdo->fetch_assoc();
                    
                    echo json_encode($All_productos);//pasa el array que viene de DAO
                    exit;
               
                 //echo $_POST['word_wrotten'];
                 break;

                     
                
             case 'ultimos_productos':
                    $daoproduct = new DAOProducts();
                    $rdo = $daoproduct->all_productsLimit8();
                    
                    $All_productos = array();
                    while($row = $rdo->fetch_assoc()){                                                
                        $producto = array(
                            'user' => $row['user_name'],
                            'title' => $row['title'],
                            'phone' => $row['phone'],
                            'email' => $row['email'],
                            'product_type' => $row['product_type'],
                            'avatar' => $row['avatar'],
                            'publication_date' => $row['date_today'],
                            'city' => $row['city'],
                            'description' => $row['description'],
                            'price' => $row['price'],
                            'cod_pro' => $row['cod_pro']
                        );
                        array_push($All_productos, $producto); 
                    }
                    echo json_encode($All_productos);//pasa el array que viene de DAO
                    exit;
               
                 //echo $_POST['word_wrotten'];
                 break;

            case 'vistaProducto':
                    $data = json_decode($_POST["data"], true);
                    $daoproduct = new DAOProducts();
                    $rdo = $daoproduct->product_details($data['id']);
                    
                    $All_productos =$rdo->fetch_assoc();
                    echo json_encode($All_productos);//pasa el array que viene de DAO
                    exit;
               
                 //echo $_POST['word_wrotten'];
                 break;



             default:
                 try{
                    $daoproduct = new DAOProducts();
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
             // case 'prodToBasket':

             //    $id_prod=$_GET["id"];
             //    $price_prod=$_GET["price"];
             //    $title_prod=$_GET["title"];
             //    /*-------------------Creo la variable global si previamente no esta dfinida*/
             //    if (!isset($_SESSION['All_p'])) {
             //        $_SESSION['All_p']=array();
             //    }

             //    $valido=false;
             //    /*Recorre el array $_SESSION['All_p'] para saber si ya hay un array dento con el mismo id 
             //    y si existe lo unico que modifica es la cantidad de ese producto concreto.*/
             //    for ($i=0; $i <count($_SESSION['All_p']) ; $i++) { 
             //         if ($_SESSION['All_p'][$i]['id']==$id_prod) {
             //            $o=$_SESSION['All_p'][$i]['quantity'];
             //            $_SESSION['All_p'][$i]['quantity']=$o+1;
                        
             //            $valido=true;
             //             // echo("es el ".$i);
             //             // exit;
             //         }
             //         //echo($_SESSION['All_p'][$i]['id']);
             //           // exit;
             //    }
             //    /*En el caso de que $valido sea false crea un array nuevo y no introduce en $_SESSION['All_p']*/

             //     if ($valido==false) {
             //        $p1=null;             
             //        $p1 = array(
             //            'id'=> $id_prod,
             //            'title'=> $title_prod,
             //            'price'=> $price_prod,
             //            'quantity'=>1
             //                );
             //        array_push($_SESSION['All_p'], $p1);
             //     }
             //    // $pepe=$_SESSION['All_p'];

             //    $total=0;
             //    /*Recorre el array $_SESSION['All_p'] para sacar el total de productos que hay en el carrito*/
             //    for ($i=0; $i <count($_SESSION['All_p']) ; $i++) { 
             //         $pr=$_SESSION['All_p'][$i]['quantity'];
             //         $total=$total+$pr;
             //    }
             //    $_SESSION['cant_total']=$total;
             //     echo($total);

             //    exit;
?>
