<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    require_once "classes/BankAccount.php";

    $o1 = new BankAccount("John", 5000);

    $o1->deposit(50.50);
    echo "<br><br>";
    $o1->deposit(-10);
    
    echo "<br><br>";

    $o1->withdraw(500);
    $o1->withdraw(5000);
    $o1->withdraw(-5000);
    echo "<br><br>";
    echo $o1->getBalance();
    echo $o1->getOwner();


    ?>
</body>
</html>