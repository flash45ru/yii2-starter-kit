<?php
namespace frontend\decorator;

class AdventDecorator
{
    private $entity;

    public static function decorate($model)
    {
        return new self($model);
    }

    public function __construct($model)
    {
        $this->entity = $model;
    }

    public function __get($name)
    {
        $methodName = 'get'.$name;
        if(method_exists(self::class, $methodName)) {
            return $this->$methodName();
        }else{
            return $this->entity->{$name};
        }
    }

    public function __call($name, $arguments)
    {
        return $this->entity->$name($arguments);
    }

    public function getTitle()
    {
        return $this->entity->title;
    }

}