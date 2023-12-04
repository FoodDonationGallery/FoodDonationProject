<div class="headers">
        <a href="home.php" class="logo">
        <div class="lo">
            <img src="img/logo.jpeg" style="width: 100px; height:65px">
        </div> Food Donation Gallery</a>
        <nav class="navbar">
        <?php
               $select_cart_number = mysqli_query($conn, "SELECT * FROM `d_cart` WHERE user_id = '$user_id'") or die('query failed');
               $cart_rows_number = mysqli_num_rows($select_cart_number); 
            ?>

            <a class="active" href="home.php">Home</a>
            <a href="donation.php">Donation</a>
            <a href="menu.php">Order</a>
            <a href="treatment.php">Treatment</a>
            <a href="contact.php">Contact Us</a>
            <!-- <a href="donate_cart.php">Cart<span>(<?php echo $cart_rows_number; ?>)</span></a> -->

        </nav>
    
        <div class="icons">

            <i class="fas fa-bars" id="menu-bars"></i>
            <i class="fas fa-search" id="search-icon"></i>
            <a href="donate_cart.php" class="fa-solid fa-cart-shopping" id="search-icon"><span>(<?php echo $cart_rows_number; ?>)</span></a>
            <a href="profile.php" class="fa-solid fa-user"></a>
            <a href="logout.php" class="fa-solid fa-user-xmark"></a>
        </div>
    
    </div>

        <!-- button -->
        <a class="float-button" href="donation.php">
        <i class="fa-light fa-hands-holding-dollar"></i>  <span>DONATE NOW<span>
    </a>

    <section class="home1">
    <div class="contentts">
        <span data-aos="fade-up" data-aos-delay="150">Welcome To</span>
        <h3 data-aos="fade-up" data-aos-delay="300">Donations</h3>
    </div>

   </section>

       <!-- video gallery
       <div class="containerss">

<h1>Malnutrition of the World</h1>

<div class="video-containe">
<div class="videos"><video src="images/v1.mp4" muted autoplay></video></div>
<div class="videos"><video src="images/v2.mp4" muted autoplay></video></div>
<div class="videos"><video src="images/v3.mp4" muted autoplay></video></div>

</div> -->
</div>

<!-- donation school lists -->
<!-- <section class="school">
    <div class="school-name">
        <div class="set">
            <i class="fa-solid fa-building-columns"></i>
            <h3>School 01</h3>
            <p>MR/Maramba K.V.</p>
            <h4>Students= 150</h4>
        </div>
        <div class="set">
            <i class="fa-solid fa-building-columns"></i>
            <h3>School 02</h3>
            <p>MR/Lenama K.V.</p>
            <h4>Students= 110</h4>
        </div>
        <div class="set">
            <i class="fa-solid fa-building-columns"></i>
            <h3>School 03</h3>
            <p>MR/Dediyagala K.V.</p>
            <h4>Students= 90</h4>
        </div>
        <div class="set">
            <i class="fa-solid fa-building-columns"></i>
            <h3>School 04</h3>
            <p>G/Bategoda K.V.</p>
            <h4>Students= 80</h4>
        </div>
        <div class="set">
            <i class="fa-solid fa-building-columns"></i>
            <h3>School 05</h3>
            <p>G/Pankyananda K.V.</p>
            <h4>Students= 100</h4>
        </div>
        <div class="set">
            <i class="fa-solid fa-building-columns"></i>
            <h3>School 06</h3>
            <p>MR/Godapitiya K.V.</p>
            <h4>Students= 70</h4>
        </div>
        <div class="set">
            <i class="fa-solid fa-building-columns"></i>
            <h3>School 07</h3>
            <p>MR/Akuressa K.V.</p>
            <h4>Students= 85</h4>
        </div>
        <div class="set">
            <i class="fa-solid fa-building-columns"></i>
            <h3>School 08</h3>
            <p>MR/Deniyaya K.V.</p>
            <h4>Students= 65</h4>
        </div>
    </div>
</section>
 -->

 <div class="sch-container">

    <h1 class="sch-heading">SCHOOL DETAILS</h1>

    <div class="sch-box-container">

                <div class="sch-box">
            <h3>MR/Maramba K.V.</h3>
            <p>Primary school located in Akuressa, Maramba area. All together 120 students.</p>
            <a href="#" class="sch-btn">120 Students</a>
        </div>

        <div class="sch-box">
            <h3>MR/Lenama K.V.</h3>
            <p>Primary school located in Akuressa, Deegala area. All together 50 students.</p>
            <a href="#" class="sch-btn">50 Students</a>
        </div>

        <div class="sch-box">
            <h3>MR/Dediyagala K.V.</h3>
            <p>Primary school located in Akuressa, Diyalape area. All together 90 students.</p>
            <a href="#" class="sch-btn">90 Students</a>
        </div>

        <div class="sch-box">
            <h3>G/Bategoda K.V.</h3>
            <p>Primary school located in Galle, Bategoda area. All together 80 students.</p>
            <a href="#" class="sch-btn">80 Students</a>
        </div>

        <div class="sch-box">
            <h3>Ke/Pankyananda K.V.</h3>
            <p>Primary school located in Kegalle, Beruwala area. All together 100 students.</p>
            <a href="#" class="sch-btn">100 Students</a>
        </div>

        <div class="sch-box">
            <h3>Ke/Massala K.V.</h3>
            <p>Primary school located in Kegalle, Massala area. All together 70 students.</p>
            <a href="#" class="sch-btn">70 Students</a>
        </div>

        <div class="sch-box">
            <h3>G/Kuligoda Sumana K.V.</h3>
            <p>Primary school located in Galle, Keligoda area. All together 85 students.</p>
            <a href="#" class="sch-btn">85 Students</a>
        </div>

        <div class="sch-box">
            <h3>MR/Deniyaya K.V.</h3>
            <p>Primary school located in Matara, Deniyaya area. All together 65 students.</p>
            <a href="#" class="sch-btn">65 Students</a>
        </div>




    </div>

</div>
