<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');
/*******************************************************************************************************
 * class CountryArray
 * returns array of countries, can return flat array using get() function and 2d array with get2d()
 * it can provide following information related to  the country
 *      1) name
 *      2) alpha2 code, 2 characters (ISO-3166-1 alpha2)
 *      3) alpha3 code, 3 characters (ISO-3166-1 alpha3)
 *      4) numeric code (ISO-3166-1 numeric)
 *      5) ISD code for country
 *      6) continent
 *
 * Author : Sameer Shelavale
 * Email : samiirds@gmail.com, sameer@techrevol.com, sameer@possible.in
 * Author website: http://techrevol.com, http://possible.in
 * Phone : +91 9890103122
 * License: AGPL3, You should keep Package name, Class name, Author name, Email and website credits.
 * Copyrights (C) Sameer Shelavale
 *******************************************************************************************************/
class Countriesarray{
    public $countries = array(
    	"AF" => array( "alpha2" => "AF", "alpha3" => "AFG", "num" => "004", "isd" => "93", "en" => "Afghanistan", "continent" => "Asia", "kr" => "아프가니스탄" ),
		"AX" => array( "alpha2" => "AX", "alpha3" => "ALA", "num" => "248", "isd" => "358", "en" => "Åland Islands", "continent" => "Europe", "kr" => "올란드 제도" ),
		"AL" => array( "alpha2" => "AL", "alpha3" => "ALB", "num" => "008", "isd" => "355", "en" => "Albania", "continent" => "Europe", "kr" => "알바니아" ),
		"DZ" => array( "alpha2" => "DZ", "alpha3" => "DZA", "num" => "012", "isd" => "213", "en" => "Algeria", "continent" => "Africa", "kr" => "알제리" ),
		"AS" => array( "alpha2" => "AS", "alpha3" => "ASM", "num" => "016", "isd" => "1684", "en" => "American Samoa", "continent" => "Oceania", "kr" => "아메리칸사모아" ),
		"AD" => array( "alpha2" => "AD", "alpha3" => "AND", "num" => "020", "isd" => "376", "en" => "Andorra", "continent" => "Europe", "kr" => "안도라" ),
		"AO" => array( "alpha2" => "AO", "alpha3" => "AGO", "num" => "024", "isd" => "244", "en" => "Angola", "continent" => "Africa", "kr" => "앙골라" ),
		"AI" => array( "alpha2" => "AI", "alpha3" => "AIA", "num" => "660", "isd" => "1264", "en" => "Anguilla", "continent" => "North America", "kr" => "앵귈라" ),
		"AQ" => array( "alpha2" => "AQ", "alpha3" => "ATA", "num" => "010", "isd" => "672", "en" => "Antarctica", "continent" => "Antarctica", "kr" => "남극" ),
		"AG" => array( "alpha2" => "AG", "alpha3" => "ATG", "num" => "028", "isd" => "1268", "en" => "Antigua and Barbuda", "continent" => "North America", "kr" => "앤티가 바부다" ),
		"AR" => array( "alpha2" => "AR", "alpha3" => "ARG", "num" => "032", "isd" => "54", "en" => "Argentina", "continent" => "South America", "kr" => "아르헨티나" ),
		"AM" => array( "alpha2" => "AM", "alpha3" => "ARM", "num" => "051", "isd" => "374", "en" => "Armenia", "continent" => "Asia", "kr" => "아르메니아" ),
		"AW" => array( "alpha2" => "AW", "alpha3" => "ABW", "num" => "533", "isd" => "297", "en" => "Aruba", "continent" => "North America", "kr" => "아루바" ),
		"AU" => array( "alpha2" => "AU", "alpha3" => "AUS", "num" => "036", "isd" => "61", "en" => "Australia", "continent" => "Oceania", "kr" => "오스트레일리아" ),
		"AT" => array( "alpha2" => "AT", "alpha3" => "AUT", "num" => "040", "isd" => "43", "en" => "Austria", "continent" => "Europe", "kr" => "오스트리아" ),
		"AZ" => array( "alpha2" => "AZ", "alpha3" => "AZE", "num" => "031", "isd" => "994", "en" => "Azerbaijan", "continent" => "Asia", "kr" => "아제르바이잔" ),
		"BS" => array( "alpha2" => "BS", "alpha3" => "BHS", "num" => "044", "isd" => "1242", "en" => "Bahamas", "continent" => "North America", "kr" => "바하마" ),
		"BH" => array( "alpha2" => "BH", "alpha3" => "BHR", "num" => "048", "isd" => "973", "en" => "Bahrain", "continent" => "Asia", "kr" => "바레인" ),
		"BD" => array( "alpha2" => "BD", "alpha3" => "BGD", "num" => "050", "isd" => "880", "en" => "Bangladesh", "continent" => "Asia", "kr" => "방글라데시" ),
		"BB" => array( "alpha2" => "BB", "alpha3" => "BRB", "num" => "052", "isd" => "1246", "en" => "Barbados", "continent" => "North America", "kr" => "바베이도스" ),
		"BY" => array( "alpha2" => "BY", "alpha3" => "BLR", "num" => "112", "isd" => "375", "en" => "Belarus", "continent" => "Europe", "kr" => "벨라루스" ),
		"BE" => array( "alpha2" => "BE", "alpha3" => "BEL", "num" => "056", "isd" => "32", "en" => "Belgium", "continent" => "Europe", "kr" => "벨기에" ),
		"BZ" => array( "alpha2" => "BZ", "alpha3" => "BLZ", "num" => "084", "isd" => "501", "en" => "Belize", "continent" => "North America", "kr" => "벨리즈" ),
		"BJ" => array( "alpha2" => "BJ", "alpha3" => "BEN", "num" => "204", "isd" => "229", "en" => "Benin", "continent" => "Africa", "kr" => "베냉" ),
		"BM" => array( "alpha2" => "BM", "alpha3" => "BMU", "num" => "060", "isd" => "1441", "en" => "Bermuda", "continent" => "North America", "kr" => "버뮤다" ),
		"BT" => array( "alpha2" => "BT", "alpha3" => "BTN", "num" => "064", "isd" => "975", "en" => "Bhutan", "continent" => "Asia", "kr" => "부탄" ),
		"BO" => array( "alpha2" => "BO", "alpha3" => "BOL", "num" => "068", "isd" => "591", "en" => "Bolivia", "continent" => "South America", "kr" => "볼리비아" ),
		"BA" => array( "alpha2" => "BA", "alpha3" => "BIH", "num" => "070", "isd" => "387", "en" => "Bosnia and Herzegovina", "continent" => "Europe", "kr" => "보스니아 헤르체고비나" ),
		"BW" => array( "alpha2" => "BW", "alpha3" => "BWA", "num" => "072", "isd" => "267", "en" => "Botswana", "continent" => "Africa", "kr" => "보츠와나" ),
		"BV" => array( "alpha2" => "BV", "alpha3" => "BVT", "num" => "074", "isd" => "61", "en" => "Bouvet Island", "continent" => "Antarctica", "kr" => "부베 섬" ),
		"BR" => array( "alpha2" => "BR", "alpha3" => "BRA", "num" => "076", "isd" => "55", "en" => "Brazil", "continent" => "South America", "kr" => "브라질" ),
		"IO" => array( "alpha2" => "IO", "alpha3" => "IOT", "num" => "086", "isd" => "246", "en" => "British Indian Ocean Territory", "continent" => "Asia", "kr" => "영국령 인도양 지역" ),
		"BN" => array( "alpha2" => "BN", "alpha3" => "BRN", "num" => "096", "isd" => "672", "en" => "Brunei Darussalam", "continent" => "Asia", "kr" => "브루나이" ),
		"BG" => array( "alpha2" => "BG", "alpha3" => "BGR", "num" => "100", "isd" => "359", "en" => "Bulgaria", "continent" => "Europe", "kr" => "불가리아" ),
		"BF" => array( "alpha2" => "BF", "alpha3" => "BFA", "num" => "854", "isd" => "226", "en" => "Burkina Faso", "continent" => "Africa", "kr" => "부르키나파소" ),
		"BI" => array( "alpha2" => "BI", "alpha3" => "BDI", "num" => "108", "isd" => "257", "en" => "Burundi", "continent" => "Africa", "kr" => "부룬디" ),
		"KH" => array( "alpha2" => "KH", "alpha3" => "KHM", "num" => "116", "isd" => "855", "en" => "Cambodia", "continent" => "Asia", "kr" => "캄보디아" ),
		"CM" => array( "alpha2" => "CM", "alpha3" => "CMR", "num" => "120", "isd" => "231", "en" => "Cameroon", "continent" => "Africa", "kr" => "카메룬" ),
		"CA" => array( "alpha2" => "CA", "alpha3" => "CAN", "num" => "124", "isd" => "1", "en" => "Canada", "continent" => "North America", "kr" => "캐나다" ),
		"CV" => array( "alpha2" => "CV", "alpha3" => "CPV", "num" => "132", "isd" => "238", "en" => "Cape Verde", "continent" => "Africa", "kr" => "카보베르데" ),
		"KY" => array( "alpha2" => "KY", "alpha3" => "CYM", "num" => "136", "isd" => "1345", "en" => "Cayman Islands", "continent" => "North America", "kr" => "케이맨 제도" ),
		"CF" => array( "alpha2" => "CF", "alpha3" => "CAF", "num" => "140", "isd" => "236", "en" => "Central African Republic", "continent" => "Africa", "kr" => "중앙아프리카 공화국" ),
		"TD" => array( "alpha2" => "TD", "alpha3" => "TCD", "num" => "148", "isd" => "235", "en" => "Chad", "continent" => "Africa", "kr" => "차드" ),
		"CL" => array( "alpha2" => "CL", "alpha3" => "CHL", "num" => "152", "isd" => "56", "en" => "Chile", "continent" => "South America", "kr" => "칠레" ),
		"CN" => array( "alpha2" => "CN", "alpha3" => "CHN", "num" => "156", "isd" => "86", "en" => "China", "continent" => "Asia", "kr" => "중화인민공화국" ),
		"CX" => array( "alpha2" => "CX", "alpha3" => "CXR", "num" => "162", "isd" => "61", "en" => "Christmas Island", "continent" => "Asia", "kr" => "크리스마스 섬" ),
		"CC" => array( "alpha2" => "CC", "alpha3" => "CCK", "num" => "166", "isd" => "891", "en" => "Cocos (Keeling) Islands", "continent" => "Asia", "kr" => "코코스 제도" ),
		"CO" => array( "alpha2" => "CO", "alpha3" => "COL", "num" => "170", "isd" => "57", "en" => "Colombia", "continent" => "South America", "kr" => "콜롬비아" ),
		"KM" => array( "alpha2" => "KM", "alpha3" => "COM", "num" => "174", "isd" => "269", "en" => "Comoros", "continent" => "Africa", "kr" => "코모로" ),
		"CG" => array( "alpha2" => "CG", "alpha3" => "COG", "num" => "178", "isd" => "242", "en" => "Congo", "continent" => "Africa", "kr" => "콩고 공화국" ),
		"CD" => array( "alpha2" => "CD", "alpha3" => "COD", "num" => "180", "isd" => "243", "en" => "The Democratic Republic of The Congo", "continent" => "Africa", "kr" => "콩고 민주 공화국" ),
		"CK" => array( "alpha2" => "CK", "alpha3" => "COK", "num" => "184", "isd" => "682", "en" => "Cook Islands", "continent" => "Oceania", "kr" => "쿡 제도" ),
		"CR" => array( "alpha2" => "CR", "alpha3" => "CRI", "num" => "188", "isd" => "506", "en" => "Costa Rica", "continent" => "North America", "kr" => "코스타리카" ),
		"CI" => array( "alpha2" => "CI", "alpha3" => "CIV", "num" => "384", "isd" => "225", "en" => "Cote D\'ivoire", "continent" => "Africa", "kr" => "코트디부아르" ),
		"HR" => array( "alpha2" => "HR", "alpha3" => "HRV", "num" => "191", "isd" => "385", "en" => "Croatia", "continent" => "Europe", "kr" => "크로아티아" ),
		"CU" => array( "alpha2" => "CU", "alpha3" => "CUB", "num" => "192", "isd" => "53", "en" => "Cuba", "continent" => "North America", "kr" => "쿠바" ),
		"CY" => array( "alpha2" => "CY", "alpha3" => "CYP", "num" => "196", "isd" => "357", "en" => "Cyprus", "continent" => "Asia", "kr" => "키프로스" ),
		"CZ" => array( "alpha2" => "CZ", "alpha3" => "CZE", "num" => "203", "isd" => "420", "en" => "Czech Republic", "continent" => "Europe", "kr" => "체코" ),
		"DK" => array( "alpha2" => "DK", "alpha3" => "DNK", "num" => "208", "isd" => "45", "en" => "Denmark", "continent" => "Europe", "kr" => "덴마크" ),
		"DJ" => array( "alpha2" => "DJ", "alpha3" => "DJI", "num" => "262", "isd" => "253", "en" => "Djibouti", "continent" => "Africa", "kr" => "지부티" ),
		"DM" => array( "alpha2" => "DM", "alpha3" => "DMA", "num" => "212", "isd" => "1767", "en" => "Dominica", "continent" => "North America", "kr" => "도미니카 연방" ),
		"DO" => array( "alpha2" => "DO", "alpha3" => "DOM", "num" => "214", "isd" => "1809", "en" => "Dominican Republic", "continent" => "North America", "kr" => "도미니카 공화국" ),
		"EC" => array( "alpha2" => "EC", "alpha3" => "ECU", "num" => "218", "isd" => "593", "en" => "Ecuador", "continent" => "South America", "kr" => "에콰도르" ),
		"EG" => array( "alpha2" => "EG", "alpha3" => "EGY", "num" => "818", "isd" => "20", "en" => "Egypt", "continent" => "Africa", "kr" => "이집트" ),
		"SV" => array( "alpha2" => "SV", "alpha3" => "SLV", "num" => "222", "isd" => "503", "en" => "El Salvador", "continent" => "North America", "kr" => "엘살바도르" ),
		"GQ" => array( "alpha2" => "GQ", "alpha3" => "GNQ", "num" => "226", "isd" => "240", "en" => "Equatorial Guinea", "continent" => "Africa", "kr" => "적도 기니" ),
		"ER" => array( "alpha2" => "ER", "alpha3" => "ERI", "num" => "232", "isd" => "291", "en" => "Eritrea", "continent" => "Africa", "kr" => "에리트레아" ),
		"EE" => array( "alpha2" => "EE", "alpha3" => "EST", "num" => "233", "isd" => "372", "en" => "Estonia", "continent" => "Europe", "kr" => "에스토니아" ),
		"ET" => array( "alpha2" => "ET", "alpha3" => "ETH", "num" => "231", "isd" => "251", "en" => "Ethiopia", "continent" => "Africa", "kr" => "에티오피아" ),
		"FK" => array( "alpha2" => "FK", "alpha3" => "FLK", "num" => "238", "isd" => "500", "en" => "Falkland Islands (Malvinas)", "continent" => "South America", "kr" => "포클랜드 제도" ),
		"FO" => array( "alpha2" => "FO", "alpha3" => "FRO", "num" => "234", "isd" => "298", "en" => "Faroe Islands", "continent" => "Europe", "kr" => "페로 제도" ),
		"FJ" => array( "alpha2" => "FJ", "alpha3" => "FJI", "num" => "242", "isd" => "679", "en" => "Fiji", "continent" => "Oceania", "kr" => "피지" ),
		"FI" => array( "alpha2" => "FI", "alpha3" => "FIN", "num" => "246", "isd" => "238", "en" => "Finland", "continent" => "Europe", "kr" => "핀란드" ),
		"FR" => array( "alpha2" => "FR", "alpha3" => "FRA", "num" => "250", "isd" => "33", "en" => "France", "continent" => "Europe", "kr" => "프랑스" ),
		"GF" => array( "alpha2" => "GF", "alpha3" => "GUF", "num" => "254", "isd" => "594", "en" => "French Guiana", "continent" => "South America", "kr" => "프랑스령 기아나" ),
		"PF" => array( "alpha2" => "PF", "alpha3" => "PYF", "num" => "258", "isd" => "689", "en" => "French Polynesia", "continent" => "Oceania", "kr" => "프랑스령 폴리네시아" ),
		"TF" => array( "alpha2" => "TF", "alpha3" => "ATF", "num" => "260", "isd" => "262", "en" => "French Southern Territories", "continent" => "Antarctica", "kr" => "프랑스령 남방 및 남극" ),
		"GA" => array( "alpha2" => "GA", "alpha3" => "GAB", "num" => "266", "isd" => "241", "en" => "Gabon", "continent" => "Africa", "kr" => "가봉" ),
		"GM" => array( "alpha2" => "GM", "alpha3" => "GMB", "num" => "270", "isd" => "220", "en" => "Gambia", "continent" => "Africa", "kr" => "감비아" ),
		"GE" => array( "alpha2" => "GE", "alpha3" => "GEO", "num" => "268", "isd" => "995", "en" => "Georgia", "continent" => "Asia", "kr" => "조지아" ),
		"DE" => array( "alpha2" => "DE", "alpha3" => "DEU", "num" => "276", "isd" => "49", "en" => "Germany", "continent" => "Europe", "kr" => "독일" ),
		"GH" => array( "alpha2" => "GH", "alpha3" => "GHA", "num" => "288", "isd" => "233", "en" => "Ghana", "continent" => "Africa", "kr" => "가나" ),
		"GI" => array( "alpha2" => "GI", "alpha3" => "GIB", "num" => "292", "isd" => "350", "en" => "Gibraltar", "continent" => "Europe", "kr" => "지브롤터" ),
		"GR" => array( "alpha2" => "GR", "alpha3" => "GRC", "num" => "300", "isd" => "30", "en" => "Greece", "continent" => "Europe", "kr" => "그리스" ),
		"GL" => array( "alpha2" => "GL", "alpha3" => "GRL", "num" => "304", "isd" => "299", "en" => "Greenland", "continent" => "North America", "kr" => "그린란드" ),
		"GD" => array( "alpha2" => "GD", "alpha3" => "GRD", "num" => "308", "isd" => "1473", "en" => "Grenada", "continent" => "North America", "kr" => "그레나다" ),
		"GP" => array( "alpha2" => "GP", "alpha3" => "GLP", "num" => "312", "isd" => "590", "en" => "Guadeloupe", "continent" => "North America", "kr" => "과들루프" ),
		"GU" => array( "alpha2" => "GU", "alpha3" => "GUM", "num" => "316", "isd" => "1871", "en" => "Guam", "continent" => "Oceania", "kr" => "괌" ),
		"GT" => array( "alpha2" => "GT", "alpha3" => "GTM", "num" => "320", "isd" => "502", "en" => "Guatemala", "continent" => "North America", "kr" => "과테말라" ),
		"GG" => array( "alpha2" => "GG", "alpha3" => "GGY", "num" => "831", "isd" => "44", "en" => "Guernsey", "continent" => "Europe", "kr" => "건지 섬" ),
		"GN" => array( "alpha2" => "GN", "alpha3" => "GIN", "num" => "324", "isd" => "224", "en" => "Guinea", "continent" => "Africa", "kr" => "기니" ),
		"GW" => array( "alpha2" => "GW", "alpha3" => "GNB", "num" => "624", "isd" => "245", "en" => "Guinea-bissau", "continent" => "Africa", "kr" => "기니비사우" ),
		"GY" => array( "alpha2" => "GY", "alpha3" => "GUY", "num" => "328", "isd" => "592", "en" => "Guyana", "continent" => "South America", "kr" => "가이아나" ),
		"HT" => array( "alpha2" => "HT", "alpha3" => "HTI", "num" => "332", "isd" => "509", "en" => "Haiti", "continent" => "North America", "kr" => "아이티" ),
		"HM" => array( "alpha2" => "HM", "alpha3" => "HMD", "num" => "334", "isd" => "672", "en" => "Heard Island and Mcdonald Islands", "continent" => "Antarctica", "kr" => "허드 맥도널드 제도" ),
		"VA" => array( "alpha2" => "VA", "alpha3" => "VAT", "num" => "336", "isd" => "379", "en" => "Holy See (Vatican City State)", "continent" => "Europe", "kr" => "바티칸 시국" ),
		"HN" => array( "alpha2" => "HN", "alpha3" => "HND", "num" => "340", "isd" => "504", "en" => "Honduras", "continent" => "North America", "kr" => "온두라스" ),
		"HK" => array( "alpha2" => "HK", "alpha3" => "HKG", "num" => "344", "isd" => "852", "en" => "Hong Kong", "continent" => "Asia", "kr" => "홍콩" ),
		"HU" => array( "alpha2" => "HU", "alpha3" => "HUN", "num" => "348", "isd" => "36", "en" => "Hungary", "continent" => "Europe", "kr" => "헝가리" ),
		"IS" => array( "alpha2" => "IS", "alpha3" => "ISL", "num" => "352", "isd" => "354", "en" => "Iceland", "continent" => "Europe", "kr" => "아이슬란드" ),
		"IN" => array( "alpha2" => "IN", "alpha3" => "IND", "num" => "356", "isd" => "91", "en" => "India", "continent" => "Asia", "kr" => "인도" ),
		"ID" => array( "alpha2" => "ID", "alpha3" => "IDN", "num" => "360", "isd" => "62", "en" => "Indonesia", "continent" => "Asia", "kr" => "인도네시아" ),
		"IR" => array( "alpha2" => "IR", "alpha3" => "IRN", "num" => "364", "isd" => "98", "en" => "Iran", "continent" => "Asia", "kr" => "이란" ),
		"IQ" => array( "alpha2" => "IQ", "alpha3" => "IRQ", "num" => "368", "isd" => "964", "en" => "Iraq", "continent" => "Asia", "kr" => "이라크" ),
		"IE" => array( "alpha2" => "IE", "alpha3" => "IRL", "num" => "372", "isd" => "353", "en" => "Ireland", "continent" => "Europe", "kr" => "아일랜드" ),
		"IM" => array( "alpha2" => "IM", "alpha3" => "IMN", "num" => "833", "isd" => "44", "en" => "Isle of Man", "continent" => "Europe", "kr" => "맨 섬" ),
		"IL" => array( "alpha2" => "IL", "alpha3" => "ISR", "num" => "376", "isd" => "972", "en" => "Israel", "continent" => "Asia", "kr" => "이스라엘" ),
		"IT" => array( "alpha2" => "IT", "alpha3" => "ITA", "num" => "380", "isd" => "39", "en" => "Italy", "continent" => "Europe", "kr" => "이탈리아" ),
		"JM" => array( "alpha2" => "JM", "alpha3" => "JAM", "num" => "388", "isd" => "1876", "en" => "Jamaica", "continent" => "North America", "kr" => "자메이카" ),
		"JP" => array( "alpha2" => "JP", "alpha3" => "JPN", "num" => "392", "isd" => "81", "en" => "Japan", "continent" => "Asia", "kr" => "일본" ),
		"JE" => array( "alpha2" => "JE", "alpha3" => "JEY", "num" => "832", "isd" => "44", "en" => "Jersey", "continent" => "Europe", "kr" => "저지 섬" ),
		"JO" => array( "alpha2" => "JO", "alpha3" => "JOR", "num" => "400", "isd" => "962", "en" => "Jordan", "continent" => "Asia", "kr" => "요르단" ),
		"KZ" => array( "alpha2" => "KZ", "alpha3" => "KAZ", "num" => "398", "isd" => "7", "en" => "Kazakhstan", "continent" => "Asia", "kr" => "카자흐스탄" ),
		"KE" => array( "alpha2" => "KE", "alpha3" => "KEN", "num" => "404", "isd" => "254", "en" => "Kenya", "continent" => "Africa", "kr" => "케냐" ),
		"KI" => array( "alpha2" => "KI", "alpha3" => "KIR", "num" => "296", "isd" => "686", "en" => "Kiribati", "continent" => "Oceania", "kr" => "키리바시" ),
		"KP" => array( "alpha2" => "KP", "alpha3" => "PRK", "num" => "408", "isd" => "850", "en" => "Democratic People\'s Republic of Korea", "continent" => "Asia", "kr" => "조선민주주의인민공화국" ),
		"KR" => array( "alpha2" => "KR", "alpha3" => "KOR", "num" => "410", "isd" => "82", "en" => "Republic of Korea", "continent" => "Asia", "kr" => "대한민국" ),
		"KW" => array( "alpha2" => "KW", "alpha3" => "KWT", "num" => "414", "isd" => "965", "en" => "Kuwait", "continent" => "Asia", "kr" => "쿠웨이트" ),
		"KG" => array( "alpha2" => "KG", "alpha3" => "KGZ", "num" => "417", "isd" => "996", "en" => "Kyrgyzstan", "continent" => "Asia", "kr" => "키르기스스탄" ),
		"LA" => array( "alpha2" => "LA", "alpha3" => "LAO", "num" => "418", "isd" => "856", "en" => "Lao People\'s Democratic Republic", "continent" => "Asia", "kr" => "라오스" ),
		"LV" => array( "alpha2" => "LV", "alpha3" => "LVA", "num" => "428", "isd" => "371", "en" => "Latvia", "continent" => "Europe", "kr" => "라트비아" ),
		"LB" => array( "alpha2" => "LB", "alpha3" => "LBN", "num" => "422", "isd" => "961", "en" => "Lebanon", "continent" => "Asia", "kr" => "레바논" ),
		"LS" => array( "alpha2" => "LS", "alpha3" => "LSO", "num" => "426", "isd" => "266", "en" => "Lesotho", "continent" => "Africa", "kr" => "레소토" ),
		"LR" => array( "alpha2" => "LR", "alpha3" => "LBR", "num" => "430", "isd" => "231", "en" => "Liberia", "continent" => "Africa", "kr" => "라이베리아" ),
		"LY" => array( "alpha2" => "LY", "alpha3" => "LBY", "num" => "434", "isd" => "218", "en" => "Libya", "continent" => "Africa", "kr" => "리비아" ),
		"LI" => array( "alpha2" => "LI", "alpha3" => "LIE", "num" => "438", "isd" => "423", "en" => "Liechtenstein", "continent" => "Europe", "kr" => "리히텐슈타인" ),
		"LT" => array( "alpha2" => "LT", "alpha3" => "LTU", "num" => "440", "isd" => "370", "en" => "Lithuania", "continent" => "Europe", "kr" => "리투아니아" ),
		"LU" => array( "alpha2" => "LU", "alpha3" => "LUX", "num" => "442", "isd" => "352", "en" => "Luxembourg", "continent" => "Europe", "kr" => "룩셈부르크" ),
		"MO" => array( "alpha2" => "MO", "alpha3" => "MAC", "num" => "446", "isd" => "853", "en" => "Macao", "continent" => "Asia", "kr" => "마카오" ),
		"MK" => array( "alpha2" => "MK", "alpha3" => "MKD", "num" => "807", "isd" => "389", "en" => "Macedonia", "continent" => "Europe", "kr" => "마케도니아 공화국" ),
		"MG" => array( "alpha2" => "MG", "alpha3" => "MDG", "num" => "450", "isd" => "261", "en" => "Madagascar", "continent" => "Africa", "kr" => "마다가스카르" ),
		"MW" => array( "alpha2" => "MW", "alpha3" => "MWI", "num" => "454", "isd" => "265", "en" => "Malawi", "continent" => "Africa", "kr" => "말라위" ),
		"MY" => array( "alpha2" => "MY", "alpha3" => "MYS", "num" => "458", "isd" => "60", "en" => "Malaysia", "continent" => "Asia", "kr" => "말레이시아" ),
		"MV" => array( "alpha2" => "MV", "alpha3" => "MDV", "num" => "462", "isd" => "960", "en" => "Maldives", "continent" => "Asia", "kr" => "몰디브" ),
		"ML" => array( "alpha2" => "ML", "alpha3" => "MLI", "num" => "466", "isd" => "223", "en" => "Mali", "continent" => "Africa", "kr" => "말리" ),
		"MT" => array( "alpha2" => "MT", "alpha3" => "MLT", "num" => "470", "isd" => "356", "en" => "Malta", "continent" => "Europe", "kr" => "몰타" ),
		"MH" => array( "alpha2" => "MH", "alpha3" => "MHL", "num" => "584", "isd" => "692", "en" => "Marshall Islands", "continent" => "Oceania", "kr" => "마셜 제도" ),
		"MQ" => array( "alpha2" => "MQ", "alpha3" => "MTQ", "num" => "474", "isd" => "596", "en" => "Martinique", "continent" => "North America", "kr" => "마르티니크" ),
		"MR" => array( "alpha2" => "MR", "alpha3" => "MRT", "num" => "478", "isd" => "222", "en" => "Mauritania", "continent" => "Africa", "kr" => "모리타니" ),
		"MU" => array( "alpha2" => "MU", "alpha3" => "MUS", "num" => "480", "isd" => "230", "en" => "Mauritius", "continent" => "Africa", "kr" => "모리셔스" ),
		"YT" => array( "alpha2" => "YT", "alpha3" => "MYT", "num" => "175", "isd" => "262", "en" => "Mayotte", "continent" => "Africa", "kr" => "마요트" ),
		"MX" => array( "alpha2" => "MX", "alpha3" => "MEX", "num" => "484", "isd" => "52", "en" => "Mexico", "continent" => "North America", "kr" => "멕시코" ),
		"FM" => array( "alpha2" => "FM", "alpha3" => "FSM", "num" => "583", "isd" => "691", "en" => "Micronesia", "continent" => "Oceania", "kr" => "미크로네시아 연방" ),
		"MD" => array( "alpha2" => "MD", "alpha3" => "MDA", "num" => "498", "isd" => "373", "en" => "Moldova", "continent" => "Europe", "kr" => "몰도바" ),
		"MC" => array( "alpha2" => "MC", "alpha3" => "MCO", "num" => "492", "isd" => "377", "en" => "Monaco", "continent" => "Europe", "kr" => "모나코" ),
		"MN" => array( "alpha2" => "MN", "alpha3" => "MNG", "num" => "496", "isd" => "976", "en" => "Mongolia", "continent" => "Asia", "kr" => "몽골" ),
		"ME" => array( "alpha2" => "ME", "alpha3" => "MNE", "num" => "499", "isd" => "382", "en" => "Montenegro", "continent" => "Europe", "kr" => "몬테네그로" ),
		"MS" => array( "alpha2" => "MS", "alpha3" => "MSR", "num" => "500", "isd" => "1664", "en" => "Montserrat", "continent" => "North America", "kr" => "몬트세랫" ),
		"MA" => array( "alpha2" => "MA", "alpha3" => "MAR", "num" => "504", "isd" => "212", "en" => "Morocco", "continent" => "Africa", "kr" => "모로코" ),
		"MZ" => array( "alpha2" => "MZ", "alpha3" => "MOZ", "num" => "508", "isd" => "258", "en" => "Mozambique", "continent" => "Africa", "kr" => "모잠비크" ),
		"MM" => array( "alpha2" => "MM", "alpha3" => "MMR", "num" => "104", "isd" => "95", "en" => "Myanmar", "continent" => "Asia", "kr" => "미얀마" ),
		"NA" => array( "alpha2" => "NA", "alpha3" => "NAM", "num" => "516", "isd" => "264", "en" => "Namibia", "continent" => "Africa", "kr" => "나미비아" ),
		"NR" => array( "alpha2" => "NR", "alpha3" => "NRU", "num" => "520", "isd" => "674", "en" => "Nauru", "continent" => "Oceania", "kr" => "나우루" ),
		"NP" => array( "alpha2" => "NP", "alpha3" => "NPL", "num" => "524", "isd" => "977", "en" => "Nepal", "continent" => "Asia", "kr" => "네팔" ),
		"NL" => array( "alpha2" => "NL", "alpha3" => "NLD", "num" => "528", "isd" => "31", "en" => "Netherlands", "continent" => "Europe", "kr" => "네덜란드" ),
		"AN" => array( "alpha2" => "AN", "alpha3" => "ANT", "num" => "530", "isd" => "599", "en" => "Netherlands Antilles", "continent" => "North America", "kr" => "네덜란드령 안틸레스" ),
		"NC" => array( "alpha2" => "NC", "alpha3" => "NCL", "num" => "540", "isd" => "687", "en" => "New Caledonia", "continent" => "Oceania", "kr" => "누벨칼레도니" ),
		"NZ" => array( "alpha2" => "NZ", "alpha3" => "NZL", "num" => "554", "isd" => "64", "en" => "New Zealand", "continent" => "Oceania", "kr" => "뉴질랜드" ),
		"NI" => array( "alpha2" => "NI", "alpha3" => "NIC", "num" => "558", "isd" => "505", "en" => "Nicaragua", "continent" => "North America", "kr" => "니카라과" ),
		"NE" => array( "alpha2" => "NE", "alpha3" => "NER", "num" => "562", "isd" => "227", "en" => "Niger", "continent" => "Africa", "kr" => "니제르" ),
		"NG" => array( "alpha2" => "NG", "alpha3" => "NGA", "num" => "566", "isd" => "234", "en" => "Nigeria", "continent" => "Africa", "kr" => "나이지리아" ),
		"NU" => array( "alpha2" => "NU", "alpha3" => "NIU", "num" => "570", "isd" => "683", "en" => "Niue", "continent" => "Oceania", "kr" => "니우에" ),
		"NF" => array( "alpha2" => "NF", "alpha3" => "NFK", "num" => "574", "isd" => "672", "en" => "Norfolk Island", "continent" => "Oceania", "kr" => "노퍽 섬" ),
		"MP" => array( "alpha2" => "MP", "alpha3" => "MNP", "num" => "580", "isd" => "1670", "en" => "Northern Mariana Islands", "continent" => "Oceania", "kr" => "북마리아나 제도" ),
		"NO" => array( "alpha2" => "NO", "alpha3" => "NOR", "num" => "578", "isd" => "47", "en" => "Norway", "continent" => "Europe", "kr" => "노르웨이" ),
		"OM" => array( "alpha2" => "OM", "alpha3" => "OMN", "num" => "512", "isd" => "968", "en" => "Oman", "continent" => "Asia", "kr" => "오만" ),
		"PK" => array( "alpha2" => "PK", "alpha3" => "PAK", "num" => "586", "isd" => "92", "en" => "Pakistan", "continent" => "Asia", "kr" => "파키스탄" ),
		"PW" => array( "alpha2" => "PW", "alpha3" => "PLW", "num" => "585", "isd" => "680", "en" => "Palau", "continent" => "Oceania", "kr" => "팔라우" ),
		"PS" => array( "alpha2" => "PS", "alpha3" => "PSE", "num" => "275", "isd" => "970", "en" => "Palestinia", "continent" => "Asia", "kr" => "팔레스타인" ),
		"PA" => array( "alpha2" => "PA", "alpha3" => "PAN", "num" => "591", "isd" => "507", "en" => "Panama", "continent" => "North America", "kr" => "파나마" ),
		"PG" => array( "alpha2" => "PG", "alpha3" => "PNG", "num" => "598", "isd" => "675", "en" => "Papua New Guinea", "continent" => "Oceania", "kr" => "파푸아뉴기니" ),
		"PY" => array( "alpha2" => "PY", "alpha3" => "PRY", "num" => "600", "isd" => "595", "en" => "Paraguay", "continent" => "South America", "kr" => "파라과이" ),
		"PE" => array( "alpha2" => "PE", "alpha3" => "PER", "num" => "604", "isd" => "51", "en" => "Peru", "continent" => "South America", "kr" => "페루" ),
		"PH" => array( "alpha2" => "PH", "alpha3" => "PHL", "num" => "608", "isd" => "63", "en" => "Philippines", "continent" => "Asia", "kr" => "필리핀" ),
		"PN" => array( "alpha2" => "PN", "alpha3" => "PCN", "num" => "612", "isd" => "870", "en" => "Pitcairn", "continent" => "Oceania", "kr" => "핏케언 제도" ),
		"PL" => array( "alpha2" => "PL", "alpha3" => "POL", "num" => "616", "isd" => "48", "en" => "Poland", "continent" => "Europe", "kr" => "폴란드" ),
		"PT" => array( "alpha2" => "PT", "alpha3" => "PRT", "num" => "620", "isd" => "351", "en" => "Portugal", "continent" => "Europe", "kr" => "포르투갈" ),
		"PR" => array( "alpha2" => "PR", "alpha3" => "PRI", "num" => "630", "isd" => "1", "en" => "Puerto Rico", "continent" => "North America", "kr" => "푸에르토리코" ),
		"QA" => array( "alpha2" => "QA", "alpha3" => "QAT", "num" => "634", "isd" => "974", "en" => "Qatar", "continent" => "Asia", "kr" => "카타르" ),
		"RE" => array( "alpha2" => "RE", "alpha3" => "REU", "num" => "638", "isd" => "262", "en" => "Reunion", "continent" => "Africa", "kr" => "레위니옹" ),
		"RO" => array( "alpha2" => "RO", "alpha3" => "ROU", "num" => "642", "isd" => "40", "en" => "Romania", "continent" => "Europe", "kr" => "루마니아" ),
		"RU" => array( "alpha2" => "RU", "alpha3" => "RUS", "num" => "643", "isd" => "7", "en" => "Russian Federation", "continent" => "Europe", "kr" => "러시아" ),
		"RW" => array( "alpha2" => "RW", "alpha3" => "RWA", "num" => "646", "isd" => "250", "en" => "Rwanda", "continent" => "Africa", "kr" => "르완다" ),
		"SH" => array( "alpha2" => "SH", "alpha3" => "SHN", "num" => "654", "isd" => "290", "en" => "Saint Helena", "continent" => "Africa", "kr" => "세인트헬레나" ),
		"KN" => array( "alpha2" => "KN", "alpha3" => "KNA", "num" => "659", "isd" => "1869", "en" => "Saint Kitts and Nevis", "continent" => "North America", "kr" => "세인트키츠 네비스" ),
		"LC" => array( "alpha2" => "LC", "alpha3" => "LCA", "num" => "662", "isd" => "1758", "en" => "Saint Lucia", "continent" => "North America", "kr" => "세인트루시아" ),
		"PM" => array( "alpha2" => "PM", "alpha3" => "SPM", "num" => "666", "isd" => "508", "en" => "Saint Pierre and Miquelon", "continent" => "North America", "kr" => "생피에르 미클롱" ),
		"VC" => array( "alpha2" => "VC", "alpha3" => "VCT", "num" => "670", "isd" => "1784", "en" => "Saint Vincent and The Grenadines", "continent" => "North America", "kr" => "세인트빈센트 그레나딘" ),
		"WS" => array( "alpha2" => "WS", "alpha3" => "WSM", "num" => "882", "isd" => "685", "en" => "Samoa", "continent" => "Oceania", "kr" => "사모아" ),
		"SM" => array( "alpha2" => "SM", "alpha3" => "SMR", "num" => "674", "isd" => "378", "en" => "San Marino", "continent" => "Europe", "kr" => "산마리노" ),
		"ST" => array( "alpha2" => "ST", "alpha3" => "STP", "num" => "678", "isd" => "239", "en" => "Sao Tome and Principe", "continent" => "Africa", "kr" => "상투메 프린시페" ),
		"SA" => array( "alpha2" => "SA", "alpha3" => "SAU", "num" => "682", "isd" => "966", "en" => "Saudi Arabia", "continent" => "Asia", "kr" => "사우디아라비아" ),
		"SN" => array( "alpha2" => "SN", "alpha3" => "SEN", "num" => "686", "isd" => "221", "en" => "Senegal", "continent" => "Africa", "kr" => "세네갈" ),
		"RS" => array( "alpha2" => "RS", "alpha3" => "SRB", "num" => "688", "isd" => "381", "en" => "Serbia", "continent" => "Europe", "kr" => "세르비아" ),
		"SC" => array( "alpha2" => "SC", "alpha3" => "SYC", "num" => "690", "isd" => "248", "en" => "Seychelles", "continent" => "Africa", "kr" => "세이셸" ),
		"SL" => array( "alpha2" => "SL", "alpha3" => "SLE", "num" => "694", "isd" => "232", "en" => "Sierra Leone", "continent" => "Africa", "kr" => "시에라리온" ),
		"SG" => array( "alpha2" => "SG", "alpha3" => "SGP", "num" => "702", "isd" => "65", "en" => "Singapore", "continent" => "Asia", "kr" => "싱가포르" ),
		"SK" => array( "alpha2" => "SK", "alpha3" => "SVK", "num" => "703", "isd" => "421", "en" => "Slovakia", "continent" => "Europe", "kr" => "슬로바키아" ),
		"SI" => array( "alpha2" => "SI", "alpha3" => "SVN", "num" => "705", "isd" => "386", "en" => "Slovenia", "continent" => "Europe", "kr" => "슬로베니아" ),
		"SB" => array( "alpha2" => "SB", "alpha3" => "SLB", "num" => "090", "isd" => "677", "en" => "Solomon Islands", "continent" => "Oceania", "kr" => "솔로몬 제도" ),
		"SO" => array( "alpha2" => "SO", "alpha3" => "SOM", "num" => "706", "isd" => "252", "en" => "Somalia", "continent" => "Africa", "kr" => "소말리아" ),
		"ZA" => array( "alpha2" => "ZA", "alpha3" => "ZAF", "num" => "729", "isd" => "27", "en" => "South Africa", "continent" => "Africa", "kr" => "수단" ),
		"SS" => array( "alpha2" => "SS", "alpha3" => "SSD", "num" => "710", "isd" => "211", "en" => "South Sudan", "continent" => "Africa", "kr" => "남아프리카 공화국" ),
		"GS" => array( "alpha2" => "GS", "alpha3" => "SGS", "num" => "239", "isd" => "500", "en" => "South Georgia and The South Sandwich Islands", "continent" => "Antarctica", "kr" => "사우스조지아 사우스샌드위치 제도" ),
		"ES" => array( "alpha2" => "ES", "alpha3" => "ESP", "num" => "724", "isd" => "34", "en" => "Spain", "continent" => "Europe", "kr" => "스페인" ),
		"LK" => array( "alpha2" => "LK", "alpha3" => "LKA", "num" => "144", "isd" => "94", "en" => "Sri Lanka", "continent" => "Asia", "kr" => "스리랑카" ),
		"SD" => array( "alpha2" => "SD", "alpha3" => "SDN", "num" => "729", "isd" => "249", "en" => "Sudan", "continent" => "Africa", "kr" => "수단" ),
		"SR" => array( "alpha2" => "SR", "alpha3" => "SUR", "num" => "740", "isd" => "597", "en" => "Surien", "continent" => "South America", "kr" => "수리남" ),
		"SJ" => array( "alpha2" => "SJ", "alpha3" => "SJM", "num" => "744", "isd" => "47", "en" => "Svalbard and Jan Mayen", "continent" => "Europe", "kr" => "스발바르 얀마옌 제도" ),
		"SZ" => array( "alpha2" => "SZ", "alpha3" => "SWZ", "num" => "748", "isd" => "268", "en" => "Swaziland", "continent" => "Africa", "kr" => "스와질란드" ),
		"SE" => array( "alpha2" => "SE", "alpha3" => "SWE", "num" => "752", "isd" => "46", "en" => "Sweden", "continent" => "Europe", "kr" => "스웨덴" ),
		"CH" => array( "alpha2" => "CH", "alpha3" => "CHE", "num" => "756", "isd" => "41", "en" => "Switzerland", "continent" => "Europe", "kr" => "스위스" ),
		"SY" => array( "alpha2" => "SY", "alpha3" => "SYR", "num" => "760", "isd" => "963", "en" => "Syrian Arab Republic", "continent" => "Asia", "kr" => "시리아" ),
		"TW" => array( "alpha2" => "TW", "alpha3" => "TWN", "num" => "158", "isd" => "886", "en" => "Taiwan, Province of China", "continent" => "Asia", "kr" => "중화민국" ),
		"TJ" => array( "alpha2" => "TJ", "alpha3" => "TJK", "num" => "762", "isd" => "992", "en" => "Tajikistan", "continent" => "Asia", "kr" => "타지키스탄" ),
		"TZ" => array( "alpha2" => "TZ", "alpha3" => "TZA", "num" => "834", "isd" => "255", "en" => "Tanzania, United Republic of", "continent" => "Africa", "kr" => "탄자니아" ),
		"TH" => array( "alpha2" => "TH", "alpha3" => "THA", "num" => "764", "isd" => "66", "en" => "Thailand", "continent" => "Asia", "kr" => "타이" ),
		"TL" => array( "alpha2" => "TL", "alpha3" => "TLS", "num" => "626", "isd" => "670", "en" => "Timor-leste", "continent" => "Asia", "kr" => "동티모르" ),
		"TG" => array( "alpha2" => "TG", "alpha3" => "TGO", "num" => "768", "isd" => "228", "en" => "Togo", "continent" => "Africa", "kr" => "토고" ),
		"TK" => array( "alpha2" => "TK", "alpha3" => "TKL", "num" => "772", "isd" => "690", "en" => "Tokelau", "continent" => "Oceania", "kr" => "토켈라우" ),
		"TO" => array( "alpha2" => "TO", "alpha3" => "TON", "num" => "776", "isd" => "676", "en" => "Tonga", "continent" => "Oceania", "kr" => "통가" ),
		"TT" => array( "alpha2" => "TT", "alpha3" => "TTO", "num" => "780", "isd" => "1868", "en" => "Trinidad and Tobago", "continent" => "North America", "kr" => "트리니다드 토바고" ),
		"TN" => array( "alpha2" => "TN", "alpha3" => "TUN", "num" => "788", "isd" => "216", "en" => "Tunisia", "continent" => "Africa", "kr" => "튀니지" ),
		"TR" => array( "alpha2" => "TR", "alpha3" => "TUR", "num" => "792", "isd" => "90", "en" => "Turkey", "continent" => "Asia", "kr" => "터키" ),
		"TM" => array( "alpha2" => "TM", "alpha3" => "TKM", "num" => "795", "isd" => "993", "en" => "Turkmenistan", "continent" => "Asia", "kr" => "투르크메니스탄" ),
		"TC" => array( "alpha2" => "TC", "alpha3" => "TCA", "num" => "796", "isd" => "1649", "en" => "Turks and Caicos Islands", "continent" => "North America", "kr" => "터크스 케이커스 제도" ),
		"TV" => array( "alpha2" => "TV", "alpha3" => "TUV", "num" => "798", "isd" => "688", "en" => "Tuvalu", "continent" => "Oceania", "kr" => "투발루" ),
		"UG" => array( "alpha2" => "UG", "alpha3" => "UGA", "num" => "800", "isd" => "256", "en" => "Uganda", "continent" => "Africa", "kr" => "우간다" ),
		"UA" => array( "alpha2" => "UA", "alpha3" => "UKR", "num" => "804", "isd" => "380", "en" => "Ukraine", "continent" => "Europe", "kr" => "우크라이나" ),
		"AE" => array( "alpha2" => "AE", "alpha3" => "ARE", "num" => "784", "isd" => "971", "en" => "United Arab Emirates", "continent" => "Asia", "kr" => "아랍에미리트" ),
		"GB" => array( "alpha2" => "GB", "alpha3" => "GBR", "num" => "826", "isd" => "44", "en" => "United Kingdom", "continent" => "Europe", "kr" => "영국" ),
		"US" => array( "alpha2" => "US", "alpha3" => "USA", "num" => "840", "isd" => "1", "en" => "United States", "continent" => "North America", "kr" => "미국" ),
		"UM" => array( "alpha2" => "UM", "alpha3" => "UMI", "num" => "581", "isd" => "1", "en" => "United States Minor Outlying Islands", "continent" => "Oceania", "kr" => "미국령 군소 제도" ),
		"UY" => array( "alpha2" => "UY", "alpha3" => "URY", "num" => "858", "isd" => "598", "en" => "Uruguay", "continent" => "South America", "kr" => "우루과이" ),
		"UZ" => array( "alpha2" => "UZ", "alpha3" => "UZB", "num" => "860", "isd" => "998", "en" => "Uzbekistan", "continent" => "Asia", "kr" => "우즈베키스탄" ),
		"VU" => array( "alpha2" => "VU", "alpha3" => "VUT", "num" => "548", "isd" => "678", "en" => "Vanuatu", "continent" => "Oceania", "kr" => "바누아투" ),
		"VE" => array( "alpha2" => "VE", "alpha3" => "VEN", "num" => "862", "isd" => "58", "en" => "Venezuela", "continent" => "South America", "kr" => "베네수엘라" ),
		"VN" => array( "alpha2" => "VN", "alpha3" => "VNM", "num" => "704", "isd" => "84", "en" => "Vietnam", "continent" => "Asia", "kr" => "베트남" ),
		"VG" => array( "alpha2" => "VG", "alpha3" => "VGB", "num" => "092", "isd" => "1284", "en" => "Virgin Islands, British", "continent" => "North America", "kr" => "영국령 버진아일랜드" ),
		"VI" => array( "alpha2" => "VI", "alpha3" => "VIR", "num" => "850", "isd" => "1430", "en" => "Virgin Islands, U.S.", "continent" => "North America", "kr" => "미국령 버진아일랜드" ),
		"WF" => array( "alpha2" => "WF", "alpha3" => "WLF", "num" => "876", "isd" => "681", "en" => "Wallis and Futuna", "continent" => "Oceania", "kr" => "왈리스 퓌튀나" ),
		"EH" => array( "alpha2" => "EH", "alpha3" => "ESH", "num" => "732", "isd" => "212", "en" => "Western Sahara", "continent" => "Africa", "kr" => "서사하라" ),
		"YE" => array( "alpha2" => "YE", "alpha3" => "YEM", "num" => "887", "isd" => "967", "en" => "Yemen", "continent" => "Asia", "kr" => "예멘" ),
		"ZM" => array( "alpha2" => "ZM", "alpha3" => "ZMB", "num" => "894", "isd" => "260", "en" => "Zambia", "continent" => "Africa", "kr" => "잠비아" ),
		"ZW" => array( "alpha2" => "ZW", "alpha3" => "ZWE", "num" => "716", "isd" => "263", "en" => "Zimbabwe", "continent" => "Africa", "kr" => "짐바브웨" )
	);

