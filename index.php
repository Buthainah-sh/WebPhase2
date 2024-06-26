<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home & Co</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatiable" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleHome.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>


    <div class="main">
        <header> 
            <div class="navbar"> 
                <div class="icon"> 
                    <a href="index.php"> 
                        <img class="logo" src="img/logo.png" alt="DecorDirect Logo"> 
                    </a> 
                </div> 
            </div> 
        </header>

            <div class="content">
                <h1>Design <br><span id="typed-text"></span> <br></h1>
                <p class="par">Allow your imagination to take over, And with our help <br>
                    we will make your dreams come true! <br>
                    Join us for the BEST design services </p>
                <button class="cn"><a href="signup.html">JOIN US</a></button>
            </div>
        </div>
        
            <main>
            <div class="pc">
                <h2>Why Us?</h2>
                <div class="course-container">


                    <div class="course">

                        <img src="img/creative.jpg" alt="creative">

                        <h3 >
                            Creative Design </h3>

                        <p>We
                            deisgn Creative ideas, and bring them to life</p>

                    </div>

                    <div class="course">

                        <img src="img/comfort.jpg" alt="comfortable">

                        <h3>
                            Comfortable Designing</h3>

                        <p>We
                            help you be comfortable while developing creative ideas</p>

                    </div>

                    <div class="course">

                        <img src="img/advice.jpg" alt="advice">

                        <h3>Graet
                            Advice</h3>

                        <p>We
                            provide the best advices based on your prefrences and style</p>

                    </div>

                </div>

            </div>
        </main>

        <footer>
            <div class="footer-content">

                <h3 id="footer-header">Contact us</h3>

                <ul class="socials">
                    <li><a href=""><i class="fa fa-facebook"></i></a></li>
                    <li><a href=""><i class="fa fa-twitter"></i></a></li>
                    <li><a href=""><i class="fa fa-linkedin-square"></i></a></li>
                </ul>

                <div class=”footer-bottom”>
                    <p>copyright &copy; 2024 - Home & Co </p>
                </div>

            </div>
        </footer>



         <!--scrept for typing effect -->
        <script>
            const typedTextSpan = document.getElementById("typed-text");
            const textArray = ["Your DREAM", "Your Future", "Your Space"];
            const typingDelay = 100;
            const erasingDelay = 50;
            const newTextDelay = 1500; // Delay between current and next text
            let textArrayIndex = 0;
            let charIndex = 0;
            
            function type() {
              if (charIndex < textArray[textArrayIndex].length) {
                typedTextSpan.textContent += textArray[textArrayIndex].charAt(charIndex);
                charIndex++;
                setTimeout(type, typingDelay);
              } else {
                // Erase after some time
                setTimeout(erase, newTextDelay);
              }
            }
            
            function erase() {
              if (charIndex > 0) {
                typedTextSpan.textContent = textArray[textArrayIndex].substring(0, charIndex - 1);
                charIndex--;
                setTimeout(erase, erasingDelay);
              } else {
                textArrayIndex++;
                if (textArrayIndex >= textArray.length) textArrayIndex = 0;
                setTimeout(type, typingDelay + 1100);
              }
            }
            
            document.addEventListener("DOMContentLoaded", function() { // On DOM Load initiate the effect
              if (textArray.length) setTimeout(type, newTextDelay + 250);
            });
            </script>

            <!--END OF scrept for typing effect -->
               
</body>

</html>