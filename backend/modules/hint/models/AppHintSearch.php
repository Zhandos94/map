<?php
/**
 * Created by PhpStorm.
 * User: zh.zhumagali
 * Date: 07.03.2018
 * Time: 12:00
 */

namespace backend\modules\hint\models;

use yii\data\ActiveDataProvider;

class AppHintSearch extends AppHint
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['step'], 'integer'],
            [['element_id', 'page_name', 'message', 'position'], 'string'],
        ];
    }

    public function search($params)
    {
        $query = AppHint::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'step' => $this->step,
            'position' => $this->position,
        ]);

        $query->andFilterWhere(['like', 'page_name', $this->page_name])
            ->andFilterWhere(['like', 'element_id', $this->element_id])
            ->andFilterWhere(['like', 'message', $this->message]);

        return $dataProvider;
    }
}