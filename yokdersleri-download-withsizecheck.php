<?
/**
 * Website: https://github.com/bidost/yokdersleri-download
 * Additional projects: https://github.com/bidost/repositories
 * Author: bidost https://github.com/bidost
 *
 * Licensed under GNU General Public License v3.0
 * See the LICENSE file in the project root for more information.
 *
 *
 * Version Rev. 1.0.0
 */
 
set_time_limit(90000);
include('simple_html_dom.php');

function yaz($md,$ur,$gonder,$boyut=false,$dboy=false,$hata=false){
	$cinit = curl_init();
	
	curl_setopt_array($cinit,
	  array(
		CURLOPT_URL				=> $ur,
		CURLOPT_HEADER			=> $boyut?true:false,
		CURLOPT_NOBODY			=> $boyut?true:false,
		CURLOPT_CUSTOMREQUEST	=> $gonder?"POST":"GET",
		CURLOPT_POST			=> $gonder?true:false,
		CURLOPT_POSTFIELDS		=> $gonder,		
		CURLOPT_RETURNTRANSFER	=> true,
		CURLOPT_BINARYTRANSFER	=> $gonder?true:false
	  )
	);
	 
	$data = curl_exec($cinit);
	
	if($boyut)
		$dboy=curl_getinfo($cinit, CURLINFO_CONTENT_LENGTH_DOWNLOAD);
	
	else {
		
		if(curl_getinfo($cinit, CURLINFO_CONTENT_TYPE)=="application/force-download")
			file_put_contents($md, $data);
	
		else $hata=true;
	}
	
	curl_close($cinit);
	return $dboy?$dboy:($hata?false:true);

}
 
function klasorad($te){
	$bul=array("ş","Ş","İ","I","Ğ","ğ","Ç","ç","Ü","ü","Ö","ö");
	$deg=array("s","S","I","i","G","g","C","c","U","u","O","o");
	return preg_replace(array('/[^a-zA-Z0-9 -]/', '/[ -]+/', '/^-|-$/'), array('', '-', ''),str_replace(array(" fakultesi"," yuksekokulu"," bolumu"," dersleri","(5/i)"),"",strtolower(str_replace($bul,$deg,$te))));
}

function klasorac($path){
	return is_dir($path) || mkdir($path,0755);
}

