<?php 

 if($_GET['collection_id'] || $_GET['id']){
   
   require_once 'conn/conn.php';                    // Conexão
   require_once 'MercadoPago/lib/mercadopago.php';  // Biblioteca Mercado Pago
   require_once 'class/PagamentoMP.php';            // Classe Pagamento
   
   $pagar = new PagamentoMP;
   
   if(isset($_GET['collection_id'])):
    $id =  $_GET['collection_id'];
   elseif(isset($_GET['id'])):
    $id =  $_GET['id'];
   endif; 
   
   
   $retorno = $pagar->Retorno($id , $conn);
   if($retorno){
      // Redirecionar usuario
      echo '<script>location.href="index.php"</script>';
   }else{
     // Redirecionar usuario e informar erro ao admin
      echo '<script>location.href="index.php"</script>';
      
      /*
       
       ENVIAR EMAIL AO ADMIN
      
      */
   }
   
 }
 
 


?>