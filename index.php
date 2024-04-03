<?php
    require_once 'back/note.php';

    $notesList = (new Note)->getList();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Заметки</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="notes-list">
            <h1 class="note-list-title">
                Список записей:
            </h1>
            <? foreach ($notesList as $notesItem): ?>
            <div class="notes-list-item">
                <div class="notes-list-item-del" data-id="<?=$notesItem['id']?>" onclick="deleteNote()">
                    x
                </div>
                <div class="notes-list-item-upd" data-id="<?=$notesItem['id']?>" onclick="updateNote()">
                    Редактировать
                </div>
                <div class="notes-list-item-date"><?=$notesItem['created_at']?></div>
                <div class="notes-list-item-id">[<?=$notesItem['id']?>]</div>
                <h3 class="notes-list-item-title js-edited js-title"><?=$notesItem['title']?></h3>
                <div class="notes-list-item-content js-edited js-content"><?=$notesItem['content']?></div>
                <button class="notes-list-item-save" onclick="saveNote()" data-id="<?=$notesItem['id']?>">
                    Сохранить
                </button>
            </div>
            <? endforeach; ?>
        </div>
        <form action="" class="new-note">
            <h2 class="new-note-info">
                Добавление новой записи:
            </h2>
            <label for="" class="lbl-field new-note-title">
                <span>
                    Заголовок записи
                </span>
                <br>
                <input type="text" name="title" required>
            </label>
            <br>
            <label for="" class="lbl-field new-note-content">
                <span>
                    Текст записи
                </span>
                <br>
                <textarea name="content" id="" cols="30" rows="10" required></textarea>
            </label>
            <br>
            <button type="submit">
                Создать
            </button>
        </form>
    </div>
    <script
        src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous"></script>
    <script src="scripts.js"></script>
</body>
</html>