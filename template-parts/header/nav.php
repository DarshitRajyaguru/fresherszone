<?php
/**
 * Navigation menus
 * 
 * @package fresherszone
 */

 $header_menu_id = get_menu_id('fresherszone-header-menu');
 $header_menus = wp_get_nav_menu_items($header_menu_id);

 echo '<pre>';
 print_r($header_menus);
 echo '</pre>';
?>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <?php 
		if( function_exists( 'the_custom_logo' ) ){
			the_custom_logo();
		}
		?>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <?php 
            if(!empty($header_menus) && is_array($header_menus)){
                ?>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <?php
                    foreach ($header_menus as $menu_item) {
                        if(! $menu_item->menu_item_parent){
                            ?>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Link</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Dropdown
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                            </li>
                            <?php
                        }
                    }
                    ?>
                </ul>    
                <?php
            }
            ?>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>