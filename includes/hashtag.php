<?php
function convertHashTags($str) {
    $regex = "/#+([a-zA-Z0-9_]+)/";
    $str = preg_replace($regex, '<a href="hashtag.php?tag=$1">$0</a>', $str);
    return($str);
}
?>