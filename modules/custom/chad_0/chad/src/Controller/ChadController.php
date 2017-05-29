<?php

   namespace Drupal\chad\Controller;

   use Drupal\Core\Controller\ControllerBase;
   use Symfony\Component\DependencyInjection\ContainerInterface;
   use Drupal\node\Entity\Node;
   class ChadController extends ControllerBase {

   public static function create(ContainerInterface $container) {
    return new static($container->get('module_handler'));
  }

   public function chadPage() {
         $build = array(
        '#type' => 'markup',
        '#markup' => t('Hello World!'),
     );
         return $build;
  }

  
   public function feedCall(){
           $file = "http://localhost/vakul/codes/note.xml";
           $xml= simplexml_load_file($file);
       
           foreach($xml as $entry )
               {
                 $a = $a.$entry->name;
                 $b = $b.$entry->price;
                 $c = $c.$entry->description;
                 $d = $d.$entry->calories;
          }
     $node = Node::create([
       'type' => 'page',
       'langcode' => 'en',
       'created' => REQUEST_TIME,
       'changed' => REQUEST_TIME,
       'uid' => 1,
       'title' => 'custom content by vakul',
       'field_a' => $a,
       'field_b' => $b,
       'field_c' => $c,
       'field_d' => $d, 
       'field_tags' =>[2],
       'body' => [
       'summary' => '',
       'value' => $a."<br>".$b."<br>".$c."<br>".$d,
       'format' => 'full_html',
     ],
]);
      $node->save();
      return $node;
      }
}
