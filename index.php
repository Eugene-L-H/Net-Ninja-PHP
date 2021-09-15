<?php

include('templates/functions.php');
include('config/db_connect.php');

// write query for all pizzas
$sql = 'SELECT title, ingredients, id FROM pizzas ORDER BY created_at';

// make query & get result
$result = mysqli_query($conn, $sql);

// fetch resulting rows as an array (convert $result into usable format)
$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

// free memory held by now unused variable
mysqli_free_result($result);

// close connection
mysqli_close($conn);

?>

<!DOCTYPE html>
<html>

<?php include('templates/header.php'); ?>

<h4 class="center grey-txt">Pizzas!</h4>

<div class="container">
  <div class="row">

    <?php

    foreach ($pizzas as $pizza) : ?>

      <div class="col s6  md3">
        <div class="card z-depth-0">
          <img src="img/pizza.svg" class="pizza">
          <div class="card-content center">
            <h5><?php echo htmlspecialchars($pizza['title']); ?></h5>
            <h6><strong>Ingredients:</strong></h6>
            <div><?php listIngredients($pizza); ?></div>
          </div>
          <div class="card-action right-align">
            <a href="details.php?id=<?php echo $pizza['id']; ?>">more info</a>
          </div>
        </div>
      </div>

    <?php
    endforeach; ?>

  </div>
</div>

<?php include('templates/footer.php'); ?>

</html>