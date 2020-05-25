<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2>Register</h2>
        <h3>To register a new accout put your credentials below, please.</h3>
        <form action="index.php" method="post" enctype="application/x-www-form-urlencoded">
            <!-- Email -->
            <label for="email">Email</label><br>
            <input type="email" name="email" id="email" value=""placeholer="Put your email" required autofocus><br><br>
            <!-- Password -->
            
            <label for="password">Password</label><br>
            <input type="password" name="password" id="password" value="" placeholder="Put your password">
            <p>Your password needs at least 10 symbols</p>
            <!-- Submit -->
            <input type="submit" name="btn" value="register">
        
        </form>
    
    </form>
</body>
</html>