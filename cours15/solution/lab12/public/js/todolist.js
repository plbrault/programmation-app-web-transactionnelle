const API_URL = 'api/tasks';

function onCheckboxChange(event) {
  let dataTag = event.target.parentNode;
  let labelTag = dataTag.getElementsByTagName('label')[0];
  
  let taskId = dataTag.value;
  let taskDescription = labelTag.innerHTML;

  let isChecked = event.target.checked;
  updateTask(taskId, taskDescription, isChecked);
} 

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

    let newTaskElement = document.createElement('li');

    let listItemId = `task_${newTaskId}`;
    let checkboxId = `${listItemId}_${newTaskId}_checkbox`;

    newTaskElement.innerHTML = `
      <li id="${listItemId}">
        <data value="${newTaskId}">
          <input id="${checkboxId}" type="checkbox" /><label for="${checkboxId}">${description}</label>
        </data>
      </li>
    `;
    newTaskElement.onchange = onCheckboxChange;

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

window.onload = () => {
  let checkboxes = document.getElementById('task_list').getElementsByTagName('input');
  console.log(checkboxes);
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
};
