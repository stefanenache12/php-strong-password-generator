<?php
     $passwordLength = isset($_GET["passwordLength"]) ? $_GET["passwordLength"] : 12;
     $includeLetters = isset($_GET["includeLetters"]) ? $_GET["includeLetters"] : false;
     $includeNumbers = isset($_GET["includeNumbers"]) ? $_GET["includeNumbers"] : false;
     $includeSymbols = isset($_GET["includeSymbols"]) ? $_GET["includeSymbols"] : false;

    include __DIR__ . '/functions.php';

    $password = generatePassword($passwordLength, $chars);
?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <title>PHP Strong Password Generator</title>
    </head>
    <body>
        <div class="container mt-5 w-50 d-flex flex-column text-center">

            <div class="pb-5">
                <h1 class="text-secondary">Strong Password Generator</h1>
                <h2 class="text-white">Generate a secure password</h2>
            </div>
            
           <div class="p-2 mb-2 border rounded w-100 bg-info text-center">
                <?php
                     if (!empty($password)) {
                        echo "<p>Generated Password: $password</p>";
                    } elseif (!$includeLetters && !$includeNumbers && !$includeSymbols) {
                        echo "<p>Please select at least one option and specify the length.</p>";
                    } else {
                        echo "<p>No password options selected. Please select options and specify the length.</p>";
                    }
                ?>
           </div> 
            
            <div class="w-100">
                <form class="form-controll text-center border rounded bg-white p-3" action="index.php" method="get">
                    <label for="passwordLength">Password Length:</label>
                    <input type="number" name="passwordLength" value="<?php echo $passwordLength; ?>" min="8" max="100">
                    <label><input type="checkbox" name="includeLetters" <?php if ($includeLetters) echo 'checked'; ?>>  Letters</label>
                    <label><input type="checkbox" name="includeNumbers" <?php if ($includeNumbers) echo 'checked'; ?>>  Numbers</label>
                    <label><input type="checkbox" name="includeSymbols" <?php if ($includeSymbols) echo 'checked'; ?>>  Symbols</label>
                    <input type="submit" value="Generate Password">
                </form>
            </div>
            
        </div>
    </body>
</html>