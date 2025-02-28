<?php

//get youtube api key for api call
$API_key = $configs['youtube_api'];

//get the video id from the URI on GET form submission
$videoID = $_GET['videoId'];
$videoData = 'https://www.googleapis.com/youtube/v3/videos?part=snippet,statistics&id='.$videoID.'&key='.$API_key.'';

$youtubeVideo = json_decode(file_get_contents($videoData));
$videoMeta = $youtubeVideo->items[0];

$likeDislikeRatio = ($videoMeta->statistics->likeCount +  $videoMeta->statistics->dislikeCount);
$likePercent = (($videoMeta->statistics->likeCount) / $likeDislikeRatio) * 100;
$dislikePercent = (($videoMeta->statistics->dislikeCount) / $likeDislikeRatio) * 100;
//include partial with header template
include('partials/header.php');
?>
<div class="container" style="margin-top:20px;">
    <div class="row">
        <div class="col-sm-9">
            <h1><?php echo $videoMeta->snippet->channelTitle; ?> : <?php echo $videoMeta->snippet->title; ?></h1>

            <img src="<?php echo $videoMeta->snippet->thumbnails->maxres->url; ?>" alt="Video Thumbnail" style="max-width:100%;">
            <p>
                Video URL: <a href="https://www.youtube.com/watch?v=<?php echo $videoID; ?>"><code>https://www.youtube.com/watch?v=<?php echo $videoID; ?></code></a>
            </p>
            <div class="row">
                <div class="col">
                    <h2>Video Description</h2>
                    <p><?php echo $videoMeta->snippet->description; ?></p>
                    <p><a href="https://www.youtube.com/watch?v=<?php echo $videoMeta->id; ?>" class="btn btn-primary">Watch Now!</a></p>
                </div>
                <div class="col">
                    <h2>Video Statistics</h2>
                    <h3>Likes / Dislikes</h3>
                    <div class="progress" style="height:30px;margin-bottom:10px;">
                        <div class="progress-bar bg-default" role="progressbar" style="width: <?php echo number_format($likePercent); ?>%" aria-valuenow="<?php echo number_format($likePercent); ?>" aria-valuemin="0" aria-valuemax="100"><?php echo number_format($likePercent); ?>%</div>
                        <div class="progress-bar bg-danger" role="progressbar" style="width:<?php echo number_format($dislikePercent); ?>%" aria-valuenow="<?php echo number_format($dislikePercent); ?>" aria-valuemin="0" aria-valuemax="100"><?php echo number_format($dislikePercent); ?>%</div>
                    </div>
                    <h3>Numbers</h3>
                    <ul>
                        <li><?php echo "Video view count: " .number_format($videoMeta->statistics->viewCount); ?></li>
                        <li><?php echo "Like count: " .number_format($videoMeta->statistics->likeCount) ." (".number_format($likePercent) .")%"; ?></li>
                        <li><?php echo "Dislike count: " .number_format($videoMeta->statistics->dislikeCount) ." (".number_format($dislikePercent) .")%"; ?></li>
                        <li><?php echo "Comment count: " .number_format($videoMeta->statistics->commentCount); ?></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-sm-3 bg-light" style="padding:20px;">
            <h2>Top 5 Channel Queries</h2>
            <ul>
                <li>1: </li>
                <li>2: </li>
                <li>3: </li>
                <li>4: </li>
                <li>5: </li>
            </ul>
            <h2>Top 5 Video Queries</h2>
            <ul>
                <li>1: </li>
                <li>2: </li>
                <li>3: </li>
                <li>4: </li>
                <li>5: </li>
            </ul>
        </div>
    </div>
</div>
<?php
//include partial with footer template.
include('partials/footer.php');