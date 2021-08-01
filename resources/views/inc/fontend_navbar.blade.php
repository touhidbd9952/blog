<nav id="primary-navigation" class="site-navigation primary-navigation" role="navigation">

    <button class="menu-toggle dl-trigger">Primary Menu
      <span class="menu-line-1"></span>
      <span class="menu-line-2"></span>
      <span class="menu-line-3"></span>
    </button>
                <ul id="primary-menu" class="nav-menu styled no-responsive dl-menu">
                  
                  <?php 
                    $categories = App\Category::where('status',1)->orderBy('categoryserial','asc')->get();
                    $subcategories = App\Subcategory::where('status',1)->orderBy('catid','asc')->get();
                    $subsubcategories = App\Subsubcategory::where('status',1)->orderBy('subsubcategory_name','asc')->get(); 
                    ?>
                  @foreach($categories as $cat)
                  
                  <li id="menu-item-28421" class="features-menu menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-parent menu-item-28421 megamenu-enable megamenu-style-grid megamenu-first-element">
                  <a href="https://codex-themes.com/thegem/features/page-layout-options/">{{$cat->category_name}}</a>
                  <span  class="menu-item-parent-toggle"></span>
                  
                    <ul class="sub-menu styled megamenu-empty-left megamenu-empty-right megamenu-empty-top megamenu-empty-bottom dl-submenu" data-megamenu-columns="4"  style="padding-left:0px; padding-right:0px; padding-top:0px; padding-bottom:0px; ">
                      
                      @foreach($subcategories as $subcat)
                        @if($subcat->catid == $cat->id)
                      <li id="menu-item-20997" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-parent menu-item-20997 megamenu-first-element" style="width: 300px;" ><span
    class="megamenu-column-header"><a
    href="#" class="mega-no-link">{{$subcat->subcategory_name}}</a></span><span
    class="menu-item-parent-toggle"></span>
    
                        <ul class="sub-menu styled dl-submenu">
                          @foreach($subsubcategories as $subsubcat)
                            @if($subsubcat->catid == $cat->id && $subsubcat->subcatid == $subcat->id)
                          <li
    id="menu-item-18302" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-18302 megamenu-has-icon"><a
    href="https://codex-themes.com/thegem/features/page-layout-options/" class=" megamenu-has-icon" data-icon="&#xf181;">{{$subsubcat->subsubcategory_name}}</a>
                          </li>
                           @endif
                          @endforeach
                          
                        </ul>
                      </li>
                        @endif
                      @endforeach

                    </ul>
                  </li>
                  
                  @endforeach
                  
                  <li
    class="menu-item menu-item-search"><a
    href="#"></a>
                    <div
    class="minisearch">
                      <form
    role="search" id="searchform" class="sf" action="https://codex-themes.com/thegem/" method="GET">
                        <input
    id="searchform-input" class="sf-input" type="text" placeholder="Search..." name="s">
                        <span
    class="sf-submit-icon"></span>
                        <input
    id="searchform-submit" class="sf-submit" type="submit" value="">
                      </form>
                    </div>
                  </li>
                  <li
    class="menu-item menu-item-cart not-dlmenu"><a
    href="https://codex-themes.com/thegem/cart/" class="minicart-menu-link "><span
    class="minicart-item-count">2</span></a>
                    <div
    class="minicart">
                      <div
    class="widget_shopping_cart_content">
                        <div
    class="mobile-cart-header">
                          <div
    class="mobile-cart-header-title title-h6">Cart</div>
                          <a
    class="mobile-cart-header-close" href="#"><span
    class="cart-close-line-1"></span><span
    class="cart-close-line-2"></span></a></div>
                        <ul
    class="cart_list product_list_widget ">
                          <li
    class="woocommerce-mini-cart-item mini_cart_item "> <a
    href="https://codex-themes.com/thegem/cart/?remove_item=2510c61003e2069611c84b1fdf5db6cc&#038;_wpnonce=d110334618" class="remove remove_from_cart_button" aria-label="Remove this item" data-product_id="6382" data-cart_item_key="2510c61003e2069611c84b1fdf5db6cc" data-product_sku="">&times;</a> <a
    href="https://codex-themes.com/thegem/product/get-hot-outside/?attribute_pa_color=black&#038;attribute_pa_variation=flat-urban-style">
                            <div
    class="minicart-image"><img
    width="160" height="160" data-tgpli-src="//codex-themes.com/thegem/wp-content/uploads/2016/02/Denims13-160x160.jpg" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" data-tgpli-srcset="//codex-themes.com/thegem/wp-content/uploads/2016/02/Denims13-160x160.jpg 160w, //codex-themes.com/thegem/wp-content/uploads/2016/02/Denims13-150x150.jpg 150w, //codex-themes.com/thegem/wp-content/uploads/2016/02/Denims13-180x180.jpg 180w, //codex-themes.com/thegem/wp-content/uploads/2016/02/Denims13-256x256.jpg 256w" sizes="(max-width: 160px) 100vw, 160px" data-tgpli-inited data-tgpli-image-inited id="tgpli-60ebeddc0554b"  /><script>window.tgpQueue.add('tgpli-60ebeddc0554b')</script>
                              <noscript>
                              <img
    width="160" height="160" src="//codex-themes.com/thegem/wp-content/uploads/2016/02/Denims13-160x160.jpg" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" srcset="//codex-themes.com/thegem/wp-content/uploads/2016/02/Denims13-160x160.jpg 160w, //codex-themes.com/thegem/wp-content/uploads/2016/02/Denims13-150x150.jpg 150w, //codex-themes.com/thegem/wp-content/uploads/2016/02/Denims13-180x180.jpg 180w, //codex-themes.com/thegem/wp-content/uploads/2016/02/Denims13-256x256.jpg 256w" sizes="(max-width: 160px) 100vw, 160px" />
                              </noscript>
                            </div>
                            Get Hot Outside - Black, Flat Urban Style </a> <span
    class="quantity">1 &times; <span
    class="woocommerce-Price-amount amount"><span
    class="woocommerce-Price-currencySymbol">&#36;</span>59.99</span></span></li>
                          <li
    class="woocommerce-mini-cart-item mini_cart_item "> <a
    href="https://codex-themes.com/thegem/cart/?remove_item=42d02bd0c73cb27e4ffc7862910ea1f4&#038;_wpnonce=d110334618" class="remove remove_from_cart_button" aria-label="Remove this item" data-product_id="6300" data-cart_item_key="42d02bd0c73cb27e4ffc7862910ea1f4" data-product_sku="HJ345T">&times;</a> <a
    href="https://codex-themes.com/thegem/product/princess-eve/">
                            <div
    class="minicart-image"><img
    width="160" height="160" data-tgpli-src="//codex-themes.com/thegem/wp-content/uploads/2016/02/Dresses8-160x160.jpg" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" data-tgpli-srcset="//codex-themes.com/thegem/wp-content/uploads/2016/02/Dresses8-160x160.jpg 160w, //codex-themes.com/thegem/wp-content/uploads/2016/02/Dresses8-150x150.jpg 150w, //codex-themes.com/thegem/wp-content/uploads/2016/02/Dresses8-180x180.jpg 180w, //codex-themes.com/thegem/wp-content/uploads/2016/02/Dresses8-256x256.jpg 256w" sizes="(max-width: 160px) 100vw, 160px" data-tgpli-inited data-tgpli-image-inited id="tgpli-60ebeddc0558b"  /><script>window.tgpQueue.add('tgpli-60ebeddc0558b')</script>
                              <noscript>
                              <img
    width="160" height="160" src="//codex-themes.com/thegem/wp-content/uploads/2016/02/Dresses8-160x160.jpg" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" srcset="//codex-themes.com/thegem/wp-content/uploads/2016/02/Dresses8-160x160.jpg 160w, //codex-themes.com/thegem/wp-content/uploads/2016/02/Dresses8-150x150.jpg 150w, //codex-themes.com/thegem/wp-content/uploads/2016/02/Dresses8-180x180.jpg 180w, //codex-themes.com/thegem/wp-content/uploads/2016/02/Dresses8-256x256.jpg 256w" sizes="(max-width: 160px) 100vw, 160px" />
                              </noscript>
                            </div>
                            Princess Eve </a> <span
    class="quantity">1 &times; <span
    class="woocommerce-Price-amount amount"><span
    class="woocommerce-Price-currencySymbol">&#36;</span>199.00</span></span></li>
                        </ul>
                        <div
    class="woocommerce-mini-cart__total total clearfix"> <strong>Subtotal:</strong> <span
    class="woocommerce-Price-amount amount"><span
    class="woocommerce-Price-currencySymbol">&#36;</span>258.99</span></div>
                        <div
    class="woocommerce-mini-cart__buttons buttons">
                          <div
    class="gem-button-container gem-button-position-inline mini-cart-view-cart"><a
    class="gem-button gem-button-size-tiny gem-button-style-flat gem-button-text-weight-normal" style="border-radius: 3px;background-color: #00bcd4;color: #ffffff;" onmouseleave="this.style.backgroundColor='#00bcd4';this.style.color='#ffffff';" onmouseenter="this.style.borderColor='#00bcd4';this.style.backgroundColor='transparent';this.style.color='#00bcd4';" href="https://codex-themes.com/thegem/cart/" target="_self">View cart</a></div>
                          <div
    class="gem-button-container gem-button-position-inline mini-cart-checkout"><a
    class="gem-button gem-button-size-tiny gem-button-style-outline gem-button-text-weight-normal gem-button-border-2" style="border-radius: 3px;border-color: #393d50;color: #393d50;" onmouseleave="this.style.borderColor='#393d50';this.style.backgroundColor='transparent';this.style.color='#393d50';" onmouseenter="this.style.borderColor='#393d50';this.style.backgroundColor='#393d50';this.style.color='#ffffff';" href="https://codex-themes.com/thegem/checkout/" target="_self">Checkout</a></div>
                        </div>
                      </div>
                    </div>
                  </li>
                </ul>
              </nav>