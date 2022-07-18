<?
define("LOCAL_LIB_PATH", "/local/php_interface/lib");
define("LOCAL_LIB_PATH_ABS", __DIR__ . "/lib");
define("LOCAL_MEDIA", "/local/media");

if (\Bitrix\Main\Config\Option::get('main', 'update_devsrv') === 'Y') {
    $APPLICATION->SetPageProperty('robots', 'noindex');
}

require_once(LOCAL_LIB_PATH_ABS . "/events.php");
require_once(LOCAL_LIB_PATH_ABS . "/loader.php");

$eventManager = \Bitrix\Main\EventManager::getInstance();

AddEventHandler("main", "OnUserLoginExternal", ["TdvasyaUtils", "OnUserLoginExternal"], 0);

// События для блокировки изменений элементов инфоблоков для группы 8
AddEventHandler("iblock", "OnBeforeIBlockElementUpdate", Array("blockUserGroup_8","OnBeforeIBlockElementUpdateHandler"));
AddEventHandler("iblock", "OnBeforeIBlockElementDelete", Array("blockUserGroup_8","OnBeforeIBlockElementDeleteHandler"));
AddEventHandler("iblock", "OnBeforeIBlockElementAdd", Array("blockUserGroup_8","OnBeforeIBlockElementAddHandler"));
AddEventHandler("catalog", "OnBeforeCatalogStoreAdd", Array("blockUserGroup_8","OnBeforeCatalogStoreAddHandler"));
AddEventHandler("catalog", "OnBeforeCatalogStoreUpdate", Array("blockUserGroup_8","OnBeforeCatalogStoreUpdateHandler"));
AddEventHandler("catalog", "OnBeforeCatalogStoreDelete", Array("blockUserGroup_8","OnBeforeCatalogStoreDeleteHandler"));
AddEventHandler("catalog", "OnBeforeStoreProductUpdate", Array("blockUserGroup_8","onBeforeStoreProductUpdate"));
AddEventHandler("catalog", "OnBeforeStoreProductAdd", Array("blockUserGroup_8","onBeforeStoreProductAdd"));
AddEventHandler("catalog", "OnBeforeStoreProductDelete", Array("blockUserGroup_8","onBeforeStoreProductDelete"));
AddEventHandler("main", "OnEndBufferContent", "ChangeMyContent");
$eventManager->addEventHandler('catalog', 'Bitrix\Catalog\Model\Product::OnBeforeUpdate', "onBeforeProductUpdate");
$eventManager->addEventHandler("catalog", "\Bitrix\Catalog\MeasureRatio::OnBeforeUpdate", "onBeforeMeasureRatioUpdate");
// Конец событий
//Генерация кода товара
AddEventHandler("iblock", "OnAfterIBlockElementAdd","GenereteCode");
//Кода генерации товара
//Убрать из индексации описание товара
AddEventHandler("search", "BeforeIndex", "BeforeIndexHandler");
//Добавление полей в письмо
AddEventHandler('main', 'OnBeforeEventSend', "my_OnBeforeEventSend");
//Изменение свойств основных инфоблоков
AddEventHandler('iblock', 'OnAfterIBlockPropertyAdd', Array("HighLoadPlusProperty", "AddPropertyToHL"));
AddEventHandler('iblock', 'OnAfterIBlockPropertyUpdate', Array("HighLoadPlusProperty","UpdatePropertyFromHL"));
AddEventHandler('iblock', 'OnAfterIBlockPropertyDelete', Array("HighLoadPlusProperty","DeletePropertyFromHL"));
@include_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/wsrubi.smtp/classes/general/wsrubismtp.php");



class TdvasyaUtils
{
	const TOKEN_LENGTH = 64;

	public static function replaceYoutubeTags($content)
	{
		// preg_match("/{youtube}(.*?){\/youtube}/uim", "{youtube}l2vUrfh5zjI{/youtube}", $match);
		return preg_replace("/{youtube}(.*?){\/youtube}/uim", '<iframe frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen width="560" height="315" src="https://www.youtube.com/embed/$1"></iframe>', $content);
	}


