<?php
/**
 *@copyright : QTeqLab
 *@author	 : Vishal Sinha < vishalsinhadev@gmail.com >
 */
namespace app\components\grid;

use yii\widgets\Pjax;

class QGridView extends \yii\grid\GridView
{

    public $enablePjax = true;

    public $pjaxOptions = [];

    /**
     * Apply class `table-responsive` if enabled.
     */
    public $responsive = false;

    /**
     *
     * @var array the HTML attributes for the grid table element.
     * @see \yii\helpers\Html::renderTagAttributes() for details on how attributes are being rendered.
     */
    public $tableOptions = [
        'class' => 'table table-striped table-bordered'
    ];

    /**
     *
     * @inheritdoc
     */
    public $pager = [
        'class' => QLinkPager::class
    ];

    /**
     *
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        $this->rowOptions = function ($model, $key, $index, $grid) {
            return [
                'style' => "cursor: pointer",
                'onclick' => 'location.href="' . $model->getUrl() . '"'
            ];
        };
        if ($this->responsive) {
            $this->tableOptions['class'] = $this->tableOptions['class'] . ' table-responsive';
        }
        if (empty($this->pjaxOptions)) {
            $this->pjaxOptions = [
                'id' => $this->id . '-pjax-grid'
            ];
        }
    }

    public function run()
    {
        if ($this->enablePjax) {
            Pjax::begin($this->pjaxOptions);
        }
        parent::run();
        if ($this->enablePjax) {
            Pjax::end();
        }
    }
}
