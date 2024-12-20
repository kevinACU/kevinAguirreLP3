<?php
    include_once ($_SERVER['DOCUMENT_ROOT'].'/routes.php');
    if( !( isset($_SESSION) )) {
        session_start();
    }
    $usuario = null;
    if (isset($_SESSION["usuario"])) {
        $usuario = $_SESSION["usuario"];
    }?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Colegio PRIVADO</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?=PROJECT_PATH?>">Inicio</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Estudiantes
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?=PROJECT_PATH?>view/estudiante/create.php">Agregar</a></li>
            <li><a class="dropdown-item" href="<?=PROJECT_PATH?>view/estudiante/">Listar</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="/view/estudiante/pdf/estudiantes.php">Imprimir</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Matriculas
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?=PROJECT_PATH?>view/matricula/create.php">Agregar</a></li>
            <li><a class="dropdown-item" href="<?=PROJECT_PATH?>view/matricula/">Listar</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="/view/matricula/pdf/matricula.php">Imprimir</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Docentes
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?=PROJECT_PATH?>view/docentes/create.php">Agregar</a></li>
            <li><a class="dropdown-item" href="<?=PROJECT_PATH?>view/docentes/">Listar</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="/view/docentes/pdf/docente.php">Imprimir</a></li>
          </ul>
        </li>     
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Cursos
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?=PROJECT_PATH?>view/cursos/create.php">Agregar</a></li>
            <li><a class="dropdown-item" href="<?=PROJECT_PATH?>view/cursos/">Listar</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="/view/cursos/pdf/cursos.php">Imprimir</a></li>
          </ul>
        </li>  

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?=ucfirst($usuario)?>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?=PROJECT_PATH?>view/usuario/logout.php">Cerrar sesión</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>