<?php include "../partials/header.php" ?>
<?php include "../partials/navbar.php" ?>

<div class="jumbotron container-fluid">
  <div class="company-intro">
    <img src="../assets/img/google-image.png" alt="goolge image" class="float-left company-image">
    <h1 class="display-4 company-name">Google</h1>
    <button type="button" class="btn btn-primary btn-lg subcribe-btn">Subscribe</button>
  </div>
</div>

<div class="stock-graph carousel slide" id="carouselControls">
  <div class="carousel-inner carousel-content">
    <div class="carousel-item active">
      <img src="images/stockGraph.jpg" alt="Google Stock Graph" class="stock-graph">
    </div>
    <div class="carousel-item">
      <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit,
        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
        Excepteur sint occaecat cupidatat non proident,
        sunt in culpa qui officia deserunt mollit anim id est laborum.
      </p>
    </div>
  </div>

  <a class="carousel-control-prev" href="#carouselControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
  </a>
  <a class="carousel-control-next" href="#carouselControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
  </a>
</div>

<?php include "../partials/footer.php" ?>