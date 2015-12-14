<?php
/**
 * Created by PhpStorm.
 * User: tylercazier
 * Date: 11/10/15
 * Time: 5:42 PM
 */

namespace Notes\Domain\ValueObject;

use Notes\Domain\ValueObject\StringLiteral;

class Uuid extends StringLiteral
{
	/**
	 * @param string $value
	 * @throws InvalidArgumentExpection
	 */
	public function __construct($value = StringLiteral::EMPTY_STR)
	{
		parent::__construct($value);

		if (empty($this->value)) {
			$this->generateV4();
		}

		if (!$this->isValidV4()) {
			throw new InvalidArgumentExpection(
				__METHOD__ . '(): $value is not a valid v4 uuid'
			);
		}
	}

	private function generateV4()
	{
		$this->value = sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
			// 32 bits for "time_low"
			mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),

			// 16 bits for "time_mid"
			mt_rand( 0, 0xffff ),

			// 16 bits for "time_hi_and_version",
			// four most significant bits holds version number 4
			mt_rand( 0, 0x0fff ) | 0x4000,

			// 16 bits, 8 bits for "clk_seq_hi_res",
			// 8 bits for "clk_seq_low",
			// two most significant bits holds zero and one for variant DCE1.1
			mt_rand( 0, 0x3fff ) | 0x8000,

			// 48 bits for "node"
			mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
		); // a valid v4 uuid
	}

	/**
	 * @return bool
	 */
	public function isValidV4()
	{
		if (!preg_match(
			'/[a-f0-9]{8}\-[a-f0-9]{4}\-4[a-f0-9]{3}\-(8|9|a|b)[a-f0-9]{3}\-[a-f0-9]{12}/',
			$this->value
		)) {
			return false;
		}

		return true;
	}
}