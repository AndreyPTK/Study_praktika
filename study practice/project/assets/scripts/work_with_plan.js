// document.addEventListener('DOMContentLoaded', (event) => {
//     const addTaskButton = document.getElementById('addTask');
//     const taskTableBody = document.querySelector('.table_vtoraya tbody');
//     const inpTextTask = document.getElementById('inptexttask');
//     const inpDateTask = document.getElementById('intdatetask');
//     const selectTask = document.getElementById('selecttask');

//     addTaskButton.addEventListener('click', (event) => {
//         event.preventDefault();

//         const taskName = inpTextTask.value;
//         const taskDate = inpDateTask.value;
//         const taskPerformer = selectTask.options[selectTask.selectedIndex].text;

//         if (taskName && taskDate && taskPerformer) {
//             const newRow = document.createElement('tr');

//             newRow.innerHTML = `
//                 <td class="td_inTable">${taskName}</td>
//                 <td class="td_inTable">${taskDate}</td>
//                 <td class="td_inTable">${taskPerformer}</td>
//             `;

//             // Добавляем новую строку перед строкой с полями ввода
//             taskTableBody.insertBefore(newRow, taskTableBody.lastElementChild);

//             // Очищаем поля ввода для новых данных
//             inpTextTask.value = '';
//             inpDateTask.value = '';
//             selectTask.selectedIndex = 0;
//         } else {
//             alert('Пожалуйста, заполните все поля.');
//         }
//     });
// });
// alert('asd')