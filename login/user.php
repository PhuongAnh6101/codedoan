 <?php include('partials-front/menu.php') ?>
<link rel="stylesheet" href="login/style.css" /> 
<form action="#" class="" method="POST">
            <h2 class="">Sign up</h2>
            <div >
              <i class="fas fa-user"></i>
              <input type="text" name="username" placeholder="Username" />
            </div>
            
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" placeholder="Password" />
            </div>
             <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" name="email" placeholder="Email" />
            </div>
             <div class="input-field">
              <i class="fas fa-phone"></i>
              <input type="Number" name="phone_number" placeholder="Phone Number" />
            </div>
             <div class="input-field">
              <i class="fas fa-map-marker"></i>
              <input type="text" name="address" placeholder="Address" />
            </div>
            <input type="submit" name="submit1" class="btn" value="Sign up" /> 
            <p class="social-text">Or Sign up with social platforms</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </form>

  <?php include('partials-front/footer.php') ?>