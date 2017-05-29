<?php
/**
* @file Contains the code to generate the custom drush commands.
*
* lowfidelity heavy industries 2016
*
* import nodes from rss feed
* make sure to adjust the field names and node creation
* function below.
*
* based on these tutorials
* http://valuebound.com/resources/blog/how-to-write-custom-drush-commands-...
* https://code.tutsplus.com/articles/how-to-read-an-rss-feed-with-php-scre...
*/
 
use Drupal\node\Entity\Node;
//use Drupal\Core\Datetime\DateFormatterInterface;
 
 
/**
* Implements hook_drush_command().
*/
 
function lofi_feeds_import_drush_command()
{
    $items = array();
 
    //import appointments from drupal 6 page. views export module
    //was used to create a xml view. this is the name of our custom command.
   //to run from command line we'd use drush lofi-import-termine http://url.of/our/source.xml
    $items['lofi-import-termine'] =
    [
        'description' => 'import termine nodes from old page',
        'arguments' =>
        [
         'feed_source' => 'The url to the feed',
        ],
        'drupal dependencies' => ['lofi_feeds_import'],        
    ];
 
 
    return $items;
}
 
 
 
 
/**
* Call back function drush_custom_drush_command_say_hello()
* The call back function name in the  following format
*   drush_{module_name}_{item_id_for_command}()
*/
function drush_lofi_feeds_import_lofi_import_termine($feed_source = '')
{
    if(strlen($feed_source) <= 0)
    {
        drush_print('Please specify URL to a RSS/XML Feed' . $feed_source);
        return;
    }
 
 
    drush_print('Reading from feed source ' . $feed_source);
 
    $content = file_get_contents($feed_source);
    $x = new SimpleXmlElement($content);
 
    $numNodesCreated = 0;
 
    foreach($x->node as $entry)
    {        
        drush_print('creating new node: ' . $entry->Titel);
        //creates a new node based on the infos from the entry object
        _lofi_feeds_import_create_termin_node($entry);
 
        //nodes counter
        $numNodesCreated++;
    }    
 
    drush_print('------------------');
    drush_print('finished importing from feed. created ' . $numNodesCreated . ' nodes');
 
 
}
 
 
function _lofi_feeds_import_create_termin_node($objEntry)
{
    //static settings for new nodes
    $nodeType = 'termin';
    $userId = 0;
    $revisionId = 0;
    $bPromoted = 0; //or 1
    $langCode = 'de';
 
 
    //node content read from rss feed
    $strNodeTitle = $objEntry->Titel;
    $strOrt = $objEntry->Titel;    //veranstaltungsort
    $strDatum = $objEntry->Datum;    //datum ie. 07.08.2010 - 20:00
 
 
 
    //create datetime object from supplied date string
    $objVeranstaltungsDatum = DateTime::createFromFormat("d.m.Y - H:i", $strDatum);
    //incorrect timezone. subtract 1 hour
    $objVeranstaltungsDatum->sub(DateInterval::createFromDateString('60 minutes'));
    //get proper format for storing to node
    $timestamp = $objVeranstaltungsDatum->getTimestamp();
    $strDateFormatted = \Drupal::service('date.formatter')->format($timestamp, 'custom', 'Y-m-d\TH:i:s', drupal_get_user_timezone());
 
 
    //prepare new node for creation
    $newNode = array
    (
        'nid' => NULL,
        'type' => $nodeType,
        'title' => $strNodeTitle,
        'uid' => $userId,
        'revision' => $revisionId,
        'status' => 1,
        'promote' => $bPromoted,
        'langcode' => $langCode,
        'field_veranstaltungsort' =>
        [
                value => $strOrt,
        ],
        'field_datum' =>
        [
                value => $strDateFormatted,
        ],
      );
 
    $node = Node::create($newNode);
    $node->save();
 
}
