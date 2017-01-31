<?php
    <div id="navi">
        <div id="navi-innen">
        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
            <h2><?php _e('Pages'); ?></h2>
            <ul>
                <li><a href="<?php bloginfo('url'); ?>">Home</a></li>
                <?php wp_list_pages('sort_column=menu_order&title_li='); ?>
            </ul>

            

           
            
           
            <?php endif; ?>

          

        </div>
    </div>

    <hr />
