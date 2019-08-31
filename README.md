# yii2-registerjs
<h2>Default Register JS Yii2</h2>
<div class="highlight highlight-text-html-php">
  <pre>
    use \yii\web\View;
    // ... html code ...
    $this->registerJs('
        alert("Hello World!");
    ');
    // ... other script ...
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
    use \yii\web\View;
    use common\widgets\RegisterJS;
    
    <span class="pl-s1"><span class="pl-k">&lt;</span>?<span class="pl-c1">php</span></span>
    RegisterJS::begin([
			'key' => 'alert-js',
			'position' => $this::POS_READY
		]);
    <span class="pl-pse"><span class="pl-s1">?</span>&gt;</span>
    
    <script type="text/javascript">
			alert("HelloWorld!");
		</script>
    
    <span class="pl-s1"><span class="pl-k">&lt;</span>?<span class="pl-c1">php</span></span>
    RegisterJS::end();
    <span class="pl-pse"><span class="pl-s1">?</span>&gt;</span>
  </pre>
</div>

