<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->redirect('site/login');

	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$this->layout = 'home';
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login()){
				switch(Yii::app()->user->getState('role')){
					case 1:
						$model1 = Admin::model()->findAllByAttributes(array('id_user' => Yii::app()->user->getId()));
						foreach($model1 as $model){
							$model1 = $model->id_admin;
						}
						$this->redirect(Yii::app()->createUrl('/Admin/'));
						break;
					case 2:
						$model2 = Sekretariat::model()->findAllByAttributes(array('id_user' => Yii::app()->user->getId()));
						foreach($model2 as $model){
							$model2 = $model->id_sekretariat;
						}
						$this->redirect(Yii::app()->createUrl('/Sekretariat/'));
						break;	
					case 3:
						$model3 = Dosen::model()->findAllByAttributes(array('id_user' => Yii::app()->user->getId()));
						foreach($model3 as $model){
							$model3 = $model->id_dosen;
						}
						$this->redirect(Yii::app()->createUrl('/Dosen'));
						break;	
					case 4:
						$model4 = Mahasiswa::model()->findAllByAttributes(array('id_user' => Yii::app()->user->getId()));
						foreach($model4 as $model){
							$model4 = $model->id_mhs;
						}
						$this->redirect(Yii::app()->createUrl('/Mahasiswa'));
						break;	
				}
			}
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

	public function actionFAQ()
	{
		$this->render('faq');
	}
}