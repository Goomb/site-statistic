<?php
/**
 * Контроллер
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

/**
 * Site
 */
class Site extends Controller
{
	/**
	 * Шаблонная функция: выводит статистику по посетителям и заказам.
	 *
	 * @return void
	 */
	new public function show_statistics()
	{
		$result = $this->model->show_statistics();
		
		echo $this->diafan->_tpl->get('show_statistics', 'site', $result);
	}
}