document.getElementById('myForm').addEventListener('submit', function(event) {
    event.preventDefault();
  
    var firstName = document.getElementById('firstName');
    var lastName = document.getElementById('lastName');
    var username = document.getElementById('username');
    var password = document.getElementById('password');
    var gender = document.querySelector('input[name="gender"]:checked');
    var country = document.getElementById('country');
  
    var fields = [firstName, lastName, username, password, country];
    var isValid = true;
  
    fields.forEach(function(field) {
      if (!field.value || (field === country && field.value === 'Choose...')) {
        field.classList.add('is-invalid');
        field.classList.remove('is-valid');
        isValid = false;
      } else {
        field.classList.remove('is-invalid');
        field.classList.add('is-valid');
      }
    });
  
    if (!gender) {
      document.getElementById('male').classList.add('is-invalid');
      document.getElementById('female').classList.add('is-invalid');
      isValid = false;
    } else {
      document.getElementById('male').classList.remove('is-invalid');
      document.getElementById('female').classList.remove('is-invalid');
    }
  
    if (isValid) {
      alert('Form submitted successfully');
    }
  });