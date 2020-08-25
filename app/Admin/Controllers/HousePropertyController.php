<?php

namespace App\Admin\Controllers;

use App\HouseProperty;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class HousePropertyController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'HouseProperty';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new HouseProperty());

        $grid->column('id', __('Id'));
        $grid->column('type', __('Type'));
        $grid->column('is_pet', __('Is pet'));
        $grid->column('property_type', __('Property type'));
        $grid->column('name', __('Name'));
        $grid->column('hitokoto', __('Hitokoto'));
        $grid->column('good', __('Good'));
        $grid->column('bad', __('Bad'));
        $grid->column('pet_types', __('Pet types'));
        $grid->column('pet_cnt', __('Pet cnt'));
        $grid->column('nearest_station', __('Nearest station'));
        $grid->column('minutes_on', __('Minutes on'));
        $grid->column('address', __('Address'));
        $grid->column('cost', __('Cost'));
        $grid->column('manage_cost', __('Manage cost'));
        $grid->column('deposit', __('Deposit'));
        $grid->column('deposit_for_pet', __('Deposit for pet'));
        $grid->column('key_money', __('Key money'));
        $grid->column('deposit_ex', __('Deposit ex'));
        $grid->column('update_cost', __('Update cost'));
        $grid->column('insurance', __('Insurance'));
        $grid->column('insurance_corp', __('Insurance corp'));
        $grid->column('cost_memo', __('Cost memo'));
        $grid->column('deal_form', __('Deal form'));
        $grid->column('area', __('Area'));
        $grid->column('floor_plan', __('Floor plan'));
        $grid->column('floor', __('Floor'));
        $grid->column('age', __('Age'));
        $grid->column('structure', __('Structure'));
        $grid->column('park', __('Park'));
        $grid->column('other_condition', __('Other condition'));
        $grid->column('start_date', __('Start date'));
        $grid->column('end_date', __('End date'));
        $grid->column('corp_id', __('Corp id'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        $grid->column('is_published', __('Is published'));

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
        $show = new Show(HouseProperty::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('type', __('Type'));
        $show->field('is_pet', __('Is pet'));
        $show->field('property_type', __('Property type'));
        $show->field('name', __('Name'));
        $show->field('hitokoto', __('Hitokoto'));
        $show->field('good', __('Good'));
        $show->field('bad', __('Bad'));
        $show->field('pet_types', __('Pet types'));
        $show->field('pet_cnt', __('Pet cnt'));
        $show->field('nearest_station', __('Nearest station'));
        $show->field('minutes_on', __('Minutes on'));
        $show->field('address', __('Address'));
        $show->field('cost', __('Cost'));
        $show->field('manage_cost', __('Manage cost'));
        $show->field('deposit', __('Deposit'));
        $show->field('deposit_for_pet', __('Deposit for pet'));
        $show->field('key_money', __('Key money'));
        $show->field('deposit_ex', __('Deposit ex'));
        $show->field('update_cost', __('Update cost'));
        $show->field('insurance', __('Insurance'));
        $show->field('insurance_corp', __('Insurance corp'));
        $show->field('cost_memo', __('Cost memo'));
        $show->field('deal_form', __('Deal form'));
        $show->field('area', __('Area'));
        $show->field('floor_plan', __('Floor plan'));
        $show->field('floor', __('Floor'));
        $show->field('age', __('Age'));
        $show->field('structure', __('Structure'));
        $show->field('park', __('Park'));
        $show->field('other_condition', __('Other condition'));
        $show->field('start_date', __('Start date'));
        $show->field('end_date', __('End date'));
        $show->field('corp_id', __('Corp id'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('is_published', __('Is published'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new HouseProperty());

        $form->text('type', __('Type'));
        $form->text('is_pet', __('Is pet'));
        $form->text('property_type', __('Property type'));
        $form->text('name', __('Name'));
        $form->text('hitokoto', __('Hitokoto'));
        $form->text('good', __('Good'));
        $form->text('bad', __('Bad'));
        $form->text('pet_types', __('Pet types'));
        $form->text('pet_cnt', __('Pet cnt'));
        $form->text('nearest_station', __('Nearest station'));
        $form->text('minutes_on', __('Minutes on'));
        $form->text('address', __('Address'));
        $form->number('cost', __('Cost'));
        $form->number('manage_cost', __('Manage cost'));
        $form->text('deposit', __('Deposit'));
        $form->text('deposit_for_pet', __('Deposit for pet'));
        $form->text('key_money', __('Key money'));
        $form->text('deposit_ex', __('Deposit ex'));
        $form->number('update_cost', __('Update cost'));
        $form->number('insurance', __('Insurance'));
        $form->text('insurance_corp', __('Insurance corp'));
        $form->text('cost_memo', __('Cost memo'));
        $form->text('deal_form', __('Deal form'));
        $form->number('area', __('Area'));
        $form->text('floor_plan', __('Floor plan'));
        $form->number('floor', __('Floor'));
        $form->text('age', __('Age'));
        $form->text('structure', __('Structure'));
        $form->text('park', __('Park'));
        $form->text('other_condition', __('Other condition'));
        $form->date('start_date', __('Start date'))->default(date('Y-m-d'));
        $form->date('end_date', __('End date'))->default(date('Y-m-d'));
        $form->number('corp_id', __('Corp id'));
        $form->switch('is_published', __('Is published'));

        return $form;
    }
}
