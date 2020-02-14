<?php


namespace frontend\decorator;


class AddStrong extends Decorator
{
    public function __get($name)
    {
        return '<strong>' . $this->entity->{$name} . '</strong>';
    }

}