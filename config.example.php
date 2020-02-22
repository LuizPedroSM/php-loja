<?php
require 'environment.php';

global $config;
global $db;

$config = array();
if(ENVIRONMENT == 'development') {
	define("BASE_URL", "http://localhost/loja/");
	define("MAIL_CHIMP_ACTION", "");
	define("MAIL_CHIMP_INPUT", "");
	$config['dbname'] = 'nova_loja';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'root';
	$config['dbpass'] = 'root';
} else {
	define("BASE_URL", "");
	define("MAIL_CHIMP_ACTION", "");
	define("MAIL_CHIMP_INPUT", "");
	$config['dbname'] = '';
	$config['host'] = '';
	$config['dbuser'] = '';
	$config['dbpass'] = '';
}

$config['default_lang'] = 'pt-br';
$config['cep_orign'] = '';

$config['pagseguro_seller'] = '';

// Info MercadoPago
$config['mp_appid'] = '';
$config['mp_key'] = '';

// Info Paypal
$config['paypal_clientid'] = '';
$config['paypal_secret'] = '';

// Info Paypal
$config['gerencianet_clientid'] = '';
$config['gerencianet_clientsecret'] = '';
$config['gerencianet_sandbox'] = true;


$db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'], $config['dbuser'], $config['dbpass']);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

\PagSeguro\Library::initialize();
\PagSeguro\Library::cmsVersion()->setName("NovaLoja")->setRelease("1.0.0");
\PagSeguro\Library::moduleVersion()->setName("NovaLoja")->setRelease("1.0.0");

\PagSeguro\Configuration\Configure::setEnvironment('sandbox');
\PagSeguro\Configuration\Configure::setAccountCredentials('', '');
\PagSeguro\Configuration\Configure::setCharset('UTF-8');
\PagSeguro\Configuration\Configure::setLog(true, 'pagseguro.log');