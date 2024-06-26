<?php
session_start();

if( !isset($_SESSION['Client_id']) || !$_SESSION['Client_id']  || empty($_SESSION['Client_id'])  ){
	header("Location:logout.php");
}

?>

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

<style>

body {
  background-image: url('img/background.jpg');
  background-size: cover;
  background-position: center;
  font-family: 'Arial', sans-serif;
  margin: 0;
  padding: 0;
  color: #30394e;
}

.header {
  display: flex;
  justify-content: space-between;
  padding: 20px;
  background-color: #f5f5f5;
}

.header h1 {
  margin: 0;
}
  .logout-link {
    align-self: center;
    text-decoration: none;
    color: #000;
  }
  .content {
    padding: 20px;
  }
  table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
  }
  th, td {
    border: 1px solid #000;
    padding: 10px;
    text-align: left;
  }
  .filter-section {
    margin-bottom: 20px;
  }

.designer-table h2 , .request-table h2{
  text-align: center;
  color: #30394e;  
  margin-bottom: 10px; 
}


.filter-section select,
.filter-section button {
  padding: 10px;
  margin-right: 10px;
}

.client-info, .designer-table, .request-table {
  margin-bottom: 20px;
}

.request-button {
  background-color: #ddd;
  border: none;
  padding: 10px 20px;
  cursor: pointer;
}

  .header h1, .logout-link, label, .request-button, a, table td , .client-info {
  color: #30394e; 
}


.client-info {
  padding: 15px;
  margin-bottom: 20px;
  border-radius: 5px;
}

.client-detail {
  margin-bottom: 10px;
}

.client-detail label {
  font-weight: bold;
  display: block;
}

.client-detail div {
  padding: 5px 0;
}

.designer-logo, .designer-name {
  text-align: center; 
}

.designer-logo {
  margin-bottom: 5px; 
}

.designer-logo-img {
  max-width: 100px; /* Adjust the size to your preference */
  max-height: 100px;
  width: auto;
  height: auto;
  display: block; /* This ensures the image is centered within its container */
  margin: 0 auto;
}



.content {
  padding: 20px;
}

.header-content h1,
.sign-out-button {
  color: #fff; 
}

.white-background-container {
  background-color: rgba(255, 255, 255, 0.8); 
  padding: 20px; 
  margin-top: 20px; 
  margin-bottom: 20px;
  border-radius: 10px; 
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2); 
}

.filter-section {
  width: auto; 
  max-width: 100%; 
  box-sizing: border-box;
  display: block; 
  margin: 0 auto; 
  padding: 20px;
  background-color: #f5f5f5;
  border-radius: 5px;
}


.content, .white-background-container {
  box-sizing: border-box;
  width: 100%; 
  padding: 20px; 
}

table {
  width: 100%;
  table-layout: fixed;
}


.filter-section label {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 18px;
  user-select: none;
}

/* Hide the browser's default checkbox */
.filter-section label input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
  border-radius: 5px;
  border: 1px solid #ddd;
}

/* On mouse-over, add a grey background color */
.filter-section label:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.filter-section label input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.filter-section label input:checked ~ .checkmark:after {
  display: block;
}

/* Style the checkmark/indicator */
.filter-section label .checkmark:after {
  left: 9px;
  top: 5px;
  width: 7px;
  height: 13px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}

/* Style the filter button */
.filter-section button {
  padding: 10px 20px;
  background-color: #30394e;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  margin-top: 10px;
}

.filter-section button:hover {
  background-color: #2196F3;
}


</style>
</head>
<body>

    <div>
<header>
            <div class="navbar">
                <div class="icon">
                    <a href="index.php">
                        <img class="logo" src="img/logo.png" alt="DecorDirect Logo">
                    </a>
                </div>

                <div class="signout">
                    <ul>
                        <li><a href="logout.php">SIGN OUT</a></li>
                    </ul>
                </div>
            </div>


</header>
</div>
<div class="header">
  <h1>Welcome <span id="clientFirstName">Sara</span></h1>
</div>

