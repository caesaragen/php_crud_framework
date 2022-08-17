<?php require APPROOT . '/views/includes/header.php'; ?>
<form id="product_form" action=" <?php echo URLROOT; ?>/addProduct" ; method="post">

    <header>
        <div class="jumbotron">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h1 class="display-4">Product Add</h1>
                    <div class="button-group">
                        <button class="btn btn-success" onclick="validateForm()">Save</button>
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
                <!-- <i class="text-success">Please, provide Price *</i> -->
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
            </div>
        </div>
        <div class="dvd-input d-none">
            <div class="row mb-3">
                <label for="dvd" class="col-sm-2 col-form-label">Size (MB)</label>
                <div class="col-sm-10">
                    <input type="text" name="size" id="size" class="form-control <?php echo (!empty($data['size_err'])) ? 'is-invalid' : ''; ?>">
                    <?php echo (!empty($data['size_err'])) ? '<span class="text-danger">' . $data['size_err'] . '</span>' : ''; ?>
                    <!-- <i class="text-success">Please, provide Size *</i> -->
                    <span class="text-danger" id="size_err"></span>
                </div>
            </div>
        </div>
        <div class="furniture-input d-none">
            <div class="row mb-3">
                <label for="height" class="col-sm-2 col-form-label">Height (CM)</label>
                <div class="col-sm-10">
                    <input type="text" name="height" id="height" class="form-control <?php echo (!empty($data['height_err'])) ? 'is-invalid' : ''; ?>">
                    <?php echo (!empty($data['height_err'])) ? '<span class="text-danger">' . $data['height_err'] . '</span>' : ''; ?>
                    <!-- <i class="text-success">Please, provide Height *</i> -->
                    <span class="text-danger" id="height_err"></span>
                </div>
            </div>
            <div class="row mb-3">
                <label for="width" class="col-sm-2 col-form-label">Width (CM)</label>
                <div class="col-sm-10">
                    <input type="text" name="width" id="width" class="form-control <?php echo (!empty($data['width_err'])) ? 'is-invalid' : ''; ?>">
                    <?php echo (!empty($data['width_err'])) ? '<span class="text-danger">' . $data['width_err'] . '</span>' : ''; ?>
                    <!-- <i class="text-success">Please, provide Width *</i> -->
                    <span class="text-danger" id="width_err"></span>
                </div>
            </div>
            <div class="row mb-3">
                <label for="length" class="col-sm-2 col-form-label">Length (CM)</label>
                <div class="col-sm-10">
                    <input type="text" name="length" id="length" class="form-control <?php echo (!empty($data['length_err'])) ? 'is-invalid' : ''; ?>">
                    <?php echo (!empty($data['length_err'])) ? '<span class="text-danger">' . $data['length_err'] . '</span>' : ''; ?>
                    <!-- <i class="text-success">Please, provide Length *</i> -->
                    <span class="text-danger" id="length_err"></span>
                </div>
            </div>
        </div>
        <div class="book-input d-none">
            <div class="row mb-3">
                <label for="weight" class="col-sm-2 col-form-label">Weight (KG)</label>
                <div class="col-sm-10">
                    <input type="text" name="weight" id="weight" class="form-control <?php echo (!empty($data['weight_err'])) ? 'is-invalid' : ''; ?>">
                    <?php echo (!empty($data['weight_err'])) ? '<span class="text-danger">' . $data['weight_err'] . '</span>' : ''; ?>
                    <!-- <i class="text-success">Please, provide weight *</i> -->
                    <span class="text-danger" id="weight_err"></span>
                </div>
            </div>
        </div>
</form>

