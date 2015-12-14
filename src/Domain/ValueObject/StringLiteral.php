<?php
/**
 * Created by PhpStorm.
 * User: tylercazier
 * Date: 11/10/15
 * Time: 5:42 PM
 */

namespace Notes\Domain\ValueObject;

use InvalidArgmentException;

class StringLiteral
{
	const EMPTY_STR = '';

	/* @var string */
	protected $value;

	public function __construct($value = self::EMPTY_STR)
	{
		if (!is_string($value)) {
			throw new \InvalidArgumentException(
				__METHOD__ . '(): $value must be a string'
			);
		}

		$this->value = $value;
	}

	public function __toString()
	{
		return $this->value;
	}

	public function getValue()
	{
		return $this->value;
	}
}
