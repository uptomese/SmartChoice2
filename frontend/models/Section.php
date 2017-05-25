<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "section".
 *
 * @property integer $id
 * @property string $section_value
 * @property string $create
 * @property integer $course_id
 * @property integer $opensemester_id
 *
 * @property Course $course
 * @property Opensemester $opensemester
 */
class Section extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'section';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['create'], 'safe'],
            [['course_id', 'opensemester_id'], 'required'],
            [['course_id', 'opensemester_id'], 'integer'],
            [['section_value'], 'string', 'max' => 50],
            [['course_id'], 'exist', 'skipOnError' => true, 'targetClass' => Course::className(), 'targetAttribute' => ['course_id' => 'id']],
            [['opensemester_id'], 'exist', 'skipOnError' => true, 'targetClass' => Opensemester::className(), 'targetAttribute' => ['opensemester_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'section_value' => 'กลุ่ม',
            'create' => 'สร้างเมื่อ',
            'course_id' => 'รายวิชา',
            'opensemester_id' => 'ปีการศึกษา',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourse()
    {
        return $this->hasOne(Course::className(), ['id' => 'course_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOpensemester()
    {
        return $this->hasOne(Opensemester::className(), ['id' => 'opensemester_id']);
    }
}
