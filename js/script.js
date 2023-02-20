const taskList = document.querySelector('ul');
const addForm = document.getElementById('add-form');
const updateForm = document.getElementById('update-form');

taskList.addEventListener('click', function (e) {
    const taskContainer = e.target.closest('li div.flex');
    if (!taskContainer) {
        return;
    }
    taskContainer.classList.toggle('line-through');

    const icon = taskContainer.querySelector('div .bi');
    icon.classList.toggle('bi-circle');
    icon.classList.toggle('bi-check-circle-fill');

    const buttons = taskContainer.parentNode.querySelectorAll('button');
    for (const button of buttons) {
        button.classList.toggle('hidden');
    }
});

document.getElementById('new-task-btn').addEventListener('click', function () {
    addForm.classList.toggle('hidden');
});

function updateTask(id) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            updateForm.querySelector('textarea[name="task"]').value = JSON.parse(this.responseText);
        }
    };
    xhttp.open("POST", "get_task.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("id=" + id);

    updateForm.querySelector('input[name ="id"]').value = id;
    updateForm.classList.remove('hidden');
}

taskList.addEventListener('click', function (e) {
    if (e.target.matches('.remove-icon')) {
        updateForm.classList.remove('hidden');
    }
});