	//Со старого сайта, требуется переработка
	public static function deliveryInfo($available)
    {
        if (in_array(date("d.m", strtotime("now")), array('31.12'))) { //если 31 декабря
            if (date("H", strtotime("now")) < 14) //если меньше 14:00
                $timePickup = date("j", time()) . ' ' . strtolower(static::rdate("F", time(), 1));
            else
                $timePickup = date("j", strtotime('03.01.2022')) . ' ' . strtolower(static::rdate("F", strtotime('03.01.2022'), 1));
        } elseif (in_array(date("d.m", strtotime("now")), array('01.01', '02.01'))) { //если 1, 2, 3 января
            $timePickup = date("j", strtotime('03.01.2022')) . ' ' . strtolower(static::rdate("F", strtotime('03.01.2022'), 1));
        } elseif (in_array(date("d.m", strtotime("now")), array('04.01'))) {
            if (date("H", strtotime("now")) < 14) //если меньше 14:00
                $timePickup = date("j", time()) . ' ' . strtolower(static::rdate("F", time(), 1));
            else
                $timePickup = date("j", strtotime('06.01.2022')) . ' ' . strtolower(static::rdate("F", strtotime('06.01.2022'), 1));
        } /*elseif (in_array(date("d.m", strtotime("now")), array('05.01'))) { //если 5 января
            $timePickup = date("j", strtotime('06.01.2022')) . ' ' . strtolower(static::rdate("F", strtotime('06.01.2022'), 1));
        } elseif (in_array(date("d.m", strtotime("now")), array('06.01'))) { //если 6 января
            if (date("H", strtotime("now")) < 14) //если меньше 14:00
                $timePickup = date("j", time()) . ' ' . strtolower(static::rdate("F", time(), 1));
            else
                $timePickup = date("j", strtotime('08.01.2022')) . ' ' . strtolower(static::rdate("F", strtotime('08.01.2022'), 1));
        } elseif (in_array(date("d.m", strtotime("now")), array('07.01'))) { //если 7 января
            $timePickup = date("j", strtotime('08.01.2022')) . ' ' . strtolower(static::rdate("F", strtotime('08.01.2022'), 1));
        } elseif (in_array(date("d.m", strtotime("now")), array('08.01'))) {
            if (date("H", strtotime("now")) < 14) //если меньше 14:00
                $timePickup = date("j", time()) . ' ' . strtolower(static::rdate("F", time(), 1));
            else
                $timePickup = date("j", strtotime('11.01.2022')) . ' ' . strtolower(static::rdate("F", strtotime('11.01.2022'), 1));
        } elseif (in_array(date("d.m", strtotime("now")), array('09.01', '10.01'))) { //если 9, 10 января
            $timePickup = date("j", strtotime('11.01.2022')) . ' ' . strtolower(static::rdate("F", strtotime('11.01.2022'), 1));
        }*/ else {
			//			if (date("w") == 6) {
			//				if (date("H", strtotime("now")) < 14)
			//					$timePickup = date("j", time()) . ' ' . strtolower(static::rdate("F", time(), 1));
			//				else
					$timePickup = date("j", time() + 86401 * 2) . ' ' . strtolower(static::rdate("F", time() + 86401 * 2, 1));
			} elseif (date("w") == 0) {
				$timePickup = date("j", time() + 86401 * 1) . ' ' . strtolower(static::rdate("F", time() + 86401 * 1, 1));
			} elseif (date("w") == 5) {
				if (date("H", strtotime("now")) < 18)
					$timePickup = date("j", time()) . ' ' . strtolower(static::rdate("F", time(), 1));
				else
					$timePickup = date("j", time() + 86401 * 3) . ' ' . strtolower(static::rdate("F", time() + 86401 * 3, 1));
			} else {
				if (date("H", strtotime("now")) < 18)
					$timePickup = date("j", time()) . ' ' . strtolower(static::rdate("F", time(), 1));
				else
					$timePickup = date("j", time() + 86401 * 1) . ' ' . strtolower(static::rdate("F", time() + 86401 * 1, 1));
			}
		}

		//доставка
		if (in_array(date("d.m", strtotime("now")), array('31.12', '01.01', '02.01', '03.01'))) {
			$timeDelivery = strtotime("04.01." . date("Y", strtotime("now")));
		} elseif (in_array(date("d.m", strtotime("now")), array('04.01'))) {
			if (date("H", strtotime("now")) < 12)
				$timeDelivery = strtotime("04.01." . date("Y", strtotime("now")));
			else
				$timeDelivery = strtotime("06.01." . date("Y", strtotime("now")));
		} /*elseif (in_array(date("d.m", strtotime("now")), array('05.01'))) {
			$timeDelivery = strtotime("06.01." . date("Y", strtotime("now")));
		} elseif (in_array(date("d.m", strtotime("now")), array('06.01'))) {
			if (date("H", strtotime("now")) < 12)
				$timeDelivery = strtotime("06.01." . date("Y", strtotime("now")));
			else
				$timeDelivery = strtotime("08.01." . date("Y", strtotime("now")));
		} elseif (in_array(date("d.m", strtotime("now")), array('07.01'))) {
			$timeDelivery = strtotime("08.01." . date("Y", strtotime("now")));
		} elseif (in_array(date("d.m", strtotime("now")), array('08.01'))) {
			if (date("H", strtotime("now")) < 12)
				$timeDelivery = strtotime("08.01." . date("Y", strtotime("now")));
			else
				$timeDelivery = strtotime("11.01." . date("Y", strtotime("now")));
		} elseif (in_array(date("d.m", strtotime("now")), array('09.01', '10.01'))) {
			$timeDelivery = strtotime("11.01." . date("Y", strtotime("now")));
		} elseif (in_array(date("d.m", strtotime("now")), array('11.01')) and date("H", strtotime("now")) < 12) {
			$timeDelivery = strtotime("11.01." . date("Y", strtotime("now")));
		}*/ else {
			if (date("w") == 6) {
				$timeDelivery = time() + 86401 * 2;
			} else if (date("w") == 0) {
				$timeDelivery = time() + 86401 * 1;
			} else {
				if (date("w") == 5 and date("H", strtotime("now")) < 18)
					$timeDelivery = time() + 86401 * 1;
				elseif (date("w") == 5 and date("H", strtotime("now")) >= 18)
					$timeDelivery = time() + 86401 * 3;
				else
					$timeDelivery = time() + 86401 * 1;
			}
		}


		if ($available != 0) {
			$pickupString = "Дату самовывоза уточняйте";
		} else {
			$pickupString = "Самовывоз из магазина " . mb_strtolower($timePickup);
		}


