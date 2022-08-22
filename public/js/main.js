$(document).ready(function () {     
    $('#productType').change(function() {
        $("#input_err").html("");
        $('#input' + $(this).val()).toggleClass('d-none');
        $('.input').not('#input' + $(this).val()).addClass('d-none');
        $('.input').not('#input' + $(this).val()).val('');
    });

 let size = document.querySelector('#size');
        let weight = document.querySelector('#weight');
        let height = document.querySelector('#height');
        let length = document.querySelector('#length');
        let width = document.querySelector('#width');
        let type = document.querySelector('#productType');
        let form = document.querySelector('#product_form');
        let sku = document.querySelector('#sku');
        let name = document.querySelector('#name');
let price = document.querySelector('#price');
        
form.addEventListener('submit', (e) => {
    e.preventDefault();
    let isSKUValid = checkSKU();
    let isNameValid = checkName();
    let isPriceValid = checkPrice();
    let isTypeValid = checkType();
    let isSizeValid = checkSize();
    let isWeightValid = checkWeight();
    let isHeightValid = checkHeight();
    let isLengthValid = checkLength();
    let isWidthValid = checkWidth();

    if (type.value == 1) {
        isSizeValid = checkSize();
    } else {
        isSizeValid = true;
    }
    if (type.value == 2) {
        isWeightValid = checkWeight();
    } else {
        isWeightValid = true;
    }
    if (type.value == 3) {
        isHeightValid = checkHeight();
        isLengthValid = checkLength();
        isWidthValid = checkWidth();
    } else {
        isHeightValid = true;
        isLengthValid = true;
        isWidthValid = true;
    } 
    let isFormValid = isSKUValid && isNameValid && isPriceValid
        && isTypeValid && isSizeValid && isWeightValid &&
        isHeightValid && isLengthValid && isWidthValid;
    
    if (isFormValid) {
        form.submit();
    }

});
const isRequired = value => value === '' ? false : true;
    const isBetween = (length, min, max) => length < min || length > max ? false : true;
    const isNumber = value => !isNaN(value) ? true : false;

const showError = (input, message) => {
    input.classList.add('is-invalid');
    if (!input.nextElementSibling.classList.contains('invalid-feedback')) {
        input.nextElementSibling.classList.add('invalid-feedback');
        input.nextElementSibling.innerHTML = message;
    }
}
const showSuccess = (input) => {
    input.classList.add('is-valid');
    input.classList.remove('is-invalid');
    input.parentNode.querySelectorAll('.invalid-feedback').forEach(div => div.remove());
}
const checkSKU = () => {
    let valid = false;
    const skuVal = sku.value.trim();
    if (!isRequired(skuVal)) {
        showError(sku, 'SKU is required');
    }  else {
        showSuccess(sku);
        valid = true;
    }
    return valid;
    }
    const checkName = () => {
        let valid = false;
        const nameVal = name.value.trim();
        if (!isRequired(nameVal)) {
            showError(name, 'Name is required');
        } else {
            showSuccess(name);
            valid = true;
        }
        return valid;
    }
    const checkPrice = () => {
        let valid = false;
        const priceVal = price.value.trim();
        if (!isRequired(priceVal)) {
            showError(price, 'Price is required');
        } else if (!isNumber(priceVal)) {
            showError(price, 'Price format is invalid');
        } else {
            showSuccess(price);
            valid = true;
        }
        return valid;
    }
    const checkType = () => {
        let valid = false;
        const typeVal = type.value.trim();
        if (!isRequired(typeVal)) {
            $("#type_err").html("Please select a product type");
        } else {
            $("#type_err").html("");
            valid = true;
        }
        return valid;
    }
    const checkSize = () => {
        let valid = false;
        const sizeVal = size.value.trim();
        if (!isRequired(sizeVal)) {
            showError(size, 'Size is required');
        } else if (!isNumber(sizeVal)) {
            showError(size, 'Size format is invalid');
        } else if (!isBetween(sizeVal, 1, 10000)) {
            showError(size, 'Size cannot be 0 or less than 0');
        } else {
            showSuccess(size);
            valid = true;
        }
        return valid;
    }
    const checkWeight = () => {
        let valid = false;
        const weightVal = weight.value.trim();
        if (!isRequired(weightVal)) {
            showError(weight, 'Weight is required');
        } else if (!isNumber(weightVal)) {
            showError(weight, 'Weight format is invalid');
        } else if (!isBetween(weightVal, 1, 10000)) {
            showError(weight, 'Weight cannot be 0 or less than 0');
        } else {
            showSuccess(weight);
            valid = true;
        }
        return valid;
    }
    const checkHeight = () => {
        let valid = false;
        const heightVal = height.value.trim();
        if (!isRequired(heightVal)) {
            showError(height, 'Height is required');
        } else if (!isNumber(heightVal)) {
            showError(height, 'Height format is invalid');
        } else if (!isBetween(heightVal, 1, 10000)) {
            showError(height, 'Height cannot be 0 or less than 0');
        } else {
            showSuccess(height);
            valid = true;
        }
        return valid;
    }
    const checkLength = () => {
        let valid = false;
        const lengthVal = length.value.trim();
        if (!isRequired(lengthVal)) {
            showError(length, 'Length is required');
        } else if (!isNumber(lengthVal)) {
            showError(length, 'Length format is invalid');
        } else if (!isBetween(lengthVal, 1, 10000)) {
            showError(length, 'Length cannot be 0 or less than 0');
        } else {
            showSuccess(length);
            valid = true;
        }
        return valid;
    }
    const checkWidth = () => {
        let valid = false;
        const widthVal = width.value.trim();
        if (!isRequired(widthVal)) {
            showError(width, 'Width is required');
        } else if (!isNumber(widthVal)) {
            showError(width, 'Width format is invalid');
        } else if (!isBetween(widthVal, 1, 10000)) {
            showError(width, 'Width cannot be 0 or less than 0');
        } else {
            showSuccess(width);
            valid = true;
        }
        return valid;
    }

    const debounce = (fn, delay = 500) => {
    let timeoutId;
    return (...args) => {
        if (timeoutId) {
            clearTimeout(timeoutId);
        }
        timeoutId = setTimeout(() => {
            fn.apply(null, args)
        }, delay);
    };
    };

form.addEventListener('input', debounce(function (e) {
    const target = e.target;
    if (target.matches('#sku')) {
        checkSKU();
    }
    if (target.matches('#name')) {
        checkName();
    }
    if (target.matches('#price')) {
        checkPrice();
    }
    if (target.matches('#size')) {
        checkSize();
    }
    if (target.matches('#weight')) {
        checkWeight();
    }
    if (target.matches('#height')) {
        checkHeight();
    }
    if (target.matches('#length')) {
        checkLength();
    }
    if (target.matches('#width')) {
        checkWidth();
    }

}));
    form.addEventListener('change', (e) => {
        const target = e.target;
        if (target.matches('#productType')) {
            checkType();
        }
    }
    );

});