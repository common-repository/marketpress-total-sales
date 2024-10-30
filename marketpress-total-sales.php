<?php
/**
 * Plugin Name: Marketpress Total Sales
 * Description: Easily show off the total amount of sales your Marketpress store has made,in   a shortcode.
 * Author: Anil Nagda
 * Version:1.0
 */

function mp_total_sales(){

global $wpdb,$mp;
global $switched;
$blog_id = $GLOBALS['current_blog']->blog_id;
$main=0;
//$blog_list = get_blog_list( 0, 'all' );
$main=0;

    $table1 = $wpdb->get_blog_prefix($blog_id) . 'posts';
    $table2 = $wpdb->get_blog_prefix($blog_id) . 'postmeta';
    global $wpdb;
    $post_id = $wpdb->get_results("SELECT * FROM $table2 INNER JOIN $table1 ON $table2.post_id = $table1.ID  WHERE post_status = 'order_received' AND meta_key='mp_order_total' ");
		
                        for($i=0; $i<count($post_id); $i++){
		                $post_id[$i]->meta_value."</br>";
                        $main = $post_id[$i]->meta_value + $main;	
                        }

 ?>
<span class="total-sales"><?php echo $mp->format_currency('', $main); ?></span>

<?php } ?>
<?php add_shortcode('MPTS', 'mp_total_sales'); ?>