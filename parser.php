<?php
require_once( 'wp-load.php' );
require_once( ABSPATH . '/wp-admin/includes/taxonomy.php');
require "pq.php";
require_once(ABSPATH . 'wp-admin/includes/media.php');
require_once(ABSPATH . 'wp-admin/includes/file.php');
require_once(ABSPATH . 'wp-admin/includes/image.php');

ini_set('display_errors', 'On'); // сообщения с ошибками будут показываться
error_reporting(E_ALL); // E_ALL - отображаем ВСЕ ошибки
set_time_limit(0); //Не ограничиваем время работы скрипта




function addProduct($NameProd, $ProdCat, $BasePrice, $SalePrice, $thumb_url) {

    $post = array(
        'post_author' => 1,
        'post_content' => '', //Описание товара
        'post_excerpt' => '',
        'post_status' => "publish",
        'post_title' => $NameProd, // Название товара
        //   'post_parent' => '123', //ID родительской записи
        'post_type' => "product",
    );

    //Create post
    $post_id = wp_insert_post($post);

    wp_set_object_terms( $post_id, $ProdCat, 'product_cat' );     //Категория товара
    wp_set_object_terms($post_id, 'simple', 'product_type');     //Тип товара (Простой товар)
    update_post_meta( $post_id, '_visibility', 'visible' );
    update_post_meta( $post_id, '_featured', "no" );// Видимость: открыто
    update_post_meta( $post_id, '_regular_price', $BasePrice);
    update_post_meta( $post_id, '_price',$BasePrice);
    update_post_meta( $post_id, '_sale_price', '');

    $tmp = download_url($thumb_url );
    preg_match('/[^\?]+\.(jpg|JPG|jpe|JPE|jpeg|JPEG|gif|GIF|png|PNG)/', $thumb_url , $matches);
    $file_array['name'] = basename($matches[0]);
    $file_array['tmp_name'] = $tmp;

    $img_tag = media_handle_sideload( $file_array, $post_id , $NameProd);


    set_post_thumbnail($post_id, $img_tag);

}



function file_get_contents_utf8( $hbr ) {
    $content = file_get_contents($hbr);
    return mb_convert_encoding($content, 'UTF-8',"windows-1251");
 }
$urls = file('links.txt');



foreach ($urls as $url) {
    $url = preg_replace('/\s+/', '',  $url);
$content = file_get_contents_utf8( $url );
$content = phpQuery::newDocument($content);
$items = $content->find('.product-item');
$category = $content->find('.last-bread');
$category = pq($category)->text();
$data = [];
$data['category'] = $category;

    $cat_defaults = array(
        //'cat_ID' => $CatID,                // ID категории, которую нужно обновить. 0 - добавит новую категорию.
        'cat_name' => $category,             // название категории. Обязательный.
        'category_description' => '', // описание категории
        'category_nicename' => $category,      // слаг категории
        'category_parent' => '',        // ID родительской категории
        'taxonomy' => 'product_cat'      // таксономия. Измените, чтобы добавить элемент другой таксономии. Например для меток будет post_tag
    );

  //  $cat_id = wp_insert_category( $cat_defaults, true);

foreach ($items as $item) {
    $item = pq($item);
    $images = $item->find('.link-on-product img');
    $titles = $item->find('.link-to-product');
    $prices = $item->find('.new-price');

foreach ($titles as $title) {
    $title = pq($title);
    $title = $title->text();
    $data['title'] = $title;
}

    foreach ($prices as $price) {
        $price = pq($price);
        $price = $price->text();
        $data['price'] = $price;
    }

    foreach ($images as $image) {
        $image = pq($image);
        $image = $images->attr('newsrc');
    ?>

        <?php
}
    $title = $data['title'];
    $category = $data['category'];
    $price = $data['price'];
    $hot = $price*0.8;
    addProduct($title, $category, $price, $hot, $image);




}

}









