<?php
/**
 * @package WordPress
 */

/* -- variables -- */
$jquery = 'jquery-1.10.2.min';
$themename = themeName();
// $option = get_option('option1');
// $page = 1;
/* -- end variables -- */

/* -- html class -- */
function htmlClass(){
    // global $page;
    if (is_home()) { return "home"; }
    // else if (is_page($page)) { return "class"; }
    else { return "inside"; }
}
/* -- end html class -- */

/* -- theme name -- */
function themeName(){
    $themeNameDir = dirname(__FILE__);
    $themeNameArr = explode("\\", $themeNameDir);
    $themeNameVar = end($themeNameArr);
    return $themeNameVar;
}
/* -- end theme name -- */

/* -- sidebar widget -- */
if ( function_exists('register_sidebar') ) {
    register_sidebar(
        array(
            'before_widget' => '<li id="%1$s" class="widget %2$s">',
            'after_widget' => '</li>',
            'before_title' => '<h2 class="widgettitle">',
            'after_title' => '</h2>',
        )
    );
}
// if ( function_exists('register_sidebar') ) {
//     register_sidebar(
//         2,
//         array(
//             'before_widget' => '<li id="%1$s" class="widget %2$s">',
//             'after_widget' => '</li>',
//             'before_title' => '<h2 class="widgettitle">',
//             'after_title' => '</h2>',
//         )
//     );
// }
/* -- end sidebar widget -- */

/* -- init advanced-custom-fields plugin -- */
include_once('advanced-custom-fields/acf.php');
/* -- end init advanced-custom-fields plugin -- */

/* -- Произвольное меню в WP 3.0+ -- */
/* --- Регистрируем меню навигаций --- */
register_nav_menus(
    array(
        'top' => 'Верхнее меню',
        'bottom' => 'Нижнее меню'
    )
);
/* --- Конец регистрации меню навигаций --- */
/* --- Глобальные настройки меню навигаций --- */
function my_wp_nav_menu_args($args=''){
    $args['container'] = '';
    $args['depth'] = '1';
    return $args;
}
add_filter( 'wp_nav_menu_args', 'my_wp_nav_menu_args' );
/* --- Конец глобальной настройки меню навигаций --- */
/* -- Конец произвольного меню в WP 3.0+ -- */

/* -- Вывод цитаты с разным количеством символов в любом месте шаблона -- */
function the_excerpt_max_charlength($charlength) {
    $excerpt = get_the_excerpt();
    $charlength++;
    if ( mb_strlen( $excerpt ) > $charlength ) {
        $subex = mb_substr( $excerpt, 0, $charlength - 5 );
        $exwords = explode( ' ', $subex );
        $excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
        if ( $excut < 0 ) {
            echo mb_substr( $subex, 0, $excut );
        } else {
            echo $subex;
        }
        echo '...';
    } else {
        echo $excerpt;
    }
}
// function new_excerpt_length($length) {
//     return 800;
// }
// add_filter('excerpt_length', 'new_excerpt_length');
/* -- Конец вывода цитаты с разным количеством символов в любом месте шаблона -- */

