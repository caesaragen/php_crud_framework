<?php require APPROOT . '/views/includes/header.php'; ?>
<h1> <?php echo $data['title']; ?></h1>
<p><?php echo $data['description']; ?></p>
<p>Version: <strong><?php echo APP_VERSION; ?></strong></p>

<header>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="display-4">Product List</h1>
            <div class="button-group">
                <a class="btn btn-success" href="<?php echo URLROOT ?>/pages/add">Add Product</a>
                <button class="btn btn-danger" id="delete-product-btn">Mass Delete</button>
            </div>
        </div>
    </div>
</header>

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






<?php require APPROOT . '/views/includes/footer.php'; ?>