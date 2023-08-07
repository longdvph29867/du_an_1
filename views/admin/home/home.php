<div>
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h3 class="text-gray-800">Thống kê</h3>
        <form action="" method="GET" id="filterThongKe">
            <select onchange="submitFormFilterThongKe()" name="filter" class="px-2 py-1 border min-w-[180px] rounded mr-[2px] outline-none" >
            <option value="all">Tât cả</option>
            <?php
                foreach($danh_sach_thang as $thang) {
            ?>
                <option  <?php if(isset($_GET['filter']) && $_GET['filter'] == $thang) echo 'selected';?>  value="<?=$thang?>">Tháng <?=$thang?></option>
            <?php
            }
            ?>
            </select>
        </form>
    </div>
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class=" bg-white shadow px-3 py-4 rounded-md" style="border-left: 4px solid #4e73df;">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <p class="m-0 text-primary text-sm font-weight-bold">Tổng đơn hàng</p>
                        <h4 class=" font-weight-bold"><?=$tongDonHang?></h4>
                    </div>
                    <div>
                        <i class="fa-solid fa-file fa-2x text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class=" bg-white shadow px-3 py-4 rounded-md" style="border-left: 4px solid #1cc88a;">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <p class="m-0 text-success text-sm font-weight-bold">Doanh số</p>
                        <h4 class=" font-weight-bold"><?=number_format($tongDoanhSo,0,'.',',')?></h4>
                    </div>
                    <div class="text-success" style="font-size: 38px;">
                        ₫
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class=" bg-white shadow px-3 py-4 rounded-md" style="border-left: 4px solid #36b9cc;">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <p class="m-0 text-sm font-weight-bold" style="color: #36b9cc;">Lượt đánh giá</p>
                        <h4 class=" font-weight-bold"><?=$tongDanhGia?></h4>
                    </div>
                    <div>
                    <i class="fa-solid fa-face-smile fa-2x" style="color: #36b9cc;"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class=" bg-white shadow px-3 py-4 rounded-md" style="border-left: 4px solid #f6c23e;">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <p class="m-0 text-warning text-sm font-weight-bold">Lượt bình luận</p>
                        <h4 class=" font-weight-bold"><?=$tongBinhLuan?></h4>
                    </div>
                    <div>
                    <i class="fa-solid fa-comment fa-2x text-warning"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-8 col-lg-7">
        <!-- Area Chart -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Doanh số 6 tháng gần nhất</h6>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAreaChart"></canvas>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4" style="min-height: 447px;">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tỷ lệ hàng hoá theo loại</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4">
                        <canvas id="myPieChart"></canvas>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
    
</div>