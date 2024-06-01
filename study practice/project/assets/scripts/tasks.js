let addTaskButton = document.getElementById('addTaskInCreatingTasks');
let listTasks = document.getElementById('listTasks');

addTaskButton.addEventListener('click', function (event) {
    event.preventDefault();
    let newTaskInput = document.createElement('input');
    newTaskInput.type = 'text';
    newTaskInput.name = 'taskNames[]';
    newTaskInput.placeholder = 'Задача';
    newTaskInput.required = true;
    listTasks.appendChild(newTaskInput);
});