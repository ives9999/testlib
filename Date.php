<?php
namespace bluemobile\lib;

/**
 * @brief 日期時間物件
 *
 * 透過此物件操作日期時間的相關功能
 */
class Date{
    static $CAL_DATE_VALUES = array(
        'weeks'=>array('日','一','二','三','四','五','六'),
        'weekabbrs'=>array('日','一','二','三','四','五','六'),
        'months'=>array('','一月','二月','三月','四月','五月','六月','七月','八月','九月','十月','十一月','十二月'),
        'monthabbrs'=>array('','一月','二月','三月','四月','五月','六月','七月','八月','九月','十月','十一月','十二月'),
    );

    /**
     * @brief 取得現在時間的「年份」
     *
     * @return	四位數的年份	2010
     */
    public static function getToday_y(){
        $now  = mktime (date("H"),date("i"),date("s"),date("m"),date("d"),date("Y"));
        $today = getdate($now);
        return $year = $today['year'];
    }
    /**
     * @brief 取得現在時間的「月份」
     *
     * @return	月份	02
     */
    public static function getToday_m(){
        $now  = mktime (date("H"),date("i"),date("s"),date("m"),date("d"),date("Y"));
        $today = getdate($now);
        $month = $today['mon'];
        if (strlen($month) == 1)
            $month = "0".$month;
        return $month;
    }
    /**
     * @brief 取得現在時間的「日期」
     *
     * @return	日期	09
     */
    public static function getToday_d(){
        $now  = mktime (date("H"),date("i"),date("s"),date("m"),date("d"),date("Y"));
        $today = getdate($now);
        $mday = $today['mday'];
        if (strlen($mday) == 1)
            $mday = "0".$mday;
        return $mday;
    }
    /**
     * @brief 取得現在時間的「時」
     *
     * @return	時	08
     */
    public static function getToday_h(){
        $now  = mktime (date("H"),date("i"),date("s"),date("m"),date("d"),date("Y"));
        $today = getdate($now);
        $hours = $today['hours'];
        if (strlen($hours) == 1)
            $hours = "0".$hours;
        return $hours;
    }
    /**
     * @brief 取得現在時間的「分」
     *
     * @return	分	08
     */
    public static function getToday_mi(){
        $now  = mktime (date("H"),date("i"),date("s"),date("m"),date("d"),date("Y"));
        $today = getdate($now);
        $minutes = $today['minutes'];
        if (strlen($minutes) == 1)
            $minutes = "0".$minutes;
        return $minutes;
    }
    /**
     * @brief 取得現在時間的「秒」
     *
     * @return	秒	08
     */
    public static function getToday_s(){
        $now  = mktime (date("H"),date("i"),date("s"),date("m"),date("d"),date("Y"));
        $today = getdate($now);
        $seconds = $today['seconds'];
        if (strlen($seconds) == 1)
            $seconds = "0".$seconds;
        return $seconds;
    }
    /**
     * @brief 取得現在的日期20100803
     *
     * @return	現在日期	20100803
     */
    public static function getToday(){
        return Date::getToday_y().Date::getToday_m().Date::getToday_d();
    }
    /**
     * @brief 取得現在的日期時間2010-08-03 02:06:39
     *
     * @return	現在日期時間	2010-08-03 02:06:39
     */
    public static function getDateTime(){
        return Date::getToday_y()."-".Date::getToday_m()."-".Date::getToday_d()." ".Date::getToday_h().":".Date::getToday_mi().":".Date::getToday_s();
    }
    /**
     * @brief 取得現在的日期2010-08-03
     *
     * @return	現在日期	2010-08-03
     */
    public static function getDate(){
        return Date::getToday_y()."-".Date::getToday_m()."-".Date::getToday_d();
    }
    /**
     * @brief 取得現在的時間09:25:34
     *
     * @return	現在時間	09:25:34
     */
    public static function getTime(){
        return Date::getToday_h().":".Date::getToday_mi().":".Date::getToday_s();
    }
    /**
     * @brief 取得現在的日期時間2010-08-03 02:06:39
     *
     * @return	現在日期時間	2010-08-03 02:06:39
     */
    public static function now(){
        return Date::getToday_y()."-".Date::getToday_m()."-".Date::getToday_d()." ".Date::getToday_h().":".Date::getToday_mi().":".Date::getToday_s();
    }
    /**
     * @brief Return current Unix timestamp
     *
     * @return	current Unix timestamp
     */
    public static function currentTime(){
        return time();
    }
    /**
     * @brief alias of getToday
     *
     * @return	現在日期時間	2010-08-03
     */
    public static function today(){
        return Date::getToday();
    }
    /**
     * @brief 昨天的日期
     *
     * @return	昨天日期	2010-08-03
     */
    public static function yesterday(){
        return date("Y-m-d", mktime(0, 0, 0, date("m")  , date("d")-1, date("Y")));
    }
    /**
     * @brief 明天的日期
     *
     * @return	明天日期	2010-08-03
     */
    public static function tomorrow(){
        return date("Y-m-d", mktime(0, 0, 0, date("m")  , date("d")+1, date("Y")));
    }	/**
 * @brief 上星期的日期
 *
 * @return	上星期的日期	2010-08-03
 */
    public static function lastweek(){
        return date("Y-m-d", mktime(0, 0, 0, date("m")  , date("d")-7, date("Y")));
    }
    /**
     * @brief 上個月的日期
     *
     * @return	上個月的日期	2010-08-03
     */
    public static function lastmonth(){
        return date("Y-m-d", mktime(0, 0, 0, date("m")-1  , date("d"), date("Y")));
    }
    /**
     * @brief 兩個時間的比較，相等傳回0，前面大(日期比較後面)，傳回1，後面大傳回-1
     *
     * @param	$a	第一個時間	2008-01-25 or 2008-01-25 14:25:00
     * @param	$b	第一個時間
     * @return	相等傳回0，前面大，傳回1，後面大傳回-1
     */
    public static function compareDate($a, $b){
        $a_date = strtotime($a);
        $b_date = strtotime($b);
        if ($a_date > $b_date)
            return 1;
        else if ($a_date == $b_date)
            return 0;
        else
            return -1;
    }
    /**
     * @brief 跟今天的日期比較，相等傳回0，要比較的日期大(日期比較後面)，傳回1，今天大傳回-1
     *
     * @param	$a	要比較的日期	2008-01-25
     * @return	相等傳回0，要比較的日期大(日期比較後面)，傳回1，今天大傳回-1
     */
    public static function compareToday($a){
        $today = date("Y-m-d");
        return Date::compareDate($a, $today);
    }
    /**
     * @brief 跟現在的時間比較，相等傳回0，要比較的時間大(時間比較後面)，傳回1，現在大傳回-1
     *
     * @param	$a	要比較的時間	2008-01-25 14:05:12
     * @return	相等傳回0，要比較的時間大(時間比較後面)，傳回1，今天大傳回-1
     */
    public static function compareNow($a){
        $now = Date::now();
        return Date::compareDate($a, $now);
    }
    /**
     * @brief 日期加減
     *
     * @param	$date		基準日期
     * @param	$day		加減天數，減三天請傳-3
     * @param	$pattern	傳回日期的樣式，預設為2010-05-21
     * @return	傳回加減後的日期
     */
    public static function addDate($date=NULL, $day, $pattern='Y-m-d') {
    	if (empty($date)) {
    		$date = self::getToday();
	    }
        $sum = strtotime(date($pattern, strtotime("$date")) . " +$day days");
        $dateTo = date($pattern, $sum);
        return $dateTo;
    }
    /**
     * @brief 依照pattern取得現在日期的格式
     *
     * @param	$pattern	傳回日期的樣式
     * @return	傳回所傳樣式的日期
     */
    public static function getDate1($pattern){
        return date($pattern);
    }
    /**
     * @brief 取得年、月參數上個月的月份數字，預設不補0
     *
     * @param	$pattern	要傳回月份的樣式NULL表示不補0，"m"表示補0
     * @param	$m			要計算的月份數字NULL表示當月
     * @param	$y			要計算的年份數字NULL表示今年
     * @return	傳回上個月的月份數字
     */
    public static function lastmonth1($pattern=NULL, $m=NULL, $y=NULL){
        $pattern = (empty($pattern))?"n":$pattern;
        $y = (empty($y))?date("Y"):$y;
        $m = (empty($m))?date("m"):$m;
        return date($pattern, mktime(0, 0, 0, $m-1, 1, $y));
    }
    /**
     * @brief 取得年、月參數下個月的月份數字，預設不補0
     *
     * @param	$pattern	要傳回月份的樣式NULL表示不補0，"m"表示補0
     * @param	$m			要計算的月份數字NULL表示當月
     * @param	$y			要計算的年份數字NULL表示今年
     * @return	傳回下個月的月份數字
     */
    public static function nextmonth1($pattern=NULL, $m=NULL, $y=NULL){
        $pattern = (empty($pattern))?"n":$pattern;
        $y = (empty($y))?date("Y"):$y;
        $m = (empty($m))?date("m"):$m;
        return date($pattern, mktime(0, 0, 0, $m+1, 1, $y));
    }
    /**
     * @brief 取得某年某月前幾天的日期，傳回要取得的最後一天日期，請自行再往回減
     *
     * @param	$year		要計算的年份數字NULL表示今年
     * @param	$month		要計算的月份數字NULL表示當月
     * @param	$pattern	要傳回的日期樣式，不傳表示"Y-m-d"
     * @return	傳回要取得的最後一天日期
     * @deprecated	好像不需要
     */
    public static function getMonthBeginDays($year, $month, $days, $pattern=NULL){
        $pattern = (empty($pattern))?"Y-m-d":$pattern;
        $begin = mktime(0, 0, 0, $month, $days, $year);
        return date($pattern, $begin);
    }
    /**
     * @brief 取得某年某月最後幾天的日期，傳回要取得的最後一天日期，請自行再往前加
     *
     * getMonthLastDays(2010, 6, 3)=>傳回2010-06-28
     * @param	$year		要計算的年份數字NULL表示今年
     * @param	$month		要計算的月份數字NULL表示當月
     * @param	$days		最後幾天的天數
     * @param	$pattern	要傳回的日期樣式，不傳表示"Y-m-d"
     * @return	依照樣式傳回要取得的最後一天日期
     */
    public static function getMonthLastDays($year, $month, $days, $pattern=NULL){
        $pattern = (empty($pattern))?"Y-m-d":$pattern;
        $text = "+1month -".$days."day";
        $begin = mktime(0, 0, 0, $month, 1, $year);
        $end = strtotime($text, $begin);
        return date($pattern, $end);
    }
    /**
     * @brief 取得該月份的最後一天的日期
     *
     * getMonthLastDays(NULL, 2010, 2)=>傳回2010-02-28
     * @param	$pattern	要傳回的日期樣式，NULL或不傳表示"Y-m-d"
     * @param	$y			要計算的年份數字NULL表示今年
     * @param	$m			要計算的月份數字NULL表示當月
     * @return	依照樣式傳回要取得的最後一天日期
     */
    public static function getMonthDays($pattern=NULL, $y=NULL, $m=NULL){
        $pattern = (empty($pattern))?"Y-m-d":$pattern;
        $y = (empty($y))?date("Y"):$y;
        $m = (empty($m))?date("m"):$m;
        return date($pattern, strtotime("+1 month -1 day", strtotime(date("$y-$m-01"))));
    }
    /**
     * @brief 解析標準日期時間寫法
     *
     * @param	$val		要解析的日期時間，必須是標準格式「2010-02-15 12:14:54」否則會有問題，沒有做錯誤處理"
     * @return	array(y, m, d, h, i, s);
     */
    public static function parseDateTime($val){
        $temps = explode(" ", $val);
        $dates = explode("-", $temps[0]);
        foreach ($dates as $key => $value) {
            $dates[$key] = intval($value);
        }
        if (count($temps) > 1) {
	        $times = explode(":", $temps[1]);
	        return array("y" => $dates[0], "m" => $dates[1], "d" => $dates[2], "h" => $times[0], "i" => $times[1], "s" => $times[2]);
        } else {
	        return array("y" => $dates[0], "m" => $dates[1], "d" => $dates[2]);
        }
    }
    /**
     * @brief   the same as time()
     *
     * @return Returns the current time measured in the number of seconds since the Unix Epoch (January 1 1970 00:00:00 GMT).
     */
    public static function time(){
        return time();
    }

