<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HealthConnect</title>

    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>
<body>

<!-- NAVBAR -->

<header>
    <nav class="navbar">

        <div class="logo">
            <h2>Health<span>Connect</span></h2>
        </div>

        <ul class="nav-links">
            <li><a href="#">Home</a></li>
            <li><a href="#">Consult</a></li>
            <li><a href="#">Doctors</a></li>

            <li class="dropdown">
                <a href="#">Facilities <i class="fa fa-angle-down"></i></a>

                <ul class="dropdown-menu">
                    <li><a href="#">Hospitals</a></li>
                    <li><a href="#">Clinics</a></li>
                    <li><a href="#">Diagnostics</a></li>
                </ul>
            </li>

            <li><a href="#contact">Contact</a></li>
        </ul>

        <div class="buttons">

            <a href="admin/admin_login.php">
                <button class="login-btn">
                    Login
                </button>
            </a>

            <button class="patient-btn">
                Patient Login
            </button>

        </div>

    </nav>
</header>

<!-- HERO -->

<section class="hero">

    <div class="hero-left">

        <div class="badge">
            ✔ Trusted by 50,000+ Patients
        </div>

        <h1>Doctor in Seconds</h1>

        <p>
            Ask health questions and connect
            with verified doctors instantly.
        </p>

        <div class="search-box">
            <input
            type="text"
            id="searchInput"
            placeholder="Search symptoms, conditions, specialists...">

            <button onclick="searchDoctor()">
                Search
            </button>
        </div>

        <div class="hero-buttons">
            <button>Ask a Doctor</button>
            <button>Book Appointment</button>
        </div>

    </div>

    <div class="hero-right">

        <div class="circle">
            <i class="fa-solid fa-heart"></i>
        </div>

    </div>

</section>

<!-- SERVICES -->
<?php
include 'db.php';

$result = mysqli_query($conn, "SELECT * FROM features");
?>

<section class="services">

    <h2>How Can We Help You?</h2>

    <div class="service-grid">

        <?php while($row = mysqli_fetch_assoc($result)) { ?>

            <div class="card">
               <img
               src="uploads/<?php echo $row['image']; ?>"
               width="70"
               height="70">
               <h3><?php echo $row['title']; ?></h3>
               <p><?php echo $row['description']; ?></p>
           </div>

       <?php } ?>

   </div>

</section>
<!-- HOW IT WORKS -->

<section class="how-it-works">

    <h2>How It Works</h2>

    <div class="steps">

        <div class="step">
            <div class="number">1</div>
            <h3>Search</h3>
            <p>Find doctors by specialty or location.</p>
        </div>

        <div class="step">
            <div class="number">2</div>
            <h3>Compare</h3>
            <p>Compare ratings and availability.</p>
        </div>

        <div class="step">
            <div class="number">3</div>
            <h3>Consult</h3>
            <p>Book appointments instantly.</p>
        </div>

    </div>

</section>

<!-- WHY CHOOSE -->

<section class="why-us">

    <h2>Why Choose Us?</h2>

    <div class="features">

        <div class="feature">
            <i class="fa-solid fa-shield"></i>
            <h3>Verified Doctors</h3>
        </div>

        <div class="feature">
            <i class="fa-solid fa-bolt"></i>
            <h3>Instant Appointments</h3>
        </div>

        <div class="feature">
            <i class="fa-solid fa-file-medical"></i>
            <h3>Digital Prescriptions</h3>
        </div>

        <div class="feature">
            <i class="fa-solid fa-comments"></i>
            <h3>Follow-up Support</h3>
        </div>

    </div>

</section>

<!-- APP SECTION -->

<section class="mobile-app">

    <div class="app-content">

        <h2>Healthcare in Your Pocket</h2>

        <p>
            Download our app and connect
            with doctors anytime, anywhere.
        </p>

        <button>
            Download App
        </button>

    </div>

    <div class="phone">

        <div class="screen">
            <h3>HealthConnect</h3>
            <p>Doctor in 60 Seconds</p>
        </div>

    </div>

</section>
<section id="contact" class="contact-section">

    <h2>Contact Us</h2>
    <p>Have questions? Send us a message.</p>

    <form action="contact.php" method="POST">

        <input
        type="text"
        name="name"
        placeholder="Your Name"
        required>

        <input
        type="email"
        name="email"
        placeholder="Your Email"
        required>

        <input
        type="tel"
        name="phone"
        placeholder="Phone Number">

        <textarea
        name="message"
        placeholder="Your Message"
        required></textarea>

        <button type="submit">
            Send Message
        </button>

    </form>

</section>

<!-- FOOTER -->

<footer>

    <div class="footer-content">

        <div>
            <h3>HealthConnect</h3>
            <p>Your healthcare partner.</p>
        </div>

        <div>
            <h4>Quick Links</h4>
            <ul>
                <li>Home</li>
                <li>Doctors</li>
                <li>Hospitals</li>
            </ul>
        </div>

        <div>
            <h4>Contact</h4>
            <p>support@healthconnect.com</p>
        </div>

    </div>

</footer>

<script src="script.js"></script>

</body>
</html>