<!DOCTYPE html>
<html>

<head>
</head>

<body>
    <textarea id="input_area" name="message" rows="10" cols="100">ลองทำการแปลภาษา</textarea>
    <br />
    <br />

    <button onclick="submit_thai2en()">แปลภาษาจากไทยเป็นอังกฤษ</button>
    &nbsp;&nbsp;&nbsp;
    <button onclick="submit_en2thai()">แปลภาษาจากอังกฤษเป็นไทย</button>

    <br>
    <br />
    <textarea id="translated_area" name="message" rows="10" cols="100"></textarea>

    <script>
    function translate(sentences, targetDiv, from_lang = 'th', to_lang = 'en') {
        /*if (language == 'english') {
        	endPoint = "https://translate.googleapis.com/translate_a/single?client=gtx&sl=ar&tl=en&dt=t&ie=UTF-8&oe=UTF-8&q="
        } */

        sentences = sentences.replace(/\n/g, '<br>')
        let endPoint =
            `https://translate.googleapis.com/translate_a/single?client=gtx&sl=${from_lang}&tl=${to_lang}&dt=t&ie=UTF-8&oe=UTF-8&q=${encodeURIComponent(sentences)}`;

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var jsonText = JSON.parse(this.responseText);
                text = jsonText[0][0][0]
                text = text.replace(/<br>/g, '\n')
                targetDiv.innerHTML = "&nbsp;" + text;
            }
        };
        xhttp.open("GET", endPoint, true);
        xhttp.send();
    }

    function submit_thai2en() {
        translate(input_area.value, translated_area)
    }

    function submit_en2thai() {
        translate(input_area.value, translated_area, from_lang = 'en', to_lang = 'th')
    }

    // The languages that Google Translate supports  ISO 639-1 codes
    // See more https://en.wikipedia.org/wiki/List_of_ISO_639-1_codes
    /*
    var langs = {
        //'auto': 'Automatic',
        'af': 'Afrikaans',
        'sq': 'Albanian',
        'am': 'Amharic',
        'ar': 'Arabic',
        'hy': 'Armenian',
        'az': 'Azerbaijani',
        'eu': 'Basque',
        'be': 'Belarusian',
        'bn': 'Bengali',
        'bs': 'Bosnian',
        'bg': 'Bulgarian',
        'ca': 'Catalan',
        'ceb': 'Cebuano',
        'ny': 'Chichewa',
        'zh-cn': 'Chinese Simplified',
        'zh-tw': 'Chinese Traditional',
        'co': 'Corsican',
        'hr': 'Croatian',
        'cs': 'Czech',
        'da': 'Danish',
        'nl': 'Dutch',
        'en': 'English',
        'eo': 'Esperanto',
        'et': 'Estonian',
        'tl': 'Filipino',
        'fi': 'Finnish',
        'fr': 'French',
        'fy': 'Frisian',
        'gl': 'Galician',
        'ka': 'Georgian',
        'de': 'German',
        'el': 'Greek',
        'gu': 'Gujarati',
        'ht': 'Haitian Creole',
        'ha': 'Hausa',
        'haw': 'Hawaiian',
        'iw': 'Hebrew',
        'hi': 'Hindi',
        'hmn': 'Hmong',
        'hu': 'Hungarian',
        'is': 'Icelandic',
        'ig': 'Igbo',
        'id': 'Indonesian',
        'ga': 'Irish',
        'it': 'Italian',
        'ja': 'Japanese',
        'jw': 'Javanese',
        'kn': 'Kannada',
        'kk': 'Kazakh',
        'km': 'Khmer',
        'ko': 'Korean',
        'ku': 'Kurdish (Kurmanji)',
        'ky': 'Kyrgyz',
        'lo': 'Lao',
        'la': 'Latin',
        'lv': 'Latvian',
        'lt': 'Lithuanian',
        'lb': 'Luxembourgish',
        'mk': 'Macedonian',
        'mg': 'Malagasy',
        'ms': 'Malay',
        'ml': 'Malayalam',
        'mt': 'Maltese',
        'mi': 'Maori',
        'mr': 'Marathi',
        'mn': 'Mongolian',
        'my': 'Myanmar (Burmese)',
        'ne': 'Nepali',
        'no': 'Norwegian',
        'ps': 'Pashto',
        'fa': 'Persian',
        'pl': 'Polish',
        'pt': 'Portuguese',
        'ma': 'Punjabi',
        'ro': 'Romanian',
        'ru': 'Russian',
        'sm': 'Samoan',
        'gd': 'Scots Gaelic',
        'sr': 'Serbian',
        'st': 'Sesotho',
        'sn': 'Shona',
        'sd': 'Sindhi',
        'si': 'Sinhala',
        'sk': 'Slovak',
        'sl': 'Slovenian',
        'so': 'Somali',
        'es': 'Spanish',
        'su': 'Sundanese',
        'sw': 'Swahili',
        'sv': 'Swedish',
        'tg': 'Tajik',
        'ta': 'Tamil',
        'te': 'Telugu',
        'th': 'Thai',
        'tr': 'Turkish',
        'uk': 'Ukrainian',
        'ur': 'Urdu',
        'uz': 'Uzbek',
        'vi': 'Vietnamese',
        'cy': 'Welsh',
        'xh': 'Xhosa',
        'yi': 'Yiddish',
        'yo': 'Yoruba',
        'zu': 'Zulu'
    };
    */
    </script>
    <div>
        <!-- <br />ฝากติดตามเพจด้วย <a href='https://www.facebook.com/programmerthai/'>โปรแกรมเมอร์ไทย thai programmer</a> -->
    </div>
</body>

</html>