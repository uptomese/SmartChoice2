<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

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
                'brandLabel' => 'Smartchoice V.2',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);

            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],

                'items' => [
                        ['label' => 'Home', 'url' => ['/site/index']],
                        ['label' => 'About', 'url' => ['/site/about'],'visible' => Yii::$app->user->isGuest],
                        ['label' => 'Contact', 'url' => ['/site/contact'],'visible' => Yii::$app->user->isGuest],
                    
                        ['label' => 'Course', 'url' => ['/course/index'], 'visible' => !Yii::$app->user->isGuest],
                        ['label' => 'Section', 'url' => ['/section/index'], 'visible' => !Yii::$app->user->isGuest],
                    
                        ['label' => 'Person', 'url' => ['/person/index'], 'visible' => !Yii::$app->user->isGuest, 'items' => [
                            ['label' => 'Person all', 'url' => ['/person/index']], 
                            ['label' => 'Person sec', 'url' => ['/sectionperson/index']],//ไม่ได้
                        ]],
                    
                        ['label' => 'Results', 'url' => ['/result/index'], 'visible' => !Yii::$app->user->isGuest, 'items' => [
                            ['label' => 'Max Min', 'url' => 'index.php?r=result/maxmin'],
                            ['label' => 'Mean', 'url' => 'index.php?r=result/mean'],
                            ['label' => 'ถูกผิด', 'url' => 'index.php?r=result/maxmin'],
                            ['label' => 'Graph', 'url' => 'index.php?r=result/graph'],
                        ]],
                    
//                        ['label' => 'ETC.', 'url' => ['transactions/index'],  'items' => [
//                                ['label' => 'About', 'url' => ['/site/about']],
//                                ['label' => 'Contact', 'url' => ['/site/contact']],
//                        ]],
                    Yii::$app->user->isGuest ?
                            ['label' => 'LOGIN', 'url' => ['/user/security/login']] :
                            ['label' => Yii::$app->user->identity->username, 'items' => [

                                ['label' => 'profile', 'url' => ['/user/settings/profile']],
                                ['label' => 'Manage users', 'url' => ['/user/admin'], 'visible' => Yii::$app->user->identity->username == 'admin'],
                            '<li class="divider"></li>',
                                ['label' => 'Logout', 'url' => ['/user/security/logout'], 'linkOptions' => ['data-method' => 'post']],
                        ]],
                ],
            ]);
            NavBar::end();
            ?>=

            <div class="container">
<?=
Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
])
?>
                <?= Alert::widget() ?>
                <?= $content ?>
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <p class="pull-left">&copy; My Company <?= date('Y') ?></p>
                
                <p class="pull-right">University of Phayao</p>
            </div>
        </footer>

<?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
