<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "course".
 *
 * @property integer $id
 * @property string $course_code
 * @property string $course_name
 * @property string $course_name_eng
 *
 * @property Section[] $sections
 */
class Course extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'course';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['course_code', 'course_name'], 'required'],
            [['course_code', 'course_name', 'course_name_eng'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'course_code' => 'รหัสรายวิชา',
            'course_name' => 'ชื่อรายวิชา',
            'course_name_eng' => 'Name Course',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSections()
    {
        return $this->hasMany(Section::className(), ['course_id' => 'id']);
    }
}
