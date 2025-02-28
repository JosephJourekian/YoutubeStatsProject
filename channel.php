<?php
//get videos from channel by youtube data API

$configs      = include('config.php');
$API_key      = $configs['youtube_api'];

$channelID     = $_GET['channel'];
$maxResults   = 10;
$youtubeURL = 'https://www.googleapis.com/youtube/v3/search?order=viewCount&part=snippet&channelId='.$channelID.'&maxResults='.$maxResults.'&key='.$API_key.'';
$youtubeChannel = 'https://www.googleapis.com/youtube/v3/channels?part=snippet,statistics&id='.$channelID.'&key='.$API_key;
$channelInfo = json_decode(file_get_contents($youtubeChannel));

$json = file_get_contents($youtubeURL);
$videoList = json_decode($json);

// Testing dumps. Lazyyyyy. Don't do this.
// var_dump($channelID);
// var_dump($youtubeURL);
// var_dump($json);
// var_dump($videoList);

include('partials/header.php'); ?>

  <div class="container" style="margin-top:30px;">
    <div class="row">
      <div class = "col-sm-12">
        <div class="jumbotron">
          <div class="row">
            <div class="col">
            <h1 class="display-4"><img style = "float: left; width: 150px; height: 150px;" src = "<?php echo $channelInfo->items[0]->snippet->thumbnails->medium->url; ?>" alt = "Channel Thumbnail"><?php echo $channelInfo->items[0]->snippet->title; ?></h1>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <h2>Channel Information</h2>
              <h5><?php echo "Total video views: " .number_format($channelInfo->items[0]->statistics->viewCount); ?></h5>
              <h5><?php echo "Total video count: " .number_format($channelInfo->items[0]->statistics->videoCount); ?></h5>
              <h5><?php echo "Total Subscriber count: " .number_format($channelInfo->items[0]->statistics->subscriberCount); ?></h5>
            </div>
          </div>
        </div>
      </div>
          <?php

          $i = 1;
          foreach($videoList->items as $item)
          {
            //var_dump($item);?><br> <?php
            if(isset($item->id->videoId))
            { ?>
                <div class="col-sm-4">
                  <div class="card videoCard">
                    <img class="card-img-top" src="<?php echo $item->snippet->thumbnails->high->url; ?>" alt="<?php echo $item->snippet->title; ?>">
                    <div class="card-body">
                      <h5 class="card-title"><?php echo $i++; echo ": ".$item->snippet->title; ?></h5>
                      <p class="card-text">published on: <?php echo $item->snippet->publishedAt; ?></p>
                      <div class="row">
                       <div class="btn-group">
                          <form class="form-inline my-2 my-lg-0" action="video.php" method="get">
                            <button class="btn btn-success my-2 my-sm-0" type="submit" name="videoId" value="<?php echo $item->id->videoId; ?>">Video Details!</button>
                          </form>
                          <a href="https://www.youtube.com/watch?v=<?php echo $item->id->videoId; ?>" class="btn btn-primary">Watch Now!</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <?php
            }
          }
        ?>
    </div>
  </div>

<?php

include('partials/footer.php');

?>