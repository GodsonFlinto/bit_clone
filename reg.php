<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // You can add PHP code here to process the form data if needed.
  // For example, you can access form fields like $_POST['Full Name'], $_POST['Email Address'], etc.
  // Remember to sanitize and validate user input for security.
  
  // After processing, you can redirect or display a success message.
  header('Location: success.php');
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/regStyle.css">
    <title>Registration Form</title>
</head>
<body>
    <section class="container">
        <header>Registration Form</header>
        <form name="submit-to-google-sheet" id="hello" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <!-- Your HTML form fields here -->
            
            <!-- Example input field -->
            <div class="input-box">
                <label>Full Name</label>
                <input type="text" placeholder="Enter Full Name" name="Full Name" required>
            </div>

            <!-- Other form fields go here -->

            <div style="display: flex; justify-content: center; margin: 2%;">
                <button id="button1">Submit</button>
            </div>
        </form>
    </section>

    <script>
        const scriptURL = 'https://script.google.com/macros/s/AKfycbziE6Tefdn5tc7Cwf3pAnLrZWFkRgsg3ZxdbPsJ2npV6sxHEzSN86vnxWAXYOrFZ03c/exec'
        const form = document.forms['submit-to-google-sheet']

        form.addEventListener('submit', e => {
            e.preventDefault()
            fetch(scriptURL, { method: 'POST', body: new FormData(form) })
                .then(response => console.log('Success!', response))
                .catch(error => console.error('Error!', error.message))
            alert('Successfully Registered');
            document.getElementById('hello').reset();
        })
    </script>

</body>
</html>
