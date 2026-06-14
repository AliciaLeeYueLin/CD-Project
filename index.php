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
     text-shadow: 2px 2px 3px black;
}
        @media (max-width: 768px) {
        .hero h1 {
            font-size: 48px;
                 text-shadow: 2px 2px 3px black;
        }
        }
        .btn{
                box-shadow: 2px 2px 3px black;
                   
        }
        h4{
              text-shadow: 1px 1px 3px black;
        }
    
.navbar {
  background: linear-gradient(90deg, #ff6c22, #ffde49);
  text-shadow: 2px 2px 3px black;
}
.merriweather {
  font-family: "Merriweather", serif;
  font-optical-sizing: auto;
  font-weight: <weight>;
  font-style: normal;
  font-variation-settings:
    "wdth" 100;
}
    </style>
</head>
<body>
    <div class="merriweather">
 <section> 
     <nav class="navbar navbar-expand-lg fixed-top">
            <div class="container-fluid  p-1">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <h1 class="navbar-brand text-white p-1">CD</h1>
                <div class="collapse navbar-collapse" id="navbarNav">
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
 
        <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link ps-2 text-white" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link p-2 text-white" href="dashboard.php">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link p-2 text-white" href="order-history.php">Order Histoty</a></li>
                        <li class="nav-item"><a class="nav-link p-2 text-white" href="logout.php">Log Out</a></li>
                        
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    
     </section>
   <div class="hero d-flex flex-column justify-content-center align-items-center text-center">
  <h1 class="mb-4">Musics CD</h1>

  <a href="login-form.php" class="btn btn-primary btn-lg mb-3">Sign In</a>
  <h4 class="text-white">Haven't registered? Register now!</h4>
  <a href="registration-form.php" class="btn btn-info btn-lg">Register</a>
</div>


<footer class="bg-dark text-white text-center p-3 mt-auto">
  <p>&copy; 2026 CD Shop | Contact us at info@cdshop.com</p>
</footer>

</body>
</html>