    /*
     * function get()
     * @param $key - key field for the array of countries, set it to null if you want array without named indices
     * @param $requestedField - name of the field to be fetched in value part of array
     * @returns array contained key=>value pairs of the requested key and field
     *
     */
    public static function get( $keyField = 'alpha2', $requestedField = 'en' ){
        $supportedFields = array( 'alpha2', 'alpha3', 'num', 'isd', 'en', 'continent' );
        //check if field to be used as array key is passed
        if( !in_array( $keyField, $supportedFields ) ){
            $keyField = null;
        }
        //check if the $requestedField is supported or not
        if( !in_array( $requestedField, $supportedFields ) ){
            $requestedField = 'en'; //return country name if invalid/unsupported field name is request
        }
        $result = array();
        //copy each requested field from the countries array
        foreach( self::$countries as $k => $country ){
            if( $keyField ){
                $result[ $country[ $keyField ] ] = $country[ $requestedField ];
            }else{
                $result[] = $country[ $requestedField ];
            }
        }
        return $result;
    }
    /*
     * function get2d() returns 2d array of countries
     * @param $key - key field for the array of countries, set it to null if you want array without named indices
     * @param $requestedFields - array of name of the fields to be fetched in value part of array
     * @returns array contained key=>value pairs of the requested key and field
     *
     */
    public static function get2d( $keyField = 'alpha2', $requestedFields = array( 'alpha2', 'alpha3', 'num', 'isd', 'en', 'continent' ) ){
        $supportedFields = array( 'alpha2', 'alpha3', 'num', 'isd', 'en', 'continent' );
        //check if field to be used as array key is passed
        if( !in_array( $keyField, $supportedFields ) ){
            $keyField = null;
        }
        //check if the $fields is an array or not
        if( is_array( $requestedFields ) ){
            //check if each field requested is supported or not, else unset it
            foreach( $requestedFields as $index => $field ){
                if( !in_array( $field, $supportedFields ) ){
                    unset( $requestedFields[$index] );
                }
            }
        }else{
            $requestedFields = array();
        }
        $result = array();
        //copy each requested field from the countries array
        foreach( self::$countries as $k => $country ){
            $tmp = array( );
            foreach( $requestedFields as $field ){
                $tmp[ $field ] = $country[ $field ];
            }
            if( $keyField ){
                $result[ $country[ $keyField ] ] = $tmp;
            }else{
                $result[] = $tmp;
            }
        }
        return $result;
    }

    public static function getCountry( $name, $keyField = 'alpha2' ){
	    foreach( self::$countries as $k => $country ){
            if ( $k == strtoupper( $name ) ) {
	            return $country;
	            break;
            }
        }
    }
}