<?php
use App\Countries;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CountrySeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{

		Countries::create([ 'code'=> 'US', 'name' => 'United States' ]);
		Countries::create([ 'code'=> 'CA', 'name' => 'Canada' ]);
		Countries::create([ 'code'=> 'AF', 'name' => 'Afghanistan' ]);
		Countries::create([ 'code'=> 'AL', 'name' => 'Albania' ]);
		Countries::create([ 'code'=> 'DZ', 'name' => 'Algeria' ]);
		Countries::create([ 'code'=> 'DS', 'name' => 'American Samoa' ]);
		Countries::create([ 'code'=> 'AD', 'name' => 'Andorra' ]);
		Countries::create([ 'code'=> 'AO', 'name' => 'Angola' ]);
		Countries::create([ 'code'=> 'AI', 'name' => 'Anguilla' ]);
		Countries::create([ 'code'=> 'AQ', 'name' => 'Antarctica' ]);
		Countries::create([ 'code'=> 'AG', 'name' => 'Antigua and/or Barbuda' ]);
		Countries::create([ 'code'=> 'AR', 'name' => 'Argentina' ]);
		Countries::create([ 'code'=> 'AM', 'name' => 'Armenia' ]);
		Countries::create([ 'code'=> 'AW', 'name' => 'Aruba' ]);
		Countries::create([ 'code'=> 'AU', 'name' => 'Australia' ]);
		Countries::create([ 'code'=> 'AT', 'name' => 'Austria' ]);
		Countries::create([ 'code'=> 'AZ', 'name' => 'Azerbaijan' ]);
		Countries::create([ 'code'=> 'BS', 'name' => 'Bahamas' ]);
		Countries::create([ 'code'=> 'BH', 'name' => 'Bahrain' ]);
		Countries::create([ 'code'=> 'BD', 'name' => 'Bangladesh' ]);
		Countries::create([ 'code'=> 'BB', 'name' => 'Barbados' ]);
		Countries::create([ 'code'=> 'BY', 'name' => 'Belarus' ]);
		Countries::create([ 'code'=> 'BE', 'name' => 'Belgium' ]);
		Countries::create([ 'code'=> 'BZ', 'name' => 'Belize' ]);
		Countries::create([ 'code'=> 'BJ', 'name' => 'Benin' ]);
		Countries::create([ 'code'=> 'BM', 'name' => 'Bermuda' ]);
		Countries::create([ 'code'=> 'BT', 'name' => 'Bhutan' ]);
		Countries::create([ 'code'=> 'BO', 'name' => 'Bolivia' ]);
		Countries::create([ 'code'=> 'BA', 'name' => 'Bosnia and Herzegovina' ]);
		Countries::create([ 'code'=> 'BW', 'name' => 'Botswana' ]);
		Countries::create([ 'code'=> 'BV', 'name' => 'Bouvet Island' ]);
		Countries::create([ 'code'=> 'BR', 'name' => 'Brazil' ]);
		Countries::create([ 'code'=> 'IO', 'name' => 'British lndian Ocean Territory' ]);
		Countries::create([ 'code'=> 'BN', 'name' => 'Brunei Darussalam' ]);
		Countries::create([ 'code'=> 'BG', 'name' => 'Bulgaria' ]);
		Countries::create([ 'code'=> 'BF', 'name' => 'Burkina Faso' ]);
		Countries::create([ 'code'=> 'BI', 'name' => 'Burundi' ]);
		Countries::create([ 'code'=> 'KH', 'name' => 'Cambodia' ]);
		Countries::create([ 'code'=> 'CM', 'name' => 'Cameroon' ]);
		Countries::create([ 'code'=> 'CV', 'name' => 'Cape Verde' ]);
		Countries::create([ 'code'=> 'KY', 'name' => 'Cayman Islands' ]);
		Countries::create([ 'code'=> 'CF', 'name' => 'Central African Republic' ]);
		Countries::create([ 'code'=> 'TD', 'name' => 'Chad' ]);
		Countries::create([ 'code'=> 'CL', 'name' => 'Chile' ]);
		Countries::create([ 'code'=> 'CN', 'name' => 'China' ]);
		Countries::create([ 'code'=> 'CX', 'name' => 'Christmas Island' ]);
		Countries::create([ 'code'=> 'CC', 'name' => 'Cocos (Keeling) Islands' ]);
		Countries::create([ 'code'=> 'CO', 'name' => 'Colombia' ]);
		Countries::create([ 'code'=> 'KM', 'name' => 'Comoros' ]);
		Countries::create([ 'code'=> 'CG', 'name' => 'Congo' ]);
		Countries::create([ 'code'=> 'CK', 'name' => 'Cook Islands' ]);
		Countries::create([ 'code'=> 'CR', 'name' => 'Costa Rica' ]);
		Countries::create([ 'code'=> 'HR', 'name' => 'Croatia (Hrvatska)' ]);
		Countries::create([ 'code'=> 'CU', 'name' => 'Cuba' ]);
		Countries::create([ 'code'=> 'CY', 'name' => 'Cyprus' ]);
		Countries::create([ 'code'=> 'CZ', 'name' => 'Czech Republic' ]);
		Countries::create([ 'code'=> 'DK', 'name' => 'Denmark' ]);
		Countries::create([ 'code'=> 'DJ', 'name' => 'Djibouti' ]);
		Countries::create([ 'code'=> 'DM', 'name' => 'Dominica' ]);
		Countries::create([ 'code'=> 'DO', 'name' => 'Dominican Republic' ]);
		Countries::create([ 'code'=> 'TP', 'name' => 'East Timor' ]);
		Countries::create([ 'code'=> 'EC', 'name' => 'Ecuador' ]);
		Countries::create([ 'code'=> 'EG', 'name' => 'Egypt' ]);
		Countries::create([ 'code'=> 'SV', 'name' => 'El Salvador' ]);
		Countries::create([ 'code'=> 'GQ', 'name' => 'Equatorial Guinea' ]);
		Countries::create([ 'code'=> 'ER', 'name' => 'Eritrea' ]);
		Countries::create([ 'code'=> 'EE', 'name' => 'Estonia' ]);
		Countries::create([ 'code'=> 'ET', 'name' => 'Ethiopia' ]);
		Countries::create([ 'code'=> 'FK', 'name' => 'Falkland Islands (Malvinas)' ]);
		Countries::create([ 'code'=> 'FO', 'name' => 'Faroe Islands' ]);
		Countries::create([ 'code'=> 'FJ', 'name' => 'Fiji' ]);
		Countries::create([ 'code'=> 'FI', 'name' => 'Finland' ]);
		Countries::create([ 'code'=> 'FR', 'name' => 'France' ]);
		Countries::create([ 'code'=> 'FX', 'name' => 'France, Metropolitan' ]);
		Countries::create([ 'code'=> 'GF', 'name' => 'French Guiana' ]);
		Countries::create([ 'code'=> 'PF', 'name' => 'French Polynesia' ]);
		Countries::create([ 'code'=> 'TF', 'name' => 'French Southern Territories' ]);
		Countries::create([ 'code'=> 'GA', 'name' => 'Gabon' ]);
		Countries::create([ 'code'=> 'GM', 'name' => 'Gambia' ]);
		Countries::create([ 'code'=> 'GE', 'name' => 'Georgia' ]);
		Countries::create([ 'code'=> 'DE', 'name' => 'Germany' ]);
		Countries::create([ 'code'=> 'GH', 'name' => 'Ghana' ]);
		Countries::create([ 'code'=> 'GI', 'name' => 'Gibraltar' ]);
		Countries::create([ 'code'=> 'GR', 'name' => 'Greece' ]);
		Countries::create([ 'code'=> 'GL', 'name' => 'Greenland' ]);
		Countries::create([ 'code'=> 'GD', 'name' => 'Grenada' ]);
		Countries::create([ 'code'=> 'GP', 'name' => 'Guadeloupe' ]);
		Countries::create([ 'code'=> 'GU', 'name' => 'Guam' ]);
		Countries::create([ 'code'=> 'GT', 'name' => 'Guatemala' ]);
		Countries::create([ 'code'=> 'GN', 'name' => 'Guinea' ]);
		Countries::create([ 'code'=> 'GW', 'name' => 'Guinea-Bissau' ]);
		Countries::create([ 'code'=> 'GY', 'name' => 'Guyana' ]);
		Countries::create([ 'code'=> 'HT', 'name' => 'Haiti' ]);
		Countries::create([ 'code'=> 'HM', 'name' => 'Heard and Mc Donald Islands' ]);
		Countries::create([ 'code'=> 'HN', 'name' => 'Honduras' ]);
		Countries::create([ 'code'=> 'HK', 'name' => 'Hong Kong' ]);
		Countries::create([ 'code'=> 'HU', 'name' => 'Hungary' ]);
		Countries::create([ 'code'=> 'IS', 'name' => 'Iceland' ]);
		Countries::create([ 'code'=> 'IN', 'name' => 'India' ]);
		Countries::create([ 'code'=> 'ID', 'name' => 'Indonesia' ]);
		Countries::create([ 'code'=> 'IR', 'name' => 'Iran (Islamic Republic of)' ]);
		Countries::create([ 'code'=> 'IQ', 'name' => 'Iraq' ]);
		Countries::create([ 'code'=> 'IE', 'name' => 'Ireland' ]);
		Countries::create([ 'code'=> 'IL', 'name' => 'Israel' ]);
		Countries::create([ 'code'=> 'IT', 'name' => 'Italy' ]);
		Countries::create([ 'code'=> 'CI', 'name' => 'Ivory Coast' ]);
		Countries::create([ 'code'=> 'JM', 'name' => 'Jamaica' ]);
		Countries::create([ 'code'=> 'JP', 'name' => 'Japan' ]);
		Countries::create([ 'code'=> 'JO', 'name' => 'Jordan' ]);
		Countries::create([ 'code'=> 'KZ', 'name' => 'Kazakhstan' ]);
		Countries::create([ 'code'=> 'KE', 'name' => 'Kenya' ]);
		Countries::create([ 'code'=> 'KI', 'name' => 'Kiribati' ]);
		Countries::create([ 'code'=> 'KP', 'name' => 'Korea, Democratic People\'s Republic of' ]);
		Countries::create([ 'code'=> 'KR', 'name' => 'Korea, Republic of' ]);
		Countries::create([ 'code'=> 'XK', 'name' => 'Kosovo' ]);
		Countries::create([ 'code'=> 'KW', 'name' => 'Kuwait' ]);
		Countries::create([ 'code'=> 'KG', 'name' => 'Kyrgyzstan' ]);
		Countries::create([ 'code'=> 'LA', 'name' => 'Lao People\'s Democratic Republic' ]);
		Countries::create([ 'code'=> 'LV', 'name' => 'Latvia' ]);
		Countries::create([ 'code'=> 'LB', 'name' => 'Lebanon' ]);
		Countries::create([ 'code'=> 'LS', 'name' => 'Lesotho' ]);
		Countries::create([ 'code'=> 'LR', 'name' => 'Liberia' ]);
		Countries::create([ 'code'=> 'LY', 'name' => 'Libyan Arab Jamahiriya' ]);
		Countries::create([ 'code'=> 'LI', 'name' => 'Liechtenstein' ]);
		Countries::create([ 'code'=> 'LT', 'name' => 'Lithuania' ]);
		Countries::create([ 'code'=> 'LU', 'name' => 'Luxembourg' ]);
		Countries::create([ 'code'=> 'MO', 'name' => 'Macau' ]);
		Countries::create([ 'code'=> 'MK', 'name' => 'Macedonia' ]);
		Countries::create([ 'code'=> 'MG', 'name' => 'Madagascar' ]);
		Countries::create([ 'code'=> 'MW', 'name' => 'Malawi' ]);
		Countries::create([ 'code'=> 'MY', 'name' => 'Malaysia' ]);
		Countries::create([ 'code'=> 'MV', 'name' => 'Maldives' ]);
		Countries::create([ 'code'=> 'ML', 'name' => 'Mali' ]);
		Countries::create([ 'code'=> 'MT', 'name' => 'Malta' ]);
		Countries::create([ 'code'=> 'MH', 'name' => 'Marshall Islands' ]);
		Countries::create([ 'code'=> 'MQ', 'name' => 'Martinique' ]);
		Countries::create([ 'code'=> 'MR', 'name' => 'Mauritania' ]);
		Countries::create([ 'code'=> 'MU', 'name' => 'Mauritius' ]);
		Countries::create([ 'code'=> 'TY', 'name' => 'Mayotte' ]);
		Countries::create([ 'code'=> 'MX', 'name' => 'Mexico' ]);
		Countries::create([ 'code'=> 'FM', 'name' => 'Micronesia, Federated States of' ]);
		Countries::create([ 'code'=> 'MD', 'name' => 'Moldova, Republic of' ]);
		Countries::create([ 'code'=> 'MC', 'name' => 'Monaco' ]);
		Countries::create([ 'code'=> 'MN', 'name' => 'Mongolia' ]);
		Countries::create([ 'code'=> 'ME', 'name' => 'Montenegro' ]);
		Countries::create([ 'code'=> 'MS', 'name' => 'Montserrat' ]);
		Countries::create([ 'code'=> 'MA', 'name' => 'Morocco' ]);
		Countries::create([ 'code'=> 'MZ', 'name' => 'Mozambique' ]);
		Countries::create([ 'code'=> 'MM', 'name' => 'Myanmar' ]);
		Countries::create([ 'code'=> 'NA', 'name' => 'Namibia' ]);
		Countries::create([ 'code'=> 'NR', 'name' => 'Nauru' ]);
		Countries::create([ 'code'=> 'NP', 'name' => 'Nepal' ]);
		Countries::create([ 'code'=> 'NL', 'name' => 'Netherlands' ]);
		Countries::create([ 'code'=> 'AN', 'name' => 'Netherlands Antilles' ]);
		Countries::create([ 'code'=> 'NC', 'name' => 'New Caledonia' ]);
		Countries::create([ 'code'=> 'NZ', 'name' => 'New Zealand' ]);
		Countries::create([ 'code'=> 'NI', 'name' => 'Nicaragua' ]);
		Countries::create([ 'code'=> 'NE', 'name' => 'Niger' ]);
		Countries::create([ 'code'=> 'NG', 'name' => 'Nigeria' ]);
		Countries::create([ 'code'=> 'NU', 'name' => 'Niue' ]);
		Countries::create([ 'code'=> 'NF', 'name' => 'Norfork Island' ]);
		Countries::create([ 'code'=> 'MP', 'name' => 'Northern Mariana Islands' ]);
		Countries::create([ 'code'=> 'NO', 'name' => 'Norway' ]);
		Countries::create([ 'code'=> 'OM', 'name' => 'Oman' ]);
		Countries::create([ 'code'=> 'PK', 'name' => 'Pakistan' ]);
		Countries::create([ 'code'=> 'PW', 'name' => 'Palau' ]);
		Countries::create([ 'code'=> 'PA', 'name' => 'Panama' ]);
		Countries::create([ 'code'=> 'PG', 'name' => 'Papua New Guinea' ]);
		Countries::create([ 'code'=> 'PY', 'name' => 'Paraguay' ]);
		Countries::create([ 'code'=> 'PE', 'name' => 'Peru' ]);
		Countries::create([ 'code'=> 'PH', 'name' => 'Philippines' ]);
		Countries::create([ 'code'=> 'PN', 'name' => 'Pitcairn' ]);
		Countries::create([ 'code'=> 'PL', 'name' => 'Poland' ]);
		Countries::create([ 'code'=> 'PT', 'name' => 'Portugal' ]);
		Countries::create([ 'code'=> 'PR', 'name' => 'Puerto Rico' ]);
		Countries::create([ 'code'=> 'QA', 'name' => 'Qatar' ]);
		Countries::create([ 'code'=> 'RE', 'name' => 'Reunion' ]);
		Countries::create([ 'code'=> 'RO', 'name' => 'Romania' ]);
		Countries::create([ 'code'=> 'RU', 'name' => 'Russian Federation' ]);
		Countries::create([ 'code'=> 'RW', 'name' => 'Rwanda' ]);
		Countries::create([ 'code'=> 'KN', 'name' => 'Saint Kitts and Nevis' ]);
		Countries::create([ 'code'=> 'LC', 'name' => 'Saint Lucia' ]);
		Countries::create([ 'code'=> 'VC', 'name' => 'Saint Vincent and the Grenadines' ]);
		Countries::create([ 'code'=> 'WS', 'name' => 'Samoa' ]);
		Countries::create([ 'code'=> 'SM', 'name' => 'San Marino' ]);
		Countries::create([ 'code'=> 'ST', 'name' => 'Sao Tome and Principe' ]);
		Countries::create([ 'code'=> 'SA', 'name' => 'Saudi Arabia' ]);
		Countries::create([ 'code'=> 'SN', 'name' => 'Senegal' ]);
		Countries::create([ 'code'=> 'RS', 'name' => 'Serbia' ]);
		Countries::create([ 'code'=> 'SC', 'name' => 'Seychelles' ]);
		Countries::create([ 'code'=> 'SL', 'name' => 'Sierra Leone' ]);
		Countries::create([ 'code'=> 'SG', 'name' => 'Singapore' ]);
		Countries::create([ 'code'=> 'SK', 'name' => 'Slovakia' ]);
		Countries::create([ 'code'=> 'SI', 'name' => 'Slovenia' ]);
		Countries::create([ 'code'=> 'SB', 'name' => 'Solomon Islands' ]);
		Countries::create([ 'code'=> 'SO', 'name' => 'Somalia' ]);
		Countries::create([ 'code'=> 'ZA', 'name' => 'South Africa' ]);
		Countries::create([ 'code'=> 'GS', 'name' => 'South Georgia South Sandwich Islands' ]);
		Countries::create([ 'code'=> 'ES', 'name' => 'Spain' ]);
		Countries::create([ 'code'=> 'LK', 'name' => 'Sri Lanka' ]);
		Countries::create([ 'code'=> 'SH', 'name' => 'St. Helena' ]);
		Countries::create([ 'code'=> 'PM', 'name' => 'St. Pierre and Miquelon' ]);
		Countries::create([ 'code'=> 'SD', 'name' => 'Sudan' ]);
		Countries::create([ 'code'=> 'SR', 'name' => 'Suriname' ]);
		Countries::create([ 'code'=> 'SJ', 'name' => 'Svalbarn and Jan Mayen Islands' ]);
		Countries::create([ 'code'=> 'SZ', 'name' => 'Swaziland' ]);
		Countries::create([ 'code'=> 'SE', 'name' => 'Sweden' ]);
		Countries::create([ 'code'=> 'CH', 'name' => 'Switzerland' ]);
		Countries::create([ 'code'=> 'SY', 'name' => 'Syrian Arab Republic' ]);
		Countries::create([ 'code'=> 'TW', 'name' => 'Taiwan' ]);
		Countries::create([ 'code'=> 'TJ', 'name' => 'Tajikistan' ]);
		Countries::create([ 'code'=> 'TZ', 'name' => 'Tanzania, United Republic of' ]);
		Countries::create([ 'code'=> 'TH', 'name' => 'Thailand' ]);
		Countries::create([ 'code'=> 'TG', 'name' => 'Togo' ]);
		Countries::create([ 'code'=> 'TK', 'name' => 'Tokelau' ]);
		Countries::create([ 'code'=> 'TO', 'name' => 'Tonga' ]);
		Countries::create([ 'code'=> 'TT', 'name' => 'Trinidad and Tobago' ]);
		Countries::create([ 'code'=> 'TN', 'name' => 'Tunisia' ]);
		Countries::create([ 'code'=> 'TR', 'name' => 'Turkey' ]);
		Countries::create([ 'code'=> 'TM', 'name' => 'Turkmenistan' ]);
		Countries::create([ 'code'=> 'TC', 'name' => 'Turks and Caicos Islands' ]);
		Countries::create([ 'code'=> 'TV', 'name' => 'Tuvalu' ]);
		Countries::create([ 'code'=> 'UG', 'name' => 'Uganda' ]);
		Countries::create([ 'code'=> 'UA', 'name' => 'Ukraine' ]);
		Countries::create([ 'code'=> 'AE', 'name' => 'United Arab Emirates' ]);
		Countries::create([ 'code'=> 'GB', 'name' => 'United Kingdom' ]);
		Countries::create([ 'code'=> 'UM', 'name' => 'United States minor outlying islands' ]);
		Countries::create([ 'code'=> 'UY', 'name' => 'Uruguay' ]);
		Countries::create([ 'code'=> 'UZ', 'name' => 'Uzbekistan' ]);
		Countries::create([ 'code'=> 'VU', 'name' => 'Vanuatu' ]);
		Countries::create([ 'code'=> 'VA', 'name' => 'Vatican City State' ]);
		Countries::create([ 'code'=> 'VE', 'name' => 'Venezuela' ]);
		Countries::create([ 'code'=> 'VN', 'name' => 'Vietnam' ]);
		Countries::create([ 'code'=> 'VG', 'name' => 'Virgin Islands (British)' ]);
		Countries::create([ 'code'=> 'VI', 'name' => 'Virgin Islands (U.S.)' ]);
		Countries::create([ 'code'=> 'WF', 'name' => 'Wallis and Futuna Islands' ]);
		Countries::create([ 'code'=> 'EH', 'name' => 'Western Sahara' ]);
		Countries::create([ 'code'=> 'YE', 'name' => 'Yemen' ]);
		Countries::create([ 'code'=> 'YU', 'name' => 'Yugoslavia' ]);
		Countries::create([ 'code'=> 'ZR', 'name' => 'Zaire' ]);
		Countries::create([ 'code'=> 'ZM', 'name' => 'Zambia' ]);
		Countries::create([ 'code'=> 'ZW', 'name' => 'Zimbabwe' ]);
	}

}