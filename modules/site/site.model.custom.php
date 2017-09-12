<?php
/**
 * Модель
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
 * Site_model
 */
class Site_model extends Model
{
	/**
	 * Генерирует данные для
	 * шаблонного тега <insert name="show_statistics" module="site">:
	 * выводит статистику по посетителям и заказам.
	 *
	 * @return void
	 */
	new public function show_statistics()
	{
		$result = array();

		$timestamp_now = time() - 900;
		$start_timestamp = strtotime("today 00:00");
		$end_timestamp = strtotime("today 23:59");

		$result['orders_count'] = DB::query_result("SELECT COUNT(id) FROM {shop_order} WHERE created>=%d AND created<=%d", $start_timestamp, $end_timestamp);
		$result['visitors_now_count'] = DB::query_result("SELECT COUNT(session_id) FROM {sessions} WHERE timestamp>=%d", $timestamp_now);
		$result['visitors_today_count'] = DB::query_result("SELECT COUNT(session_id) FROM {sessions} WHERE timestamp>=%d AND timestamp<=%d", $start_timestamp - 900, $end_timestamp - 900);
		
		return $result;
	}
}