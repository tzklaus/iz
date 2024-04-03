
$('.new-note').on('submit', function(e){
    e.preventDefault();
    let $this = $(this);
    let data = $this.serialize();

    $.ajax({
        method: 'post',
        data: data,
        url: '/back/create.php',
        success: function(response) {
            insertNote(JSON.parse(response));
        },
        error: function(response){
            console.log(response);
        }
    })
})

function updateNote(){
    let currentEl = event.target;
    let parentEl = currentEl.parentElement;
    console.dir(currentEl);
    $(parentEl).find('.js-edited').prop('contenteditable', true);
    $(parentEl).find('.notes-list-item-save').css('display', 'block');
}

function saveNote () {
    let currentEl = event.target;
    let parentEl = currentEl.parentElement;
    let id = currentEl.dataset.id;
    let titleEl = $(parentEl).find('.js-title');
    let contentEl = $(parentEl).find('.js-content');

    $.ajax({
        method: 'post',
        data: 'id=' + id + '&title=' + titleEl.text() + '&content=' + contentEl.text(),
        url: '/back/update.php',
        success: function(response){
            // parentEl.remove();
            let note = JSON.parse(response)
            titleEl.html(note.title);
            titleEl.prop('contenteditable', false);
            contentEl.html(note.content);
            contentEl.prop('contenteditable', false);
            $(parentEl).find('.notes-list-item-save').css('display', 'none');
        },
        error: function(response){
            console.log(response);
        }
    })
}

function deleteNote (){
    let currentEl = event.target;
    let id = currentEl.dataset.id;
    let parentEl = currentEl.parentElement;
    $.ajax({
        method: 'post',
        data: 'id=' + id,
        url: '/back/delete.php',
        success: function(response){
            parentEl.remove();
        },
        error: function(response){
            console.log(response);
        }
    })
}

function insertNote(note){
    $('.notes-list').append(`
        <div class="notes-list-item">
            <div class="notes-list-item-del" data-id="${note.id}" onclick="deleteNote()">
                x
            </div>
            <div class="notes-list-item-upd" data-id="${note.id}" onclick="updateNote()">
                Редактировать
            </div>
            <div class="notes-list-item-date">${note.created_at}</div>
            <div class="notes-list-item-id">[${note.id}]</div>
            <h3 class="notes-list-item-title js-edited js-title">${note.title}</h3>
            <div class="notes-list-item-content js-edited js-content">${note.content}</div>
            <button class="notes-list-item-save" onclick="saveNote()">
                Сохранить
            </button>

        </div>
    `)
}