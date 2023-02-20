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

    const button = taskContainer.parentNode.querySelector('button');
    button.classList.toggle('bi-trash');
    button.classList.toggle('update-icon');
    button.classList.toggle('remove-icon');
    button.classList.toggle('bi-pencil-square');
});

document.getElementById('new-task-btn').addEventListener('click', function () {
    addForm.classList.toggle('hidden');
});

taskList.addEventListener('click', function (e) {
    if (e.target.matches('.update-icon')) {
        updateForm.classList.toggle('hidden');
    }
});

taskList.addEventListener('click', function (e) {
    if (e.target.matches('.remove-icon')) {
        updateForm.classList.toggle('hidden');
    }
});