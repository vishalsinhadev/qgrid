<?php

/**
 *@copyright : QTeqLab
 *@author	 : Vishal Sinha < vishalsinhadev@gmail.com >
 */
namespace app\components\grid\widgets;

use Yii;
use yii\helpers\Html;

class QActionColumn extends \yii\grid\ActionColumn
{

    public $header = 'Actions';

    public function init()
    {
        $this->initDefaultButton('view', 'eye');
        $this->initDefaultButton('update', 'pencil');
        $this->initDefaultButton('delete', 'trash', [
            'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
            'data-method' => 'post'
        ]);
        parent::init();
        $this->urlCreator = function ($action, $model, $key, $index) {
            return $model->getUrl($action);
        };
    }

    protected function initDefaultButton($name, $iconName, $additionalOptions = [])
    {
        if (! isset($this->buttons[$name]) && strpos($this->template, '{' . $name . '}') !== false) {
            $this->buttons[$name] = function ($url, $model, $key) use ($name, $iconName, $additionalOptions) {
                switch ($name) {
                    case 'view':
                        $title = Yii::t('yii', 'View');
                        $this->buttonOptions = [
                            'class' => 'btn btn-success'
                        ];
                        break;
                    case 'update':
                        $title = Yii::t('yii', 'Update');
                        $this->buttonOptions = [
                            'class' => 'btn btn-primary'
                        ];
                        break;
                    case 'delete':
                        $title = Yii::t('yii', 'Delete');
                        $this->buttonOptions = [
                            'class' => 'btn btn-danger'
                        ];
                        break;
                    default:
                        $title = ucfirst($name);
                }
                $options = array_merge([
                    'title' => $title,
                    'aria-label' => $title,
                    'data-pjax' => '0'
                ], $additionalOptions, $this->buttonOptions);
                $icon = Html::tag('span', '', [
                    'class' => "fa fa-$iconName"
                ]);
                return Html::a($icon, $url, $options);
            };
        }
    }
}
