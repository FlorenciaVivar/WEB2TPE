<!DOCTYPE html>
<html lang="en">

<head>
  <base href="{BASE_URL}">
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />

  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <title>✈️Go Travel✈️</title>
</head>

<body class="d-flex flex-column min-vh-100">
<header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="home">✈️Go Travel✈️</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
              aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="trips">Viajes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="airlines">Aerolineas</a>
          </li>

          {if isset($smarty.session.USER_ID)}
            <li class="nav-item">
              <a class="nav-link" href="add">Agregar Viaje</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="addAirline">Agregar Aerolinea</a>
            </li>
          {/if}
        </ul>

        <ul class="navbar-nav mb-2 mb-lg-0">
          {if !isset($smarty.session.USER_ID)}
            <li class="nav-item">
              <a class="nav-link" href="login">Login</a>
            </li>
          {else}
            <li class="nav-item">
              <a class="nav-link" href="logout">Logout ({$smarty.session.USER_EMAIL})</a>
            </li>
          {/if}
        </ul>
      </div>
    </div>
  </nav>
</header>

<!-- inicio main container -->
<main class="container">
