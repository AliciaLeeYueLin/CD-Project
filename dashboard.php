<?php 
require('header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">
    <link rel="stylesheet" 
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap" rel="stylesheet">
    <style>
        body{
            overflow-x:hidden;
        }
     
.cssbuttons-io-button {
  background: #26710b;
  color: white;
  font-family: inherit;
  padding: 0.35em;
  padding-left: 1.2em;
  font-size: 17px;
  font-weight: 500;
  border-radius: 0.9em;
  border: none;
  letter-spacing: 0.05em;
  display: flex;
  align-items: center;
  box-shadow: inset 0 0 1.6em -0.6em #0d5919;
  overflow: hidden;
  position: relative;
  height: 2.8em;
  padding-right: 3.3em;
  cursor: pointer;
}

.cssbuttons-io-button .icon {
  background: white;
  margin-left: 1em;
  position: absolute;
  display: flex;
  align-items: center;
  justify-content: center;
  height: 2.2em;
  width: 2.2em;
  border-radius: 0.7em;
  box-shadow: 0.1em 0.1em 0.6em 0.2em #062809;
  right: 0.3em;
  transition: all 0.3s;
}

.cssbuttons-io-button:hover .icon {
  width: calc(100% - 0.6em);
}

.cssbuttons-io-button .icon svg {
  width: 1.1em;
  transition: transform 0.3s;
  color: #7b52b9;
}

.cssbuttons-io-button:hover .icon svg {
  transform: translateX(0.1em);
}

.cssbuttons-io-button:active .icon {
  transform: scale(0.95);
}
 .bi-list{
  color:  #ffffff;
 }
.btn-primary{
  width:100px;
 transition:width 1.5s ease;
  display: flex;            
  align-items: center;
  justify-content: center;
}
 .btn-primary:hover {
 width: 250px;
}
.btn-primary:hover .bi{
  display:none;
}
.btn-primary h4{
  display:none;
    margin: 0; 
   diplay:none;         
    transition:transform 1.5s ease;
    white-space:nowrap;
}
.btn-primary:hover h4{
  display:block;
 font-size:20px
   
}
.archivo-black-regular {
  font-family: "Archivo Black", sans-serif;
  font-weight: 400;
  font-style: normal;
}
.archivo-black-regular {
  font-family: "Archivo Black", sans-serif;
  font-weight: 400;
  font-style: normal;
}
.cd-shape1 {
  width: 300px;
  height: 300px;
  border-radius: 0%;
  background: url("image/cd1.png");
  background-size: cover;       
  background-position: center; 
  position: relative;
}
.cd-shape2 {
  width: 380px;
  height: 380px;
  border-radius: 0%;
  background: url("image/cd2.jpg");
  background-size: cover;       
  background-position: center; 
  position: relative;
}
.cd-shape3 {
  width: 300px;
  height: 300px;
  border-radius: 0%;
  background: url("image/cd3.png");
  background-size: cover;       
  background-position: center; 
  position: relative;
}


.inner2 {
      width: 60px;
      height: 60px;
      background: white;
      border-radius: 50%;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      opacity: 0;
    }
.inner1 {
      width: 50px;
      height: 50px;
      background: white;
      border-radius: 50%;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      opacity: 0;
    }

    @keyframes cycle {
  0%   { border-radius: 0%; transform: rotate(0deg); }
  10%  { border-radius: 50%; }    
  90%  { border-radius: 50%; transform: rotate(540deg); }
  100% { border-radius: 0%; transform: rotate(720deg); } 
}

    @keyframes fadeIn {
      0% { opacity: 0; }
      10% { opacity: 1; }
      90% { opacity: 1; }
      100% { opacity: 0; }
    }
    @keyframes fadeIn2 {
      0% { opacity: 0; }
      10% { opacity: 1; }
      90% { opacity: 1; }
      100% { opacity: 0; }
    }
    @keyframes fadeOut {
      0% { opacity: 1; }
      100% { opacity: 0; }
    }
#startText h5{
margin: 0;
 
  font-weight: 700;
  color: #fff;
  text-align: center;
  text-shadow: 2px 2px 6px rgba(0,0,0,0.6); 
  background: rgba(0,0,0,0.4);             
  padding: 8px 16px;
  border-radius: 8px;
  
}
    .animate {
     animation: cycle 16s linear;
     }
    .animate .inner1 {
      animation: fadeIn 16s forwards;
    }
    .animate .inner2 {
      animation: fadeIn2 16s forwards;
    }
  .animate #startText{
    animation: none;
  opacity:0;
  }
    </style>
