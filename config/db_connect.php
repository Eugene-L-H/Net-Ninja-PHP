<?php

//connect to database
$conn = mysqli_connect('localhost', 'Eugene', 'test1234', 'ninja_pizza');

// check for conneciton to database
if (!$conn) {
  echo 'Connection error: ' . mysqli_connect_error();
}
