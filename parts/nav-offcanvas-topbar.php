<!-- By default, this menu will use off-canvas for small
     and a topbar for medium-up -->

<?php
    $zume_is_logged_in = is_user_logged_in();
    $zume_current_lang = zume_current_language();
?>

<div class="grid-x grid-padding-x margin-horizontal-1 top-bar" id="top-bar">

    <div class="cell small-3 medium-2" id="top-logo-div">
        <a href="<?php echo esc_url( zume_home_url() ) ?>">
            <div class="zume-logo-in-top-bar"></div>
        </a>
    </div>
    <div class="cell medium-5 hide-for-small show-for-large center" id="top-full-menu-div-wrapper">
        <div id="top-full-menu-div">
            <ul id="menu-en-1" class="vertical medium-horizontal menu dropdown" data-responsive-menu="accordion medium-dropdown" role="menubar" data-e="om1ix2-e" data-mutate="danwjz-responsive-menu" data-events="mutate"><li class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-19679 active" role="menuitem"><a href="<?php echo esc_url( zume_home_url() ) ?>" aria-current="page"><?php echo esc_html__( 'Home', 'zume' ) ?></a></li>
                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-20962 is-dropdown-submenu-parent opens-right" role="menuitem" aria-haspopup="true" aria-label="Course" data-is-click="false"><a href="<?php echo zume_training_url( $zume_current_lang ) ?>"><?php echo esc_html__( 'Course', 'zume' ) ?></a>
                    <ul class="menu submenu is-dropdown-submenu first-sub vertical" data-submenu="" role="menu" style="">
                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-22400 is-submenu-item is-dropdown-submenu-item" role="menuitem"><a href="<?php echo zume_training_url( $zume_current_lang ) ?>"><?php echo esc_html__( 'Course', 'zume' ) ?></a></li>
                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-20826 is-submenu-item is-dropdown-submenu-item" role="menuitem"><a href="<?php echo zume_mirror_url()  . $zume_current_lang . '/33.pdf' ?>"><?php echo esc_html__( 'Download Guidebook', 'zume' ) ?></a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <div class="cell small-4 medium-2" id="top-lang-div">
        <div id="lang-menu">
            <a href="javascript:void(0)" data-open="language-menu-reveal"><img alt="language" src="<?php echo esc_url( zume_images_uri() ) ?>language.svg" style="width:15px;height:15px;" /> <?php esc_html_e( "Language", 'zume' ) ?></a>
        </div>
    </div>
    <div class="cell small-4 medium-2 show-for-small hide-for-large" id="top-mobile-menu-div">
        <div class="mobile-menu">
            <a data-toggle="off-canvas" style="cursor:pointer; float: right;"><img src="<?php echo esc_url( zume_images_uri() . 'hamburger.svg' ) ?>" alt="menu" /></a>
        </div>
    </div>

</div>
