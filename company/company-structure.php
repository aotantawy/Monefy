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
$industries=$result['industries'];
$publication_date=convertUTCToLocalTime($result['publication_date']);
$id=$result['id'];
$sizeOfCompany=$result['size']['short_name'];
//urls
$logoImage=$result['refs']['logo_image'];
$f1Image=$result['refs']['f1_image'];
$f2Image=$result['refs']['f2_image'];
$f3Image=$result['refs']['f3_image'];
$miniF1Image=$result['refs']['mini_f1_image'];
?>