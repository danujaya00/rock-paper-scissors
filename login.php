<!DOCTYPE html>
<html lang="en">

<head>
    <title>Rock Paper Scissors</title>
    <?php require_once "bootstrap.php"; ?>

    <?php
    if (isset($_POST['Cancel'])) {
        header("Location: index.php");
        return;
    }
    $failure = false;
    if (isset($_POST['who']) && isset($_POST['pass'])) {
        if ($_POST['who'] <1 || $_POST['pass'] <1 ){
            $message = "User name and password are required";
            $failure = true;
        } else {
            $check = hash('md5', $_POST['pass']);
            $pwd = hash('md5', 'php123');
            if ($check != $pwd) {
                $message = "Incorrect password";
                $failure = true;
            } else {
                header("Location: game.php?$_POST[who]");
                return;
            }
        }
    }
    ?>

</head>

<body>
    <div>
        <h1>Please Login</h1>
        <?php 
        if ( $failure !== false ) {
            echo('<p style="color: red;">'.htmlentities($message)."</p>\n");
        }
        ?>
        
        <form method="post">
            <label for="who"><b>User Name</b></label>
            <input name="who" type="text" /><br />
            <label for="pass"><b>Password</b></label>
            <input name="pass" type="password" /><br />
            <input type="submit" value="Login" />
            <input type="submit" value="Cancel" name="Cancel" />
        </form>
</body>

</html>