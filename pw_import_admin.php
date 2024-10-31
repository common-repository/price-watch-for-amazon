<?php   
    if($_POST['oscimp_hidden'] == 'Y') {   
        //Form data sent   
       $us_id = $_POST['price_watch_us_id'];
       update_option('price_watch_us_id', $us_id);
	   $uk_id = $_POST['price_watch_uk_id'];
       update_option('price_watch_uk_id', $uk_id);
	   $ca_id = $_POST['price_watch_ca_id'];
       update_option('price_watch_ca_id', $ca_id);
	   $de_id = $_POST['price_watch_de_id'];
       update_option('price_watch_de_id', $de_id);
	   $jp_id = $_POST['price_watch_jp_id'];
       update_option('price_watch_jp_id', $jp_id);
	   $fr_id = $_POST['price_watch_fr_id'];
       update_option('price_watch_fr_id', $fr_id);
?>   
        <div class="updated"><p><strong><?php _e('Options saved.' ); ?></strong></p></div>   
<?php   
    } else {   
        $us_id = get_option('price_watch_us_id');
		$uk_id = get_option('price_watch_uk_id');
		$ca_id = get_option('price_watch_ca_id');
		$de_id = get_option('price_watch_de_id');
		$jp_id = get_option('price_watch_jp_id');
		$fr_id = get_option('price_watch_fr_id');
    }   
?>  

<div class="wrap">  
    <?php    echo "<h2>" . __( 'Price Watch For Amazon Options', 'pw_trdom' ) . "</h2>"; ?>  
  
    <form name="oscimp_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">  
        <input type="hidden" name="oscimp_hidden" value="Y">
		<p><?php _e("Everything below is optional." ); ?></p>
        <p><?php _e("Amazon.com Associate ID: " ); ?><input type="text" name="price_watch_us_id" value="<?php echo $us_id; ?>" size="20"></p>  
		<p><?php _e("Amazon.co.uk Associate ID: " ); ?><input type="text" name="price_watch_uk_id" value="<?php echo $uk_id; ?>" size="20"></p>  
		<p><?php _e("Amazon.ca Associate ID: " ); ?><input type="text" name="price_watch_ca_id" value="<?php echo $ca_id; ?>" size="20"></p>  
		<p><?php _e("Amazon.de Associate ID: " ); ?><input type="text" name="price_watch_de_id" value="<?php echo $de_id; ?>" size="20"></p>  
		<p><?php _e("Amazon.co.jp Associate ID: " ); ?><input type="text" name="price_watch_jp_id" value="<?php echo $jp_id; ?>" size="20"></p>  
		<p><?php _e("Amazon.fr Associate ID: " ); ?><input type="text" name="price_watch_fr_id" value="<?php echo $fr_id; ?>" size="20"></p>  
        <p class="submit">  
        <input type="submit" name="Submit" value="<?php _e('Update Options', 'pw_trdom' ) ?>" />  
        </p>  
    </form>  
</div>