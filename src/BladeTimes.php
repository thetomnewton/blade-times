<?php

namespace Thetomnewton\BladeTimes;

class BladeTimes
{
    /**
     * The timezone to use when using the directive.
     *
     * @var string
     */
    protected $timezone;

    /**
     * Create a new object instance.
     *
     * @param  string  $timezone
     * @return void
     */
    public function __construct($timezone)
    {
        $this->timezone = $timezone;
    }

    /**
     * Set the timezone for the directive.
     *
     * @param  string  $timezone
     * @return void
     */
    public function setTimezone($timezone)
    {
        $this->timezone = $timezone;
    }

    /**
     * Get the timezone for the directive.
     *
     * @return string
     */
    public function timezone()
    {
        return $this->timezone;
    }
}
