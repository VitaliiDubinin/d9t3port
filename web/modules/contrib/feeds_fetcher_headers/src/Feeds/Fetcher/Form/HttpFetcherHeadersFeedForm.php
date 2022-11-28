<?php

namespace Drupal\feeds_fetcher_headers\Feeds\Fetcher\Form;

use Drupal\Core\Form\FormStateInterface;
use Drupal\feeds\FeedInterface;
use Drupal\feeds\Feeds\Fetcher\Form\HttpFetcherFeedForm;

/**
 * Provides a form on the feed edit page for the HttpFetcher.
 */
class HttpFetcherHeadersFeedForm extends HttpFetcherFeedForm {

    /**
     * {@inheritdoc}
     */
    public function defaultConfiguration()
    {
        $defaults = parent::defaultConfiguration();
    }


  /**
   * {@inheritdoc}
   */
  public function buildConfigurationForm(array $form, FormStateInterface $form_state, FeedInterface $feed = NULL) {
      parent::buildConfigurationForm($form, $form_state, $feed);

      $form = parent::buildConfigurationForm($form, $form_state, $feed);

      $form['headers'] = [
        '#title' => $this->t('Scope:'),
        '#description' => "Please set the scope, like: invoices:read",
        '#type' => 'textarea',
        '#default_value' => $feed->getConfigurationFor($this->plugin)['headers'],
    ];

    return $form;
  }
    public function submitConfigurationForm(array &$form, FormStateInterface $form_state, FeedInterface $feed = NULL)
    {
        parent::submitConfigurationForm($form, $form_state, $feed);
        $feed_config = $feed->getConfigurationFor($this->plugin);
        $feed_config['headers'] = $form_state->getValue('headers');
        $feed->setConfigurationFor($this->plugin, $feed_config);
    }
}