		if ($available != 0) {
			$deliveryString = "Дату доставки уточняйте";
		} else {
			if ($available == 2) {
				$timeDeliveryNextDay = strtotime(date("d.m.Y", $timeDelivery) . " + 1day");

				if (date("m", $timeDelivery) == date("m", $timeDeliveryNextDay))
					$deliveryString = "Доставим " . date("j", $timeDelivery) . "&ndash;" . date("j", $timeDeliveryNextDay) . " " . mb_strtolower(static::rdate("F", $timeDelivery, 1));
				else
					$deliveryString = "Доставим " . date("j", $timeDelivery) . " " . mb_strtolower(static::rdate("F", $timeDelivery, 1)) . " или " . date("j", $timeDeliveryNextDay) . " " . strtolower(static::rdate("F", $timeDeliveryNextDay, 1));
			} else
				$deliveryString = "Доставим " . date("j", $timeDelivery) . " " . mb_strtolower(static::rdate("F", $timeDelivery, 1));
		}

		return [
			"PICKUP" => $pickupString,
			"DELIVERY" => $deliveryString
		];
	}


	public static function prepareSectionContent($desc)
	{
		$desc = static::replaceYoutubeTags($desc);
		//Убираем жесткое переопределение из текста
		$desc = str_replace("!important", "", $desc);

		//Добавляем категории, что-бы не грузить js (по хорошему так не должно быть)
		$desc = TdvasyaUtils::addClassesForTag("table", $desc, "uk-table uk-table-hover");

		//Оборачиваем таблицу спец блоком
		$desc = TdvasyaUtils::wrapTag("table", $desc, '<div class="uk-overflow-container">', '</div>');

		//Делим текст на две части
		//Если есть специальный тег-разделитель, делим текст через него
		if (mb_strpos($desc, "---category-splitter---") !== false) {

			$textParts = explode("---category-splitter---", $desc);

			$firstPart = "";
			$secondPart = "";

			if (count($textParts) == 1) {
				$firstPart = $textParts[0];
			} else if (count($textParts) == 2) {
				$firstPart =  $textParts[0];
				$secondPart = $textParts[1];
			}

			//Иначе делим автоматически
		} else {
			//Получаем полную длину текста
			$fullLength = mb_strlen($desc, "utf-8");

			//Поиск места для разделения текста на верхнюю и нижнюю часть
			$foundPosition = mb_strpos($desc, "<h2", 0, "utf-8");
			if ($foundPosition !== false) {
				//Выделяем первую часть
				$firstPart = mb_substr($desc, 0, $foundPosition, "utf-8");

				//Выделяем вторую часть
				$secondPart = mb_substr($desc, $foundPosition, $fullLength - $foundPosition, "utf-8");


				//Разделитель не найден, оставляем текст без изменений
			} else {
				$firstPart = $desc;
			}
		}

		//Добавляем lazy в верхнюю часть только для мобильных
		if (TdvasyaUtils::checkForMobile()) {
			$firstPart = TdvasyaUtils::customLazyReplace($firstPart);
		}

		//Для нижней части добавляем lazy в любом случае
		$secondPart = TdvasyaUtils::customLazyReplace($secondPart);

		$desc = array();

		return [
			"DESCRIPTION_TOP" => $firstPart,
			"DESCRIPTION_BOTTOM" => $secondPart
		];
	}



	/* Аунтентификация старых пользователей из joomla */
	public static function OnUserLoginExternal(&$arguments)
	{
		$login = $arguments["LOGIN"];
		$password = $arguments["PASSWORD"];
		$remember = $arguments["REMEMBER"];
		$original = $arguments["PASSWORD_ORIGINAL"];

		global $USER;

		if($USER->GetID()){
			return -1;
		}

		if (($user = $USER->GetList(
			$by = "ID",
			$order = "asc",
			[
				"LOGIN" => $login
			],
			[
				"SELECT" => ["UF_JOOMLA_PASSWORD"]
			]
		)->GetNext()) === false) {
			return -1;
		}

		if (isset($user["UF_JOOMLA_PASSWORD"]) && !empty($user["UF_JOOMLA_PASSWORD"])) {
			$parts = explode(':', $user["UF_JOOMLA_PASSWORD"]);
			$hash = $parts[0];
			$salt = $parts[1];

			if (!hash_equals(md5($password . $salt), $hash)) {
				return -1;
			}

			$identifier = $user["ID"];

			$USER->Update($identifier, [
				"PASSWORD" => $password,
				"CONFIRM_PASSWORD" => $password,
				"UF_JOOMLA_PASSWORD" => ""
			]);

			return $identifier;
		}

		return -1;
	}

	public static function createAnonymousUser()
	{
		$login = "anonymous_" . \Bitrix\Main\Security\Random::getString("9", true);
		$password = \Bitrix\Main\Security\Random::getString("128");
		$email = $login . "@example.com";

		global $USER;

		return $USER->Add([
			"LOGIN" => $login,
			"EMAIL" => $email,
			"PASSWORD" => $password,
			"PASSWORD_CONFIRM" => $password,
			"GROUP_ID" => [5]
		]);
	}

	public static function getSessionTokenWithDefault(string $tokenName): string
	{
		$session = \Bitrix\Main\Application::getInstance()->getSession();

		if ($session->has($tokenName)) {
			return $session->get($tokenName);
		}

		$token = \Bitrix\Main\Security\Random::getString(self::TOKEN_LENGTH, true);

		$session->set($tokenName, $token);

		return $token;
	}

	public static function getCacheKeyFromArray($array)
	{
		return md5(json_encode($array));
	}

	public static function checkForMobile()
	{
		$useragent = $_SERVER['HTTP_USER_AGENT'];

		if (preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i', $useragent) || preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i', substr($useragent, 0, 4))) {

			return true;
		} else {
			return false;
		}
	}

	public static function checkForIphone()
	{
		$useragent = $_SERVER['HTTP_USER_AGENT'];
		$isIphone = stripos($useragent, "iphone");
		$isIpad = stripos($useragent, "ipad");
		$isIpod = stripos($useragent, "ipod");

		return $isIphone || $isIpad || $isIpod;
	}

	public static function addClassesForTag($tag, $str, $classesToAdd)
	{
		$returnStr = $str;
		$searchForTables = "/<" . $tag . "(.*?)>/si";
		$result = array();
		preg_match_all($searchForTables, $str, $result);

		$resultData = array();
		if (!empty($result[0])) {
			$initialData = $result[0];
			foreach ($initialData as $key => $item) {
				if (strpos($item, "class") !== false) {
					if (strpos($item, "class=\"") !== false || strpos($item, "class='") !== false) {
						$resultData[$key] = str_replace('class="', 'class="' . $classesToAdd . " ", $item);
						$resultData[$key] = str_replace("class='", "class='" . $classesToAdd . " ", $resultData[$key]);
					} else {
						$resultData[$key] = str_replace('class', 'class="' . $classesToAdd . "\"", $item);
					}
				} else {
					$resultData[$key] = str_replace(">", ' class="' . $classesToAdd . '" >', $item);
				}
			}

			$returnStr = $str;
			foreach ($initialData as $key => $item) {
				$returnStr = str_replace($item, $resultData[$key], $returnStr);
			}
		}
		return $returnStr;
	}

	public static function wrapTag($tag, $str, $wrapStart, $wrapEnd)
	{
		$returnStr = $str;
		$regex = "/<" . $tag . ".*?\/" . $tag . ">/si";
		$regexResult = array();

		preg_match_all($regex, $str, $regexResult);

		if (!empty($regexResult[0])) {
			foreach ($regexResult[0] as $key => $item) {
				$returnStr = str_replace($item, $wrapStart . $item . $wrapEnd, $returnStr);
			}
		}

		return $returnStr;
	}

	public static function customLazyReplace($content)
	{
		$newContent = preg_replace("/(<img[^>]+)(src\=?['\"])((?!(.*ignore_lz.*))[^>]+?[\/]*?>)/", '$1src="/bitrix/images/placeholder-160x160.gif" data-src="$3', $content);
		$newContent = str_replace("iframe", "iframe_lazy", $newContent);
		$newContent = str_replace("iframe_lazy_lazy", "iframe_lazy", $newContent);

		return $newContent;
	}

	public static function unitDeclination1($unit)
	{

		switch (mb_strtolower(trim($unit))) {
			case 'лист':
				$price_unit_sklonenie1 = "листов";
				break;
			case 'шт.':
				$price_unit_sklonenie1 = "штук";
				break;
			case 'пара':
				$price_unit_sklonenie1 = "пар";
				break;
			case 'упак.':
				$price_unit_sklonenie1 = "упаковок";
				break;
			case ('меш.'):
				$price_unit_sklonenie1 = "мешков";
				break;
			case ('мешок'):
				$price_unit_sklonenie1 = "мешков";
				break;
			case 'рулон':
				$price_unit_sklonenie1 = "рулонов";
				break;
			case 'баллон':
				$price_unit_sklonenie1 = "баллонов";
				break;
			case 'пог. м':
				$price_unit_sklonenie1 = "пог. м";
				break;
			case 'бал.':
				$price_unit_sklonenie1 = "баллонов";
				break;
			default:
				$price_unit_sklonenie1 = "единиц";
				break;
		}
		return $price_unit_sklonenie1;
	}
	/*Склонение*/
	public static function declOfNum($num, $titles)
	{
		$cases = array(2, 0, 1, 1, 1, 2);

		return $num . " " . $titles[($num % 100 > 4 && $num % 100 < 20) ? 2 : $cases[min($num % 10, 5)]];
	}

