<?php
@session_start();
$path_controller = $_SERVER['DOCUMENT_ROOT'] . '/proy_navid/ProyectoGio/';    
    include ($path_controller . "module/basket/model/DAObasket.php");

	 $_SESSION['cant_total'];
	 $_SESSION['prod_carritos'];
		
	switch ($_GET['basket']) {

		case 't_pedidos'://llega de basket.js
			$Pedido = json_decode($_POST["jsonPedido"], true);
			$date_today=date("m.d.y");
			$productosPedido=json_decode($_POST["productosPedido"], true);
			// echo (count($productosPedido));
			// exit;

			$daoPedido = new DAObasket();
      $rdo = $daoPedido->insertarPedido($Pedido, $date_today, $productosPedido);

      if ($rdo) {      	
        $prueba="";
        for ($i=0; $i <count($productosPedido) ; $i++) { 
          $prueba.='<tr style="margin: 1px solid black;">
                      <td style="text-align:center"><img style="width: 100px;" src="http://pickenselections.org/wp-content/gallery/commission/no_photo_available.jpg" alt=""></td>
                      <td style="text-align:center">'.$productosPedido[$i]["title"].'</td>
                      <td style="text-align:center">'.$productosPedido[$i]["price"].'  EUR</td>
                      <td style="text-align:center">'.$productosPedido[$i]["quantity"].'</td>
                    </tr>';
        }; 

        $daoPedido2 = new DAObasket();
        $rdo2 = $daoPedido2->getEmail($Pedido);
        $email =$rdo2->fetch_assoc();

        $enviarEmail = send_mailgun($email['email'], $productosPedido, $prueba, $Pedido); 
      	$msn="You will recieve your products in the next days";
      	$success=true;
     		
      }else{
      	$msn="Error DB";
      	$success=false;
      }
            

			echo json_encode(array('resultado' => $msn, 
                'success' => $success));
			exit;
			break;

		default:
			# code...
			break;
	}



          function send_mailgun($email, $productosPedido, $prueba, $Pedido){
            $config = array();
            $config['api_key'] = "key-"; //API Key
            $config['api_url'] = "https://api.mailgun.net/v2/sandbox4c1cb4d3fb9146438f1411d073994e1d.mailgun.org/messages"; //API Base URL
            $user=$Pedido["user"];
            $total_price=$Pedido["precio_peddido"];
            $message = array();
            $message['from'] = "giogio@gmail.com";
            $message['to'] = $email;
            $message['h:Reply-To'] = "giogio@gmail.com";
            $message['subject'] = "Hello, this is a test";
            $message['html'] = '<p>Thanks <strong>' . $user . '</strong> for buy with us, you will recieve your order in the next 5 days.</p>
            <p>This is your order details;</p>
            </br></br></br>
            <table border="1">
              <thead>
                <tr>
                  <th></th>
                  <th style="width: 300px">Product</th>
                  <th style="width: 200px">Price</th>
                  <th style="width: 200px">Quantity</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                <th colspan="4" scope="col">Total Price: <strong>'.$total_price.'</strong> EUR</th>
                </tr>
              </tfoot>
              <tbody>
                  '.$prueba.'                  
              </tbody>
            </table>
            ';
         
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $config['api_url']);
            curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
            curl_setopt($ch, CURLOPT_USERPWD, "api:{$config['api_key']}");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_POST, true); 
            curl_setopt($ch, CURLOPT_POSTFIELDS,$message);
            $result = curl_exec($ch);
            curl_close($ch);
            return $result;
        }
    
// function send_mailgun($email){
//             $config = array();
//             $config['api_key'] = "key-"; //API Key
//             $config['api_url'] = "https://api.mailgun.net/v2/sandbox4c1cb4d3fb9146438f1411d073994e1d.mailgun.org/messages"; //API Base URL

//             $message = array();
//             $message['from'] = "giogio@gmail.com";
//             $message['to'] = $email;
//             $message['h:Reply-To'] = "giogio@gmail.com";
//             $message['subject'] = "Hello, this is a test";
//             $message['html'] = '<strong>knfgkjnkjdbfgkjb</strong>Hello ' . $email . ',</br></br> 
//             This is a test</br>
//             <div>
//                 <img src="http://www.coordinadora.com/wp-content/uploads/sidebar_usuario-corporativo.png" alt="">
//             </div>
//             <table>
//                 <thead>
//                     <tr>
//                         <th>header1</th>
//                         <th>header2</th>
//                         <th>header3</th>
//                         <th>header4</th>
//                     </tr>
//                 </thead>
//                 <tbody>
//                     <tr>
//                         <td><img style="width: 100px;" src="http://pickenselections.org/wp-content/gallery/commission/no_photo_available.jpg" alt=""></td>
//                         <td><img src="http://www.coordinadora.com/wp-content/uploads/sidebar_usuario-corporativo.png" alt=""></td>
//                         <td><img src="http://www.coordinadora.com/wp-content/uploads/sidebar_usuario-corporativo.png" alt=""></td>
//                         <td><img src="http://www.coordinadora.com/wp-content/uploads/sidebar_usuario-corporativo.png" alt=""></td>
//                     </tr>
//                 </tbody>
//             </table>';
         
//             $ch = curl_init();
//             curl_setopt($ch, CURLOPT_URL, $config['api_url']);
//             curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
//             curl_setopt($ch, CURLOPT_USERPWD, "api:{$config['api_key']}");
//             curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//             curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
//             curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
//             curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
//             curl_setopt($ch, CURLOPT_POST, true); 
//             curl_setopt($ch, CURLOPT_POSTFIELDS,$message);
//             $result = curl_exec($ch);
//             curl_close($ch);
//             return $result;
//         }
    
//     $jjjson = send_mailgun('gmc.yanez@gmail.com'); 
?>