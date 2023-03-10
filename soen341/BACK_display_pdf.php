<?php
// Open a database connection
$conn = mysqli_connect("localhost", "root", "", "users");

// Check if the connection is successful
if(!$conn) {
  die("Error: Could not connect to database.");
}

// Get the username of the logged-in user
$username = $_SESSION['username'];

// Prepare the SQL statement to select the logged-in user's PDF file from the database
$sql = "SELECT pdfname, pdftype, pdfsize, pdfcontent FROM users WHERE username = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $username);

// Execute the SQL statement
mysqli_stmt_execute($stmt);

// Bind the result variables
mysqli_stmt_bind_result($stmt, $pdf_name, $pdf_type, $pdf_size, $pdf_content);

// Fetch the results
if(mysqli_stmt_fetch($stmt)) {
  // Output the PDF file
  echo '<div style="height: 895px; overflow: auto;">';
  echo '<object data="data:' . $pdf_type . ';base64,' . base64_encode($pdf_content) . '" type="' . $pdf_type . '" width="35%" height="100%">';
  echo 'Your browser does not support PDFs. Please download the PDF to view it: <a href="data:' . $pdf_type . ';base64,' . base64_encode($pdf_content) . '">Download PDF</a>.';
  echo '</object>';
  echo '</div>';
  echo '<hr>';
}

// Close the statement and database connection
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
