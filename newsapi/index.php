<!DOCTYPE html>
<html lang="en">
    <?php $title = "News API"?>
    <?php include "includes/header.php" ?>
    
<body>
    <?php
        $url = 'http://newsapi.org/v2/top-headlines?sources=techcrunch&apiKey=c6a44802bb6b448eaec67c5f51bc04bb';
        $response = file_get_contents($url);
        $NewsData = json_decode($response);
    ?>
    <?php include "includes/nav.php" ?>
    <div class="container-fluid">
        <?php
        foreach($NewsData->articles as $news)
        { 
        ?>
        <div class="row">
            <div class="image-column">
                <img src="<?php  echo $news->urlToImage ?>">  
            </div>
            <div class="text-column">
                <h3><?php echo $news->title?></h3>
                <h5><?php echo $news->description ?></h5>
                <p><?php echo $news->content ?> </p>
                <h5>Source: <a href="<?php echo $news->url ?>">link</a></h5>
                <h6>Published: <?php echo $news->publishedAt ?></h6>
            </div>
        </div>
        <div>
        <?php
        }
        ?>
        </div>
    </div>
</body>
</html>