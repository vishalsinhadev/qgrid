<?php
/**
 *@copyright : QTeqLab
 *@author	 : Vishal Sinha < vishalsinhadev@gmail.com >
 */
namespace app\components\grid;

class QLinkPager extends \yii\widgets\LinkPager
{

    public $options = [
        'class' => 'pagination'
    ];

    public $linkOptions = [
        'class' => 'page-link'
    ];

    public $pageCssClass = 'page-item';

    public $firstPageCssClass = '';

    public $lastPageCssClass = '';

    public $prevPageCssClass = 'page-item';

    public $nextPageCssClass = 'page-item';

    public $activePageCssClass = 'active';

    public $disabledPageCssClass = 'disabled';

    public $disabledListItemSubTagOptions = [
        'class' => 'page-link',
        'tag' => 'a'
    ];

    public $maxButtonCount = 10;

    public $nextPageLabel = '&raquo;';

    public $prevPageLabel = '&laquo;';

    public $firstPageLabel = false;

    public $lastPageLabel = false;
}
