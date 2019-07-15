<?php
  $nomeArquivo = "usuarios.json";

  function cadastrarUsuario($usuario) {
    global $nomeArquivo;

    // Leitura do arquivo
    $jsonUsuarios = file_get_contents($nomeArquivo);

    // Transformando o JSON em array
    $arrayUsuarios = json_decode($jsonUsuarios, true);

    // Adicionando na última posição do array para não sobreescrever os dados
    array_push($arrayUsuarios["usuarios"], $usuario);

    // Transformando o array em JSON para enviar as informações
    $jsonUsuarios = json_encode($arrayUsuarios);

    // Abrindo arquivo usuarios.json e enviando as informações
    $cadastrou = file_put_contents($nomeArquivo, $jsonUsuarios);

    return $cadastrou;
  }

  function logarUsuario($email, $senha) {
    global $nomeArquivo;
    $logado = false;

    // Leitura do arquivo
    $jsonUsuarios = file_get_contents($nomeArquivo);

    // Transformando o JSON em array
    $arrayUsuarios = json_decode($jsonUsuarios, true);

    // Lembre-se temos um array com a posição 0 sendo "usuarios"
    foreach ($arrayUsuarios["usuarios"] as $key => $value) {
      if ($email == $value["email"] && $senha == $value["senha"]) {
          $logado = true;
          break;
      }
    }

    return $logado;
  }
?>
