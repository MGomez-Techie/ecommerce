<div class="row">
    <div class="col-md-12">
        <p>Redeem points</p>
        <form action="checkout" method="post">
            <select name="points" id="points">
                <option value="0">Reset</option>
                <option value="100">$5 off - 100 Points</option>
                <option value="200">$10 off - 200 Points</option>
                <option value="500">$25 off - 500 Points</option>
                <option value="1000">$50 off - 1000 Points</option>
                <option value="2000">$100 off - 2000 Points</option>
                <option value="4000">$200 off - 4000 Points</option>
                <option value="10000">$500 off - 10000 Points</option>
            </select>
            <button name="points_btn" type="submit" class="btn btn-primary btn-block">Redeem</button>
        </form>
        <ul>
            <li>Current Points: <?php echo $cart_object->getUserTotalPoints(); ?></li>
            <li>Points being used: <?php echo $cart_object->getPointsUsed(); ?></li>
            <li>Points Discount: $<?php echo $cart_object->getPointsDiscountAmount(); ?></li>
            <li>Points Gained: <?php echo $cart_object->getPointsGained(); ?></li>
        </ul>
    </div>
</div>