<!DOCTYPE html>
<html lang="en">
<head>
    <title>Project</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- import bootstrap 4.0.0 then custom styles-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
    @import url('https://fonts.googleapis.com/css?family=Ubuntu');
    body{
    font-family: Ubuntu, sans-serif;
    }
    h1, h2, h3, h4, h5, h6 {
    margin:0px 0px 18px 0px;
    padding:0px;
    }
    <style type="text/css">
    .navbar-brand{
    font-weight:800;
    }
    .videoCard{
    margin:20px 0px 0px;
    }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/"><span style="color: #1155cc">Stats of </span>
        <span style="color: #ff0000;">YouTube</span></span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>`

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

            </ul>
            <form class="form-inline my-2 my-lg-0" action="channel.php" method="get" style="margin-right:10px;">
                <input name="channel" class="form-control mr-sm-2" type="channel" placeholder="Channel ID" aria-label="channel" value="UCK8sQmJBp8GCxrOtXWBpyEA">
                <button class="btn btn-success my-2 my-sm-0" type="submit">Channel Details!</button>
            </form>
            <form class="form-inline my-2 my-lg-0" action="video.php" method="get">
                <input type="videoId" name="videoId" class="form-control mr-sm-2" placeholder="Video ID" aria-label="videoId" value="lkfpqGWzHCE">
                <button class="btn btn-default my-2 my-sm-0" type="submit" >Video Details!</button>
            </form>
        </div>
    </nav>