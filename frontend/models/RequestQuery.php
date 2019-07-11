<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Request]].
 *
 * @see Request
 */
class RequestQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Request[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Request|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
