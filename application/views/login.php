<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Login</title>

    <style type="text/css">
        ::selection {
            background-color: #E13300;
            color: white;
        }

        ::-moz-selection {
            background-color: #E13300;
            color: white;
        }

        body {
            background: url('assets/images/polibatam.jpg');
            background-size: cover;
            color: #555;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
        }

        * {
            font-family: sans-serif;
            box-sizing: border-box;
        }

        form {
            width: 500px;
            border: none;
            padding: 40px;
            background: #fff;
            border-radius: 15px;
        }

        input {
            display: block;
            border: 2px solid #ccc;
            width: 95%;
            padding: 15px;
            margin: 1px auto;
            border-radius: 5px;
        }

        label {
            color: #888;
            font-size: 18px;
            padding: 10px;
        }

        button {
            display: block;
            border: none;
            width: 30%;
            padding: 10px;
            margin: 1px auto;
            border-radius: 5px;
            background-color: #3EB489;
            color: #fff;
            font-size: medium;
        }

        code {
            font-family: Consolas, Monaco, Courier New, Courier, monospace;
            font-size: 12px;
            background-color: #E13300;
            border: 1px solid #D0D0D0;
            color: #002166;
            display: block;
            margin: 14px 0 14px 0;
            padding: 12px 10px 12px 10px;
        }


        button:hover {
            opacity: .7;
        }

        .error {
            background: #F2DEDE;
            color: #A94442;
            padding: 10px;
            width: 95%;
            border-radius: 5px;
            margin: 20px auto;
        }

        h5 {
            margin-top: 10px;
            margin-bottom: .5px;
            text-align: center;
            color: #555;
        }

        a {
            float: right;
            background: #555;
            padding: 10px 15px;
            color: #fff;
            border-radius: 5px;
            margin-right: 10px;
            border: none;
            text-decoration: none;
        }

        a:hover {
            opacity: .7;
        }

        #container {
            background-color: #fff;
            border-radius: 10px;
            margin: 10px;
            border: 1px solid #D0D0D0;
            box-shadow: 0 0 8px #D0D0D0;
        }

        br {
            margin: 5px;
        }

        img {
            margin-top: 10px;
            margin-bottom: 15px;
            width: 400px;
            height: 80px;
        }
    </style>
</head>

<body>

    <div id="container">
        <center>
            <img src="<?php echo base_url(); ?>assets/images/login.png">
        </center>
        <h5>SISTEM INFORMASI DANA AMAL POLIBATAM DARI KITA UNTUK KITA</h5>

        <div id="body">
            <?php echo form_open('Login/ceklogin') ?>
            <input type="text" name="username" placeholder="Masukkan Username" /><br>
            <input type="password" name="password" placeholder="Masukkan Password" /><br>
            <button type="submit" class="btn btn-warning btn-user btn-block">
                Login
            </button>

            <?php echo form_close() ?>
        </div>


    </div>

</body>

</html>