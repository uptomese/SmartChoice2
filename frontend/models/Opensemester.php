<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "opensemester".
 *
 * @property integer $id
 * @property integer $semester_id
 * @property string $year
 *
 * @property Semester $semester
 */
class Opensemester extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'opensemester';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['semester_id', 'year'], 'required'],
            [['semester_id'], 'integer'],
            [['year'], 'string', 'max' => 45],
            [['semester_id'], 'exist', 'skipOnError' => true, 'targetClass' => Semester::className(), 'targetAttribute' => ['semester_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'semester_id' => 'ภาคเรียน',
            'year' => 'ปีการศึกษา',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSemester()
    {
        return $this->hasOne(Semester::className(), ['id' => 'semester_id']);
    }
}
