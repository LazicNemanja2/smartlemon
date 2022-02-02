<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style type="text/css">


        body {
            background-color: #fff;
            margin: 60px;
            font: 13px/20px normal Helvetica, Arial, sans-serif;
            color: #4F5155;
        }

        a {
            color: #3a455b;
            background-color: transparent;
            font-weight: normal;
            display: block;
            text-decoration: none;
        }
        .buttons {
            margin: 30px;
            float:right;
        }

        .form {
            margin: 30px;
            float:right;
            border: 2px solid;
            padding: 10px;
        }

        .main_section {
            width: 60%;
            margin: auto;
        }
        .green {
            border: 1px solid green;
            padding: 10px;
            margin: 30px;
        }
    </style>
</head>
<body>

    <div class="main_section">
    <?php if (isset($_SESSION['notification'])): ?>
            <div class="green">
                <?php echo $_SESSION['notification']; ?>
            </div>
        <?php endif; ?>
        <div class="buttons">
            <?php if (isset($_SESSION['user'])): ?>
                <a href="<?php echo site_url('logout'); ?>">Logout</a>
            <?php else: ?>
                <a href="<?php echo site_url('registration'); ?>">Registration</a>

                <a href="<?php echo site_url('login'); ?>">Login</a>
            <?php endif; ?>
        </div>

        <div class="form">
            <form action="<?php echo site_url('search'); ?>" method="post">
                <input type="text" name="term" id="" placeholder="search">
                <button type="submit">Submit</button>
            </form>
        </div>

    </div>
    
    
</body>
</html>