/*Склонение*/
	public static function declOfNum1($value=1, $status= array('','а','ов'))
	{
	 $array =array(2,0,1,1,1,2);
     return $status[($value%100>4 && $value%100<20)? 2 : $array[($value%10<5)?$value%10:5]];
	}

	public static function rdate($format, $timestamp = null, $case = 0)
	{
		if ($timestamp === null)
			$timestamp = time();

		static $loc =
			'Январ,ь,я,е,ю,ём,е
			Феврал,ь,я,е,ю,ём,е
			Март, ,а,е,у,ом,е
			Апрел,ь,я,е,ю,ем,е
			Ма,й,я,е,ю,ем,е
			Июн,ь,я,е,ю,ем,е
			Июл,ь,я,е,ю,ем,е
			Август, ,а,е,у,ом,е
			Сентябр,ь,я,е,ю,ём,е
			Октябр,ь,я,е,ю,ём,е
			Ноябр,ь,я,е,ю,ём,е
			Декабр,ь,я,е,ю,ём,е';

		if (is_string($loc)) {
			$months = array_map('trim', explode("\n", $loc));
			$loc = array();
			foreach ($months as $monthLocale) {
				$cases = explode(',', $monthLocale);
				$base = array_shift($cases);

				$cases = array_map('trim', $cases);

				$loc[] = array(
					'base' => $base,
					'cases' => $cases,
				);
			}
		}

		$m = (int)date('n', $timestamp) - 1;

		$F = $loc[$m]['base'] . $loc[$m]['cases'][$case];

		$format = strtr($format, array(
			'F' => $F,
			'M' => substr($F, 0, 3),
		));

		return date($format, $timestamp);
	}
}


