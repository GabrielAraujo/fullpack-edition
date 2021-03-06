<?php namespace ZN\Services;
/**
 * ZN PHP Web Framework
 * 
 * "Simplicity is the ultimate sophistication." ~ Da Vinci
 * 
 * @package ZN
 * @license MIT [http://opensource.org/licenses/MIT]
 * @author  Ozan UYKUN [ozan@znframework.com]
 */

use ZN\Services\Exception\InvalidTimeFormatException;

trait CrontabIntervalTrait
{
    //--------------------------------------------------------------------------------------------------------
    // Interval
    //--------------------------------------------------------------------------------------------------------
    //
    // @var string
    //
    //--------------------------------------------------------------------------------------------------------
    protected $interval = '* * * * *';

    //--------------------------------------------------------------------------------------------------------
    // Minute
    //--------------------------------------------------------------------------------------------------------
    //
    // @var string
    //
    //--------------------------------------------------------------------------------------------------------
    protected $minute = '*';

    //--------------------------------------------------------------------------------------------------------
    // Hour
    //--------------------------------------------------------------------------------------------------------
    //
    // @var string
    //
    //--------------------------------------------------------------------------------------------------------
    protected $hour = '*';

    //--------------------------------------------------------------------------------------------------------
    // Day Number
    //--------------------------------------------------------------------------------------------------------
    //
    // @var string
    //
    //--------------------------------------------------------------------------------------------------------
    protected $dayNumber = '*';

    //--------------------------------------------------------------------------------------------------------
    // Month
    //--------------------------------------------------------------------------------------------------------
    //
    // @var string
    //
    //--------------------------------------------------------------------------------------------------------
    protected $month = '*';

    //--------------------------------------------------------------------------------------------------------
    // Day
    //--------------------------------------------------------------------------------------------------------
    //
    // @var string
    //
    //--------------------------------------------------------------------------------------------------------
    protected $day = '*';

    //--------------------------------------------------------------------------------------------------------
    // Month Format
    //--------------------------------------------------------------------------------------------------------
    //
    // @var array
    //
    //--------------------------------------------------------------------------------------------------------
    protected $monthFormat =
    [
        'january'   => 1,
        'february'  => 2,
        'march'     => 3,
        'april'     => 4,
        'may'       => 5,
        'june'      => 6,
        'july'      => 7,
        'august'    => 8,
        'september' => 9,
        'october'   => 10,
        'november'  => 11,
        'december'  => 12
    ];

    //--------------------------------------------------------------------------------------------------------
    // Day Format
    //--------------------------------------------------------------------------------------------------------
    //
    // @var array
    //
    //--------------------------------------------------------------------------------------------------------
    protected $dayFormat =
    [
        'sunday'    => 0,
        'monday'    => 1,
        'tuesday'   => 2,
        'wednesday' => 3,
        'thursday'  => 4,
        'friday'    => 5,
        'saturday'  => 6
    ];

    //--------------------------------------------------------------------------------------------------------
    // Protected Slashes
    //--------------------------------------------------------------------------------------------------------
    //
    // @param  string $data
    // @return string
    //
    //--------------------------------------------------------------------------------------------------------
    protected function _slashes($data)
    {
        if( $data[0] === '/' )
        {
            return prefix($data, '*');
        }

        return $data;
    }

    //--------------------------------------------------------------------------------------------------------
    // Hourly
    //--------------------------------------------------------------------------------------------------------
    //
    // @param  string void
    // @return object
    //
    //--------------------------------------------------------------------------------------------------------
    public function hourly() : Crontab
    {
        $this->interval = '0 * * * *';

        return $this;
    }

    //--------------------------------------------------------------------------------------------------------
    // Daily
    //--------------------------------------------------------------------------------------------------------
    //
    // @param  string void
    // @return object
    //
    //--------------------------------------------------------------------------------------------------------
    public function daily() : Crontab
    {
        $this->interval = '0 0 * * *';

        return $this;
    }

    //--------------------------------------------------------------------------------------------------------
    // Midnight
    //--------------------------------------------------------------------------------------------------------
    //
    // @param  string void
    // @return object
    //
    //--------------------------------------------------------------------------------------------------------
    public function midnight() : Crontab
    {
        $this->daily();

        return $this;
    }

    //--------------------------------------------------------------------------------------------------------
    // Monthly
    //--------------------------------------------------------------------------------------------------------
    //
    // @param  string void
    // @return object
    //
    //--------------------------------------------------------------------------------------------------------
    public function monthly() : Crontab
    {
        $this->interval = '0 0 1 * *';

        return $this;
    }

    //--------------------------------------------------------------------------------------------------------
    // Weekly
    //--------------------------------------------------------------------------------------------------------
    //
    // @param  string void
    // @return object
    //
    //--------------------------------------------------------------------------------------------------------
    public function weekly() : Crontab
    {
        $this->interval = '0 0 * * 0';

        return $this;
    }

    //--------------------------------------------------------------------------------------------------------
    // Yearly
    //--------------------------------------------------------------------------------------------------------
    //
    // @param  string void
    // @return object
    //
    //--------------------------------------------------------------------------------------------------------
    public function yearly() : Crontab
    {
        $this->interval = '0 0 1 1 *';

        return $this;
    }

