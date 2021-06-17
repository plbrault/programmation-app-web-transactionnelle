const API_URL = 'api/tasks';

async function updateTask(id, description, isChecked) {
  let labelTag = document.getElementBy
  
  let response = await fetch(`${API_URL}/${id}`, {
    method: 'put',
    body: JSON.stringify({
      description,
      is_checked: isChecked,
    })
  });
  if (response.ok) {
    console.log(`Task updated successfully: ${id}`);
  } else {
    alert('Une erreur est survenue.');
  }
}

window.onload = () => {
  let checkboxes = document.getElementsByTagName('input');
  console.log(checkboxes);
  for(let i = 0; i < checkboxes.length; i++) { // Je n'utilise pas forEach car le résultat est un objet et non un tableau
    let checkbox = checkboxes[i];
    let dataTag = checkbox.parentNode;
    let labelTag = dataTag.getElementsByTagName('label')[0];
    
    let taskId = dataTag.value;
    let taskDescription = labelTag.innerHTML;

    checkbox.addEventListener('change', (event) => {
      let isChecked = event.target.checked;
      updateTask(taskId, taskDescription, isChecked);
    });
  };
};
