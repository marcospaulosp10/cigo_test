<?php

namespace app\models;

use Yii;
use app\controllers\SiteController ;
use app\services\Geolocalization;

/**
 * This is the model class for table "services".
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $phone_number
 * @property string $order_type
 * @property float $order_value
 * @property string $scheduled_date
 * @property string $street_address
 * @property string $city
 * @property string $state
 * @property string $zip
 * @property string $status
 * @property string $country
 * @property string|null $lat
 * @property string|null $lng
 */
class ServicesModel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'services';
    }


    public function beforeSave($insert) {
        if($this->isNewRecord) {
            $geoloc = new Geolocalization();
            $resultParse = (array)json_decode($geoloc->searchInGeo($this->street_address, $this->city, $this->state, $this->zip));
            
            $this->lat = $resultParse['results']->city->response->results[0]->location->lat;
            $this->lng = $resultParse['results']->city->response->results[0]->location->lng;
        } else {
            $this->status = $_GET['newStatus'];
        }
        
        return parent::beforeSave($insert);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'email', 'phone_number', 'order_type', 'order_value', 'scheduled_date', 'street_address', 'city', 'state', 'zip', 'country'], 'required'],
            [['order_type', 'status'], 'string'],
            [['order_value'], 'number'],
            [['email'], 'email'],
            [['scheduled_date'], 'safe'],
            [['first_name'], 'string', 'max' => 30],
            [['last_name'], 'string', 'max' => 100],
            [['email', 'city'], 'string', 'max' => 50],
            [['phone_number'], 'string', 'max' => 11],
            [['street_address'], 'string', 'max' => 200],
            [['state', 'lat', 'lng'], 'string', 'max' => 20],
            [['zip'], 'string', 'max' => 10],
            [['country'], 'string', 'max' => 3],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'email' => 'Email',
            'phone_number' => 'Phone Number',
            'order_type' => 'Order Type',
            'order_value' => 'Order Value',
            'scheduled_date' => 'Scheduled Date',
            'street_address' => 'Street Address',
            'city' => 'City',
            'state' => 'State / Province',
            'zip' => 'Zip Code',
            'status' => false,
            'lat' => false,
            'lng' => false,
            'status' => false,
            'country' => 'Country',
        ];
    }

    /**
     * {@inheritdoc}
     * @return ServicesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ServicesQuery(get_called_class());
    }
}
