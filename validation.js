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
  var empty = emptyFields('login');

  if (empty == false){
    changePage('consult/clientes.html');
  }
}

function registerSystem(){
  var empty = emptyFields('register')

  if (empty == false){
    changePage('home.html');
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
