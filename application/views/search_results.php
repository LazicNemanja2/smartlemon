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
        table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
        }

        td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
        }

        tr:nth-child(even) {
        background-color: #dddddd;
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
            <form action="<?php echo site_url('search'); ?>" method="post">
                <input type="text" name="term" id="" placeholder="search">
                <button type="submit">Submit</button>
            </form>
        </div>
        
        <div class="form">
            <table>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                </tr>

                <tbody>
                    <?php if (isset($users) && count($users) > 0): ?>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td>
                                    <?php echo $user['name']; ?>
                                </td>
                                <td>
                                    <?php echo $user['email']; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <div class="back">
            <a href="<?php echo site_url(); ?>">Back</a>
        </div>
    </div>

    
</body>

</html>




