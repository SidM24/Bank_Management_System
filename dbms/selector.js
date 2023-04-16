const registerBtn = document.getElementById('register-btn');
const logBtn = document.getElementById('log-btn');
const registerBox = document.querySelector('.register-box');
const logBox = document.querySelector('.log-box');

registerBtn.addEventListener('click', () => {
  registerBox.style.display = 'block';
  logBox.style.display = 'none';
});

logBtn.addEventListener('click', () => {
  registerBox.style.display = 'none';
  logBox.style.display = 'block';
});
