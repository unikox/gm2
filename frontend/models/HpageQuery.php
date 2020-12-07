<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Hpage]].
 *
 * @see Hpage
 */
class HpageQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Hpage[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Hpage|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
