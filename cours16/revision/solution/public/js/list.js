async function updateList() {
  let response = await fetch('api/appointments');
  let appointments = await response.json();

  let newTbody = document.createElement('tbody');
  appointments.forEach((appointment) => {
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
