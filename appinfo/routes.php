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
      ['name' => 'page#ajax', 'url' => '/ajax/{data}', 'defaults' => array('data' => 'default'),  'verb' => 'GET'],
  	//  ['name' => 'page#ajax', 'url' => '/ajax', 'verb' => 'POST'],
    ]
];
