<?php

namespace app\modules\schoolyear\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\schoolyear\models\Schoolyear;

/**
 * SchoolyearSearch represents the model behind the search form about `app\modules\schoolyear\models\Schoolyear`.
 */
class SchoolyearSearch extends Schoolyear
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['school_year_id', 'created_by', 'updated_by', 'is_status'], 'integer'],
            [['start', 'end', 'school_year_alias', 'created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Schoolyear::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'school_year_id' => $this->school_year_id,
            'start' => $this->start,
            'end' => $this->end,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
            'is_status' => $this->is_status,
        ]);

        $query->andFilterWhere(['like', 'school_year_alias', $this->school_year_alias]);

        return $dataProvider;
    }
}
