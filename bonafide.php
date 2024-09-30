<?php
// Database connection settings
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "university"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course = $_POST['course'];
    $name = $_POST['name'];
    $startDate = $_POST['start_date'];
    $endDate = $_POST['end_date'];

    // SQL to insert data into the table
    $sql = "INSERT INTO store (course, name, start_date, end_date)
    VALUES ('$course', '$name', '$startDate', '$endDate')";

    if ($conn->query($sql) === TRUE) {
        echo "<!DOCTYPE html>
        <html lang='en'>
    
        <head>
            <meta charset='UTF-8'>
            <meta http-equiv='X-UA-Compatible' content='IE=edge'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Certification</title>
            <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
            <link rel='preconnect' href='https://fonts.googleapis.com'>
            <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
            <link href='https://fonts.googleapis.com/css2?family=Noto+Sans+Mono:wght@300;500&display=swap' rel='stylesheet'>
            <link rel='stylesheet' href='style.css'>
        </head>
    
        <body>
            <main id='main'>
                <div class='container'>
                    <div class='certificate-header'>
                        <h1>Sri Shakthi institute of engineering and Technology</h1>
                    </div>
                    <div class='certificate-main'>
                        <p>This certificate is to certify that</p>
                        <h4 class='candidate-name' id='candidate_name'>$name</h4>
                        <p>is a Bonafide student studying <b><span class='candidate_course' id='subject'>$course</span></b> at Sri Shakthi institute of engineering and Technology.</p>
                        <p class='sign'>RaviKumar</p>
                        <div class='hr'></div>
                        <h6>Principal</h6>
                        <h5>Principal of SIET</h5>
                        <img class='full_logo' src='https://tse2.mm.bing.net/th?id=OIP.2Nsc5uD7mzKVC5yF4AQeogAAAA&pid=Api&P=0&h=180' alt='Infocom'>
                    </div>
                </div>
                <button id='btn' class='button'>Download Button</button>
            </main>
    
            <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
            <script src='https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.min.js'></script>
            <script src='https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.0/FileSaver.min.js'></script>
            <script>
                document.getElementById('btn').addEventListener('click', function () {
                    var na = '$name'.split(' ').join('');
                    domtoimage.toBlob(document.getElementById('main')).then(function (blob) {
                        window.saveAs(blob, na + '-result.png');
                    }).catch(function (error) {
                        console.error('oops, something went wrong!', error);
                    });
                });
            </script>
        </body>
        </html>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
