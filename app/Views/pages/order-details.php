<style>
    body{
        background: linear-gradient(to bottom, #FFFFFF, #5C6AC4);
        min-height: 100vh
    }
    .text-gray{
        color: #aaa
    }
    img{
        height: 170px;
        width: 140px
    }
</style>


<div class="container py-5">
    <div class="row text-center text-black mb-5">
        <div class="col-lg-7 mx-auto">
            <h1 class="display-4">Product List</h1>
            <a href="<?php echo BASE_URL . "orders"; ?>">Return</a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <!-- List group-->
            <ul class="list-group shadow">


            <?php foreach ($orders as $data):?>
                <!-- list group item-->
                <li class="list-group-item">
                    <!-- Custom content-->
                    <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                        <div class="media-body order-2 order-lg-1">
                            <h5 class="mt-0 font-weight-bold mb-2"><?php echo $data["product_title"];?></h5>
                            <p class="font-italic text-muted mb-0 small"><?php echo $data["product_category"];?></p>
                            <div class="d-flex align-items-center justify-content-between mt-1">
                                <h6 class="font-weight-bold my-2"><?php echo $data["order_details_price"];?></h6>
                            </div>
                        </div>
                        <img src="<?php echo BASE_URL . $data["product_image1"];?>" alt="Generic placeholder image" style="width:200px;height:300px"  class="ml-lg-5 order-1 order-lg-2">
                    </div> <!-- End -->
                </li> <!-- End -->

            <?php endforeach; ?>

            <li class="list-group-item">
                <!-- Custom content-->
                <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                    <div class="media-body order-2 order-lg-1">
                        <h1 class="text-center">Summary</h1>
                        <h4>Order # <span class="float-right"><?php echo $data["order_id"]; ?></span></h4>
                        <h4>Subtotal <span class="float-right"><?php echo $data["subtotal"]; ?></span></h4>
                        <h4>Total <span class="float-right"><?php echo $data["total"]; ?></span></h4>
                    </div>
                </div>
            </li>
                        
            

            </ul> <!-- End -->
        </div>
    </div>
</div>