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
    width: 100%;
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
    background: #fc5c65;
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
    background: #eb3b5a;
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
.product-grid .add-to-cart{
    color: #fff;
    background-color: #fc5c65;
    font-size: 18px;
    font-weight: 700;
    text-align: center;
    width: 75%;
    padding: 10px 0;
    margin: 0 auto;
    border-radius: 4px;
    opacity: 0;
    position: absolute;
    left: 0;
    bottom: 0;
    right: 0;
    z-index: 1;
    transition: 0.5s ease 0s;
}
.product-grid:hover .add-to-cart{ opacity: 1; }
.product-grid .add-to-cart:hover{
    color: #fff;
    background: #eb3b5a;
}
.product-grid .add-to-cart:before,
.product-grid .add-to-cart:after{
    content: attr(data-tip);
    color: #fff;
    background-color: #282828;
    font-size: 12px;
    font-weight: 400;
    text-transform: capitalize;
    line-height: 22px;
    padding: 5px 10px;
    white-space: nowrap;
    display: none;
    transform: translateX(-50%);
    position: absolute;
    left: 50%;
    top: -43px;
}
.product-grid .add-to-cart:after{
    content: '';
    height: 15px;
    width: 15px;
    padding: 0;
    transform: translateX(-50%) rotate(45deg);
    top: -23px;
    z-index: -1;
}
.product-grid .add-to-cart:hover:before,
.product-grid .add-to-cart:hover:after{
    display: block;
}
.product-grid .product-content{
    text-align: center;
    padding: 15px;
}
.product-grid .price{
    color: #fc5c65;
    font-size: 18px;
    font-weight: 500;
    margin-bottom: 15px;
}
.product-grid .price span{
    color: #929292;
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

<div class="container">
    <div class="row">

<?php foreach ($product_details as $data): 
    $link = BASE_URL . "details/{$data["product_id"]}";
    ?>
    
      <div class="col-md-3 col-sm-6">
        <div class="product-grid">
          <div class="product-image">
              <a href="<?php echo $link;?>" class="image">
                <img class="pic-1" src="<?php echo BASE_URL . $data["product_image1"];?>">
                <img class="pic-2" src="<?php echo BASE_URL . $data["product_image2"];?>">
              </a>
              <ul class="social">
                  <li><a href="#" data-tip="Add to Wishlist"><i class="fa fa-heart"></i></a></li>
                  <li><a href="#" data-tip="Compare"><i class="fas fa-random"></i></a></li>
                  <li><a href="#" data-tip="Quick View"><i class="fa fa-eye"></i></a></li>
              </ul>
              <a class="add-to-cart" href="#" data-tip="Add to cart">ADD TO CART</a>
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