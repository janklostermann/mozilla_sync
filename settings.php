<?php

// Determines which template will be shown on the personal page

$tmpl = null;

$email = OCP\Config::getUserValue(OCP\User::getUser(), 'settings', 'email');
// No email address set
if ($email === null) {
  $tmpl = new OCP\Template( 'mozilla_sync', 'noemail');
} else {
  $tmpl = new OCP\Template( 'mozilla_sync', 'settings');
  $tmpl->assign('email', $email);
  $tmpl->assign('syncaddress', OCA\mozilla_sync\Utils::getServerAddress());
}

return $tmpl->fetchPage();

/* vim: set ts=4 sw=4 tw=80 noet : */
