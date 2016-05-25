<?php

namespace frontend\modules\admin\models;

use Yii;
use yii\web\UploadedFile;
use yii\db\Query;
use yii\frontend\modules\admin\models;
/**
 * This is the model class for table "market".
 *
 * @property integer $id
 * @property integer $barkod_no
 * @property string $urun_adi
 * @property string $urun_kategori
 */
class Market extends \yii\db\ActiveRecord
{

    public $upload_file;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'market';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['barkod_no', 'urun_adi', 'urun_kategori','urun_adet'], 'required'],
            [['barkod_no','urun_adet'], 'integer'],
            [['urun_adi', 'urun_kategori'], 'string', 'max' => 33],
            [['filename'], 'string', 'max' => 255],
            ['urun_adet','number','max'=>100],
            [['upload_file'], 'file', 'skipOnEmpty' => true, 'extensions' => 'jpg, png, mp4 , mp4a', 'mimeTypes' => 'image/jpeg, image/png, video/mp4 , audio/mp4',],
            ['barkod_no', 'validateTitle'],


        ];
    }
    
    
    public function validateTitle($attribute, $params)
    {
       //$barkod_no = $this->attribute;
       //$connection = Yii::$app->db;
      // $query = (new \yii\db\Query())->select(['*'])->from('market')->where(['barkod_no' => barkod_no]);
      //$query = "select * from market where barkod_no='$barkod_no'";
      
      $market = Yii::app()->db->createCommand()
    ->select('*')
    ->from('market')
    ->where(['barkod_no'=>'$barkod_no'])
    ->queryAll();
    if($this->barkod_no == 444){
              $this->addError($attribute,"yok".$barkod_no.".");

    }
     else $this->addError($attribute,"var".$barkod_no.".");
       if($market)
       {
        $this->addError($attribute,"yok".$barkod_no.".");
return $market;
       }
       else
       {
        $this->addError($attribute,"var".$barkod_no.".");
        return $market;
       }
       
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'barkod_no' => 'Barkod No',
            'urun_adi' => 'Urun Adi',
            'urun_kategori' => 'Urun Kategori',
            'urun_adet'=>'Ürün Adeti',
            'upload_file' => 'Resim Ekle',
        ];
    }


    public function uploadFile() {
        // get the uploaded file instance
        $image = UploadedFile::getInstance($this, 'upload_file');
 
        // if no image was uploaded abort the upload
        if (empty($image)) {
            return false;
        }
 
        // generate random name for the file
        $this->filename = time(). '.' . $image->extension;
 
        // the uploaded image instance
        return $image;
    }
 
    public function getUploadedFile() {
        // return a default image placeholder if your source avatar is not found
        $filename = isset($this->filename) ? $this->filename : 'default.png';
        return Yii::$app->params['fileUploadUrl'] . $filename;
    }

    public function getImageurl()
    {
         return \Yii::$app->request->BaseUrl.'/uploads/'.$this->logo;
    }
}
