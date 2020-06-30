    <!-- Category Query -->
    <?php 
    $categories = run_query("select * FROM categories;"); 
    $row = $categories -> fetch_array(MYSQLI_NUM);
    $count = 1;
    ?>
    <!-- Main content -->
    <div class="container">
        <div class="row">
            <!-- Category side -->
            <div class="col-md-3">
                <div class="sidebar">

                    <!--widget-category-->
                    <div class="widget widget-shop-category">
                        <h3>Categories</h3>
                        <ul>
                            <?php
                                    foreach($categories as $category):
                                        if($count == 1){
                                            echo
                                            '<li>
                                                <button id="'.$category["name"].'" class="text_category active">
                                                    <img class="icon_category" src="assets/icon/'.$category["icon"].'" alt="" srcset="">
                                                    '.$category["name"].'
                                                </button>
                                            </li>';
                                        }else{
                                            echo
                                            '<li>
                                                <button id="'.$category["name"].'" class="text_category">
                                                    <img class="icon_category" src="assets/icon/'.$category["icon"].'" alt="" srcset="">
                                                    '.$category["name"].'
                                                </button>
                                            </li>';
                                        }
                                    
                                        $count++;
                                    endforeach;
                                ?>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Product side -->
            <div class="col-md-9">
                <div  class="xv-product-slides grid-view products" data-thumbnail="figure .xv-superimage" data-product=".xv-product-unit">
                    <div class="row" id="item">
                        <?php
                            
                            // $product = 'select * from products where category_id  = 1';
                            $product = 'select pro.*, ass.resource_path from products as pro join assets as ass on pro.id = ass.product_id where pro.category_id = 1 limit 3;';
                            $items = run_query($product);
                            
                            foreach($items as $item):
                                
                                echo '
                                <div class="xv-product-unit ">
                                    <div class="xv-product mb-15 mt-15 paper-block">
                                        <figure class="product">
                                            <div class="discount">
                                               - '.$item["discount"].'%
                                            </div>
                                            <a href="#"><img class="xv-superimage" src="'.$item["resource_path"].'" alt="assets/img/demo/d1.jpg"/></a>
                                            <figcaption>

                                                <form action="product.php" method="post" class="style1">
                                                    <div class="style1">
                                                    <input type="hidden" name="product_id" value="'.$item["id"].'">
                                                    <button style="margin-top:60px;" class="btn-cart btn-square btn-blue" type="submit"><i class="icon icon-expand"></i></button>
                                                    </div>
                                                </form>

                                            </figcaption>
                                        </figure>
                                        <div class="xv-product-content">
                                            <h3><a href="detail1.html">'.$item["name"].'</a></h3>
                                            <p>'.$item["description"].'</p>
                                            <ul class="color-opt">
                                                '.$item["description"].'
                                            </ul>
                                            <ul class="extra-links">
                                                <li><a href="#"><i class="icon icon-heart"></i>Wishlist</a></li>
                                                <li><a href="#"><i class="icon icon-exchange"></i>Compare</a></li>
                                                <li><a href="#"><i class="icon icon-expand"></i>Expand</a></li>
                                            </ul>
                                            <!--ul-->
                                            <div class="xv-rating stars-5"></div>
                                            <span class="xv-price">'.$item["price"].'</span>
                                            <a data-qv-tab="#qvt-cart" href="#" class="product-buy flytoQuickView"><i
                                                    class="icon icon-shopping-basket" aria-hidden="true"></i></a>
                                        </div>
                                        <!--xv-product-content-->
                                    </div>
                                </div>
                                ';
                               
                            endforeach;
                            
                        ?>

                    </div>
                    <div class="col-md-12 offset-5">
                        <input type="hidden" name="" value="6" id ="number_item" >
                        <button class="btn btn-primary" id="load_more">Show more</button>
                    </div>

                </div>


            </div>
        </div>
    </div>