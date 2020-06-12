<?php
function initCallingAPI()
{
    $response = file_get_contents('https://www.themuse.com/api/public/companies?page=1');
    $response = json_decode($response, true);

    return $response;
}
function convertUTCToLocalTime($orgDate)
{
    $date   = new DateTime($orgDate,new DateTimeZone("+2:00"));
    $newDate= $date->format("d-M-Y");
    return $newDate;
}

function getIdByName($name,$response)
{
  $results=$response['results'];
  foreach ($results as $result)
  {
    $nameOfCompany=$result['name'];
    if($name==$nameOfCompany)
    {
      return $result['id'];
    } 
  }
  retrun -1;
}

$response=initCallingAPI();
$numOfPage=$response['page'];
$numOfPages=$response['page_count'];
$results=$response['results'];
foreach ($results as $result)
{
  $desciption=$result['description'];
  $nameOfCompany=$result['name'];

  $locations=$result['locations'];
  $numOfLocations=sizeof($locations);
  foreach($locations as $location)
  {
    echo $location['name'];
  }
  $industries=$result['industries'];
  foreach($industries as $industry)
  {
    echo $industry['name'];
  }

  $publication_date=convertUTCToLocalTime($result['publication_date']);

  $id=$result['id'];
  $sizeOfCompany=$result['size']['short_name'];
  
  //urls
  $logoImage=$result['refs']['logo_image'];
  $f1Image=$result['refs']['f1_image'];
  $f2Image=$result['refs']['f2_image'];
  $f3Image=$result['refs']['f3_image'];
}
?>