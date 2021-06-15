let nextItemKey = 0;

function createHamburgerElement() {
  let element = document.createElement('fieldset');
  element.innerHTML = `
    <legend>Hamburger</legend>
    <input type="hidden" name="items[${nextItemKey}][type]" value="hamburger" />
     
    <input id="item-${nextItemKey}-cheese" type="checkbox" name="items[${nextItemKey}][cheese]" />
    <label for="item-${nextItemKey}-cheese">Fromage</label>

    <input id="item-${nextItemKey}-pickles" type="checkbox" name="items[${nextItemKey}][pickles]" />
    <label for="item-${nextItemKey}-pickles">Cornichons</label>    

    <input id="item-${nextItemKey}-ketchup" type="checkbox" name="items[${nextItemKey}][condiments][]" value="ketchup" />
    <label for="item-${nextItemKey}-ketchup">Ketchup</label>

    <input id="item-${nextItemKey}-mustard" type="checkbox" name="items[${nextItemKey}][condiments][]" value="mustard" />
    <label for="item-${nextItemKey}-mustard">Moutarde</label>
    
    <input id="item-${nextItemKey}-relish" type="checkbox" name="items[${nextItemKey}][condiments][]" value="relish" />
    <label for="item-${nextItemKey}-relish">Relish</label>    
  `;
  nextItemKey++;
  return element;
}

function createHotDogElement() {
  let element = document.createElement('fieldset');
  element.innerHTML = `
    <legend>Hot Dog</legend>
    <input type="hidden" name="items[${nextItemKey}][type]" value="hotdog" />
        
    <input id="item-${nextItemKey}-ketchup" type="checkbox" name="items[${nextItemKey}][condiments][]" value="ketchup" />
    <label for="item-${nextItemKey}-ketchup">Ketchup</label>

    <input id="item-${nextItemKey}-mustard" type="checkbox" name="items[${nextItemKey}][condiments][]" value="mustard" />
    <label for="item-${nextItemKey}-mustard">Moutarde</label>
    
    <input id="item-${nextItemKey}-relish" type="checkbox" name="items[${nextItemKey}][condiments][]" value="relish" />
    <label for="item-${nextItemKey}-relish">Relish</label>    
  `;
  nextItemKey++;
  return element;
}

function createFriesElement() {
  let element = document.createElement('fieldset');
  element.innerHTML = `
    <legend>Frites</legend>
    <input type="hidden" name="items[${nextItemKey}][type]" value="fries" />
    
    <p>
      <input id="item-${nextItemKey}-small" type="radio" name="items[${nextItemKey}][size]" value="small" checked />
      <label for="item-${nextItemKey}-small">Petit</label>

      <input id="item-${nextItemKey}-medium" type="radio" name="items[${nextItemKey}][size]" value="medium" />
      <label for="item-${nextItemKey}-medium">Moyen</label>
      
      <input id="item-${nextItemKey}-large" type="radio" name="items[${nextItemKey}][size]" value="large" />
      <label for="item-${nextItemKey}-large">Grand</label>      
    </p>

    <input id="item-${nextItemKey}-salt" type="checkbox" name="items[${nextItemKey}][condiments][]" value="salt" />
    <label for="item-${nextItemKey}-salt">Sel</label>

    <input id="item-${nextItemKey}-vinegar" type="checkbox" name="items[${nextItemKey}][condiments][]" value="vinegar" />
    <label for="item-${nextItemKey}-vinegar">Vinaigre</label>
  `;
  nextItemKey++;
  return element;
}

window.onload = () => {
  let form = document.getElementById('order-form');
  let submitButton = document.getElementById('submit-button');

  document.getElementById('add-item-select').addEventListener('change', (event) => {
    let itemType = event.target.value;
    
    let newElement;
    switch (itemType) {
      case 'hamburger':
        newElement = createHamburgerElement();
        break;
      case 'hotdog':
        newElement = createHotDogElement();
        break;
      case 'frites':
        newElement = createFriesElement();
        break;
    }
    form.insertBefore(newElement, submitButton);
    
    event.target.value = "";
    submitButton.disabled = false;
  });
};
