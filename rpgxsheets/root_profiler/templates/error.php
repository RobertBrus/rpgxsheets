<!--
  error.tpl

  Defines the look of basic, uncustomized system error pages generated by
  3EProfiler.
-->
<?php global $body; ?>

<h1>Error!</h1>
<p>
  An internal error has ocurred while trying to perform your request,
  details of the error are listed below:
</p>
<p class="code">
  <?php echo $body; ?>
</p>
<p>
  Use your browser's <a href="javascript:history.back(1);">back</a> button
  to go back to the previous page. If this error persists, you may wish to
  contact the <a href="<?echo getUriWebmaster(); ?>">site operator</a>.
</p>