$yokmenu='{"userId":0,"userName":null,"screenName":null,"email":null,"phoneNumber":null,"templateId":null,"menuItems":[{"menuId":2,"menuOrd":1,"parentMenuId":null,"menuLblName":"EDEBİYAT FAKÜLTESİ","menuActn":null,"menuIconName":"fa fa-circle","menuParam":"FAKULTE","target":null,"subMenuItems":[{"menuId":2213,"menuOrd":0,"parentMenuId":2,"menuLblName":"COĞRAFYA","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]},{"menuId":2856,"menuOrd":0,"parentMenuId":2,"menuLblName":"FELSEFE","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]},{"menuId":5023,"menuOrd":0,"parentMenuId":2,"menuLblName":"SOSYOLOJİ","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]},{"menuId":5163,"menuOrd":0,"parentMenuId":2,"menuLblName":"TARİH","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]},{"menuId":5468,"menuOrd":0,"parentMenuId":2,"menuLblName":"TÜRK DİLİ VE EDEBİYATI","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]}]},{"menuId":15,"menuOrd":1,"parentMenuId":null,"menuLblName":"EĞİTİM FAKÜLTESİ","menuActn":null,"menuIconName":"fa fa-circle","menuParam":"FAKULTE","target":null,"subMenuItems":[{"menuId":2037,"menuOrd":0,"parentMenuId":15,"menuLblName":"BİLGİSAYAR VE ÖĞRETİM TEKNOLOJİLERİ EĞİTİMİ","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]},{"menuId":2564,"menuOrd":0,"parentMenuId":15,"menuLblName":"EĞİTİM BİLİMLERİ","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]}]},{"menuId":14,"menuOrd":1,"parentMenuId":null,"menuLblName":"FEN FAKÜLTESİ","menuActn":null,"menuIconName":"fa fa-circle","menuParam":"FAKULTE","target":null,"subMenuItems":[{"menuId":2903,"menuOrd":0,"parentMenuId":14,"menuLblName":"FİZİK","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]},{"menuId":3743,"menuOrd":0,"parentMenuId":14,"menuLblName":"KİMYA","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]},{"menuId":4051,"menuOrd":0,"parentMenuId":14,"menuLblName":"MATEMATİK","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]}]},{"menuId":3,"menuOrd":1,"parentMenuId":null,"menuLblName":"İKTİSADİ VE İDARİ BİLİMLER FAKÜLTESİ","menuActn":null,"menuIconName":"fa fa-circle","menuParam":"FAKULTE","target":null,"subMenuItems":[{"menuId":2604,"menuOrd":0,"parentMenuId":3,"menuLblName":"EKONOMETRİ","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]},{"menuId":3353,"menuOrd":0,"parentMenuId":3,"menuLblName":"İKTİSAT","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]},{"menuId":3461,"menuOrd":0,"parentMenuId":3,"menuLblName":"İNSAN KAYNAKLARI YÖNETİMİ","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]},{"menuId":3549,"menuOrd":0,"parentMenuId":3,"menuLblName":"İŞLETME","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]},{"menuId":3638,"menuOrd":0,"parentMenuId":3,"menuLblName":"KAMU YÖNETİMİ","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]},{"menuId":4018,"menuOrd":0,"parentMenuId":3,"menuLblName":"MALİYE","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]},{"menuId":4099,"menuOrd":0,"parentMenuId":3,"menuLblName":"MENKUL KIYMETLER VE SERMAYE PİYASASI","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]},{"menuId":4967,"menuOrd":0,"parentMenuId":3,"menuLblName":"SİYASET BİLİMİ VE KAMU YÖNETİMİ","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]},{"menuId":4968,"menuOrd":0,"parentMenuId":3,"menuLblName":"SİYASET BİLİMİ VE ULUSLARARASI İLİŞKİLER","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]},{"menuId":5581,"menuOrd":0,"parentMenuId":3,"menuLblName":"ULUSLARARASI İLİŞKİLER","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]},{"menuId":5616,"menuOrd":0,"parentMenuId":3,"menuLblName":"ULUSLARARASI TİCARET VE LOJİSTİK YÖNETİMİ","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]},{"menuId":5874,"menuOrd":0,"parentMenuId":3,"menuLblName":"YÖNETİM BİLİŞİM SİSTEMLERİ","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]},{"menuId":2231,"menuOrd":0,"parentMenuId":3,"menuLblName":"ÇALIŞMA EKONOMİSİ VE ENDÜSTRİ İLİŞKİLERİ","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]}]},{"menuId":5,"menuOrd":1,"parentMenuId":null,"menuLblName":"İLETİŞİM FAKÜLTESİ","menuActn":null,"menuIconName":"fa fa-circle","menuParam":"FAKULTE","target":null,"subMenuItems":[{"menuId":2963,"menuOrd":0,"parentMenuId":5,"menuLblName":"GAZETECİLİK","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]},{"menuId":3187,"menuOrd":0,"parentMenuId":5,"menuLblName":"HALKLA İLİŞKİLER VE TANITIM","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]},{"menuId":7668,"menuOrd":0,"parentMenuId":5,"menuLblName":"RADYO, TELEVİZYON VE SİNEMA","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]},{"menuId":4734,"menuOrd":0,"parentMenuId":5,"menuLblName":"REKLAMCILIK","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]}]},{"menuId":6,"menuOrd":1,"parentMenuId":null,"menuLblName":"MÜHENDİSLİK FAKÜLTESİ","menuActn":null,"menuIconName":"fa fa-circle","menuParam":"FAKULTE","target":null,"subMenuItems":[{"menuId":2644,"menuOrd":0,"parentMenuId":6,"menuLblName":"ELEKTRİK-ELEKTRONİK MÜHENDİSLİĞİ","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]},{"menuId":2704,"menuOrd":0,"parentMenuId":6,"menuLblName":"ENDÜSTRİ MÜHENDİSLİĞİ","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]},{"menuId":3220,"menuOrd":0,"parentMenuId":6,"menuLblName":"HAVACILIK VE UZAY MÜHENDİSLİĞİ","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]},{"menuId":3987,"menuOrd":0,"parentMenuId":6,"menuLblName":"MAKİNE MÜHENDİSLİĞİ","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]}]},{"menuId":7,"menuOrd":1,"parentMenuId":null,"menuLblName":"SAĞLIK BİLİMLERİ FAKÜLTESİ","menuActn":null,"menuIconName":"fa fa-circle","menuParam":"FAKULTE","target":null,"subMenuItems":[{"menuId":3528,"menuOrd":0,"parentMenuId":7,"menuLblName":"İŞ SAĞLIĞI VE GÜVENLİĞİ","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]},{"menuId":4818,"menuOrd":0,"parentMenuId":7,"menuLblName":"SAĞLIK YÖNETİMİ","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]},{"menuId":5004,"menuOrd":0,"parentMenuId":7,"menuLblName":"SOSYAL HİZMET","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]},{"menuId":2315,"menuOrd":0,"parentMenuId":7,"menuLblName":"ÇOCUK GELİŞİMİ","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]}]},{"menuId":11,"menuOrd":1,"parentMenuId":null,"menuLblName":"TURİZM FAKÜLTESİ","menuActn":null,"menuIconName":"fa fa-circle","menuParam":"FAKULTE","target":null,"subMenuItems":[{"menuId":3809,"menuOrd":0,"parentMenuId":11,"menuLblName":"KONAKLAMA İŞLETMECİLİĞİ","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]}]},{"menuId":1,"menuOrd":2,"parentMenuId":null,"menuLblName":"ADALET MESLEK YÜKSEKOKULU","menuActn":null,"menuIconName":"fa fa-circle","menuParam":"FAKULTE","target":null,"subMenuItems":[{"menuId":1697,"menuOrd":0,"parentMenuId":1,"menuLblName":"ADALET","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]}]},{"menuId":8,"menuOrd":2,"parentMenuId":null,"menuLblName":"SAĞLIK HİZMETLERİ MESLEK YÜKSEKOKULU","menuActn":null,"menuIconName":"fa fa-circle","menuParam":"FAKULTE","target":null,"subMenuItems":[{"menuId":1686,"menuOrd":0,"parentMenuId":8,"menuLblName":"ACİL DURUM VE AFET YÖNETİMİ","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]},{"menuId":2773,"menuOrd":0,"parentMenuId":8,"menuLblName":"ENGELLİ BAKIMI VE REHABİLİTASYON","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]},{"menuId":3528,"menuOrd":0,"parentMenuId":8,"menuLblName":"İŞ SAĞLIĞI VE GÜVENLİĞİ","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]},{"menuId":3923,"menuOrd":0,"parentMenuId":8,"menuLblName":"LABORANT VE VETERİNER SAĞLIK","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]},{"menuId":4802,"menuOrd":0,"parentMenuId":8,"menuLblName":"SAĞLIK KURUMLARI İŞLETMECİLİĞİ","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]},{"menuId":20011,"menuOrd":0,"parentMenuId":8,"menuLblName":"SOSYAL HİZMETLER","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]},{"menuId":5324,"menuOrd":0,"parentMenuId":8,"menuLblName":"TIBBİ DOKÜMANTASYON VE SEKRETERLİK","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]},{"menuId":7263,"menuOrd":0,"parentMenuId":8,"menuLblName":"YAŞLI BAKIMI","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]},{"menuId":2315,"menuOrd":0,"parentMenuId":8,"menuLblName":"ÇOCUK GELİŞİMİ","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]}]},{"menuId":9,"menuOrd":2,"parentMenuId":null,"menuLblName":"SOSYAL BİLİMLER MESLEK YÜKSEKOKULU","menuActn":null,"menuIconName":"fa fa-circle","menuParam":"FAKULTE","target":null,"subMenuItems":[{"menuId":1850,"menuOrd":0,"parentMenuId":9,"menuLblName":"AŞÇILIK","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]},{"menuId":1921,"menuOrd":0,"parentMenuId":9,"menuLblName":"BANKACILIK VE SİGORTACILIK","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]},{"menuId":1990,"menuOrd":0,"parentMenuId":9,"menuLblName":"BİLGİ YÖNETİMİ","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]},{"menuId":7228,"menuOrd":0,"parentMenuId":9,"menuLblName":"BÜRO YÖNETİMİ VE YÖNETİCİ ASİSTANLIĞI","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]},{"menuId":2450,"menuOrd":0,"parentMenuId":9,"menuLblName":"DIŞ TİCARET","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]},{"menuId":2688,"menuOrd":0,"parentMenuId":9,"menuLblName":"EMLAK VE EMLAK YÖNETİMİ","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]},{"menuId":2814,"menuOrd":0,"parentMenuId":9,"menuLblName":"EV İDARESİ","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]},{"menuId":3187,"menuOrd":0,"parentMenuId":9,"menuLblName":"HALKLA İLİŞKİLER VE TANITIM","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]},{"menuId":5924,"menuOrd":0,"parentMenuId":9,"menuLblName":"HUKUK BÜRO YÖNETİMİ VE SEKRETERLİĞİ","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]},{"menuId":3367,"menuOrd":0,"parentMenuId":9,"menuLblName":"İLAHİYAT/İSLAMİ İLİMLER (ÖNLİSANS)","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]},{"menuId":3461,"menuOrd":0,"parentMenuId":9,"menuLblName":"İNSAN KAYNAKLARI YÖNETİMİ","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]},{"menuId":3568,"menuOrd":0,"parentMenuId":9,"menuLblName":"İŞLETME YÖNETİMİ","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]},{"menuId":3905,"menuOrd":0,"parentMenuId":9,"menuLblName":"KÜLTÜREL MİRAS VE TURİZM","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]},{"menuId":3943,"menuOrd":0,"parentMenuId":9,"menuLblName":"LOJİSTİK","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]},{"menuId":4043,"menuOrd":0,"parentMenuId":9,"menuLblName":"MARKA İLETİŞİMİ","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]},{"menuId":4076,"menuOrd":0,"parentMenuId":9,"menuLblName":"MEDYA VE İLETİŞİM","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]},{"menuId":4099,"menuOrd":0,"parentMenuId":9,"menuLblName":"MENKUL KIYMETLER VE SERMAYE PİYASASI","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]},{"menuId":4235,"menuOrd":0,"parentMenuId":9,"menuLblName":"MUHASEBE VE VERGİ UYGULAMALARI","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]},{"menuId":4600,"menuOrd":0,"parentMenuId":9,"menuLblName":"PERAKENDE SATIŞ VE MAĞAZA YÖNETİMİ","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]},{"menuId":4694,"menuOrd":0,"parentMenuId":9,"menuLblName":"RADYO VE TELEVİZYON PROGRAMCILIĞI","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]},{"menuId":4734,"menuOrd":0,"parentMenuId":9,"menuLblName":"REKLAMCILIK","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]},{"menuId":4953,"menuOrd":0,"parentMenuId":9,"menuLblName":"SİVİL HAVA ULAŞTIRMA İŞLETMECİLİĞİ","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]},{"menuId":9839,"menuOrd":0,"parentMenuId":9,"menuLblName":"SOSYAL MEDYA YÖNETİCİLİĞİ","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]},{"menuId":7254,"menuOrd":0,"parentMenuId":9,"menuLblName":"SPOR YÖNETİMİ","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]},{"menuId":7256,"menuOrd":0,"parentMenuId":9,"menuLblName":"TURİZM VE OTEL İŞLETMECİLİĞİ","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]},{"menuId":5454,"menuOrd":0,"parentMenuId":9,"menuLblName":"TURİZM VE SEYAHAT HİZMETLERİ","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]},{"menuId":5836,"menuOrd":0,"parentMenuId":9,"menuLblName":"YENİ MEDYA VE GAZETECİLİK","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]},{"menuId":5853,"menuOrd":0,"parentMenuId":9,"menuLblName":"YEREL YÖNETİMLER","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]},{"menuId":2225,"menuOrd":0,"parentMenuId":9,"menuLblName":"ÇAĞRI MERKEZİ HİZMETLERİ","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]},{"menuId":4524,"menuOrd":0,"parentMenuId":9,"menuLblName":"ÖZEL GÜVENLİK VE KORUMA","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]}]},{"menuId":10,"menuOrd":2,"parentMenuId":null,"menuLblName":"TEKNİK BİLİMLER MESLEK YÜKSEKOKULU","menuActn":null,"menuIconName":"fa fa-circle","menuParam":"FAKULTE","target":null,"subMenuItems":[{"menuId":2020,"menuOrd":0,"parentMenuId":10,"menuLblName":"BİLGİSAYAR PROGRAMCILIĞI","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]},{"menuId":2210,"menuOrd":0,"parentMenuId":10,"menuLblName":"COĞRAFİ BİLGİ SİSTEMLERİ","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]},{"menuId":2630,"menuOrd":0,"parentMenuId":10,"menuLblName":"ELEKTRİK ENERJİSİ ÜRETİM, İLETİM VE DAĞITIMI","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]},{"menuId":2941,"menuOrd":0,"parentMenuId":10,"menuLblName":"FOTOĞRAFÇILIK VE KAMERAMANLIK","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]},{"menuId":5128,"menuOrd":0,"parentMenuId":10,"menuLblName":"TARIM","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]},{"menuId":8036,"menuOrd":0,"parentMenuId":10,"menuLblName":"WEB TASARIMI VE KODLAMA","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]}]},{"menuId":4,"menuOrd":3,"parentMenuId":null,"menuLblName":"LİSANS TAMAMLAMA","menuActn":null,"menuIconName":"fa fa-circle","menuParam":"FAKULTE","target":null,"subMenuItems":[{"menuId":1693,"menuOrd":0,"parentMenuId":4,"menuLblName":"ACİL YARDIM VE AFET YÖNETİMİ","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]},{"menuId":3186,"menuOrd":0,"parentMenuId":4,"menuLblName":"HALKLA İLİŞKİLER VE REKLAMCILIK","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]},{"menuId":3187,"menuOrd":0,"parentMenuId":4,"menuLblName":"HALKLA İLİŞKİLER VE TANITIM","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]},{"menuId":3221,"menuOrd":0,"parentMenuId":4,"menuLblName":"HAVACILIK YÖNETİMİ","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]},{"menuId":3264,"menuOrd":0,"parentMenuId":4,"menuLblName":"HEMŞİRELİK","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]},{"menuId":3367,"menuOrd":0,"parentMenuId":4,"menuLblName":"İLAHİYAT/İSLAMİ İLİMLER","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]},{"menuId":3528,"menuOrd":0,"parentMenuId":4,"menuLblName":"İŞ SAĞLIĞI VE GÜVENLİĞİ","menuActn":null,"menuIconName":"fa fa-circle-o","menuParam":"PROGRAM","target":null,"subMenuItems":[]}]},{"menuId":12,"menuOrd":4,"parentMenuId":null,"menuLblName":"ORTAK DERSLER BÖLÜMÜ(5/İ)","menuActn":null,"menuIconName":"fa fa-circle","menuParam":"FAKULTE","target":null,"subMenuItems":[]},{"menuId":13,"menuOrd":5,"parentMenuId":null,"menuLblName":"DİJİTAL EĞİTİM DERSLERİ","menuActn":null,"menuIconName":"fa fa-circle","menuParam":"FAKULTE","target":null,"subMenuItems":[]}],"dashboardItems":[]}';
$yokmenud=json_decode($yokmenu,true);
$yokmenum=$yokmenud["menuItems"];
$p="./kitaplar/";
klasorac($p);
$u1=array("anadolu-universitesi","istanbul-universitesi","ataturk-universitesi");
$u2=array("aof","iu","atu");
$tamam=array();
$eksik=array();
$boyut=array();

