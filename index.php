<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';
require 'config.php';
require 'controllers/common.php';
require 'controllers/authentication.php';
require 'controllers/user-profile.php';
require 'controllers/user.php';
require 'controllers/seller-user.php';
require 'controllers/organization.php';
require 'controllers/product.php';


function my_autoloader($className) {
	$arr = preg_split('/(?=[A-Z])/', $className);
	$arr = array_slice($arr, 1);
	$path = false;
	$path = "models/" . $className . ".php";
	if (file_exists($path)) {
		require_once $path;
	}
}
spl_autoload_register("my_autoloader");

$app = new \Slim\App();

/*USER AUTHENTICATION APIS*/
$app->post('/api/signup','UserAuthenticationController::signup');
$app->post('/api/login','UserAuthenticationController::login');
$app->post('/api/logout','UserAuthenticationController::logout');

/*USER PROFILE APIS*/
$app->post('/api/userProfile','UserProfileController::getUserDetails');
$app->post('/api/editProfile','UserProfileController::editProfile');

/*SELLER PORTAL APIS*/
$app->post('/api/createSellerUser','SellerUserController::createSellerUser');

/*ADMIN PORTAL USER CRUD APIS*/
$app->post('/api/createAdminUser','UserController::createAdminUser');
$app->get('/api/viewAllAdminuser','UserController::viewAllAdminuser');
$app->post('/api/updateAdminUser','UserController::updateAdminUser');
$app->post('/api/deleteAdminUser','UserController::deleteAdminUser');

/*Organization APIS*/
$app->post('/api/createOrganization','OrganizationController::createOrganization');
$app->post('/api/viewOrganization','OrganizationController::viewOrganization');
$app->post('/api/updateOrganization','OrganizationController::updateOrganization');
$app->post('/api/deleteOrganization','OrganizationController::deleteOrganization');

/*Products APIS */
$app->post('/api/createProduct','ProductController::createProduct');
$app->post('/api/updateProduct','ProductController::updateProduct');
$app->post('/api/viewProduct','ProductController::viewProduct');
$app->post('/api/deleteProduct','ProductController::deleteProduct');
$app->post('/api/bulkUploadProduct','ProductController::bulkUploadProduct');
$app->post('/api/viewSellerProduct','ProductController::viewSellerProduct');
$app->post('/api/viewAdminBuyerProduct','ProductController::viewAdminBuyerProduct');

$app->run();
?>