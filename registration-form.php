<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
<style>
    body{
       
        background-image:url("image/background-2.png");
        background-size: cover;
        display: flex;
        justify-content: center;
        align-items: center;  
        background-repeat: no-repeat;
        width:100vw;
        height:100vh;
        
    }
    .container{
        color: white;
       
    }
</style>
</head>
<body>
     <div class="container my-5 mx-auto" style="max-width: 500px;">
     <h1 class="h1 mb-4 text-center"  style="text-shadow:2px 2px 2px black" ; >Sign up a New Account</h1>

    <div class="card p-4">
      <form method="POST" action="registration.php">
    <div class="mb-3">
        <label for="username" class="form-label">Username:</label>
        <input type="text" class="form-control" id="username" name="username" placeholder="username" required>
    </div>
     <div class="mb-3">
        <label for="password" class="form-label">Password:</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="password" required>
    </div>
    <div class="mb-3">
        <label for="phone_number" class="form-label">Phone Number:</label>
        <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="phone_number" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="email" required>
    </div>
    <div class="mb-3">
        <label for="address" class="form-label">Address:</label>
        <textarea class="form-control" id="address" name="address" placeholder="address" required></textarea>
    </div>
    <div class="d-grid">
            <button type="submit" class="btn btn-primary btn-fu">
              Sign Up
            </button>
    </form>
 </div>

</body>
</html>