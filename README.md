# yii2-registerjs
<h2>Default Register JS Yii2</h2>
<div class="highlight highlight-text-html-php">
  <pre>
    <?php use  \yii\web\View; ?>
    // html code
    <?php $this->registerJs('
        alert("Hello World!");
    ');
    // other script
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
  <li>
</ol>
