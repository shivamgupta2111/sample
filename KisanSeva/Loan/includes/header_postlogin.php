<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <a href="products.php" class="navbar-brand text-white">Kesan Seva</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav pull-right">
            <li><i class="fa fa-fw fa-user"></i></li>
            <li><a class="text-white" href="#"> <?php echo $_SESSION['name'];?> </a></li>
            <li><a class="text-white" href="products.php">Home</a></li>
            <!-- <li><a class="text-white" href="show_cart_items.php">Cart</a></li> -->
            <!-- <li><a class="text-white" href="show_wishlist_items.php">Wishlist</a></li> -->
            <li><a class="text-white" href="show_order_items.php">Applied Loan</a></li>
            <li><a class="text-white" href="logout.php">Logout</a></li>
          </ul>
          
                  </div><!--/.nav-collapse -->
      </div>
    </nav>