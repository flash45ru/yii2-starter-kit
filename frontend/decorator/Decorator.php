<?php

namespace frontend\decorator;

class Decorator
{
    protected $entity;

    public function __construct($model)
    {
        $this->entity = $model;
    }

    public function __get($name)
    {
        return $this->entity->{$name};
    }

    public static function decorate($entity)
    {
        return new static($entity);
    }

    public function __call($name, $arguments)
    {
        return $this->entity->$name($arguments);
    }
}