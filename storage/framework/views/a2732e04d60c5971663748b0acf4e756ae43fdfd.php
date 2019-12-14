<nav class="navbar navbar-expand navbar-primary bg-primary">
  <button class="navbar-toggler" type="button" data-toggle="collapse">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbars">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="navbar-brand text-light" href="/">OnlineFlorist<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link text-light" href="/profile">Profile</a>
      </li>
      <li class="nav-item dropdown active">
        <a class="nav-link text-light dropdown-toggle" id="navLinkDropdown" role="button" data-toggle="dropdown" style="cursor: pointer">
          Admin Menu
        </a>
        <div class="dropdown-menu" type="button">
          <a class="dropdown-item" href="#">Manage Users</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="/flower_types">Manage Flower Types</a>
          <a class="dropdown-item" href="/flowers">Manage Flowers</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="/couriers">Manage Couriers</a>
        </div>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item text-light active">
        <?php echo $__env->make('inc.clock', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      </li>
    </ul>
  </div>
</nav>
<?php /**PATH C:\xampp\htdocs\florist\resources\views/inc/navbar.blade.php ENDPATH**/ ?>