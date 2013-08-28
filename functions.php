<?php

register_sidebar(array(	'name'=>'Sidebar'));

add_action( 'admin_init',  function() {
	register_setting( 'hf_options_group', 'hf_theme_options' ); 
});

add_action( 'admin_menu', function() {
	add_theme_page('Options', 'Options', 'edit_theme_options', 'theme-optionen', 'hf_options');
} );


function hf_options() {
?>
<div class="wrap"> 
<?php screen_icon(); ?><h2>Theme-Optionen für <?php bloginfo('name'); ?></h2> 

<form method="post" action="options.php">
	<?php settings_fields( 'hf_options_group' ); ?>
    <?php $options = get_option( 'hf_theme_options' ); ?>

    <table class="form-table">
      <tr valign="top">
        <th scope="row">Header-Image-URL</th>
        <td><input id="hf_theme_options[headerimage]" placeholder="http://" class="regular-text" type="text" name="hf_theme_options[headerimage]" value="<?php esc_attr_e( $options['headerimage'] ); ?>" /></td>
      </tr>  
      
    </table>
    
    <!-- submit -->
    <p class="submit"><input type="submit" class="button-primary" value="Save" /></p>
  </form>

</div>
<?php
}

?>