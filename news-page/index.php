<?php include "./../secret.php" ?>
<?php include "./../partials/header.php" ?>
<?php include "./../partials/navbar.php" ?>


<div class="news-page">
    <?php
    $response = file_get_contents('http://newsapi.org/v2/everything?q=stock&apiKey=' . $NEWS_API . '&language=en&pageSize=100');
    $response = json_decode($response, true);

    $articles = $response["articles"];
    foreach ($articles as $article) {
    ?>
        <div class="card article-container">
            <div class="card-body ">
                <h5 class="card-title main-heading"><?php echo $article["title"] ?></h5>
                <div class="article-meta">
                    <h6 class="card-subtitle mb-2 text-muted subtitle"><?php echo $article["source"]["name"] ?></h6>
                    <h6 class="card-subtitle mb-2 text-muted subtitle">| <i class="far fa-clock"></i> <?php echo substr($article["publishedAt"], 0, strpos($article["publishedAt"], "T")) ?></h6>
                </div>
                <div class="article-image">
                    <img src=<?php echo $article["urlToImage"] ?> alt="BBC Image" class="rounded">
                </div>
                <div class="card-text">
                    <p class="article-description"><?php echo $article["description"] ?> </p>
                    <a href=<?php echo $article["url"] ?> class="card-link"> See More</a>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</div>

<script src="./js/index.js"></script>

<?php include "./../partials/footer.php" ?>