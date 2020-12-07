<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Slider]].
 *
 * @see Slider
 */
class SliderQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Slider[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Slider|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
