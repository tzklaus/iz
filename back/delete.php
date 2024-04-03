<?php

require_once 'note.php';

$deletedNote = (new Note)->delete($_POST['id']);