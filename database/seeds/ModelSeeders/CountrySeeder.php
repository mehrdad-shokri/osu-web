<?php

use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            DB::table('osu_countries')->delete();

            $countriesWithFakeData = array_map(function ($country) {
                return [
                    'acronym' => $country['acronym'],
                    'name' => $country['name'],
                    'display' => $country['display'],
                    'rankedscore' => rand(5000000, 500000000) * 10000,
                    'playcount' => rand(10000000, 200000000),
                    'usercount' => rand(10000, 600000),
                    'pp' => rand(1000000, 45000000),
                    'shipping_rate' => rand(0, 15) / 10,
                ];
            }, $this->getCountryData());

            DB::table('osu_countries')->insert($countriesWithFakeData);
        } catch (\Illuminate\Database\QueryException $e) {
            echo $e->getMessage()."\r\n";
        } catch (Exception $ex) {
            echo $ex->getMessage()."\r\n";
        }
    }

    private function getCountryData()
    {
        return [
            ['acronym' => 'A1', 'name' => 'Anonymous Proxy', 'display' => 0],
            ['acronym' => 'A2', 'name' => 'Satellite Provider', 'display' => 0],
            ['acronym' => 'AD', 'name' => 'Andorra', 'display' => 0],
            ['acronym' => 'AE', 'name' => 'United Arab Emirates', 'display' => 1],
            ['acronym' => 'AF', 'name' => 'Afghanistan', 'display' => 0],
            ['acronym' => 'AG', 'name' => 'Antigua and Barbuda', 'display' => 0],
            ['acronym' => 'AI', 'name' => 'Anguilla', 'display' => 0],
            ['acronym' => 'AL', 'name' => 'Albania', 'display' => 0],
            ['acronym' => 'AM', 'name' => 'Armenia', 'display' => 0],
            ['acronym' => 'AN', 'name' => 'Netherlands Antilles', 'display' => 0],
            ['acronym' => 'AO', 'name' => 'Angola', 'display' => 0],
            ['acronym' => 'AP', 'name' => 'Asia/Pacific Region', 'display' => 0],
            ['acronym' => 'AQ', 'name' => 'Antarctica', 'display' => 0],
            ['acronym' => 'AR', 'name' => 'Argentina', 'display' => 1],
            ['acronym' => 'AS', 'name' => 'American Samoa', 'display' => 0],
            ['acronym' => 'AT', 'name' => 'Austria', 'display' => 1],
            ['acronym' => 'AU', 'name' => 'Australia', 'display' => 2],
            ['acronym' => 'AW', 'name' => 'Aruba', 'display' => 0],
            ['acronym' => 'AX', 'name' => 'Aland Islands', 'display' => 0],
            ['acronym' => 'AZ', 'name' => 'Azerbaijan', 'display' => 1],
            ['acronym' => 'BA', 'name' => 'Bosnia and Herzegovina', 'display' => 0],
            ['acronym' => 'BB', 'name' => 'Barbados', 'display' => 1],
            ['acronym' => 'BD', 'name' => 'Bangladesh', 'display' => 1],
            ['acronym' => 'BE', 'name' => 'Belgium', 'display' => 1],
            ['acronym' => 'BF', 'name' => 'Burkina Faso', 'display' => 0],
            ['acronym' => 'BG', 'name' => 'Bulgaria', 'display' => 1],
            ['acronym' => 'BH', 'name' => 'Bahrain', 'display' => 1],
            ['acronym' => 'BI', 'name' => 'Burundi', 'display' => 0],
            ['acronym' => 'BJ', 'name' => 'Benin', 'display' => 0],
            ['acronym' => 'BL', 'name' => 'Saint Barthelemy', 'display' => 0],
            ['acronym' => 'BM', 'name' => 'Bermuda', 'display' => 0],
            ['acronym' => 'BN', 'name' => 'Brunei', 'display' => 1],
            ['acronym' => 'BO', 'name' => 'Bolivia', 'display' => 0],
            ['acronym' => 'BR', 'name' => 'Brazil', 'display' => 1],
            ['acronym' => 'BS', 'name' => 'Bahamas', 'display' => 0],
            ['acronym' => 'BT', 'name' => 'Bhutan', 'display' => 1],
            ['acronym' => 'BV', 'name' => 'Bouvet Island', 'display' => 0],
            ['acronym' => 'BW', 'name' => 'Botswana', 'display' => 1],
            ['acronym' => 'BY', 'name' => 'Belarus', 'display' => 1],
            ['acronym' => 'BZ', 'name' => 'Belize', 'display' => 0],
            ['acronym' => 'CA', 'name' => 'Canada', 'display' => 1],
            ['acronym' => 'CC', 'name' => 'Cocos (Keeling) Islands', 'display' => 0],
            ['acronym' => 'CD', 'name' => 'Congo, The Democratic Republic of the', 'display' => 0],
            ['acronym' => 'CF', 'name' => 'Central African Republic', 'display' => 0],
            ['acronym' => 'CG', 'name' => 'Congo', 'display' => 0],
            ['acronym' => 'CH', 'name' => 'Switzerland', 'display' => 1],
            ['acronym' => 'CI', 'name' => 'Cote D\'Ivoire', 'display' => 1],
            ['acronym' => 'CK', 'name' => 'Cook Islands', 'display' => 0],
            ['acronym' => 'CL', 'name' => 'Chile', 'display' => 1],
            ['acronym' => 'CM', 'name' => 'Cameroon', 'display' => 0],
            ['acronym' => 'CN', 'name' => 'China', 'display' => 1],
            ['acronym' => 'CO', 'name' => 'Colombia', 'display' => 1],
            ['acronym' => 'CR', 'name' => 'Costa Rica', 'display' => 1],
            ['acronym' => 'CU', 'name' => 'Cuba', 'display' => 1],
            ['acronym' => 'CV', 'name' => 'Cabo Verde', 'display' => 0],
            ['acronym' => 'CX', 'name' => 'Christmas Island', 'display' => 0],
            ['acronym' => 'CY', 'name' => 'Cyprus', 'display' => 1],
            ['acronym' => 'CZ', 'name' => 'Czech Republic', 'display' => 1],
            ['acronym' => 'DE', 'name' => 'Germany', 'display' => 2],
            ['acronym' => 'DJ', 'name' => 'Djibouti', 'display' => 1],
            ['acronym' => 'DK', 'name' => 'Denmark', 'display' => 1],
            ['acronym' => 'DM', 'name' => 'Dominica', 'display' => 0],
            ['acronym' => 'DO', 'name' => 'Dominican Republic', 'display' => 0],
            ['acronym' => 'DZ', 'name' => 'Algeria', 'display' => 1],
            ['acronym' => 'EC', 'name' => 'Ecuador', 'display' => 1],
            ['acronym' => 'EE', 'name' => 'Estonia', 'display' => 1],
            ['acronym' => 'EG', 'name' => 'Egypt', 'display' => 1],
            ['acronym' => 'EH', 'name' => 'Western Sahara', 'display' => 0],
            ['acronym' => 'ER', 'name' => 'Eritrea', 'display' => 0],
            ['acronym' => 'ES', 'name' => 'Spain', 'display' => 1],
            ['acronym' => 'ET', 'name' => 'Ethiopia', 'display' => 1],
            ['acronym' => 'EU', 'name' => 'Europe', 'display' => 0],
            ['acronym' => 'FI', 'name' => 'Finland', 'display' => 1],
            ['acronym' => 'FJ', 'name' => 'Fiji', 'display' => 1],
            ['acronym' => 'FK', 'name' => 'Falkland Islands (Malvinas)', 'display' => 0],
            ['acronym' => 'FM', 'name' => 'Micronesia, Federated States of', 'display' => 0],
            ['acronym' => 'FO', 'name' => 'Faroe Islands', 'display' => 0],
            ['acronym' => 'FR', 'name' => 'France', 'display' => 2],
            ['acronym' => 'FX', 'name' => 'France, Metropolitan', 'display' => 0],
            ['acronym' => 'GA', 'name' => 'Gabon', 'display' => 1],
            ['acronym' => 'GB', 'name' => 'United Kingdom', 'display' => 2],
            ['acronym' => 'GD', 'name' => 'Grenada', 'display' => 0],
            ['acronym' => 'GE', 'name' => 'Georgia', 'display' => 0],
            ['acronym' => 'GF', 'name' => 'French Guiana', 'display' => 0],
            ['acronym' => 'GG', 'name' => 'Guernsey', 'display' => 0],
            ['acronym' => 'GH', 'name' => 'Ghana', 'display' => 1],
            ['acronym' => 'GI', 'name' => 'Gibraltar', 'display' => 0],
            ['acronym' => 'GL', 'name' => 'Greenland', 'display' => 0],
            ['acronym' => 'GM', 'name' => 'Gambia', 'display' => 0],
            ['acronym' => 'GN', 'name' => 'Guinea', 'display' => 0],
            ['acronym' => 'GP', 'name' => 'Guadeloupe', 'display' => 0],
            ['acronym' => 'GQ', 'name' => 'Equatorial Guinea', 'display' => 0],
            ['acronym' => 'GR', 'name' => 'Greece', 'display' => 1],
            ['acronym' => 'GS', 'name' => 'South Georgia and the South Sandwich Islands', 'display' => 0],
            ['acronym' => 'GT', 'name' => 'Guatemala', 'display' => 0],
            ['acronym' => 'GU', 'name' => 'Guam', 'display' => 1],
            ['acronym' => 'GW', 'name' => 'Guinea-Bissau', 'display' => 0],
            ['acronym' => 'GY', 'name' => 'Guyana', 'display' => 0],
            ['acronym' => 'HK', 'name' => 'Hong Kong', 'display' => 1],
            ['acronym' => 'HM', 'name' => 'Heard Island and McDonald Islands', 'display' => 0],
            ['acronym' => 'HN', 'name' => 'Honduras', 'display' => 1],
            ['acronym' => 'HR', 'name' => 'Croatia', 'display' => 1],
            ['acronym' => 'HT', 'name' => 'Haiti', 'display' => 0],
            ['acronym' => 'HU', 'name' => 'Hungary', 'display' => 1],
            ['acronym' => 'ID', 'name' => 'Indonesia', 'display' => 2],
            ['acronym' => 'IE', 'name' => 'Ireland', 'display' => 1],
            ['acronym' => 'IL', 'name' => 'Israel', 'display' => 1],
            ['acronym' => 'IM', 'name' => 'Isle of Man', 'display' => 0],
            ['acronym' => 'IN', 'name' => 'India', 'display' => 1],
            ['acronym' => 'IO', 'name' => 'British Indian Ocean Territory', 'display' => 0],
            ['acronym' => 'IQ', 'name' => 'Iraq', 'display' => 1],
            ['acronym' => 'IR', 'name' => 'Iran, Islamic Republic of', 'display' => 1],
            ['acronym' => 'IS', 'name' => 'Iceland', 'display' => 1],
            ['acronym' => 'IT', 'name' => 'Italy', 'display' => 1],
            ['acronym' => 'JE', 'name' => 'Jersey', 'display' => 0],
            ['acronym' => 'JM', 'name' => 'Jamaica', 'display' => 1],
            ['acronym' => 'JO', 'name' => 'Jordan', 'display' => 1],
            ['acronym' => 'JP', 'name' => 'Japan', 'display' => 1],
            ['acronym' => 'KE', 'name' => 'Kenya', 'display' => 1],
            ['acronym' => 'KG', 'name' => 'Kyrgyzstan', 'display' => 0],
            ['acronym' => 'KH', 'name' => 'Cambodia', 'display' => 1],
            ['acronym' => 'KI', 'name' => 'Kiribati', 'display' => 0],
            ['acronym' => 'KM', 'name' => 'Comoros', 'display' => 0],
            ['acronym' => 'KN', 'name' => 'Saint Kitts and Nevis', 'display' => 0],
            ['acronym' => 'KP', 'name' => 'Korea, Democratic People\'s Republic of', 'display' => 0],
            ['acronym' => 'KR', 'name' => 'South Korea', 'display' => 2],
            ['acronym' => 'KW', 'name' => 'Kuwait', 'display' => 1],
            ['acronym' => 'KY', 'name' => 'Cayman Islands', 'display' => 0],
            ['acronym' => 'KZ', 'name' => 'Kazakhstan', 'display' => 0],
            ['acronym' => 'LA', 'name' => 'Lao People\'s Democratic Republic', 'display' => 0],
            ['acronym' => 'LB', 'name' => 'Lebanon', 'display' => 0],
            ['acronym' => 'LC', 'name' => 'Saint Lucia', 'display' => 0],
            ['acronym' => 'LI', 'name' => 'Liechtenstein', 'display' => 1],
            ['acronym' => 'LK', 'name' => 'Sri Lanka', 'display' => 1],
            ['acronym' => 'LR', 'name' => 'Liberia', 'display' => 0],
            ['acronym' => 'LS', 'name' => 'Lesotho', 'display' => 0],
            ['acronym' => 'LT', 'name' => 'Lithuania', 'display' => 1],
            ['acronym' => 'LU', 'name' => 'Luxembourg', 'display' => 1],
            ['acronym' => 'LV', 'name' => 'Latvia', 'display' => 1],
            ['acronym' => 'LY', 'name' => 'Libya', 'display' => 0],
            ['acronym' => 'MA', 'name' => 'Morocco', 'display' => 1],
            ['acronym' => 'MC', 'name' => 'Monaco', 'display' => 1],
            ['acronym' => 'MD', 'name' => 'Moldova', 'display' => 0],
            ['acronym' => 'ME', 'name' => 'Montenegro', 'display' => 0],
            ['acronym' => 'MF', 'name' => 'Saint Martin', 'display' => 0],
            ['acronym' => 'MG', 'name' => 'Madagascar', 'display' => 1],
            ['acronym' => 'MH', 'name' => 'Marshall Islands', 'display' => 0],
            ['acronym' => 'MK', 'name' => 'North Macedonia', 'display' => 1],
            ['acronym' => 'ML', 'name' => 'Mali', 'display' => 0],
            ['acronym' => 'MM', 'name' => 'Myanmar', 'display' => 1],
            ['acronym' => 'MN', 'name' => 'Mongolia', 'display' => 1],
            ['acronym' => 'MO', 'name' => 'Macau', 'display' => 0],
            ['acronym' => 'MP', 'name' => 'Northern Mariana Islands', 'display' => 0],
            ['acronym' => 'MQ', 'name' => 'Martinique', 'display' => 0],
            ['acronym' => 'MR', 'name' => 'Mauritania', 'display' => 0],
            ['acronym' => 'MS', 'name' => 'Montserrat', 'display' => 0],
            ['acronym' => 'MT', 'name' => 'Malta', 'display' => 1],
            ['acronym' => 'MU', 'name' => 'Mauritius', 'display' => 1],
            ['acronym' => 'MV', 'name' => 'Maldives', 'display' => 1],
            ['acronym' => 'MW', 'name' => 'Malawi', 'display' => 0],
            ['acronym' => 'MX', 'name' => 'Mexico', 'display' => 1],
            ['acronym' => 'MY', 'name' => 'Malaysia', 'display' => 2],
            ['acronym' => 'MZ', 'name' => 'Mozambique', 'display' => 0],
            ['acronym' => 'NA', 'name' => 'Namibia', 'display' => 0],
            ['acronym' => 'NC', 'name' => 'New Caledonia', 'display' => 1],
            ['acronym' => 'NE', 'name' => 'Niger', 'display' => 0],
            ['acronym' => 'NF', 'name' => 'Norfolk Island', 'display' => 0],
            ['acronym' => 'NG', 'name' => 'Nigeria', 'display' => 1],
            ['acronym' => 'NI', 'name' => 'Nicaragua', 'display' => 0],
            ['acronym' => 'NL', 'name' => 'Netherlands', 'display' => 1],
            ['acronym' => 'NO', 'name' => 'Norway', 'display' => 1],
            ['acronym' => 'NP', 'name' => 'Nepal', 'display' => 1],
            ['acronym' => 'NR', 'name' => 'Nauru', 'display' => 0],
            ['acronym' => 'NU', 'name' => 'Niue', 'display' => 0],
            ['acronym' => 'NZ', 'name' => 'New Zealand', 'display' => 1],
            ['acronym' => 'O1', 'name' => 'Other', 'display' => 0],
            ['acronym' => 'OM', 'name' => 'Oman', 'display' => 1],
            ['acronym' => 'PA', 'name' => 'Panama', 'display' => 1],
            ['acronym' => 'PE', 'name' => 'Peru', 'display' => 1],
            ['acronym' => 'PF', 'name' => 'French Polynesia', 'display' => 0],
            ['acronym' => 'PG', 'name' => 'Papua New Guinea', 'display' => 1],
            ['acronym' => 'PH', 'name' => 'Philippines', 'display' => 1],
            ['acronym' => 'PK', 'name' => 'Pakistan', 'display' => 1],
            ['acronym' => 'PL', 'name' => 'Poland', 'display' => 1],
            ['acronym' => 'PM', 'name' => 'Saint Pierre and Miquelon', 'display' => 0],
            ['acronym' => 'PN', 'name' => 'Pitcairn', 'display' => 0],
            ['acronym' => 'PR', 'name' => 'Puerto Rico', 'display' => 0],
            ['acronym' => 'PS', 'name' => 'Palestinian Territory Occupied', 'display' => 0],
            ['acronym' => 'PT', 'name' => 'Portugal', 'display' => 1],
            ['acronym' => 'PW', 'name' => 'Palau', 'display' => 0],
            ['acronym' => 'PY', 'name' => 'Paraguay', 'display' => 1],
            ['acronym' => 'QA', 'name' => 'Qatar', 'display' => 1],
            ['acronym' => 'RE', 'name' => 'Reunion', 'display' => 0],
            ['acronym' => 'RO', 'name' => 'Romania', 'display' => 1],
            ['acronym' => 'RS', 'name' => 'Serbia', 'display' => 0],
            ['acronym' => 'RU', 'name' => 'Russian Federation', 'display' => 1],
            ['acronym' => 'RW', 'name' => 'Rwanda', 'display' => 0],
            ['acronym' => 'SA', 'name' => 'Saudi Arabia', 'display' => 1],
            ['acronym' => 'SB', 'name' => 'Solomon Islands', 'display' => 0],
            ['acronym' => 'SC', 'name' => 'Seychelles', 'display' => 0],
            ['acronym' => 'SD', 'name' => 'Sudan', 'display' => 1],
            ['acronym' => 'SE', 'name' => 'Sweden', 'display' => 2],
            ['acronym' => 'SG', 'name' => 'Singapore', 'display' => 2],
            ['acronym' => 'SH', 'name' => 'Saint Helena', 'display' => 0],
            ['acronym' => 'SI', 'name' => 'Slovenia', 'display' => 1],
            ['acronym' => 'SJ', 'name' => 'Svalbard and Jan Mayen', 'display' => 0],
            ['acronym' => 'SK', 'name' => 'Slovakia', 'display' => 1],
            ['acronym' => 'SL', 'name' => 'Sierra Leone', 'display' => 1],
            ['acronym' => 'SM', 'name' => 'San Marino', 'display' => 0],
            ['acronym' => 'SN', 'name' => 'Senegal', 'display' => 1],
            ['acronym' => 'SO', 'name' => 'Somalia', 'display' => 0],
            ['acronym' => 'SR', 'name' => 'Suriname', 'display' => 0],
            ['acronym' => 'ST', 'name' => 'Sao Tome and Principe', 'display' => 0],
            ['acronym' => 'SV', 'name' => 'El Salvador', 'display' => 1],
            ['acronym' => 'SY', 'name' => 'Syrian Arab Republic', 'display' => 1],
            ['acronym' => 'SZ', 'name' => 'Eswatini', 'display' => 0],
            ['acronym' => 'TC', 'name' => 'Turks and Caicos Islands', 'display' => 0],
            ['acronym' => 'TD', 'name' => 'Chad', 'display' => 0],
            ['acronym' => 'TF', 'name' => 'French Southern Territories', 'display' => 0],
            ['acronym' => 'TG', 'name' => 'Togo', 'display' => 1],
            ['acronym' => 'TH', 'name' => 'Thailand', 'display' => 1],
            ['acronym' => 'TJ', 'name' => 'Tajikistan', 'display' => 0],
            ['acronym' => 'TK', 'name' => 'Tokelau', 'display' => 0],
            ['acronym' => 'TL', 'name' => 'Timor-Leste', 'display' => 0],
            ['acronym' => 'TM', 'name' => 'Turkmenistan', 'display' => 0],
            ['acronym' => 'TN', 'name' => 'Tunisia', 'display' => 1],
            ['acronym' => 'TO', 'name' => 'Tonga', 'display' => 0],
            ['acronym' => 'TR', 'name' => 'Turkey', 'display' => 1],
            ['acronym' => 'TT', 'name' => 'Trinidad and Tobago', 'display' => 1],
            ['acronym' => 'TV', 'name' => 'Tuvalu', 'display' => 0],
            ['acronym' => 'TW', 'name' => 'Taiwan', 'display' => 1],
            ['acronym' => 'TZ', 'name' => 'Tanzania, United Republic of', 'display' => 1],
            ['acronym' => 'UA', 'name' => 'Ukraine', 'display' => 1],
            ['acronym' => 'UG', 'name' => 'Uganda', 'display' => 0],
            ['acronym' => 'UM', 'name' => 'United States Minor Outlying Islands', 'display' => 0],
            ['acronym' => 'US', 'name' => 'United States', 'display' => 2],
            ['acronym' => 'UY', 'name' => 'Uruguay', 'display' => 1],
            ['acronym' => 'UZ', 'name' => 'Uzbekistan', 'display' => 0],
            ['acronym' => 'VA', 'name' => 'Holy See (Vatican City State)', 'display' => 0],
            ['acronym' => 'VC', 'name' => 'Saint Vincent and the Grenadines', 'display' => 0],
            ['acronym' => 'VE', 'name' => 'Venezuela', 'display' => 1],
            ['acronym' => 'VG', 'name' => 'Virgin Islands, British', 'display' => 0],
            ['acronym' => 'VI', 'name' => 'Virgin Islands, U.S.', 'display' => 0],
            ['acronym' => 'VN', 'name' => 'Vietnam', 'display' => 1],
            ['acronym' => 'VU', 'name' => 'Vanuatu', 'display' => 0],
            ['acronym' => 'WF', 'name' => 'Wallis and Futuna', 'display' => 0],
            ['acronym' => 'WS', 'name' => 'Samoa', 'display' => 0],
            ['acronym' => 'XX', 'name' => '', 'display' => 0],
            ['acronym' => 'YE', 'name' => 'Yemen', 'display' => 0],
            ['acronym' => 'YT', 'name' => 'Mayotte', 'display' => 0],
            ['acronym' => 'ZA', 'name' => 'South Africa', 'display' => 1],
            ['acronym' => 'ZM', 'name' => 'Zambia', 'display' => 0],
            ['acronym' => 'ZW', 'name' => 'Zimbabwe', 'display' => 1],
        ];
    }
}
