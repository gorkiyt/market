<?php

namespace frontend\modules\admin\models;

use Yii;

/**
 * This is the model class for table "urun".
 *
 * @property integer $barkod_no
 * @property string $urun_kategori
 */
class Urun extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'urun';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['urun_kategori'], 'required'],
            [['urun_kategori'], 'string', 'max' => 33]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'barkod_no' => 'Barkod No',
            'urun_kategori' => 'Urun Kategori',
        ];
    }
}
