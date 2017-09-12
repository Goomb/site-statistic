<?php
/**
 * Шаблон блока на сайте
 * 
 * Шаблонный тег <insert name="show_statistics" module="site" id="номер_страницы" [template="шаблон"]>:
 * выводит блок на сайте
 * 
 * @package    DIAFAN.CMS
 * @author     Goomb
 * @version    1.0
 */

if (! defined('DIAFAN'))
{
    $path = __FILE__; $i = 0;
	while(! file_exists($path.'/includes/404.php'))
	{
		if($i == 10) exit; $i++;
		$path = dirname($path);
	}
	include $path.'/includes/404.php';
}

if (empty($result)) {
	return false;
}

echo $this->diafan->_('Посетителей сегодня') . ': ' . $result['visitors_today_count'] . '<br>';
echo $this->diafan->_('Сейчас на сайте') . ': ' . $result['visitors_now_count'] . '<br>';
echo $this->diafan->_('Покупок сегодня') . ': ' . $result['orders_count'];
