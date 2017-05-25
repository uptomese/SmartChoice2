<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "person_status".
 *
 * @property integer $id
 * @property string $status_thai
 * @property string $status_eng
 *
 * @property Person[] $people
 */
class PersonStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'person_status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status_thai', 'status_eng'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status_thai' => 'สถานะ',
            'status_eng' => 'status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeople()
    {
        return $this->hasMany(Person::className(), ['status_id' => 'id']);
    }
}
