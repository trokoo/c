// Nombre del titular de la tarjeta
let nameCard = document.querySelector('.card__details-name');
let nameInput = document.querySelector('#cardholder');
let nameErrorDiv = document.querySelector('.form__cardholder--error');

// Numero de tarjete
let numberCard = document.querySelector('.card__number');
let numberInput = document.querySelector('#cardNumber');
let numberErrorDiv = document.querySelector('.form__inputnumber--error');

// MM
let monthCard = document.querySelector('.card__month');
let monthInput = document.querySelector('#cardMonth');
let monthErrorDiv = document.querySelector('.form__input-mm--error');

// YY
let yearCard = document.querySelector('.card__year');
let yearInput = document.querySelector('#cardYear');
let yearErrorDiv = document.querySelector('.form__input-yy--error');

// CVC
let cvcCard = document.querySelector('.card-back__cvc');
let cvcInput = document.querySelector('#cardCvc');
let cvcErrorDiv = document.querySelector('.form__input-cvc--error');

// Ingreso dinamico del nombre
nameInput.addEventListener('input', ()=>{
    if(nameInput.value == ''){
        nameCard.innerText = 'ChivoChop'
    }else{
        nameCard.innerText = nameInput.value;
    }
});

//Ingreso dinamico del numero
numberInput.addEventListener('input', ()=>{

    

    // Validando que haya una letra,
    let regExp = /[A-z]/g;
    if(regExp.test(numberInput.value)){
        showError(numberInput, numberErrorDiv, 'Formato incorrecto, solo números');
    }else{
        // borrando espacios ingresados por el usuario, agregando espacios cada 4 digitos, y borrando el espacio final
        numberInput.value = numberInput.value.replace(/\s/g, '').replace(/([0-9]{4})/g, '$1 ').trim();
        showError(numberInput, numberErrorDiv, '', false);
    }

    // Actualizando graficamente la tarjeta:
    numberCard.innerText = numberInput.value;

    // Mostrando los 0 por defecto cuando no se ha ingresado nada
    if(numberInput.value == ''){
        numberCard.innerText = '0000 0000 0000 0000';
    }
});

// Ingreso dinamico del mes
monthInput.addEventListener('input', ()=>{
    monthCard.innerText = monthInput.value;
    validateLetters(monthInput, monthErrorDiv);
});

// Ingreso dinamico del año
yearInput.addEventListener('input', ()=>{
    yearCard.innerText = yearInput.value;
    validateLetters(yearInput, yearErrorDiv);
});

// Ingreso dinamico de cvc
cvcInput.addEventListener('input', ()=>{
    cvcCard.innerText = cvcInput.value;
    validateLetters(cvcInput, cvcErrorDiv);
});


// Boton Confirm

let confirmBtn = document.querySelector('.form__submit')

let nameValidation = false;
let numberValidation = false;
let monthValidation = false;
let yearValidation = false;
let cvcValidation = false;

// Secciones Formulario y Thanks
let formSection = document.querySelector('.form');
let thanksSection = document.querySelector('.thanks-section');

nameInput.addEventListener('input', () => {
    verifyIsFilled(nameInput, nameErrorDiv);
});

nameInput.addEventListener('keydown', (event) => {
  const allowedKeys = ['ArrowLeft', 'ArrowRight', 'Backspace', 'Delete', 'Tab'];
  const inputIsNumber = /\d/.test(event.key);
  const inputIsSymbol = /[!@#$%^&*()_+\-¿¡°=\[\]{};':"\\|,.<>\/?]+/.test(event.key); 

  if (!allowedKeys.includes(event.key) && inputIsNumber || inputIsSymbol) {
      event.preventDefault();
  }
});


numberInput.addEventListener('input', () => {
    if (verifyIsFilled(numberInput, numberErrorDiv)) {
      if (numberInput.value.length === 19) {
        showError(numberInput, numberErrorDiv, '', false);
      } else {
        showError(numberInput, numberErrorDiv, 'Numero incorrecto');
      }
      
    }
});

numberInput.addEventListener('keydown', (event) => {
    const allowedKeys = ['ArrowLeft', 'ArrowRight', 'Backspace', 'Delete', 'Tab'];
    if (!allowedKeys.includes(event.key) && isNaN(parseInt(event.key))) {
      event.preventDefault();
    }
  });


  
monthInput.addEventListener('input', () => {
    verifyIsFilled(monthInput, monthErrorDiv);
    if (parseInt(monthInput.value) > 0 && parseInt(monthInput.value) <= 12) {
      showError(monthInput, monthErrorDiv, '', false);
    } else {
      showError(monthInput, monthErrorDiv, 'Mes incorrecto');
    }
});

monthInput.addEventListener('keydown', (event) => {
    const allowedKeys = ['ArrowLeft', 'ArrowRight', 'Backspace', 'Delete', 'Tab'];
    if (!allowedKeys.includes(event.key) && isNaN(parseInt(event.key))) {
      event.preventDefault();
    }
});
  
yearInput.addEventListener('input', () => {
    verifyIsFilled(yearInput, yearErrorDiv);
    if (parseInt(yearInput.value) > 22 && parseInt(yearInput.value) <= 27) {
      showError(yearInput, yearErrorDiv, '', false);
    } else {
      showError(yearInput, yearErrorDiv, 'Año incorrecto');
    }
});

yearInput.addEventListener('keydown', (event) => {
    const allowedKeys = ['ArrowLeft', 'ArrowRight', 'Backspace', 'Delete', 'Tab'];
    if (!allowedKeys.includes(event.key) && isNaN(parseInt(event.key))) {
      event.preventDefault();
    }
});
  
cvcInput.addEventListener('input', () => {
    verifyIsFilled(cvcInput, cvcErrorDiv);
    if (cvcInput.value.length === 3) {
      showError(cvcInput, cvcErrorDiv, '', false);
    } else {
      showError(cvcInput, cvcErrorDiv, 'CVC incorrecto');
    }
});

cvcInput.addEventListener('keydown', (event) => {
    const allowedKeys = ['ArrowLeft', 'ArrowRight', 'Backspace', 'Delete', 'Tab'];
    if (!allowedKeys.includes(event.key) && isNaN(parseInt(event.key))) {
      event.preventDefault();
    }
  });

// Funciones

function showError(divInput, divError, msgError, show = true){
    if(show){
        divError.innerText = msgError;
        divInput.style.borderColor = '#FF0000';
    }else{
        divError.innerText = msgError;
        divInput.style.borderColor = 'hsl(270, 3%, 87%)';
    }
}

function verifyIsFilled(divInput, divError){
    if(divInput.value.length> 0){
        showError(divInput, divError, "", false);
        return true;
    }else{
        showError(divInput, divError, "No puede estar en blanco");
        return false;
    }
}

function validateLetters(input, divError){
    // Validando que haya una letra,
    let regExp = /[A-z]/g;
    if(regExp.test(input.value)){
        showError(input, divError, 'Formato incorrecto, solo números');
    }else{
        showError(input, divError, '', false);
    }
}