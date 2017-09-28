<?php
namespace Tools\Controller;
use Think\Controller;
class SystemController extends Controller {
  public function config(){
    $config = fopen("Application/Common/Conf/config.php", "w");
    $txt = <<<EOT
<?php
return array(
	//'配置项'=>'配置值'
  'URL_CASE_INSENSITIVE' =>true,      //开启不区分大小写
  // 'SHOW_PAGE_TRACE' => true,       //开启页面trace
  'URL_MODEL' => '2',
  'URL_HTML_SUFFIX'=>'',	//伪静态后缀
  'COOKIE_PATH' => '/',				//设置cookie目录

  'DB_TYPE'   => 'mysqli', // 数据库类型
  'DB_HOST'   => 'localhost', // 服务器地址
  'DB_NAME'   => 'adm', // 数据库名
  'DB_USER'   => 'root', // 用户名
  'DB_PWD'    => '5273847nuo',  // 密码
  'DB_PORT'   => '3306', // 端口
  'DB_PREFIX' => 'qy_', // 数据库表前缀

  //模块
  'MODULE_ALLOW_LIST'  => array('Home','Admin','Tools'),
  'DEFAULT_MODULE'       =>    'Home',
);
EOT;
    fwrite($config, $txt);
  }

  public function htaccess(){
    $htaccess = fopen(".htaccess", "w");
    $txt = <<<EOT
RewriteEngine on
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^(.*)$ index.php/$1 [QSA,PT,L]
EOT;
    fwrite($htaccess, $txt);
  }

  public function test(){
    $htaccess = fopen(".htaccess", "r");
    dump($htaccess);
    $txt = <<<EOT
RewriteEngine on
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^(.*)$ index.php/$1 [QSA,PT,L]
EOT;
    fwrite($htaccess, $txt);
  }
}