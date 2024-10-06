<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #333;
            color: #fff;
            padding: 1em;
            text-align: center;
        }
        main {
            padding: 20px;
        }
        footer {
            background-color: #333;
            color: #fff;
            padding: 1em;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f5f5f5;
        }
        .container {
            text-align: center;
        }
        h1 {
            margin-bottom: 20px;
        }
        .options {
            display: flex;
            justify-content: space-between;
            max-width: 300px;
            margin: 0 auto;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            text-decoration: none;
            color: white;
            background-color: #333;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .button:hover {
            background-color: #555;
        }
        .slider-container {
        width: 80%;
        /* margin: 225px; */
        overflow: hidden;
        position: relative;
        }
        .slides {
        display: flex;
        transition: transform 0.5s ease-in-out;
        }
        .slide {
        min-width: 100%;
        }
        .slide img {
        width: 100%;
        height: auto;
        }
        .prev, .next {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        font-size: 24px;
        cursor: pointer;
        color: #fff;
        background-color: #333;
        padding: 10px;
        border: none;
        outline: none;
        user-select: none;
        }
        .prev {
        left: 0;
        }
        .next {
        right: 0;
        }
        .header-buttons {
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }
        .header-buttons a {
            margin-left: 10px;
        }
    </style>
    <title>p2 Scholarships Home</title>
</head>
<body style="background:linear-gradient(to right, rgb(134, 239, 172), rgb(59, 130, 246), rgb(147, 51, 234));">
    <header>
        <h1><i>P<sup>2</sup> Scholarships</i></h1>
        <div class="header-buttons">
            <a href="login_page.php" class="button"><strong>Login</strong></a>
            <a href="register_form.php" class="button"><strong>Signup</strong></a>
        </div>
    </header>
    <main>
        <section>
            <center><h2> Welcome to Our Website </h2>
        <div class="slider-container">
            <div class="slides">
                <div class="slide"><a href="register_form.php"><img src="slider/slider1.jpg" alt=""></a></div>
                <div class="slide"><img src="slider/slider2.jpg" alt=""></div>
                <div class="slide"><img src="slider/slider4.jpg" alt=""></div>
                <div class="slide"><img src="slider/slider8.jpg" alt=""></div>
                <div class="slide"><img src="slider/slider17.jpg" alt=""></div>
                <div class="slide"><img src="slider/pariksha_pe_charcha_eng.jpg" alt=""></div>
                <div class="slide"><img src="slider/slider10.jpg" alt=""></div>
                <div class="slide"><img src="slider/slider13.jpg" alt=""></div>
            </div>
            <button class="prev" onclick="changeSlide(-1)">&#10094;</button>
            <button class="next" onclick="changeSlide(1)">&#10095;</button>
        </div>
        </center>
        <script>
            let currentSlide = 0;
            const intervalTime = 5000;
            function showSlide(index) {
                const slides = document.querySelector('.slides');
                const totalSlides = document.querySelectorAll('.slide').length;
                if (index >= totalSlides) {
                currentSlide = 0;
                } else if (index < 0) {
                currentSlide = totalSlides - 1;
                } else {
                currentSlide = index;
                }
                const translation = -currentSlide * 100 + '%';
                slides.style.transform = 'translateX(' + translation + ')';
            }

            function changeSlide(direction) {
                showSlide(currentSlide + direction);
            }
            function startCarousel() {
                setInterval(function () {
                    changeSlide(1);
                }, intervalTime);
            }
            startCarousel();
            </script>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 <i>P<sup>2</sup> Scholarships</i>. All rights reserved.</p>
    </footer>
</body>
</html>
