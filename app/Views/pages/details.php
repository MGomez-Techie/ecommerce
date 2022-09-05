<div class="container my-5">
    <div class="row">

        
        <div class="col-md-3">
            
            <img class="img-fluid" src="<?php echo BASE_URL . $data["product_image1"]; ?>" alt="">
        </div>
        <div class="col-md-9">

            <span><?php echo $data["product_category"]; ?></span>
            <h3><?php echo $data["product_title"]; ?></h3>
            <h3>$<?php echo $data["product_price"]; ?></h3>

            <form action="<?php echo BASE_URL . "details/$id"; ?>" method="post">
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <input name="cart_quantity" value="1" type="number" class="form-control" id="usr">
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="d-flex flex-row">
                            <button name="add_to_cart" class="btn btn-primary">Add to cart</button>
                            <button name="add_to_wishlist" class="btn btn-default"><i class = "fa fa-heart"></i></button>
                        </div>
                    </div>
                </div>
            </form>

            <div class="row">
                <div class="col-md-12">
                    <p>About this product</p>
                    <p><?php echo $data["product_description"]; ?></p>
                </div>
            </div>






        </div>
    </div>
</div>