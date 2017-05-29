<?php

namespace Drupal\feed_new\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;
use  Drupal\node\Entity\Node;
class FeedController extends ControllerBase {

  public static function create(ContainerInterface $container) {
    return new static($container->get('module_handler'));
  }

  public function feedPage() {
         /////////////////////////////////////////////////
$node = Node::create([
  // The node entity bundle.
  'type' => 'article',
  'langcode' => 'en',
  'created' => REQUEST_TIME,
  'changed' => REQUEST_TIME,
  // The user ID.
  'uid' => 1,
  'title' => 'My test!',
  // An array with taxonomy terms.
  'field_tags' =>[2],
  'body' => [
    'summary' => '',
    'value' => '<p>The body of my node.</p>',
    'format' => 'full_html',
  ],
]);
$node->save();
\Drupal::service('path.alias_storage')->save("/node/" . $node->id(), "/my/path", "en");
$node_es = $node->addTranslation('es');
$node_es->title = 'Mi prueba!';
$node_es->body->value = '<p>El cuerpo de mi nodo.</p>';
$node_es->body->format = 'full_html';
$node_es->save();
\Drupal::service('path.alias_storage')->save("/node/" . $node->id(), "/mi/ruta", "es");
///////////////////////////////////////////////////////////
    $build = array(
      '#type' => 'markup',
      '#markup' => t('Hello World!'),
    );
    return $build;
}
/*
////////////////////////////////////////////////////////////////////////////

$file = "note.xml";
$xml= simplexml_load_file($file);

//echo sizeof($xml);
//echo "<pre>";
//print_r($xml);

    foreach($xml as $entry )
    {
        //the $entry object holds all fields from our <node> tag in the XML source. 
        //In our example this would be $entry->Datum, $entry->Titel and $entry->Body 
        //drush_print('creating new node: ' . $entry->Titel);
       echo "<pre>";
      $a = $entry->name;
      $b = $entry->price;
      $c = $entry->description;
      $d = $entry->calories;
       echo $a . "\n".$b."\n".$c."\n".$d;

/////////////////////////////NODE CREATION////////////////////////////////////////

$node = Node::create([
  // The node entity bundle.
  'type' => 'article',
  'langcode' => 'en',
  'created' => REQUEST_TIME,
  'changed' => REQUEST_TIME,
  // The user ID.
  'uid' => 1,
  'title' => 'My test!',
  // An array with taxonomy terms.
  'field_tags' =>[2],
  'body' => [
    'summary' => '',
    'value' => '<p>The body of my node.</p>',
    'format' => 'full_html',
  ],
]);
$node->save();


/////////////////////////////////////////////////////////////////////////////
  }
}



// Programmatically create and translate nodes.
use Drupal\node\Entity\Node;
$node = Node::create([
  // The node entity bundle.
  'type' => 'article',
  'langcode' => 'en',
  'created' => REQUEST_TIME,
  'changed' => REQUEST_TIME,
  // The user ID.
  'uid' => 1,
  'title' => 'My test!',
  // An array with taxonomy terms.
  'field_tags' =>[2],
  'body' => [
    'summary' => '',
    'value' => '<p>The body of my node.</p>',
    'format' => 'full_html',
  ],
]);
$node->save();
\Drupal::service('path.alias_storage')->save("/node/" . $node->id(), "/my/path", "en");
$node_es = $node->addTranslation('es');
$node_es->title = 'Mi prueba!';
$node_es->body->value = '<p>El cuerpo de mi nodo.</p>';
$node_es->body->format = 'full_html';
$node_es->save();
\Drupal::service('path.alias_storage')->save("/node/" . $node->id(), "/mi/ruta", "es");
*/
