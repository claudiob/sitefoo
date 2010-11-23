<?php

/**
 * user actions.
 *
 * @package    sitefoo
 * @subpackage user
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class userActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->sitefoo_users = Doctrine_Core::getTable('SitefooUser')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->sitefoo_user = Doctrine_Core::getTable('SitefooUser')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->sitefoo_user);
  }

  public function executeNew(sfWebRequest $request)
  {
    // @claudiob - set default values for fields in the form
    $sitefoo_user = new SitefooUser();
    $sitefoo_user->setEmail('phorkit@elenor.net');
    $sitefoo_user->setTimeZone('Pacific Time (US &amp; Canada)');
    $this->form = new SitefooUserForm($sitefoo_user);
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));
    $this->form = new SitefooUserForm();
    $this->processForm($request, $this->form);
    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    // $this->forward404Unless($sitefoo_user = Doctrine_Core::getTable('SitefooUser')->find(array($request->getParameter('id'))), sprintf('Object sitefoo_user does not exist (%s).', $request->getParameter('id')));
    // $this->form = new SitefooUserForm($sitefoo_user);
    $this->form = new SitefooUserForm($this->getRoute()->getObject());
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    // $this->forward404Unless($sitefoo_user = Doctrine_Core::getTable('SitefooUser')->find(array($request->getParameter('id'))), sprintf('Object sitefoo_user does not exist (%s).', $request->getParameter('id')));
    // $this->form = new SitefooUserForm($sitefoo_user);
    $this->form = new SitefooUserForm($this->getRoute()->getObject());
    $this->processForm($request, $this->form);
    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();
    // $this->forward404Unless($sitefoo_user = Doctrine_Core::getTable('SitefooUser')->find(array($request->getParameter('id'))), sprintf('Object sitefoo_user does not exist (%s).', $request->getParameter('id')));
    $sitefoo_user = $this->getRoute()->getObject();
    $sitefoo_user->delete();
    $this->redirect('user/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind(
      $request->getParameter($form->getName()), 
      $request->getFiles($form->getName())
    );
    if ($form->isValid())
    {
      $sitefoo_user = $form->save();
      $this->getUser()->setFlash('notice', 'You signed up correctly! Now you can sign up another time as a different user.');
      $this->redirect('user/new');
    }
  }
}
