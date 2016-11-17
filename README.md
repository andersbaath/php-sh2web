# php-sh2web
php functions for Carlo Gavazzi Smarthouse SH2WEB conroller
get and set values by using built in webserver (not modbus)

CONTROLLER = <IP of SH2WEB controller>

USERNAME = <One of the users that can read and write / if not admin dont forget to add priviledges to suer in config tool>

PASSWORD = <password of above user>

SCENARIO = <scenario whised to be set 1-4>

ID = <Dimmer function ID>

SWITCH = If $SWITCH is set to 0 all functions values are returned (omplete JSON) if $SWITCH is set to 1 only state is returned 1/0 (on/off)

$ROOMTEMP = <0> returns array <1> returns room temp value


FunctionShDupLightSetScenario($CONTROLLER, $USERNAME, $PASSWORD, $SCENARIO, $ID)
FunctionShDupLightToggleState($CONTROLLER, $USERNAME, $PASSWORD, $ID)
FunctionShDupLightStatus($CONTROLLER, $USERNAME, $PASSWORD, $ID, $SWITCH)
FunctionShDupTempRegStatus($CONTROLLER, $USERNAME, $PASSWORD, $ID, $ROOMTEMP)
