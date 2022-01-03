<?php include('partials-front/menu.php') ?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="css/stylet.css">

<style>
.home  h3{
  font-size: 3rem;
  color:#333;
  position: relative;
  left: 200px;
  top :0px;
}

.home  p{
  font-size: 1.0rem;
  color:#666;
  padding:1rem 5;
  position: relative;
    right: -200px;;
    width: 500px;
  top :10px;
}
.btn2{
  text-decoration: none;
  font-size: 30px;
  display: inline-block;
  padding:.8rem 3rem;
  border:.2rem solid var(--red);
  color:var(--red);
  cursor: pointer;
  font-size: 1.7rem;
  border-radius: .5rem;
  position: relative;
  overflow: hidden;
  z-index: 0;
  margin-top: 1rem;
  position: relative;
  left: -100px;
  top :50px;
}

.btn2::before{
  content: '';
  position: absolute;
  top:0; right: 0;
  width:0%;
  height:100%;
  background:var(--red);
  transition: .3s linear;
  z-index: -1;
}

.btn2:hover::before{
  width:100%;
  left: 0;
}

.btn2:hover{
  color:#fff;
}
.img img{
max-width:600px;
  padding:1rem;
  animation:float 3s linear infinite;
    position: relative;
  left: 800px;
   top: 0px;
    background:url(../images/home-bn.png) ;
}


/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */


.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .prev, .next,.text {font-size: 11px}
}
</style>
</head>
<body>




<section class="home" id="home">


    

<div class="mySlides fade">
  <div class="circle1"></div>
<div class="content">
        <h3>OUR STORY</h3>
        <p>Since 2021, Magnolia Bakery has been one of VIETNAM’s most-cherished bakeshops and set the standard for tried-and-true desserts and baked goods. Learn more about our journey from neighborhood gem to sweet success.</p>
       
        
    </div>

    <div class="image111">
        <img src="images/ab1.png" alt="" width="120%">
    </div>
</div>
</div>


<div class="mySlides fade">
   <div class="circle"></div>
<div class="content">
        <h3>JOIN OUR TEAM</h3>
        <p>Hospitality is at the heart of the Magnolia Bakery experience. We believe a respectful, empathetic working environment is crucial to creating a positive team experience and keeping our guests happy. Interested in one of the sweetest gigs around? Visit our careers page to see openings at all of our U.S. locations.</p>
      
        
    </div>

    <div class="image111">
        <img src="images/ab2.png" alt="">
    </div>
</div>
</div>


<div class="mySlides fade">
<div class="circle3"></div>

<div class="content">
        <h3>GIVING BACK</h3>
        <p>We’re committed to serving our local communities by supporting small businesses, charities, schools, and bake sales. If you’re seeking a product donation for your cause, reach out to hello @magnoliabakery.com</p>
       
        
    </div>

    <div class="image111">
        <img src="images/ab3.png" alt="">
    </div>
</div>
</div>

</section>

<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>

</div>




 






<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>

</div>
<!--

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
   <span class="dot" onclick="currentSlide(4)"></span> 
</div>
-->
<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>

</body>
</html> 
 <?php include('partials-front/footer.php') ?>