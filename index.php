<?php include('inc/head.php');

$path = realpath('files');
$objects = new RecursiveIteratorIterator
(new RecursiveDirectoryIterator($path, RecursiveDirectoryIterator::SKIP_DOTS),
    RecursiveIteratorIterator::SELF_FIRST);

if (isset($_POST['submit'])) {
    $file = fopen($_POST['file'], "w");
    fwrite($file, $_POST['content']);
    fclose($file);
}
foreach ($objects as $name => $object) :
    ?>
    <ul>
        <li>
            <a href="index.php?f=<?= $name ?>">
                <?= $name ?>
            </a>
            <form action="delete.php" method="POST">
                <input type="hidden" name="filename" value="<?= $name; ?>">
                <button type="submit">Delete</button>
            </form>
        </li>
    </ul>
<?php endforeach; ?>
<?php if (isset($_GET['f']) AND in_array(mime_content_type($_GET['f']),['text/plain', 'text/html'] )) : ?>
    <form action="index.php" method="post">
        <textarea name="content" cols="105" rows="15"><?= file_get_contents($_GET['f']) ?></textarea>
        <input type="hidden" name="file" value="<?= $_GET['f'] ?>">
        <input type="submit" value="Submit" name="submit">
    </form>
<?php endif; ?>
<?php include('inc/foot.php'); ?>