class blockUserGroup_8
{
    function OnBeforeIBlockElementUpdateHandler(&$arFields)
    {
        global $USER;
        $groupId = $USER->GetUserGroupArray();
        if (in_array("8", $groupId)) {
            $arFields["PROPERTY_VALUES"] = [];
            unset($arFields["CODE"]);
            unset($arFields["NAME"]);
            unset($arFields["PREVIEW_TEXT"]);
            unset($arFields["DETAIL_PICTURE"]);
            unset($arFields["PREVIEW_TEXT_TYPE"]);
            unset($arFields["DETAIL_TEXT"]);
            unset($arFields["DETAIL_TEXT_TYPE"]);
            unset($arFields["IBLOCK_SECTION"]);
            unset($arFields["IBLOCK_SECTION_ID"]);
            unset($arFields["IPROPERTY_TEMPLATES"]);
            unset($arFields["XML_ID"]);
            unset($arFields["SORT"]);
            unset($arFields["SEARCHABLE_CONTENT"]);
        }
        return $arFields;
    }

    function OnBeforeIBlockElementDeleteHandler($ID)
    {
        global $USER;
        $groupId = $USER->GetUserGroupArray();
        if (in_array("8", $groupId)) {
            global $APPLICATION;
            $APPLICATION->throwException("У Вас недостаточно прав для удаления элементов!");
            return false;
        }
    }

    function OnBeforeIBlockElementAddHandler(&$arFields)
    {
        global $USER;
        $groupId = $USER->GetUserGroupArray();
        if (in_array("8", $groupId)) {
            global $APPLICATION;
            $APPLICATION->throwException("У Вас недостаточно прав для добавления элементов!");
            return false;
        }
    }

    function OnBeforeCatalogStoreAddHandler(&$arFields)
    {
        global $USER;
        $groupId = $USER->GetUserGroupArray();
        if (in_array("8", $groupId)) {
            global $APPLICATION;
            $APPLICATION->throwException("У Вас недостаточно прав для создания складов!");
            return false;
        }
    }

    function OnBeforeCatalogStoreUpdateHandler($id, &$arFields)
    {
        global $USER;
        $groupId = $USER->GetUserGroupArray();
        if (in_array("8", $groupId)) {
            global $APPLICATION;
            $APPLICATION->throwException("У Вас недостаточно прав для обновления складов!");
            return false;
        }
    }


    function OnBeforeCatalogStoreDeleteHandler($id)
    {
        global $USER;
        $groupId = $USER->GetUserGroupArray();
        if (in_array("8", $groupId)) {
            global $APPLICATION;
            $APPLICATION->throwException("У Вас недостаточно прав для удаления складов!");
            return false;
        }
    }

    function onBeforeStoreProductUpdate($id, &$arFields)
    {
        global $USER;
        $groupId = $USER->GetUserGroupArray();
        if (in_array("8", $groupId)) {
            global $APPLICATION;
            $APPLICATION->throwException("У Вас недостаточно прав для изменения остатков товаров!");
            return false;
        }
    }


    function onBeforeStoreProductAdd()
    {
        global $USER;
        $groupId = $USER->GetUserGroupArray();
        if (in_array("8", $groupId)) {
            global $APPLICATION;
            $APPLICATION->throwException("У Вас недостаточно прав для изменения остатков товаров!");
            return false;
        }
    }

    function onBeforeStoreProductDelete()
    {
        global $USER;
        $groupId = $USER->GetUserGroupArray();
        if (in_array("8", $groupId)) {
            global $APPLICATION;
            $APPLICATION->throwException("У Вас недостаточно прав для изменения остатков товаров!");
            return false;
        }
    }
}
function onBeforeProductUpdate($event){
    global $USER;
    $groupId = $USER->GetUserGroupArray();
    if (in_array("8", $groupId)) {
        global $APPLICATION;
        $result = new \Bitrix\Catalog\Model\EventResult();
        $unsetFields = [
            "QUANTITY",
            "MEASURE",
            "MEASURE_RATIO",
            "QUANTITY_TRACE",
            "CAN_BUY_ZERO",
            "SUBSCRIBE",
            "WEIGHT",
            "LENGTH",
            "WIDTH",
            "HEIGHT",
            "UF_PRODUCT_GROUP"
        ];

        $result->unsetFields($unsetFields);
        return $result;
    }
}

function onBeforeMeasureRatioUpdate($event){
    global $USER;
    $groupId = $USER->GetUserGroupArray();
    if (in_array("8", $groupId)) {
        $result = new \Bitrix\Main\Entity\EventResult;
        $result->unsetFields(array("RATIO"));
        return $result;
    }
}
function GenereteCode(&$arFields){
    $flag = true;
    $counter = 0;
    if($arFields["IBLOCK_ID"]==2 || $arFields["IBLOCK_ID"]==3) {
        while ($flag && $counter != 100) {
            $code = strval(mt_rand(0, 99999));
            while (strlen($code) != 5) {
                $code = '0' . $code;
            }
            //Проверка кода в каталоге
            $rs = CIBlockElement::GetList(array(), array(
                "IBLOCK_ID" => 2,
                "PROPERTY_9" => $code
            ));
            //Проверка кода в торговых предложениях
            $res = CIBlockElement::GetList(array(), array(
                "IBLOCK_ID" => 3,
                "PROPERTY_20" => $code
            ));
            if ($ar = $rs->GetNext() || $arr = $res->GetNext()) {}
            else
                $flag = false;

            $counter += 1;
        }
        if ($counter != 100)
            CIBlockElement::SetPropertyValuesEx($arFields["ID"], false, array('ARTNUMBER' => $code));
    }

}
function ChangeMyContent(&$content)
{
    $content = sanitize_output($content);
}

function sanitize_output($buffer)
{
    return preg_replace('~>\s*\n\s*<~', '><', $buffer);
}

