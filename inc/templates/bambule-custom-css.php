<?php
    /*    
        Backend / Admin Custom CSS Page
    
        @package bambuletheme
    */
?>    

    <?php settings_errors(); ?>

    <form id="save-custom-css-form" method="post" action="options.php" class="bambule-general-form">
        <?php settings_fields( 'bambule-custom-css-options' ); ?>
            <?php do_settings_sections( 'bambule_admin_css' ); ?>
                <?php submit_button(); ?>
    </form>