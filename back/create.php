<?php

require_once 'note.php';

$createdNote = (new Note($_POST['title'], $_POST['content']))->create();

$json = json_encode($createdNote);

echo $json;