<?php

namespace Foodalizr\Model;

class Person
{
	/**
	 * @var int
	 */
	private $id;
	
	/**
	 * @var string
	 */
	private $name;
	
	/**
	 * @var bool
	 */
	private $enabled;
	
	/**
	 * @return int
	 */
	public function getId()
	{
		return $this->id;
	}
	
	/**
	 * @param int $id
	 * @return Person
	 */
	public function setId($id)
	{
		if (null !== $id) {
			$id = (int) $id;
		}
		$this->id = $id;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}
	
	/**
	 * @param string $name
	 * @return Person
	 */
	public function setName($name)
	{
		if (null !== $name) {
			$name = (string) $name;
		}
		$this->name = $name;
		return $this;
	}
	
	/**
	 * @return bool
	 */
	public function isEnabled()
	{
		return $this->enabled;
	}
	
	/**
	 * @param bool $enabled
	 * @return Person
	 */
	public function setEnabled($enabled = true)
	{
		if (null !== $enabled) {
			$enabled = (bool) $enabled;
		}
		$this->enabled = $enabled;
		return $this;
	}
}
