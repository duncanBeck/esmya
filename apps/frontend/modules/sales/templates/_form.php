
<link href="/css/datepicker.css" rel="stylesheet">
<script type="text/javascript" src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
<script src="/js/datepicker.js"></script>

<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<script>
    $(document).ready(function(){
        $('.datepicker').datepicker(
                { dateFormat: 'yyyy-mm-dd' }
        );
    });
</script>
<form action="<?php echo url_for('sales/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          &nbsp;<a href="<?php echo url_for('sales/index') ?>">Back to list</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'sales/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
    <div class="form-group">
        <label>Date</label>
        <input type="text" name="day[sales_date]" class="form-control datepicker" value="<?php
            if ($form['sales_date']->getValue()=="") { echo date('Y-m-d'); }
                else { echo $form['sales_date']->getValue(); }    ?>"
              >
    </div>
    <div class="form-group">
        <label>Sales</label>
        <input type="text" name="day[actual_sales]" class="form-control" value="<?php
        if ($form['actual_sales']->getValue()=="") { echo '0'; }
        else { echo $form['actual_sales']->getValue(); }    ?>"">
    <?php echo $form->renderHiddenFields(); ?>
    </div>
    </tbody>
  </table>
</form>
