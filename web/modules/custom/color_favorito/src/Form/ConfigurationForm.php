<?php

namespace Drupal\color_favorito\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class ConfigurationForm extends ConfigFormBase{
    /**
     * {@inheritDoc}
     */
    public function getFormId()
    {
        return "color_favorito.configuration_form";
    }

    /**
     * {@inheritDoc}
     */
    public function buildForm(array $form, FormStateInterface $form_state)
    {
        $form = parent::buildForm($form, $form_state);

        $config = $this->config('color_favorito.configuration');

        //https://api.drupal.org/api/drupal/elements/8.8.x
        $form['color_favorito'] = [
            '#type' => 'textfield',
            '#title' => $this->t('Ingrese su color favorito'),
            '#default_value' => $config->get('color_favorito'),
            '#size' => 64,
            '#maxlength' => 64,
        ];

        return $form;
    }

    /**
     * {@inheritDoc}
     */
    public function validateForm(array &$form, FormStateInterface $form_state)
    {
        /* TODO: Validar campo lleno */
    }

    /**
     * {@inheritDoc}
     */
    public function submitForm(array &$form, FormStateInterface $form_state)
    {
        $this->config('color_favorito.configuration')
                ->set('color_favorito', $form_state->getValue('color_favorito'))
                ->save();

        return parent::submitForm($form, $form_state);
    }

    /**
     * {@inheritDoc}
     */
    public function getEditableConfigNames(){
        return [
            'color_favorito.configuration'
        ];
    }
}