<?php

namespace App\Admin\Actions\TelegramUser;

use Encore\Admin\Actions\RowAction;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\BotManController;

class SayHi extends RowAction
{
    /**
     * The SayHi instance. 
     * Action name
     *
     * @var public $name
     */
    public $name = 'Say hi';


    /**
     * Handle action
     * @param Model $model
     * return 
     */
    public function handle(Model $model)
    {

        (new BotManController)->sayHi($model->t_id);
        return $this->response()->success('Success message.')->refresh();
    }

}