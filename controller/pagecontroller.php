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
use OCP\IDb;
use OCP\AppFramework\Http\TemplateResponse;
use OCP\AppFramework\Http\DataResponse;
use OCP\AppFramework\Http\JSONResponse;
use OCP\AppFramework\Controller;

use OCA\Contrack\Db\TypeMapper;
use OCA\Contrack\Db\IncidentMapper;
use OCA\Contrack\Db\CompanyMapper;
use OCA\Contrack\Db\LibraryEntity;

class PageController extends Controller {


	private $userId;
	private $mapper;

	public function __construct($AppName, IRequest $request, IDb $db, CompanyMapper $companymapper, IncidentMapper $incidentmapper, TypeMapper $typemapper, $UserId){
		parent::__construct($AppName, $request);
		$this->db = $db;
		$this->userId = $UserId;
		$this->companymapper = $companymapper;
		$this->incidentmapper = $incidentmapper;
		$this->typemapper = $typemapper;
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
		switch ($data){
			case "company":
				return new DataResponse($this->companymapper->findAll($this->userId));
				break;

			case "incident":
				return new DataResponse($this->incidentmapper->findAll($this->userId));
				break;

			case "type":
				return new DataResponse($this->typemapper->findAll($this->userId));
				break;

			default:
			return new DataResponse($this->companymapper->findAll($this->userId));
//					return new DataResponse(array("1" => "Apple", "2" =>"Compaq", "23" =>"MicroJunk", "6" => $data, "55" => $this->userId));
		}
		//if ($data ==='company')
		//	return new DataResponse(array("1" => "Apple", "2" =>"Compaq", "23" =>"MicroJunk", "6" => $data, "55" => $this->userId));  // templates/main.php
		//else

	}

	/**
	 * CAUTION: Not sure why but added things below to make it go.
	 *
	 *
	 * @NoAdminRequired
	 * @NoCSRFRequired
	 */
	public function create($data, $name) {
		$record = new LibraryEntity($this->db);
		$record->setuid($this->userId);
		$record->setname($name);

		switch ($data){
			case "company":
				return new DataResponse($this->companymapper->insert($record));
				break;

			case "incident":
				return new DataResponse($this->incidentmapper->insert($record));
				break;

			case "type":
				return new DataResponse($this->typemapper->insert($record));
				break;

			default:
			return new DataResponse($this->companymapper->insert($record));
		}
}



}
