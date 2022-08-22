<?php require APPROOT . '/views/includes/header.php'; ?>
<form id="product_form" action=" <?php echo URLROOT; ?>/addProduct" ; method="post">

    <header>
        <div class="jumbotron">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h1 class="display-4">Product Add</h1>
                    <div class="button-group">
                        <button class="btn btn-success">Save</button>
                        <a class="btn btn-danger" href="<?php echo URLROOT ?>/index">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class=" container">
        <hr class="my-4">
        <span class="text-danger" id="input_err"></span>
    </div>
    <div class="container">
        <div class="row mb-3">
            <label for="sku" class="col-sm-2 col-form-label">SKU *</label>
            <div class="col-sm-10">
                <input type="text" name="sku" id="sku" class="form-control
                <?php echo (!empty($data['sku_err'])) ? 'is-invalid' : ''; ?>">
                <span class="text-danger" id="sku_err"></span>
            </div>
            <?php echo (!empty($data['sku_err'])) ? '<span class="text-danger">' . $data['sku_err'] . '</span>' : ''; ?>
        </div>
        <div class="row mb-3">
            <label for="name" class="col-sm-2 col-form-label">Name *</label>
            <div class="col-sm-10">
                <input type="text" name="name" id="name" class="form-control <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>">
                <?php echo (!empty($data['name_err'])) ? '<span class="text-danger">' . $data['name_err'] . '</span>' : ''; ?>
                <span class="text-danger" id="name_err"></span>
            </div>
        </div>
        <div class="row mb-3">
            <label for="price" class="col-sm-2 col-form-label">Price ($) *</label>
            <div class="col-sm-10">
                <input type="text" name="price" id="price" class="form-control <?php echo (!empty($data['price_err'])) ? 'is-invalid' : ''; ?>">
                <?php echo (!empty($data['price_err'])) ? '<span class="text-danger">' . $data['price_err'] . '</span>' : ''; ?>
                <span class="text-danger" id="price_err"></span>
            </div>
        </div>
        <div class="row mb-3">
            <label for="type" class="col-sm-2 col-form-label">Type *</label>
            <div class="col-sm-10 ">
                <select class="form-select" name="type" id="productType" aria-label="Default select example" class="form-select <?php echo (!empty($data['type_err'])) ? 'is-invalid' : ''; ?>">
                    <option value="" selected>Type Switcher</option>
                    <option value="1">DVD</option>
                    <option value="2">Book</option>
                    <option value="3">Furniture</option>
                </select>
                <?php echo (!empty($data['type_err'])) ? '<span class="text-danger">' . $data['type_err'] . '</span>' : ''; ?>
                <span class="text-danger" id="type_err"></span>
            </div>
        </div>
        <div class="input d-none" id="input1">
            <div class="row mb-3">
                <label for="dvd" class="col-sm-2 col-form-label">Size (MB)</label>
                <div class="col-sm-10">
                    <input type="text" name="size" id="size" class="form-control <?php echo (!empty($data['size_err'])) ? 'is-invalid' : ''; ?>">
                    <?php echo (!empty($data['size_err'])) ? '<span class="text-danger">' . $data['size_err'] . '</span>' : ''; ?>
                    <span class="text-danger" id="size_err"></span>
                </div>
            </div>
        </div>
        <div class="input d-none" id="input3">
            <div class="row mb-3">
                <label for="height" class="col-sm-2 col-form-label">Height (CM)</label>
                <div class="col-sm-10">
                    <input type="text" name="height" id="height" class="form-control <?php echo (!empty($data['height_err'])) ? 'is-invalid' : ''; ?>">
                    <?php echo (!empty($data['height_err'])) ? '<span class="text-danger">' . $data['height_err'] . '</span>' : ''; ?>
                    <span class="text-danger" id="height_err"></span>
                </div>
            </div>
            <div class="row mb-3">
                <label for="width" class="col-sm-2 col-form-label">Width (CM)</label>
                <div class="col-sm-10">
                    <input type="text" name="width" id="width" class="form-control <?php echo (!empty($data['width_err'])) ? 'is-invalid' : ''; ?>">
                    <?php echo (!empty($data['width_err'])) ? '<span class="text-danger">' . $data['width_err'] . '</span>' : ''; ?>
                    <span class="text-danger" id="width_err"></span>
                </div>
            </div>
            <div class="row mb-3">
                <label for="length" class="col-sm-2 col-form-label">Length (CM)</label>
                <div class="col-sm-10">
                    <input type="text" name="length" id="length" class="form-control <?php echo (!empty($data['length_err'])) ? 'is-invalid' : ''; ?>">
                    <?php echo (!empty($data['length_err'])) ? '<span class="text-danger">' . $data['length_err'] . '</span>' : ''; ?>
                    <span class="text-danger" id="length_err"></span>
                </div>
            </div>
        </div>
        <div class="input d-none" id="input2">
            <div class="row mb-3">
                <label for="weight" class="col-sm-2 col-form-label">Weight (KG)</label>
                <div class="col-sm-10">
                    <input type="text" name="weight" id="weight" class="form-control <?php echo (!empty($data['weight_err'])) ? 'is-invalid' : ''; ?>">
                    <?php echo (!empty($data['weight_err'])) ? '<span class="text-danger">' . $data['weight_err'] . '</span>' : ''; ?>
                    <span class="text-danger" id="weight_err"></span>
                </div>
            </div>
        </div>
</form>

</div>
<?php require APPROOT . '/views/includes/footer.php'; ?>
