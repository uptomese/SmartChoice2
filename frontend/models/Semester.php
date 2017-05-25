<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "semester".
 *
 * @property integer $id
 * @property string $semester_thai
 * @property string $semester_eng
 *
 * @property Opensemester[] $opensemesters
 */
class Semester extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'semester';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['semester_thai', 'semester_eng'], 'required'],
            [['semester_thai', 'semester_eng'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'semester_thai' => 'ภาคเรียนภาษาไทย',
            'semester_eng' => 'ภาคเรียนภาษาอังกฤษ',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOpensemesters()
    {
        return $this->hasMany(Opensemester::className(), ['semester_id' => 'id']);
    }
}
