<?php
/**
 * Created by PhpStorm.
 * 日志类
 * User: apple
 * Date: 2017/4/25
 * Time: 下午1:10
 */
namespace ut;

class Log{

    const LOG_LEVEL_NONE = 0x00;
    const LOG_LEVEL_FATAL = 0x01;
    const LOG_LEVEL_WARNING = 0x02;
    const LOG_LEVEL_NOTICE = 0x04;
    const LOG_LEVEL_TRACE = 0x08;
    const LOG_LEVEL_DEBUG = 0x10;
    const LOD_LEVEL_ALL = 0xFF;

    public static $arrLogLevels = [
        self::LOG_LEVEL_NONE => "NONE",
        self::LOG_LEVEL_FATAL => "FATAL",
        self::LOG_LEVEL_WARNING => "WARNING",
        self::LOG_LEVEL_NOTICE => "NOTICE",
        self::LOG_LEVEL_TRACE => "TRACE",
        self::LOG_LEVEL_DEBUG => "DEBUG",
        self::LOD_LEVEL_ALL => "ALL",
    ];

    protected $intLevel;
    protected $strLogFile;
    protected $arrSelfLogFiles;
    protected $intLogId;
    protected $intMaxFileSize;
    protected $addNotice = '';

    private static $instance = null;

    private function __construct($arrLogConfig = ''){
        if(!is_array($arrLogConfig)){
            $module = strtolower(\Yaf\Dispatcher::getInstance()->getRequest()->getModuleName());
            $log_config = new \Yaf\Config\Ini(APPLICATION_PATH . "/conf/log.ini", 'log');
            $log_config_arr = $log_config->toArray();
            $arrLogConfig['strLogFile'] = ROOT_PATH . '/' . $log_config_arr['logPath'] . '/' . MODULE . ".log";
        }
        $this->intLevel = $arrLogConfig['intLevel'];
        $this->strLogFile = $arrLogConfig['strLogFile'];   //log路径
        $this->arrSelfLogFiles = $arrLogConfig['arrSelfLogFiles'];
        $this->intLogId = 0;
        $this->intMaxFileSize = $arrLogConfig['intMaxFileSize'];

    }

    public static function init($arrLogConfig = ''){
        if(self::$instance == null){
            self::$instance = new \ut\Log($arrLogConfig);
        }
    }

    public static function getInstance(){

        if(self::$instance == null){
            self::$instance = new \ut\Log();
        }

        return self::$instance;
    }

    public function writeLog($intLevel, $str, $errno = 0, $arrArgs = null, $depth = 0){
        if(!($this->intLevel & $intLevel) || !isset(self::$arrLogLevels[$intLevel])){
            return false;
        }
        $strLevel = self::$arrLogLevels[$intLevel];
        $strLogFile = $this->strLogFile;

        if(($intLevel & self::LOG_LEVEL_WARNING) || ($intLevel & self::LOG_LEVEL_FATAL)){
            $strLogFile .= '.wf';
        }

        $trace = debug_backtrace();
        if( $depth >= count($trace) ){
            $depth = count($trace) - 1;
        }

        $file = basename($trace[$depth]['file']);
        $line = $trace[$depth]['line'];

        $strArgs = '';
        if(is_array($arrArgs) && count($arrArgs) > 0){
            foreach ($arrArgs as $key => $value){
                $strArgs .= "{$key}[$value]";
            }
        }

        $str = sprintf("%s: %s [%s:%d] errno[%d] ip[%s] logId[%u] mod[%s] uri[%s] refer[%s] cookie[%s] %s %s\n",
               $strLevel,
                date('Y-m-d H:i:s', time()),
                $file, $line, $errno,
                self::getClientIP(),
                \ut\Log::getLogID(),
                APP,
                isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '',
                isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '',
                isset($_SERVER['HTTP_COOKIE']) ? $_SERVER['HTTP_COOKIE'] : '',
                $strArgs,
                $str);

        if($this->intMaxFileSize > 0){
            clearstatcache();
            $arrFileStats = stat($strLogFile);
            if( is_array($arrFileStats) && floatval($arrFileStats['size']) > $this->intMaxFileSize )
            {
                $strLogFile .= date('YmdH');
            }
        }

        return file_put_contents($strLogFile, $str, FILE_APPEND);

    }

    public static function warning($str, $errno = 0, $arrArgs = null, $depth = 0){
        $log = self::getInstance();
        return $log->writeLog(self::LOG_LEVEL_WARNING, $str, $errno, $arrArgs, $depth + 1);
    }

    public static function notice($str, $errno = 0, $arrArgs = null, $depth = 0){
        $log = \ut\Log::getInstance();
        return $log->writeLog(self::LOG_LEVEL_NOTICE, $str, $errno, $arrArgs, $depth + 1);
    }

    public static function fatal($str, $errno = 0, $arrArgs = null, $depth = 0){
        $log = \ut\Log::getInstance();
        return $log->writeLog(self::LOG_LEVEL_FATAL, $str, $errno, $arrArgs, $depth + 1);
    }

    public static function trace($str, $errno = 0, $arrArgs = null, $depth = 0){
        $log = \ut\Log::getInstance();
        return $log->writeLog(self::LOG_LEVEL_TRACE, $str, $errno, $arrArgs, $depth + 1);
    }

    public static function getClientIP(){
        return \ut\Ip::getClientIp();
    }

    static function getLogID(){
        if ( isset($_SERVER['HTTP_X_BD_LOGID']) ) {
            return intval($_SERVER['HTTP_X_BD_LOGID']);
        } else {
            $arr = gettimeofday();
            return ((($arr['sec']*100000 + $arr['usec']/10) & 0x7FFFFFFF) | 0x80000000);
        }
    }


}