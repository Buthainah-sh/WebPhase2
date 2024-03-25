<?php
session_start();

if( !isset($_SESSION['designer_id']) || !$_SESSION['designer_id']  || empty($_SESSION['designer_id'])  ){
	header("Location:logout.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Design Consultation</title>
    <link rel="stylesheet" href="styleconult.css">
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

<?php
session_start();

$connection = mysqli_connect('localhost', 'root', 'root', 'home');
$error = mysqli_connect_error();

// Accessing session variables
$designersesionId = $_SESSION['designer_id'];

if ($error) {
    exit($error);
}
else {
    if (isset($_GET['request_id'])) {
    $requestId = $_GET['request_id'];

// Fetch data for display
$query = "SELECT * FROM designconsultationrequest WHERE statusID='$requestId' AND designerID='$designersesionId'";
$result = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($result)) {
    $ClientID = $row['ClientID'];
    $roomTypeID = $row['roomTypeID'];
    $designCategoryID = $row['designCategoryID'];
    $roomWidth = $row['roomWidth'];
    $roomLength = $row['roomLength'];
    $colorPreferences = $row['colorPreferences'];
    $date = $row['date'];
    $statusid = $row['statusID'];

    // Fetch client name
    $clientQuery = "SELECT * FROM client WHERE id='$ClientID'";
    $clientResult = mysqli_query($connection, $clientQuery);
    $clientRow = mysqli_fetch_assoc($clientResult);
    $clientname = $clientRow['firstName'] . ' ' . $clientRow['lastName'];

    // Fetch design category
    $categoryQuery = "SELECT * FROM designcategory WHERE id='$designCategoryID'";
    $categoryResult = mysqli_query($connection, $categoryQuery);
    $categoryRow = mysqli_fetch_assoc($categoryResult);
    $category = $categoryRow['category'];

    // Fetch room type
    $roomTypeQuery = "SELECT * FROM roomtype WHERE id='$roomTypeID'";
    $roomTypeResult = mysqli_query($connection, $roomTypeQuery);
    $roomTypeRow = mysqli_fetch_assoc($roomTypeResult);
    $roomtype = $roomTypeRow['type'];
}
    }//requestID
}//no error
?>

        <div class="container">
            <h2 id="titl">Design Consultation</h2> <br>

            <form id="consultationForm" action="Accept_request.php" method="post" enctype="multipart/form-data">

                <input type="hidden" name="request_id" value="<?php echo $requestId; ?>"> <!-- Hidden input -->
                
                <label for="clientName">Client Name:</label>
                <?php echo $clientname; ?><br>

                <label for="roomType">Room Type:</label>
                <?php echo $roomtype; ?><br>

                <label for="designCategory">Design Category:</label>
                <?php echo $category; ?><br>

                <label for="dimensions">Dimensions:</label>
                <?php echo $roomWidth . 'x' . $roomLength . 'm'; ?><br>

                <label for="colorPreferences">Color Preferences:</label>
                <?php echo $colorPreferences; ?><br>

                <label for="date">Date:</label>
                <?php echo $date; ?><br>

                <label for="consultationText">Consultation:</label><br>
                <textarea id="consultationText" name="consultationText" rows="6" cols="50" required></textarea><br><br>

                <label for="designImage">Upload Design Image:</label>
                <input type="file" id="designImage" name="designImage" accept="image/*"><br>

                <button type="submit">Submit</button>
            </form>
        </div>

        <footer>
            <div class="footer-content">

                <h3 id="footer-header">Contact us</h3>

                <ul class="socials">
                    <li><a href=""><i class="fa fa-facebook"></i></a></li>
                    <li><a href=""><i class="fa fa-twitter"></i></a></li>
                    <li><a href=""><i class="fa fa-linkedin-square"></i></a></li>
                </ul>

                <div class="footer-bottom">
                    <p>copyright &copy; 2024 - Home & Co </p>
                </div>

            </div>
        </footer>
    </div>
</body>

</html>