<?php
/**
 * Шаблон блока на сайте
 * 
 * Шаблонный тег <insert name="show_block" module="site" id="номер_страницы" [template="шаблон"]>:
 * выводит блок на сайте
 * 
 * @package    DIAFAN.CMS
 * @author     diafan.ru
 * @version    6.0
 * @license    http://www.diafan.ru/license.html
 * @copyright  Copyright (c) 2003-2017 OOO «Диафан» (http://www.diafan.ru/)
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
