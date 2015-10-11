<?php

function load_styles_and_scripts() {
	if ( !is_admin() ) {
		//js
		wp_enqueue_script( 'newjquery', 'https://code.jquery.com/jquery-2.1.4.min.js' );
		wp_enqueue_script( 'myScript', get_template_directory_uri() . '/js/script.js' );
		wp_enqueue_script( 'bootstup', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js' );
		//css
		wp_enqueue_style( 'bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css' );
		wp_enqueue_style( 'bootstrapTheme', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css' );
		wp_enqueue_style( 'font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css' );
		wp_enqueue_style( 'style1', get_template_directory_uri() . '/style.css' );
	}
}

//подгружаем стили скрипты при загрузке страниц  
add_action( wp_enqueue_scripts(), load_styles_and_scripts() );

/* * *
 * подключаем меню  
 * * */
add_theme_support( 'menus' );
register_nav_menus( array(
	"header-menu" => "Самое верхнее меню",
	"bottom-menu" => "Самое нижнее меню"
) );

function topMenu() {
	wp_nav_menu( array(
		'theme_location' => 'header-menu',
		'menu' => 'header-menu',
		'menu_class' => 'HeadermenuList nav navbar-nav '
	) );
}

function bottomMenu() {
	wp_nav_menu( array(
		'theme_location' => 'bottom-menu',
		'menu' => 'bottom-menu',
		'menu_class' => 'BottomMenuList',
	) );
}

/* * *
 * делаем возможным подключение миниатюр записи   
 * * */
add_theme_support( 'post-thumbnails' );

function the_ThemeOptions() {
	if ( function_exists( 'ot_get_option' ) ) {
		$logo = ot_get_option( 'logo', array() );
		if ( !empty( $logo ) ) {
			echo "#logoPlace{ background: url($logo) no-repeat;}";
		}
	}
}

function getField( $val ) {
	if ( function_exists( 'ot_get_option' ) ) {
		$field = ot_get_option( $val );
		return $field;
	}
	return "";
}

function getFieldsAsArray( $val ) {
	if ( function_exists( 'ot_get_option' ) ) {
		$field = ot_get_option( $val );
		return $field;
	}
	return "";
}

//возникла идеа описать новый класс при ообращении к постам ,
// для того чтобы минимилизировать код на странице ,
//  сделать больше проверок , но есть другие задачи.  




/*
 * Делаем возможным прием сообщений 
 */
function addMessage() {
	$name = $_REQUEST['name'];
	$email = $_REQUEST['email'];
	$text = $_REQUEST['text'];
	$paterName = "/^[a-zA-Z]|[а-яА-Я]{2,16}+$/";
	$paternEmail = "/^[a-zA-Z]{1}+\w{2,16}+@+\w{2,10}+\.+\w{1,4}+$/";
	
	//проверки на ввод 
	if ( !preg_match( $paterName, $name ) ) {
		die( '{"error":"Не корректно введено  '.$name.' "}' );
	} else if ( !preg_match( $paternEmail, $email ) ) {
		die( '{"error":"не корректно введен email"}' );
	} else if ( empty ( $text) && strlen( $text ) < 200 ) {
		die( '{"error":"Нет текста , или привышено допустимых количество символов "}' );
	} else {
		$massage = add_to_bd( $name, $email, $text );
				if($massage === 1 ){
					die( '{"sucesfful":"Поздравляем , ваше сообщение отправлено"}' );
				}else {
					die( '{"error":"Такой пользователь уже оставил сообщение"}' );
				}
	}
	die( '{"error":"error"}' );
}

add_action( "wp_ajax_(addMessage)", "addMessage" );
add_action( "wp_ajax_nopriv_(addMessage)", "addMessage" );


// наша таблица с сообщениями 
$table_nameformassages = $wpdb->prefix . "massages";

function add_to_bd( $name, $email, $text ) {
	global $wpdb;
	global $table_nameformassages;
	if ( $wpdb->get_var( "SHOW TABLES LIKE '$table_nameformassages'" ) != $table_nameformassages ) {
		$sql = "CREATE TABLE IF NOT EXISTS `" . $table_nameformassages . "` (
			        `id` bigint(20) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
				    `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
                    `email` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
                    `text` varchar(201) COLLATE utf8_unicode_ci NOT NULL,
                    `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
                     UNIQUE KEY `email` (`email`)
                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;";
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		dbDelta( $sql );
		die( '{"sucesfful":"создали бд"}' );
	}
	$sql = $wpdb->prepare( 'INSERT INTO `'.$table_nameformassages.'`( `name`, `email`, `text`) VALUES (%s,%s,%s);'
			, [$name, $email, $text ] );
	return  $wpdb->query( $sql );
	
}


/*
 * вытягиваем из БД сообщения SELECT name , text , date
                              FROM `wp_massages`
                              ORDER BY RAND()
							  LIMIT 10
 * хотел свой обьект передавать , но тоже времени уже нет 
 */
function getMassages($limit) {
	global $wpdb;
	global $table_nameformassages;
	$var = $wpdb->get_results( "SELECT name , text , date
                              FROM `$table_nameformassages`
                              ORDER BY RAND()
							  LIMIT $limit" );
	//print_r($array);
	if ( $var == null ) {
		return array("error");
	}
	return $var;
}
