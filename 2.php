<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>complete responsive food website design tutorial </title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/stylet.css">

</head>
<body>
    
<!-- header section starts  -->




<!-- header section ends -->

<!-- home section starts  -->

<section class="home" id="home">
      



    <div class="content">
        <h3>food made with love</h3>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptas accusamus tempore temporibus rem amet laudantium animi optio voluptatum. Natus obcaecati unde porro nostrum ipsam itaque impedit incidunt rem quisquam eos!</p>
        <a href="categories.php" class="btn1">order now</a>
        
    </div>

    <div class="image">
        <img src="images/home-img-3.png" class="starbucks">
    </div>
</div>
<ul class="thumb">
    <li><img src="images/home-img-3.png" onclick="imgSlide('images/home-img-3.png')"></li>
      <li><img src="images/home-img-2.png" onclick="imgSlide('images/home-img-2.png')"></li>
        <li><img src="images/home-img-1.png" onclick="imgSlide('images/home-img-1.png')"></li>
</ul>

 
    



</section>
<script type="text/javascript">
    function imgSlide(anything) {
        document.querySelector('.starbucks').src = anything;
    }
</script>
 
<!-- home section ends -->

<!-- speciality section starts  -->


























</body>
</html>