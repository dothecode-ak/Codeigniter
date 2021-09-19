<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Register</title>
    <style>
    .container {
        width: 30%;
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
    }
.userRegis
{
    background: #6c757d;
    color: #fff;
    height: 100px;
    font-size: 24px;
    font-weight: bold;
    display: flex;
    align-items: center;
    justify-content: center;
}
button
{
    margin:0px auto;
    display: block !important;
}
    @media only screen and (max-width: 768px) {
        .container {
            width: 70%;
        }
    }
    </style>
</head>

<body>

    <div class="container">
        <div class="userRegis">
            User Registration
        </div>
        <?php if($validation){echo  $validation->listErrors();}?>
        <form action="<?php echo site_url('admin/register') ?>" method="POST">
            <div class="form-group">
                <label for="exampleInputName">Name</label>
                <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp">
                 
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">

            </div>
            <div class="form-group">
                <label for="exampleInputMobile">Mobile</label>
                <input type="number" class="form-control" id="mobile" name="mobile" aria-describedby="mobileHelp">

            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>

            <div class="form-group">
                <label for="confirmpassword">Confirm Password</label>
                <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Password">
            </div>
            
            <button type="submit" class="btn btn-secondary center-block">Submit</button>
        </form>
    </div>
</body>

</html>