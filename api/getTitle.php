<?php
include_once "../base.php";

$type=$_GET['id'];
$news=$News->all(['type'=>$type]);

foreach($news as $n){
    echo "<a href='javascript:getNews({$n['id']})' style='display:block'>{$n['title']}</a>";

}

?>