    /**
     * @brief   將日期或時間做自訂格式化的輸出，例如  2013-12-04 05:00  或 08:00
     * @param $val          date time or date or time
     * @param $format     "Y-m-d H:i:s" etc
     * @return string
     */
    public static function formatDateTime($val, $format){
        $dateTime = new \DateTime($val);
        return $dateTime->format($format);
    }
    /**
     * @brief   將日期時間的秒數拿掉，例如  2013-12-04 05:00:14  結果 2013-12-04 05:00
     * @param $val        date time or date or time
     * @param $format     "Y-m-d H:i" 輸出格式
     * @return string	沒有秒數的結果
     */
    public static function noSec($val, $format="Y-m-d H:i"){
        if (!empty($val)){
            $res = Date::formatDateTime($val, $format);
        }
        return $res;
    }
    /**
     * @brief   將日期時間的時間拿掉，例如  2013-12-04 05:00:14  結果 2013-12-04
     * @param $val        date time or date or time
     * @param $format     "Y-m-d" 輸出格式
     * @return string	沒有秒數的結果
     */
    public static function noTime($val, $format="Y-m-d"){
        if (!empty($val)){
            $res = Date::formatDateTime($val, $format);
        }
        return $res;
    }

    /**
     * @brief                   取得兩時間的間隔長度，回傳為陣列，幾天、幾小時、幾分、幾秒
     * @param $ts1              開始時間
     * @param $ts2              結束時間
     * @param string $format    預設是時間字串，轉換為1970到時間的秒數
     * @return array|bool       array(days, hours, minutes, seconds)
     */
    public static function getTimeInterval($ts1, $ts2, $format="string"){
        if ($format == "string"){
            $ts2 = strtotime($ts2);
            $ts1 = strtotime($ts1);
        }
        $interval = (int)$ts2 - (int)$ts1;
        if ( $interval < 0 ) {
            return false;
        } else {
            $days = floor($interval / 86400); // seconds in one day
            $interval = $interval % 86400;
            $hours = floor($interval / 3600);
            $interval = $interval % 3600;
            $minutes = floor($interval / 60);
            $interval = $interval % 60;
            $seconds = $interval;
        }
        return array(
            'days' => $days,
            'hours' => $hours,
            'minutes' => $minutes,
            'seconds' => $seconds
        );
    }

