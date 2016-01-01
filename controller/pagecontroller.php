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

namespace OCA\Contrack\Controller;

use OCP\IRequest;
use OCP\AppFramework\Http\TemplateResponse;
use OCP\AppFramework\Http\DataResponse;
use OCP\AppFramework\Http\JSONResponse;
use OCP\AppFramework\Controller;

use OCA\OwnNotes\Db\test;
use OCA\OwnNotes\Db\testMapper;

class PageController extends Controller {


	private $userId;

	public function __construct($AppName, IRequest $request, $UserId){
		parent::__construct($AppName, $request);
		$this->userId = $UserId;
	}

	/**
	 * CAUTION: the @Stuff turns off security checks; for this page no admin is
	 *          required and no CSRF check. If you don't know what CSRF is, read
	 *          it up in the docs or you might create a security hole. This is
	 *          basically the only required method to add this exemption, don't
	 *          add it to any other method if you don't exactly know what it does
	 *
	 * @NoAdminRequired
	 * @NoCSRFRequired
	 */
	public function index() {
		$params = ['user' => $this->userId];
		return new TemplateResponse('contrack', 'main', $params);  // templates/main.php
	}
	/**
	 * CAUTION: Not sure why but added things below to make it go.
	 *
	 *
	 * @NoAdminRequired
	 * @NoCSRFRequired
	 */
	public function test() {
		return new TemplateResponse('contrack', 'test', $params);  // templates/main.php
	}
	/**
	 * CAUTION: Not sure why but added things below to make it go.
	 *
	 *
	 * @NoAdminRequired
	 * @NoCSRFRequired
	 */
	public function ajax($data) {
		if ($data ==='company')
		return new DataResponse(array("1" => "Apple", "2" =>"Compaq", "23" =>"MicroJunk", "6" => $data));  // templates/main.php
		else
		return new DataResponse(array("1" => "Crapple", "2" =>"Junk", "6" => $data));  // templates/main.php

	}

}
