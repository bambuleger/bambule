<?php
    /*
        Backend / Admin Theme Support Page
    
        @package bambuletheme
    */
?>

<h1>Bambule Theme Support</h1>
<?php settings_errors(); ?>

    <form method="post" action="options.php" class="bambule-general-form">
        <?php settings_fields( 'bambule-theme-support' ); ?>
            <?php do_settings_sections( 'bambule_admin_theme' ); ?>
                <?php submit_button(); ?>
    </form>