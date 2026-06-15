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
<link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,opsz,wght@0,18..144,300..900;1,18..144,300..900&display=swap" rel="stylesheet">
    <style>
        body{
          padding-top: 60px;
          
          overflow-x:hidden;
        }
     
.cssbuttons-io-button {
  background: #d5eb30 ;
  color: black;
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
  box-shadow: inset 0 0 1.6em -0.6em  #676108;
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
  box-shadow: 0.1em 0.1em 0.6em 0.2em #272806;
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

.merriweather {
  font-family: "Merriweather", serif;
  font-optical-sizing: auto;
  font-weight: <weight>;
  font-style: normal;
  font-variation-settings:
    "wdth" 100;
}
.cd-shape1 {
  width: 300px;
  height: 300px;
  border-radius: 0%;
  background: url("image/cdone1.png");
  background-size: cover;       
  background-position: center; 
  position: relative;
  display:flex;
  justify-content:center;
  align-items:center;
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
  background: url("image/cdtwo.png");
  background-size: cover;       
  background-position: center; 
  position: relative;
}


.inner2 {
      width: 60px;
      height: 60px;
    background:white;
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
    background:white;
      border-radius: 50%;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      opacity: 0;
    }

    @keyframes cycle {
  0%   { border-radius: 0%; transform: rotate(0deg); }
  2%  { border-radius: 50%; }    
  98%  { border-radius: 50%; transform: rotate(1380deg); }
  100% { border-radius: 0%; transform: rotate(1440deg); } 
}

    @keyframes fadeIn {
      0% { opacity: 0; }
      2% { opacity: 1; }
      98% { opacity: 1; }
      100% { opacity: 0; }
    }
    @keyframes fadeIn2 {
      0% { opacity: 0; }
      2% { opacity: 1; }
      98% { opacity: 1; }
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
#startText2 h5{
margin: 0;
 
  font-weight: 700;
  color: #fff;
  text-align: center;
  text-shadow: 2px 2px 6px rgba(0,0,0,0.6); 
  background: rgba(0,0,0,0.4);             
  padding: 8px 16px;
  border-radius: 8px;
  
}
#startText3 h5{
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
     animation: cycle 50s linear;
     }
    .animate .inner1 {
      animation: fadeIn 50s forwards;
    }
    .animate .inner2 {
      animation: fadeIn2 50s forwards;
    }
  .animate #startText{
    animation: none;
  opacity:0;
  }
  .animate #startText2{
    animation: none;
  opacity:0;
  }
  .animate #startText3{
    animation: none;
  opacity:0;
  }
  .navbar {
  background: linear-gradient(90deg, #f4e259 0%, #ebbc57 100%);
  text-shadow: 2px 2px 3px black;
}


.playing-bars {
  display: none;
  justify-content: center;
  gap: 4px;
  height: 20px;
  margin-top: 10px;
}

.animate ~ .playing-bars {
  display: flex;
}

.bar {
  width: 4px;
  height: 100%;
  background-color: #30cceb;
  animation: wavebar 0.6s ease infinite alternate,
             fade 50s linear forwards;
}
@keyframes fade {
   0% { opacity: 1; }
   98% { opacity: 1; }
  100% { opacity: 0; }
}
@keyframes wavebar {
  0% { transform: scaleY(0.3); }
  100% { transform: scaleY(1.1); }
}

.bar:nth-child(1) { animation-delay: 0.0s; }
.bar:nth-child(2) { animation-delay: 0.2s; }
.bar:nth-child(3) { animation-delay: 0.4s; }
.bar:nth-child(4) { animation-delay: 0.2s; }

.carousel {
    position: relative;
    height: 450px;
    overflow: hidden;
}

.item {
    position: absolute;
    top: 50%;
    left: 50%;
    width: 250px;
    transition: all 0.5s ease;
    transform: translate(-50%, -50%);
}

.item img {
    width: 100%;
    border-radius: 15px;
}

.center {
    transform: translate(-50%, -50%) scale(1);
    z-index: 5;
    opacity: 1;
}

.left {
    transform: translate(-180%, -50%) scale(0.8);
    opacity: 0.7;
    z-index: 3;
}

.right {
    transform: translate(80%, -50%) scale(0.8);
    opacity: 0.7;
    z-index: 3;
}

.far-left {
    transform: translate(-300%, -50%) scale(0.6);
    opacity: 0;
}

.far-right {
    transform: translate(200%, -50%) scale(0.6);
    opacity: 0;
}

.arrow {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    z-index: 10;
    border: none;
    background: rgba(255,255,255,0.8);
    padding: 10px 15px;
    border-radius: 50%;
}

.arrow-left {
    left: 20px;
}

.arrow-right {
    right: 20px;
}

section {
    padding: 60px 0;
    width: 100%;
}
    </style>
</head>
<body>

    <div class="merriweather">
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top merriweather">
        <div class="container">
            <a class="navbar-brand text-white fw-bold fs-4" href="index.php">CD Store</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link text-white" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="dashboard.php">Dashboard</a></li>
                    
                    <?php if (isset($_SESSION['user']['role']) && $_SESSION['user']['role'] == "user"): ?>
                        <li class="nav-item"><a class="nav-link text-white" href="order-history.php">Order History</a></li>
                    <?php endif; ?>
                    
                    <?php if (isset($_SESSION['user']['role']) && $_SESSION['user']['role'] == "admin"): ?>
                        <li class="nav-item"><a class="nav-link text-white" href="order-manage.php">Order Manage</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="types-manage.php">Type Manage</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="artist-manage.php">Artist Manage</a></li>
                    <?php endif; ?>
                    
                    <li class="nav-item"><a class="nav-link text-white btn btn-sm btn-danger ms-lg-2" href="logout.php">Log Out</a></li>
                </ul>
            </div>
        </div>
    </nav>
    
    <section>
            <h1 class="text-center mt-5 d-flex justify-content-center align-items-center merriweather" style="font-size:50px;">- Top tier of The Month -</h1>
            <div class="row text-center mt-5">
              <div class="col-md-4">
                <h2>500+</h2>
                <p>Albums Available</p>
              </div>
              <div class="col-md-4">
                <h2>130+</h2>
                <p>Artists</p>
              </div>
              <div class="col-md-4">
                <h2>1000+</h2>
                <p>Customers</p>
              </div>
            </div>
 
  <div class="row g-4 merriweather mt-4">
    <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
      <div class="flex-column d-flex " style="margin-top: 50px;">
        <img src="silver-medal.png" alt="" width="80px">
        <div id="cd" class="cd-shape1 mx-auto">
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
           <audio id="mySound1" src="image/I Thought I Saw Your Face Today.mp3"></audio>
               <script>
                  document.addEventListener("DOMContentLoaded", function () {
                      const card = document.getElementById("cd");
                      const sound = document.getElementById("mySound1");
                      let isPlaying = false;

                card.addEventListener("click", () => {
                    if (!isPlaying) {
                        
                        sound.currentTime = 0;
                        sound.play();
                        isPlaying = true;

            
                    sound.addEventListener("timeupdate", function stopAt45() {
                        if (sound.currentTime >= 50) {
                            sound.pause();
                            isPlaying = false;
                            sound.removeEventListener("timeupdate", stopAt45);
                        }
                    });
                } else {
            
            sound.pause();
            sound.currentTime = 0;
            isPlaying = false;
        }
    });
});
</script>
          </div>
        
        <h3 class="d-flex justify-content-center mt-3">I thought I Saw Your Face Today</h3>
        <h4 class="d-flex justify-content-center mt-3">She & Him</h4>
         <div class="playing-bars">
          <div class="bar"></div>
          <div class="bar"></div>
          <div class="bar"></div>
          <div class="bar"></div>
        </div>
      </div>
    </div>

    <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center" >
      <div class="flex-column d-flex" style="margin-top: 50px;" id="cdtwo">

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
          <audio id="mySound2" src="image/NFR.mp3"></audio>
               <script>
                  document.addEventListener("DOMContentLoaded", function () {
                      const card = document.getElementById("cd2");
                      const sound = document.getElementById("mySound2");
                      let isPlaying = false;

                card.addEventListener("click", () => {
                    if (!isPlaying) {
                        
                        sound.currentTime = 50;
                        sound.play();
                        isPlaying = true;

            
                    sound.addEventListener("timeupdate", function stopAt45() {
                        if (sound.currentTime >= 100) {
                            sound.pause();
                            isPlaying = false;
                            sound.removeEventListener("timeupdate", stopAt45);
                        }
                    });
                } else {
            
            sound.pause();
            sound.currentTime = 0;
            isPlaying = false;
        }
    });
});
</script>

        </div>
        
        <h2 class="d-flex justify-content-center mt-3">NFR</h2>
        <h4 class="d-flex justify-content-center mt-3">Lana Del Rey</h4>
        <div class="playing-bars">
          <div class="bar"></div>
          <div class="bar"></div>
          <div class="bar"></div>
          <div class="bar"></div>
        </div>
      </div>
    </div>
    

    <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
      <div class="flex-column d-flex" style="margin-top: 50px;">

        <div id="cd3" class="cd-shape3 mx-auto">
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
          <audio id="mySound3" src="image/If We Have Each Other.mp3"></audio>
               <script>
                  document.addEventListener("DOMContentLoaded", function () {
                      const card = document.getElementById("cd3");
                      const sound = document.getElementById("mySound3");
                      let isPlaying = false;

                card.addEventListener("click", () => {
                    if (!isPlaying) {
                        
                        sound.currentTime = 24;
                        sound.play();
                        isPlaying = true;

            
                    sound.addEventListener("timeupdate", function stopAt45() {
                        if (sound.currentTime >= 74) {
                            sound.pause();
                            isPlaying = false;
                            sound.removeEventListener("timeupdate", stopAt45);
                        }
                    });
                } else {
            
            sound.pause();
            sound.currentTime = 0;
            isPlaying = false;
        }
    });
});
</script>
        </div>
        <h2 class="d-flex justify-content-center mt-3">Narrated For You</h2>
        <h4 class="d-flex justify-content-center mt-3">Alec Benjamin</h4>
         <div class="playing-bars">
          <div class="bar"></div>
          <div class="bar"></div>
          <div class="bar"></div>
          <div class="bar"></div>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="about" class="py-5">
   <div class="col-12 d-flex justify-content-center align-items-center mb-5 merriweather">
    <a style="text-decoration:none;" class="d-flex justify-content-center align-items-center" href="cd-manage.php">
        <button class="cssbuttons-io-button">
          Start shopping now!
          <div class="icon">
            <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path d="M0 0h24v24H0z" fill="none"></path>
              <path d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z" fill="currentColor"></path>
            </svg>
          </div>
        </button>
    </a>
   </div>

    <div class="d-flex flex-column justify-content-center text-center mt-4">
      <h1>About Us</h1>
      <p class="mt-3" style="max-width:700px; margin:auto; font-size:18px;">
        At CD Store, we bring you the best collection of timeless classics and modern hits. 
        Whether you're a fan of pop, rock, jazz, or indie, our shelves are packed with music 
        that inspires and connects. Discover your next favorite album today!
      </p>
      <div class="mt-2">
          <button id="review" class="btn btn-outline-primary mt-3" style="padding:5px 10px; font-size:14px;">
            See What Our Customers Say ⭐
          </button>
      </div>
    </div>

    <div id="reviews" class="mt-5 text-center merriweather" style="display:none;">
      <h3>Customer Reviews</h3>
      <div class="mt-3">
        <p><strong>Sarah L.</strong> - "Amazing selection and fast delivery!"</p>
        <p><strong>James K.</strong> - "Love the monthly top picks, always spot on."</p>
        <p><strong>Aisha R.</strong> - "Great customer service and quality CDs."</p>
      </div>
    </div>
</section>

<section class="py-5">
    <h1 class="text-center">Artist Spotlight</h1>
    <div class="card mx-auto p-4 my-4" style="max-width:700px;">
      <h3>The Weeknd</h3>
      <p class="mb-0">One of the most streamed artists worldwide with multiple platinum albums.</p>
    </div>

    <h4 id="clock" class="text-center my-4"></h4>

    <div class="heros mt-5">
       <h1 class="text-center mb-4">Coming Soon</h1>
        <div class="carousel p-2">
            <button id="prevBtn" class="arrow arrow-left"><i class="bi bi-chevron-left"></i></button>

            <div class="item">
                <img src="image/cd4.jpg" alt="" />
                <figcaption class="text-center mt-1">Mitski: “That White Cat”</figcaption>
            </div>
            <div class="item">
                <img src="image/cd5.png" alt="" />
                <figcaption class="text-center mt-1">Norman D. Loco: “i want a beer”</figcaption>
            </div>
            <div class="item">
                <img src="image/cd6.png" alt="" />
                <figcaption class="text-center mt-1">Friko: “Still Around”</figcaption>
            </div>
            <div class="item">
                <img src="image/cd7.png" alt="" />
               <figcaption class="text-center mt-1">Sluice: “Vegas”</figcaption>
            </div>
            <div class="item">
                <img src="image/cd8.png" alt="" />
                <figcaption class="text-center mt-1">oldstar: “Whiskey”</figcaption>
            </div>
            
            <button id="nextBtn" class="arrow arrow-right"><i class="bi bi-chevron-right"></i></button>
        </div>
    </div>
</section>

</div>

<script>
  document.getElementById("startText").addEventListener("click", function() {
    document.getElementById("cd").classList.toggle("animate"); 
  });
  document.getElementById("startText2").addEventListener("click", function() {
    document.getElementById("cd2").classList.toggle("animate"); 
  });
  document.getElementById("startText3").addEventListener("click", function() {
    document.getElementById("cd3").classList.toggle("animate"); 
  });
  document.getElementById("review").addEventListener("click", function() {
    const reviews = document.getElementById("reviews");
    reviews.style.display = reviews.style.display === "none" ? "block" : "none";
  });
  
  setInterval(()=>{
    document.getElementById("clock").innerHTML = new Date().toLocaleTimeString();
  },1000);

  document.addEventListener("DOMContentLoaded", () => {
        const items = document.querySelectorAll(".item");
        const nextBtn = document.getElementById("nextBtn");
        const prevBtn = document.getElementById("prevBtn");
        let current = 1;

        function updateCarousel() {
            items.forEach((item, i) => {
                item.classList.remove("center", "left", "right", "far-left", "far-right");

                if (i === current) item.classList.add("center");
                else if (i === current - 1 || (current === 0 && i === items.length - 1)) item.classList.add("left");
                else if (i === current + 1 || (current === items.length - 1 && i === 0)) item.classList.add("right");
                else if (i < current - 1 || (current === 0 && i < items.length - 1)) item.classList.add("far-left");
                else item.classList.add("far-right");
            });
        }
        nextBtn.addEventListener("click", () => {
            current = (current + 1) % items.length;
            updateCarousel();
        });

        prevBtn.addEventListener("click", () => {
            current = (current - 1 + items.length) % items.length;
            updateCarousel();
        });

        updateCarousel();
  });
</script>
<footer class="bg-dark text-white text-center p-3 mt-auto">
  <p>&copy; 2026 CD Shop | Contact us at info@cdshop.com</p>
</footer>

</body>
</html>