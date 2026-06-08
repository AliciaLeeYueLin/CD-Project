<?php   

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Simple CMS</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
        crossorigin="anonymous" />
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" />
    <style type="text/css">
        body {
            background: #030101;
        }
       .hero {
    height: 100vh;
    background-image: url("image/background image1.png");
    background-size: cover;
    display: flex;
    justify-content: center;
    align-items: center;
    color:white;
    

}

.hero h1{
    font-size: 96px;
}
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
            <div class="container-fluid navbar-dark p-1">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <h1 class="navbar-brand pirata-one-regular me-auto ps-2">CD shop</h1>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link ps-2" href="http://localhost/project/cd-manage.php/">Home</a></li>
                        <li class="nav-item"><a class="nav-link p-2" href="#education">Shop</a></li>
                        <li class="nav-item"><a class="nav-link p-2" href="#about">Register</a></li>
                        <li class="nav-item"><a class="nav-link p-2" href="#about">Log in</a></li>
                        
                    </ul>
                </div>
            </div>
    </nav>
    
    <div class="hero x-100">
        <h1 class="text-center">Musics CD</h1>
        <br>
        <div class="button">
            <a href="login-form.php" class="btn btn-primary">sign in</a>
            <h2 class="text-white">Haven't register? Register now! </h2>
            <a href="registration-form.php" class="btn btn-info">Register</a>
        </div>
    </div>

</body>
</html>