<?php include "./partials/header.php" ?>
<?php include "./partials/navbar.php" ?>
<div class="card article-container">
    <div class="card-body ">
        <h5 class="card-title">Sudden Bitcoin Crash Sparks Serious Coinbase Warning</h5>
        <div class="article-meta">
            <h6 class="card-subtitle mb-2 text-muted subtitle">Source</h6>
            <h6 class="card-subtitle mb-2 text-muted subtitle">| <i class="far fa-clock"></i> 1-Jan-2030</h6>
        </div>
        <div class="article-image">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/62/BBC_News_2019.svg/1200px-BBC_News_2019.svg.png" alt="BBC Image" class="rounded">
        </div>
        <div class="card-text">
            <p class="article-description">An outage on major U.S. bitcoin and crypto exchange Coinbase just after bitcoin's price plummet left many users unable to trade—the second time in less than a month Coinbase has buckled under stress </p>
            <a href="#" class="card-link"> See More</a>
        </div>
    </div>
</div>

<?php

#$API_KEY="0b635679060d4386af2c576502d82ea1"
#$url = "https://newsapi.org/v2/everything?q=bitcoin&apiKey=$API_KEY";

$url = 'http://jsonplaceholder.typicode.com/posts';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_HTTPGET, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response_json = curl_exec($ch);
curl_close($ch);
$response=json_decode($response_json, true);
foreach($responses as $response){
    foreach($response as $key => $val){
        echo "$key: $val"."<br>" ;
    }
    echo "<br>";
}

?>
<!-- 
<div class="card article-container">
    <div class="card-body ">
        <h5 class="card-title">Sudden Bitcoin Crash Sparks Serious Coinbase Warning</h5>
        <div class="article-meta">
            <h6 class="card-subtitle mb-2 text-muted subtitle">Source</h6>
            <h6 class="card-subtitle mb-2 text-muted subtitle">| <i class="far fa-clock"></i> 1-Jan-2030</h6>
        </div>
        <div class="article-image">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/62/BBC_News_2019.svg/1200px-BBC_News_2019.svg.png" alt="BBC Image" class="rounded">
        </div>
        <div class="card-text">
            <p class="article-description">An outage on major U.S. bitcoin and crypto exchange Coinbase just after bitcoin's price plummet left many users unable to trade—the second time in less than a month Coinbase has buckled under stress </p>
            <a href="#" class="card-link"> See More</a>
        </div>
    </div>
</div>  -->


<?php include "./partials/footer.php" ?>