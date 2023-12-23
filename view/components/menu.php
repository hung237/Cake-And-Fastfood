<div class="container" style="margin-top: 120px;">
    <div class="menu-page">
        <!-- <div class="col3 menu-left">
            <div class="items-left">
                <div class="title">
                    <span>CATEGORY</span>
                </div>
                <a href="index.php?act=menu&kind=Cracker">
                    <div class="child">
                        <div class="child-img"><img src="./view/assets/image/icons8-hamburger-100.png" alt="" width="50px" style="margin-right: 16px;"></div>
                        <div class="child-name"><span>Crackers</span></div>
                    </div>
                </a>
                <a href="index.php?act=menu&kind=Cake">
                    <div class="child background-yellow4">
                        <div class="child-img"><img src="./view/assets/image/icons8-cake-100.png" alt="" width="50px" style="margin-right: 16px;"></div>
                        <div class="child-name"><span>Cake</span></div>
                    </div>
                </a>
                <a href="index.php?act=menu&kind=Drink">
                    <div class="child">
                        <div class="child-img"><img src="./view/assets/image/icons8-soda-100.png" alt="" width="50px" style="margin-right: 16px;"></div>
                        <div class="child-name"><span>Drink</span></div>
                    </div>
                </a>
                <a href="index.php?act=menu&kind=Cream">
                    <div class="child background-yellow4">
                        <div class="child-img"><img src="./view/assets/image/icons8-cream-100.png" alt="" width="50px" style="margin-right: 16px;"></div>
                        <div class="child-name"><span>Cream</span></div>
                    </div>
                </a>
            </div>
            <div class="items-left">
                <div class="video">
                    <video width="100%" controls autoplay>
                        <source src="./view/assets/image/menu-video.mp4" type="video/mp4">
                    </video>
                </div>
                <div class="video-des">
                    <p>The space is covered with the aroma of freshly beaten dough, freshly baked cakes, fresh cream, etc. The bakery is a place where many people send their dreams and goals in life.

                        A pastry chef is simply understood as a person who directly creates delicious cakes. Bakery chefs can work in Restaurants - Hotels, specialized bakeries or can manage their own shops.</p>
                </div>
            </div>
        </div> -->
        <div class="title-icon text-center">
            <h2>Menu</h2>
        </div>
        <div class="menu-title margin-top-40px margin-top-24px">
            <div class="menu-title-left">
                <div class="nav-category" id="nav-category">
                    <li class="category">Category <button id="btn-showmenu" onclick="showmenu()"><i class="ti-angle-down"></i></button></li>
                    
                    <li><a href="index.php?act=menu&kind=Cracker">
                        <div class="list-category-items">Cracker</div>
                    </a></li>
                    <li><a href="index.php?act=menu&kind=Cake">
                        <div class="list-category-items">Cake</div>
                    </a></li>
                    <li><a href="index.php?act=menu&kind=Drink">
                        <div class="list-category-items">Drink</div>
                    </a></li>
                    <li><a href="index.php?act=menu&kind=Cream">
                        <div class="list-category-items">Cream</div>
                    </a></li>
                    
                </div>
                <div class="search">
                    <input type="text" placeholder="Search...">
                    <div class="search-icon"><i class="ti-search"></i></div>
                </div>
            </div>
            <div class="menu-title-right">
                <div class="filter">
                    <p>Default sorting</p>
                    <i class="ti-angle-down"></i>
                </div>
            </div>
        </div>
        <div class=" menu-right">
            <div class="col12 container-items-right text-center">

                <?php
                $item_per_page =  8;
                $kind = !empty($_GET['kind']) ? $_GET['kind'] : "all";
                $current_page = !empty($_GET['page']) ? $_GET['page'] : 1;
                $offset = ($current_page - 1) * $item_per_page;
                $menus = listItemsMenus($item_per_page, $offset);

                $totalItem = totalItem();
                $totalPage  = ceil($totalItem / $item_per_page);
                if ($kind == 'all') {
                    foreach ($menus as $item) {
                        echo '
                        <div class="items-right margin-top ">
                        <div class="items-right-img">
                            <img src="../view/assets/image/' . $item['kind'] . '/' . $item['image'] . '" alt="" width="100%">
                        </div>
                        <div class="name-product margin-bot-16px"><span>' . $item['product_name'] . '</span></div>
                        <div class="css-border">
                            <span class="margin-top">' . $item['des'] . '</span>
                            <div class="bot-items">
                                <div class="cost"><span>$' . $item['price'] . '.00</span></div>
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
                                    <button onclick="addToCart('.$item['product_id'].')"><i class="ti ti-shopping-cart"></i>Add to cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                        ';
                    }
                } else {
                    $totalItem = totalItemOfKind($kind);
                    $totalPage  = ceil($totalItem / $item_per_page);
                    $menusOfKind = listItemsMenusKind($item_per_page, $offset,$kind);
                    foreach ($menusOfKind as $item) {
                            echo '
                                    <div class="items-right margin-top">
                                    <div class="items-right-img">
                                        <img src="../view/assets/image/' . $item['kind'] . '/' . $item['image'] . '" alt="" width="100%">
                                    </div>
                                    <div class="name-product margin-bot-16px"><span>' . $item['product_name'] . '</span></div>
                                    <div class="css-border">
                                        <span class="margin-top">' . $item['des'] . '</span>
                                        <div class="bot-items">
                                            <div class="cost"><span>$' . $item['price'] . '.00</span></div>
                                            <div class="icon"><img src="./view/assets/image/heart-yellow.png" alt="" width="28px"></div>
                                        </div>
                                    </div>
                                    <div class="slide">
                                        <div class="btn-slide">
                                            <a href="">
                                                <div class="btn-slide-items">
                                                    <i class="ti ti-eye"></i>
                                                    <span>View product</span>
                                                </div>
                                            </a>
                                            <br>
                                            <div class="btn-slide-items">
                                                <button onclick="addToCart('.$item['product_id'].')"><i class="ti ti-shopping-cart"></i>Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        ';
                        }
                    }
                
                ?>


            </div>
            <div class="page">
                <?php
                if ($kind == 'all') {
                    if ($current_page > 1) {
                        echo '
                            <a class="pagination" href="index.php?act=menu&page=' . ($current_page - 1) . '"><</a>
                            ';
                    }
                    for ($i = 1; $i <= $totalPage; $i++) {
                        if ($i != $current_page) {
                            echo '
                                    <a class="pagination" href="index.php?act=menu&page=' . $i . '">' . $i . '</a>
                                ';
                        } else echo '
                                    <strong class="current-page">' . $i . '</strong>
                                ';
                    }
                    if ($current_page < $totalPage) {
                        echo '
                            <a class="pagination" href="index.php?act=menu&page=' . ($current_page + 1) . '">></a>
                            ';
                    }
                } else {
                    if ($current_page > 1) {
                        echo '
                            <a class="pagination" href="index.php?act=menu&kind=' . $kind . '&page=' . ($current_page - 1) . '"><</a>
                            ';
                    }
                    for ($i = 1; $i <= $totalPage; $i++) {
                        if ($i != $current_page) {
                            echo '
                                    <a class="pagination" href="index.php?act=menu&kind=' . $kind . '&page=' . $i . '">' . $i . '</a>
                                ';
                        } else echo '
                                    <strong class="current-page">' . $i . '</strong>
                                ';
                    }
                    if ($current_page < $totalPage) {
                        echo '
                            <a class="pagination" href="index.php?act=menu&kind=' . $kind . '&page=' . ($current_page + 1) . '">></a>
                            ';
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>
<script>
    let nav = document.getElementById('nav-category');
    let showmenu = document.getElementById('showmenu');
    function showmenu(){
        alert('fasfsa');
        var isClose = nav.clientHeight === hi;
        if(isClose){
            nav.style.height = 'auto';
        }
        else {
            nav.style.height = "50px";
        } 
    }


        // Tự động đóng sau khi con 1 item trong menu
        var menuItems = document.querySelectorAll('.nav-category li');
        for(var i=0; i<menuItems.length; i++){
            var menuItem = menuItems[i];
            menuItem.onclick = function(){
                header.style.height = "50px";
            }
        }

    function slideNext(){
    let list = document.querySelectorAll('.banner-img-items');
    document.getElementById('silde').appendChild(list[0]);
    }

</script>