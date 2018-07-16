<?php

namespace Asdozzz\Filemakers;

class Filemakers
{
	public static function factory($classname)
	{
		if (empty($classname))
		{
			throw new \Exception("Название класса не указано");
		}

		$config = \Config::get('filemakers.'.$classname);

		if (empty($config))
		{
			throw new Exceptions\FilemakersMissingException("Имя класса cущности <<$classname>> не указано");
		}

		$class = new $config;

		$interfaces = class_implements($config);

		if (!isset($interfaces["Asdozzz\\Filemakers\\Interfaces\\iFilemakers"]))
		{
			throw new Exceptions\FilemakersBadInstanceException("Class <<$config>> must implemenet Asdozzz\\Filemakers\\Interfaces\\iFilemakers");
		}

		return $class;
	}
}