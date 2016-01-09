<?php
    /*   
        Backend / Admin Sidebar Page
        
        @package bambuletheme
    */
?>

<h1>Bambule Sidebar Options</h1>
<?php settings_errors(); ?>
    <?php 
    $picture = esc_attr( get_option( 'profile_picture' ) );
    $firstName = esc_attr( get_option( 'first_name' ) );
    $lastName = esc_attr( get_option( 'last_name' ) );
    $fullName = $firstName . ' ' . $lastName;
    $description = esc_attr( get_option( 'user_description' ) );
?>

        <div class="bambule-sidebar-preview">
            <div class="bambule-sidebar">
                <div class="image-container">
                    <div id="profile-picture-preview" class="profile-picture" style="background-image: url(<?php print $picture ?>);">
                    </div>
                </div>
                <h1 class="bambule-username"><?php print $fullName ?></h1>
                <h2 class="bambule-description"><?php print $description ?></h2>
                <div class="icons-wrapper">

                </div>
            </div>
        </div>

        <form method="post" action="options.php" class="bambule-general-form">
            <?php settings_fields( 'bambule-settings-group' ); ?>
                <?php do_settings_sections( 'bambule_admin' ); ?>
                    <?php submit_button('Save Changes', 'primary', 'btnSubmit'); ?>
        </form>