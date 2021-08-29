<html>
<head>
  <meta charset="utf-8">
  <title>Consultas</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/login.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400&display=swap" rel="stylesheet">
</head>

<body>
  <script src="validation.js"></script>

  <div class="container">
    <div class="box">
    <img src="img/consults_logo.svg" alt="Consults logo"><br><br>
    <form id="frmLogin">
      <input type="email" id="email" onblur="validacaoEmail(frmRegister.email)" placeholder="E-mail"><br>
      <input type="password" id="senha" minlength="8" required maxlength="32" placeholder="Senha"><br><br>
      <button class="button login" type="button" id="login">Entrar</button><br>
    </form>
    <button class="button cadastrar" type="button" id="register">Cadastrar</button>

    </div>
  </div>

  <script>
  document.getElementById("login").addEventListener("click", function(){changePage("consult/clientes.html");});
  document.getElementById("register").addEventListener("click", function(){changePage("register.html");});

  function changePage(page) {
    location.href = page;
  }

  </script>

</body>
</html>
