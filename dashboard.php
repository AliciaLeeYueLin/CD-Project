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
    </style>
</head>
<body>
            <h1 class="text-center mt-5 d-flex justify-content-center align-items-center">Top tier of June</h1>

    <div class="row g-4">
        <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
            <div class="flex-column d-flex "style="margin-top: 50px;">
                <img src="silver-medal.png" alt="" width="80px">
                <div><img src="image/cd1.png" alt="" width="300px"></div>
                <h1 class="d-flex justify-content-center">Starboy</h1>
                <h2 class="d-flex justify-content-center">The weekend</h2>
            </div>
        </div>
        <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
            <div class="flex-column d-flex justify-content-center" style="margin-top: 50px;">
                <img src="quality.png" alt="" width="80px">
                <div><img src="image/cd2.jpg" alt="" width="380px"></div>
                <h1 class="d-flex justify-content-center">NFR</h1>
                <h2 class="d-flex justify-content-center">Lana Del Rey</h2>
            </div>
        </div>
        <div class="col-12 col-lg-4  d-flex justify-content-center align-items-center">
            <div class="flex-column" style="margin-top: 50px;">
                <img src="medal.png" alt="" width="80px">
                <div><img src="image/cd3.png" alt="" width="300px"></div>
                <h1 class="d-flex justify-content-center">Mayhem</h1>
                <h2 class="d-flex justify-content-center">Lady Gaga</h2>
            </div>
        </div>
        
    </div>
      <div class="row g-4">
             

      
   <div class="col-6 col-lg-4 d-flex justify-content-center align-items-center">
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
        <div class="col-6 col-lg-4 d-flex justify-content-center align-items-center">
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
       </div>   
 <?php endif; ?>
    <?php if ($_SESSION['user']['role']=="admin"): ?>

        <div class="col-6 col-lg-4 d-flex justify-content-center align-items-center">
    <a style="text-decoration:none;" class="mt-5 d-flex justify-content-center align-items-center" href="types-manage.php">
      <div class="btn btn-primary">
   <i class="bi bi-list"></i>
   <h4>Type Manage</h4>
    </div>
       </div>   
             <?php endif; ?>
</body>
</html>
