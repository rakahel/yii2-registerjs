# yii2-registerjs
<h2>Default Register JS Yii2</h2>
<div class="highlight highlight-text-html-php">
  <pre>
  
    <?php use \yii\web\View; ?>
    
    <?php $this->registerJs('
        alert("Hello World!");
    '); ?>
    
  </pre>
</div>

<p>generated results :</p>
<div class="highlight highlight-text-html-php">
  <pre>
    <script>
    jQuery(function ($) {
      alert("Hello World!");
    });
    </script>
  </pre>
</div>

<h2>Installation</h2>
<ol>
  <li>Download RegisterJS.php</li>
  <li>put the RegisterJS.php file in the directory "project_name/common/widgets/"</li>
  <li>call the widget class "use common\widgets\RegisterJS;"
</ol>

<h2>With RegisterJS.php</h2>
<div class="highlight highlight-text-html-php">
  <pre>
  
    <?php
    use \yii\web\View;
    use common\widgets\RegisterJS;
    ?>
    
    <?php RegisterJS::begin([
	'key' => 'alert-js',
	'position' => $this::POS_READY
    ]);?>
    <script type="text/javascript">
	alert("Hello World!");
    </script>
    <?php RegisterJS::end(); ?>
    
  </pre>
</div>

<p>generated results :</p>
<div class="highlight highlight-text-html-php">
  <pre>
    <script>jQuery(function ($) {
      alert("Hello World!");
    });</script>
  </pre>
</div>
