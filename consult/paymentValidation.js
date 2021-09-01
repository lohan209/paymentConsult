function changePage(page) {
  location.href = page;
}

function isValidCPF(){
  var strCPF = document.getElementById("cpf").value
  strCPF = strCPF.replace(/\.|\-/g, '');
  var soma;
  var resto;
  soma = 0;

  if (strCPF == "00000000000"){
    document.getElementById("msgerro").innerHTML="<font color='red'>CPF inválido </font>";
  }

  for (i=1; i<=9; i++){
    soma = soma + parseInt(strCPF.substring(i-1, i)) * (11 - i);
  }
  resto = (soma * 10) % 11;

  if ((resto == 10) || (resto == 11)){
    resto = 0;
  }

  if (resto != parseInt(strCPF.substring(9, 10))){
    document.getElementById("msgerro").innerHTML="<font color='red'>CPF inválido </font>";
    return false;
  }

  soma = 0;
  for (i = 1; i <= 10; i++){
    soma = soma + parseInt(strCPF.substring(i-1, i)) * (12 - i);
  }

  resto = (soma * 10) % 11;

  if ((resto == 10) || (resto == 11)){
    document.getElementById("msgerro").innerHTML="<font color='red'>CPF inválido </font>";
    resto = 0;
  }

  if (resto != parseInt(strCPF.substring(10, 11) ) ){
    document.getElementById("msgerro").innerHTML="<font color='red'>CPF inválido </font>";
    return false;
  }


  document.getElementById("msgerro").innerHTML="<font color='#00a335'>CPF válido </font>";
}

function mascaraCPF(i){

   var v = i.value;

   if(isNaN(v[v.length-1])){ // impede entrar outro caractere que não seja número
      i.value = v.substring(0, v.length-1);
      return;
   }

   i.setAttribute("maxlength", "14");
   if (v.length == 3 || v.length == 7) i.value += ".";
   if (v.length == 11) i.value += "-";

}
