<?php
    $result = null;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $x = $_POST['bilangan1'];
        $y = $_POST['bilangan2'];

        $result = sum($x, $y);
    }

    function sum($x, $y) {
        return $x + $y;
    }
?>


<html>
    <head>
        <title>Hello World</title>
    </head>
    <body>
        <?php if ($result == null) { ?>
            <form action="sum.php" method="post"> 
                <input type="text" name="bilangan1" placeholder="Masukkan nilai pertama" />
                <input type="text" name="bilangan2" placeholder="Masukkan nilai kedua" /> 
                <input type="submit" name="submit" /> 
            </form>
        <?php } else { ?>
            <p>Hasilnya adalah <?= $result ?> </p>
        <?php } ?>
        
    </body>
</html>