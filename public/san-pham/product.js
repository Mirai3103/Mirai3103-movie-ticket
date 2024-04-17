// Hiển thị trang thêm thông tin sản phẩm
var btnShowCreateProduct = document.getElementById('btn-create');
var create_product = document.getElementById('create-product-id');
var table_product = document.getElementById('show-table-product');



// Hiển thị nội dung lên combo phân loại
const itemsProductType = document.querySelectorAll('.item-product-type');
const comboButtonType = document.getElementById('combo-product-type');

itemsProductType.forEach(item => {
    item.addEventListener('click', function() {
        const selectedProdutType = this.textContent;
        comboButtonType.textContent = selectedProdutType;
    })
});


// Hiển thị nội dung lên combo trạng thái
const itemsProductStatus = document.querySelectorAll('.item-product-status');
const comboButtonStatus = document.getElementById('combo-product-status');

itemsProductStatus.forEach(item => {
    item.addEventListener('click', function() {
        const selectedProductStatus = this.textContent;
        comboButtonStatus.textContent = selectedProductStatus;
    })
});



var textIdProduct = document.getElementById('product-id');
var textNameProduct = document.getElementById('product-name');
var textDesProduct = document.getElementById('product-des');
// var textTypeProduct = document.getElementById('');
var textPriceProduct = document.getElementById('product-price');
// var textStatusProduct = document.getElementById('');
var modal = document.getElementById('product-detail-modal');


// Button đóng Modal
var btnCloseProductDetail = document.getElementById('btn-close-product-detail');
btnCloseProductDetail.addEventListener('click', function() {
    if(modal) {
        textIdProduct.value = "";
        textNameProduct.value = "";
        textDesProduct.value = "";
        // textTypeProduct.value = "";
        textPriceProduct.value = "";
        // textStatusProduct.value = "";
        $(modal).modal('hide');
    }
});


// Button clear
var btnClearDes = document.getElementById('btn-clear-ticket-detail');
btnClearDes.addEventListener('click', function() {
    textIdProduct.value = "";
    textNameProduct.value = "";
    textDesProduct.value = "";
    // textTypeProduct.value = "";
    textPriceProduct.value = "";
    // textStatusProduct.value = "";
    $(modal).modal('hide');
});


// Button save
var btnSaveDes = document.getElementById('btn-save-ticket-detail');
btnSaveDes.addEventListener('click', function() {
    textIdProduct.value = "";
    textNameProduct.value = "";
    textDesProduct.value = "";
    // textTypeProduct.value = "";
    textPriceProduct.value = "";
    // textStatusProduct.value = "";
})