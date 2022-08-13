<?php require APPROOT . '/views/includes/header.php'; ?>
<!-- <h1> <?php echo $data['title']; ?></h1>
<p><?php echo $data['description']; ?></p> -->
<p>Version: <strong><?php echo APP_VERSION; ?></strong></p>
<header>
    <div class="jumbotron">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h1 class="display-4">Product Add</h1>
                    <div class="button-group">
                        <button class="btn btn-success" onclick="submitForm()">Add Product</button>
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
    <form action="<?php echo URLROOT; ?>/products/add" method="post">
        <div class="row mb-3">
            <label for="sku" class="col-sm-2 col-form-label">SKU</label>
            <div class="col-sm-10">
                <input type="text" name="sku" id="sku" class="form-control
                <?php echo (!empty($data['sku_err'])) ? 'is-invalid' : ''; ?>">
            </div>
            <span class="text-danger"><?php echo $data['sku_err']; ?></span>
        </div>
        <div class="row mb-3">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" name="name" class="form-control" id="name">
            </div>
        </div>
        <div class="row mb-3">
            <label for="price" class="col-sm-2 col-form-label">Price ($)</label>
            <div class="col-sm-10">
                <input type="text" name="price" class="form-control" id="price">
            </div>
        </div>
        <div class="row mb-3">
            <label for="type" class="col-sm-2 col-form-label">Type</label>
            <div class="col-sm-10 ">
                <select class="form-select" name="type" id="type" aria-label="Default select example">
                    <option value="" selected>Type Switcher</option>
                    <option value="1">DVD</option>
                    <option value="2">Book</option>
                    <option value="3">Furniture</option>
                </select>
            </div>
        </div>
        <div class="dvd-input d-none">
            <div class="row mb-3">
                <label for="dvd" class="col-sm-2 col-form-label">Size (MB)</label>
                <div class="col-sm-10">
                    <input type="text" name="size" class="form-control" id="size">
                </div>
            </div>
        </div>
        <div class="furniture-input d-none">
            <div class="row mb-3">
                <label for="height" class="col-sm-2 col-form-label">Height (CM)</label>
                <div class="col-sm-10">
                    <input type="text" name="height" class="form-control" id="height">
                </div>
            </div>
            <div class="row mb-3">
                <label for="width" class="col-sm-2 col-form-label">Width (CM)</label>
                <div class="col-sm-10">
                    <input type="text" name="width" class="form-control" id="width">
                </div>
            </div>
            <div class="row mb-3">
                <label for="length" class="col-sm-2 col-form-label">Length (CM)</label>
                <div class="col-sm-10">
                    <input type="text" name="length" class="form-control" id="length">
                </div>
            </div>
        </div>
        <div class="book-input d-none">
            <div class="row mb-3">
                <label for="weight" class="col-sm-2 col-form-label">Weight (KG)</label>
                <div class="col-sm-10">
                    <input type="text" name="weight" class="form-control" id="weight">
                </div>
            </div>
        </div>
        <div class="col">
            <input type="submit" value="Add" class="btn btn-success btn-block">
        </div>
    </form>

</div>
<script>
    $(document).ready(function() {

        $("#product_form").submit(function(e) {

            var url = "<?php echo URLROOT; ?>/products/add"; // the script where you handle the form input.
            console.log(url);
            data = {
                sku: $("#sku").val(),
                name: $("#name").val(),
                price: $("#price").val(),
                size: $("#size").val(),
                type: $("#type").val(),
                dvd: $("#dvd").val(),
                height: $("#height").val(),
                width: $("#width").val(),
                length: $("#length").val(),
                weight: $("#weight").val()
            };

            $.ajax({
                type: "POST",
                url: url,
                data: data,
                success: function(data) {
                    // alert(data);
                }
            });
            e.preventDefault();
            // showProducts();
        });


    });
    const submitForm = () => {
        $("#product_form").submit();
    }
    $(document).ready(function() {
        $('#type').change(function() {
            var type = $(this).val();
            if (type == 1) {
                $('.dvd-input').removeClass('d-none');
                $('.furniture-input').addClass('d-none');
                $('.book-input').addClass('d-none');
            } else if (type == 3) {
                $('.furniture-input').removeClass('d-none');
                $('.dvd-input').addClass('d-none');
                $('.book-input').addClass('d-none');
            } else if (type == 2) {
                $('.book-input').removeClass('d-none');
                $('.dvd-input').addClass('d-none');
                $('.furniture-input').addClass('d-none');
            }
        });
    });
</script>
<?php require APPROOT . '/views/includes/footer.php'; ?>