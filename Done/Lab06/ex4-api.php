<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>EX4</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-5 my-5 mx-2 mx-sm-auto border rounded px-3 py-3">
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    echo "<h5 class='text-center mb-3' style='color: green;'>Confirm Information</h5>";
                    echo "<p style='color: black;'><strong>Your name:</strong> <span style='color: green;'>" . htmlspecialchars($_POST['name']) . "</span></p>";
                    echo "<p style='color: black;'><strong>Your email:</strong> <span style='color: green;'>" . htmlspecialchars($_POST['email']) . "</span></p>";
                    echo "<p style='color: black;'><strong>Gender:</strong> <span style='color: green;'>" . htmlspecialchars($_POST['gender']) . "</span></p>";
                     
                    echo "<p style='color: black;'><strong>Favorite web browser:</strong></p>";
                    foreach ($_POST['browsers'] as $browser) {
                        echo "<p style='color: green;'>• " . htmlspecialchars($browser) . "</p>";
                    }
                    echo "<p style='color: black;'><strong>Preferred Operating System:</strong> <span style='color: green;'>" . htmlspecialchars($_POST['os']) . "</span></p>";
                    echo "<a href='ex4.html' class='btn px-5 mr-2' style='background-color: green; color: white;'>Save</a>";
                    echo "<a href='ex4.html' class='btn px-5' style='background-color: white; color: green; border-color: green;'>Back</a>";
                
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>
