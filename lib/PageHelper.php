<?php
class PageHelper {
	/**
	 * 返回分页代码
	 * @param string $module
	 * @param string $controller
	 * @param string $action
	 * @param int $total
	 * @param int $page
	 * @param int $pagesize
	 * @param array $param
	 */
	public static function initPage($module, $controller, $action, $total, $page, $pagesize, $param){
		$a_arr = array();
		$url_first_page = URL::encode(array_merge($param, array('page' => 1, 'pagesize' => $pagesize)), $module, $controller, $action);
		$a_arr[] = "<a href='{$url_first_page}'>首页</a>";
		$url_last_page = URL::encode(array_merge($param, array('page' => max($page - 1, 1), 'pagesize' => $pagesize)), $module, $controller, $action);
		$a_arr[] = "<a href='{$url_last_page}'>上一页</a>";
		
		for ($i = 1; $i <= ceil($total*1.0/$pagesize); $i++) {
			$url_cur_page = URL::encode(array_merge($param, array('page' => $i, 'pagesize' => $pagesize)), $module, $controller, $action);
			$a_arr[] = "<a href='{$url_cur_page}'>{$i}</a>";
		}
		
		$url_next_page = URL::encode(array_merge($param, array('page' => min(ceil($total*1.0/$pagesize), $page + 1), 'pagesize' => $pagesize)), $module, $controller, $action);
		$a_arr[] = "<a href='{$url_next_page}'>下一页</a>";
		$url_tail_page = URL::encode(array_merge($param, array('page' => ceil($total*1.0/$page), 'pagesize' => $pagesize)), $module, $controller, $action);
		$a_arr[] = "<a href='{$url_tail_page}'>尾页</a>";
		
		$str = implode('', $a_arr);
		
		$ret = "<div class='page s_width center text-right'>
					{$str}<div style='clear: both'></div>
				</div>";
		return $ret;
	}
}

?>