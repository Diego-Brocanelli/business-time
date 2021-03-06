<?php

namespace BusinessTime\Traits;

use Carbon\Carbon;

trait Range
{
    /**
     * Get OpeningHoursForDay instance of the current instance or class.
     *
     * @return \Closure<\Spatie\OpeningHours\OpeningHoursForDay>
     */
    public function getCurrentDayOpeningHours()
    {
        /**
         * Get OpeningHoursForDay instance of the current instance or class.
         *
         * @return \Spatie\OpeningHours\OpeningHoursForDay
         */
        return function () {
            /** @var Carbon $date */
            $date = isset($this) ? $this : static::now();

            return $date->getOpeningHours()->forDate($date);
        };
    }

    /**
     * Get open time ranges as array of TimeRange instances that matches the current date and time.
     *
     * @return \Closure<\Spatie\OpeningHours\TimeRange[]>
     */
    public function getCurrentOpenTimeRanges()
    {
        /**
         * Get open time ranges as array of TimeRange instances that matches the current date and time.
         *
         * @return \Spatie\OpeningHours\TimeRange[]
         */
        return function () {
            /** @var Carbon $date */
            $date = isset($this) ? $this : static::now();

            return $date->getOpeningHours()->forDateTime($date);
        };
    }

    /**
     * Get current open time range as TimeRange instance or false if closed.
     *
     * @return \Closure<\Spatie\OpeningHours\TimeRange|bool>
     */
    public function getCurrentOpenTimeRange()
    {
        /**
         * Get current open time range as TimeRange instance or false if closed.
         *
         * @return \Spatie\OpeningHours\TimeRange|bool
         */
        return function () {
            /** @var Carbon $date */
            $date = isset($this) ? $this : static::now();

            return $date->getOpeningHours()->currentOpenRange($date);
        };
    }

    /**
     * Get current open time range start as Carbon instance or false if closed.
     * /!\ Important: it returns true if the current day is an holiday unless you set a closure handler for it in the
     * exceptions setting.
     *
     * @return \Closure<\Carbon\Carbon|\Carbon\CarbonImmutable|\Carbon\CarbonInterface|bool>
     */
    public function getCurrentOpenTimeRangeStart()
    {
        /**
         * Get current open time range start as Carbon instance or false if closed.
         * /!\ Important: it returns true if the current day is an holiday unless you set a closure handler for it in
         * the exceptions setting.
         *
         * @return \Carbon\Carbon|\Carbon\CarbonImmutable|\Carbon\CarbonInterface|bool
         */
        return $this->getCalleeAsMethod(static::CURRENT_OPEN_RANGE_START_METHOD);
    }

    /**
     * Get current open time range end as Carbon instance or false if closed.
     * /!\ Important: it returns true if the current day is an holiday unless you set a closure handler for it in the
     * exceptions setting.
     *
     * @return \Closure<\Carbon\Carbon|\Carbon\CarbonImmutable|\Carbon\CarbonInterface|bool>
     */
    public function getCurrentOpenTimeRangeEnd()
    {
        /**
         * Get current open time range end as Carbon instance or false if closed.
         * /!\ Important: it returns true if the current day is an holiday unless you set a closure handler for it in
         * the exceptions setting.
         *
         * @return \Carbon\Carbon|\Carbon\CarbonImmutable|\Carbon\CarbonInterface|bool
         */
        return $this->getCalleeAsMethod(static::CURRENT_OPEN_RANGE_END_METHOD);
    }

    /**
     * Get current open time range start as Carbon instance or false if closed or holiday.
     *
     * @return \Closure<\Carbon\Carbon|\Carbon\CarbonImmutable|\Carbon\CarbonInterface|bool>
     */
    public function getCurrentBusinessTimeRangeStart()
    {
        /**
         * Get current open time range start as Carbon instance or false if closed or holiday.
         *
         * @return \Carbon\Carbon|\Carbon\CarbonImmutable|\Carbon\CarbonInterface|bool
         */
        return $this->getCalleeAsMethod(static::CURRENT_OPEN_RANGE_START_METHOD, ['isHoliday', false]);
    }

    /**
     * Get current open time range end as Carbon instance or false if closed.
     *
     * @return \Closure<\Carbon\Carbon|\Carbon\CarbonImmutable|\Carbon\CarbonInterface|bool>
     */
    public function getCurrentBusinessOpenTimeRangeEnd()
    {
        /**
         * Get current open time range end as Carbon instance or false if closed.
         *
         * @return \Carbon\Carbon|\Carbon\CarbonImmutable|\Carbon\CarbonInterface|bool
         */
        return $this->getCalleeAsMethod(static::CURRENT_OPEN_RANGE_END_METHOD, ['isHoliday', false]);
    }
}
