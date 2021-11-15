<?php

namespace App\Admin\Controllers;

use App\Models\TelegramUser;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Admin\Actions\TelegramUser\SayHi;


class TelegramUserController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Пользователи Telegram';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new TelegramUser());
        $grid->actions(function ($actions) {
            $actions->add(new SayHi());
        });

        $grid->filter(function($filter) {
            $filter->disableIdFilter();
            $filter->like('u_name', 'User name');
        });

        $grid->column('id', __('Id'));
        $grid->column('t_firstname', __('Telegram fname'));
        $grid->column('t_lastname', __('Telegram lname'));
        $grid->column('t_id', __('Telegram id'));
        $grid->column('u_name', __('User name'));
        $grid->column('u_age', __('User age'))->sortable();
        $grid->column('status', __('Status'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(TelegramUser::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('t_firstname', __('T firstname'));
        $show->field('t_lastname', __('T lastname'));
        $show->field('t_id', __('T id'));
        $show->field('u_name', __('U name'));
        $show->field('u_age', __('U age'));
        $show->field('status', __('Status'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new TelegramUser());

        $form->text('t_firstname', __('T firstname'));
        $form->text('t_lastname', __('T lastname'));
        $form->text('t_id', __('T id'));
        $form->text('u_name', __('U name'));
        $form->switch('u_age', __('U age'));
        $form->text('status', __('Status'))->default('Новый');

        return $form;
    }
}
