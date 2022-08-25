<div class="card p-2 my-3">
    <div class="row">
        <div class="col-md-3">
            <form action="templates" method="get">         
                <div class="input-group">
                    <div class="input-group-prepend">                    
                        <select name="category" class="form-control" id="category">
                            <option value="0">Select Category</option>
                            <?php 
                            $categories = $product_object->getAllCategories();
                            foreach ($categories as $category):
                            ?>
                            <option><?php echo $category["product_category"]; ?></option>
                            <?php endforeach; ?>
                        </select>                        
                    </div>
                    <button class="btn btn-default"><i class="fas fa-check"></i></button>
                </div>
            </form>
        </div>
        <div class="col-md-3">
            <form action="templates" method="get">         
                <div class="input-group">
                    <div class="input-group-prepend">                    
                        <select name="min_price" class="form-control" id="min_price">
                            <option value="0">Select Min Price</option>
                            <option value="500">$500</option>
                            <option value="1000">$1000</option>
                            <option value="1500">$1500</option>
                            <option value="2000">$2000</option>
                        </select>                        
                    </div>
                    <button class="btn btn-default"><i class="fas fa-check"></i></button>
                </div>
            </form>
        </div>
        <div class="col-md-3">
            <form action="templates" method="get">         
                <div class="input-group">
                    <div class="input-group-prepend">                    
                        <select name="max_price" class="form-control" id="min_price">
                            <option value="0">Select Max Price</option>
                            <option value="500">$500</option>
                            <option value="1000">$1000</option>
                            <option value="1500">$1500</option>
                            <option value="2000">$2000</option>
                        </select>                        
                    </div>
                    <button class="btn btn-default"><i class="fas fa-check"></i></button>
                </div>
            </form>
        </div>
        <div class="col-md-3">
            <form action="templates" method="get">         
                <div class="input-group">
                    <div class="input-group-prepend">                    
                        <select name="order" class="form-control" id="order">
                            <option value="0">Order By</option>
                            <option value="order-title">Product Title (A-Z)</option>
                            <option value="order-title-desc">Product Title (Z-A)</option>
                            <option value="order-price">Price (Low to High)</option>
                            <option value="order-price-desc">Price (High to Low)</option>
                        </select>                        
                    </div>
                    <button class="btn btn-default"><i class="fas fa-check"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>