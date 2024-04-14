// button close Modal
var modal = document.getElementById('type-ticket-detail-modal');
var txtIdTypeTicket = document.getElementById('type-ticket-id');
var txtNameTypeTicket = document.getElementById('type-ticket-name');
var txtPriceTypeTicket = document.getElementById('type-ticket-price');
var txtDesTypeTicket = document.getElementById('type-ticket-des');


// Button đóng modal loại vé 
var btnCloseTypeTicketDetail = document.getElementById('btn-close-type-ticket-detail');
btnCloseTypeTicketDetail.addEventListener('click', function() {
    if (modal) {
        txtIdTypeTicket.value = "";
        txtNameTypeTicket.value = "";
        txtPriceTypeTicket.value = "";
        txtDesTypeTicket.value = "";
        $(modal).modal('hide');
    }
});


// Button cancel loại vé
var btnCancelTypeTicketDetail = document.getElementById('btn-cancel-type-ticket');
btnCancelTypeTicketDetail.addEventListener('click', function() {
    txtIdTypeTicket.value = "";
    txtNameTypeTicket.value = "";
    txtPriceTypeTicket.value = "";
    txtDesTypeTicket.value = "";
    $(modal).modal('hide'); 
});


// Button save loại vé
var btnSaveTypeTicketDetail = document.getElementById('btn-save-type-ticket');
btnSaveTypeTicketDetail.addEventListener('click', function() {
    
});