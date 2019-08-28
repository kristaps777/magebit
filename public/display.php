<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <!-- Google font link -->
        <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">

        <!-- Favicon link -->
        <link rel="shortcut icon" href="#">

        <!-- CSS link -->
        <link rel="stylesheet" href="styles/display.css">

        <title>user data</title>
    </head>

    <body>



    

        <main>

            <div class="display_container">

                <?php
                            require_once('../private/classes/Connect.php');
                            $empty = new Connect();
                            $empty->checkEmpty();
                            $status = new Connect();
                            $status->getStatus();
                        ?>
    <a href="../private/logout_user.php">LOG OUT</a>

            </div>

        </main>

    </body>

</html>
