<?php
defined('TYPO3') or die();

$tempColumns = array(
	'login_link_loginas' => array(
		'exclude' => 0,
		'label' => '',
		'config' => array(
			'type' => 'none',
			'renderType' => 'login_link_loginas',
		)
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('fe_users', $tempColumns, 1);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('fe_users', 'login_link_loginas', '', 'after:lastlogin');
