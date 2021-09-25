<?php

use App\Message;
use App\HistoryView;

require_once "vendor/autoload.php";

$CSVsave = '/home/arthur/PhpstormProjects/PHPbasics/basic_chat/messageHistory.csv';

if (isset($_POST['message'])) {
    $newestMessage = new Message($_POST['login'], $_POST['message'], $CSVsave);
    header("Refresh:0; url=http://localhost:8000");
}

$history = new HistoryView($CSVsave);
$records = $history->getRecords();
?>

<!doctype html>
<html lang="en">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<body>
<table class="table">
    <tbody>
    <?php foreach ($records as $record): ?>
        <tr>
            <th scope="row"><span style="font-size: smaller; "><?php echo "{$record[0]} says: {$record[1]}" . PHP_EOL; ?></span></th>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
    <form action="/index.php" method="post">
        <label for="login">Enter name:</label><br>
        <input type="text" id="login" name="login"><br>
        <label for="message">Enter message:</label><br>
        <label>
            <textarea name="message" cols="40" rows="5"></textarea>
        </label>
        <input type="submit" value="Send">
    </form>
</body>
</html>