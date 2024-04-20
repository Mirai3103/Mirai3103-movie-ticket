

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

// import jQuery from "jquery";
// import queryString from "query-string";
// const $ = jQuery;
const btnSearch = $("#searchMovieBtn");
const searchInput = $("#searchMovie");

let queryObject = queryString.parse(location.search);
searchInput.val(queryObject['tu-khoa'] || "");
const loadingHtml =  `
<tr>
<td class="   tw-border-b tw-border-gray-50" colspan="5">
    <div class='tw-w-full tw-flex tw-py-32 tw-items-center tw-justify-center'>
        <span class="tw-loading tw-loading-dots tw-loading-lg"></span>
    </div>
</td>
</tr>
`
function refetchAjax(){
    $("#cinemaList").html(loadingHtml);
    const queryStr = queryString.stringify(queryObject);
    $.ajax({
        url: "/ajax/rap-chieu",
        type: "GET",
        data: {
           ...queryObject
        },
        success: function (data) {
            $("#cinemaList").html(data);
            window.history.pushState({}, "", `${location.pathname}?${queryStr}`);
        },
        error: function (error) {
            $("#cinemaList").html(`
            <tr>
            <td class="   tw-border-b tw-border-gray-50" colspan="5">
                Có lỗi xảy ra, vui lòng thử lại sau
            </td>
            </tr>
            `);

        }
    });
}
searchInput.on("keypress", function(e){
    if(e.keyCode == 13){
        queryObject['tu-khoa'] = searchInput.val();
        refetchAjax();
    }
});
btnSearch.on("click", function(){
    queryObject['tu-khoa'] = searchInput.val();
    refetchAjax();
});
refetchAjax();

function onOrderChange(column){
    const pre = queryObject['sap-xep'] || "";
    const predir = queryObject['thu-tu'] || "ASC";
    if(pre == column){
        queryObject['thu-tu'] = predir == "ASC" ? "DESC" : "ASC";
    }
    queryObject['sap-xep'] = column;
    refetchAjax();
}
const formState = "create";

const cinemaNameInput = $("#cinema-name");
const cinemaAddressInput = $("#cinema-address");
const cinemaStatusSelect = $("#cinema-status");
const cinemaDesInput = $("#cinema-des");

const btnSaveCinema = $("#btn-save-cinema");

$("#cinema-image-file").on("change", function(){
    const file = this.files[0];
    const formData = new FormData();
    formData.append("file", file);
    $.ajax({
        url: "/api/file/upload",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (data) {
            $("#cinema-image").val(window.location.origin + data.data.path);
            toast("Thành công", {
                position: 'bottom-center',
                type: 'success',
                description: 'Ảnh đã được tải lên thành công'
            })
        },
        error: function (error) {
            toast("Có lỗi xảy ra, vui lòng thử lại sau", {
                position: 'bottom-center',
                type: 'danger',
            })
        }
    });
});
function validateForm(){
    if(cinemaNameInput.val().length <=5){
        cinemaNameInput.addClass("is-invalid");
        $(cinemaNameInput.next()).text("Tên rạp chiếu phải lớn hơn 5 ký tự");
        $(cinemaNameInput).one("input", function(){
            cinemaNameInput.removeClass("is-invalid");
        });
        return false;
    }
    const endWithImageExtension = $("#cinema-image").val().match(/\.(jpeg|jpg|png)$/) != null;
    if(!endWithImageExtension){
        $("#cinema-image").addClass("is-invalid");
         $("#cinema-image-error").text("Hình ảnh phải là file ảnh");
        $( $("#cinema-image")).one("change", function(){
            $("#cinema-image").removeClass("is-invalid");
        });
        return false;
    }
    if(cinemaAddressInput.val().length <=10){
        cinemaAddressInput.addClass("is-invalid");
        $(cinemaAddressInput.next()).text("Địa chỉ rạp chiếu phải lớn hơn 10 ký tự");
        $(cinemaAddressInput).one("input", function(){
            cinemaAddressInput.removeClass("is-invalid");
        });
        return false;
    }
    if(cinemaDesInput.val().length <=10){
        cinemaDesInput.addClass("is-invalid");
        $(cinemaDesInput.next()).text("Mô tả rạp chiếu phải lớn hơn 10 ký tự");
        $(cinemaDesInput).one("input", function(){
            cinemaDesInput.removeClass("is-invalid");
        });
        return false;

    }
 
        
}

$("#cinema-form").on("submit", function(e){
    e.preventDefault();
    if(!validateForm()){
        return;
    }
    const name = cinemaNameInput.val();
    const address = cinemaAddressInput.val();
    const status = cinemaStatusSelect.val();
    const des = cinemaDesInput.val();
    const img = $("#cinema-image").val();
    let url = "/ajax/rap-chieu";
    if(formState == "update"){
        const id = $("#cinema-id").val();
        url = `/ajax/rap-chieu/${id}/sua`;
    }
    const formData = new FormData();
    formData.append("TenRapChieu", name);
    formData.append("DiaChi", address);
    formData.append("TrangThai", status);
    formData.append("MoTa", des);
    formData.append("HinhAnh", img);

    $.ajax({
        url: url,
        type: "POST",
        data: formData,
        success: function (data) {
            refetchAjax();
            $(modal).modal('hide');
            toast("Thành công", {
                position: 'bottom-center',
                type: 'success',
            })
        },
        error: function (error) {
            console.log(error);
            toast("Có lỗi xảy ra, vui lòng thử lại sau", {
                position: 'bottom-center',
                type: 'danger',
            })
        }
    });
});

