<nav class="navbar navbar-dark navbar-expand-lg bg-dark sticky-side">
  <div class="container px-3">
    <a class="navbar-brand" href="index.php">PHILIPPINE CROP INSURANCE CORPORATION (Calbiga)</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <?php if(isset($_SESSION['auth'])) : ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           Welcome, <?= $_SESSION['auth_user']['username'] ?>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="my-Request.php">My Application Request</a></li>
            <li><a class="dropdown-item" href="change-password.php">Change Password</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled"></a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled"></a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled"></a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled"></a>
        </li>
      <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>