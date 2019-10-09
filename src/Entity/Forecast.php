<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="forecast",
 *    uniqueConstraints={
 *        @ORM\UniqueConstraint(name="day_unique",
 *            columns={"date", "location_key"})
 *    }
 * )
 * @ORM\Entity(repositoryClass="App\Repository\ForecastRepository")
 */
class Forecast
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=6)
     */
    private $location_key;

    /**
     * @ORM\Column(type="float")
     */
    private $min_temp_celcius;

    /**
     * @ORM\Column(type="float")
     */
    private $max_temp_celcius;

    /**
     * @ORM\Column(type="boolean")
     */
    private $day_has_precipitation;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $day_precipitation_type;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $day_precipitation_intensity;

    /**
     * @ORM\Column(type="boolean")
     */
    private $night_has_precipitation;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $night_precipitation_type;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $night_precipitation_intensity;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mobile_link;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $link;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getLocationKey(): ?string
    {
        return $this->location_key;
    }

    public function setLocationKey(string $location_key): self
    {
        $this->location_key = $location_key;

        return $this;
    }

    public function getMinTempCelcius(): ?float
    {
        return $this->min_temp_celcius;
    }

    public function setMinTempCelcius(float $min_temp_celcius): self
    {
        $this->min_temp_celcius = $min_temp_celcius;

        return $this;
    }

    public function getMaxTempCelcius(): ?float
    {
        return $this->max_temp_celcius;
    }

    public function setMaxTempCelcius(float $max_temp_celcius): self
    {
        $this->max_temp_celcius = $max_temp_celcius;

        return $this;
    }

    public function getDayHasPrecipitation(): ?bool
    {
        return $this->day_has_precipitation;
    }

    public function setDayHasPrecipitation(bool $day_has_precipitation): self
    {
        $this->day_has_precipitation = $day_has_precipitation;

        return $this;
    }

    public function getDayPrecipitationType(): ?string
    {
        return $this->day_precipitation_type;
    }

    public function setDayPrecipitationType(?string $day_precipitation_type): self
    {
        $this->day_precipitation_type = $day_precipitation_type;

        return $this;
    }

    public function getDayPrecipitationIntensity(): ?string
    {
        return $this->day_precipitation_intensity;
    }

    public function setDayPrecipitationIntensity(?string $day_precipitation_intensity): self
    {
        $this->day_precipitation_intensity = $day_precipitation_intensity;

        return $this;
    }

    public function getNightHasPrecipitation(): ?bool
    {
        return $this->night_has_precipitation;
    }

    public function setNightHasPrecipitation(bool $night_has_precipitation): self
    {
        $this->night_has_precipitation = $night_has_precipitation;

        return $this;
    }

    public function getNightPrecipitationType(): ?string
    {
        return $this->night_precipitation_type;
    }

    public function setNightPrecipitationType(?string $night_precipitation_type): self
    {
        $this->night_precipitation_type = $night_precipitation_type;

        return $this;
    }

    public function getNightPrecipitationIntensity(): ?string
    {
        return $this->night_precipitation_intensity;
    }

    public function setNightPrecipitationIntensity(?string $night_precipitation_intensity): self
    {
        $this->night_precipitation_intensity = $night_precipitation_intensity;

        return $this;
    }

    public function getMobileLink(): ?string
    {
        return $this->mobile_link;
    }

    public function setMobileLink(string $mobile_link): self
    {
        $this->mobile_link = $mobile_link;

        return $this;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(string $link): self
    {
        $this->link = $link;

        return $this;
    }
}
