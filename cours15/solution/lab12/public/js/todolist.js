const API_URL = 'api/tasks';

async function addTask(description) {
  let response = await fetch(`${API_URL}`, {
    method: 'post',
    body: JSON.stringify({
      description,
    }),
  });
  if (response.ok) {
    console.log('Task created successfully');

    let responseData = await response.json();
    let newTaskId = responseData.id;

    let listItemId = `task_${newTaskId}`;
    let checkboxId = `${listItemId}_${newTaskId}_checkbox`;

    let newTaskElement = document.createElement('li');
    newTaskElement.id = listItemId;

    newTaskElement.innerHTML = 
      `<data value="${newTaskId}">` +
        `<input id="${checkboxId}" type="checkbox" />` +
        `<label for="${checkboxId}">${description}</label>` +
      `</data>`
    ;
    newTaskElement.onchange = onCheckboxChange;

    let deleteButton = document.createElement('a');
    deleteButton.classList.add('delete_button');
    deleteButton.innerHTML = '❎';
    deleteButton.onclick = onDeleteButtonClick;
    newTaskElement.children[0].append(deleteButton);

    let taskList = document.getElementById('task_list');
    taskList.append(newTaskElement);
  } else {
    alert('Une erreur est survenue.');
  }
}

async function updateTask(id, description, isChecked) {
  let response = await fetch(`${API_URL}/${id}`, {
    method: 'put',
    body: JSON.stringify({
      description,
      is_checked: isChecked,
    }),
  });
  if (response.ok) {
    console.log(`Task updated successfully: ${id}`);
  } else {
    alert('Une erreur est survenue.');
  }
}

async function deleteTask(id) {
  let response = await fetch(`${API_URL}/${id}`, {
    method: 'delete',
  });
  if (response.ok) {
    console.log(`Task deleted successfully: ${id}`);

    let taskElement = document.getElementById(`task_${id}`);
    taskElement.remove();
  } else {
    alert('Une erreur est survenue.');
  }
}

function onCheckboxChange(event) {
  let dataTag = event.target.parentNode;
  let labelTag = dataTag.getElementsByTagName('label')[0];
  
  let taskId = dataTag.value;
  let taskDescription = labelTag.innerHTML;

  let isChecked = event.target.checked;
  updateTask(taskId, taskDescription, isChecked);
}

function onDeleteButtonClick(event) {
  let dataTag = event.target.parentNode;
  deleteTask(dataTag.value);
}

window.onload = () => {
  let checkboxes = document.getElementById('task_list').getElementsByTagName('input');
  
  for(let i = 0; i < checkboxes.length; i++) { // Je n'utilise pas forEach car le résultat est un objet et non un tableau
    let checkbox = checkboxes[i];

    checkbox.addEventListener('change', onCheckboxChange);
  };

  let addTaskInput = document.getElementById('add_task_input');
  let addTaskButton = document.getElementById('add_task_button');

  addTaskInput.oninput = addTaskInput.oninput = () => {
    addTaskButton.disabled = (addTaskInput.value.trim() === '');
  };

  addTaskInput.onkeydown = (event) => {
    if (event.key === 'Enter') {
      addTaskButton.onclick();
    }
  }

  addTaskButton.onclick = () => {
    addTask(addTaskInput.value);
    addTaskInput.value = '';
    addTaskButton.disabled = true;
  };

  let deleteButtons = document.getElementsByClassName('delete_button');
  for (let i = 0; i < deleteButtons.length; i++) {
    let deleteButton = deleteButtons[i];

    deleteButton.onclick = onDeleteButtonClick;
  }
};
