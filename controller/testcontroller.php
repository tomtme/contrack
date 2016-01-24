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
use OCP\IServerContainer;

class TestController extends Controller {


	private $userId;
	private $files;
	private $userid;
	protected $request;

	public function __construct($AppName, Irequest $request, Files $files, $UserId){
		parent::__construct($AppName, $request);
		$this->userid = $UserId;
		$this->files = $files;
		$this->request = $request;
	}

	public function getDirectory(){
		//TODO: Set a folder variable here in a config file.
		$configfolderdir = "/contrack";
		$basedir = \OC::$SERVERROOT;
		$basedir .= '/data/' . \OCP\User::getUser() . '/files';
		$basedir .= $configfolderdir . "/";
		echo "Inside here: " . $basedir . "<br>";
		return $basedir;

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
		echo "This is the first line. \n<br>";
		echo ":".$filedata['tmp_name']."<br>";
		echo ":".$filedata['name']."<br>";
		echo ":".$filedata['size']."<br>";
		echo \OCP\Config::getSystemValue('datadirectory',\OC::$SERVERROOT.'/data' );
		echo "HERE: ". self::getDirectory() ."<br>";
		$ownclouddir = explode("/", \OC::$SERVERROOT);

		echo "<br>";

		$directory = self::getDirectory();
		echo "This is what I'm storing: ". $directory . $filedata['name'] . "<br>";

if (is_dir($directory) && is_writable($directory)) {
    echo "Is here and writable, attempting to write file: <br>" . $directory . $filedata['name'] . "<br>";
		echo "Here: " . move_uploaded_file($filedata['tmp_name'], $directory . $filedata['name']);
		echo "Is updatable? " . \OC\Files\Filesystem::isUpdatable("/contrack/" . $filedata['name']);
		\OC\Files\Filesystem::file_put_contents("/contrack/" . $filedata['name'], file_get_contents($filedata['tmp_name']));
		error_log("\n\nThis is here!: \n\n\n", 3, "/var/www/owncloud/data/owncloud.log");

} else {
    echo 'Upload directory is not writable, or does not exist.';
}

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
