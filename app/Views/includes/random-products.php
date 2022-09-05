<style>
  .product-grid{
    font-family: 'Rubik', sans-serif;
    border: 2px solid #fff;
    border-radius: 5px;
    overflow: hidden;
    transition: all 0.5s;
}
.product-grid:hover{ border-color: #ebebeb; }
.product-grid .product-image{ position: relative; }
.product-grid .product-image a.image{ display: block; }
.product-grid .product-image img{
    width: auto;
    height: auto;
}
.product-image .pic-1{
    backface-visibility: hidden;
    transition: all 0.5s;
}
.product-grid .product-image:hover .pic-1{ opacity: 0; }
.product-image .pic-2{
    width: 100%;
    height: 100%;
    backface-visibility: hidden;
    opacity: 0;
    position: absolute;
    top: 0;
    left: 0;
    transition: all 0.5s;
}
.product-grid:hover .product-image .pic-2{ opacity: 1; }
.product-grid .product-sale-label{
    color: #fff;
    background: #62ab00;
    font-size: 13px;
    text-transform: capitalize;
    text-align: center;
    line-height: 50px;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    position: absolute;
    top: 10px;
    right: 10px;
}
.product-grid .social{
    padding: 0;
    margin: 0;
    list-style: none;
    opacity: 0;
    position: absolute;
    top: 10px;
    left: 10px;
}
.product-grid:hover .social{ opacity: 1; }
.product-grid .social li a{
    color: #fff;
    background: #5c6ac4;
    font-size: 15px;
    text-align: center;
    line-height: 35px;
    height: 34px;
    width: 34px;
    margin: 0 0 10px;
    border-radius: 50px;
    display: block;
    position: relative;
    z-index: 1;
    transition: all 200ms ease 0s;
}
.product-grid .social li a:hover{
    color: #fff;
    background: #8e9bed;
}
.product-grid .social li a:before,
.product-grid .social li a:after{
    content: attr(data-tip);
    color: #fff;
    background-color: #333;
    font-size: 12px;
    line-height: 22px;
    padding: 5px 10px;
    white-space: nowrap;
    display: none;
    transform: translateY(-50%);
    position: absolute;
    left: 48px;
    top: 50%;
}
.product-grid .social li a:after{
    content: '';
    height: 15px;
    width: 15px;
    padding: 0;
    transform: translateY(-50%) rotate(45deg);
    left: 47px;
    z-index: -1;
}
.product-grid .social li a:hover:before,
.product-grid .social li a:hover:after{
    display: block;
}

.product-grid .product-content{
    text-align: center;
    padding: 15px;
}
.product-grid .price{
    color: #5c6ac4;
    font-size: 18px;
    font-weight: 500;
    margin-bottom: 15px;
}
.product-grid .price span{
    color: #5c6ac4;
    font-size: 16px;
    text-decoration: line-through;
    margin-right: 7px;
    display: inline-block;
}
.product-grid .title{
    font-size: 16px;
    text-transform: capitalize;
    margin: 0 0 7px;
}
.product-grid .title a{
    color: #333;
    transition: all 500ms;
}
.product-grid .title a:hover{
    color: #fc5c65;
    text-decoration: underline;
}
@media only screen and (max-width:990px){
    .product-grid{ margin: 0 0 40px; }
}
</style>

<style>
    /* Rounded border */
hr.rounded {
  border-top: 8px solid #bbb;
  border-radius: 5px;
}
</style>

<div class="container">
    <hr class="rounded">
    <h3 class="text-center">Other Products People Buy</h3>
    <br>
    <div class="row">
        <?php 
        $product_details = $product_object->getRandomProducts();
        foreach ($product_details as $data): 
            $link = BASE_URL . "details/{$data["product_id"]}";
            ?>
            
            <div class="col-md-3 col-sm-6">
                <div class="product-grid">
                <div class="product-image">
                    <a href="<?php echo $link;?>" class="image">
                        <img class="pic-1" src="<?php echo BASE_URL . $data["product_image1"];?>" style="width:125px;height:258px;">
                        <img class="pic-2" src="<?php echo BASE_URL . $data["product_image2"];?>" style="width:125px;height:258px;">
                    </a>   
                </div>
                    <div class="product-content">
                    <div class="price">$<?php echo $data["product_price"];?></div>
                    <h3 class="title"><a href="<?php echo $link;?>"><?php echo $data["product_title"];?></a></h3>
                    </div>
                </div>
            </div>
            
        <?php endforeach; ?>
    
    </div>
</div>