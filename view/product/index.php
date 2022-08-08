<!-- a simple view, outputing all the comments -->
<?php include "view/header.php" ?>


<!-- <div class="container" style="background-color: indianred; padding-bottom: 2%; padding-top: 1%;">
    <h3 style="text-align: center;color: whitesmoke;">Add a new product</h3>
    <br>
    <div class="row">
        <div class="col">
            <form id="productForm" action="index.php?controller=product&action=add" method="POST">
                <div class="input-group mb-3">
                    <input name = "name" type="text" class="form-control" placeholder="Product Name" aria-label="Name" aria-describedby="basic-addon1" required>
                </div>
                <input id="productBtn" class="btn" type="submit" value="Submit">
            </form>
        </div>
    </div>
</div>
<br>
<h3 style="text-align: center;">My products</h3>
<br style="padding-bottom: 20%">
<div id="products" class="container">
    <div class="row">
        <div class="col">
            <ul class="list-group">
                <?php foreach ($products as $product) { ?>
                    <li class="list-group-item">
                        <strong>
                            <?php echo $product->name; ?>
                        </strong>
                        <l> | <a href="index.php?controller=comment&action=allFromUser&product_id=<?php echo $product->id; ?>">
                                View Comments
                            </a> | </l>
                        <a class="deleteProduct" href="index.php?controller=product&action=delete&id=<?php echo $product->id; ?>" onclick="deleteProductAJAX(this)">
                            <?php echo "Delete"; ?>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div> -->
<header>
    <div class="jumbotron">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="display-4">Product List</h1>
                <div class="button-group">
                    <a class="btn btn-success " href="index.php?controller=product&action=addProduct">Add Product</a>
                    <button class="btn btn-danger" id="delete-product-btn">Mass Delete</button>
                </div>
            </div>
        </div>
    </div>
</header>
<?php foreach ($products as $product) { ?>
    <li class="list-group-item">
        <strong>
            <?php echo $product->name; ?>
        </strong>
        <l> | <a href="index.php?controller=comment&action=allFromUser&product_id=<?php echo $product->id; ?>">
                View Comments
            </a> | </l>
        <a class="deleteProduct" href="index.php?controller=product&action=delete&id=<?php echo $product->id; ?>" onclick="deleteProductAJAX(this)">
            <?php echo "Delete"; ?>
        </a>
    </li>
<?php } ?>
<div class="container">
    <hr class="my-4">
</div>
<div class="container">
    <div class="row row-cols-1 row-cols-md-4 g-4">
        <div class="col">
            <div class="card">
                <input class="form-check-input m-2" type="checkbox" value="" id="flexCheckDefault">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <input class="form-check-input m-2" type="checkbox" value="" id="flexCheckDefault">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <input class="form-check-input m-2" type="checkbox" value="" id="flexCheckDefault">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <input class="form-check-input m-2" type="checkbox" value="" id="flexCheckDefault">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {

        $("#productForm").submit(function(e) {

            var url = "index.php?controller=product&action=add"; // the script where you handle the form input.

            $.ajax({
                type: "POST",
                url: url,
                data: $("#productForm").serialize(), // serializes the form's elements.
                success: function(data) {
                    //alert(data); // show response from the php script.
                }
            });
            e.preventDefault(); // avoid to execute the actual submit of the form.
            showProducts();
        });


    });


    function showProducts() {
        $.get("http://localhost/webP/ex2/index.php?controller=product&action=showAll", function(data) {
            $("#products").html(data);
        });
    }

    function deleteProductAJAX($event) {
        $.ajax({
            url: $event,
            success: function(response) {
                //alert(response);
            }
        });
        event.preventDefault();
        showProducts();
    }
</script>

<br>
<br>
<br>
<br>
<br>
<?php include "view/footer.php" ?>