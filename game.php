<!DOCTYPE html>
<html lang="en">

<head>
    <title>Rock Paper Scissors</title>
    <?php require_once "bootstrap.php"; ?>

    <?php
    if (isset($_POST['Logout'])) {
        header("Location: index.php");
        return;
    }
    if (!isset($_GET['name']) || strlen($_GET['name']) < 1) {
        die('Name parameter missing');
    }
    $names = array('Rock', 'Paper', 'Scissors');
    $human = isset($_POST["human"]) ? $_POST['human'] + 0 : -1;
    $computer = rand(0,2);

    function check($computer, $human) {
        
        if ( $human == $computer ) {
            return "Tie";
        } else if ( $human == 0 && $computer == 1 ) {
            return "You lose";
        } else if ( $human == 0 && $computer == 2 ) {
            return "You win";
        } else if ( $human == 1 && $computer == 0 ) {
            return "You win";
        } else if ( $human == 1 && $computer == 2 ) {
            return "You lose";
        } else if ( $human == 2 && $computer == 0 ) {
            return "You lose";
        } else if ( $human == 2 && $computer == 1 ) {
            return "You win";
        }
    }
    $result = check($computer, $human);

    ?>

</head>

<body>
    <div>
        <h1>Rock Paper Scissors</h1>
        <?php if (isset($_REQUEST['name'])) {
            echo "<h4>Welcome: ";
            echo htmlentities($_REQUEST['name']);
            echo "</h4>\n";
        } ?>
        <form method="post">
            <select name="human" id="human">
                <option value="-1" selected>Select</option>
                <option value="0">Rock</option>
                <option value="1">Paper</option>
                <option value="2">Scissor</option>
                <option value="3">Test</option>
            </select>
            <input type="submit" value="Play">
            <input type="submit" name="Logout" value="Logout">
        </form>
        <pre>
        <?php
        if ($human == '-1') {
            print "Please select a strategy and press Play.\n";
        } else {
            print "Your Play=$names[$human] Computer Play=$names[$computer] Result=$result\n";
        }
        ?>
</body>

</html>