<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ServicesModel]].
 *
 * @see ServicesModel
 */
class ServicesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return ServicesModel[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return ServicesModel|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
