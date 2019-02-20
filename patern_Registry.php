<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

interface RegistryInterface
{
    public function set($key, $value = null);

    public function get($key);

    public function uns($key);
}

class Registry implements RegistryInterface
{
    protected $registry = [];

    public function set($key, $value = null)
    {
        if (isset($this->registry[$key])) {
            throw new Exception('Element with key:' . $key . ' already exists!!!');

            return false;
        }

        $this->registry[$key] = $value;

        return $this;
    }

    public function get($key)
    {
        if (!isset($this->registry[$key])) {
            return false;
        }

        return $this->registry[$key];
    }

    public function uns($key)
    {
        if (!isset($this->registry[$key])) {
            throw new Exception('Element with key:' . $key . ' not exists!!!');
        }

        unset($this->registry[$key]);

        return $this;
    }

    public function has($key)
    {
        return isset($this->registry[$key]);
    }

    public function upd($key, $value = null)
    {
        if ($this->has($key)) {
            $this->uns($key);
        }

        $this->set($key, $value);

        return $this;
    }
}
$registry=new Registry();
