<?php
title("Trang quản lý phòng chiếu");
require ('app/views/admin/header.php');


?>

<script>
const statuses = <?= json_encode($statuses) ?>;
const cinemas = <?= json_encode($cinemas) ?>;
const validatorRule = {
    TenPhongChieu: {
        minLength: {
            value: 3,
            message: 'Tên phòng chiếu phải có ít nhất 3 ký tự'
        },
        maxLength: {
            value: 40,
            message: 'Tên phòng chiếu không được vượt quá 50 ký tự'
        },
    },
    ManHinh: {
        required: {
            value: true,
            message: 'Vui lòng chọn màn hình'
        },
    },
    MaRapChieu: {
        required: {
            value: true,
            message: 'Vui lòng chọn rạp chiếu'
        },
    },
    TrangThai: {
        required: {
            value: true,
            message: 'Vui lòng chọn trạng thái'
        },
    },
    ChieuDai: {
        required: {
            value: true,
            message: 'Vui lòng nhập chiều dài'
        },
        min: {
            value: 1,
            message: 'Chiều dài phải lớn hơn 0'
        },
        max: {
            value: 100,
            message: 'Chiều dài không được vượt quá 100'
        },
    },
    ChieuRong: {
        required: {
            value: true,
            message: 'Vui lòng nhập chiều rộng'
        },
        min: {
            value: 1,
            message: 'Chiều rộng phải lớn hơn 0'
        },
        max: {
            value: 100,
            message: 'Chiều rộng không được vượt quá 100'
        },
    }
}
</script>

