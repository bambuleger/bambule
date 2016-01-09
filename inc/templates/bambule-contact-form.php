<?php
    /*    
        Backend / Admin Contact Form Page
    
        @package bambuletheme
    */
?>

<h1>Bambule Contact Form</h1>
<?php settings_errors(); ?>

    <form method="post" action="options.php" class="bambule-general-form">
        <?php settings_fields( 'bambule-contact-options' ); ?>
            <?php do_settings_sections( 'bambule_contact' ); ?>
                <?php submit_button(); ?>
    </form>