<?php $files = "*.*";
foreach ( glob($files ) as $scan ){
    $hash = md5( join ( file ( $scan ) ) );
    if ( in_array( $hash, file("$progDir/data/hashes.txt") ) ){
        message("ยศะภั");
    }
}