<main class=' tw-h-full tw-w-full tw-overflow-y-auto tw-pb-40' x-data="
formValidator(validatorRule);
            ">
    <div
        class='tw-m-10 tw-relative tw-flex tw-flex-col tw-bg-white tw-p-5 tw-rounded-md tw-shadow-md  tw-bg-clip-border'>
        <div class="tw-flex tw-items-center tw-justify-between tw-gap-8 tw-mb-2">
            <div class='tw-flex tw-gap-x-6 tw-items-center'>
                <h5
                    class="tw-block tw-font-sans tw-text-2xl tw-antialiased tw-font-semibold tw-leading-snug tw-tracking-normal text-blue-gray-900">
                    Thêm phòng chiếu
                </h5>

            </div>
            <div class="tw-flex tw-flex-col tw-gap-2 shrink-0 sm:tw-flex-row tw-my-2">

                <a href="/admin/phong-chieu" data-ripple-light="true" class=" tw-flex tw-select-none tw-items-center tw-gap-3 tw-rounded-lg tw-bg-blue-700 tw-py-3
                            tw-px-4 tw-text-center tw-align-middle tw-font-sans tw-text-xs tw-font-bold tw-uppercase
                            tw-text-white tw-shadow-md shadow-gray-900/10 tw-transition-all hover:tw-shadow-lg
                            hover:shadow-gray-900/20 focus:tw-opacity-[0.85] focus:tw-shadow-none
                            active:tw-opacity-[0.85] active:tw-shadow-none disabled:tw-pointer-events-none
                            disabled:tw-opacity-50 disabled:tw-shadow-none" type="button">

                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-narrow-left">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M5 12l14 0" />
                        <path d="M5 12l4 4" />
                        <path d="M5 12l4 -4" />
                    </svg>
                    Quay lại
                </a>
            </div>
        </div>
        <div class='tw-mt-4 tw-px-4'>
            <form action="" class='tw-flex tw-flex-col tw-gap-y-3 form form-active'>
                <div class="form-group ">
                    <label for="TenPhongChieu" class="tw-text-lg tw-p-1">
                        Tên phòng chiếu
                    </label>
                    <input x-model="data.TenPhongChieu" type="text" name="TenPhongChieu" id="TenPhongChieu"
                        placeholder="Nhập tên phòng chiếu" class="form-control"
                        :class="{'is-invalid': errors?.TenPhongChieu && errors?.TenPhongChieu.length > 0}" required>
                    <div class="invalid-feedback" x-show="errors?.TenPhongChieu">
                        <span x-text="errors?.TenPhongChieu?.join(', ')"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="ManHinh" class="tw-text-lg tw-p-1">
                        Màn hình
                    </label>
                    <input x-model="data.ManHinh" type="text" name="ManHinh" id="ManHinh" placeholder="Nhập màn hình"
                        class="form-control" :class="{'is-invalid': errors?.ManHinh && errors?.ManHinh.length > 0}"
                        required>
                    <div class="invalid-feedback" x-show="errors?.ManHinh">
                        <span x-text="errors?.ManHinh?.join(', ')"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="MaRapChieu" class="tw-text-lg
                        tw-p-1">
                        Rạp chiếu
                    </label>
                    <select x-model="data.MaRapChieu" name="MaRapChieu" id="MaRapChieu" class="form-select"
                        :class="{'is-invalid': errors?.MaRapChieu && errors?.MaRapChieu.length > 0}" required>
                        <option value="" disabled selected hidden>Chọn rạp chiếu</option>

                        <template x-for="item in cinemas" :key="item.MaRapChieu">
                            <option :value="item.MaRapChieu" x-text="item.TenRapChieu"></option>
                        </template>

                    </select>
                    <div class="invalid-feedback" x-show="errors?.MaRapChieu">
                        <span x-text="errors?.MaRapChieu?.join(', ')"></span>
                    </div>
                </div>
                <div class="form-group
                    ">
                    <label for="TrangThai" class="tw-text-lg tw-p-1">
                        Trạng thái
                    </label>
                    <select x-model="data.TrangThai" name="TrangThai" id="TrangThai" class="form-select"
                        :class="{'is-invalid': errors?.TrangThai && errors?.TrangThai.length > 0}" required>
                        <option value="" disabled selected hidden>Chọn trạng thái</option>
                        <template x-for="item in statuses" :key="item.MaTrangThai">
                            <option :value="item.MaTrangThai" x-text="item.Ten"></option>
                        </template>
                    </select>
                    <div class="invalid-feedback" x-show="errors?.TrangThai">
                        <span x-text="errors?.TrangThai?.join(', ')"></span>
                    </div>
                </div>
                <div class='tw-grid tw-grid-cols-2 tw-gap-x-2'>
                    <div class="form-group
                    ">
                        <label for="ChieuDai" class="tw-text-lg tw-p-1">
                            Chiều dài
                        </label>
                        <input x-model="data.ChieuDai" value='10' type="number" name="ChieuDai" id="ChieuDai"
                            placeholder="Nhập chiều dài" class="form-control"
                            :class="{'is-invalid': errors?.ChieuDai && errors?.ChieuDai.length > 0}" required>
                        <div class="invalid-feedback" x-show="errors?.ChieuDai">
                            <span x-text="errors?.ChieuDai?.join(', ')"></span>
                        </div>
                    </div>
                    <div class="form-group
                    ">
                        <label for="ChieuRong" class="tw-text-lg tw-p-1">
                            Chiều rộng
                        </label>
                        <input x-model="data.ChieuRong" value='10' type="number" name="ChieuRong" id="ChieuRong"
                            placeholder="Nhập chiều rộng" class="form-control"
                            :class="{'is-invalid': errors?.ChieuRong && errors?.ChieuRong.length > 0}" required>
                        <div class="invalid-feedback" x-show="errors?.ChieuRong">
                            <span x-text="errors?.ChieuRong?.join(', ')"></span>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class='tw-mt-8'>
            <h5
                class="tw-block tw-font-sans tw-text-2xl tw-antialiased tw-font-semibold tw-leading-snug tw-tracking-normal text-blue-gray-900">
                Bố trí ghế
            </h5>
            <div class='tw-flex tw-gap-y-4 tw-pb-10 tw-flex-col tw-items-center tw-relative tw-select-none' x-data="{
                isMouseDown: false,
                currentRect: null,
                startX: 0,
                startY: 0,
                rememberSelectedSeats : [],
                selectedSeats: [],
                isHoldCtrl: false,
                listCells: [],
                getPosition: (event) => {
                   const rect = $el.getBoundingClientRect();
                    const x = event.clientX - rect.left;
                    const y = event.clientY - rect.top;
                    return { x, y };
                }
            }" x-on:mousedown="
            if(2 === $event.button) return;
            if($refs.contextMenu.contains($event.target))return;
            $refs.contextMenu.classList.add('tw-hidden');
            console.log(isHoldCtrl);
                 if (isHoldCtrl) {
                    rememberSelectedSeats = [...selectedSeats];
                 } else {
                     document.querySelectorAll('.seat').forEach((seat) => {
                        seat.style.backgroundColor = seat.getAttribute('bg-normal');
                     });
                    rememberSelectedSeats = [];
                 }

                isMouseDown = true;
                currentRect = document.createElement('div');
                currentRect.style.position = 'absolute';
                currentRect.style.backgroundColor = 'rgba(0, 0, 0, 0.1)';
                currentRect.style.border = '1px solid rgba(0, 0, 0, 0.2)';
                currentRect.style.pointerEvents = 'none';
                currentRect.classList.add('rect');
                const { x, y } = getPosition($event);
                $el.appendChild(currentRect);
                console.log(x, y);
                startX =x;
         
                startY = y;
                currentRect.style.left = startX + 'px';
                currentRect.style.top = startY + 'px';
                currentRect.style.width = '0px';
                currentRect.style.height = '0px';
            " x-on:mousemove="
                if (!isMouseDown) return;
                const { x, y } = getPosition($event);
                 const endX = x;
                const endY = y;
                const minX = Math.min(startX, endX);
                const minY = Math.min(startY, endY);
                const maxX = Math.max(startX, endX);
                const maxY = Math.max(startY, endY);
                currentRect.style.left = minX + 'px';
                currentRect.style.top = minY + 'px';
                currentRect.style.width = maxX - minX + 'px';
                currentRect.style.height = maxY - minY + 'px';;
            " x-on:mouseup="
               if (!isMouseDown) return;
        const listSeats = document.querySelectorAll('.seat');
        isMouseDown = false;
        const { x, y } = getPosition($event);
        const endX = x;
        const endY = y;
        const minX = Math.min(startX, endX);
        const minY = Math.min(startY, endY);
        const maxX = Math.max(startX, endX);
        const maxY = Math.max(startY, endY);
        console.log(minX, minY, maxX, maxY);
        selectedSeats = [...rememberSelectedSeats];
        const seatElements = document.querySelectorAll('.seat');
        const rootRect = $el.getBoundingClientRect();
        seatElements.forEach((seat, index) => {
          const rect = seat.getBoundingClientRect();
          const rectLeft = rect.left - rootRect.left;
            const rectRight = rect.right - rootRect.left;
            const rectTop = rect.top - rootRect.top;
            const rectBottom = rect.bottom - rootRect.top;
          if (
            rectLeft < maxX &&
            rectRight > minX &&
            rectTop < maxY &&
            rectBottom  > minY
          ) {
            const row = Math.floor(index / data.ChieuRong);
            const col = index % data.ChieuRong;
            seat.style.backgroundColor = seat.getAttribute('bg-select');
            selectedSeats.push(seat.getAttribute('index'));
          }
        });
        document.querySelectorAll('.rect').forEach((rect) => {
          $el.removeChild(rect);
        });
        currentRect = null;
        " x-init="
            document.addEventListener('keydown', (event) => {
                if (event.key === 'Control') {
                    isHoldCtrl = true;
                }
            });
            document.addEventListener('keyup', (event) => {
                if (event.key === 'Control') {
                    isHoldCtrl = false;
                }
            });
        " x-on:contextmenu.prevent="
            $refs.contextMenu.classList.toggle('tw-hidden');
            const { x, y } = getPosition($event);
            $refs.contextMenu.style.left = x + 'px';
            $refs.contextMenu.style.top = y + 'px';
         ">

                <ul x-ref="contextMenu"
                    class="tw-menu tw-shadow-lg tw-hidden tw-z-50 tw-absolute tw-bg-base-200 tw-min-w-60 tw-rounded-box">

                    <template x-for="item in seatTypes" :key="item.MaLoaiGhe">
                        <li x-on:click="
                            listCells =  listCells.map((cell, index) => {
                            if (selectedSeats.includes(index.toString())) {
                                return {
                                    ...cell,
                                    ...item,
                                }
                            }
                            return cell;
                        });
                        $nextTick(() => {
                            selectedSeats = [];
                            $refs.contextMenu.classList.add('tw-hidden');
                            console.log( listCells);
                        });
                        "><a class='tw-flex tw-items-center'>
                                <span :style="'background-color: ' + item.Mau" class='tw-w-5 tw-h-5 tw-rounded-md'>

                                </span> <span class='tw-grow' x-text="`Đặt thành ${item.TenLoaiGhe}`"></span>
                            </a></li>
                    </template>
                </ul>
                <div class='tw-w-full tw-flex tw-justify-center'>
                    <div
                        class='tw-w-[300px] tw-h-20 tw-bg-gray-200 tw-rounded-md tw-flex tw-justify-center tw-items-center'>
                        <p class='tw-text-lg tw-font-semibold'>Màn hình</p>
                    </div>
                </div>
                <div class='tw-w-full'>
                    <div class='tw-grid  tw-mx-auto' x-data="{ getRoomName: (value)=>{
            if(value.MaLoaiGhe === 0){
              return ''
            }
            const index= value.index
            const alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
            const row = Math.floor(index / data.ChieuRong)
            const col = index % data.ChieuRong
            return alphabet[row] + (col + 1)
          }}" x-init="
         
          const cal= (value)=>{

            value.width = parseInt(value.width)
            value.height = parseInt(value.height)
            const tempCells = Array.from({length: value.width * value.height}, (_, index) => {
              return {
                ...emptySeat,
                index: index,
              }
            })
            listCells = tempCells   
          const SEAT_SIZE = 40;
          const SEAT_GAP = 5;
          const roomWidth = value.width * SEAT_SIZE + (value.width + 1) * SEAT_GAP;
          const roomHeight = value.height * SEAT_SIZE + (value.height + 1) * SEAT_GAP;
          $el.style.width = roomWidth + 'px';
         
          $el.style.height = roomHeight + 'px';
          $el.style.gridTemplateColumns = `repeat(${value.width}, ${SEAT_SIZE}px)`;
          $el.style.gap = SEAT_GAP + 'px';
          $el.style.padding = SEAT_GAP + 'px';
          }
        $watch('data.ChieuDai', (value)=>{
          cal({
            width: data.ChieuRong,
            height: data.ChieuDai
          })
        })
        $watch('data.ChieuRong', (value)=>{
          cal({
            width: data.ChieuRong,
            height: data.ChieuDai
          })
        })
      ">
                        <template x-for="cell in listCells" :key="cell.index">
                            <div :index="cell.index" :bg-select="cell.MauSelect" :bg-normal="cell.Mau" :class="cell.Mau"
                                :style="'background-color: ' + cell.Mau"
                                class=" seat tw-flex tw-text-white tw-cursor-pointer tw-justify-center tw-items-center  tw-seat tw-h-10 tw-w-10 tw-rounded"
                                x-text="getRoomName(cell)"></div>
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinycolor/1.6.0/tinycolor.min.js">

</script>
<script>
// seattype object
//     MaLoaiGhe	int
// TenLoaiGhe	
// MoTa	
// GiaVe	
// Dai	 row span
// Rong	 col span 
// Mau ->hex color
const emptySeat = {
    MaLoaiGhe: 0,
    TenLoaiGhe: 'Trống',
    MoTa: 'Trống',
    GiaVe: 0,
    Dai: 1,
    Rong: 1,
    Mau: '#525252',
    MauSelect: darkerColor('#525252')
}
var temp = <?= json_encode($seatTypes) ?>;

const seatTypes = [...temp, emptySeat].map((item) => {
    return {
        ...item,
        MauSelect: darkerColor(item.Mau)
    }
})

function darkerColor(color) {
    return tinycolor(color).darken(30).toString();
}
</script>
<?php

require ('app/views/admin/footer.php');
?>