<?php

namespace App\Admin\Controllers;

use App\Models\Category;
use Encore\Admin\Form;
use Encore\Admin\Http\Controllers\AdminController;
use Encore\Admin\Show;
use Encore\Admin\Table;

class CategoryController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '分类管理';

    /**
     * Make a table builder.
     *
     * @return Table
     */
    protected function table(): Table
    {
        $table = new Table(new Category());

        $table->column('id', __('admin.Id'));
        $table->column('name', __('admin.Name'));
        $table->column('code', __('admin.Code'));

        $table->column('products', '产品数量')->display(function ($products) {
            $count = count($products);
            return "<span>${$count}</span>";
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
        $show = new Show(Category::findOrFail($id));

        $show->field('id', __('admin.Id'));
        $show->field('name', __('admin.Name'));
        $show->field('code', __('admin.Code'));
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
        $form = new Form(new Category());

        $form->text('name', __('admin.Name'));
        $form->text('code', __('admin.Code'));

        return $form;
    }
}
