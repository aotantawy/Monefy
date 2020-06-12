<?php
function initCallingAPI()
{
    
    $id=11824;
    $response = file_get_contents('https://www.themuse.com/api/public/companies/'.$id);
    $response = json_decode($response, true);

    return $response;
}
function convertUTCToLocalTime($orgDate)
{
    $date   = new DateTime($orgDate,new DateTimeZone("+2:00"));
    $newDate= $date->format("d-M-Y");
    return $newDate;
}

$result=initCallingAPI();

$desciption=$result['description'];
$nameOfCompany=$result['name'];
$locations=$result['locations'];
$numOfLocations=sizeof($locations);
foreach($locations as $location)
{
  echo $location['name']."<br>";
}
$industries=$result['industries'];
foreach($industries as $industry)
{
  echo $industry['name']."<br>";
}

$publication_date=convertUTCToLocalTime($result['publication_date']);

$id=$result['id'];
$sizeOfCompany=$result['size']['short_name'];

//urls
$logoImage=$result['refs']['logo_image'];
$f1Image=$result['refs']['f1_image'];
$f2Image=$result['refs']['f2_image'];
$f3Image=$result['refs']['f3_image'];
echo "<br>"."<br>";


/*
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
*/
?>