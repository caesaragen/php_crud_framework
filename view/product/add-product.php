<!-- a simple view returning json data -->
<?php include "view/header.php" ?>

<header>
    <div class="jumbotron">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="display-4">Product Add</h1>
                <div class="button-group">
                    <a class="btn btn-success " href="index.php?page=add-product" role="button">Save</a>
                    <button class="btn btn-danger" id="delete-product-btn">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="container">
    <hr class="my-4">
</div>
<div class="container">
    <form id="product_form">
        <div class="row mb-3">
            <label for="sku" class="col-sm-2 col-form-label">SKU</label>
            <div class="col-sm-10">
                <input type="sku" class="form-control" id="sku">
            </div>
        </div>
        <div class="row mb-3">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="name" class="form-control" id="name">
            </div>
        </div>
        <div class="row mb-3">
            <label for="price" class="col-sm-2 col-form-label">Price ($)</label>
            <div class="col-sm-10">
                <input type="price" class="form-control" id="price">
            </div>
        </div>
        <div class="row mb-3">
            <label for="type" class="col-sm-2 col-form-label">Type</label>
            <div class="col-sm-10 ">
                <select class="form-select" id="type" aria-label="Default select example">
                <?php foreach ($types as $product) { ?>
                    <option value="<?php echo $product->id; ?>"><?php echo $product->name; ?></option>
                <?php } ?>
                </select>
            </div>
        </div>
        <div class="dvd-input">
            <div class="row mb-3">
                <label for="dvd" class="col-sm-2 col-form-label">Size (MB)</label>
                <div class="col-sm-10">
                    <input type="dvd" class="form-control" id="dvd">
                </div>
            </div>
        </div>
        <div class="furniture-input">
            <div class="row mb-3">
                <label for="height" class="col-sm-2 col-form-label">Height (CM)</label>
                <div class="col-sm-10">
                    <input type="height" class="form-control" id="height">
                </div>
            </div>
            <div class="row mb-3">
                <label for="width" class="col-sm-2 col-form-label">Width (CM)</label>
                <div class="col-sm-10">
                    <input type="width" class="form-control" id="width">
                </div>
            </div>
            <div class="row mb-3">
                <label for="length" class="col-sm-2 col-form-label">Length (CM)</label>
                <div class="col-sm-10">
                    <input type="length" class="form-control" id="length">
                </div>
            </div>
        </div>
        <div class="book-input">
            <div class="row mb-3">
                <label for="weight" class="col-sm-2 col-form-label">Weight (KG)</label>
                <div class="col-sm-10">
                    <input type="weight" class="form-control" id="weight">
                </div>
            </div>
        </div>
    </form>

</div>

<?php include "view/footer.php" ?>