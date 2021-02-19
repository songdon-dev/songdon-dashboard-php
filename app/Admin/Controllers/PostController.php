<?php

namespace App\Admin\Controllers;

use App\Admin\Selectable\Users;
use App\Models\Post;
use Encore\Admin\Form;
use Encore\Admin\Http\Controllers\AdminController;
use Encore\Admin\Show;
use Encore\Admin\Table;

class PostController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '文章管理';

    /**
     * Make a table builder.
     *
     * @return Table
     */
    protected function table(): Table
    {
        $table = new Table(new Post());

        $table->column('id', __('admin.Id'))->sortable();
        $table->column('title', __('admin.Title'));
        $table->column('content', __('admin.Content'));
        $table->column('user.name', __('admin.User Name'));
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
        $show = new Show(Post::findOrFail($id));

        $show->field('id', __('admin.Id'));
        $show->field('title', __('admin.Title'));
        $show->field('content', __('admin.Content'));
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
        $form = new Form(new Post());

        $form->text('title', __('admin.Title'));
        $form->text('content', __('admin.Content'));
        $form->belongsTo('user_id', Users::class, '作者');

        return $form;
    }
}