function BeforeIndexHandler($arFields) {
    $offerString="";
    $swichedString = switcher_to_en($arFields["TITLE"]);
    if(CModule::IncludeModule("catalog") && CModule::IncludeModule("iblock"))
    {
        $res = CCatalogSKU::getOffersList($arFields["ITEM_ID"], 2, array(), $fields = array(),$propertyFilter = array());
        foreach($res[$arFields["ITEM_ID"]] as $key=>$item)
        {
            $rez = CIBlockElement::GetList(Array(), Array("IBLOCK_ID"=>3,"ID"=>$key), false, false, Array("PROPERTY_ARTNUMBER"));
            while($ob = $rez->GetNextElement()){
				$offerId = $ob->GetFields()["PROPERTY_ARTNUMBER_VALUE"];
				$offerString.=" ".$offerId;
            }
        }
    }
    $arrIblock = array(2);
    $arDelFields = array("DETAIL_TEXT", "PREVIEW_TEXT") ;
    if (CModule::IncludeModule('iblock') && $arFields["MODULE_ID"] == 'iblock' && in_array($arFields["PARAM2"], $arrIblock) && intval($arFields["ITEM_ID"]) > 0){
        $dbElement = CIblockElement::GetByID($arFields["ITEM_ID"]) ;
        if ($arElement = $dbElement->Fetch()){
            foreach ($arDelFields as $value){
                if (isset ($arElement[$value]) && strlen($arElement[$value]) > 0){
                    $arFields["BODY"] = str_replace (CSearch::KillTags($arElement[$value]) , "", CSearch::KillTags($arFields["BODY"]) );
                    $arFields["BODY"] .= $offerString." ".$swichedString;
                }
            }
        }

        return $arFields;
    }
}

function my_OnBeforeEventSend(&$arFields, $arTemplate)
{
    if($arTemplate["EVENT_NAME"] == "SALE_NEW_ORDER")
    {
        if (CModule::IncludeModule("sale")) {
            $orderId = $arFields["ORDER_ID"];
            $order = Bitrix\Sale\Order::load($orderId);
            $arFields["USER_COMMENT"] = $order->getField("USER_DESCRIPTION");
        }
    }

}

class MetrikData
{
    const PATTERN = "/м\d$/u";
    
    static function powMetr($value) {
        if (preg_match(self::PATTERN, $value)) {
            $length = strlen($value);
            $res = mb_strcut($value, 0, ($length - 1));
            $pow = mb_strcut($value, ($length - 1));
            $result = $res . '<sup>' . $pow . '</sup>';
            return $result;
        } else {
            return $value;
        }
    }
}

class DifferentPrices
{
    public static function altPrice($arResult) {
        if ($arResult['CURRENT']['OFFER']) {
            if ($arResult['CURRENT']['OFFER']['PROPERTIES']['COUNT_IN_MAIN']['VALUE']) {
                $altUnits = mb_strtolower($arResult['CURRENT']['OFFER']['PROPERTIES']['NAME_DIFFERENT_PRICE']['~VALUE']);
                $altCount = $arResult['CURRENT']['OFFER']['PROPERTIES']['COUNT_IN_MAIN']['VALUE'];
            } else {
                $altUnits = mb_strtolower($arResult['ITEM']['PROPERTIES']['NAME_DIFFERENT_PRICE']['~VALUE']);
                $altCount = $arResult['ITEM']['PROPERTIES']['COUNT_IN_MAIN']['VALUE'];
            }
        } else {
            $altUnits = mb_strtolower($arResult['ITEM']['PROPERTIES']['NAME_DIFFERENT_PRICE']['~VALUE']);
            $altCount = $arResult['ITEM']['PROPERTIES']['COUNT_IN_MAIN']['VALUE'];
        }
        return array(
          'units' => $altUnits,
          'count' => $altCount
        );
    }
}

class StringTransformation {
    
    public static function unitsCases($unit) {
        switch (mb_strtolower(trim($unit))) {
            case 'лист':
                $unitForTitle = "листами";
                break;
            case 'шт.':
                $unitForTitle = "штуками";
                break;
            case 'пара':
                $unitForTitle = "парами";
                break;
            case 'упак.':
                $unitForTitle = "упаковками";
                break;
            case 'меш.':
                $unitForTitle = "мешками";
                break;
            case ('рулон' || 'рул.'):
                $unitForTitle = "рулонами";
                break;
            case ('баллон' || 'бал.'):
                $unitForTitle = "баллонами";
                break;
            case 'пог. м':
                $unitForTitle = "пог.метрами";
                break;
            default:
                $unitForTitle = "единицами";
                break;
        }
        return $unitForTitle;
    }
}

function dotReplace($price, $units = '', $round = true) {
    $roundPrice = $round ? round($price, 1) : $price;
    $explodeArr = explode('.', $roundPrice);
	$unitsValue = $units ? ' '.$units : '  <span class="rub">₽</span>';
    $newPriceValue = implode(',', $explodeArr) . $unitsValue;
    
    return $newPriceValue;
}

