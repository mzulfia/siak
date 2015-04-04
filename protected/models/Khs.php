<?php

/**
 * This is the model class for table "khs".
 *
 * The followings are the available columns in table 'khs':
 * @property integer $id_khs
 * @property integer $semester
 * @property string $nilai_akhir
 * @property integer $id_mhs
 * @property integer $id_mk
 *
 * The followings are the available model relations:
 * @property Mahasiswa $idMhs
 * @property MataKuliah $idMk
 */
class Khs extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'khs';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_khs, semester, nilai_akhir, id_mhs, id_mk', 'required'),
			array('id_khs, semester, id_mhs, id_mk', 'numerical', 'integerOnly'=>true),
			array('nilai_akhir', 'length', 'max'=>2),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_khs, semester, nilai_akhir, id_mhs, id_mk', 'safe', 'on'=>'search'),
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
			'idMhs' => array(self::BELONGS_TO, 'Mahasiswa', 'id_mhs'),
			'idMk' => array(self::BELONGS_TO, 'MataKuliah', 'id_mk'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_khs' => 'Id Khs',
			'semester' => 'Semester',
			'nilai_akhir' => 'Nilai Akhir',
			'id_mhs' => 'Id Mhs',
			'id_mk' => 'Id Mk',
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

		$criteria->compare('id_khs',$this->id_khs);
		$criteria->compare('semester',$this->semester);
		$criteria->compare('nilai_akhir',$this->nilai_akhir,true);
		$criteria->compare('id_mhs',$this->id_mhs);
		$criteria->compare('id_mk',$this->id_mk);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Khs the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
