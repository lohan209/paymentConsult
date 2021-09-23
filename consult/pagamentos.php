<?php
  session_start();

  try{
    require_once('stripe/init.php');
    $stripe = new \Stripe\StripeClient('sk_test_B8yf01OkYC2ylLlyptgutnLw');

    $chargeID = $_POST['pagamento'];

    $charge = $stripe->charges->retrieve(
      $chargeID,
    );

    $nome = $charge->metadata->customerFullName;
    $email = $charge->metadata->username;
    $celular = $charge->metadata->customerPhoneNumber;
    $plano = $charge->amount;
    $plano = $plano/100;

  }catch (Exception $e) {
    $nome = "";
  }

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Consultas</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../css/pagamentos.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400&display=swap" rel="stylesheet">
</head>

<body>

  <script src="paymentValidation.js"></script>

  <ul>
    <img src="../img/consults_logo.svg" alt="Consults logo">
    <li style="float:right"><a id="exit" onclick="changePage('../index.php')">Sair</a></li>
    <li style="float:right"><a id="payment" class="active">Pagamentos</a></li>
    <li style="float:right"><a id="customers" onclick="changePage('clientes.php')">Clientes</a></li>
  </ul>

  <div class="container">
    <div class="box">

    <form id="frmBusca" action="pagamentos.php" method="post">

      <!--<p>Insira a data que deseja consultar os pagamentos:</p>-->
      <!--<input type="date" id="date" name="birthday">-->
      <input  type="text" id="cliente" maxlength="27" minlength="27" name="pagamento"  placeholder="Digite o ID do pagamento"><br>

      <br><br>
      <p><input type=submit value="Buscar"></p>
      <br>

    </form>

    <?php
    {
      if($nome != ""){
        echo nl2br('<p class="php"><span style="color:#45c7b0;font-weight:bold">Nome:</span> '.$nome."<p>");
        echo nl2br('<p class="php"><span style="color:#45c7b0;font-weight:bold">E-mail:</span> '.$email."<p>");
        echo nl2br('<p class="php"><span style="color:#45c7b0;font-weight:bold">Telefone:</span> '.$celular."<p>");
        echo nl2br('<p class="php"><span style="color:#45c7b0;font-weight:bold">Valor do plano:</span> R$'.$plano."<p>");
      }else{
        echo nl2br('<p class="php"><span style="color:red;font-weight:bold">ID de pagamento não encontrada.</span> <p>');

      }
    }
    ?>
      </div>
  </div>

</html>
