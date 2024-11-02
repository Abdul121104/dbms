<?php
   ob_start();
   session_start();
?>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="loginstyle.css">
   <title>Login</title>
</head>
<body>
   <h2 style="margin-left:10rem; margin-top:5rem;">Enter Username and Password</h2> 
   <?php
      $msg = '';
      $users = ['admin' => 'admin', 'student' => 'student', 'faculty' => 'faculty'];

      if (isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['password'])) {
         $user = $_POST['username'];
         $pass = $_POST['password'];

         if (array_key_exists($user, $users)) {
            if ($users[$user] === $pass) {
               $_SESSION['valid'] = true;
               $_SESSION['timeout'] = time();
               $_SESSION['username'] = $user;

               // Redirect based on username
               if ($user === 'admin') {
                  header("Location: admin/dashboard.php");
               } elseif ($user === 'student') {
                  header("Location: student/dashboard.php");
               } elseif ($user === 'faculty') {
                  header("Location: faculty/dashboard.php");
               }
               exit(); // Important to stop further code execution after redirection
            } else {
               $msg = "You have entered the wrong password.";
            }
         } else {
            $msg = "You have entered an incorrect username.";
         }
      }
   ?>

   <h4 style="margin-left:10rem; color:red;"><?php echo $msg; ?></h4>
   <br/><br/>
   <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
      <div>
         <label for="username">Username:</label>
         <input type="text" name="username" id="name" required>
      </div>
      <div>
         <label for="password">Password:</label>
         <input type="password" name="password" id="password" required>
      </div>
      <section style="margin-left:2rem;">
         <button type="submit" name="login">Login</button>
      </section>
   </form>

   <p style="margin-left: 2rem;"> 
      <a href="logout.php" title="Logout">Click here to clear the session.</a>
   </p>
</body>
</html>
