<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {    
    session_start();
    $connection = mysqli_connect('localhost', 'root', 'root', 'home');
    $error = mysqli_connect_error(); 

    // Accessing session variables
    $designerSessionId = $_SESSION['designer_id'];
    if (isset($_POST['request_id'])) {
        $requestId = $_POST['request_id'];
    }
     
    $consText = $_POST["consultationText"];
    
    // File upload handling
    $targetDir = "img/";
    $targetFile = $targetDir . basename($_FILES["designImage"]["name"]);
    
    // Move uploaded file to the target directory
    if (move_uploaded_file($_FILES["designImage"]["tmp_name"], $targetFile)) {
        echo "The file " . htmlspecialchars(basename($_FILES["designImage"]["name"])) . " has been uploaded.";
        
        // Update statusID to '3' in designconsultationrequest table
        $query = "UPDATE designconsultationrequest SET statusID = '3' WHERE statusID='$requestId' AND designerID='$designerSessionId'";
        $result = mysqli_query($connection, $query);
        
        if ($result) {
            echo "Status updated successfully!";
            
            // Insert into DesignConsultation table
            $insertQuery = "INSERT INTO DesignConsultation (`requestID`, `consultation`, `consultationImgFileName`) VALUES ('$requestId','$consText','$targetFile')";
            $result2 = mysqli_query($connection, $insertQuery);
            
            if ($result2) {
                echo "A new design consultation added to the database successfully!";
                header("Location: designerHome.php");
                exit();
            } else {
                echo "Error adding a new design consultation to the database: " . mysqli_error($connection);
            }
        } else {
            echo "Error updating status: " . mysqli_error($connection);
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>