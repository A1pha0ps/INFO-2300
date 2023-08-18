<?php
  $requestedResource = $_SERVER['SCRIPT_NAME'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>Playful Plants Project Database</title>
  <link href="/public/css/styles.css" type="text/css" rel="stylesheet" />
</head>

<body>

<header>
    <h1>Playful Plants Project Database</h1>
</header>

<div id="MainBody404">
  <h2>404 Error</h2>
  <h3>You have attempted to reach <?php echo htmlspecialchars($requestedResource)?>, which does not exist in this database.
  Please return to the previous page or the <a href="/">main page!</a></h3>
</div>

</body>

</html>
