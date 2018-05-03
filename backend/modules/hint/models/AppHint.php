<?php

namespace backend\modules\hint\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\AttributeBehavior;

/**
 * This is the model class for table "app_hint".
 *
 * @property int $id
 * @property string $page_name
 * @property string $element_id
 * @property string $message
 * @property int $step
 * @property string $position
 * @property string $created_at
 */
class AppHint extends ActiveRecord
{
    const SAVE = 'save';

    public function behaviors()
    {
        return [
            [
                'class' => AttributeBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
                ],
                'value' => function ($event) {
                    return date('Y-m-d H:i:s');
                },
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'app_hint';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['page_name', 'element_id', 'message', 'step'], 'required'],
            [['step', 'id'], 'integer'],
            [['created_at'], 'safe'],
            [['element_id', 'page_name'], 'string', 'max' => 50],
            [['message'], 'string', 'max' => 255],
            [['position'], 'string', 'max' => 10],
            [['element_id'], 'validateElementId'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'page_name' => Yii::t('hint', 'Название страницы'),
            'element_id' => Yii::t('hint', 'Идентификатор элемента'),
            'message' => Yii::t('hint', 'Сообщение'),
            'step' => Yii::t('hint', 'Шаг'),
            'position' => Yii::t('hint', 'Положение'),
            'created_at' => 'Created At',
        ];
    }

    public function validateElementId()
    {
        if (isset($this->page_name)) {
            $status = AppHint::find()
                ->where(['page_name' => $this->page_name, 'element_id' => $this->element_id])
                ->andFilterWhere(['!=', 'id', $this->id])
                ->exists();

            if ($status) {
                $this->addError('element_id', Yii::t('hint', 'element_id уже существует'));
            }
        }
    }
}