foreach($yokmenum as $fakulte){
	$fk=klasorad($fakulte["menuLblName"]);
	klasorac($p.$fk);

	$yokbolumj=file_get_contents("https://yokdersleri.yok.gov.tr/ders?id=".$fakulte["menuId"]."&type=FAKULTE");
	$kitapd=json_decode($yokbolumj,true);
	
	foreach($kitapd as $kitap){
		
	  if($kitap["materyalTuru"]=="Kitap" && $kitap["materyalDili"]==""){
		$uni=str_replace($u1,$u2,klasorad($kitap["universiteAdi"]));
		$kk=klasorad($kitap["dersAdi"]);
		$bk=klasorad($kitap["programAdi"]);
		klasorac($p.$fk."/".$bk);
		$ur=$kitap["url"];
		$md=$p.$fk."/".$bk."/".$kk."-".$uni.".pdf";
		
		if(substr($ur,-4)==".pdf"){
			
			if(!is_file($md)){
				
				if(file_put_contents($md, fopen($ur, 'r')))
					$tamam[]=array("fakulte"=>$fk,"bolum"=>$bk,"ders"=>$kk,"url"=>$ur);
				
				else
					$eksik[]=array("fakulte"=>$fk,"bolum"=>$bk,"ders"=>$kk,"url"=>$ur);	
			} else {
				
				clearstatcache();
				$dboy=filesize($md);
				$gonder="";
				$urb=yaz($md,$ur,$gonder,true);
				
				if($dboy!=$urb) 
					$boyut[]=array("fakulte"=>$fk,"bolum"=>$bk,"ders"=>$kk,"url"=>$ur,"urb"=>$urb,"dosya"=>$dboy);
				
			}
		} else {
			$atuf = file_get_html($ur);
			
			if($atuf)
				$gonder = array(
				  '__EVENTTARGET'  => "LinkButton1",
				  '__EVENTARGUMENT'  => "",
				  '__VIEWSTATE' => $atuf->find('input#__VIEWSTATE', 0)->value,
				  '__VIEWSTATEGENERATOR'  => $atuf->find('input#__VIEWSTATEGENERATOR', 0)->value,
				  '__EVENTVALIDATION'    => $atuf->find('input#__EVENTVALIDATION', 0)->value
				);

			if(!is_file($md)){
				
				if(yaz($md,$ur,$gonder))
					$tamam[]=array("fakulte"=>$fk,"bolum"=>$bk,"ders"=>$kk,"url"=>$ur);

				else
					$eksik[]=array("fakulte"=>$fk,"bolum"=>$bk,"ders"=>$kk,"url"=>$ur);
				
			} else {
				clearstatcache();
				$dboy=filesize($md);
				$urb=yaz($md,$ur,$gonder,true);
				
				if($dboy!=$urb)
					$boyut[]=array("fakulte"=>$fk,"bolum"=>$bk,"ders"=>$kk,"url"=>$ur,"urb"=>$urb,"dosya"=>$dboy);

			}
		}
  	}
  }
}
?>
<h3>tamamlananlar<h3>
<textarea><?=var_export($tamam);?></textarea>
<h3>eksikler<h3>
<textarea><?=var_export($eksik);?></textarea>
<h3>farklilar<h3>
<textarea><?=var_export($boyut);//sil?></textarea>
