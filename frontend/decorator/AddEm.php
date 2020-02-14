<?php


namespace frontend\decorator;


class AddEm extends Decorator
{
    public function __get($name)
    {
        return '<em>' . $this->entity->{$name} . '</em>';
    }

}