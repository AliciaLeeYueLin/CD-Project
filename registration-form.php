<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple CMS - Login</title>
    
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
    />
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;1,300&display=swap" rel="stylesheet">

    <style>
      body {
        background: #ffffff;  
        color:white;
      }
.card {
        background: linear-gradient(-45deg, #7d8017, #d7ff37, #19180b);
        background-size: 300% 300%;
        animation: moveGradient 15s ease infinite;
        border: none;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
      }

     
      .card-body-overlay {
        background: rgba(0, 0, 0, 0.85);
        backdrop-filter: blur(10px);
        padding: 2.5rem;
        height: 100%;
      }


      @keyframes moveGradient {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
      }

      .form-control {
        background-color: rgba(255, 255, 255, 0.07);
        border: 5px solid rgba(255, 245, 55, 0.2);
        color: #fff;
      }

      .form-control:focus {
        background-color: rgba(255, 255, 255, 0.12);
        border-color:rgba(55, 212, 255, 0.2);
        box-shadow: 0 0 0 0.25rem rgba(255, 235, 55, 0.25);
        color: #fff;
      }

     
      .btn-login {
        background-color: #ffe837;
        color: #000;
        font-weight: 700;
        transition: all 0.3s ease;
      }

      .btn-login:hover {
        background-color: #ffed7a;
        color: #000;
        transform: translateY(-1px);
        box-shadow: 0 5px 15px rgba(55, 255, 248, 0.4);
      }

     .merriweather {
  font-family: "Merriweather", serif;
  font-optical-sizing: auto;
  font-weight: <weight>;
  font-style: normal;
  font-variation-settings:
    "wdth" 100;
}

      .tt{
        color: black;
      }
    </style>
  </head>
  <body>
    
    <div class="container d-flex flex-column justify-content-center min-vh-100 merriweather" style="max-width: 450px;">
      
      <h1 class="h2 mb-4 text-center fw-bold tt">Create a new account</h1>

      <div class="card">
        <div class="card-body-overlay">
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
            
            <div class="d-grid mt-4">
              <button type="submit" class="btn btn-login btn-lg">Submit</button>
            </div>

          </form>
        </div>
      </div>

      <div class="d-flex justify-content-between align-items-center gap-3 pt-3 ">
        <a href="index.php" class="text-decoration-none small">
          <i class="bi bi-arrow-left-circle-fill me-1"></i> Go back
        </a>
        <a href="login-form.php" class="text-decoration-none small">
          Already have an account? Sign in <i class="bi bi-arrow-right-circle-fill ms-1"></i>
        </a>
      </div>

    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
    <div class="merriweather">
     <div class="container my-5 mx-auto " style="max-width: 500px;">
     <h1 class="h1 mb-4 text-center"  style="text-shadow:2px 2px 2px black" ; >Sign up a New Account</h1>

    <div class="card p-4">
        <div class="card-body-overlay"></div>
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
</div>
</body>
</html>