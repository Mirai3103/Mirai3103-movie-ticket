let perPage = 4;
let currentPage = 1;
let start = 0;
let end = perPage;

let totalPages = Math.ceil(listMovie.length / perPage);

//____________________

var btnNexttPage = document.getElementsByClassName("page-next-btn")[0];
var btnPrevPage = document.getElementsByClassName("page-prev-btn")[0];
var pageNumber = document.getElementsByClassName("number-page")[0];
var pagingWrapper = document.getElementsByClassName("pagination-info")[0];

function renderPaging() {
  let html = `
        <li class="active page-item"><a href="javascript:void(0);" class="page-link">1</a></li>
    `;

  for (let i = 2; i <= totalPages; i++) {
    html += `<li class="active page-item"><a href="javascript:void(0);" class="page-link">${i}</a></li>`;
  }

  pageNumber.innerHTML = html;
}

function updateStartEnd(currentPage) {
  start = (currentPage - 1) * perPage;
  end = currentPage * perPage;
}

renderPaging();

function changePage() {
  const currentPages = document.querySelectorAll(".number-page a");
  console.log(currentPages);
  for (let i = 0; i < currentPages.length; i++) {
    currentPages[i].addEventListener("click", () => {
      currentPage = i + 1;
      updateStartEnd(currentPage);
      renderElement();
    });
  }
}

changePage();
// DaoDien: "Denis Villeneuve";
// DinhDang: "2D";
// HanCheDoTuoi: "T16";
// HinhAnh: "https://cinestar.com.vn/pictures/Cinestar/03-2024/hanh-tinh-cat-2.jpg";
// MaPhim: 127;
// MoTa: "“Dune: Hành Tinh Cát – Phần 2” sẽ tiếp tục khám phá hành trình đậm chất thần thoại của Paul Atreides khi anh đồng hành cùng Chani và những người Fremen trên chặng đường trả thù những kẻ đã hủy hoại gia đình mình. Đối mặt với những lựa chọn giữa tình yêu của cuộc đời mình và số phận của vũ trụ, Paul phải ngăn chặn viễn cảnh tương lai tồi tệ chỉ mình anh nhìn thấy.";
// NgayPhathanh: "2024-02-28";
// NgonNgu: "VN";
// TenPhim: "HÀNH TINH CÁT PHẦN 2 (T16)";
// ThoiLuong: 180;
// Trailer: "https://www.youtube.com/watch?v=0ZqTYVYcx4k";
// TrangThai: null;
var movieWrapper = document.getElementsByClassName("movies-wrapper");
console.log(listMovie);
function renderElement() {
  var html = listMovie
    .map((movie, index) => {
      if (index >= start && index < end) {
        return `
              <div class="col-xl-3 mb-4 mb-xl-0 col-md-6 col-12 app-carousel-movie-item" >
                  <div class="app-carousel-movie-item__img">
                      <img src="${movie.HinhAnh}" class="d-block w-100" alt="...">
                  </div>
                  <h4 class="mt-3 app-carousel-movie-item__title">${movie.TenPhim}</h4>
                  <div class="d-flex justify-content-around mt-4 align-items-center" >
                    <a href="${movie.Trailer}"style="color: var(--color1)" >
                        <i class="fa-solid fa-star"></i>
                        <span>Xem Trailer<span/>
                    </a>
                    <a
                    style="margin-right: 4px;" class="login-item btn-login btn" href="/phim/${movie.MaPhim}">
                         <i class="fa-solid fa-star"></i>
                        <span class="ms-2">Chi Tiết</span>
                    </a>
                  </div>
              </div>
          `;
      }
    })
    .join("");

  movieWrapper[0].innerHTML = html;
}

renderElement();

btnPrevPage.addEventListener("click", () => {
  currentPage--;

  if (currentPage <= 1) currentPage = 1;

  updateStartEnd(currentPage);

  renderElement();
});

btnNexttPage.addEventListener("click", () => {
  currentPage++;

  if (currentPage > totalPages) currentPage = totalPages;

  updateStartEnd(currentPage);

  renderElement();
});

/* <div class="carousel-item active" data-bs-interval="10000">
<div class="row">
  <div class="col-3 app-carousel-movie-item" >
    <div class="app-carousel-movie-item__img">
      <img src="/public/assets/img/poster_kung_fu_panda.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <div class="col-3 app-carousel-movie-item" >
    <div class="app-carousel-movie-item__img">
      <img src="/public/assets/img/poster_dune2.jpg" class="d-block w-100" alt="...">
    </div>
  </div><div class="col-3 app-carousel-itemie-col" >
    <div class="app-carousel-movie-item__img">
      <img src="/public/assets/img/poster_dune2.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <div class="col-3 app-carousel-itemie-col" >
    <div class="app-carousel-movie-item__img">
      <img src="/public/assets/img/poster_spy_family.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
</div>
</div> */
