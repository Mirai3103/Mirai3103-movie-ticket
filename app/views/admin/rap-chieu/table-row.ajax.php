<?php foreach ($cinemas as $cinema) :?>
    <tr >
                        <th scope="row" class="col-id table-plus">
                            <?= $cinema['MaRapChieu'] ?>
                        </th>
                        <td class="col-name ps-0">
                            <div class="d-flex align-items-center">
                                <div class="tb-theater-product mr-2 flex-shrink-0">
                                    <img src="<?= $cinema['HinhAnh'] ?>"
                                     alt="" width="200" >
                                </div>
                                <div>
                                    <span class="">
                                        <?= $cinema['TenRapChieu'] ?>
                                    </span>
                                </div>
                            </div>
                        </td>
                        <td class="col-address ">
                           <div class="tw-max-w-80">
                           <?= $cinema['DiaChi'] ?>
                           </div>
                        </td>
                        <td class="col-stt">
                            <?php
                              foreach ($cinemaStatuses as $status) {
                                if ($status['MaTrangThai'] == $cinema['TrangThai']) {
                                  echo $status['Ten'];
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