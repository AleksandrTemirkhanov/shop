Function AddProduct($OpisProd, $KratOpisProd, $NameProd, $ProdCat, $Stock, $BasePrice, $SalePrice, $Note, $Weight, $Length, $Width, $Height, $Art, $Attributes, $TaxAttributes, $thumb_url, $thumb_url_all) {


//Функция добавления нового товара (продукта) в Wordpress WooCommerce
//Передать параметры:
//$OpisProd - описание товара
//$KratOpisProd - краткое описание
//$NameProd - название товара
//$ProdCat - категория товара
//$Stock - Статус остатка ('instock' - в наличии, 'outofstock' - не в наличии, 'onrequest' - по запросу)
//$BasePrice - базовая цена
//$SalePrice - цена распродажи
//$Note- Примечание к покупке (что бы отправить его клиенту после покупки)
//$Weight - Вес
//$Length - Длина
//$Width - Ширина
//$Height - Высота
//$Art - Артикул
//$Attributes() - доп.атрибуты (массив)
//$thumb_url  - путь к превью, например: http://alexabak-wordpress.tw1.ru/wp-content/themes/boemia-free/images/logo.png
//$thumb_url_all() - массив с URL к доп картинкам


//--------------------------------------------Добавление товара--------------------------------------------------
http://wp-kama.ru/function/wp_insert_post
$post = array(
'post_author' => 1,
'post_content' => $OpisProd, //Описание товара
'post_excerpt' => $KratOpisProd,
'post_status' => "publish",
'post_title' => $NameProd, // Название товара
//   'post_parent' => '123', //ID родительской записи
'post_type' => "product",
);

//Create post
$post_id = wp_insert_post($post);


// http://wordpress.stackexchange.com/questions/137501/how-to-add-product-in-woocommerce-with-php-code
wp_set_object_terms( $post_id, $ProdCat, 'product_cat' );     //Категория товара
wp_set_object_terms($post_id, 'simple', 'product_type');     //Тип товара (Простой товар)


update_post_meta( $post_id, '_visibility', 'visible' );           // Видимость: открыто
update_post_meta( $post_id, '_stock_status', $Stock);	//Статус Остатка - в наличии
//update_post_meta( $post_id, 'total_sales', '0');   //Создается произвольное поле
update_post_meta( $post_id, '_downloadable', 'no');      //Не скачиваемый
update_post_meta( $post_id, '_virtual', 'no');                  //Не виртуальный
update_post_meta( $post_id, '_regular_price', $BasePrice);   //Базовая цена
update_post_meta( $post_id, '_sale_price', $SalePrice);            //Цена распродажи
update_post_meta( $post_id, '_purchase_note', $Note);  //Примечание к покупке (что бы отправить его клиенту после покупки)
update_post_meta( $post_id, '_featured', "no" );
update_post_meta( $post_id, '_weight', $Weight);		// Вес
update_post_meta( $post_id, '_length', $Length);		// Длина
update_post_meta( $post_id, '_width', $Width );		// Ширина
update_post_meta( $post_id, '_height', $Height);		// Высота
update_post_meta($post_id, '_sku', $Art);                           // Артикул
//update_post_meta( $post_id, 'short_description', 'short_description');
//update_post_meta( $post_id, '_sale_price_dates_from', "99" );
//update_post_meta( $post_id, '_sale_price_dates_to', "999" );

//update_post_meta( $post_id, '_sold_individually', "888" );
update_post_meta( $post_id, '_manage_stock', "no" );
//update_post_meta( $post_id, '_backorders', "no" );
//update_post_meta( $post_id, '_stock', "777" );

//Устанавливаем мета _price. Работает она странно. _price должна равнятся актуальной цене товара/
//Если _sale_price задан, но не совпадает с _price, для цены товара woocommerce берет _price.
//Поэтому, сначала проверяем.
if  ($SalePrice<=0) {
update_post_meta( $post_id, '_price', $BasePrice );                  //Цена
} else {
update_post_meta( $post_id, '_price', $SalePrice );                  //Цена
};



//Привязываем товары к таксономиям (Назначение атрибутов товаров)
//Необходимо создать вручную таксономии Производитель pa_proizvoditel
//И Страна

wp_set_object_terms($post_id, $TaxAttributes['country'], 'pa_strana');
$thedata = Array(
'name'=>'pa_strana',
'value'=>$TaxAttributes['country'],
'is_visible' => '1',
'is_variation' => '0',
'is_taxonomy' => '1'
);
$Attributes = array_merge (array( 'pa_strana' => $thedata), $Attributes);

wp_set_object_terms($post_id, $TaxAttributes['vendor'], 'pa_proizvoditel');
$thedata = Array(
'name'=>'pa_proizvoditel',
'value'=>$TaxAttributes['vendor'],
'is_visible' => '1',
'is_variation' => '0',
'is_taxonomy' => '1'
);
$Attributes = array_merge (array( 'pa_proizvoditel'=> $thedata), $Attributes);




//Цвет
$taxColor = false;
if (stripos($NameProd, 'красный')) {$taxColor[] = 'Красный';};
if (stripos($NameProd, 'красная')) {$taxColor[] = 'Красный';};
if (stripos($NameProd, 'бежевый')) {$taxColor[] = 'Бежевый';};
if (stripos($NameProd, 'бежевая')) {$taxColor[] = 'Бежевый';};
if (stripos($NameProd, 'оранжевый')) {$taxColor[] = 'Оранжевый';};
if (stripos($NameProd, 'оранжевая')) {$taxColor[] = 'Оранжевый';};
if (stripos($NameProd, 'желтый')) {$taxColor[] = 'Желтый';};
if (stripos($NameProd, 'желтая')) {$taxColor[] = 'Желтый';};
if (stripos($NameProd, 'зеленый')) {$taxColor[] = 'Зеленый';};
if (stripos($NameProd, 'зеленая')) {$taxColor[] = 'Зеленый';};
if (stripos($NameProd, 'голубой')) {$taxColor[] = 'Голубой';};
if (stripos($NameProd, 'голубая')) {$taxColor[] = 'Голубой';};
if (stripos($NameProd, 'синий')) {$taxColor[] = 'Синий';};
if (stripos($NameProd, 'синяя')) {$taxColor[] = 'Синий';};
if (stripos($NameProd, 'фиолетовый')) {$taxColor[] = 'Фиолетовый';};
if (stripos($NameProd, 'фиолетовая')) {$taxColor[] = 'Фиолетовый';};
if (stripos($NameProd, 'белый')) {$taxColor[] = 'Белый';};
if (stripos($NameProd, 'белая')) {$taxColor[] = 'Белый';};
if (stripos($NameProd, 'серебряный')) {$taxColor[] = 'Серебряный';};
if (stripos($NameProd, 'серебряная')) {$taxColor[] = 'Серебряный';};
if (stripos($NameProd, 'розовый')) {$taxColor[] = 'Розовый';};
if (stripos($NameProd, 'розовая')) {$taxColor[] = 'Розовый';};
if (stripos($NameProd, 'серый')) {$taxColor[] = 'Серый';};
if (stripos($NameProd, 'серая')) {$taxColor[] = 'Серый';};
if (stripos($NameProd, 'цветной')) {$taxColor[] = 'Цветной';};
if (stripos($NameProd, 'цветная')) {$taxColor[] = 'Цветной';};

if (count($taxColor) > 0) {
if ((string)$taxColor[0] != '') {
wp_set_object_terms($post_id, (string)$taxColor[0], 'pa_tsvet');
$thedata = Array(
'name'=>'pa_tsvet',
'value'=>(string)$taxColor[0],
'is_visible' => '1',
'is_variation' => '0',
'is_taxonomy' => '1'
);
$Attributes['pa_tsvet' ] =  $thedata;
};
};


//МАТЕРИАЛЫ
//По ключевикам в названии товара
$taxMat = false;
if (stripos($NameProd, 'дерев')) {$taxMat[] = 'Дерево'; };
if (stripos($NameProd, 'металл')) {$taxMat[] = 'Металл'; };
//По ключевым словам из Описания Товара

if (stripos($OpisProd, 'пластик')) {$taxMat[] = 'Пластик';};
if (stripos($OpisProd, 'пластмасс')) {$taxMat[] = 'Пластмасса';};
if (stripos($OpisProd, 'натуральное дерево')) {$taxMat[] = 'Натуральное дерево';};
if (stripos($OpisProd, 'каучуковое дерево')) {$taxMat[] = 'Каучуковое дерево';};
if (stripos($OpisProd, 'фанер')) {$taxMat[] = 'Фанера';};
if (stripos($OpisProd, 'массив')) {$taxMat[] = 'Массив';};
if (stripos($OpisProd, 'МДФ')) {$taxMat[] = 'МДФ';};
if (stripos($OpisProd, 'ДСП')) {$taxMat[] = 'ДСП';};
if (stripos($OpisProd, 'дерево')) {$taxMat[] = 'Дерево';};
if (stripos($OpisProd, 'бук')) {$taxMat[] = 'Бук';};
if (stripos($OpisProd, 'сталь')) {$taxMat[] = 'Сталь';};
if (stripos($OpisProd, 'сосна')) {$taxMat[] = 'Сосна';};
if (stripos($OpisProd, 'текстиль')) {$taxMat[] = 'Текстиль';};
if (stripos($OpisProd, 'синтепон')) {$taxMat[] = 'Синтепон';};
if (stripos($OpisProd, 'хлопок')) {$taxMat[] = 'Хлопок';};
if (stripos($OpisProd, 'ткань')) {$taxMat[] = 'Ткань';};
if (stripos($OpisProd, 'винил')) {$taxMat[] = 'Винил';};
if (stripos($OpisProd, 'флок')) {$taxMat[] = 'Флок';};
if (stripos($OpisProd, 'картон')) {$taxMat[] = 'Картон';};

if (count($taxMat) > 0) {
if ((string)$taxMat[0] != ''){
wp_set_object_terms($post_id, (string)$taxMat[0], 'pa_material');
$thedata = Array(
'name'=>'pa_material',
'value'=>(string)$taxMat[0],
'is_visible' => '1',
'is_variation' => '0',
'is_taxonomy' => '1'
);
$Attributes['pa_material' ] = $thedata;
};
};


update_post_meta( $post_id, '_product_attributes', $Attributes);


//Добавление меток товаров
$tags = false;
// Установка тегов по цене "До ХХХ  руб" -
if ($BasePrice <= 1000) {$tags[]  = 'До 1000 рублей';}
elseif ($BasePrice > 1000 and $BasePrice < 3000) {$tags[] = 'До 3000 рублей';}
elseif ($BasePrice > 3000 and $BasePrice < 5000) {$tags[] = 'До 5000 рублей';}
elseif ($BasePrice > 5000 and $BasePrice < 7000) {$tags[] = 'До 7000 рублей';}
elseif ($BasePrice > 7000 and $BasePrice < 10000) {$tags[] = 'До 10000 рублей';};

//По стране
if ($TaxAttributes['country'] == 'США') {$taxMat[] = 'Сделано в Америке';}
elseif ($TaxAttributes['country'] == 'Германия'){$tags[] = 'Немецкое качество';}
elseif ($TaxAttributes['country'] == 'Россия'){$tags[] = 'Сделано в России';};

if ($tags) {
wp_set_object_terms( $post_id, $tags, 'product_tag'); //Устанавливаем созданные метки
};

//-----------------------------------------------------Добавление превью------------------------------------------------------------------------
//http://jafty.com/blog/programatically-create-woocommerce-products-with-variations/
//add product image:
//require_once 'inc/add_pic.php';
require_once(ABSPATH . 'wp-admin/includes/file.php');
require_once(ABSPATH . 'wp-admin/includes/media.php');
require_once(ABSPATH . "wp-admin" . '/includes/image.php');

// Download file to temp location
$tmp = download_url( $thumb_url );

if( !is_wp_error( $tmp ) ) {

// Set variables for storage
// fix file name for query strings
preg_match('/[^\?]+\.(jpg|JPG|jpe|JPE|jpeg|JPEG|gif|GIF|png|PNG)/', $thumb_url, $matches);
$file_array['name'] = basename($matches[0]);
$file_array['tmp_name'] = $tmp;

//print_r ($file_array);
//use media_handle_sideload to upload img:
$thumbid = media_handle_sideload( $file_array, $post_id, $NameProd); //Описание изображения
set_post_thumbnail($post_id, $thumbid);

}

//----------------------------------------------------КонецДобавление превью------------------------------------------------------------------------

//----------------------------------------------------Добавление доп картинок------------------------------------------------------------------------

if (is_array($thumb_url_all)) {
foreach($thumb_url_all as $key => $value)
{

//print_r($tmp2);
$tmp2 = download_url( $value );
if ($tmp2) {
// fix file name for query strings
preg_match('/[^\?]+\.(jpg|JPG|jpe|JPE|jpeg|JPEG|gif|GIF|png|PNG)/', $value, $matches);
$file_array2['name'] = basename($matches[0]);
$file_array2['tmp_name'] = $tmp2;
$imgID[$key] = media_handle_sideload( $file_array2, $post_id, $NameProd);   //Описание изображения
//print_r($imgID);
};
}

update_post_meta( $post_id, '_product_image_gallery', implode(", ", $imgID));
};

wp_update_post( $post_id);
shell_exec('rm -rf /tmp/*'); //Очищаем папку tmp что бы небыло переполнения

//--------------------------------------КонецДобавление доп картинок------------------------------------------------------------------------

echo ' Пост № - '; print_r ($post_id);
//print_r (get_post_meta( '339', '_price'));
}