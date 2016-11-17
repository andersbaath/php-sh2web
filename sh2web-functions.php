<?php
### FunctionShDupLightSetScenario ###########################################################
function FunctionShDupLightSetScenario($CONTROLLER, $USERNAME, $PASSWORD, $SCENARIO, $ID) {
	$LOGONURL = "http://$CONTROLLER/index.php";
	$url = $LOGONURL;

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	curl_setopt($ch, CURLOPT_URL, $url); 
	$cookie = 'cookies.txt';
	$timeout = 30;
	curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_TIMEOUT,         10); 
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT,  $timeout );
	curl_setopt($ch, CURLOPT_COOKIEJAR,       $cookie);
	curl_setopt($ch, CURLOPT_COOKIEFILE,      $cookie);
	curl_setopt ($ch, CURLOPT_POST, 1); 
	curl_setopt ($ch,CURLOPT_POSTFIELDS,"username=$USERNAME&password=$PASSWORD");     

	$resultA = curl_exec($ch);

	$curl_header = array('X-Requested-With: XMLHttpRequest');
	$data = "param=$ID&st=-1&action=s$SCENARIO&mvm=-1";
	$COMMANDURL = "http://$CONTROLLER/do.php?command=rollerSendCmd";
	$ch = curl_init($COMMANDURL);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $curl_header);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_VERBOSE, false);
	curl_setopt($ch, CURLOPT_COOKIEJAR,       $cookie);
	curl_setopt($ch, CURLOPT_COOKIEFILE,      $cookie);

	$resultB = curl_exec($ch);
	curl_close($ch);
	return $SCENARIO;
	}
##############################################################################################

### FunctionShDupLightToggleState ###########################################################
function FunctionShDupLightToggleState($CONTROLLER, $USERNAME, $PASSWORD, $ID) {
        $LOGONURL = "http://$CONTROLLER/index.php";
        $url = $LOGONURL;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        curl_setopt($ch, CURLOPT_URL, $url); 
        $cookie = 'cookies.txt';
        $timeout = 30;
        curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT,         10); 
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT,  $timeout );
        curl_setopt($ch, CURLOPT_COOKIEJAR,       $cookie);
        curl_setopt($ch, CURLOPT_COOKIEFILE,      $cookie);
        curl_setopt ($ch, CURLOPT_POST, 1); 
        curl_setopt ($ch,CURLOPT_POSTFIELDS,"username=$USERNAME&password=$PASSWORD");     

        $result = curl_exec($ch);

        $curl_header = array('X-Requested-With: XMLHttpRequest');
        $data = "param=$ID&st=-1";
        $COMMANDURL = "http://$CONTROLLER/do.php?command=do";
        $ch = curl_init($COMMANDURL);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $curl_header);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_VERBOSE, false);
        curl_setopt($ch, CURLOPT_COOKIEJAR,       $cookie);
        curl_setopt($ch, CURLOPT_COOKIEFILE,      $cookie);

        $result = curl_exec($ch);
        curl_close($ch);
}
##############################################################################################

### FunctionShDupLightStatus ###################################################################
### If $SWITCH is set to 0 all functions values are returned if $SWITCH is set to 1 only state is returned 1/0 (on/off)
function FunctionShDupLightStatus($CONTROLLER, $USERNAME, $PASSWORD, $ID, $SWITCH) {
        $LOGONURL = "http://$CONTROLLER/index.php";
        $url = $LOGONURL;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        $cookie = 'cookies.txt';
        $timeout = 30;
        curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT,         10);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT,  $timeout );
        curl_setopt($ch, CURLOPT_COOKIEJAR,       $cookie);
        curl_setopt($ch, CURLOPT_COOKIEFILE,      $cookie);
        curl_setopt ($ch, CURLOPT_POST, 1);
        curl_setopt ($ch,CURLOPT_POSTFIELDS,"username=$USERNAME&password=$PASSWORD");

        $result = curl_exec($ch);

	$LOGONURL = "http://$CONTROLLER/refresh.php?param[0][]=switch$ID&param[0][]=$ID&param[0][]=switch&param[1][]=function_state&param[1][]=$ID&param[1][]=text";
        $url = $LOGONURL;

        curl_setopt ($ch, CURLOPT_POST, 0);
        curl_setopt($ch, CURLOPT_URL, $url);
        $result = curl_exec($ch);

        $RESULTARRAY = json_decode($result, true);

        if ($SWITCH == 1){
		return $RESULTARRAY["switch$ID"][1];
        }
        else{
                return $RESULTARRAY;
        }
        curl_close($ch);
}
##############################################################################################

### FunctionShDupTempRegStatus ###############################################################
### FunctionShDupTempRegStatus(<ip/dns>, <username>, <password>, <functionid>, optional<0>returns array <1> returns room temp value)
function FunctionShDupTempRegStatus($CONTROLLER, $USERNAME, $PASSWORD, $ID, $ROOMTEMP) {
        $LOGONURL = "http://$CONTROLLER/index.php";
        $url = $LOGONURL;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        curl_setopt($ch, CURLOPT_URL, $url); 
        $cookie = 'cookies.txt';
        $timeout = 30;
        curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT,         10); 
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT,  $timeout );
        curl_setopt($ch, CURLOPT_COOKIEJAR,       $cookie);
        curl_setopt($ch, CURLOPT_COOKIEFILE,      $cookie);
        curl_setopt ($ch, CURLOPT_POST, 1); 
        curl_setopt ($ch,CURLOPT_POSTFIELDS,"username=$USERNAME&password=$PASSWORD");     

        $result = curl_exec($ch);

        $LOGONURL = "http://$CONTROLLER/refresh.php?param[0][]=active_set&param[0][]=$ID&param[0][]=text&param[1][]=heating_status&param[1][]=$ID&param[1][]=text&param[2][]=troom_value&param[2][]=$ID&param[2][]=text";
        $url = $LOGONURL;

	curl_setopt ($ch, CURLOPT_POST, 0); 
	curl_setopt($ch, CURLOPT_URL, $url);
	$result = curl_exec($ch);

	$RESULTARRAY = json_decode($result, true);

	if ($ROOMTEMP == 1){
		return substr($RESULTARRAY["troom_value"][1]["value"], 0, -3);
	}
	else{
		return $RESULTARRAY;
	}
        curl_close($ch);
}
##############################################################################################
?>

