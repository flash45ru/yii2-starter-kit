<?php


namespace frontend\decorator;


class AddYesOrNot extends Decorator
{
    public function __get($name)
    {
        if (!$this->entity->{$name}) {
            return '<strong style="color: darkred">' . 'No' . '</strong>';
        }

        return '<strong style="color: green">' . 'Yes' . '</strong>';
    }
}