
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
                            'publication_date' => $row['date_today'],
                            'city' => $row['city'],
                            'price' => $row['price'],
                            'cod_pro' => $row['cod_pro']
                        );
                        array_push($All_productos, $producto);                
                    }
                    $_SESSION['productosBuscados2']=$All_productos;
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

            case 'filtro':
                    $filtro = json_decode($_POST["filtro"], true);
                    // $f=$filtro[0]['price'];
                    // $t=substr($f, 0, -4);
                    // echo json_encode($filtro[0]);
                    // exit;
                    $daoproduct = new DAOProducts();
                    $rdo = $daoproduct->filtro($filtro);
                    // echo ($rdo);
                    // exit;
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
                    echo json_encode($All_productos);
                    exit;
                 break;
            case 'cargadatos':
                    $datos=$_SESSION['productosBuscados2'];
                    echo json_encode($datos);
                    exit;
                break;

            case 'like':
                if ($_SESSION['usuarioLogueado75']!=null) {
                    $cod_prod=$_GET["id"];
                    $user_name=$_SESSION['usuarioLogueado75'];
                    $daoproduct = new DAOProducts();
                    // echo ($user_name['user_log'].$cod_prod);
                    $rdo = $daoproduct->insertLikes($user_name['user_log'], $cod_prod);
                    
                    
                    if($rdo){                        
                        echo ("exito");
                        exit;                    
                    }else{
                        echo ("error");
                        exit;
                    }
                }else{
                    $jsondata = false;
                    header('HTTP/1.0 400 Bad error');
                    echo json_encode($jsondata);
                }
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
