<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "person".
 *
 * @property integer $id
 * @property integer $status_id
 * @property string $person_code
 * @property string $person_title
 * @property string $person_name
 * @property string $person_lastname
 *
 * @property Answer[] $answers
 * @property PersonStatus $status
 * @property SectionPerson[] $sectionPeople
 */
class Person extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'person';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status_id'], 'integer'],
            [['person_title'], 'required'],
            [['person_title'], 'string'],
            [['person_code', 'person_name', 'person_lastname'], 'string', 'max' => 50],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => PersonStatus::className(), 'targetAttribute' => ['status_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status_id' => 'สถานะ',
            'person_code' => 'รหัส',
            'person_title' => 'คำนำหน้า',
            'person_name' => 'ชื่อ',
            'person_lastname' => 'นามสกุล',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnswers()
    {
        return $this->hasMany(Answer::className(), ['person_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(PersonStatus::className(), ['id' => 'status_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSectionPeople()
    {
        return $this->hasMany(SectionPerson::className(), ['person_id' => 'id']);
    }
}