    /**
     * @brief           多少時間前，類似fb的函式
     * @param       $ptime timestamp or datetime string
     * @return        string time ago
     */
    public static function time_elapsed_string($timestamp){
        if (is_string($timestamp)){
            $timestamp = strtotime($timestamp);
        }
        //type cast, current time, difference in timestamps
        $timestamp      = (int) $timestamp;
        $current_time   = time();
        $diff           = $current_time - $timestamp;

        //intervals in seconds
        $intervals      = array (
            'year' => 31556926, 'month' => 2629744, 'week' => 604800, 'day' => 86400, 'hour' => 3600, 'minute'=> 60
        );

        //now we just find the difference
        if ($diff == 0){
            return 'just now';
        }

        if ($diff < 60){
            return $diff == 1 ? $diff . '秒 之前' : $diff . '秒 之前';
        }

        if ($diff >= 60 && $diff < $intervals['hour']){
            $diff = floor($diff/$intervals['minute']);
            return $diff == 1 ? $diff . '分 之前' : $diff . '分 之前';
        }

        if ($diff >= $intervals['hour'] && $diff < $intervals['day']){
            $diff = floor($diff/$intervals['hour']);
            return $diff == 1 ? $diff . '小時 之前' : $diff . '小時 之前';
        }

        if ($diff >= $intervals['day'] && $diff < $intervals['week']){
            $diff = floor($diff/$intervals['day']);
            return $diff == 1 ? $diff . '天 之前' : $diff . '天 之前';
        }

        if ($diff >= $intervals['week'] && $diff < $intervals['month']){
            $diff = floor($diff/$intervals['week']);
            return $diff == 1 ? $diff . '星期 之前' : $diff . '星期 之前';
        }

        if ($diff >= $intervals['month'] && $diff < $intervals['year']){
            $diff = floor($diff/$intervals['month']);
            return $diff == 1 ? $diff . '個月 之前' : $diff . '個月 之前';
        }

        if ($diff >= $intervals['year']){
            $diff = floor($diff/$intervals['year']);
            return $diff == 1 ? $diff . '年 之前' : $diff . '年 之前';
        }
    }
    /**
     * @brief   取得年紀
     * @param $val          date time or date
     * @return int
     */
    public static function getYearsOld($val){
        $y = Date::formatDateTime($val, 'Y');
        $y = (int)$y;
        if ($y < 1911){
            return -1;
        }
        $now_y = Date::getToday_y();
        $now_y = (int)$now_y;
        $y = $now_y-$y+1;

        return $y;
    }

