<?php

$errors = array('email' => '', 'title' => '', 'ingredients' => '');

$email = '';
$title = '';
$ingredients = '';

if (isset($_POST['submit'])) {

  // check for email
  if (empty($_POST['email'])) {
    $errors['email'] = 'An email is required';
  } else {
    $email = $_POST['email'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors['email'] = 'Must be a vaild email address.';
    }
  }

  // check for title
  if (empty($_POST['title'])) {
    $errors['title'] = 'Do you have a name for your pizza?';
  } else {
    $title = $_POST['title'];
    if (!preg_match('/^[a-zA-Z\s]+$/', $title)) {
      $errors['title'] = 'Title must not contain numbers or special characters.';
    }
  }

  // check for ingredients
  if (empty($_POST['ingredients'])) {
    $errors['ingredients'] = 'Be sure to add your toppings!';
  } else {
    $ingredients = $_POST['ingredients'];
    if (!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)) {
      $errors['ingredients'] = 'Ingredients must be a comma-seperated list.';
    }
  }
}

function errorMsg($arr, $type, $postData) {

  if (isset($postData['submit'])) {

    if ($arr[$type] != '') {
      echo '<span class="red-text">' . $arr[$type] . '</span><br>';
    } else if (empty($postData[$type])) {
      switch ($type) {
        case 'email':
          echo '<span class="red-text">' . 'An email is required' . '</span><br>';
          break;
        case 'title':
          echo '<span class="red-text">' . 'Do you have a name for your pizza?' . '</span><br>';
          break;
        case 'ingredients':
          echo '<span class="red-text">' . 'Be sure to add your toppings!' . '</span><br>';
          break;
      }
    }
  }
}

?>

<!DOCTYPE html>
<html>

<?php include('templates/header.php'); ?>

<section class="container grey-text">

  <h4 class="center">Add a Pizza</h4>

  <form class="white" action="add.php" method="POST">

    <?php
    errorMsg($errors, 'email', $_POST);
    ?>
    <label for="">Your Email:</label>
    <input type="text" name="email" value="<?php echo htmlspecialchars($email); ?>">


    <?php
    errorMsg($errors, 'title', $_POST);
    ?>
    <label for="">Pizza Title</label>
    <input type="text" name="title" value="<?php echo htmlspecialchars($title); ?>">


    <?php
    errorMsg($errors, 'ingredients', $_POST);
    ?>
    <label for="">Ingredients (comma separated):</label>
    <input type="text" name="ingredients" value="<?php echo htmlspecialchars($ingre)dients; ?>">

    <div class="center">
      <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
    </div>

  </form>

</section>

<?php include('templates/footer.php'); ?>

</html>