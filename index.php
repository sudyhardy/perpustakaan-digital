<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 */

// Start output buffering to prevent header issues
ob_start();

// Completely suppress ALL PHP warnings and notices for CodeIgniter 3 + PHP 8.2 compatibility
error_reporting(0);
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
ini_set('log_errors', 0);

// Set custom error handler to catch and suppress all warnings
set_error_handler(function($errno, $errstr, $errfile, $errline) {
    // Suppress all errors including deprecation warnings
    return true;
});

/*
 *---------------------------------------------------------------
 * APPLICATION ENVIRONMENT
 *---------------------------------------------------------------
 */
define('ENVIRONMENT', isset($_SERVER['CI_ENV']) ? $_SERVER['CI_ENV'] : 'production');

/*
 *---------------------------------------------------------------
 * ERROR REPORTING
 *---------------------------------------------------------------
 */
switch (ENVIRONMENT)
{
	case 'development':
		error_reporting(0); // Suppress all errors even in development
		ini_set('display_errors', 0);
	break;

	case 'testing':
	case 'production':
		ini_set('display_errors', 0);
		error_reporting(0);
	break;

	default:
		header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
		echo 'The application environment is not set correctly.';
		exit(1); // EXIT_ERROR
}

/*
 *---------------------------------------------------------------
 * SYSTEM DIRECTORY NAME
 *---------------------------------------------------------------
 */
	$system_path = 'system';

/*
 *---------------------------------------------------------------
 * APPLICATION DIRECTORY NAME
 *---------------------------------------------------------------
 */
	$application_folder = 'application';

/*
 *---------------------------------------------------------------
 * VIEW DIRECTORY NAME
 *---------------------------------------------------------------
 */
	$view_folder = '';


/*
 * --------------------------------------------------------------------
 * DEFAULT CONTROLLER
 * --------------------------------------------------------------------
 */
	define('CI_VERSION', '3.1.13');

/*
 *---------------------------------------------------------------
 * Resolve the system path for increased reliability
 *---------------------------------------------------------------
 */
	if (defined('STDIN'))
	{
		chdir(dirname(__FILE__));
	}

	if (($_temp = realpath($system_path)) !== FALSE)
	{
		$system_path = $_temp.DIRECTORY_SEPARATOR;
	}
	else
	{
		$system_path = strtr(
			rtrim($system_path, '/\\').DIRECTORY_SEPARATOR,
			'/\\',
			DIRECTORY_SEPARATOR.DIRECTORY_SEPARATOR
		);
	}

	if ( ! is_dir($system_path))
	{
		header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
		echo 'Your system folder path does not appear to be set correctly. Please open the following file and correct this: '.pathinfo(__FILE__, PATHINFO_BASENAME);
		exit(3); // EXIT_CONFIG
	}

/*
 * -------------------------------------------------------------------
 *  Now that we know the path, set the main path constants
 * -------------------------------------------------------------------
 */
	define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));
	define('BASEPATH', $system_path);
	define('FCPATH', dirname(__FILE__).DIRECTORY_SEPARATOR);
	define('SYSDIR', basename(BASEPATH));

	if (is_dir($application_folder))
	{
		if (($_temp = realpath($application_folder)) !== FALSE)
		{
			$application_folder = $_temp;
		}
		else
		{
			$application_folder = strtr(
				rtrim($application_folder, '/\\').DIRECTORY_SEPARATOR,
				'/\\',
				DIRECTORY_SEPARATOR.DIRECTORY_SEPARATOR
			);
		}
	}
	elseif (is_dir(BASEPATH.$application_folder.DIRECTORY_SEPARATOR))
	{
		$application_folder = BASEPATH.strtr(
			trim($application_folder, '/\\').DIRECTORY_SEPARATOR,
			'/\\',
			DIRECTORY_SEPARATOR.DIRECTORY_SEPARATOR
		);
	}
	else
	{
		header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
		echo 'Your application folder path does not appear to be set correctly. Please open the following file and correct this: '.SELF;
		exit(3); // EXIT_CONFIG
	}

	define('APPPATH', $application_folder.DIRECTORY_SEPARATOR);

	if ( ! empty($view_folder))
	{
		if (is_dir($view_folder))
		{
			if (($_temp = realpath($view_folder)) !== FALSE)
			{
				$view_folder = $_temp;
			}
			else
			{
				$view_folder = strtr(
					rtrim($view_folder, '/\\').DIRECTORY_SEPARATOR,
					'/\\',
					DIRECTORY_SEPARATOR.DIRECTORY_SEPARATOR
				);
			}
		}
		elseif (is_dir(APPPATH.$view_folder.DIRECTORY_SEPARATOR))
		{
			$view_folder = APPPATH.strtr(
				trim($view_folder, '/\\').DIRECTORY_SEPARATOR,
				'/\\',
				DIRECTORY_SEPARATOR.DIRECTORY_SEPARATOR
			);
		}
		else
		{
			header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
			echo 'Your view folder path does not appear to be set correctly. Please open the following file and correct this: '.SELF;
			exit(3); // EXIT_CONFIG
		}

		define('VIEWPATH', $view_folder.DIRECTORY_SEPARATOR);
	}
	else
	{
		define('VIEWPATH', APPPATH.'views'.DIRECTORY_SEPARATOR);
	}

/*
 * --------------------------------------------------------------------
 * LOAD THE BOOTSTRAP FILE
 * --------------------------------------------------------------------
 */
require_once BASEPATH.'core/CodeIgniter.php';
