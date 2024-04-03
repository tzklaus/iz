<?php

require_once 'note.php';

$updatedNote = (new Note)->update($_POST['id'], $_POST['title'], $_POST['content']);

$json = json_encode($updatedNote);

echo $json;