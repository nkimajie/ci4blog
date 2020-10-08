<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>XTREME inc News Blog</title>
</head>

<body>

<!-- nav bar start -->

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container">
  <a class="navbar-brand" href="/">ci4 Blog</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <?php if(session()->get('isLoggedIn')): ?>

    <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/">All Post</a>
      </li>
     
    </ul>
 <!-- ($uri->getSegment(1) == 'dashboard' ? 'active' : null) -->

    <span class="navbar-text">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link" href="/dashboard">Edit Posts</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="/create">Add New</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/logout">LogOut</a>
      </li>
    </ul>
    
    </span>
  </div>

  

  <?php else: ?>
    
    <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/">All Post</a>
      </li>
     
    </ul>
    <span class="navbar-text">
      <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="/login">LogIn</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/register">Register</a>
      </li>
    </ul>
    </span>
  </div>
  
  <?php endif; ?>
  
</nav>

<!-- nav bar ends -->


<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page"><?= esc($title) ?></li>
  </ol>
</nav>

    