<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" >
  </head>

  <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" >
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto ">
       
      <li class="nav-item">
          <a class="nav-link active"  href="index.php">Home</a>
        </li>
        <?php
        if(isset($_SESSION['auth'])):
        ?>
       
        <li class="nav-item">
          <a class="nav-link active"  href="all_users.php">All Users</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?php
            if($_SESSION['auth']['photo']){
              ?>
              <img width="30" height="30" class="rounded-circle" src="uploads/profile/<?=$_SESSION['auth']['photo']?>" alt="<?= $_SESSION['auth']['name']?>">
            <?php
            }else{
              $_SESSION['auth']['name'];
            }
            ?>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item"><?=$_SESSION['auth']['name']?></a></li>
            <li><a class="dropdown-item"><?=$_SESSION['auth']['email']?></a></li>
            <li><a class="dropdown-item" href="password.php">Change Password</a></li>
            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
           
          </ul>
         
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Post</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="addpost.php">Add Post</a></li>
            <li><a class="dropdown-item" href="allpost.php">All Post</a></li>
          </ul>
        </li>
       
       
        <?php
        endif;
        if(!isset($_SESSION['auth'])):
        ?>
        <li class="nav-item">
          <a class="nav-link active"  href="signup.php">Sing Up</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active"  href="login.php">Login</a>
        </li>
        <?php
        endif;
        ?>
      
      </ul>
      
    </div>
  </div>
</nav>