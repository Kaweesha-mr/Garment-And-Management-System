<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- connect style -->
    <!-- add icon library  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="./css/Login.css">
</head>
<body>
    

    <div class="container">
        <header>Login<h2>Login to explore more</h2></header>
        
            <form class="login-form">

                        <div class="input-box">        
                            <!-- add user icon -->
                            <i class="fas fa-user"></i>
                            <label>Username</label>
                            <input type="text" name="username" placeholder="Enter your username" required>
                        </div>
    
                        <div class="input-box">
                            <!-- add lock icon -->
                            <i class="fas fa-lock"></i>
                            <label>Password</label> 
                            <input type="password" name="password" placeholder="Enter your password" required>
                        </div>
                        
                        <button>Login</button>

                        <span>If you Don't have an Account <a href="./Registration.html"> Sign Up</a> </span>
            </form>
        </div>
    </div>


</body>
</html>