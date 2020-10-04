<?php
// templates/list.php
?>

<?php $title = 'Список постов' ?>


<?php //сохраняет в буфер
ob_start() ?>
    <h1>Список постов </h1>
    <ul>
        <?php foreach ($posts as $post): ?>
        <li>
            <a href="/show.php?id=<?= $post['id'] ?>">
                <?= $post['title'] ?>
            </a>
        </li>
        <?php endforeach ?>
    </ul>
<?php // сохраняет в переменную content из буфера и отчищаем буфер
$content = ob_get_clean() ?>

<?php include 'layout.php' ?>