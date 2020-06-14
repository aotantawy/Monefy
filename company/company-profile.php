<?php include "../partials/header.php" ?>
<?php include "../partials/navbar.php" ?>
<?php include "company-structure.php" ?>
<br><br>
<div class="aboutCompany" style="background-color:#ffffff">
    <div class="logo mx-5">
      <img src="<?php echo $logoImage?>" alt="<?php echo $nameOfCompany ?>+ image" class="float-left company-image" >
    </div>
    <br>
    <div class="description mx-5 my-3">
        <h5 class="card-title"><?php echo $nameOfCompany?></h5>
        <p class="card-text"><?php echo $desciption?></p>
        <p class="card-text"><small class="text-muted"><?php echo $publication_date?></small></p>
    </div>
    <div class="btn-group my-3" role="group">
            <button type="button" class="btn btn-primary"> <i class="fas fa-plus"></i> Subscribe</button></br>
            <button type="button" class="btn btn-outline-primary mx-3">Visit Website  <i class="fas fa-location-arrow"></i></button>
    </div>
  </div>
  <div class="container-fluid my-3" style="background-color:#ffffff;width:96%;margin:auto;">
<div class="row py-5">
  <div class="col-md-3"style="justify-content:start;">
    <div class="list-group" id="list-tab" role="tablist">
      <a class="list-group-item list-group-item-action active" id="list-About-list" data-toggle="list" href="#list-About" role="tab" aria-controls="About">About</a>
      <a class="list-group-item list-group-item-action" id="list-History-list" data-toggle="list" href="#list-History" role="tab" aria-controls="History">History</a>
    </div>
  </div>
  <div class="col-md-9 x">
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="list-About" role="tabpanel" aria-labelledby="list-About-list">
        <table>
          <tr>
            <td>
              Branch:
            </td>
            <td>
              <ol>
                <?php
                  foreach($locations as $location)
                  {
                    echo "<li>".$location['name']."</li>";
                  } 
                ?> 
              </ol>
            </td>
          </tr>
          <tr>
            <td>Industry:</td>
            <td>
              <ol>
                <?php
                foreach($industries as $industry)
                {
                  echo "<li>".$industry['name']."</li>";
                }
                ?>
              </ol>
            </td>
          </tr>
          <tr>
            <td>Size of Company:</td>
            <td class="text-center"><?php echo $sizeOfCompany?></td>
          </tr>
        </table>

      </div>
      <div class="tab-pane fade show" id="list-History" role="tabpanel" aria-labelledby="list-History-list">
      .......
      </div>
    </div>
  </div>
</div>
</div>
  <div class="card-img-top">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" >
        <div class="carousel-item active">
          <img src="<?php echo $f1Image?>" style="max-width:100%;height:320px;padding:10px;" class="d-block w-100" alt="<?php $nameOfCompany?>+ image">
        </div>
        <div class="carousel-item">
          <img src="<?php echo $f2Image ?>" style="max-width:100%;height:320px;padding:10px;" class="d-block w-100" alt="<?php $nameOfCompany?>+ image">
        </div>
        <div class="carousel-item">
          <img src="<?php echo $f3Image ?>" style="max-width:100%;height:320px;padding:10px;" class="d-block w-100" alt="<?php $nameOfCompany?>+ image">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>

<?php include "../partials/footer.php" ?>