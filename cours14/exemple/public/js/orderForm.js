let nextItemKey = 0;

function createHotDogElement() {
  let element = document.createElement('fieldset');
  element.innerHTML = `
    <legend>Hot Dog</legend>
    <input type="hidden" name="items[${nextItemKey}][type]" value="hotdog" />
    
    <input id="item-${nextItemKey}-ketchup" type="checkbox" name="items[${nextItemKey}][condiments][]" value="ketchup" />
    <label for="item-${nextItemKey}-ketchup">Ketchup</label>

    <input id="item-${nextItemKey}-moutarde" type="checkbox" name="items[${nextItemKey}][condiments][]" value="moutarde" />
    <label for="item-${nextItemKey}-moutarde">Moutarde</label>
    
    <input id="item-${nextItemKey}-relish" type="checkbox" name="items[${nextItemKey}][condiments][]" value="relish" />
    <label for="item-${nextItemKey}-relish">Relish</label>    
  `;
  nextItemKey++;
  return element;
}

window.onload = () => {
  let form = document.getElementById('order-form');
  let submitButton = document.getElementById('submit-button');

  document.getElementById('add-item-select').addEventListener('change', (event) => {
    let itemType = event.target.value;
    
    switch (itemType) {
      case 'hotdog':
        form.insertBefore(createHotDogElement(), submitButton);
        break;
      case 'hamburger':
        break;
      case 'frites':
        break;
    }
    
    event.target.value = "";
    submitButton.disabled = false;
  });
};
