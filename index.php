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

// Testing dumps.
// var_dump($channelID);
// var_dump($youtubeURL);
// var_dump($json);
// var_dump($videoList);

include('partials/header.php'); ?>
<p>Made by Joseph Jourekian & Mattew Morin</p>
<div class="container" style="margin-top:30px;">
  <div class="row">
    <div class = "col">
    </div>
    <div class="col-sm-12">
      <h1>Welcome To Our Project</h1>
      <p>Please search for a YouTube Channel or Video ID to start your journey!</p>
    </div>
  </div>
</div>

<?php

include('partials/footer.php');

?>