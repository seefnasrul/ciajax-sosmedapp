<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Frames</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse " id="navbarNavDropdown">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Feeds</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">My Frame</a>
      </li>

      <li class="nav-item dropdown">
        <a class="navbar-brand nav-link dropdown-toggle"  id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="<?php echo base_url();?>assets/images/defaultpp.png" width="30" height="30" class="d-inline-block align-top" alt="">
        </a>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="<?php echo base_url(); ?>profile">My Frame</a>
          <a class="dropdown-item" href="<?php echo base_url(); ?>settings">Settings</a>
          <a class="dropdown-item" href="<?php echo base_url(); ?>logout">Logout</a>
        </div>
      </li>
    </ul>
  </div>
</nav>