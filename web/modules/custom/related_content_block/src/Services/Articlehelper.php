<?php

namespace Drupal\related_content_block\Services;

use Drupal\Core\Database\Connection;
use Drupal\Core\Entity\EntityTypeManagerInterface;

/**
 * Helper class for related content block.
 */
final class Articlehelper {

  /**
   * The entity type manager.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  /**
   * The database connection.
   *
   * @var \Drupal\Core\Database\Connection
   */
  protected $database;

  /**
   * Constructs an UserCustomFormsHelper object.
   *
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_type_manager
   *   The entity type manager.
   * @param \Drupal\Core\Database\Connection $database
   *   The database connection.
   */
  public function __construct(EntityTypeManagerInterface $entity_type_manager, Connection $database) {
    $this->entityTypeManager = $entity_type_manager;
    $this->database = $database;
  }

  /**
   * Helper function to retrieve related articles.
   *
   * @param int $article_node_id
   *   Node Id of current article.
   * @param int $current_author
   *   Author ID of current article.
   * @param int $category_id
   *   Category ID of current article node.
   *
   * @return array
   *   An array containing related articles.
   */
  public function fetchRelatedArticles($article_node_id, $current_author, $category_id): array {
    // Quering related articles based on priorities.
    // Articles in the same category by the same author as the current article.
    $articles_priority_1 = $this->entityTypeManager->getStorage('node')->getQuery()
      ->accessCheck(FALSE)
      ->condition('nid', $article_node_id, '<>')
      ->condition('uid', $current_author)
      ->condition('field_category', $category_id)
      ->sort('title', 'ASC')
      ->sort('created', 'DESC')->range(0, 5)->execute();

    // Articles in the same category but by different authors.
    $articles_priority_2 = $this->entityTypeManager->getStorage('node')->getQuery()
      ->accessCheck(FALSE)
      ->condition('nid', $article_node_id, '<>')
      ->condition('field_category', $category_id)
      ->condition('uid', $current_author, '<>')
      ->sort('title', 'ACS')
      ->sort('created', 'DESC')->range(0, 5)->execute();

    // Articles in different categories but by the same author.
    $articles_priority_3 = $this->entityTypeManager->getStorage('node')->getQuery()
      ->accessCheck(FALSE)
      ->condition('nid', $article_node_id, '<>')
      ->condition('field_category', $category_id, '<>')
      ->condition('uid', $current_author)
      ->sort('title', 'ASC')
      ->sort('created', 'DESC')->range(0, 5)->execute();

    // Articles in different categories and by different authors.
    $articles_priority_4 = $this->entityTypeManager->getStorage('node')->getQuery()
      ->accessCheck(FALSE)
      ->condition('nid', $article_node_id, '<>')
      ->condition('field_category', $category_id, '<>')
      ->condition('uid', $current_author, '<>')
      ->sort('title', 'ASC')
      ->sort('created', 'DESC')->range(0, 5)->execute();

    $complete_list = array_unique(array_merge($articles_priority_1, $articles_priority_2, $articles_priority_3, $articles_priority_4));

    // Limiting results to 5.
    $complete_list = count($complete_list) > 4 ? array_slice($complete_list, 0, 5) : $complete_list;

    if (empty($complete_list)) {
      $return_data = [
        "Error" => TRUE,
        "Message" => 'No related Articles found.',
      ];
      return $return_data;
    }
    else {
      $article_nodes = $this->entityTypeManager->getStorage('node')->loadMultiple(array_values($complete_list));
      $return_data = [];
      foreach ($article_nodes as $node) {
        $term = $node->get('field_category')->referencedEntities()[0];
        $return_data[$node->id()]['article_title'] = $term ? '(' . $term->getName() . ') ' . $node->get('title')->value : $node->get('title')->value;
        $return_data[$node->id()]['article_url'] = $node->toUrl()->setAbsolute()->toString();
      }
    }
    return $return_data;
  }

}