/* -- Kama Pagenavi -- */
function kama_pagenavi($before='', $after='', $echo=true) {
    /* ================ Настройки ================ */
    $text_num_page = ''; // Текст для количества страниц. {current} заменится текущей, а {last} последней. Пример: 'Страница {current} из {last}' = Страница 4 из 60
    $num_pages = 10; // сколько ссылок показывать
    $stepLink = 10; // после навигации ссылки с определенным шагом (значение = число (какой шаг) или '', если не нужно показывать). Пример: 1,2,3...10,20,30
    $dotright_text = '…'; // промежуточный текст "до".
    $dotright_text2 = '…'; // промежуточный текст "после".
    $backtext = '« назад'; // текст "перейти на предыдущую страницу". Ставим '', если эта ссылка не нужна.
    $nexttext = 'вперед »'; // текст "перейти на следующую страницу". Ставим '', если эта ссылка не нужна.
    $first_page_text = '« к началу'; // текст "к первой странице" или ставим '', если вместо текста нужно показать номер страницы.
    $last_page_text = 'в конец »'; // текст "к последней странице" или пишем '', если вместо текста нужно показать номер страницы.
    /* ================ Конец Настроек ================ */

    global $wp_query;
    $posts_per_page = (int) $wp_query->query_vars[posts_per_page];
    $paged = (int) $wp_query->query_vars[paged];
    $max_page = $wp_query->max_num_pages;

    if($max_page <= 1 ) return false; //проверка на надобность в навигации

    if(empty($paged) || $paged == 0) $paged = 1;

    $pages_to_show = intval($num_pages);
    $pages_to_show_minus_1 = $pages_to_show-1;

    $half_page_start = floor($pages_to_show_minus_1/2); //сколько ссылок до текущей страницы
    $half_page_end = ceil($pages_to_show_minus_1/2); //сколько ссылок после текущей страницы

    $start_page = $paged - $half_page_start; //первая страница
    $end_page = $paged + $half_page_end; //последняя страница (условно)

    if($start_page <= 0) $start_page = 1;
    if(($end_page - $start_page) != $pages_to_show_minus_1) $end_page = $start_page + $pages_to_show_minus_1;
    if($end_page > $max_page) {
        $start_page = $max_page - $pages_to_show_minus_1;
        $end_page = (int) $max_page;
    }

    if($start_page <= 0) $start_page = 1;

    $out='';//выводим навигацию
        $out.= $before."<div class='wp-pagenavi'>\n";
                if ($text_num_page){
                    $text_num_page = preg_replace ('!{current}|{last}!','%s',$text_num_page);
                    $out.= sprintf ("<span class='pages'>$text_num_page</span>",$paged,$max_page);
                }

                if ($backtext && $paged!=1) $out.= '<a href="'.get_pagenum_link(($paged-1)).'" class="previouspostslink">'.$backtext.'</a>';

                if ($start_page >= 2 && $pages_to_show < $max_page) {
                    $out.= '<a href="'.get_pagenum_link().'">'. ($first_page_text?$first_page_text:1) .'</a>';
                    if($dotright_text && $start_page!=2) $out.= '<span class="extend">'.$dotright_text.'</span>';
                }

                for($i = $start_page; $i <= $end_page; $i++) {
                    if($i == $paged) {
                        $out.= '<span class="current">'.$i.'</span>';
                    } else {

                        $out.= '<a href="'.get_pagenum_link($i).'">'.$i.'</a>';
                    }
                }

                //ссылки с шагом
                if ($stepLink && $end_page < $max_page){
                    for($i=$end_page+1; $i<=$max_page; $i++) {
                        if($i % $stepLink == 0 && $i!==$num_pages) {
                            if (++$dd == 1) $out.= '<span class="extend">'.$dotright_text2.'</span>';
                            $out.= '<a href="'.get_pagenum_link($i).'">'.$i.'</a>';
                        }
                    }
                }

                if ($end_page < $max_page) {
                    if($dotright_text && $end_page!=($max_page-1)) $out.= '<span class="extend">'.$dotright_text2.'</span>';
                    $out.= '<a href="'.get_pagenum_link($max_page).'">'. ($last_page_text?$last_page_text:$max_page) .'</a>';
                }

                if ($nexttext && $paged!=$end_page) $out.= '<a href="'.get_pagenum_link(($paged+1)).'" class="nextpostslink">'.$nexttext.'</a>';

        $out.= "</div>".$after."\n";
    if ($echo) echo $out;
    else return $out;
}
/* -- end Kama Pagenavi -- */

/* -- No More Jumping -- */
function no_more_jumping($post) {
    return '<a href="'.get_permalink($post->ID).'" class="read-more">'.'Читать далее &raquo;'.'</a>';
}
add_filter('the_content_more_link', 'no_more_jumping');
/* -- end No More Jumping */

/* -- Очищаем wp_head(); -- */
function remove_recent_comments_style() {
  global $wp_widget_factory;
  remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}
add_action( 'widgets_init', 'remove_recent_comments_style' );
remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'feed_links', 2 );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'index_rel_link' );
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 );
remove_action( 'wp_head', 'wp_generator' );
/* -- Конец очистки wp_head(); -- */

/* -- Переносим скрипты в wp_footer(); -- */
remove_action('wp_head', 'wp_print_scripts');
remove_action('wp_head', 'wp_print_head_scripts', 9);
remove_action('wp_head', 'wp_enqueue_scripts', 1);
add_action('wp_footer', 'wp_print_scripts', 5);
add_action('wp_footer', 'wp_enqueue_scripts', 5);
add_action('wp_footer', 'wp_print_head_scripts', 5);
/* -- Конец переноса скриптов в wp_footer(); -- */

/* -- Настройка вывода шаблона комментария -- */
function mytheme_comment($comment, $args, $depth){
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>" class="comment">
     <div id="comment-<?php comment_ID(); ?>" class="comment-body">
        <?php echo get_avatar($comment,$size='50',$default='<path_to_url>' ); ?>
        <?php comment_author_link() ?> <?php _e('сказал:', 'kubrick'); ?>, <?php comment_date('F jS, Y') ?> <?php _e('в', 'kubrick'); ?> <?php comment_time() ?>
        <?php if ($comment->comment_approved == '0') : ?>
          <em><?php _e('Ваш комментарий ожидает модерации.', 'kubrick'); ?></em>
        <?php endif; ?>
        <?php comment_text() ?>
        <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
     </div>
<?php
}
/* -- Конец настройки вывода шаблона комментария -- */

