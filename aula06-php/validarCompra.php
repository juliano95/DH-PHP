<?php
  $nomeCompleto = $_REQUEST["nomeCompleto"];
  $cpf = $_REQUEST["cpf"];
  $numeroCartao = $_REQUEST["numeroCartao"];
  $validade = $_REQUEST["validade"];
  $cvv = $_REQUEST["cvv"];
  $nomeCurso = $_REQUEST["nomeCurso"];
  $precoCurso = $_REQUEST["precoCurso"];
  $errors = [];
//   function validaCampoVazio ($campo){
//     return $campo;
//   }

//  echo validaCampoVazio ($nomeCompleto);

//  echo validaCampoVazio ($cpf);

function validaNome($nomeCompleto){
  return strlen($nomeCompleto) > 0 &&  strlen ($nomeCompleto) <= 15;
}

function validaCpf ($cpf){
  return strlen($cpf) === 11;
}

function validaCartao ($numeroCartao){
  return substr($numeroCartao, -4);
}
function validaCvv ($cvv){
  return strlen($cvv) === 3;
}
echo validaNome ($nomeCompleto);
echo validaCpf ($cpf);
echo validaCartao ($numeroCartao);

function validaValidade ($validade){
  $dataAtual = date('Y-m');
  return ($validade > $dataAtual);
  
}

function validarCompra($nome, $cpf, $numeroCartao, $cvv, $validade){
global $errors;
  if(!validaNome($nome)){
    array_push($errors, "nome completo é obrigatorio");
  }
  if(!validaCpf($cpf)){
    array_push($errors, "CPF inválido");
  }

  if(!validaCartao($numeroCartao)){
    array_push($errors, "numero do cartão invalido");
  }

  if(!validaCvv($cvv)){
    array_push($errors, "numero de cartão invalido");
  }

  if(!validaValidade($validade)){
    array_push($errors, "Data de validade invalida");
  }
}

validarCompra($nomeCompleto, $cpf, $numeroCartao, $cvv, $validade);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>
    <div class="container">
    <?php if(count($errors)>0):  ?>
      <div class="panel panel-danger">
        <div class="">
          <span>Preencha seus dados corretamente</span>       
        </div>
        <div class="panel-body">
          <ul class="list-group">
          
          <?php foreach($errors as $key => $value): ?>
            <li class="list-group-item">
              <?= $value ?>
            </li>  
          <?php endforeach; ?>
          
          </ul>
          <div class="center">
          <a href="index.php">Voltar para Home</a>
          </div>
        </div>
      </div>
<?php else: ?>

      <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-primary">
          <div class="panel-heading">Compra Realizada com sucesso!</div>
          <div class="panel-body">
            <ul class="list-group">
              <li class="list-group-item"><strong>Nome Curso:</strong><?php echo $nomeCurso; ?></li>
              <li class="list-group-item"><strong>Preço: R$</strong><?php echo $precoCurso; ?></li>
              <li class="list-group-item"><strong>Nome Completo:</strong><?php echo $nomeCompleto; ?></li>
            </ul>
            <div class="center">
              <a href="index.php">Voltar para a home</a>
            </div>
          </div>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </body>
</html>
