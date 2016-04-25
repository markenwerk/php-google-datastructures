<?php

namespace GoogleDataStructure\GeoLocation;

/**
 * Class GeoLocationGeometry
 *
 * @package GoogleDataStructure\GeoLocation
 */
class GeoLocationGeometry
{

	/**
	 * @var GeoLocation
	 */
	private $location = null;

	/**
	 * @var GeoLocationViewport
	 */
	private $viewport = null;

	/**
	 * @var GeoLocation[]
	 */
	private $accessPoints = array();

	/**
	 * @param array $geometryData
	 * @return $this
	 */
	public function setFromServiceResult(array $geometryData)
	{
		if (isset($geometryData['location'])) {
			$this->location = new GeoLocation($geometryData['location']['lat'], $geometryData['location']['lng']);
		}
		if (isset($geometryData['viewport'])) {
			$this->viewport = new GeoLocationViewport(
				new GeoLocation(
					$geometryData['viewport']['northeast']['lat'],
					$geometryData['viewport']['northeast']['lng']
				),
				new GeoLocation(
					$geometryData['viewport']['southwest']['lat'],
					$geometryData['viewport']['southwest']['lng']
				)
			);
		}
		return $this;
	}

	/**
	 * @return GeoLocation
	 */
	public function getLocation()
	{
		return $this->location;
	}

	/**
	 * @return GeoLocationViewport
	 */
	public function getViewport()
	{
		return $this->viewport;
	}

	/**
	 * @return GeoLocation[]
	 */
	public function getAccessPoints()
	{
		return $this->accessPoints;
	}

	/**
	 * @param GeoLocation $location
	 * @return $this
	 */
	public function setLocation($location)
	{
		$this->location = $location;
		return $this;
	}

	/**
	 * @param GeoLocationViewport $viewport
	 * @return $this
	 */
	public function setViewport($viewport)
	{
		$this->viewport = $viewport;
		return $this;
	}

	/**
	 * @param GeoLocation[] $accessPoints
	 * @return $this
	 */
	public function setAccessPoints(array $accessPoints)
	{
		$this->accessPoints = $accessPoints;
		return $this;
	}

	/**
	 * @param GeoLocation $accessPoint
	 * @return $this
	 */
	public function addAccessPoint(GeoLocation $accessPoint)
	{
		$this->accessPoints[] = $accessPoint;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function hasLocation()
	{
		return !is_null($this->location);
	}

	/**
	 * @return bool
	 */
	public function hasViewport()
	{
		return !is_null($this->viewport);
	}

	/**
	 * @return bool
	 */
	public function hasAccessPoint()
	{
		return count($this->accessPoints) > 0;
	}

}
