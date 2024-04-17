

var modal = document.getElementById('cinema-detail-modal');
var txtIdCinema = document.getElementById('cinema-id');
var txtNameCinema = document.getElementById('cinema-name');
var txtImgCinema = document.getElementById('cinema-img');
var txtAddressCinema = document.getElementById('cinema-address');
// var txtSttCinema = document.getElementById('');


// Button đóng modal loại vé 
var btnCloseCinemaDetail = document.getElementById('btn-close-cinema');
btnCloseCinemaDetail.addEventListener('click', function() {
    if (modal) {
        txtIdCinema.value = "";
        txtNameCinema.value = "";
        txtImgCinema.value = "";
        txtAddressCinema.value = "";
        $(modal).modal('hide');
    }
});


// Button cancel loại vé
var btnCancelCinemaDetail = document.getElementById('btn-cancel-cinema');
btnCancelCinemaDetail.addEventListener('click', function() {
    txtIdCinema.value = "";
    txtNameCinema.value = "";
    txtImgCinema.value = "";
    txtAddressCinema.value = "";
    $(modal).modal('hide'); 
});


// Button save loại vé
var btnSaveCinemaDetail = document.getElementById('btn-save-cinema');
btnSaveCinemaDetail.addEventListener('click', function() {
    
});