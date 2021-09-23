function validacaoEmail(field) {
  usuario = field.value.substring(0, field.value.indexOf("@"));
  dominio = field.value.substring(field.value.indexOf("@")+ 1, field.value.length);
    if ((usuario.length >=1) &&
        (dominio.length >=3) &&
        (usuario.search("@")==-1) &&
        (dominio.search("@")==-1) &&
        (usuario.search(" ")==-1) &&
        (dominio.search(" ")==-1) &&
        (dominio.search(".")!=-1) &&
        (dominio.indexOf(".") >=1)&&
        (dominio.lastIndexOf(".") < dominio.length - 1)) {
    }
    else{
      document.getElementById("msgemail").innerHTML="<font color='red'>Email inválido </font>";
      //alert("E-mail invalido");
    }
}

function loginSystem(){
  //https://sheetdb.io/usage
  var empty = emptyFields('login');

  if (empty == false){
    email = document.getElementById("email").value;
    pass = document.getElementById("senha").value;
    pass = '"'+pass+'"'

    axios.get('https://sheetdb.io/api/v1/uhjyfg4d5smev/search?email='+email)
    .then( response => {
        obj = JSON.stringify(response.data[0].senha)
        tam = response.data.length;

        if(tam == 0){
          alert("Usuário não existe")
        }else{
          if(obj == pass.toString()){
            changePage('consult/clientes.php');
          }else{
            alert('Senha incorreta')
          }
        }
    });
  }
}

function registerSystem(){
  //https://sheetdb.io/usage
  var empty = emptyFields('register')

  if (empty == false){
    email = document.getElementById("email").value;

    pass = document.getElementById("senha").value;
    passConfirm = document.getElementById("senharec").value;

    if (pass != passConfirm){
        document.getElementById("msgemail").innerHTML="<font color='red'>Senhas não são iguais</font>";
    }
    else{

      axios.get('https://sheetdb.io/api/v1/uhjyfg4d5smev/search?email='+email)
      .then( response => {
          console.log(response.data.length);

          tam = response.data.length;

          if(tam == 0){
            axios.post('https://sheetdb.io/api/v1/uhjyfg4d5smev',{
                "data": {"email": email, "senha": pass}
            }).then( response => {
                alert('Cadastro realizado com sucesso!')
                changePage('home.html');
            });
          }
          else{
            alert('Conta já existe')
          }

      });



    }
  }
}

function emptyFields(page){
  if(document.getElementById("email").value.length == 0)
    {
        alert("Preencha o e-mail!")
        return true
    }

    if(document.getElementById("senha").value.length == 0)
    {
        alert("Preencha o senha")
        return true
    }
    else{
      if (page == "login"){
        return false
      }
    }

    if(document.getElementById("senharec").value.length == 0)
    {
        alert("Senhas não são a mesma!")
        return true
    }

    if(document.getElementById("emailrec").value.length == 0)
    {
        alert("Insira um e-mail de recuperação")
        return true
    }

    return false
}

function changePage(page) {
  location.href = page;
}
