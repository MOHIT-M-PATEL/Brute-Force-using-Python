<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pizza Selection</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mui/5.3.0/styles/defaultTheme.min.css">
  <style>
    body {
      font-family: 'Roboto', sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f9f9f9;
    }

    header {
      background-color: #333;
      color: #fff;
      padding: 10px 0;
      text-align: center;
    }

    .container {
      max-width: 1200px;
      margin: 20px auto;
      padding: 0 20px;
    }

    .pizza-options {
      list-style-type: none;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 20px;
    }

    .pizza-options li {
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      overflow: hidden;
    }

    .pizza-options li img {
      width: 100%;
      height: auto;
      object-fit: cover;
    }

    .pizza-options li h2 {
      margin: 10px 0;
      font-size: 20px;
    }

    .pizza-options li p {
      margin: 0 0 10px;
      font-size: 14px;
      color: #555;
    }

    .pizza-options li button {
      display: block;
      margin: 10px auto;
      background-color: #4CAF50;
      color: #fff;
      border: none;
      padding: 8px 16px;
      border-radius: 4px;
      cursor: pointer;
    }

    .cart-container {
      display: flex;
      align-items: center;
      justify-content: center;
      margin-top: 20px;
    }

    .cart-container h2 {
      margin-right: 10px;
      font-size: 24px;
    }

    #cartList {
      list-style-type: none;
      padding: 0;
    }

    #cartList li {
      margin-bottom: 5px;
    }

    .checkout-btn,
    .logout-btn {
      max-width: 150px;
      margin: 0 10px;
      padding: 10px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    .checkout-btn {
      background-color: #4CAF50;
      color: #fff;
    }

    .logout-btn {
      background-color: #f44336;
      color: #fff;
    }

    .delete-btn {
      background-color: #f44336;
      color: #fff;
    }

    .delete-btn:hover {
      background-color: #d32f2f;
    }
  </style>
</head>
<body>
  <header>
    <h1>Select Your Pizza</h1>
  </header>

  <div class="container">
    <ul class="pizza-options">
      <?php
      // Define pizza options dynamically using PHP
      $pizzaOptions = [
        ['name' => 'Sicilian Pizza', 'description' => 'A pizza with thick crust and square slices that originated in Sicily', 'image' => 'Sicilian Pizza.png'],
        ['name' => 'Pepperoni Pizza', 'description' => 'A classic pizza with pepperoni slices, mozzarella cheese, and tomato sauce', 'image' => 'Pepperoni Pizza.png'],
        ['name' => 'Margherita Pizza', 'description' => 'A classic pizza with tomato sauce, mozzarella, basil, and olive oil', 'image' => 'Margherita Pizza.png'],
        ['name' => 'New York Pizza', 'description' => 'A pizza with a thin crust in the middle and fluffy edges, usually topped with tomato sauce and mozzarella', 'image' => 'New York Pizza.png'],
        ['name' => 'Detroit Pizza', 'description' => 'A rectangular pizza with a thick crust, crispy bottom, and marinara sauce', 'image' => 'Detroit Pizza.png'],
        ['name' => 'Neapolitan Pizza', 'description' => 'A traditional pizza with fresh ingredients like tomatoes, mozzarella, basil, and olive oil', 'image' => 'Neapolitan Pizza.png'],
        ['name' => 'Chicago deep-dish Pizza', 'description' => 'A pizza with a crust that\'s crispy at the bottom and flaky around the rim', 'image' => 'Chicago deep-dish Pizza.png'],
        ['name' => 'St. Louis Pizza', 'description' => 'A pizza with a very thin crust cut into squares or rectangles, but can still be layered with toppings', 'image' => 'St. Louis Pizza.png'],
      ];

      // Loop through each pizza option and create HTML dynamically
      foreach ($pizzaOptions as $pizza) {
        echo '<li data-name="' . $pizza['name'] . '">';
        echo '<img src="' . $pizza['image'] . '" alt="' . $pizza['name'] . '"/>';
        echo '<div>';
        echo '<h2>' . $pizza['name'] . '</h2>';
        echo '<p>' . $pizza['description'] . '</p>';
        echo '<button onclick="addToCart(\'' . $pizza['name'] . '\')" class="MuiButtonBase-root MuiButton-root MuiButton-contained addToCart" type="button">';
        echo 'Add to Cart';
        echo '</button>';
        echo '</div>';
        echo '</li>';
      }
      ?>
    </ul>
  </div>

  <div class="cart-container">
    <h2>Cart:</h2>
    <ul id="cartList"></ul>
  </div>

  <div class="cart-container">
    <button onclick="handleCheckout()" class="checkout-btn">Checkout</button>
    <button onclick="handleLogout()" class="logout-btn">Logout</button>
  </div>

  <script>
    const addToCart = (name) => {
      const cartList = document.getElementById("cartList");
      const li = document.createElement("li");
      li.textContent = name;
      const deleteButton = document.createElement("button");
      deleteButton.textContent = "Delete";
      deleteButton.classList.add("delete-btn");
      deleteButton.addEventListener("click", () => {
        li.remove();
      });
      li.appendChild(deleteButton);
      cartList.appendChild(li);
    };

    const handleCheckout = () => {
      alert("Thank you for your order!");
      document.getElementById("cartList").innerHTML = "";
    };

    const handleLogout = () => {
      alert("Logout successful");
      window.location.href = "login3.html";
    };
  </script>
</body>
</html>
