<?php
/**
 * Created by PhpStorm.
 * User: louise
 * Date: 14/05/18
 * Time: 13:33
 */
$dir = $_POST['filename'];
if (is_dir($dir)) { // si le paramètre est un dossier
    $objects = scandir($dir); // on scan le dossier pour récupérer ses objets
    foreach ($objects as $object) { // pour chaque objet
        if ($object != "." && $object != "..") { // si l'objet n'est pas . ou ..
            rmdir($dir . "/" . $object);
            unlink($dir . "/" . $object); // on supprime l'objet
        }
    }
    reset($objects); // on remet à 0 les objets
    rmdir($dir); // on supprime le dossier
} else {
    unlink($dir);
}

header("Location:index.php");
exit();
