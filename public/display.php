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

            <section class="display_container">

                <?php
                            require_once('../private/classes/Connect.php');
                            $empty = new Connect();
                            $empty->checkEmpty();
                            $status = new Connect();
                            $status->getStatus();
                        ?>


                <div class="profile_info">
                    <ul class="stats">
                        <?php
                            require_once('../private/classes/Connect.php');
                            $userStats = new Connect();
                            $userStats->getData();
                        ?>
                    </ul>
                </div>
                <div class="add_attribute">
                    <form action="../private/new_attribute.php" method="post" class="attribute_form">
                        <input name="attr_name" id="attr_name" type="text" placeholder="Enter attribute name..." maxlength="30" spellcheck="false" autocomplete="off" required>
                        <input name="attr_value" id="attr_value" type="text" placeholder="Enter attribute value..." maxlength="30" spellcheck="false" autocomplete="off" required>
                        <button type="submit" class="orange">ADD ATTRIBUTE</button>
                    </form>

                <a href="../private/logout_user.php">LOG OUT</a>
                </div>

                

            </section>

        </main>

    </body>

</html>
