<?php

namespace Drupal\related_content_block\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\related_content_block\Services\Articlehelper;
use Drupal\node\Entity\Node;

/**
 * Provides a related article block block.
 *
 * @Block(
 *   id = "related_content_block_related_article_block",
 *   admin_label = @Translation("related article block"),
 *   category = @Translation("Custom"),
 *   context_definitions = {
 *      "node" = @ContextDefinition("entity:node", label = @Translation("Node"))
 *   }
 * )
 */
final class RelatedArticleBlockBlock extends BlockBase implements ContainerFactoryPluginInterface {

  /**
   * Article Helper.
   *
   * @var \Drupal\related_content_block\Services\ArticleHelper
   */
  protected $articleHelper;

  /**
   * Constructs an UserCustomFormsHelper object.
   *
   * @param array $configuration
   *   Configuration array.
   * @param mixed $plugin_id
   *   The plugin id.
   * @param mixed $plugin_definition
   *   The plugin definition.
   * @param \Drupal\related_content_block\Services\Articlehelper $articleHelper
   *   Article Helper Service.
   */
  public function __construct(
    array $configuration,
    $plugin_id,
    $plugin_definition,
    Articlehelper $articleHelper,
  ) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->articleHelper = $articleHelper;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition): self {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('related_content_block.articlehelper'),
    );
  }

  /**
   * {@inheritdoc}
   */
  public function build(): array {
    // Retrieving current node from context definition.
    $node = $this->getContextValue('node');
    if ($node instanceof Node && $node->getType() == 'article') {
      $author = $node->get('uid')->getValue();
      $category = $node->get('field_category')->getValue();
      if (empty($author) || empty($category)) {
        // Adding check for empty author and category values.
        $return_data = [
          "Error" => TRUE,
        ];
      }
      else {
        // Fetching related articles.
        $related_articles = $this->articleHelper->fetchRelatedArticles($node->id(), $author[0]["target_id"], $category[0]["target_id"]);
        $return_data = [
          '#theme' => 'related_content_block_custom_block',
          '#related_articles' => $related_articles,
          '#cache' => [
            'tags' => ['node_type:article'],
          ],
        ];
      }
    }
    return array_key_exists('Error', $related_articles) ? [] : $return_data;
  }

}
