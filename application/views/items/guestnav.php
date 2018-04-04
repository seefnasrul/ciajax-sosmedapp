<?php 
 if(isset($actv)){
  if($actv=="register"){
    $register = " active";
    $login=""; 
  }else if($actv=="login"){
    $register = "";
    $login=" active"; 
  } 
 }
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Frames</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse " id="navbarNavDropdown">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item<?php echo $login; ?>">
        <a class="nav-link" href="#">Login</a>
      </li>
      <li class="nav-item<?php echo $register;?>">
        <a class="nav-link" href="#">Register</a>
      </li>
    </ul>
  </div>
</nav>