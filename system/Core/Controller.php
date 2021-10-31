<?php

class Controller  
{  
    protected function LoadModel($model = '') 
    {
        if (file_exists('./app/Models/' . $model . '.php')) {
            include './app/Models/' . $model . '.php';

            $nameModel = explode("/", $model);
            $nameModel = end($nameModel);

            return new $nameModel;
        }
    }  
    protected function LoadView($view = '', $data = []) 
    {
        if (file_exists('./app/Views/' . $view . '.php')) {
            include './app/Views/' . $view . '.php';

        }
        echo null;
    }
}