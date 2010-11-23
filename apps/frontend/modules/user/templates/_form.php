<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<?php echo form_tag_for($form, '@user')?>
<input type="submit" value="Sign up" />
<?php echo $form ?>
</form>