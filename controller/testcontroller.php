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
		$this->configfolderdir = "/test";
	}

	public function getFullPath(){
		//TODO: Set a folder variable here in a config file.

		$basedir  = \OCP\Config::getSystemValue('datadirectory',\OC::$SERVERROOT.'/data');
		$basedir .= "/" .\OCP\User::getUser() . '/files';
		$basedir .= $this->configfolderdir;
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
		echo "<ul>Temporary Diagnostic Information";
		echo "<li>".$filedata['tmp_name']."</li>";
		echo "<li>".$filedata['name']."</li>";
		echo "<li>".$filedata['size']."</li>";
		echo "<li>Freespace: ". \OC\Files\Filesystem::free_space()."</li>";
		$ownclouddir = explode("/", \OC::$SERVERROOT);

		echo "</ul>";
		echo "<br>";


		//This checks if the folder exists, and if not it attempts to create it, complaining if that fails.
		if (!\OC\Files\Filesystem::file_exists($this->configfolderdir)){
			if(\OC\Files\Filesystem::mkdir($this->configfolderdir)){
				//We were able to create the folder
				echo "<br><b>Created the folder</b><br>";
			} else {
				echo "<br><b>Unable to create the folder</b><br>";
				return 1;
				//Not able to create the folder.
			}
		}

		//This ensures that if the file exists and we are not allowed to update it that we complain about it.
		if ( (\OC\Files\Filesystem::file_exists($this->configfolderdir ."/". $filedata['name'])) &&
			(!\OC\Files\Filesystem::isUpdatable($this->configfolderdir ."/". $filedata['name'])) ){
				echo "<br><b>I can't update this existing file!!</b><br>";
				return 1;
		}

		//Ensures we have enough room to write it.
		if (\OC\Files\Filesystem::free_space() < $filedata['size']){
			echo "<br><b>Not enough free space for this file!</b><br>";
			return 1;
		}


			//TODO, log any errors from this function!
			if (\OC\Files\Filesystem::isUpdatable($this->configfolderdir))	{
				//We are able to write to the folder.
				echo "<br><b>Attempting to write to the folder</b><br>";
				$writtenSize = \OC\Files\Filesystem::file_put_contents($this->configfolderdir ."/". $filedata['name'], file_get_contents($filedata['tmp_name']));
				echo "<i> Writen Size: ".$writtenSize ."</i><br><br>";
				if ($writtenSize){
					if ($filedata['size'] == $writtenSize){
						//All is good!
						echo "<br><b>File uploaded correctly</b><br>";
					} else {
						//We uploaded the file, but not ALL the file!
						echo "<br><b>We wrote a partial file.</b><br>";
					}
				} else {
					//We didn't upload the file at all, wrote 0 bytes?
					echo "<br><b>We wrote 0 or null bytes</b><br>";
				}
			} else {
				//Not able to write to the folder
				echo "<br><b>Couldn't write to the folder.</b><br>";
				return 1;

			}
			//unlink = 1 worked, 0 failed?
//			\OC\Files\Filesystem::unlink($RelativePathFile);
		//return;
	}

















}
