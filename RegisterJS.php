<?php
/**
 * Thanks to Mr. RichardFan
 * https://github.com/richardfan1126/yii2-js-register/blob/master/JSRegister.php
 */
namespace common\widgets;

// https://www.yiiframework.com/doc/api/2.0/yii-base-widget
use yii\base\Widget;
// https://www.yiiframework.com/doc/api/2.0/yii-web-view
use yii\web\View;

use Yii;

class RegisterJS extends Widget
{
	// https://www.yiiframework.com/doc/api/2.0/yii-web-view#registerJs()-detail
	public $position = View::POS_READY;
	public $key = null;

	public static function begin($config = [])
	{
		$widget = parent::begin($config);
		ob_start();
		return $widget;
	}

	public static function end()
	{
		$script = ob_get_clean();
		$widget = parent::end();
		if(preg_match("/^\s*<script\s*(.*)\s*>(.*)<\/script>\s*$/s",$script,$matches))
		{
			$script = trim($matches[2]);
		}
		$widget->view->registerJs($script, $widget->position, $widget->key);

		/**
		=====================================
		Contoh Penggunaan :
		
		<?php RegisterJS::begin([
			'key' => 'alert-js',
			'position' => $this::POS_READY
		]); ?>
		<script type="text/javascript">
			alert("HelloWorld!");
		</script>
		<?php RegisterJS::end(); ?>
		====================================
		Hasil dari kode diatas :

		<script>jQuery(function ($) {
		alert("HelloWorld!");
		});</script>
		 */
	}
}

/**
$pregex = "/^\\s*\\<script\\>(.*)\\<\\/script\\>\\s*$/s";

regular expressions bisa diawali tanda / ... / atau # ... # dsb

^\\s* = 
maksudnya adalah mencari spasi, tab, atau newline di awal kalimat (^). Dimulai dari 0 sampai banyak spasi (\s)

\\<script\\> = 
mencari string "<script>"

(.*) = 
mewakili karakter apapun dimulai dari 0 sampai banyak

\\<\\/script\\> = 
mencari string "</script>"

\\s*$ = 
masksudnya adalah mencari spasi, tab, atau newline di akhir kalimat ($). Dimulai dari 0 sampai banyak spasi (\s)

s
kata (s) diakhir penutup menandakan bahwa hasil keluaran (output) dari pencocokan ini berupa string

$pregex diatas sebenarnya bisa ditulis lebih ringkas seperti berikut :
/^\s*<script>(.*)<\/script>\s*$/s
Anda dapat mengecek kesalahan pada penulisan regex di https://regex101.com/

Masalahnya jika terdapat properti di dalam tag <script>, semisal <script type="text/javascript">, maka regex tidak akan mendapatkan apa yang ia cari, untuk menangani masalah tersebut, maka diperlukan pencarian tambahan dalam properti tag script dengan cara :
/^\s*<script\s*(.*)\s*>(.*)<\/script>\s*$/s

contoh :

$script = '
<script type="text/javascript">
Hallo
</script>
';
preg_match("/^\s*<script\s*(.*)\s*>(.*)<\/script>\s*$/s",$script,$matches);
var_dump($matches);

hasil :
array(3) 
{ 
	[0]=> string(53) " " 
	[1]=> string(22) "type="text/javascript"" 
	[2]=> string(9) " Hallo " 
} 

agar dapat menghilangkan spasi di awal dan akhir baris pada elemen array[2], maka lakukan dengan cara berikut :
var_dump(trim($matches[2]));
 */

/**
 * References :
 * Ebook PHP Uncover - Panduan Belajar PHP untuk Pemulai v.1 (Duniailkom). Halaman 373.
 * Buku Mastering AJAX dan PHP (Abdul Kadir). Halaman 175.
 * https://masputih.com/2015/11/belajar-regular-expression
 * https://www.yudana.id/teknik-dasar-regular-expression-dengan-menggunakan-php/
 * https://regex101.com/ example "\^\s*<script>(.*)<\/script>\s*$\s"
 */