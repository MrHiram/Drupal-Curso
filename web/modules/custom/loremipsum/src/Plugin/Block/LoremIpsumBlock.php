<?php
namespace Drupal\loremipsum\Plugin\Block;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Form\FormStateInterface;


/**
 * Provides a Lorem ipsum block with which you can generate dummy text anywhere.
 *
 * @Block(
 *   id = "loremipsum_block",
 *   admin_label = @Translation("Lorem ipsum block"),
 * )
 */
class LoremIpsumBlock extends BlockBase{
    /**
     * {@inheritDoc}
     */
    public function build()
    {
        return \Drupal::formBuilder()->getForm('Drupal\loremipsum\Form\LoremIpsumBlockForm');
    }

    /**
     * {@inheritDoc}
     */
    public function blockAccess(AccountInterface $account){
        return AccessResult::allowedIfHasPermission($account, 'generate lorem ipsum');
    }

    /**
     * {@inheritDoc}
     */
    public function blockForm($form, FormStateInterface $form_state)
    {
        $form = parent::blockForm($form, $form_state);
        $config = $this->getConfiguration();
        return $form;
    }

    /**
     * {@inheritDoc}
     */
    public function blockSubmit($form, FormStateInterface $form_state)
    {
        $this->setConfigurationValue('loremipsum_block_settings', $form_state->getValue('loremipsum_block_settings'));
    }
}