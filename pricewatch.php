<?php
/*
Plugin Name: Price Watch For Amazon
Plugin URI: http://www.nukeprice.com/download.html
Description: Price Watch keeps track of the price of products sold on Amazon websites and alerts you with email only when price changes.
Version: 1.1
Author: NukePrice.com
Author URI: http://www.nukeprice.com
License: GPLv2

Copyright 2007-2010  NukePrice.com  (email : support@nukeprice.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
*/

function pw_admin() {   
    include('pw_import_admin.php');   
}  

function pw_admin_actions() {   
  add_options_page("Price Watch For Amazon", "Price Watch For Amazon", 1, "Price Watch", "pw_admin");   
}   
  
add_action('admin_menu', 'pw_admin_actions');   

class PriceWatchWidget extends WP_Widget {
    /** constructor */
    function PriceWatchWidget() {
		$widget_ops = array('description' => __('Put a tool that user can watch the price for an item sold on Amazon.'));
        parent::WP_Widget(false, $name = 'Price Watch',$widget_ops);	
    }

    /** @see WP_Widget::widget */
    function widget($args, $instance) {		
        extract( $args );
        $title = apply_filters('widget_title', $instance['title']);
        ?>
              <?php echo $before_widget; ?>
                  <?php if ( $title )
                        echo $before_title . $title . $after_title; ?>
				  <?php
					$us_id = get_option('price_watch_us_id');
					$uk_id = get_option('price_watch_uk_id');
					$ca_id = get_option('price_watch_ca_id');
					$de_id = get_option('price_watch_de_id');
					$jp_id = get_option('price_watch_jp_id');
					$fr_id = get_option('price_watch_fr_id');
				  ?>
                  <p>Amazon Detail Page Url:<input type="text" id="pricewatch_urlstring"></p>
				  <p>Your Email Address: <input type="text" id="pricewatch_email"></p>
				  <p><INPUT TYPE="BUTTON" OnClick="var us_id='<?= $us_id ?>';var uk_id='<?= $uk_id ?>';var ca_id='<?= $ca_id ?>';var de_id='<?= $de_id ?>';var jp_id='<?= $jp_id ?>';var fr_id='<?= $fr_id ?>'; var re = new RegExp('/([A-Z0-9]{10})(/|$|\\?)');var url=document.getElementById('pricewatch_urlstring').value; var m = re.exec(url);var asin='';var marketplace=0;var pricewatch_tag=us_id; if(url.indexOf('amazon.co.uk')>=0){marketplace=1;pricewatch_tag=uk_id;}if(url.indexOf('amazon.ca')>=0){ marketplace=2;pricewatch_tag=ca_id;}if(url.indexOf('amazon.de')>=0){marketplace=3;pricewatch_tag=de_id;}if(url.indexOf('amazon.co.jp')>=0){marketplace=4;pricewatch_tag=jp_id;}if(url.indexOf('amazon.fr')>=0){ marketplace=5;pricewatch_tag=fr_id;} if(m!=null)asin=m[1];document.getElementById('pricewatch_urlstring').value='';window.open('http://www.nukeprice.com/AmazonPriceWatch/AmazonPriceWatch.aspx?asin='+asin+'&email='+document.getElementById('pricewatch_email').value+'&marketplace='+marketplace+'&tag='+pricewatch_tag);" VALUE="Watch This Item">
				  <INPUT TYPE="BUTTON" OnClick="alert('This service is provided by NukePrice.com. Amazon.com, Amazon.co.uk, Amazon.ca, Amazon.de, Amazon.co.jp, Amazon.fr are all supported.\n\nJust paste the Amazon detail page url and your email address in, and click \'Watch This Item\'. If you see the detail page, a watch job is created. You will receive an email ONLY if the price drops or Amazon start offering the item IN 30 DAYS.\n\nPRIVACY POLICY: We will not give, sell or trade your emails to any third parties. And we won\'t send you any unrelated emails. Actually we don\'t even keep your email address at all after all your watch jobs are expired. For more info, please check out NukePrice.com');" VALUE="?"></p>
				  <p>Free Shipping filler item in<INPUT TYPE="BUTTON" OnClick="window.open('http://www.nukeprice.com/AmazonPriceWatch/FillerItems.aspx?go=true&tag=<?= $us_id?>');" VALUE="US">
<INPUT TYPE="BUTTON" OnClick="window.open('http://www.nukeprice.com/AmazonPriceWatch/FillerItems.aspx?marketplace=3&go=true&tag=<?= $de_id?>');" VALUE="DE">
<INPUT TYPE="BUTTON" OnClick="window.open('http://www.nukeprice.com/AmazonPriceWatch/FillerItems.aspx?marketplace=2&go=true&tag=<?= $ca_id?>');" VALUE="CA">
<INPUT TYPE="BUTTON" OnClick="window.open('http://www.nukeprice.com/onlinetools.html');" VALUE="?"></p>
				  
              <?php echo $after_widget; ?>
        <?php
    }

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {				
        return $new_instance;
    }

    /** @see WP_Widget::form */
    function form($instance) {				
        $title = esc_attr($instance['title']);
        ?>
            <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
        <?php 
    }

} // class PriceWatchWidget
add_action('widgets_init', create_function('', 'return register_widget("PriceWatchWidget");'));

?>