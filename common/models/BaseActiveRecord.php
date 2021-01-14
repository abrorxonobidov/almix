<?php
/**
 * Created by PhpStorm.
 * User: a_obidov
 * Date: 09.01.2021
 * Time: 18:46
 */

namespace common\models;


use common\helpers\DebugHelper;
use Yii;
use yii\db\ActiveQuery;
use yii\helpers\Html;
use yii\db\ActiveRecord;
use yii\helpers\Url;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

/**
 * @property integer $id
 * @property string $titleLang
 * @property string $previewLang
 * @property string $descriptionLang
 * @property string $helpImage
 * @property integer $status
 *
 * @property Log $created
 * @property Log $updated
 */
class BaseActiveRecord extends ActiveRecord
{

    public $helpImage;
    public $helpGallery;

    public function afterSave($insert, $changedAttributes)
    {

        $this->addLog($insert ? Log::ACTION_INSERT : Log::ACTION_UPDATE);
        parent::afterSave($insert, $changedAttributes);

    }

    public function afterDelete()
    {
        $this->addLog(Log::ACTION_DELETE);
        parent::afterDelete();
    }

    public function addLog($action_id)
    {
        $log = new Log();
        $log->user_id = Yii::$app->user->id;
        $log->action_id = $action_id;
        $log->date = date('Y-m-d H:i:s');
        $log->row_id = $this->id;
        $log->table_name = $this::tableName();
        if (!$log->save()) {
            DebugHelper::printSingleObject($log->errors, 0);
        };
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('main', 'ID'),
            'statusIconAndTitle' => Yii::t('main', 'Holati'),
            'statusIcon' => Yii::t('main', 'Holati'),
            'category' => Yii::t('main', 'Kategoriya'),
            'category_id' => Yii::t('main', 'Kategoriya') . ' ID',
            'order' => Yii::t('main', 'Tartibi'),
            'title' => Yii::t('main', 'Nomi'),
            'title_uz' => Yii::t('main', 'Nomi') . ' uz',
            'title_ru' => Yii::t('main', 'Nomi') . ' ru',
            'title_en' => Yii::t('main', 'Nomi') . ' en',
            'titleLang' => Yii::t('main', 'Nomi'),
            'description' => Yii::t('main', 'Batafsil'),
            'preview_uz' => Yii::t('main', 'Anons') . ' uz',
            'preview_ru' => Yii::t('main', 'Anons') . ' ru',
            'preview_en' => Yii::t('main', 'Anons') . ' en',
            'description_uz' => Yii::t('main', 'Izoh') . ' uz',
            'description_ru' => Yii::t('main', 'Izoh') . ' ru',
            'description_en' => Yii::t('main', 'Izoh') . ' en',
            'status' => Yii::t('main', 'Holati'),
            'image' => Yii::t('main', 'Rasm'),
            'helpImage' => Yii::t('main', 'Rasm'),
            'created.date' => Yii::t('main', 'Yaratilgan sana'),
            'created.user.full_name' => Yii::t('main', 'Yaratuvchi'),
            'updated.date' => Yii::t('main', 'Tahrirlangan sana'),
            'updated.user.full_name' => Yii::t('main', 'Tahrirlovchi'),
        ];
    }


    /**
     * @return array
     */
    public static function getLanguages()
    {
        return ['uz', 'ru', 'en'];
    }


    /**
     * @return array
     */
    public static function getLanguageTitles()
    {
        return [
            'uz' => 'O‘zbekcha',
            'ru' => 'Русский',
            'en' => 'English'
        ];
    }


    /**
     * @return array
     */
    public static function getStatusList()
    {
        return [
            1 => [
                'title' => 'Aktiv',
                'icon' => 'ok',
                'color' => '#00ff00'
            ],
            0 => [
                'title' => 'O‘chirilgan',
                'icon' => 'remove',
                'color' => '#ff0000'
            ],
        ];
    }


    /**
     * @return string
     */
    public function getStatusTitle()
    {
        return self::getStatusList()[$this->status]['title'];
    }


    /**
     * @return string
     */
    public function getStatusIcon()
    {
        return
            Html::tag('i', '', [
                'class' => 'glyphicon glyphicon-' . self::getStatusList()[$this->status]['icon'],
                'style' => 'color: ' . self::getStatusList()[$this->status]['color'] . ';',
                'title' => self::getStatusTitle()
            ]);
    }


    /**
     * @return string
     */
    public function getStatusIconAndTitle()
    {
        return self::getStatusIcon() . " " . self::getStatusTitle();
    }


    /**
     * @return array
     */
    public static function getStatusListKeyAndTitle()
    {
        $array = [];
        foreach (self::getStatusList() as $key => $item)
            $array[$key] = $item['title'];
        return $array;
    }


    /**
     * @return ActiveQuery || Log
     */
    public function getCreated()
    {
        return $this->hasOne(Log::class, ['row_id' => 'id'])
            ->onCondition(['table_name' => $this::tableName(), 'action_id' => Log::ACTION_INSERT]);
    }


    /**
     * @return ActiveQuery || Log
     */
    public function getUpdated()
    {
        return $this->hasOne(Log::class, ['row_id' => 'id'])
            ->onCondition(['table_name' => $this::tableName(), 'action_id' => Log::ACTION_UPDATE])
            ->orderBy(['date' => SORT_DESC]);
    }


    /**
     * Generates random string for file names
     * @return string
     */
    public static function createGuid()
    {
        $guid = '';
        $uid = uniqid("", true);
        $data = $_SERVER['REQUEST_TIME'];
        $data .= $_SERVER['HTTP_USER_AGENT'];
        $hash = hash('ripemd128', $uid . $guid . md5($data));
        $guid = substr($hash, 0, 8) .
            '-' . substr($hash, 8, 4) .
            '-' . substr($hash, 12, 4) .
            '-' . substr($hash, 16, 4) .
            '-' . substr($hash, 20, 12);
        return $guid;
    }


    /**
     * Uploads given image by post request
     * @param string $fileInput
     * @param string $field
     * @param string $table
     */
    public function uploadImage($fileInput, $field, $table = '')
    {
        $image = UploadedFile::getInstance($this, $fileInput);
        if ($image) {
            if (!$this->isNewRecord) {
                if (!empty($this->$field)) {
                    $oldImage = self::uploadImagePath() . $this->$field;
                    if (file_exists($oldImage)) {
                        unlink($oldImage);
                    }
                }
            }

            $imageName = self::createGuid() . '_' . $table . '.' . $image->getExtension();
            $this->$field = $imageName;
            $imagePath = self::uploadImagePath() . $imageName;

            $image->saveAs($imagePath);
            /*if(file_exists($imagePath)){
                list($width, $height) = getimagesize($imagePath);
                if(($width > $imageWidth && $height > $imageHeigth) || ($height > $imageWidth && $width > $imageHeigth)){
                    $resize = new ResizeImage($imagePath);
                    $resize->resizeTo($imageWidth, $imageWidth);
                    unlink($imagePath);
                    $resize->saveImage($imagePath,80);
                }
            }*/
        }
    }


    /**
     * @param string $fileInput
     * @param string $field
     * @param string $table
     * @throws NotFoundHttpException
     */
    public function uploadGallery($fileInput, $field, $table = '')
    {
        $images = UploadedFile::getInstances($this, $fileInput);
        if ($images) {
            if (!$this->isNewRecord && !empty($this->$field))
                self::deleteDir(self::uploadImagePath() . $this->$field);
            $folderName = self::createGuid() . '_' . $table;
            mkdir(self::uploadImagePath() . $folderName);
            $this->$field = $folderName;
            foreach ($images as $image) {
                $imageName = self::createGuid() . '_' . $table . '.' . $image->getExtension();
                $imagePath = self::uploadImagePath() . $folderName . '/' . $imageName;
                $image->saveAs($imagePath);
            }
        }
    }


    /**
     * Returns File Upload Configuration for Kartik FileInput widget.
     * @param string $field
     * @param string $deleteUrl
     * @param string $className
     * @return array
     */
    public function inputImageConfig($field, $deleteUrl, $className = self::class)
    {
        $config = [
            'path' => [],
            'config' => []
        ];
        if (!$this->isNewRecord && !empty($this->$field)) {
            $image = $this->$field;
            $file = self::uploadImagePath() . $image;
            if (file_exists($file)) {
                $config = [
                    'path' => [
                        Url::to(self::imageSourcePath() . $this->$field)
                    ],
                    'config' => [
                        [
                            'caption' => $image,
                            'size' => filesize($file),
                            'url' => $deleteUrl,
                            'key' => $this->$field,
                            'extra' => [
                                'id' => $this->id,
                                'field' => $field,
                                'className' => $className
                            ]
                        ]
                    ]
                ];
            }
        }
        return $config;
    }


    /**
     * Returns the path that images will be uploaded
     * @return string
     */
    public static function uploadImagePath()
    {
        return Yii::getAlias('@frontend') . '/web/uploads/';
    }


    /**
     * Returns the path that images will be uploaded
     * @return string
     */
    public static function imageSourcePath()
    {
        return 'http://' . str_replace('admin.', '', $_SERVER['SERVER_NAME']) . '/uploads/';
    }

    /**
     * Returns title in current language
     * @return string
     */
    public function getTitleLang()
    {
        return $this->{'title_' . Yii::$app->language};
    }

    /**
     * Returns title in current language
     * @return string
     */
    public function getPreviewLang()
    {
        return $this->{'preview_' . Yii::$app->language};
    }

    /**
     * Returns title in current language
     * @return string
     */
    public function getDescriptionLang()
    {
        return $this->{'description_' . Yii::$app->language};
    }


    /**
     * @param $dirPath
     * @throws NotFoundHttpException
     */
    public static function deleteDir($dirPath)
    {
        if (!is_dir($dirPath)) {
            throw new NotFoundHttpException("$dirPath must be a directory");
        }
        if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
            $dirPath .= '/';
        }
        $files = glob($dirPath . '*', GLOB_MARK);
        foreach ($files as $file) {
            if (is_dir($file)) {
                self::deleteDir($file);
            } else {
                unlink($file);
            }
        }
        rmdir($dirPath);
    }


    public static function getForDropDown()
    {
        $cats = self::find()
            ->select([
                'id',
                'title' => 'title_' . Yii::$app->language
            ])
            ->asArray()
            ->all();
        $res = [];
        foreach ($cats as $cat)
            $res[$cat['id']] = $cat['title'];
        return $res;
    }

}

