<?php
    header("Content-Type: application/rss+xml; charset=ISO-8859-1");
 
    $rssfeed = '<?xml version="1.0" encoding="ISO-8859-1"?>';
    $rssfeed .= '<rss version="2.0">';
    $rssfeed .= '<channel>';
    $rssfeed .= '<title>Change This Title</title>';
    $rssfeed .= '<link>https://www.athleticprospects.com</link>';
    $rssfeed .= '<description>Athletic Prospects RSS feed</description>';
    $rssfeed .= '<language>en-us</language>';
    $rssfeed .= '<copyright>Copyright (C) 2019 athleticprospects.com</copyright>';
 
    $connection = mysqli_connect('127.0.0.1', 'root', 'y#GbqXtBGcy!z3Cf', 'sports')
        or die('Could not connect to database');
 
    $query = "SELECT * FROM podcasts ORDER BY id DESC";
    $result = mysqli_query($connection, $query) or die ("Error");
 
    while($row = mysqli_fetch_array($result)) {
        extract($row);

        $rssfeed .= '<item>';
        $rssfeed .= '<title>' . $title . '</title>';
        $rssfeed .= '<description>' . $description . '</description>';
        //$rssfeed .= "<itunes:owner>";
        //$rssfeed .= "<itunes:name>keith Prestano</itunes:name>";
        //$rssfeed .= "<itunes:email>kprestano@athleticprospects.com</itunes:email>";
        //$rssfeed .= "</itunes:owner>";
        $rssfeed .= "<itunes:image href='/assets/img/black.JPG' />";
        $rssfeed .= "<itunes:category text='sports'/>";
        $rssfeed .= "<link>https://www.athleticprospects.com</link>";
        $rssfeed .= '<pubDate>' . date("D, d M Y H:i:s O", strtotime($post_date)) . '</pubDate>';
        $rssfeed .= "<itunes:explicit>no</itunes:explicit>";
        $rssfeed .= "<enclosure url='https://www.athleticprospects.com/assets/audio/" . $podcast . ".mp3' length='". $filesize ."' type='audio/mpeg' />";
        $rssfeed .= "<guid>https://www.athleticprospects.com/assets/audio/" . $podcast . ".mp3</guid>";
        $rssfeed .= '</item>';
    }
 
    $rssfeed .= '</channel>';
    $rssfeed .= '</rss>';
 
    echo $rssfeed;
?>
