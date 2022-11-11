<?php global $count;
$count = 0;
c("scan")->toFront();
if ( file_exists("$progDir/data/lastUpdate.ozd") ){
    c("baseLastUpdate")->caption = file_get_contents("$progDir/data/lastUpdate.ozd");
}