    /**
     * date time string to time stamp, main use for sort order.
     * @param $val	date time string
     * @return int	$val timestamp
     */
    public static function date2TimeStamp($val){
        return strtotime($val);
    }
    /**
     * timestamp to dat time string.
     * @param int	$val timestamp
     * @return $val	date time string
     */
    public static function timestamp2Date($val, $format="Y-m-d H:i:s"){
        return date($format, $val);
    }
    /**
     * get microtime timestamp, main use for sort order.
     * @return int	$val timestamp
     */
    public static function microtime(){
        return round(microtime(true) * 1000);
    }

    /**
     * alias for microtime()
     * @return int
     */
    public static function milliseconds(){
        return Date::microtime();
    }

	/**
	 * @brief   取得傳進日期的星期幾，如果不傳則拿現在的日期
	 * @param $v            date(2018-02-06) default NULL 表示使用今天
	 * @param $chinese      true 表示傳回中文的星期幾，false 表示傳回數字，default is false
	 * @return int or text
	 */
	public static function dateToWeek($v=NULL, $chinese=false){
    	if (empty($v)) {
    		$v = self::getToday();
	    }
        $res = date('w', strtotime($v));
    	if ($chinese) {
		    $res = Date::$CAL_DATE_VALUES['weeks'][$res];
	    }
        //myEcho($res);

        return $res;
    }

    public static function i2weekday($val, $short=true)
    {
        $val = ($val == 7)?0:$val;
        $val = self::$CAL_DATE_VALUES['weeks'][$val];
        if (!$short) {
            $val = "星期" . $val;
        }
        return $val;
    }

}