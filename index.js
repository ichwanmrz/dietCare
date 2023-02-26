const form = document.getElementById('registration-form');
form.addEventListener('submit', (e) => {
  e.preventDefault();

  const name = form.elements.name.value;
  const phone = form.elements.phone.value;

  // Send form data to server
  fetch('/proses.php', {
    method: 'POST',
    body: JSON.stringify({ name, phone })
  })
  .then(response => response.json())
  .then(data => {
    if (data.success) {
      alert('Registration successful! A notification has been sent to your WhatsApp.');
    } else {
      alert('An error occurred. Please try again.');
    }
  });
});
