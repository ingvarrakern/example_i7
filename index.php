  <!doctype html>
 <html lang="en">
 <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no,initial-scale=1.0,maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <link rel="stylesheet" href="Style.css">
     <title> document </title>
 </head>
 <body>
 <?php
 require 'connect.php';
 if(isset($_POST['username'])&& isset($_POST['password'])){
     $username = $_POST['username'];
     $email = $_POST['email'];
     $password = $_POST['password'];
     
     $query = "INSERT INTO users (username,password, email) VALUES('$username','$email','$password')";
    // die($query);
     $result = $connection->query($query);

     if($result){
         $smsg = "Регистрация прошла успешно";
         header("Location: formloader.php");
     } else {
         $fsmsg = "Ошибка";
     }
     
 }
 ?>
      <div class="container">
          <form class="form-signin" method="POST" action="">
                 <h2>Registration</h2>
                 <?php  if(isset($smsg)){?><div class="alert alert-success" role="alert"><?php echo $smsg; ?> </div> <?php }?>
                 <?php  if(isset($fsmsg)){?><div class="alert alert-danger" role="alert"><?php echo $fsmsg; ?> </div> <?php }?>
                 <input type="text" name="username" class="form-control" placeholder="Username" required> 
                 <input type="email" name="email" class="form-control" placeholder="Email" required> 
                 <input type="password" name="password" class="form-control" placeholder="Password" required> 
                 <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
             </form>
       </div>
  </body>
  </html>