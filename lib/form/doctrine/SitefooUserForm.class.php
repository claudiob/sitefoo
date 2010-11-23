<?php

/**
 * SitefooUser form.
 *
 * @package    sitefoo
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class SitefooUserForm extends BaseSitefooUserForm
{
  public function configure()
  {
    // @claudiob - render fields without a table-based layout
    $this->getWidgetSchema()->getFormFormatter()->setRowFormat(
      "%label%%field%%error%%help%%hidden_fields%");
    $this->getWidgetSchema()->getFormFormatter()->setErrorRowFormat(
      "%errors%\n");
    $this->getWidgetSchema()->getFormFormatter()->setHelpFormat(
      '%help%');
    $this->getWidgetSchema()->getFormFormatter()->setDecoratorFormat(
      "%content%");

    // @claudiob - render errors in a 'jquery.validate' format
    // TODO: extract the field name and use it as the "for" attribute
    $this->getWidgetSchema()->getFormFormatter()->setErrorListFormatInARow(
      "  %errors%");
    $this->getWidgetSchema()->getFormFormatter()->setErrorRowFormatInARow(
      "  <label for=\"#\" generated=\"true\" class=\"error\">%error%</label>\n");
    $this->getWidgetSchema()->getFormFormatter()->setNamedErrorRowFormatInARow(
      "  <label for=\"#\" generated=\"true\" class=\"error\">%name%: %error%</label>\n");
    
    // @claudiob - which fields should appear and the order
    $this->useFields(array('first_name', 'last_name', 'email', 'birth_date', 
      'country', 'time_zone'));
    
    // @claudiob - validation rules (added to the SQL ones) and custom lists
    // email
    $this->validatorSchema['email'] = new sfValidatorEmail();
    $this->validatorSchema->setPostValidator(new sfValidatorDoctrineUnique(
      array('model' => 'SitefooUser', 'column' => 'email',
        'throw_global_error' => false),
      array('invalid' => 'A user with this %column% already exists.')));

    // birth_date
    $minimum_age = 13;
    $birth_date_range  = range(date('Y')-100, date('Y')-$minimum_age);
    $this->widgetSchema['birth_date'] = new sfWidgetFormDate(array(
      'format'       => '%month% %day% %year%',
      'months'       => array_combine(range(1, 12), sfDateTimeFormatInfo::getInstance()->getMonthNames()),
      'empty_values' => array('day' => '--', 'month' => '--', 'year' => '--'),
      'years'        => array_combine($birth_date_range,$birth_date_range),
    ));
    $birth_date_max = date('Y-m-d',
      strtotime ("-$minimum_age year", strtotime(date('Y-m-d'))));
    $this->validatorSchema['birth_date'] = new sfValidatorDate(
        array('max' => $birth_date_max), 
        array('max' => "You must be at least $minimum_age years old to sign up.",
              'invalid' => 'Please enter a valid date.'));
  
    // country
    $this->widgetSchema['country'] = new sfWidgetFormI18nChoiceCountry(array(
      'add_empty' => '--',
    ));
    $this->validatorSchema['country'] = new sfValidatorAnd(array( 
      $this->validatorSchema['country'], 
      new sfValidatorI18nChoiceCountry()
    ));
    
    // time_zone
    // NOTE: sfWidgetFormI18nChoiceTimezone has a different set of zones
    // $this->widgetSchema['time_zone'] = new sfWidgetFormI18nChoiceTimezone(array(
    //   'add_empty' => '--',
    // ));
    // $this->validatorSchema['time_zone'] = new sfValidatorAnd(array( 
    //   $this->validatorSchema['time_zone'], 
    //   new sfValidatorI18nChoiceTimezone()
    // ));
    $this->widgetSchema['time_zone'] = new sfWidgetFormChoice(array(
      'choices' => sfConfig::get('app_timezones'),
      'expanded' => false,
    ));
    
  }
}
