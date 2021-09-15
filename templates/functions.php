<?php

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


function listIngredients($pizza) {
  /**  Split ingredients str int seperate words and display them as an HTML
   * unordered list. */
  $subComma = ucwords(str_replace(',', ' ', $pizza['ingredients']));
  $ingredients = explode(' ', $subComma);
  echo '<ul>';
  foreach ($ingredients as $ingredient) {
    echo '<li>' . htmlspecialchars(ucwords($ingredient)) . '</li>';
  }
  echo '</ul>';
}
