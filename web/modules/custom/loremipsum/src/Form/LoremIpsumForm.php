<?php

namespace Drupal\loremipsum\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class LoremIpsumForm extends ConfigFormBase{
    /**
     * {@inheritDoc}
     */
    public function getFormId(){
        return 'loremipsum_form';
    }

    /**
     * {@inheritDoc}
     */
    public function build(array $form, FormStateInterface $form_state){
        $form = parent::buildForm($form, $form_state);

        $config = $this->config('loremipsum.settings');

        $form['page_title'] = [
            '#type' => 'textfield',
            '#title' => $this->t('Lorem isum generator page title: '),
            '#default_value' => $config->get('loremipsum.page_title'),
            '#description' => $this->t('Give your lorem ipsum generator page a title.'),
        ];

        $form['source_text'] = [
            '#type' => 'textarea',
            '#title' => $this->t('Source text  for lorem ipsum generation: '),
            '#default_value' => $config->get('loremipsum.source_text'),
            '#description' => $this->t('Write one sentence per line. Thoes sentences will be used to generate random text.'),
        ];

        return $form;
    }
    /**
     * {@inheritDoc}
     *
     * Important the simbol & is to bind this to the origninal object so that
     * both are modified
     */
    public function validateForm(array &$form, FormStateInterface $form_state){
        // Validations
    }


    /**
     * {@inheritDoc}
     */
    public function submitForm(array &$form, FormStateInterface $form_state){
        $config = $this->config('loremipsum.settings');

        /**
         * (key, value)
         */
        $config->set('loremipsum.page_title', $form_state->getValue('page_title'));
        $config->set('loremipsum.source_text', $form_state->getValue('source_text'));

        $config->save();

        return parent::submitForm($form, $form_state);
    }


    /**
     * {@inheritDoc}
     *
     * Important the simbol & is to bind this to the origninal object so that
     * both are modified
     */
    protected function getEditableConfigNames(){
        return[
            'loremipsum.settings',
        ];
    }
}