</head>
<body>
            <h1 class="text-center mt-5 d-flex justify-content-center align-items-center archivo-black-regular" style="font-size:50px;">Top tier of June</h1>

 
  <div class="row g-4 archivo-black-regular">
    <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
      <div class="flex-column d-flex" style="margin-top: 50px;">
        <img src="silver-medal.png" alt="" width="80px">
        <div id="cd" class="cd-shape1">
          <span id="startText" style="
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 24px;
            font-weight: bold;
            color: white;
            cursor: pointer;
            z-index: 10;
          "><h5>Click to listen</h5></span>
          <div class="inner1"></div>
        </div>
        <h1 class="d-flex justify-content-center mt-3">Starboy</h1>
        <h2 class="d-flex justify-content-center mt-3">The Weekend</h2>
      </div>
    </div>

    <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
      <div class="flex-column d-flex" style="margin-top: 50px;">

        <div id="cd2" class="cd-shape2">
          <span id="startText2" style="
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 24px;
            font-weight: bold;
            color: white;
            cursor: pointer;
            z-index: 10;
          "><h5>Click to listen</h5></span>
          <div class="inner2"></div>
        </div>
        <h1 class="d-flex justify-content-center mt-3">NFR</h1>
        <h2 class="d-flex justify-content-center mt-3">Lana Del Rey</h2>
      </div>
    </div>

    <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
      <div class="flex-column d-flex" style="margin-top: 50px;">

        <div id="cd3" class="cd-shape3">
          <span id="startText3" style="
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 24px;
            font-weight: bold;
            color: white;
            cursor: pointer;
            z-index: 10;
          "><h5>Click to listen</h5></span>
          <div class="inner1"></div>
        </div>
        <h1 class="d-flex justify-content-center mt-3">NFR</h1>
        <h2 class="d-flex justify-content-center mt-3">Lana Del Rey</h2>
      </div>
    </div>
       
       <script>
     document.getElementById("startText").addEventListener("click", function() {
      document.getElementById("cd").classList.toggle("animate"); 
    });
  </script>
       <script>
     document.getElementById("startText2").addEventListener("click", function() {
      document.getElementById("cd2").classList.toggle("animate"); 
    });
  </script>
       <script>
     document.getElementById("startText3").addEventListener("click", function() {
      document.getElementById("cd3").classList.toggle("animate"); 
    });
  </script>
    </div>
      
       <div class="row g-4">
   <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
    <a style="text-decoration:none;" class="mt-5 d-flex justify-content-center align-items-center" href="cd-manage.php">
    <button class="cssbuttons-io-button">
     Start shopping now!
  <div class="icon">
    <svg
      height="24"
      width="24"
      viewBox="0 0 24 24"
      xmlns="http://www.w3.org/2000/svg"
    >
      <path d="M0 0h24v24H0z" fill="none"></path>
      <path
        d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z"
        fill="currentColor"
      ></path>
    </svg>
  </div>
</button>
</a>
</div>

<?php if ($_SESSION['user']['role']=="admin"): ?>
        <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
    <a style="text-decoration:none;" class="mt-5 d-flex justify-content-center align-items-center" href="artist-manage.php">
    <button class="cssbuttons-io-button">
     Manage type
  <div class="icon">
    <svg
      height="24"
      width="24"
      viewBox="0 0 24 24"
      xmlns="http://www.w3.org/2000/svg"
    >
      
      <path d="M0 0h24v24H0z" fill="none"></path>
      <path
        d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z"
        fill="currentColor"
      ></path>
    </svg>
  </div>
</button>
</a>
     </div>   
 <?php endif; ?>
    <?php if ($_SESSION['user']['role']=="admin"): ?>

        <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
    <a style="text-decoration:none;" class="mt-5 d-flex justify-content-center align-items-center" href="types-manage.php">
      <div class="btn btn-primary">
   <i class="bi bi-list"></i>
   <h4>Type Manage</h4>
    </div>
       </div>   
             <?php endif; ?>

    <?php if ($_SESSION['user']['role']=="admin"): ?>

        <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
    <a style="text-decoration:none;" class="mt-5 d-flex justify-content-center align-items-center" href="order-manage.php">
      <div class="btn btn-primary">
   <i class="bi bi-list"></i>
   <h4>Type Manage</h4>
    </div>
       </div>   
             <?php endif; ?>
    <?php if ($_SESSION['user']['role']=="user"): ?>

        <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
    <a style="text-decoration:none;" class="mt-5 d-flex justify-content-center align-items-center" href="order-history.php">
      <div class="btn btn-primary">
   <i class="bi bi-list"></i>
   <h4>Order Manage</h4>
    </div>
       </div>   
             <?php endif; ?>
</body>
</html>