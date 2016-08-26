<?php
/*
Plugin Name: Shibboleth - Convert Users
Plugin URI: https://github.com/clas-web/shibboleth-convert-users
Description: The Shibboleth - Convert Users plugin is a one time plugin to convert all LDAP users to Shibboleth.
Version: 0.0.1
Author: Crystal Barton
Author URI: https://www.linkedin.com/in/crystalbarton
Network: True
*/


register_activation_hook( __FILE__, 'shibboleth-convert-users' );

function shibboleth_convert_users()
{
	$users = get_users();
	
	foreach( $users as $user )
	{
		$ldap_login = get_user_meta( $user->ID, 'ldap_login', 'true' );
		if( true == $ldap_login ) {
			update_user_meta( $user->ID, 'shibboleth_account', true );
		}
	}
	
	deactivate_plugin( plugin_basename( __FILE__ ) );
}

