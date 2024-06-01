document.getElementById('addTaskInCreatingTasks').addEventListener('click', function() {
    const newTaskInput = document.createElement('input');
    newTaskInput.type = 'text';
    newTaskInput.placeholder = 'Задача';
    newTaskInput.required = true;
    document.getElementById('listTasks').appendChild(newTaskInput);
});