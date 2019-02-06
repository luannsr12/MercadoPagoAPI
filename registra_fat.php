<?php 
 require_once 'conn/conn.php';
 
 // Aqui você tras junto com POST ou GET o ID do produto para montar a fatura
 // Para buscar por ex o valor e o produto que é
 // Aqui também você tras o id do usuario que está gerando está fatura
 
 // No meu caso eu vou colocar o d so usuario como 1, pois se trata de um exemplo
 $id_user = 1;
 //Vamos pegar a data para adicionar a fatura
 $data = date('d/m/Y');
 // Valor da fatura (valor do produto ou do carrinho total)
 $s = '140,00'; // Neste formato o mercado pago aceita
 
  function formata($y){
    $a = str_replace('.','',$y); //  1.000,00 => 1000,00
    $b = str_replace(',','.',$a); // 1000,00 => 1000.00 || 140,00 => 140.00
    return $b;
  }
  
  $valor = formata($s);
  
   //Vamos criar uma referencia  (essa será nossa referencia passada para o mercado pago)
   $ref = rand(1,9999).$id_user; // Ex: 53801
  
  //Status recebe Pendente
  $status = "Pendente";
  // Forma recebe MP
  $forma  = "Mercado Pago";
 
  //Registrar a fatura
  $sql = mysqli_query($conn,"INSERT INTO fatura (`id_user`, `ref`, `forma`, `data`, `valor`, `status`) VALUES ('$id_user','$ref','$forma','$data','$valor','$status')");
  if($sql){
      //Buscar está fatura no banco
      $query = mysqli_query($conn,"SELECT * FROM `fatura` WHERE ref='$ref' LIMIT 1");
      if($query){
        $fat = mysqli_fetch_assoc($query);
        $id = $fat['ref'];
        echo "<script>location.href='finaliza.php?id=$id';</script>";
      }else{
        echo "<script>location.href='index.php?ERROR';</script>";
      }

  }else{
      echo "<script>location.href='index.php?ERROR1';</script>";
    }



?>