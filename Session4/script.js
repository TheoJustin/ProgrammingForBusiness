alert("Hello")

confirm("Are you a laboratory assistant?")

prompt("What is your name?")


document.getElementById('form').addEventListener('submit', function (event) {
  const username = document.getElementById('username').value.trim();
  const age = document.getElementById('age').value.trim();
  const errorMessage = document.getElementById('error-message');

  // Validasi manual
  if (username === '') {
    event.preventDefault();
    errorMessage.textContent = 'Username tidak boleh kosong.';
  } else if (username.length < 3) {
    event.preventDefault();
    errorMessage.textContent = 'Username minimal 3 karakter.';
  } else if (isNaN(age) || age === '') {
    event.preventDefault();
    errorMessage.textContent = 'Umur harus diisi dan berupa angka.';
  } else {
    errorMessage.textContent = ''; // valid
  }
});
