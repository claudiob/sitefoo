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
    $this->validatorSchema['email'] = new sfValidatorAnd(array( 
      $this->validatorSchema['email'], 
      new sfValidatorEmail()
    ));

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
    $this->validatorSchema['birth_date'] = new sfValidatorAnd(array( 
      $this->validatorSchema['birth_date'], 
      new sfValidatorDate(array('max' => $birth_date_max))
    ));

    // country
    $this->widgetSchema['country'] = new sfWidgetFormI18nChoiceCountry(array(
      'add_empty' => '--',
    ));
    $this->validatorSchema['country'] = new sfValidatorAnd(array( 
      $this->validatorSchema['country'], 
      new sfValidatorI18nChoiceCountry()
    ));
    
    // time_zone
    $this->widgetSchema['time_zone'] = new sfWidgetFormI18nChoiceTimezone(array(
      'add_empty' => '--',
    ));
    $this->validatorSchema['time_zone'] = new sfValidatorAnd(array( 
      $this->validatorSchema['time_zone'], 
      new sfValidatorI18nChoiceTimezone()
    ));
    
  }
}
