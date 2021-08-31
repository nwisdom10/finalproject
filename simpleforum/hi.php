<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        <input id = 'vid' name='video'/>
        <br>
        <input type='submit'/>
    </form>
</body>
</html>

<?php

    if(isset($_POST['video'])){

        $text = $_POST['video'];
        echo "video link : " . $text . "<br>";
        $text = preg_replace("#.*youtube\.com/watch\?v=#" , "", $text);
        echo "the video ID : " . $text . "<br>";
        $text = '<iframe width="1280" height="800" src="https://www.youtube.com/embed/'.$text.'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
        echo $text;
    }