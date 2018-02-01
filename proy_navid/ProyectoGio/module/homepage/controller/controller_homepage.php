
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
                if (isset($_POST['data'])) {
                    $locationJSON = json_decode($_POST["data"], true);//convierte en un array asociativo
                    $daoproduct = new DAOProducts();
                    $rdo = $daoproduct->Search($locationJSON);
                    
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
                        $_SESSION['productos'] = $All_productos;
                    }
                    echo json_encode($All_productos);//pasa el array que viene de DAO
                    exit;
                }elseif ($draw="products" ) {
                    // echo $_SESSION['productos'][1]['phone'];
                    echo json_encode($_SESSION['productos']);
                    exit;
                }
                 // echo $_POST['word_wrotten'];
                 break;
             case 'prodToDetaills':
                    $id_prod=$_GET["id"];
                    
                    // $locationJSON = json_decode($_POST["data"], true);//convierte en un array asociativo
                    $daoproduct = new DAOUser();
                    $rdo = $daoproduct->product_details($id_prod);
                    
                    $All_productos =$rdo->fetch_assoc();
                    
                    //  $All_productos = array();
                    
                    //  while($row = $rdo->fetch_assoc()){                                                
                    //     $producto = array(
                    //         'user' => $row['user_name'],
                    //         'title' => $row['title'],
                    //         'phone' => $row['phone'],
                    //         'email' => $row['email'],
                    //         'product_type' => $row['product_type'],
                    //         'avatar' => $row['avatar'],
                    //         'date' => $row['date_today'],
                    //         'city' => $row['city'],
                    //         'price' => $row['price'],
                    //         'cod_pro' => $row['cod_pro'],
                    //         'country' => $row['country'],
                    //         'province' => $row['province'],
                    //         'address' => $row['address'],
                    //         'description' => $row['description'],
                    //         'brand' => $row['brand'],
                    //         'model' => $row['model'],
                    //         'year' => $row['year'],
                    //         'combustible' => $row['combustible'],
                    //         'color' => $row['color'],
                    //     );
                    //     array_push($All_productos, $producto);
                        
                    // }
                    echo json_encode($All_productos);//pasa el array que viene de DAO
                    exit;
               
                 //echo $_POST['word_wrotten'];
                 break;

             case 'prodToBasket':

                $id_prod=$_GET["id"];
                $price_prod=$_GET["price"];
                $title_prod=$_GET["title"];

                


                 //unset($_SESSION['All_p']);
                if (!isset($_SESSION['All_p'])) {
                    $_SESSION['All_p']=array();
                }

                // $p1=null;             
                // $p1 = array(
                //         'id'=> $id_prod,
                //         'price'=> 15,
                //          'quantity'=>0
                //             );
                // array_push($_SESSION['All_p'], $p1);
                


                // $equipo_futbol = array
                //                     (
                //                     array("Rooney","Chicharito","Gigs"),
                //                     array("Suarez"),
                //                     array("Torres","Terry","Etoo")
                //                     );
                 $cont=0;
                 $as=false;
                 for ($i=0; $i <count($_SESSION['All_p']) ; $i++) { 
                     if ($_SESSION['All_p'][$i]['id']==$id_prod) {
                        $o=$_SESSION['All_p'][$i]['quantity'];
                        $_SESSION['All_p'][$i]['quantity']=$o+1;
                        
                        $as=true;
                         // echo("es el ".$i);
                         // exit;
                     }
                     //echo($_SESSION['All_p'][$i]['id']);
                       // exit;
                 }
                // echo($as);
                 //exit;

                 if ($as==false) {
                    $p1=null;             
                $p1 = array(
                        'id'=> $id_prod,
                        'title'=> $title_prod,
                        'price'=> $price_prod,
                         'quantity'=>1
                            );
                array_push($_SESSION['All_p'], $p1);
                 }

                 $pepe=$_SESSION['All_p'];
//                   echo "<PRE>";
//     print_r($_SESSION['All_p']);
// echo "</PRE>";
                //  foreach($pepe as $equipo){
                //     $cont++;
                //     foreach($equipo as $jugador){
                //         if ($jugador==2) {
                //             // $ol=$equipo['quantity'];
                //             // $equipo['quantity']=$ol+1;
                //              echo ("esti ".$jugador);
                //              exit;
                //         }
                //     }
                // }
                // echo ($cont);
                //         exit;
                // $_SESSION['All_p'][0]['quantity']=98;


                // echo json_encode($_SESSION['All_p']);
                // exit;
                $total=0;
                for ($i=0; $i <count($_SESSION['All_p']) ; $i++) { 
                     $pr=$_SESSION['All_p'][$i]['quantity'];
                     $total=$total+$pr;
                 }
                     $_SESSION['cant_total']=$total;
                 echo($total);


                // if (!isset($_SESSION['prod_carritos'])) {
                //     $_SESSION['prod_carritos'] = array();
                // }
                // // $prod_carrito["'".$id_prod."'"] = $id_prod;
                // $cantidad=count($_SESSION['prod_carritos']);
                // $_SESSION['prod_carritos']["".$cantidad.""] = $id_prod;
                // // $cant_total=count($_SESSION['prod_carritos']);
                // $_SESSION['cant_total']=count($_SESSION['prod_carritos']);
                // echo ($_SESSION['cant_total']);
                //echo($_SESSION['prod_carritos'][1]);
                // echo "<PRE>";
                //     print_r($_SESSION['prod_carritos'][1]);
                // echo "</PRE>";

                exit;
                     
                
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
