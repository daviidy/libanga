<?php
/**
 * PayPal Setting & API Credentials
 */


return [
    'client_id' => 'AeWKcDlEDgqUCj04zLNbusp4D_3UX_dDsBhDD74Cz_ZKTlfHkj60ew9xEtdfvOqOF0jISYDDx76BIYgL',
	'secret' => 'EHDFq6q0q-zB6B4z_ZOhMemkYpuarqK_lNBDPs_7sslGuwvK17e4yC539iUeVFx-RHwWF4zW8Gryupvb',
    'settings' => array(
        'mode' => 'sandbox',
        'http.ConnectionTimeOut' => 1000,
        'log.LogEnabled' => true,
        'log.FileName' => storage_path() . '/logs/paypal.log',
        'log.LogLevel' => 'FINE'
    ),
];
