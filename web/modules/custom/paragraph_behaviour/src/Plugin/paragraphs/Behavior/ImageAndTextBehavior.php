<?php

namespace Drupal\paragraph_behaviour\Plugin\paragraphs\Behavior;

use Drupal\Core\Entity\Display\EntityViewDisplayInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\paragraphs\Entity\Paragraph;
use Drupal\paragraphs\Entity\ParagraphsType;
use Drupal\paragraphs\ParagraphInterface;
use Drupal\paragraphs\ParagraphsBehaviorBase;

/**
 * Attributes coming from paragraphs.
 *
 * @ParagraphsBehavior(
 *   id = "custom_image_and_text",
 *   label = @Translation("Paragraph Image and Text settings"),
 *   description = @Translation("Allows to select image position."),
 *   weight = 0,
 * )
 */
class ImageAndTextBehavior extends ParagraphsBehaviorBase {

  /**
   * Output of element position.
   */
  public function view(array &$build, Paragraph $paragraph, EntityViewDisplayInterface $display, $view_mode) {
    $settingsImage = $paragraph->getBehaviorSetting($this->pluginId, "field_settings", 'left');
    $build['#attributes']['class'][] = 'image-position--' . str_replace('_', '-', $settingsImage);
  }

  /**
   * Is applicable fields.
   */
  public static function isApplicable(ParagraphsType $paragraphs_type) {

    if ($paragraphs_type->id() == "text_image") {
      return TRUE;
    }
    else {
      return FALSE;
    }

  }

  /**
   * Create select for admin.
   */
  public function buildBehaviorForm(ParagraphInterface $paragraph, array &$form, FormStateInterface $form_state) {

    $form['field_settings'] = [
      '#type' => 'select',
      '#title' => $this->t('Image position'),
      '#options' => $this->getImagePositionOptions(),
      '#default_value' => $paragraph->getBehaviorSetting($this->getPluginId(), 'image_position', 'left'),
    ];

  }

  /**
   * Summary for admin.
   */
  public function settingsSummary(Paragraph $paragraph) {
    $settingsImage = $paragraph->getBehaviorSetting($this->pluginId, "field_settings", 'left');
    $imagePositionOptions = $this->getImagePositionOptions();
    $summary = [];
    $summary[] = $this->t('Image position: @value', ['@value' => $imagePositionOptions[$settingsImage]]);
    return $summary;
  }

  /**
   * Function for list options .
   */
  private function getImagePositionOptions() {

    return [
      'left' => $this->t('Left'),
      'right' => $this->t('Right'),
    ];
  }

}
