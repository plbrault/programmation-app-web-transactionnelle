// Cette fonction est appelée toutes les 30 secondes
async function updateList() {
  /* AJOUTER DU CODE CI-DESSOUS */

  /* FIN DU CODE AJOUTÉ */

  let newTbody = document.createElement('tbody');
  appointments.forEach((appointment) => { // La variable appointments est un tableau de rendez-vous récupéré via AJAX
    let tr = document.createElement('tr');
    tr.innerHTML = `
      <td>${appointment.date}</td>
      <td>${appointment.time}</td>
      <td>${appointment.last_name}</td>
      <td>${appointment.first_name}</td>
      <td>${appointment.phone_number}</td>
      <td>${appointment.email}</td>
      <td>${appointment.confirmation_number}</td>      
    `;
    newTbody.append(tr);
  });
  document.getElementById('task_table_body').innerHTML = newTbody.innerHTML;
}

window.onload = () => {
  setInterval(updateList, 30000);
};
