<?php
    $this_id = $_GET['id'];
    $item = showItems($this_id);
    echo'
        <div class="menu-single">
            <div class="product container-for-menusingle">
                <div class="box-product">
                    <div class="product-img">
                        <img src="./view/assets/image/'.$item[0]['kind'].'/'.$item[0]['image'].'" alt="" width="100%">
                    </div>
                    <div class="product-des">
                        <h3>English Muffins Box of 6 Red Brick Brand Cakes Vegan Cakes For Eatclean Weight Loss</h3>
                        <div class="vote">
                            <span>5.0</span>
                            <img src="../view/assets/image/starts-yellow.png" alt="" width="16px">
                            <img src="../view/assets/image/starts-yellow.png" alt="" width="16px">
                            <img src="../view/assets/image/starts-yellow.png" alt="" width="16px">
                            <img src="../view/assets/image/starts-yellow.png" alt="" width="16px">
                            <img src="../view/assets/image/starts-yellow.png" alt="" width="16px">
                        </div>
                        <div class="price margin-top">
                            <span>$'.($item[0]['price']*2).'</span>
                            <span>$'.$item[0]['price'].'</span>
                            <span>sale 50%</span>
                        </div>
                        <div class="quantity margin-top">
                            <span>Quantity:</span>
                            <div class="number">
                                <button>-</button>
                                <input type="text" value="1">
                                <button>+</button>
                            </div>
                        </div>
                        <div class="btn margin-top">
                            <button>Add to cart</button>
                            <button>Buy now</button>
                        </div>
                        <div class="vote margin-top">
                            <img src="image/heart-yellow.png" alt="" width="20px">
                            <span>Liked (205)</span>
                        </div>
                    </div>
                </div>

            </div>
            <div class="description container-for-menusingle margin-top">
                <div class="box-description">
                    <div class="description-title margin-top">
                        <span>Product details</span>
                    </div>
                    <div class="detail margin-top">
                        <div class="detail-left">
                            <span>Weight</span>
                            <span>Origin</span>
                            <span>Expiry</span>
                            <span>Special weight loss</span>
                            <span>Warehouse</span>
                            <span>Sent from</span>
                        </div>
                        <div class="detail-right">
                            <span>500g</span>
                            <span>Vietnam</span>
                            <span>1 month</span>
                            <span>Good for health</span>
                            <span>44</span>
                            <span>District 3, TP. Ho Chi Minh</span>
                        </div>
                    </div>
                    <div class="description-title margin-top">
                        <span>PRODUCT DESCRIPTION</span>
                    </div>
                    <p class="margin-top">Currently, more and more people are choosing a vegetarian diet, with the desire to purify the body, absorb healthy nutrients from natural plant sources, to improve health. English muffin bread - British style muffins from Red Brick are perfectly prepared according to a healthy, vegan recipe. Effects of vegetarian meals with English muffin bread after a series of days of high protein intake: ✓Reduce the risk of cardiovascular diseases, blood pressure ✓ Reduce the risk of overweight and obesity ✓ Improve digestive health. Exchange it with English muffin bread in the house. Weight: 500g Currently, the shop only sells Hoa Toc and the cake is always fresh every day 😘 Store in the freezer for 1 month. When eating, you can pan fry, grill or use an oil-free fryer to heat.</p>
                </div>
            </div>
            <div class="container-for-menusingle container-items-right">
                <div class="items-right margin-top">
                    <div class="items-right-img">
                        <img src="../view/assets/image/Cake/1.png" alt="" width="100%">
                    </div>
                    <div class="name-product margin-bot-16px"><span>CupCake Rainbow</span></div>
                    <div class="css-border">
                        <span class="margin-top">Currently, more and more people are choosing a vegetarian diet, with the desire to purify the body, absorb healthy nutrients from natural plant sources, to improve health. </span>
                        <div class="bot-items">
                            <div class="cost"><span>$60.00</span></div>
                            <div class="icon"><img src="./view/assets/image/heart-yellow.png" alt="" width="28px"></div>
                        </div>
                    </div>
                    <div class="slide">
                        <div class="btn-slide">
                            <a href="index.php?act=menu-single&id='.$item['product_id'].'">
                                <div class="btn-slide-items">
                                    <i class="ti ti-eye"></i>
                                    <span>View product</span>
                                </div>
                            </a>
                            <br>
                            <div class="btn-slide-items">
                                <button><i class="ti ti-shopping-cart"></i>Add to cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="items-right margin-top">
                    <div class="items-right-img">
                        <img src="../view/assets/image/Cake/1.png" alt="" width="100%">
                    </div>
                    <div class="name-product margin-bot-16px"><span>CupCake Rainbow</span></div>
                    <div class="css-border">
                        <span class="margin-top">Currently, more and more people are choosing a vegetarian diet, with the desire to purify the body, absorb healthy nutrients from natural plant sources, to improve health. </span>
                        <div class="bot-items">
                            <div class="cost"><span>$60.00</span></div>
                            <div class="icon"><img src="./view/assets/image/heart-yellow.png" alt="" width="28px"></div>
                        </div>
                    </div>
                    <div class="slide">
                        <div class="btn-slide">
                            <a href="index.php?act=menu-single&id='.$item['product_id'].'">
                                <div class="btn-slide-items">
                                    <i class="ti ti-eye"></i>
                                    <span>View product</span>
                                </div>
                            </a>
                            <br>
                            <div class="btn-slide-items">
                                <button><i class="ti ti-shopping-cart"></i>Add to cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="items-right margin-top">
                    <div class="items-right-img">
                        <img src="../view/assets/image/Cake/1.png" alt="" width="100%">
                    </div>
                    <div class="name-product margin-bot-16px"><span>CupCake Rainbow</span></div>
                    <div class="css-border">
                        <span class="margin-top">Currently, more and more people are choosing a vegetarian diet, with the desire to purify the body, absorb healthy nutrients from natural plant sources, to improve health. </span>
                        <div class="bot-items">
                            <div class="cost"><span>$60.00</span></div>
                            <div class="icon"><img src="./view/assets/image/heart-yellow.png" alt="" width="28px"></div>
                        </div>
                    </div>
                    <div class="slide">
                        <div class="btn-slide">
                            <a href="index.php?act=menu-single&id='.$item[0]['product_id'].'">
                                <div class="btn-slide-items">
                                    <i class="ti ti-eye"></i>
                                    <span>View product</span>
                                </div>
                            </a>
                            <br>
                            <div class="btn-slide-items">
                                <button><i class="ti ti-shopping-cart"></i>Add to cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    ';
?>
