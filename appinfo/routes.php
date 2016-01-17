<?php
/**
 * ownCloud - Contrack
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later. See the COPYING file.
 *
 * @author Tom Tijerina <tom@tomt.me>
 * @copyright Tom Tijerina 2015
 */

/**
 * Create your routes in here. The name is the lowercase name of the controller
 * without the controller part, the stuff after the hash is the method.
 * e.g. page#index -> OCA\Contrack\Controller\PageController->index()
 *
 * The controller class has to be registered in the application.php file since
 * it's instantiated in there
 */
return [
    'routes' => [
      ['name' => 'page#index', 'url' => '/', 'verb' => 'GET'],
      ['name' => 'page#test', 'url' => '/test', 'verb' => 'GET'],
      ['name' => 'page#testupload', 'url' => '/testupload', 'verb' => 'GET'],
  	  ['name' => 'page#create', 'url' => '/create', 'verb' => 'POST'],
      ['name' => 'page#read', 'url' => '/read', 'verb' => 'POST'],
      ['name' => 'test#upload', 'url' => '/upload', 'verb' => 'POST'],

    ]
];
      //['name' => 'page#create', 'url' => '/create/{data}/{name}', 'verb' => 'GET'],
