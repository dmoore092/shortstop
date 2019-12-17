<?php
    header("Content-Type: application/rss+xml; charset=ISO-8859-1");
 
    $rssfeed = '<?xml version="1.0" encoding="ISO-8859-1"?>';
    $rssfeed .= '<rss version="2.0" xmlns:itunes="http://www.itunes.com/dtds/podcast-1.0.dtd" xmlns:content="http://purl.org/rss/1.0/modules/content/">';
    $rssfeed .= '<channel>';
    $rssfeed .= '<title>Athletic Prospects</title>';
    $rssfeed .= '<link>https://www.athleticprospects.com</link>';
    $rssfeed .= "<itunes:author>Athletic Prospects</itunes:author>";
    $rssfeed .= '<description>Athletic Prospects RSS feed</description>';
    //$rssfeed .= "<itunes:type>episodic</itunes:type>";
    $rssfeed .= "<itunes:owner>";
    $rssfeed .= "<itunes:name>Athletic Prospects</itunes:name>";
    $rssfeed .= "<itunes:email>kprestano@athleticprospects.com</itunes:email>";
    $rssfeed .= "</itunes:owner>";
    $rssfeed .= "<itunes:image href='https://www.athleticprospects.com/assets/img/podcastImage.jpg' />";
    $rssfeed .= "<itunes:category text='Sports'><itunes:category text='Baseball'/></itunes:category>";
    $rssfeed .= "<itunes:explicit>false</itunes:explicit>";
    $rssfeed .= '<language>en-us</language>';
    $rssfeed .= '<copyright>Copyright (C) 2019 athleticprospects.com</copyright>';
 
    $connection = mysqli_connect('127.0.0.1', 'root', 'y#GbqXtBGcy!z3Cf', 'sports')
        or die('Could not connect to database');
 
    $query = "SELECT * FROM podcasts ORDER BY id DESC";
    $result = mysqli_query($connection, $query) or die ("Error");
 
    while($row = mysqli_fetch_array($result)) {
        extract($row);

        $episodeCount = 1;
        $rssfeed .= '<item>';
        //$rssfeed .= "<itunes:episode>". $episodeCount ."</itunes:episode>";
        $rssfeed .= '<itunes:title>' . $title . '</itunes:title>';
        $rssfeed .= "<author>Keith Prestano</author>";
        $rssfeed .= '<description>' . $description . '</description>';
        $rssfeed .= "<link>https://www.athleticprospects.com</link>";
        $rssfeed .= '<pubDate>' . date("D, d M Y H:i:s O", strtotime($post_date)) . '</pubDate>';
        $rssfeed .= "<itunes:explicit>false</itunes:explicit>";
        $rssfeed .= "<enclosure url='https://www.athleticprospects.com/assets/audio/" . $podcast . ".mp3' length='". $filesize ."' type='audio/mpeg' />";
        $rssfeed .= "<guid>https://www.athleticprospects.com/assets/audio/" . $podcast . ".mp3</guid>";
        $rssfeed .= '</item>';
        $episodeCount++;
    }
 
    $rssfeed .= '</channel>';
    $rssfeed .= '</rss>';
 
    echo $rssfeed;
?>
