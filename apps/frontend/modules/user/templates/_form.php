<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<?php echo form_tag_for($form, '@user')?>
  <fieldset>
    <span class="half"><?php echo $form['first_name']->renderRow() ?></span>
    <span class="half"><?php echo $form['last_name']->renderRow() ?></span>
    <span class="full"><?php echo $form['email']->renderRow() ?></span>
    <span><?php echo $form['birth_date']->renderRow() ?></span>
    <span class="full"><?php echo $form['country']->renderRow() ?></span>
    <span class="full"><?php echo $form['time_zone']->renderRow() ?></span>
    <?php echo $form->renderHiddenFields() ?>
    <input type="submit" value="Sign up" />
  </fieldset>

</form>