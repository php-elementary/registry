<?php


namespace elementary\core\Registry;

use elementary\cache\Runtime\RuntimeCache;
use elementary\core\Singleton\SingletonTrait;
use stdClass;

class Registry
{
    use SingletonTrait;

    /**
     * @var RuntimeCache
     */
    protected $cache;

    /**
     * @param string $key
     *
     * @return array
     */
    public function get($key)
    {
        return $this->getCache()->get($key);
    }

    /**
     * @param string   $key
     * @param stdClass $instance
     *
     * @return $this
     */
    public function set($key, stdClass $instance)
    {
        $this->getCache()->set($key, $instance);

        return $this;
    }

    /**
     * @param string $key
     *
     * @return bool
     */
    public function delete($key)
    {
        return $this->getCache()->delete($key);
    }

    /**
     * @param $key
     *
     * @return bool
     */
    public function has($key)
    {
        return $this->getCache()->has($key);
    }

    /**
     * @return RuntimeCache
     */
    protected function getCache()
    {
        if (empty($this->cache)) {
            $this->cache = new RuntimeCache();
        }

        return $this->cache;
    }
}