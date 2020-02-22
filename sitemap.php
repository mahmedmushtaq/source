<?php
/**
 * Created by PhpStorm.
 * User: M Ahmed Mushtaq
 * Date: 8/11/2019
 * Time: 12:40 PM
 */
require "php_classes/connection.php";
//sitemap limit 50,000 urls
$result = mysqli_query($con,"SELECT post_link FROM posts_data")  or die(mysqli_error($con));

$base_url = "https://localhost/source/";

header("Content-Type: application/xml; charset=utf-8");

echo '<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL;

echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" 
     xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" 
     xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 
     http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">' . PHP_EOL;

while($row = mysqli_fetch_array($result)){

    echo '<url>'.PHP_EOL;
    echo '<loc>'.$base_url.$row['post_link'].'</loc>'.PHP_EOL;
    echo '<changefreq>always</changefreq>'.PHP_EOL;
    echo '</url>' . PHP_EOL;


}

echo '</urlset>' . PHP_EOL;


?>