function getOffers($arResult)
    {
        CModule::IncludeModule("catalog");
        
        $elementID = $arResult['ITEM']['ORIGINAL_PARAMETERS']['ELEMENT_ID'];
        $iblockID = $arResult['ITEM']['ORIGINAL_PARAMETERS']['IBLOCK_ID'];
        $skuFilter = array();
        $fields = array();
        $propertyID['ID'] = array();
        
        $propCode = array();
        
        foreach ($arResult["CURRENT"]["OFFER_PROPERTIES"] as $fieldCode => $fieldValues):
            foreach ($fieldValues as $prop) {
                if (!in_array($prop['ID'], $propertyID['ID'])) {
                    array_push($propertyID['ID'], $prop['ID']);
                }
            }
            if (!in_array($fieldCode, $propCode)) {
                array_push($propCode, $fieldCode);
            }
        endforeach;
        
        $offers = CCatalogSKU::getOffersList(
          $elementID,
          $iblockID,
          $skuFilter,
          $fields,
          $propertyID
        );
        
        return $offers;
    }
    
    
    function getFilterOffersProp($offers, $currentID)
    {
//        $currentID = $_GET['offer'];
        $arProp = array();
        foreach ($offers as $values) {
            $mainPropValue = '';
            $j = 0;
            foreach ($values as $value) {
                $keysProps = array_keys($value['PROPERTIES']);
                print_r($keysProps);
                if (array_search($currentID, $value)) {
                    $mainPropValue = $value['PROPERTIES'][$keysProps[0]]['VALUE'];
                }
            }
            foreach ($values as $value) {
                $keysProps = array_keys($value['PROPERTIES']);
                
                if (array_search($mainPropValue, $value['PROPERTIES'][$keysProps[0]])) {
                    $arProp[$j] = array();
                    for ($i = 0; $i < count($keysProps); $i++) {
                        array_push($arProp[$j], $value['PROPERTIES'][$keysProps[$i]]['VALUE']);
                    }
                }
                $j++;
            }
        }
        return $arProp;
    }


//Для сокрытия галочек фильтра в админке
AddEventHandler("main", "OnEpilog", "HideFlagsOfFilter");
function HideFlagsOfFilter() {
    global $APPLICATION;
    $page = $APPLICATION->GetCurPage();

    if(stristr($page, '/bitrix/admin/iblock_section_edit.php')) {
        \CJSCore::RegisterExt("custom_admin_hide_flags", array(
            "js" => "/local/php_interface/include/HideFilterFlags/script.js",
            "css" => "",
            "rel" => array()
        ));
        CJSCore::Init("jquery");
        CUtil::InitJSCore(array('custom_admin_hide_flags'));
    }
};


class HighLoadPlusProperty{

    public function AddPropertyToHL($arFields){
        if( $arFields["IBLOCK_ID"]==2 || $arFields["IBLOCK_ID"]==3 && CModule::IncludeModule("highloadblock")){
            $hlbl = 4;
            $hlblock = Bitrix\Highloadblock\HighloadBlockTable::getById($hlbl)->fetch();
            $entity = Bitrix\Highloadblock\HighloadBlockTable::compileEntity($hlblock);
            $entity_data_class = $entity->getDataClass();

            $data = array(
                "UF_NAME"=>$arFields["NAME"],
                "UF_CODE"=>$arFields["CODE"],
                "UF_PROPERTY_ID"=>$arFields["ID"]
            );
            if($arFields["IBLOCK_ID"]==3)
                $data["UF_ENTITY"]=$arFields["NAME"]." [".$arFields["CODE"]."] (ТП)";
            else
                $data["UF_ENTITY"]=$arFields["NAME"]." [".$arFields["CODE"]."] (Товар)";
            $result = $entity_data_class::add($data);
        }
    }
    public function DeletePropertyFromHL($arFields){
        $hlbl = 4;
        $hlblock = Bitrix\Highloadblock\HighloadBlockTable::getById($hlbl)->fetch();
        $entity = Bitrix\Highloadblock\HighloadBlockTable::compileEntity($hlblock);
        $entity_data_class = $entity->getDataClass();

        $rsData = $entity_data_class::getList(array(
            "select" => array("*"),
            "order" => array("ID" => "ASC"),
            "filter" => array("UF_PROPERTY_ID"=>$arFields["ID"])
        ));
        if($arData = $rsData->Fetch()){
            $id = $arData["ID"];
        }
        if($id)
            $entity_data_class::Delete($id);
    }
    public function UpdatePropertyFromHL($arFields){
        $hlbl = 4;
        $hlblock = Bitrix\Highloadblock\HighloadBlockTable::getById($hlbl)->fetch();
        $entity = Bitrix\Highloadblock\HighloadBlockTable::compileEntity($hlblock);
        $entity_data_class = $entity->getDataClass();

        $rsData = $entity_data_class::getList(array(
            "select" => array("*"),
            "order" => array("ID" => "ASC"),
            "filter" => array("UF_PROPERTY_ID"=>$arFields["ID"])
        ));
        if($arData = $rsData->Fetch()){
            $id = $arData["ID"];
        }
        $data = array(
            "UF_NAME"=>$arFields["NAME"],
            "UF_CODE"=>$arFields["CODE"],
            "UF_PROPERTY_ID"=>$arFields["ID"]
        );
        if($arFields["IBLOCK_ID"]==3)
            $data["UF_ENTITY"]=$arFields["NAME"]." [".$arFields["CODE"]."] (ТП)";
        else
            $data["UF_ENTITY"]=$arFields["NAME"]." [".$arFields["CODE"]."] (Товар)";

        if($id){
            $result = $entity_data_class::update($id, $data);
        }
        else{
            $result = $entity_data_class::add($data);
        }
    }
}

