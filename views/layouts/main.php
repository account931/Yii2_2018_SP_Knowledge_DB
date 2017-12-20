<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

//use yii\widgets\Block;
//use yii\bootstrap\SideNav;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Basic',  /*Yii-Basic 2F*/
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);

// **************************************************************************************
// **************************************************************************************
//                                                                                     **
//  START  MAin  Vertical  menu-------
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            /*['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'About', 'url' => ['/site/about']],
            
            ['label' => 'MyStats', 'url' => ['/site/mydbstart']],
                         

            ['label' => 'Reg', 'url' => ['/site/registartion'] ,'visible' => (Yii::$app->user->isGuest)]  ,

   
            ['label' => 'My Page', 'url' => ['/site/mypage']],


            ['label' => 'Admin', 'url' => ['/site/admin']],
            ['label' => 'Calc', 'url' => ['/site/calc']],
            ['label' => 'Split', 'url' => ['/site/split']],
            ['label' => 'Summary', 'url' => ['/site/summary']],
            ['label' => 'Gallery', 'url' => ['/site/gallery']],*/

            //['label' => 'BStrap', 'url' => ['/site/bstrap']],

            /*['label' => 'Geo', 'url' => ['/site/geocoding']],
            ['label' => 'Re-route', 'url' => ['/site/reroute']],
            ['label' => 'Sort', 'url' => ['/site/sort']],*/







//--- Submenu for Guest/ !Guest working---------------------
/* Yii::$app->user->isGuest ? (
									[ 'label' => 'For Unlogged', 'url' => ['/site/login'],  //],

									//['label' => 'Something else here', 'url' => ['/site/login'], //can take 1 arg only????
									]
                   
                           ) : ( 
								  ['label' => 'For Logged', 'url' => ['/site/login'],  //],

									//['label' => 'Something else here', 'url' => '#']
									]
								   ), //added comma
*/

//--- END Submenu for Guest/ !Guest working----------------------------------------------









  //SUPP menu
 ['label' => 'Knowledge Base',  'url' => ['/support-data/index'] ],    
 ['label' => 'Trim', 'url' => ['/site/trim']],
 ['label' => 'Log time', 'url' => ['/supp/index']],
 //['label' => 'Support Logs', 'url' => '#'],


 ['label' => 'Merge points', 'url' => ['/support-data/merge']        ],  /*,'visible'=>['!Yii::app()->user->isGuest']       */



//Start submenu-------------------------
['label' => 'Sub',  
        'url' => ['#'],
        'template' => '<a href="{url}" >{label}<i class="fa fa-angle-left pull-right"></i></a>',
        'visible' => !Yii::$app->user->isGuest,  // non visible for Guests //
    //  'visible' => !Yii::$app->user->isGuest && Yii::$app->user->identity->user_type == User::USER_TYPE_SUPER_ADMIN,
        'items' => [
            
            ['label' => 'DataBase', 'url' => ['/support-data/index']],
            ['label' => 'Support Logs', 'url' => ['/supp/index']],
            ['label' => 'WazeTrim', 'url' => ['/site/trim']],

            ['label' => 'BStrap',  'url' => ['/site/bstrap']],
            ['label' => 'My Time', 'url' => ['/site/mytime']],
           // ['label' => 'Waze Time', 'url' => '/site/contact'],
            ['label' => 'Contact', 'url' => ['/site/contact']],
            ['label' => 'PageLinker', 'url' => ['/site/pagelinker']   ],
            ['label' => 'Something else here', 'url' => '#'],
            ['label' => 'Additional  action', 'url' => '#'],
            
            ['label' => Html::img(Yii::$app->request->baseUrl.'/images/pencil2.png') . ' Image  menu',  'url' => ['/site/login'],     ],  //  menu item  with image  (won't  work  without  {encodeLabels' => false,}  ,  it  is  insertd  below)   
/*/yii/basic_download/web*/



        ],
    ],
// END  Submenu   --------------    




            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login'],  //],

                //['label' => 'Something else here', 'url' => '#']
                ]
                   
            ) : ( 
               
                 
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                                    )

 
                . Html::endForm()
                . '</li>'
               )

//-----------К

           
//-------------|К
        ],
          // added  to  let  img  in menu
          'encodeLabels' => false,











    ]); //END  NAv widget----------------------






			//-------------
			// Try  for  admin only (out  of item list)
			/*if(!Yii::$app->user->isGuest){
			   if ( strcmp ( Yii::$app->user->identity->role, 2) == 0  )
			 {
				 $items[] = [  ['label' => 'Sitt', 'url' => ['/site/signup'] ];  
			  // $menuItems[] = ['label' => 'Sitt', 'url' => ['/site/signup']];     
			}  }  */      
			//  ENd  try  for  admin only 
			//---------------------





    NavBar::end();
//  END  MAin  Vertical  menu---------------------
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************  
    ?>



    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>


<!------->
<?php /*Block::begin(array('id'=>'sidebar')); ?>

    <?php

                echo SideNav::widget([
                'type' => SideNav::TYPE_DEFAULT,
                'heading' => Yii::t('app','Party Options'),
                'items' => 
                [
                    [
                        'url' => ['/site/index'],
                        'label' => 'Home',
                        'icon' => 'home'
                    ],
                    ['label' => Yii::t('app','Create'), 'icon'=>'plus', 'url'=>['create']]
                  ]
        ]);
   ?>   
<?php Block::end();*/ ?>
<!--//-->


    </div>
</div>

<footer class="footer">
    <div class="container"> 
        <p class="pull-left">&copy;   <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

