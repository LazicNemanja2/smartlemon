<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <div class="main_section">
        <div class="buttons">
            <a href="<?php echo site_url('registration'); ?>">Registration</a>

            <a href="<?php echo site_url('login'); ?>">Login</a>
        </div>

        <div class="form">
            <form action="" method="post">
                <input type="text" name="term" id="" placeholder="search">
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>
    
    
</body>
</html>