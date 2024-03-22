// const myCarouselElement = document.querySelector('#carousel__card');
// // const menuMobile = document.getElementById()


// if (window.matchMedia("(min-width:576px)").matches) {
//     const carousel = new bootstrap.Carousel(myCarouselElement, {
//         interval: false,
//         touch: false
//     }); 

//     var carouselWidth = myCarouselElement.querySelector('.carousel-inner').scrollWidth;
//     var cardWidth = myCarouselElement.querySelector('.carousel-item').offsetWidth;

//     var scrollPosition = 0;

//     $('.carousel-control-next').on('click', function() {
//         if (scrollPosition < (carouselWidth - (cardWidth * 5))) {
//             console.log('next');
//             scrollPosition += cardWidth;
//             $('.carousel-inner').animate({scrollLeft: scrollPosition}, 600);
//         }
//     });

//     $('.carousel-control-prev').on('click', function() {
//         if (scrollPosition > 0) {
//             console.log('prev');
//             scrollPosition -= cardWidth;
//             $('.carousel-inner').animate({scrollLeft: scrollPosition}, 600);
//         }
//     });
// } else {
//     $(myCarouselElement).addClass('slide');
// }


//-----------------show navbar-mobile----------------
var checkbox = document.getElementById("checkShowMenu");

console.log(checkbox)

// Hủy chọn checkbox khi chiều rộng màn hình lớn hơn 768px
function uncheckCheckboxOnLargeScreen() {
    if (window.innerWidth > 768) {
        console.log("ff")   
        checkbox.checked = false;
    }
}

// Gọi hàm khi trang được tải và khi cửa sổ được resize
window.onload = uncheckCheckboxOnLargeScreen;
window.onresize = uncheckCheckboxOnLargeScreen;