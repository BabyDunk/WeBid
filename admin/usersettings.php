<?php
/***************************************************************************
 *   copyright				: (C) 2008, 2009 WeBid
 *   site					: http://www.webidsupport.com/
 ***************************************************************************/

/***************************************************************************
 *   This program is free software; you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation; either version 2 of the License, or
 *   (at your option) any later version. Although none of the code may be
 *   sold. If you have been sold this script, get a refund.
 ***************************************************************************/

define('InAdmin', 1);
include '../includes/common.inc.php';
include $include_path . 'functions_admin.php';
include 'loggedin.inc.php';
include $main_path . 'fck/fckeditor.php';

unset($ERR);

if (isset($_POST['action']) && $_POST['action'] == 'update')
{
	
	// Update database
	$query = "UPDATE ". $DBPrefix . "settings SET
			  usersauth = '" . $_POST['usersauth'] . "',
			  activationtype = " . intval($_POST['usersconf']) . ",
			  showacceptancetext = " . $_POST['showacceptancetext'] . ",
			  acceptancetext = '" . mysql_escape_string($_POST['acceptancetext']) . "'";
	$system->check_mysql(mysql_query($query), $query, __LINE__, __FILE__);
	$ERR = $MSG['895'];

	$system->SETTINGS['usersauth'] = $_POST['usersauth'];
	$system->SETTINGS['activationtype'] = $_POST['usersconf'];
	$system->SETTINGS['showacceptancetext'] = $_POST['showacceptancetext'];
	$system->SETTINGS['acceptancetext'] = $_POST['acceptancetext'];
}

loadblock($MSG['25_0151'], $MSG['25_0152'], 'yesnostacked', 'usersauth', $system->SETTINGS['usersauth'], array($MGS_2__0066, $MGS_2__0067));
loadblock($MSG['25_0151_a'], $MSG['25_0152_a'], 'select3num', 'usersconf', $system->SETTINGS['activationtype'], array($MSG['25_0152_b'], $MSG['25_0152_c'], $MSG['25_0152_d']));

// acceptance text
loadblock($MSG['25_0110'], '', '', '', '', array(), true);
loadblock($MSG['534'], $MSG['539'], 'batch', 'showacceptancetext', $system->SETTINGS['showacceptancetext'], array($MSG['030'], $MSG['029']));

$oFCKeditor = new FCKeditor('acceptancetext');
$oFCKeditor->BasePath = '../fck/';
$oFCKeditor->Value = stripslashes($system->SETTINGS['acceptancetext']);
$oFCKeditor->Width  = '550';
$oFCKeditor->Height = '400';

loadblock($MSG['594'], $MSG['5080'], $oFCKeditor->CreateHtml());

$template->assign_vars(array(
		'ERROR' => (isset($ERR)) ? $ERR : '',
		'SITEURL' => $system->SETTINGS['siteurl'],
		'TYPE' => 'pre',
		'TYPENAME' => $MSG['25_0008'],
		'PAGENAME' => $MSG['894']
		));

$template->set_filenames(array(
		'body' => 'adminpages.tpl'
		));
$template->display('body');
?>
