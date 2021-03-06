<?php

namespace App\Admin\Controllers;

use App\Models\User;
use Encore\Admin\Form;
use Encore\Admin\Http\Controllers\AdminController;
use Encore\Admin\Show;
use Encore\Admin\Table;

class UserController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '用户管理';

    /**
     * Make a table builder.
     *
     * @return Table
     */
    protected function table(): Table
    {
        $table = new Table(new User());

        $table->column('id', __('admin.Id'))->sortable();
        $table->column('name', __('admin.Name'));
        $table->column('email', __('admin.Email'));

        $table->column('posts', '文章数')->display(function ($posts) {
            $count = count($posts);
            return "<span class='label label-warning'>{$count}</span>";
        });

        $table->column('created_at', __('admin.Created at'));
        $table->column('updated_at', __('admin.Updated at'));

        return $table;
    }

    /**
     * Make a show builder.
     *
     * @param  mixed  $id
     * @return Show
     */
    protected function detail(mixed $id): Show
    {
        $show = new Show(User::findOrFail($id));

        $show->field('id', __('admin.Id'));
        $show->field('name', __('admin.Name'));
        $show->field('email', __('admin.Email'));
        $show->field('created_at', __('admin.Created at'));
        $show->field('updated_at', __('admin.Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form(): Form
    {
        $form = new Form(new User());

        $form->text('name', __('admin.Name'));
        $form->email('email', __('admin.Email'));
        $form->password('password', __('admin.Password'));

        return $form;
    }
}
