<?php
// model.php бизнес-логика

// доп. функция, подсоединиться к базе данных
function open_database_connection()
{
    $link = new PDO("mysql:host=localhost;dbname=blog_db", 'mysql', 'mysql');

    return $link;
}
// доп. функция, отсоединиться от базы данных
function close_database_connection(&$link)
{
    $link = null;
}

// получить массив всех постов
function get_all_posts()
{
    $link = open_database_connection();

    $result = $link->query('SELECT id, title FROM post');

    $posts = array();
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $posts[] = $row;
    }
    close_database_connection($link);

    return $posts;
}

// взять пост по его айди из базы данных
function get_post_by_id($id)
{
    $link = open_database_connection();

    $query = 'SELECT created_at, title, body FROM post WHERE  id=:id';
    $statement = $link->prepare($query);
    $statement->bindValue(':id', $id, PDO::PARAM_INT);
    $statement->execute();

    $row = $statement->fetch(PDO::FETCH_ASSOC);

    close_database_connection($link);

    return $row;
}