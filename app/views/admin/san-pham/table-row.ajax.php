 <?php

 ?>
 <?php foreach ($products as $product): ?>
     <tr>
         <th scope="row" class="col-id table-plus">
             <?= $product['MaThucPham'] ?>
         </th>
         <td class="col-name ps-0">
             <div class="d-flex align-items-center">
                 <div class="tb-img-product mr-2 flex-shrink-0">
                     <img src="<?= $product['HinhAnh'] ?>" alt="" width="40" height="40">
                 </div>
                 <div>
                     <span class="">
                         <?= $product['TenThucPham'] ?>
                     </span>
                 </div>
             </div>
         </td>

         <td class="col-type">
             <?= $product['LoaiThucPham'] ?>
         </td>
         <td class="col-price">
             <?= number_format($product['GiaThucPham']) ?>đ
         </td>
         <td class="col-status">
             <?php
             foreach ($statuses as $status) {
                 if ($status['MaTrangThai'] == $product['TrangThai']) {
                     echo $status['Ten'];
                     break;
                 }
             }
             ?>
         </td>
         <td class="col-crud">
             <div class="dropdown position-relative">
                 <span href="" class="btn menu-crud">
                     <i class="menu-crud-icon fa-solid fa-ellipsis"></i>
                     <div class="list-item-crud position-absolute">
                         <a href="" class="item-crud">
                             <i class="fa-regular fa-eye"></i>
                             <span>Xem</span>
                         </a>
                         <a href="" class="item-crud">
                             <i class="fa-solid fa-eye-dropper"></i>
                             <span>Sửa</span>
                         </a>
                         <a href="" class="item-crud">
                             <i class="fa-solid fa-trash"></i>
                             <span>Xóa</span>
                         </a>
                     </div>
                 </span>
             </div>
         </td>
     </tr>
 <?php endforeach; ?>