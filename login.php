<?php
  // Include the connection file
  require_once 'connection.php';

  // Check if the form is submitted
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query to check if the username and password exist in the database
    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($db, $query);

    // Check if the query returns a result
    if (mysqli_num_rows($result) > 0) {
      // Login successful, redirect to a protected page
      header('Location: protected.php');
      exit;
    } else {
      // Login failed, display an error message
      $error = 'Invalid username or password';
      header('Location: index.html?error=' . urlencode($error));
      exit;
    }
  }
?>