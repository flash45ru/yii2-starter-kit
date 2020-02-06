<?php

namespace console\controllers;

use Yii;
use yii\console\Controller;


/**
 * Class ExtendedMessageController
 * @package console\controllers
 */
class CreateDbController extends Controller
{

    public function actionTables()
    {
        $tables = [
        'docker-compose exec app console/yii migrate/create create_advent_table --fields=title:string,description:text,price:decimal,contacts:string',
        'docker-compose exec app console/yii migrate/create create_photo_table --fields="advent_id:integer:notNull:foreignKey(advent),file:string"',
        'docker-compose exec app console/yii migrate/create create_car_table --fields="advent_id:integer:notNull:foreignKey(advent)"',
        'docker-compose exec app console/yii migrate/create create_characteristic_table --fields="car_id:integer:notNull:foreignKey(car),model:string,year:integer,carcase:string,mileage:integer"',
        'docker-compose exec app console/yii migrate/create create_options_table --fields="car_id:integer:foreignKey(car),conditioner:smallint,airbags:smallint,multimedia:smallint,cruise_control:smallint"'
        ];

    }
}
