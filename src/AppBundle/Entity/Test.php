<?php
/**
 * Created by PhpStorm.
 * User: MaximeMaillet
 * Date: 03/10/2017
 * Time: 20:19
 */

namespace AppBundle\Entity;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class Test
{
	/**
	 * @var UploadedFile
	 */
	private $attachment;

	/**
	 * @return UploadedFile
	 */
	public function getAttachment()
	{
		return $this->attachment;
	}

	/**
	 * @param UploadedFile $attachment
	 */
	public function setAttachment($attachment)
	{
		$this->attachment = $attachment;
	}


}