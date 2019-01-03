<?php
/**
 *@copyright : QTeqLab
 *@author	 : Vishal Sinha < vishalsinha19@gmail.com >
 */
namespace app\components\grid\widgets;

use yii\grid\DataColumn;
use yii\helpers\Html;

class QLabelColumn extends DataColumn
{

    public $attribute = 'state_id';

    public $badges = [
        'badge badge-secondary',
        'badge badge-primary',
        'badge badge-success',
        'badge badge-danger',
        'badge badge-warning',
        'badge badge-info',
        'badge badge-light',
        'badge badge-dark'
    ];

    protected function renderDataCellContent($model, $key, $index)
    {
        return Html::tag('span', $this->getDataCellValue($model, $key, $index), [
            'class' => isset($this->badges[$model->{$this->attribute}]) ? $this->badges[$model->{$this->attribute}] : 'badge badge-primary'
        ]);
    }
}
?>