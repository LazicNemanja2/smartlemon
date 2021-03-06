<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


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
            border: 2px solid;
            padding: 10px;
        }

        .main_section {
            width: 60%;
            margin: auto;
        }
        .back {
            margin: 30px;
            float:right;
            border: 2px solid;
            padding: 10px;
            width:fit-content;

        }
        .red {
            border: 1px solid red;
            padding: 10px;
            margin: 30px;
        }
    </style>

</head>
<body>

    <div class="main_section">
        <?php if (isset($_SESSION['notification'])): ?>
            <div class="red">
                <?php echo $_SESSION['notification']; ?>
            </div>
        <?php endif; ?>
        <div class="notification"></div>
        
        <div class="form">
            <form action="<?php echo site_url('login_user'); ?>" method="post" class="" >
                <input type="text" name="email" id="" placeholder="Email" data-message-required="Email is required" data-message-incorrect="Email is in incorrect form">
                <input type="text" name="password" id="" placeholder="Password" data-message-required="Password is required">
                <button type="submit">Submit</button>
            </form>
        </div>

        <div class="back">
            <a href="<?php echo site_url(); ?>">Back</a>
        </div>
    </div>

    
</body>

</html>




