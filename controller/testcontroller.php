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

use OCP\AppFramework\Controller;
use OCP\AppFramework\Http\Response;
use OCP\IRequest;
use OCP\Files;

class TestController extends Controller {


	private $userId;
	private $files;
	protected $request;

	public function __construct($AppName, Irequest $request, Files $files){
		parent::__construct($AppName, $request);
		$this->files = $files;
		$this->request = $request;
	}

	/**
	 * CAUTION: Not sure why but added things below to make it go.
	 * @NoAdminRequired
	 * @NoCSRFRequired
	 */
	public function upload() {
		//error_log("\n\nThis is here!: " . $filedata . " & ".$filename ."\n\n\n", 3, "/var/www/owncloud/data/owncloud.log");
		// check if file exists and write to it if possible
	//	error_log("\nThis is the result of it:  " . $this->unknown->file->storage->file_put_contents($filename, $filedata) ."\n\n\n", 3, "/var/www/owncloud/data/owncloud.log");
	//	error_log("\n\n Upload: " .move_uploaded_file($_FILES["filedata"]["tmp_name"], $filename), 3, "/var/www/owncloud/data/owncloud.log");
		$filedata = $this->request->getUploadedFile("data");
		echo "This is the first line \n<br>";
		echo ":".$filedata['tmp_name']."<br>";
		echo ":".$filedata['name']."<br>";
		echo ":".$filedata['size']."<br>";
		echo $this.files;
		//echo move_uploaded_file($filedata['tmp_name'], 'data/admin/'.$filedata['name']);

//		return new Response("line 1?<br>"	 	 . $dataresponse);
		// echo ":".$_FILES["data"]['tmp_name']."<br>";
		// echo ":".$_FILES['data']['error']."<br>";
		// echo ":".$_FILES["data"]['size']."<br>";
		// //move_uploaded_file($_FILES['file']['name'], $move);

		// try {
		// 		try {
		// 				$destination = $this->unknown->file->getId($filename);
		// 		} catch(\OCP\Files\NotFoundException $e) {
		// 				$this->unknown->file->touch($filename);
		// 				$destination = $this->unknown->file->getId($filename);
		// 		}
		//
		// 		// the id can be accessed by $file->getId();
		// 		$destination->putContent($filedata);
		//
		// } catch(\OCP\Files\NotPermittedException $e) {
		// 		// you have to create this exception by yourself ;)
		// 		throw new StorageException('Cant write to file');
		// }
		echo "<br><br>";
		return;
	}

















}
