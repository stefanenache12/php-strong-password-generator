<?php
    $passwordLength = $_GET["passwordLength"];

    function generatePassword($length) {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()-_=+';
        $password = '';
        
        for ($i = 0; $i < $length; $i++) {
            $randomIndex = mt_rand(0, strlen($chars) - 1);
            $password .= $chars[$randomIndex];
        }
        
        return $password;
    }

    $password = generatePassword($passwordLength);
?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PHP Strong Password Generator</title>
    </head>
    <body>
        <form action="index.php" method="get">
            <label for="passwordLength">Password Length:</label>
            <input type="number" name="passwordLength" value="<?php echo $passwordLength; ?>" min="8" max="100">
            <input type="submit" value="Genera Password">
        </form>

        <?php
            if (isset($password)) {
                echo "<p>Generated Password: $password</p>";
            }
        ?>
    </body>
</html>