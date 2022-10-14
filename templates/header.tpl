<!DOCTYPE html>
<html lang="en">

<head>
    <base href="{BASE_URL}" >
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TPE</title>
    <link rel="stylesheet" href="./css/styles.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"/>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom border-white">
      <div class="container-fluid">
        <a class="navbar-brand me-5" href="home"><img class="logo" src="./img/voley.png" /></a>
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbarColor01" style="">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="equipos">Equipos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="jugadores">Jugadores</a>
            </li>
          </ul>
          {if $session}
            <a href="registro" class="btn btn-outline-light me-4">Register</a>
            <a href="logout" class="btn btn-outline-light me-4">Log Out</a>
          {else}  
            <a href="login" class="btn btn-outline-light me-4">Log In</a>
          {/if}
        </div>
      </div>
    </nav>