    //--------------------------------------------------------------------------------------------------------
    // Annualy
    //--------------------------------------------------------------------------------------------------------
    //
    // @param  string void
    // @return object
    //
    //--------------------------------------------------------------------------------------------------------
    public function annualy() : Crontab
    {
        $this->yearly();

        return $this;
    }

    //--------------------------------------------------------------------------------------------------------
    // Clock
    //--------------------------------------------------------------------------------------------------------
    //
    // @param  string $clock: 24:59
    // @return object
    //
    //--------------------------------------------------------------------------------------------------------
    public function clock(String $clock = '23:59') : Crontab
    {
        $match = '[0-9]{1,2}';

        if( ! preg_match('/^'.$match.':'.$match.'$/', $clock) )
        {
            throw new InvalidTimeFormatException('Services', 'crontab:timeFormatError');
        }
        else
        {
            $clockEx  = explode(':', $clock);

            $this->minute($clockEx[1]);
            $this->hour($clockEx[0]);
        }

        return $this;
    }

    //--------------------------------------------------------------------------------------------------------
    // Minute
    //--------------------------------------------------------------------------------------------------------
    //
    // @param  string $minute: *
    // @return object
    //
    //--------------------------------------------------------------------------------------------------------
    public function minute(String $minute = '*') : Crontab
    {
        $this->minute = $this->_slashes($minute);

        return $this;
    }

    //--------------------------------------------------------------------------------------------------------
    // Per Minute
    //--------------------------------------------------------------------------------------------------------
    //
    // @param  string $minute: *
    // @return object
    //
    //--------------------------------------------------------------------------------------------------------
    public function perMinute(String $minute = '*') : Crontab
    {
        $this->_per($minute, 'minute');

        return $this;
    }

    //--------------------------------------------------------------------------------------------------------
    // Hour
    //--------------------------------------------------------------------------------------------------------
    //
    // @param  string $hour: *
    // @return object
    //
    //--------------------------------------------------------------------------------------------------------
    public function hour(String $hour = '*') : Crontab
    {
        $this->hour = $this->_slashes($hour);

        return $this;
    }

    //--------------------------------------------------------------------------------------------------------
    // Per Hour
    //--------------------------------------------------------------------------------------------------------
    //
    // @param  string $hour: *
    // @return object
    //
    //--------------------------------------------------------------------------------------------------------
    public function perHour(String $hour = '*') : Crontab
    {
        $this->_per($hour, 'hour');

        return $this;
    }

    //--------------------------------------------------------------------------------------------------------
    // Day Number
    //--------------------------------------------------------------------------------------------------------
    //
    // @param  string $dayNumber: *
    // @return object
    //
    //--------------------------------------------------------------------------------------------------------
    public function dayNumber(String $dayNumber = '*') : Crontab
    {
        $this->dayNumber = $this->_slashes($dayNumber);

        return $this;
    }

    //--------------------------------------------------------------------------------------------------------
    // Month Number
    //--------------------------------------------------------------------------------------------------------
    //
    // @param  string $monthNumber: *
    // @return object
    //
    //--------------------------------------------------------------------------------------------------------
    public function month(String $monthNumber = '*') : Crontab
    {
        $this->_format('monthFormat', __FUNCTION__, $monthNumber );

        return $this;
    }

    //--------------------------------------------------------------------------------------------------------
    // Per Month
    //--------------------------------------------------------------------------------------------------------
    //
    // @param  string $monthNumber: *
    // @return object
    //
    //--------------------------------------------------------------------------------------------------------
    public function perMonth(String $month = '*') : Crontab
    {
        $this->_per($month, 'month');

        return $this;
    }

    //--------------------------------------------------------------------------------------------------------
    // Day
    //--------------------------------------------------------------------------------------------------------
    //
    // @param  string $day: *
    // @return object
    //
    //--------------------------------------------------------------------------------------------------------
    public function day(String $day = '*') : Crontab
    {
        $this->_format('dayFormat', __FUNCTION__, $day);

        return $this;
    }

    //--------------------------------------------------------------------------------------------------------
    // Per Day
    //--------------------------------------------------------------------------------------------------------
    //
    // @param  string $day: *
    // @return object
    //
    //--------------------------------------------------------------------------------------------------------
    public function perDay(String $day = '*') : Crontab
    {
        $this->_per($day, 'day');

        return $this;
    }

    //--------------------------------------------------------------------------------------------------------
    // Interval
    //--------------------------------------------------------------------------------------------------------
    //
    // @param  string $interval: * * * * *
    // @return object
    //
    //--------------------------------------------------------------------------------------------------------
    public function interval(String $interval = '* * * * *') : Crontab
    {
        $this->interval = $interval;

        return $this;
    }

    //--------------------------------------------------------------------------------------------------------
    // Protected Format
    //--------------------------------------------------------------------------------------------------------
    //
    // @param  string $varname: empty
    // @param  string $objectname: empty
    // @param  string $data: empty
    // @return void
    //
    //--------------------------------------------------------------------------------------------------------
    protected function _format($varname, $objectname, $data)
    {
        $format      = $this->$varname;
        $replaceData = str_ireplace(array_keys($format), array_values($format), $data);

        $this->$objectname = $this->_slashes($replaceData);
    }

    //--------------------------------------------------------------------------------------------------------
    // Per
    //--------------------------------------------------------------------------------------------------------
    //
    // @param  string $time: *
    //
    //--------------------------------------------------------------------------------------------------------
    protected function _per($time, $function)
    {
        $this->$function(prefix($time));
    }
}
