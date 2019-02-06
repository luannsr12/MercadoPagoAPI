<?php
 require_once 'conn/conn.php';
 require_once 'MercadoPago/lib/mercadopago.php';
 require_once 'class/PagamentoMP.php';
 
 $pagar = new PagamentoMP;
 
 
 //ID ref da fatura
 $id = $_GET['id'];
 // Iniciar busca
 $query = mysqli_query($conn,"SELECT  * FROM fatura WHERE ref='$id' LIMIT 1");
 $fat   = mysqli_fetch_assoc($query);
        
 $valor = str_replace('.',',',$fat['valor']);
 $nome  = "Controle Xbox";
 $url   = "http://localhost/MercadoPagoAPI";

 $btn   = $pagar->PagarMP($id , $nome , (float)$fat['valor'] , $url);


?>


<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">    

    <title>Finalizando - Controle Xbox 360 Wireless Original</title>
  </head>
  <body>
    <div class="container">
     <div class="row">
      <nav style="margin-top:10px;" class="navbar navbar-expand-lg navbar-light bg-light">
          <a class="navbar-brand" href="#">logo</a>
          <a class="navbar-brand btn btn-default" href="#">INICIO</a>
          <a class="navbar-brand btn btn-default" href="#">CATEGORIAS</a>
          <div style="margin-top:10px;" class="text-right collapse navbar-collapse" id="navbarSupportedContent">
            <form class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="search" placeholder="Procurar por..." aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Procurar</button>
            </form>
          </div>
        </nav>
      </div>
      
      
      <div class="row">
       <div class="text-center col-md-12">
         <div class="row">
          <div class="col-md-12">
            <table class="table">
               <thead>

               </thead>
               <tbody>
                 <tr>
                   <th scope="row"><img style="width:80px;" src="https://http2.mlstatic.com/controle-xbox-360-wireless-original-microsoft-scx-brinde-D_NQ_NP_885222-MLB26540652098_122017-F.jpg" /></th>
                   <td><b>R$ <?php echo $valor; ?></b></td>
                   <td><b><?php echo $fat['data']; ?></b></td>
                   <td><b>Total: R$ <?php echo $valor; ?></b></td>
                 </tr>
    
               </tbody>
             </table>
          </div>
          <div class="col-md-12 text-right">
           <!-- <a class="btn btn-success" href="#">Finalizar</a> -->
           <?php echo $btn;?>
           
          </div>
         </div>
       </div>
      </div>
    </div>

    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.js" ></script>
  </body>
</html>
