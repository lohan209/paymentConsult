<?php
  session_start();

  try{
    require_once('stripe/init.php');

    $stripe = new \Stripe\StripeClient('sk_test_B8yf01OkYC2ylLlyptgutnLw');

    $customerID = $_POST['cliente'];

    $customer = $stripe->customers->retrieve(
      $customerID,
    );

    $nome = $customer->metadata->customerFullName;
    $email = $customer->metadata->username;
    $celular = $customer->metadata->customerPhoneNumber;
    $plano = $customer->metadata->cloudStoragePlan;

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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <link rel="stylesheet" href="../css/clientes.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400&display=swap" rel="stylesheet">
</head>

<body>
  <script src="paymentValidation.js"></script>

  <ul>
    <img src="../img/consults_logo.svg" alt="Consults logo">
    <li style="float:right"><a id="exit" onclick="changePage('../index.php')">Sair</a></li>
    <li style="float:right"><a id="payment" onclick="changePage('pagamentos.php')">Pagamentos</a></li>
    <li style="float:right"><a id="customers" class="active">Clientes</a></li>
  </ul>

  <div class="container">
    <div class="box">

    <form id="frmBusca" action="clientes.php" method="post">

      <!--<input oninput="mascaraCPF(this)" type="text" id="cpf" maxlength="11" minlength="11" name="cpf" onkeypress="$(this).mask('000.000.000-00');"  placeholder="Digite o CPF do usuário"><br>-->
      <input  type="text" id="cliente" maxlength="18" minlength="18" name="cliente"  placeholder="Digite o ID do cliente"><br>
      <br>
      <br>
      <!--<button id="buscar" onclick="isValidCPF()" class="button buscar" type="button">Buscar</button>-->
      <input type=submit value="Buscar">
    </form>

    <?php
    {
      if($nome != ""){
        echo nl2br('<p class="php"><span style="color:#45c7b0;font-weight:bold">Nome:</span> '.$nome."<p>");
        echo nl2br('<p class="php"><span style="color:#45c7b0;font-weight:bold">E-mail:</span> '.$email."<p>");
        echo nl2br('<p class="php"><span style="color:#45c7b0;font-weight:bold">Telefone:</span> '.$celular."<p>");
        echo nl2br('<p class="php"><span style="color:#45c7b0;font-weight:bold">Plano:</span> '.$plano."<p>");
      }else{
        echo nl2br('<p class="php"><span style="color:red;font-weight:bold">ID de usuário não encontrada.</span> <p>');

      }
    }
    ?>


    </div>
  </div>

</body>
</html>
