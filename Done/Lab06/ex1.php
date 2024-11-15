<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">         
  <table class="table table-bordered mt-5 text-center">
    <thead>
      <tr>
        <th colspan= "10" class="bg-secondary text-center">BANG CUU CHUONG</th>
      </tr>
    </thead>
    <tbody>
      <?php for($i=1; $i<10; $i++){ ?>
        <tr>
            <?php for($j=1;$j<=10;$j++){ ?>
              <td>
                <?php echo "$i x $j = ". ($i * $j) ?>
              </td>
              <?php }?>
        </tr>
       <?php }?>
    </tbody>
  </table>
</div>

</body>
</html>
