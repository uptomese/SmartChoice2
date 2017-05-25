<?php

namespace app\models;

use Yii;
/**
 * This is the model class for table "answer".
 *
 * @property integer $id
 * @property integer $section_id
 * @property string $question
 * @property string $answer
 *
 * @property Section $section
 */
class Answer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'answer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['section_id'], 'integer'],
            [['answer'], 'required'],
            [['answer'], 'string'],
            [['question'], 'string', 'max' => 50],
            [['section_id'], 'exist', 'skipOnError' => true, 'targetClass' => Section::className(), 'targetAttribute' => ['section_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'section_id' => 'กลุ่ม',
            'question' => 'คำถาม',
            'answer' => 'คำตอบ',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSection()
    {
        return $this->hasOne(Section::className(), ['id' => 'section_id']);
    }
}