function switcher_to_en($value)
{
    $converter = array(
        'а' => 'f', 'б' => ',', 'в' => 'd', 'г' => 'u', 'д' => 'l', 'е' => 't', 'ё' => '`',
        'ж' => ';', 'з' => 'p', 'и' => 'b', 'й' => 'q', 'к' => 'r', 'л' => 'k', 'м' => 'v',
        'н' => 'y', 'о' => 'j', 'п' => 'g', 'р' => 'h', 'с' => 'c', 'т' => 'n', 'у' => 'e',
        'ф' => 'a', 'х' => '[', 'ц' => 'w', 'ч' => 'x', 'ш' => 'i', 'щ' => 'o', 'ь' => 'm',
        'ы' => 's', 'ъ' => ']', 'э' => "'", 'ю' => '.', 'я' => 'z',

        'А' => 'F', 'Б' => '<', 'В' => 'D', 'Г' => 'U', 'Д' => 'L', 'Е' => 'T', 'Ё' => '~',
        'Ж' => ':', 'З' => 'P', 'И' => 'B', 'Й' => 'Q', 'К' => 'R', 'Л' => 'K', 'М' => 'V',
        'Н' => 'Y', 'О' => 'J', 'П' => 'G', 'Р' => 'H', 'С' => 'C', 'Т' => 'N', 'У' => 'E',
        'Ф' => 'A', 'Х' => '{', 'Ц' => 'W', 'Ч' => 'X', 'Ш' => 'I', 'Щ' => 'O', 'Ь' => 'M',
        'Ы' => 'S', 'Ъ' => '}', 'Э' => '"', 'Ю' => '>', 'Я' => 'Z',

        '"' => '@', '№' => '#', ';' => '$', ':' => '^', '?' => '&', '.' => '/', ',' => '?',
    );

    $value = strtr($value, $converter);
    return $value;
}

AddEventHandler("sale", "OnOrderNewSendEmail", "modifySendingSaleData");
function modifySendingSaleData($orderID, &$eventName, &$arFields) {
    $arOrder = CSaleOrder::GetByID($orderID);
    $orderProps = CSaleOrderPropsValue::GetOrderProps($orderID);
if($arOrder["PERSON_TYPE_ID"]==1)
{
 $comments = '';
 $address = '';
 while ($arProps = $orderProps->Fetch()) {
        if ($arProps['CODE'] == 'COMMENTS'){
            $comments = htmlspecialchars($arProps['VALUE']);
        }
        if ($arProps['CODE'] == 'ADDRESS'){
            $address = htmlspecialchars($arProps['VALUE']);
        }

    }

	$arFields["DOP_TEXT"]="Адрес доставки:".$address."<br>"."Комментарий:".$comments;

}

if($arOrder["PERSON_TYPE_ID"]==2)
{
	$comments = '';
    $inn = '';
    $kpp = '';
    $company = '';
    $company_adr = '';
	$contact_person = '';
    $bik = '';
    $raschetniy = '';
    $dop_phone = '';
	$address = '';
while ($arProps = $orderProps->Fetch()) {
        if ($arProps['CODE'] == 'COMMENTS'){
            $comments = htmlspecialchars($arProps['VALUE']);
        }
        if ($arProps['CODE'] == 'INN'){
            $inn = htmlspecialchars($arProps['VALUE']);
        }
        if ($arProps['CODE'] == 'KPP'){
            $kpp = htmlspecialchars($arProps['VALUE']);
        }
        if ($arProps['CODE'] == 'COMPANY'){
            $company = htmlspecialchars($arProps['VALUE']);
        }
  		if ($arProps['CODE'] == 'CONTACT_PERSON'){
            $contact_person = htmlspecialchars($arProps['VALUE']);
        }

        if ($arProps['CODE'] == 'COMPANY_ADR'){
            $company_adr = htmlspecialchars($arProps['VALUE']);
        }
        if ($arProps['CODE'] == 'BIK'){
            $bik = htmlspecialchars($arProps['VALUE']);
        }
        if ($arProps['CODE'] == 'RASCHETNIY'){
        	$raschetniy = htmlspecialchars($arProps['VALUE']);
        }
        if ($arProps['CODE'] == 'DOP_PHONE'){
            $dop_phone = htmlspecialchars($arProps['VALUE']);
        }
		if ($arProps['CODE'] == 'ADDRESS'){
            $address = htmlspecialchars($arProps['VALUE']);
        }

    }

$arFields["DOP_TEXT"]="Контактное лицо:".$contact_person."<br>".
"Название компании:".$company."<br>".
"Адрес доставки:".$address."<br>".
"ИНН:".$inn."<br>".
"КПП:".$kpp."<br>".
"Юридический адрес:".$company_adr."<br>".
"Расчетный счет:".$raschetniy."<br>".
"БИК:".$bik."<br>".
"Дополнительный телефон:".$dop_phone."<br>".
"Комментарий:".$comments;
}


	$arFields['PRICE']=str_replace("i","&#8381;",$arFields['PRICE']);
	$arFields['ORDER_LIST']=str_replace("i","&#8381;",$arFields['ORDER_LIST']);

    //file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/myarlog.txt', print_r($arFields["DOP_TEXT"], true));
	//die();
}

$eventManager = \Bitrix\Main\EventManager::getInstance();
$eventManager->addEventHandlerCompatible('currency', 'CurrencyFormat',
    array('CCurrencyLangHandler', 'CurrencyFormat'));

 
class CCurrencyLangHandler
{
    public static function CurrencyFormat($price, $currency)
    {
 		if (!(defined('ADMIN_SECTION') && true === ADMIN_SECTION) && $currency=='RUB') {
            return sprintf('%s <span class="rub">₽</span>', number_format($price, 0, ' ', ' '));
       }

if ((defined('ADMIN_SECTION') && true === ADMIN_SECTION) && $currency=='RUB') {
            return sprintf('%s &#8381;', number_format($price, 0, ' ', ' '));
       }

    }
}