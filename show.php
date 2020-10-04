<?php
// show.php

// подгрузка логики, функций для работы с базой данных
require_once 'model.php';

// get запрос
$post = get_post_by_id($_GET['id']);

require 'templates/show.php';
