<?php

namespace Drupal\browser_miner\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Url;

/**
 * Provides a 'Hello' Block.
 *
 * @Block(
 *   id = "browser_miner_popup_block",
 *   admin_label = @Translation("Browser Miner Popup Block"),
 *   category = @Translation("Content"),
 * )
 */
class BrowserMinerPopupBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {

    $link = [];

    $url = Url::fromRoute('browser_miner.form');
    $link['link'] = [
      '#type' => 'link',
      '#url' => $url,
      '#title' => t(''),
      '#attributes' => [
        'class' => [
          'bminer-link',
          'use-ajax',
        ],
        'data-dialog-type' => 'modal',
        'data-dialog-options' => '{"width":700}',
      ],
    ];

    // Attach the library for pop-up dialogs/modals.
    $link['#attached']['library'][] = 'browser_miner/browserMiner';
    $link['#attached']['library'][] = 'core/drupal.dialog.ajax';

    return $link;
  }
}