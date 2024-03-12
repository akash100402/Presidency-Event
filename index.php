<!-- index.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Presidency</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <main>
        <header class="header_pres">
            <img src="./assets/logo.png" alt="">
            <div class="header-text">
                <h2>PRESIDENCY COLLEGE (Autonomous), Chennai - 600 005</h2>
                <h3>Reaccredited by the National Assessment and Accreditation Council with Grade "B+"</h3>
                <h4>All India Rank 3 by National Istitutional Ranking Framework (NIRF 2023)</h4>
            </div>
            <img src="./assets/185.png" alt="">
        </header>
        <article id="event-content">
            <h1 class="ca-title">About Presidency College</h1>
            <p class="ca-description">
                Presidency College is the first and the foremost institution established by the British India Government in 1840. Since then it has developed into one of the top 10 college in India with International reputation on education and research. This Government Institution in higher education can be called as ‘The Light house of entire South India on Higher Education and Research.’ The foremost University of Madras province namely the University of Madras was started in 1857, nearly 17 years after the formation of Presidency College. On this account this college in proudly nick named as “The Mother of Madras University”. The college was conferred Autonomous status in the year 1987 and got the NAAC reaccreditation with ‘A’ Grade 90% credit.
            </p>
            <div class="slideshow-container">
                <div class="mySlides fade">
                    <img src="./assets/24039.jpg" style="width:100%">
                </div>
                <div class="mySlides fade">
                    <img src="./assets/613995.jpg" style="width:100%">
                </div>
                <div class="mySlides fade">
                    <img src="./assets/85320.jpg" style="width:100%">
                </div>
            </div>
        </article>
        <aside>
            <button onclick="showMCA()"> 🎓 MCA</button>
            <a href="MCA_events.php"><button id="eve-btn"> MCA Events ➨</button></a>
            <button onclick="showBCA()"> 🎓 BCA (HR)</button>
            <a href="BCA_events.php"><button id="eve-btn"> BCA Events ➨</button></a>

        </aside>
        <footer>
            <!-- Footer content -->
        </footer>
    </main>


</body>
<script>
    function showMCA() {
        // Replace the content of the article with MCA information
        document.getElementById("event-content").innerHTML = `
                <h1 class="ca-title">Master of Computer Applications</h1>
                <p class="ca-description">
A Master of Computer Applications (MCA) degree is a postgraduate program that focuses on advanced topics in computer science and applications. It is designed to provide students with a strong theoretical foundation as well as practical skills in various aspects of computer science, software development, and information technology.</br>Graduates with an MCA degree have a wide range of career opportunities in various sectors including software development, IT consulting, database administration, web development, mobile app development, system analysis, network administration, and more. They can work in both the private and public sectors, as well as in academia and research.</p>
                <!-- Add more MCA event information as needed -->
            `;
    }

    function showBCA() {
        // Replace the content of the article with BCA information
        document.getElementById("event-content").innerHTML = `
                <h1 class="ca-title">Bachelor of Computer Applications (HR)</h1>
                <p class="ca-description">BCA (Bachelor of Computer Applications) course exclusively for hearing-impaired (HR) students, it demonstrates a commendable effort towards inclusive education. This initiative likely aims to provide equal educational opportunities for students with disabilities, specifically those who are hearing-impaired, by offering a specialized program tailored to their needs.</br>

In such a program, the curriculum and teaching methods would likely be adapted to accommodate the unique learning requirements of hearing-impaired students. This may involve the use of visual aids, sign language interpreters, captioning, and other assistive technologies to facilitate effective communication and learning in the classroom.</p>
                <!-- Add more BCA event information as needed -->
            `;
    }


    // JavaScript for slideshow functionality
    var slideIndex = 0;
    showSlides();

    function showSlides() {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {
            slideIndex = 1
        }
        slides[slideIndex - 1].style.display = "block";
        setTimeout(showSlides, 3000); // Change image every 3 seconds
    }
</script>

</html>