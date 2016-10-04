<?php
/**
 * Created by PhpStorm.
 * User: mhh14
 * Date: 10/4/2016
 * Time: 2:32 PM
 */

namespace ItvisionSy\Counter;

/**
 * @method Counter next()
 * @method-static Counter next()
 */
class Counter
{

    protected $current = 0;
    protected $step = 1;

    public function __toString()
    {
        return (string)$this->current;
    }

    public function __construct($start = 0, $step = 1)
    {
        $this->current = $start;
        $this->step = $step;
    }

    protected static function __next($start = 0, $step = 1)
    {
        return new static($start, $step);
    }

    protected function _next()
    {
        $this->current += $this->step;
        return $this;
    }

    public function __call($name, $arguments)
    {
        if ($name === 'next') {
            return call_user_func_array([$this, '_next'], $arguments);
        }
    }

    public static function __callStatic($name, $arguments)
    {
        if ($name === 'next') {
            return call_user_func_array([static::class, '__next'], $arguments);
        }
    }

    /**
     * @param $counter
     * @param int $start
     * @param int $step
     * @return Counter
     */
    public static function nextOrInit(&$counter, $start = 0, $step = 1)
    {
        if ($counter && $counter instanceof Counter) {
            $counter->next();
        } else {
            $counter = static::next($start, $step);
        }
        return $counter;
    }

    function __invoke($next = false)
    {
        if ($next) {
            return $this->next();
        } else {
            return $this->current();
        }
    }

    public function current()
    {
        return $this->current;
    }

}