<div class="content">
    <div class="white-background-container">

    <div class="client-info">
        <div class="client-detail">
          <label for="clientName">Client Name:</label>
          <div id="clientName">Sara Ahmed</div>
        </div>
        <div class="client-detail">
          <label for="clientContact">Contact Info:</label>
          <div id="clientContact">05**********</div>
        </div>
        <div class="client-detail">
          <label for="clientAddress">Address:</label>
          <div id="clientAddress">Riyadh</div>
        </div>
        <div class="client-detail">
          <label for="clientMoreInfo">More Info:</label>
          <div id="clientMoreInfo">-</div>
        </div>
      </div>
      
    </div>
      <div class="white-background-container">


      <div class="content">
        <div class="filter-section">
          <label>Select Categories:</label>
          <div>
            <label><input type="checkbox" name="design-category" value="modern"><span class="checkmark"></span> Modern</label>
            <label><input type="checkbox" name="design-category" value="country"><span class="checkmark"></span> Country</label>
            <label><input type="checkbox" name="design-category" value="minimalist"><span class="checkmark"></span> Minimalist</label>
            <label><input type="checkbox" name="design-category" value="scandinavian"><span class="checkmark"></span> Scandinavian</label>
            <label><input type="checkbox" name="design-category" value="industrial"><span class="checkmark"></span> Industrial</label>
            <label><input type="checkbox" name="design-category" value="bohemian"><span class="checkmark"></span> Bohemian</label>
            <label><input type="checkbox" name="design-category" value="coastal"><span class="checkmark"></span> Coastal</label>
          </div>
          <button onclick="filterDesigners()">Filter</button>
        </div>
        
        
      </div>
      
      

  <div class="designer-table">
    <h2>Interior Designers</h2>
    <table>
      <thead>
        <tr>
          <th>Designer</th>
          <th>Specialty</th>
          <th></th> 
        </tr>
      </thead>
      <tbody>
        <tr>
            <td>
                <div class="designer-logo">
                    <img src="img/LLC logo.png" alt="LLC Logo" class="designer-logo-img">
                </div>
                <div class="designer-name">   
                    <a href="Portofolio1.html">LLC</a>
                </div>
            </td>
    
            <td>Modern, Country</td>
            <td><a href="RequestConsultation.html" class="request-button">Request Design Consultation</a></td>
          </tr>
          <tr>
            <td>
                <div class="designer-logo">
                    <img src="img/Akfd logo.png" alt="Akfd Logo" class="designer-logo-img">
                </div>
                <div class="designer-name">   
                    <a href="Portofolio2.html">AKFD</a>
                </div>
            </td>

            <td>Scandinavian, Minimalist</td>
            <td><a href="request-consultation2-url.html" class="request-button">Request Design Consultation</a></td>
          </tr>
      </tbody>
    </table>
  </div>
  
  <div class="request-table">
    <h2>Previous Design Consultation Requests</h2>
    <table>
      <thead>
        <tr>
          <th>Designer</th>
          <th>Room</th>
          <th>Dimensions</th>
          <th>Design Category</th>
          <th>Color Preferences</th>
          <th>Request Date</th>
          <th>Design Consultation</th>
        </tr>
      </thead>
      <tbody>
        <tr>
            <td>
              <div class="designer-logo">
                <img src="img/LLC logo.png" alt="LLC Logo" class="designer-logo-img">
              </div>
              <div class="designer-name">
                <a href="Portofolio1.html">LLC</a>
              </div>
            </td>
            
            <td>Bedroom</td>
        <td>3x4m</td>
        <td>Coastal</td>
            <td>Beige and Green</td>
            <td>9/1/2024</td>
            <td>Pending Consultation</td>
        </tr>
        <tr>
            <td>
              <div class="designer-logo">
                <img src="img/Akfd logo.png" alt="AKFD Logo" class="designer-logo-img">
              </div>
              <div class="designer-name">
                <a href="Portofolio2.html">AKFD</a>
              </div>
            </td>
            <td>Living Room</td>
            <td>4x5m</td>
            <td>Modern</td>
        <td>Beige</td>
        <td>9/2/2020</td>
        <td><a href="DesignConsultation.html">[Consultation]</a> <img src="consultation2-img.jpg" alt="Consultation Image"></td>

        </tr>
        <tr>
            <td>
              <div class="designer-logo">
                <img src="img/Kart logo.png" alt="Kart Logo" class="designer-logo-img">
              </div>
              <div class="designer-name">
                <a href="Portofolio3.html">Kart</a>
              </div>
            </td>
            <td>Kitchen</td>
        <td>3x3m</td>
        <td>Minimalist</td>
        <td>Black and White</td>
        <td>5/1/2024</td>
        <td>Consultation Declined</td>
        </tr>
      </tbody>
    </table>
  </div>
  
  
</div>

</div>

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


<script>
  function filterDesigners() {
  var selectedCategories = Array.from(document.querySelectorAll("input[name='design-category']:checked")).map(input => input.value.toLowerCase());

  var designerRows = document.querySelectorAll(".designer-table tbody tr");
  var requestRows = document.querySelectorAll(".request-table tbody tr");

  [...designerRows, ...requestRows].forEach(row => row.style.display = "table-row");

  if (selectedCategories.length === 0) {
    return; 
  }

  designerRows.forEach(row => {
    var specialties = row.querySelector("td:nth-child(2)").textContent.toLowerCase().split(', ').map(s => s.trim());
    if (!specialties.some(specialty => selectedCategories.includes(specialty))) {
      row.style.display = "none";
    }
  });

  requestRows.forEach(row => {
    var designCategory = row.querySelector("td:nth-child(4)").textContent.toLowerCase().split(', ').map(c => c.trim());
    if (!selectedCategories.some(category => designCategory.includes(category))) {
      row.style.display = "none";
    }
  });
}


document.addEventListener('DOMContentLoaded', function () {
  var clientFirstName = localStorage.getItem('clientFirstName');
  var firstNameElement = document.getElementById('clientFirstName');

  if (clientFirstName) {
    firstNameElement.textContent = clientFirstName;
  }
});


</script>
</body>
</html>