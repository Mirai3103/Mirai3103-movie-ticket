 <div class=' gap-x-14 flex-col lg:flex-row  text-xl gap-y-8 hidden' x-init="
 $el.classList.remove('hidden');
 $el.classList.add('flex');
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
     <div class='basis-2/5 grow-0  lg:shrink-0  flex flex-col  gap-4 lg:text-xl'>
         <div class='mt-16 flex flex-col gap-4'>
             <div class="block -mb-1 font-bold  text-gray-700">
                 Phương thức thanh toán
             </div>
             <div class="">
                 <label class="checkout-button  border-secondary border-3" for="<?= PaymentType::Momo->value ?>">
                     <div class="checkout-selector">
                         <input x-model="data.payment_method" id="<?= PaymentType::Momo->value ?>" type="radio" class="btn btn-m2 btn-checkout btn-logo-inline" name="payment-method" value="<?php echo PaymentType::Momo->value ?>">
                     </div>
                     <div class="content" style="  display: flex;
  align-items: center;">
                         <span class="checkout-title">
                             Thanh toán bằng
                         </span>
                         <img src="https://developers.momo.vn/v2/images/logo.svg" />
                     </div>
                 </label>
             </div>
             <div>
                 <label class="checkout-button  border-secondary border-3" for="<?= PaymentType::ZaloPay->value ?>">
                     <div class="checkout-selector">
                         <input x-model="data.payment_method" id="<?= PaymentType::ZaloPay->value ?>" type="radio" class="btn btn-m2 btn-checkout btn-logo-inline" name="payment-method" value="<?php echo PaymentType::ZaloPay->value ?>">
                     </div>
                     <div class="content" style="  display: flex;
  align-items: center;">
                         <span class="checkout-title">
                             Thanh toán bằng
                         </span>
                         <img src="https://play-lh.googleusercontent.com/MXoXRQvKYcPzk0AITb6nVJUxZMaWYESXar_HwK8KXbGMboZPQjcwVBcVtXlpOkfD7PM" />
                     </div>
                 </label>
             </div>
         </div>
         <div>
             <label for="discount" class="block  font-bold  text-gray-700">
                 Mã giảm giá
             </label>
             <input x-on:focus="errors.discount = ''" x-model="data.discount" type="text" name="discount" id="discount" class="mt-1 px-4 w-full py-2 border-3  hover:border-[#0c131d]  border-[#1B2D44]" placeholder="Nhập mã giảm giá">
         </div>
         <div class="flex justify-center">
             <button x-on:click="if (validate()) { 
                fetch('', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(data)
                }).then(response => response.json())
                .then(data => {
                    console.log('Success:', data);
                })
              } " class=' px-12 py-2 flex justify-center items-center bg-primary text-secondary rounded-md'>
                 Tiếp tục
             </button>
         </div>
     </div>
     <div class="grow">
         <div class='bg-[#045174]  p-6 min-h-28 border-2  text-white border-primary'>
             <div class="p-1 flex flex-col gap-y-1">
                 <h3 class="uppercase text-primary text-2xl sm:text-3xl font-bold">
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
                 <div class='flex flex-wrap gap-x-4'>
                     <div class='basis-1/4'>Phòng chiếu</div>
                     <div class='basis-1/4'>Số vé</div>
                     <div class='basis-1/4'>Loại vé</div>
                     <div class='basis-1/4'>Phòng chiếu</div>
                     <div class='basis-1/4'>Số vé</div>
                     <div class='basis-1/4'>Loại vé</div>
                 </div>
                 <h4>
                     Ghế
                 </h4>
                 <h4>
                     Bắp nước
                 </h4>
             </div>
             <div class=' border-b-4 my-4 border-white border-dashed'></div>
             <div class='flex p-4 text-2xl sm:text-3xl justify-between'>
                 <h2>
                     Số tiền cần thanh toán
                 </h2>
                 <div class='text-primary'>
                     100.000đ
                 </div>
             </div>
             <div class='flex px-4  text-xl sm:text-2xl justify-between'>
                 <h2>
                     Giảm giá
                 </h2>
                 <div class='text-primary'>
                     100.000đ
                 </div>
             </div>
             <div class='flex px-4 py-4 text-2xl sm:text-3xl justify-between'>
                 <h2>
                     Tổng thanh toán
                 </h2>
                 <div class='text-primary'>
                     100.000đ
                 </div>
             </div>
         </div>
     </div>
 </div>