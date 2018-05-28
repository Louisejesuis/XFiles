<?php
/**
 * Created by PhpStorm.
 * User: louise
 * Date: 14/05/18
 * Time: 13:33
 */
$dir = $_POST['filename'];
function delTree($dir) {
    $files = glob( $dir . '*', GLOB_MARK );
    foreach( $files as $file ){
        if( substr( $file, -1 ) == '/' )
            delTree( $file );
        else
            unlink( $file );
    }
    rmdir($dir);
}

delTree($dir);
header("Location:index.php");
exit();
