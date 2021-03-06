<?php

/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'EmploiDirect';
?>
<!DOCTYPE html>
<html>
    <head>
    <?= $this->Html->charset() ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
        </title>
        <?php echo $this->Html->meta( 'favicon.ico', '/favicon.ico', array('type' => 'icon') ); ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    </head>
    <body>
        <nav class="top-bar expanded" data-topbar role="navigation">
            <ul class="title-area large-3 medium-4 columns">
                <li class="name">
                    <h1><?= $this->Html->image("logo.png", [
                        'url' => ['controller' => 'Offers', 'action' => 'index']
                    ]); ?>
                    </h1>
                </li>
            </ul>
            <div class="top-bar-section">
                <ul class="right">
                    <li><?php
                        $loguser = $this->request->session()->read('Auth.User');
                  
                       
                         if ($loguser) {
                                $user = $loguser['email'];
                                if($loguser['role'] === 'enterprise') {
                                    echo '<li>' . $this->Html->Link('My account',['controller' => 'Enterprises', 'action' => 'view', $enterpriseId]);
                                } else {
								 echo '<li>' . $this->Html->Link('View my postulations',['controller' => 'Postulations', 'action' => 'historique', $logged_in_candidateProfile_id]);
                                    echo '<li>' . $this->Html->Link('My account',['controller' => 'Candidates', 'action' => 'view', $logged_in_candidateProfile_id]);
                                }
                                echo '</li><li>';
                                echo $this->Html->link($user . ' logout', ['controller' => 'Users', 'action' => 'logout']);
                        } else {
                                echo $this->Html->link('Login', ['controller' => 'Users', 'action' => 'login']);
                                echo '</li><li>';
                                echo $this->Html->link('Create Candidate Account', ['controller' => 'Users', 'action' => 'createCandidateAccount']);
                                echo '</li><li>';
                                echo $this->Html->link('Create Enterprise Account', ['controller' => 'Users', 'action' => 'createEnterpriseAccount']);
                        }
                    ?>
                    </li>
                </ul>
            </div>
        </nav>
    <?= $this->Flash->render() ?>
        <div class="container clearfix">
        <?= $this->fetch('content') ?>
        </div>
        <footer>
        </footer>
    </body>
</html>
