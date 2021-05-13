'use strict';

const subscribeForm = document.querySelector('.subscribe__form');
const alertBox = document.querySelector('.alert');

subscribeForm.addEventListener('submit', e => {
  e.preventDefault();

  const formData = new FormData(subscribeForm);

  const xhr = new XMLHttpRequest();
  xhr.open('POST', 'subscribe.php');
  xhr.responseType = 'json';
  xhr.send(formData);
  xhr.onload = () => {
    switch (xhr.status) {
      case 200:
        alertBox.style.display = 'inline-block';
        alertBox.classList.remove('alert--error');
        alertBox.classList.add('alert--success');
        alertBox.innerHTML = xhr.response.message;
        subscribeForm.reset();
        setTimeout(() => {
          alertBox.style.display = 'none';
        }, 3000);
        break;

      case 400:
        alertBox.style.display = 'inline-block';
        alertBox.classList.remove('alert--success');
        alertBox.classList.add('alert--error');
        alertBox.innerHTML = xhr.response.message;
        break;

      default:
        console.log(`ERROR:: ${xhr.status}, ${xhr.statusText}`);
        break;
    }
  };
});
