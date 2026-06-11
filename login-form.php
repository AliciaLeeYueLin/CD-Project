<!DOCTYPE html>
<html>
  <head>
    <title>Simple CMS</title>
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
<link href="https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap" rel="stylesheet">
    <style>
      body {
        background: #000000; 
        color:white;
      }

      .card {
        background:linear-gradient(-45deg, #000000, #8aff37, #0d190b);
        background-size: 300% 300%;
        animation: moveGradient 20s ease infinite;
        text-shadow:2px 2px 5px black;
}

@keyframes moveGradient {
  0% { background-position: 0% 50%; }
  50% { background-position: 100% 50%; }
  100% { background-position: 0% 50%; }
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
     <div class="container my-5 mx-auto merriweather " style="max-width: 500px;">
      <h1 class="h1 mb-4 text-center">Welcome Back!</h1>

      <div class="card p-4">
      
        <form method="POST" action="login.php">
          <div class="mb-3">
            <label for="username">Username</label>
        <input type="username" class="form-control" id="username" name="username" required>
       
          </div>
          <div class="mb-3">
            <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
          </div>
          <div class="d-grid">
            <button type="submit" class="btn btn-primary">Login</button>
          </div>
        </form>
      </div>

      <!-- links -->
      <div
        class="d-flex justify-content-between align-items-center gap-3 mx-auto pt-3"
      >
        <a href="index.php" class="text-decoration-none small"
          ><i class="bi bi-arrow-left-circle"></i> Go back</a
        >
        <a href="registration-form.php" class="text-decoration-none small"
          >Don't have an account? Sign up here
          <i class="bi bi-arrow-right-circle"></i
        ></a>
      </div>
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
