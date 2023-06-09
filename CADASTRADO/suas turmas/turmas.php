<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Humanizarte</title>
    <link rel="stylesheet" href=turmas.css>
    
  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>

  <!-- Bootstrap 5 Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

  <!-- Font awesome -->
  <script src="https://kit.fontawesome.com/99d4636c93.js" crossorigin="anonymous"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>

</head>
<body>

<?php
require_once '../conn/conn.php';

// Acessar o ID do usuário
$userID = isset($_SESSION['userID']) ? $_SESSION['userID'] : null;

// Verificar se o usuário está logado
if ($userID) {
  $sql = "SELECT * FROM aluno_turma WHERE id_aluno = :userID";
  $stmt = $pdo->prepare($sql);
  $stmt->bindValue(":userID", $userID);
  $stmt->execute();

  if ($stmt->rowCount() > 0) {
    $result = $stmt->fetchAll();
    $turmas = array_column($result, 'id_turma');
  } else {
    $turmas = [];
  }
} else {
  $turmas = [];
}
?>

<!-- BARRA DE NAVEGAÇÃO -->

<nav class="navbar navbar-expand-lg navbar-light bg-light" id="navbar">

  <a class="navbar-brand" href="#" id="logo_texto"><img alt="Logo Humanizarte" src="imagens/logo.png" width="40" height="40">Humanizarte</a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">

    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="../index/index.html">Ínicio</span></a>
      </li>
      <li class="nav-item" style="text-decoration: underline;">
        <a class="nav-link" href="../suas turmas/turmas.html">Suas turmas</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../sobre-nos/sobrenos.html">Sobre nós</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../conta/conta.html">Conta</a>
      </li>
    </ul>

  </div>

</nav>

<!-- FIM BARRA DE NAVEGAÇÃO -->

<!-- TURMAS -->

<h1 class="titulo">Suas turmas</h1>
<div class="area-turmas">
  <?php if (in_array(1, $turmas)) { ?>
    <div class="logos">
      <h1>LOGOS</h1>
      <div class="logos-entrar"><a href="logos.html">ENTRAR</a></div>
      <i class="bi bi-book-half" id="logos-icone"></i>
    </div>
  <?php } ?>

  <?php if (in_array(2, $turmas)) { ?>
    <div class="cronos">
      <h1>CRONOS</h1>
      <div class="cronos-entrar"><a href="cronos.html">ENTRAR</a></div>
      <i class="bi bi-hourglass-bottom" id="cronos-icone"></i>
    </div>
  <?php } ?>

  <?php if (in_array(3, $turmas)) { ?>
    <div class="suntzu">
      <h1>SUN TZU</h1>
      <div class="suntzu-entrar"><a href="suntzu.html">ENTRAR</a></div>
      <i class="bi bi-shield-shaded" id="suntzu-icone"></i>
    </div>
  <?php } ?>
</div>

<!-- FIM TURMAS -->


<!-- <h1 class="titulo">Suas turmas</h1>
<div class="area-turmas">
  <div class="logos">
    <h1>LOGOS</h1>
    <div class="logos-entrar"><a href="logos.html">ENTRAR</a></div>
    <i class="bi bi-book-half" id="logos-icone"></i>
  </div>



  <div class="cronos">
    <h1>CRONOS</h1>
    <div class="cronos-entrar"><a href="cronos.html">ENTRAR</a></div>
    <i class="bi bi-hourglass-bottom" id="cronos-icone"></i>
  </div>



  <div class="suntzu">
    <h1>SUN TZU</h1>
    <div class="suntzu-entrar"><a href="suntzu.html">ENTRAR</a></div>
    <i class="bi bi-shield-shaded" id="suntzu-icone"></i>
  </div>
</div> -->

<!-- FIM TURMAS -->

<!-- RODA PÉ -->

<footer>

  <div class="roda-pe">
    <div class="contato">
      <i class="bi bi-instagram" id="ig-icon"></i>
      <i class="bi bi-facebook" id="fb-icon"></i>
      <i class="bi bi-youtube" id="yt-icon"></i>
    </div>
    <img src="imagens/logo.png" alt="Logo da humanizarte" id="logo-roda-pe">
    <h1>Humanizarte</h1>
    <p id="copyright">Copyright <i class="bi bi-c-circle"></i> 2023 Humanizarte, LTDA</p>
    <p style="font-weight: 600; padding-bottom: 1%;"><a href="#" style="color:black">Política de Privacidade</a> | <a href="#"  style="color:black">Política de Segurança</a></p>
  </div>

</footer>

<!-- FIM RODA PÉ -->

</body>
</html>