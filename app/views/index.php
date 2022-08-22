<?php require APPROOT . '/views/includes/header.php'; ?>

<header>
    <div class="jumbotron">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h1> <?php echo $data['title']; ?></h1>
                <div class="button-group">
                    <a class="btn btn-success" href="<?php echo URLROOT ?>/addproduct">ADD</a>
                    <button class="btn btn-danger" id="delete-product-btn">MASS DELETE</button>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="container">
    <hr class="my-4">
</div>
<div class="container">
    <div class="row row-cols-1 row-cols-md-4 g-4">
        <?php foreach ($data['products'] as $product) : ?>
            <div class="col-md-4 p-2">
                <div class="card">
                    <input class="form-check-input m-2 delete-checkbox" name="delete" type="checkbox" value="<?php echo $product->id; ?>" id="delete-checkbox-<?php echo $product->id; ?>">
                    <div class="card-body d-flex flex-column align-items-center justify-content-center">
                        <h5 class="card-title"><?php echo $product->sku; ?></h5>
                        <p class="card-text"><?php echo $product->name; ?></p>
                        <p class="card-text">Price: <?php echo $product->price; ?>$</p>
                        <?php if ($product->type == 1) : ?>
                            <p class="card-text">Size: <?php echo $product->size; ?> MB</p>
                        <?php elseif ($product->type == 2) : ?>
                            <p class="card-text">Weight: <?php echo $product->weight; ?> KG</p>
                        <?php elseif ($product->type == 3) : ?>
                            <p class="card-text">Dimension: <?php echo $product->length; ?>x<?php echo $product->width; ?>x<?php echo $product->height; ?> </p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#delete-product-btn').on('click', function() {
            var checkboxes = $('.delete-checkbox');
            var checked = [];
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].checked) {
                    checked.push(checkboxes[i].value);
                }
            }
            if (checked.length > 0) {
                $.ajax({
                    url: '<?php echo URLROOT; ?>/deleteMultiple',
                    type: 'POST',
                    data: {
                        'products': checked
                    },
                    success: function(response) {
                        window.location.href = '<?php echo URLROOT; ?>';
                    }
                });
            }
        });
    });
</script>








<?php require APPROOT . '/views/includes/footer.php'; ?>
