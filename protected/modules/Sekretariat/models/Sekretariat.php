<?php

/**
 * This is the model class for table "sekretariat".
 *
 * The followings are the available columns in table 'sekretariat':
 * @property integer $nip_sekretariat
 * @property string $nama
 * @property integer $id_user
 *
 * The followings are the available model relations:
 * @property User $idUser
 */
class Sekretariat extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sekretariat';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_user', 'required'),
			array('id_user', 'numerical', 'integerOnly'=>true),
			array('nip_sekretariat', 'length', 'max'=>20),
			array('nama', 'length', 'max'=>25),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_sekretariat, nip_sekretariat, nama, id_user', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'idUser' => array(self::BELONGS_TO, 'User', 'id_user'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_sekretariat' => 'ID Sekretariat',
			'nip_sekretariat' => 'NIP',
			'nama' => 'Nama',
			'id_user' => 'ID User',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_sekretariat', $this->id_sekretariat);
		$criteria->compare('nip_sekretariat',$this->nip_sekretariat);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('id_user',$this->id_user);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort' => array(
				'defaultOrder'=> 'nip_sekretariat ASC'
			),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Sekretariat the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getId($id)
	{
		$sql = 'SELECT id_sekretariat FROM sekretariat WHERE id_user = :id';
		$arr = Yii::app()->db->createCommand($sql)->queryAll(true, array(':id' => $id));

		$result = '';
		foreach($arr as $arr2)
		{
			$result = $arr2['id_sekretariat'];
		}
		return $result;
	}


	public function getNama($id){
		$res = Sekretariat::model()->findByAttributes(array('id_sekretariat' => $id));
		return $res->nama; 
	}

	public function getNIP($id){
		$res = Sekretariat::model()->findByAttributes(array('id_sekretariat' => $id));
		return $res->nip_sekretariat; 
	}
}
