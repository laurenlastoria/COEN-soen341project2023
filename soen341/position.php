<?php include 'BACK_timeout.php' ?>

<?php
// Connect to the database
$mysqli = new mysqli("localhost", "root", "", "postings");

// Retrieve the posting data using the ID from the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT position, company, info, industry, plocation, salary FROM postings WHERE id = '$id'";
    $result = $mysqli->query($query);

    // Check if the query was successful
    if ($result) {
        // Fetch the row from the query result and get the data
        $row = $result->fetch_assoc();
        $position = $row['position'];
        $company = $row['company'];
        $info = $row['info'];
        $industry = $row['industry'];
        $plocation = $row['plocation'];
        $salary = $row['salary'];
    } else {
        // Display an error message if the query failed
        $name = "Error: " . $mysqli->error;
    }
} else {
    // If no ID is provided in the URL, redirect to the homepage
    header("Location: index.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>TalentHub</title>


        <!-- Linking bootstrap framework-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

        <!-- Linking css file and favicon-->
        <link rel="stylesheet" href="/soen341/css/style.css">
        <link rel="icon" href="favicon.ico">

        <!-- Linking font-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400&display=swap" rel="stylesheet">
    </head>

    <body class="background-image">
    <?php include 'navbar.php' ?>

        <div class="table table-hover" style="margin: auto; margin-top: 4%; text-align: center;">
            <div class="row" style="margin-left: 5%; width: 2200px; text-align: center">
                <div class="cell" style="width: 300px"><a href="search_page.php" class="btn btn-light btn-lg outer2" style="background-color: #ffffff; margin-left: 2%; margin-top: 2%; width: 200px">Back to Search</a></div>
                <div class="cell" style="width: 300px"><h2 style="font-size: 1.9vw;">Position</h2></div>
                <div class="cell" style="width: 300px"><h2 style="font-size: 1.9vw;">Company</h2></div>
                <div class="cell" style="width: 300px"><h2 style="font-size: 1.9vw;">Industry</h2></div>
                <div class="cell" style="width: 300px"><h2 style="font-size: 1.9vw;">Location</h2></div>
                <div class="cell" style="width: 300px"><h2 style="font-size: 1.9vw;">Salary</h2></div>
            </div>
            <div class="row" style="width: 2200px; margin-left: 5%; text-align: center">
                <div class="cell" style="width: 300px"><h2 class="text-white"></h2></div>
                <div class="cell" style="width: 300px"><h2 class="text-white" style="font-size: 1.1vw"><?php echo $position ?></h2></div>
                <div class="cell" style="width: 300px"><h2 class="text-white" style="font-size: 1.1vw"><?php echo $company ?></h2></div>
                <div class="cell" style="width: 300px"><h2 class="text-white" style="font-size: 1.1vw"><?php echo $industry ?></h2></div>
                <div class="cell" style="width: 300px"><h2 class="text-white" style="font-size: 1.1vw"><?php echo $plocation ?></h2></div>
                <div class="cell" style="width: 300px"><h2 class="text-white" style="font-size: 1.1vw"><?php echo $salary ?></h2></div>
            </div>
        </div>

        <div class="table" style="margin: auto; margin-top: 4%; text-align: center">
            <div class="row" style="width: 50%; margin: auto; text-align: center"> 
                <div class="cell"><h2 class="text-white" style="font-size: 2vw"><?php echo $position ?> Description</h2></div>
            </div>
            <div class="row" style="width: 50%; margin: auto; text-align: center">
                <div class="cell" style="text-align: justify; text-justify: inter-word;"><h2 class="text-white" style="font-size: 1vw; line-height: 1.5"><?php echo $info ?></h2></div>
            </div>
        </div>

        <hr>

        <div class="profile_buttons">
            <a href="/soen341/apply.php" class="btn btn-primary btn-lg outer" style="margin: auto; width: 25%"><h1 style="font-size: 2vw">Apply</h1></a>
        </div>
    </body>
</html>