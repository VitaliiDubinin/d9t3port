<?php

namespace Drupal\severa_directory\Controller;

use Drupal\Core\Controller\ControllerBase;

class SeveraRespond extends ControllerBase {
    public function view() {
        $content = [];
    
        $content['name'] = 'My name is Severa';
    
        return [
          '#theme' => 'severa-respond',
          '#content' => $content,
        ];
      }

}