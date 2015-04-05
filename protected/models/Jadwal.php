<?php

/**
 * This is the model class for table "jadwal".
 *
 * The followings are the available columns in table 'jadwal':
 * @property integer $id_jadwal
 * @property string $waktu
 * @property string $periode_awal
 * @property string $periode_akhir
 * @property integer $id_mk
 * @property integer $id_ruang
 *
 * The followings are the available model relations:
 * @property MataKuliah $idMk
 * @property Ruang $idRuang
 */
class Jadwal extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'jadwal';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('waktu, periode_awal, periode_akhir, id_mk, id_ruang', 'required'),
			array('id_mk, id_ruang', 'numerical', 'integerOnly'=>true),
			array('waktu', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_jadwal, waktu, periode_awal, periode_akhir, id_mk, id_ruang', 'safe', 'on'=>'search'),
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
			'idMk' => array(self::BELONGS_TO, 'MataKuliah', 'id_mk'),
			'idRuang' => array(self::BELONGS_TO, 'Ruang', 'id_ruang'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_jadwal' => 'Id Jadwal',
			'waktu' => 'Waktu',
			'periode_awal' => 'Periode Awal',
			'periode_akhir' => 'Periode Akhir',
			'id_mk' => 'Id Mk',
			'id_ruang' => 'Id Ruang',
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

		$criteria->compare('id_jadwal',$this->id_jadwal);
		$criteria->compare('waktu',$this->waktu,true);
		$criteria->compare('periode_awal',$this->periode_awal,true);
		$criteria->compare('periode_akhir',$this->periode_akhir,true);
		$criteria->compare('id_mk',$this->id_mk);
		$criteria->compare('id_ruang',$this->id_ruang);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Jadwal the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}