/* -- Custom Admin CSS -- */
function customAdmin() {
    global $themename, $jquery;
    $themeSiteUrl = get_settings('siteurl');
    $themeDirUrl = $themeSiteUrl.'/wp-content/themes/'.$themename;
    $themeCssDir = $themeDirUrl.'/css/';
    $themeJsDir = $themeDirUrl.'/js/';
    $customAdminCssNames = array( 'wp-admin' );
    // $customAdminJsNames = array( $jquery, 'wp-admin' );
    if (isset($customAdminCssNames)) {
        echo "\r\n<!-- custom admin css -->\r\n";
        foreach ($customAdminCssNames as $customAdminCssName) {
            echo '<link rel="stylesheet" href="' . $themeCssDir . $customAdminCssName . '.css">'."\r\n";
        }
        echo "<!-- /end custom adming css -->\r\n";
    }
    if (isset($customAdminJsNames)) {
        echo "<!-- custom admin js -->\r\n";
        foreach ($customAdminJsNames as $customAdminJsName) {
            echo '<script src="' . $themeJsDir . $customAdminJsName . '.js"></script>'."\r\n";
        }
        echo "<!-- /end custom admin js -->\r\n";
    }
}
add_action('admin_head', 'customAdmin');
/* -- End custom Admin CSS -- */

/* -- Настройки темы -- */
add_action('admin_menu', 'theme_option');

function theme_option() {
    global $themename;
    //create new top-level menu
    add_menu_page('theme_option', 'Настройки темы '.$themename, 'administrator', __FILE__, 'theme_option_page');

    //call register settings function
    add_action( 'admin_init', 'register_theme_options_settings' );
}


function register_theme_options_settings() {
    //register our settings
    // register_setting( 'theme_option-settings-group', 'address' );
    // register_setting( 'theme_option-settings-group', 'siteEmail' );
    // register_setting( 'theme_option-settings-group', 'sub' );
    register_setting( 'theme_option-settings-group', 'option1' );
    register_setting( 'theme_option-settings-group', 'option2' );
}

function theme_option_page() {
  global $themename;
?>
<h2 class="theme_option-title"><strong>Настройки темы <?=$themename?></strong></h2>
<form action="options.php" method="POST" class="theme_option-form">
    <?php wp_nonce_field('update-options'); ?>
    <!--
    <div class="theme_option-form-title"><?php _e('Настройки почты обратной связи', 'kubrick'); ?></div>
    <div class="theme_option-row">
        <div class="theme_option-label-box">
            <label for="address" class="theme_option-label"><?php _e('Куда отправлять сообщения:', 'kubrick'); ?></label>
        </div>
        <div class="theme_option-box">
            <input type="text" class="theme_option-field" name="address" id="address" value="<?=get_option('address')?>">
        </div>
    </div>
    <div class="theme_option-row">
        <div class="theme_option-label-box">
            <label for="siteEmail" class="theme_option-label"><?php _e('Адрес с которого отправляются сообщения:', 'kubrick'); ?></label>
        </div>
        <div class="theme_option-box">
            <input type="text" class="theme_option-number" name="siteEmail" id="siteEmail" value="<?=get_option('siteEmail')?>">
        </div>
    </div>
    <div class="theme_option-row">
        <div class="theme_option-label-box">
            <label for="sub" class="theme_option-label"><?php _e('Тема сообщения:', 'kubrick'); ?></label>
        </div>
        <div class="theme_option-box">
            <input type="text" class="theme_option-number" name="sub" id="sub" value="<?=get_option('sub')?>">
        </div>
    </div>
    -->
    <div class="theme_option-form-title"><?php _e('Настройки 1:', 'kubrick'); ?></div>
    <div class="theme_option-row">
        <div class="theme_option-label-box">
            <label for="option1" class="theme_option-label"><?php _e('Первое свойство:', 'kubrick'); ?></label>
        </div>
        <div class="theme_option-box">
            <input type="text" class="theme_option-field" name="option1" id="option1" value="<?=get_option('option1')?>">
        </div>
    </div>
    <div class="theme_option-row">
        <div class="theme_option-label-box">
            <label for="option2" class="theme_option-label"><?php _e('Второе свойство:', 'kubrick'); ?></label>
        </div>
        <div class="theme_option-box">
            <input type="text" class="theme_option-number" name="option2" id="option2" value="<?=get_option('option2')?>">
        </div>
    </div>
    <input type="hidden" name="action" value="update">
    <input type="hidden" name="page_options" value="
    option1,
    option2,
    //address,
    //siteEmail,
    //sub
    ">
    <div class="theme_option-button">
        <input type="submit"  value="Сохранить">
    </div>
</form>
<?php
}
/* -- конец настройки темы -- */

function kubrick_theme_page() {}
?>