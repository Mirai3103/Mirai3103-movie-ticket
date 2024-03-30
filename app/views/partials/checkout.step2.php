 <div class=' tw-gap-x-14 tw-flex-col lg:tw-flex-row  tw-text-xl tw-gap-y-8 tw-hidden' x-init="
 $el.classList.remove('tw-hidden');
 $el.classList.add('tw-flex');
 " x-show="step === 2">
     <style>
     .checkout-button {
         cursor: pointer;
         display: flex;
         align-items: center;
         padding: 5px;
         padding-left: 15px;
     }

     .checkout-button img {
         height: 50px;
         width: 50px;
         margin-left: 10px;
         padding: 5px;


     }

     .content {
         padding-left: 15px;
     }

     .content .checkout-title {
         color: #000;
         font-size: 13pt;
         font-weight: 600;
     }

     .content .description {
         color: #666
     }

     input[type="radio"]:hover {
         cursor: pointer;
     }
     </style>
     <div class='tw-basis-2/5 tw-grow-0  lg:tw-shrink-0  tw-flex tw-flex-col  tw-gap-4 lg:tw-text-xl'>
         <div class='tw-mt-16 tw-flex tw-flex-col tw-gap-4'>
             <div class="tw-block tw--mb-1 tw-font-bold  tw-text-gray-700">
                 Phương thức thanh toán
             </div>
             <div class="">
                 <label class="checkout-button  tw-border-secondary tw-border-3" for="<?= PaymentType::Momo->value ?>">
                     <div class="checkout-selector">
                         <input x-model="data.payment_method" id="<?= PaymentType::Momo->value ?>" type="radio"
                             class="btn btn-m2 btn-checkout btn-logo-inline" name="payment-method"
                             value="<?php echo PaymentType::Momo->value ?>">
                     </div>
                     <div class="content" style="  display: flex;align-items: center;">
                         <span class="checkout-title">
                             Thanh toán bằng
                         </span>
                         <img src="https://developers.momo.vn/v2/images/logo.svg" />
                     </div>
                 </label>
             </div>
             <div>
                 <label class="checkout-button  tw-border-secondary tw-border-3"
                     for="<?= PaymentType::ZaloPay->value ?>">
                     <div class="checkout-selector">
                         <input x-model="data.payment_method" id="<?= PaymentType::ZaloPay->value ?>" type="radio"
                             class="btn btn-m2 btn-checkout btn-logo-inline" name="payment-method"
                             value="<?php echo PaymentType::ZaloPay->value ?>">
                     </div>
                     <div class="content" style="  display: flex;align-items: center;">
                         <span class="checkout-title">
                             Thanh toán bằng
                         </span>
                         <img
                             src="https://play-lh.googleusercontent.com/MXoXRQvKYcPzk0AITb6nVJUxZMaWYESXar_HwK8KXbGMboZPQjcwVBcVtXlpOkfD7PM" />
                     </div>
                 </label>
             </div>
         </div>
         <div>
             <label for="discount" class="tw-block  tw-font-bold  tw-text-gray-700">
                 Mã giảm giá
             </label>
             <input x-on:focus="errors.discount = ''" x-model="data.discount" type="text" name="discount" id="discount"
                 class="tw-mt-1 tw-px-4 tw-w-full tw-py-2 tw-border-3  hover:tw-border-[#0c131d]  tw-border-[#1B2D44]"
                 placeholder="Nhập mã giảm giá">
         </div>
         <div class="tw-flex tw-justify-center">
             <button data-ripple-light="true" x-on:click="if (validate()) { 
                fetch('', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(data)
                }).then(response => response.json())
                .then(data => {
                    if(data.isRedirect){
                        window.location.href = data.redirectUrl;
                    }
                    console.log('Success:', data);
                })
              } "
                 class=' tw-px-12 tw-py-2 tw-flex tw-justify-center tw-items-center tw-bg-primary tw-text-secondary tw-rounded-md'>
                 Tiếp tục
             </button>
         </div>
     </div>
     <div class="tw-grow">
         <div class='tw-bg-[#045174]  tw-p-6 min-h-28 tw-border-2  tw-text-white tw-border-primary'>
             <div class="tw-p-1 tw-flex tw-flex-col tw-gap-y-1">
                 <h3 class="tw-uppercase tw-text-primary tw-text-2xl sm:tw-text-3xl tw-font-bold">
                     Tên phim
                 </h3>
                 <h4>
                     Tên rạp
                 </h4>
                 <h4>
                     Địa chỉ
                 </h4>
                 <h4>
                     Thời gian
                 </h4>
                 <div class='tw-flex tw-flex-wrap tw-gap-x-4'>
                     <div class='tw-basis-1/4'>Phòng chiếu</div>
                     <div class='tw-basis-1/4'>Số vé</div>
                     <div class='tw-basis-1/4'>Loại vé</div>
                     <div class='tw-basis-1/4'>Phòng chiếu</div>
                     <div class='tw-basis-1/4'>Số vé</div>
                     <div class='tw-basis-1/4'>Loại vé</div>
                 </div>
                 <h4>
                     Ghế
                 </h4>
                 <h4>
                     Bắp nước
                 </h4>
             </div>
             <div class=' tw-border-b-4 tw-my-4 tw-border-white tw-border-dashed'></div>
             <div class='tw-flex tw-p-4 tw-text-2xl sm:tw-text-3xl tw-justify-between'>
                 <h2>
                     Số tiền cần thanh toán
                 </h2>
                 <div class='tw-text-primary'>
                     100.000đ
                 </div>
             </div>
             <div class='tw-flex tw-px-4  tw-text-xl sm:tw-text-2xl tw-justify-between'>
                 <h2>
                     Giảm giá
                 </h2>
                 <div class='tw-text-primary'>
                     100.000đ
                 </div>
             </div>
             <div class='tw-flex tw-px-4 tw-py-4 tw-text-2xl sm:tw-text-3xl tw-justify-between'>
                 <h2>
                     Tổng thanh toán
                 </h2>
                 <div class='tw-text-primary'>
                     100.000đ
                 </div>
             </div>
         </div>
     </div>
 </div>