</div>
<script>
    // validate input fields
    const validateForm = () => {
        event.preventDefault();

        var Height = $("#height").val();
        var Width = $("#width").val();
        var Length = $("#length").val();
        var Weight = $("#weight").val();
        // var Size = $("#size").val();
        let size = document.getElementById("size").value;
        let weight = document.getElementById("weight").value;
        let height = document.getElementById("height").value;
        let length = document.getElementById("length").value;
        let width = document.getElementById("width").value;
        // get selected value from productType select
        let type = document.getElementById("productType").value;
        let form = document.getElementById("product_form");
        let sku = document.getElementById("sku").value;
        let name = document.getElementById("name").value;
        let price = document.getElementById("price").value;
        // console.log(type);

        var isInvalid = $(".is-invalid").length;
        console.log(isInvalid + " isInvalid");
        var inputFields = $(".form-control").length;
        // console.log(inputFields + " inputFields");
        // console.log(isNaN(height) + " " + width + " " + length + " " + weight + " " + size + "attr");

        // if any  input has is-invalid class, return false
        if (price == '' || sku == '' || name == '') {
            $("#input_err").html("Please, provide required inputs *");
            return false;
        } else if ($('.is-invalid').length > 0) {
            return false;
        } else if (type == 1) {
            $("#weight").removeClass("is-invalid");
            $("#height").removeClass("is-invalid");
            $("#length").removeClass("is-invalid");
            $("#width").removeClass("is-invalid");
            $("#weight").val('');
            $("#height").val('');
            $("#length").val('');
            $("#width").val('');

            if (size == '' || isNaN(size)) {
                $("#size").addClass("is-invalid");
                $("#size_err").html("Please, provide valid Size *");
            }
            // return false
        } else if (type == 2) {
            $("#size").removeClass("is-invalid");
            $("#height").removeClass("is-invalid");
            $("#length").removeClass("is-invalid");
            $("#width").removeClass("is-invalid");
            $("#size").val('');
            $("height").val('');
            $("length").val('');
            $("width").val('');
            if (weight == '' || isNaN(weight)) {
                $("#weight").addClass("is-invalid");
                $("#weight_err").html("Please, provide valid Weight *");
            }
            // return false
        } else if (type == 3) {
            $("#size").removeClass("is-invalid");
            $("#weight").removeClass("is-invalid");
            $("#size").val('');
            $("weight").val('');
            if (height == '' || isNaN(height)) {
                $("#height").addClass("is-invalid");
                $("#height_err").html("Please, provide valid Height *");
            }
            if (width == '' || isNaN(width)) {
                $("#width").addClass("is-invalid");
                $("#width_err").html("Please, provide valid Width *");
            }
            if (length == '' || isNaN(length)) {
                $("#length").addClass("is-invalid");
                $("#length_err").html("Please, provide valid Length *");
            }
            // return false
        } else if (isNaN(height) || isNaN(width) || isNaN(length) || isNaN(weight) || isNaN(size)) {
            $("#input_err").html("Please, provide valid inputs *");
            $("#weight").addClass("is-invalid");
            $("#height").addClass("is-invalid");
            $("#length").addClass("is-invalid");
            $("#width").addClass("is-invalid");
            $("#size").addClass("is-invalid");
            // return false;
        } else if (type == "") {
            $("#input_err").html("Please, select Product Type *");
            return false;
        } else {
            $("#input_err").html("");
        }
        $("#input_err").html("");
        form.submit();
        return true;
    }
    $(document).ready(function() {
        var Height = $("#height").val();
        var Width = $("#width").val();
        var Length = $("#length").val();
        var Weight = $("#weight").val();
        var Size = $("#size").val();
        var price = $("#price").val();
        var sku = $("#sku").val();
        var name = $("#name").val();
        var type = $("#type").val();
        var dvd = $("#dvd").val();

        $("#height").blur(function() {
            if ($("#height").val() == 0) {
                $("#height").addClass("is-invalid");
                $("#height_err").html("Height cannot be 0 *");
            } else if (isNaN($("#height").val())) {
                $("#height").addClass("is-invalid");
                $("#height_err").html("Please provide valid height *");
            } else {
                $("#height_err").html("");
                $("#height").removeClass("is-invalid");
            }
        })

        $("#width").blur(function() {
            if ($("#width").val() == 0) {
                $("#width").addClass("is-invalid");
                $("#width_err").html("Width cannot be 0 *");
            } else if (isNaN($("#width").val())) {
                $("#width").addClass("is-invalid");
                $("#width_err").html("Please provide valid width *");
            } else {
                $("#width_err").html("");
                $("#width").removeClass("is-invalid");
            }
        })

        $("#length").blur(function() {
            if ($("#length").val() == 0) {
                $("#length").addClass("is-invalid");
                $("#length_err").html("Length cannot be 0 *");
            } else if (isNaN($("#length").val())) {
                $("#length").addClass("is-invalid");
                $("#length_err").html("Please provide valid height *");
            } else {
                $("#length_err").html("");
                $("#length").removeClass("is-invalid");
            }
        })

        $("#weight").blur(function() {
            if ($("#weight").val() == 0) {
                $("#weight").addClass("is-invalid");
                $("#weight_err").html("Weight cannot be 0 *");
            } else if (isNaN($("#weight").val())) {
                $("#weight").addClass("is-invalid");
                $("#weight_err").html("Please provide valid weight *");
            } else {
                $("#weight_err").html("");
                $("#weight").removeClass("is-invalid");
            }
        })

        $("#size").blur(function() {
            if ($("#size").val() == 0) {
                $("#size").addClass("is-invalid");
                $("#size_err").html("Size cannot be 0 *");
            } else if (isNaN($("#size").val())) {
                $("#size").addClass("is-invalid");
                $("#size_err").html("Please provide valid size *");
            } else {
                $("#size_err").html("");
                $("#size").removeClass("is-invalid");
            }
        })

        $("#price").blur(function() {
            if ($("#price").val() == 0) {
                $("#price").addClass("is-invalid");
                $("#price_err").html("Price cannot be 0 *");
            } else if (isNaN($("#price").val())) {
                $("#price").addClass("is-invalid");
                $("#price_err").html("Please provide valid amount *");
            } else {
                $("#price_err").html("");
                $("#price").removeClass("is-invalid");
            }
        })
        $("#sku").blur(function() {
            if ($("#sku").val() == '') {
                $("#sku").addClass("is-invalid");
                $("#sku_err").html("Please provide valid sku *");
            } else {
                $("#sku_err").html("");
                $("#sku").removeClass("is-invalid");
            }
        })
        $("#name").blur(function() {
            if ($("#name").val() == '') {
                $("#name").addClass("is-invalid");
                $("#name_err").html("Please provide valid name *");
            } else {
                $("#name_err").html("");
                $("#name").removeClass("is-invalid");
            }
        })
        $("#height").keyup(function() {
            Height = $("#height").val();
            if (Height == "") {
                $("#height_err").text("Height is required");
                $("#height").addClass("is-invalid");

            } else if (isNaN(Height)) {
                $("#height_err").text("Height must be a number");
                $("#height").addClass("is-invalid");
            } else {
                $("#height_err").text("");
                $("#height").removeClass("is-invalid");
            }
        });
        $("#width").keyup(function() {
            Width = $("#width").val();
            if (Width == "") {
                $("#width_err").text("Width is required");
                $("#width").addClass("is-invalid");

            } else if (isNaN(Width)) {
                $("#width_err").text("Width must be a number");
                $("#width").addClass("is-invalid");
            } else {
                $("#width_err").text("");
                $("#width").removeClass("is-invalid");
            }
        });
        $("#length").keyup(function() {
            Length = $("#length").val();
            if (Length == "") {
                $("#length_err").text("Length is required");
                $("#length").addClass("is-invalid");
            } else if (isNaN(Length)) {
                $("#length_err").text("Length must be a number");
                $("#length").addClass("is-invalid");

            } else {
                $("#length_err").text("");
                $("#length").removeClass("is-invalid");
            }
        });
        $("#weight").keyup(function() {
            Weight = $('#weight').val();
            if (Weight == "") {
                $("#weight_err").text("Weight is required");
                $("#weight").addClass("is-invalid");
            } else if (isNaN(Weight)) {
                $("#weight_err").text("Weight must be a number");
                $("#weight").addClass("is-invalid");
            } else {
                $("#weight_err").text("");
                $("#weight").removeClass("is-invalid");
            }
        });
        $("#size").keyup(function() {
            Size = $("#size").val();
            if (Size == "") {
                $('#size').addClass('is-invalid');
                $("#size_err").text("Size is required");
            } else if (isNaN(Size)) {
                $('#size').addClass('is-invalid');
                $("#size_err").text("Size must be a number");
            } else {
                $('#size').removeClass('is-invalid');
                $("#size_err").text("");
            }
        });

        $("#price").keyup(function() {
            price = $("#price").val();
            if (price == "") {
                $('#price').addClass('is-invalid');
                $("#price_err").text("Price is required");
            } else if (isNaN(price)) {
                $('#price').addClass('is-invalid');
                $("#price_err").text("Price must be a number");
            } else {
                $("#price_err").text("");
                $('#price').removeClass('is-invalid');

            }
        });
        $("#sku").keyup(function() {
            sku = $("#sku").val();
            if (sku == "") {
                $('#sku').addClass('is-invalid');
                $("#sku_err").text("SKU is required");
            } else {
                $("#sku").removeClass("is-invalid");
                $("#sku_err").text("");
            }
        });
        $("#name").keyup(function() {
            name = $("#name").val();
            if (name == "") {
                $('#name').addClass('is-invalid');
                $("#name_err").text("Name is required");
            } else {
                $("#name").removeClass("is-invalid");
                $("#name_err").text("");
            }
        });

    });

    $(document).ready(function() {
        $('#productType').change(function() {
            $("#input_err").html("");
            var type = $(this).val();
            if (type == 1) {
                $('.dvd-input').removeClass('d-none');
                $('.furniture-input').addClass('d-none');
                $('.book-input').addClass('d-none');
                $("#length").removeClass("is-invalid");
                $("#width").removeClass("is-invalid");
                $("#height").removeClass("is-invalid");
                $("#weight").removeClass("is-invalid");
                if ($("#size").val() == "") {
                    $("#size").addClass("is-invalid");
                } else if (isNaN($("#size").val())) {
                    $("#size").addClass("is-invalid");
                }
            } else if (type == 3) {
                $("#size").removeClass("is-invalid");
                $("#weight").removeClass("is-invalid");
                $('.furniture-input').removeClass('d-none');
                $('.dvd-input').addClass('d-none');
                $('.book-input').addClass('d-none');
                if ($("#length").val() == "" || $("#width").val() == "" || $("#height").val() == "") {
                    $("#length").addClass("is-invalid");
                    $("#width").addClass("is-invalid");
                    $("#height").addClass("is-invalid");
                } else if (isNaN($("#length").val()) || isNaN($("#width").val()) || isNaN($("#height").val())) {
                    $("#length").addClass("is-invalid");
                    $("#width").addClass("is-invalid");
                    $("#height").addClass("is-invalid");
                }
            } else if (type == 2) {
                $("#size").removeClass("is-invalid");
                $("#length").removeClass("is-invalid");
                $("#width").removeClass("is-invalid");
                $("#height").removeClass("is-invalid");
                $('.book-input').removeClass('d-none');
                $('.dvd-input').addClass('d-none');
                $('.furniture-input').addClass('d-none');
                if ($("#weight").val() == "") {
                    $("#weight").addClass("is-invalid");
                } else if (isNaN($("#weight").val())) {
                    $("#weight").addClass("is-invalid");
                }
            }
        });
    });
</script>
<?php require APPROOT . '/views/includes/footer.php'; ?>