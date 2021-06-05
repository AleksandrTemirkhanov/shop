<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'shop' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'root' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', '010203' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'B0l,IV&?[Ri)DUdcf3X.st[HsZ3Zlrliq.l>#NDPl{=35[|}{m76~%+//&8*of>H' );
define( 'SECURE_AUTH_KEY',  '$t# ]?6}b;x<:b?b6H8oVQa?}@EtGO`poPjf@Dw!aRExEoZJX8WrbIij[10<=TT5' );
define( 'LOGGED_IN_KEY',    ' W 05^,s-Ynzd~-ba;mz(zU)xnf&tyhZfdNO_EjOZ? At5JnL=lC6MI3kV*xK HA' );
define( 'NONCE_KEY',        '<HXlP}knD-D*@JbAv@G_0dTBx84p:3`,!KliE,$T7 P*k{IQgi)=!xU}g.7Y6=Nc' );
define( 'AUTH_SALT',        '^gp_t}X!Oc7,<qOipcSDylGjAhh,@H1 IY<!s<.&-fxc4;SZh>PH85:J6XQ+AQ6k' );
define( 'SECURE_AUTH_SALT', '%*<UHN!ul6,Y);z46:FTw9;ul~g>_; k3lIx.U~S+FPVW_o(x.dC*Gs[V^z+|6.-' );
define( 'LOGGED_IN_SALT',   '8S)X?54M~9KB~pn>+]AEi{~iBG_o}LOjR_2FL r8^D((XbdMMH`Ya*jc#}-,n#4[' );
define( 'NONCE_SALT',       '8e=gJ;ZB|ZHK.Pu!c|fq5tU^}|..$L}F{$Ev0LZ`_OlEz|^(sp$D/dK<:Uf J:X;' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';
define('FS_METHOD','direct');
/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
