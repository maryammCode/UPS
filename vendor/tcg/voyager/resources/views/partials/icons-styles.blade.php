
@section('css') 
<style>
    /*! 
* @package IcoFont 
* @version 1.0.1 
* @author IcoFont https://icofont.com 
* @copyright Copyright (c) 2015 - 2018 IcoFont 
* @license - https://icofont.com/license/
*/
@font-face {
    font-family: IcoFont;
    font-weight: 400;
    font-style: Regular;
    src: url('{{ asset('enis/fonts/icofont.woff2') }}') format('woff2'),
         url('{{ asset('enis/fonts/icofont.woff') }}') format('woff');
}

[class*=" icofont-"], [class^=icofont-] {
    font-family: IcoFont !important;
    speak: none;
    font-style: normal;
    font-weight: 400;
    font-variant: normal;
    text-transform: none;
    white-space: nowrap;
    word-wrap: normal;
    direction: ltr;
    line-height: 1;
    -webkit-font-feature-settings: "liga";
    -webkit-font-smoothing: antialiased
}

.icofont-angry-monster:before {
    content: "\e800"
}

.icofont-bathtub:before {
    content: "\e801"
}

.icofont-bird-wings:before {
    content: "\e802"
}

.icofont-bow:before {
    content: "\e803"
}

.icofont-castle:before {
    content: "\e804"
}

.icofont-circuit:before {
    content: "\e805"
}

.icofont-crown-king:before {
    content: "\e806"
}

.icofont-crown-queen:before {
    content: "\e807"
}

.icofont-dart:before {
    content: "\e808"
}

.icofont-disability-race:before {
    content: "\e809"
}

.icofont-diving-goggle:before {
    content: "\e80a"
}

.icofont-eye-open:before {
    content: "\e80b"
}

.icofont-flora-flower:before {
    content: "\e80c"
}

.icofont-flora:before {
    content: "\e80d"
}

.icofont-gift-box:before {
    content: "\e80e"
}

.icofont-halloween-pumpkin:before {
    content: "\e80f"
}

.icofont-hand-power:before {
    content: "\e810"
}

.icofont-hand-thunder:before {
    content: "\e811"
}

.icofont-king-monster:before {
    content: "\e812"
}

.icofont-love:before {
    content: "\e813"
}

.icofont-magician-hat:before {
    content: "\e814"
}

.icofont-native-american:before {
    content: "\e815"
}

.icofont-owl-look:before {
    content: "\e816"
}

.icofont-phoenix:before {
    content: "\e817"
}

.icofont-robot-face:before {
    content: "\e818"
}

.icofont-sand-clock:before {
    content: "\e819"
}

.icofont-shield-alt:before {
    content: "\e81a"
}

.icofont-ship-wheel:before {
    content: "\e81b"
}

.icofont-skull-danger:before {
    content: "\e81c"
}

.icofont-skull-face:before {
    content: "\e81d"
}

.icofont-snowmobile:before {
    content: "\e81e"
}

.icofont-space-shuttle:before {
    content: "\e81f"
}

.icofont-star-shape:before {
    content: "\e820"
}

.icofont-swirl:before {
    content: "\e821"
}

.icofont-tattoo-wing:before {
    content: "\e822"
}

.icofont-throne:before {
    content: "\e823"
}

.icofont-tree-alt:before {
    content: "\e824"
}

.icofont-triangle:before {
    content: "\e825"
}

.icofont-unity-hand:before {
    content: "\e826"
}

.icofont-weed:before {
    content: "\e827"
}

.icofont-woman-bird:before {
    content: "\e828"
}

.icofont-bat:before {
    content: "\e829"
}

.icofont-bear-face:before {
    content: "\e82a"
}

.icofont-bear-tracks:before {
    content: "\e82b"
}

.icofont-bear:before {
    content: "\e82c"
}

.icofont-bird-alt:before {
    content: "\e82d"
}

.icofont-bird-flying:before {
    content: "\e82e"
}

.icofont-bird:before {
    content: "\e82f"
}

.icofont-birds:before {
    content: "\e830"
}

.icofont-bone:before {
    content: "\e831"
}

.icofont-bull:before {
    content: "\e832"
}

.icofont-butterfly-alt:before {
    content: "\e833"
}

.icofont-butterfly:before {
    content: "\e834"
}

.icofont-camel-alt:before {
    content: "\e835"
}

.icofont-camel-head:before {
    content: "\e836"
}

.icofont-camel:before {
    content: "\e837"
}

.icofont-cat-alt-1:before {
    content: "\e838"
}

.icofont-cat-alt-2:before {
    content: "\e839"
}

.icofont-cat-alt-3:before {
    content: "\e83a"
}

.icofont-cat-dog:before {
    content: "\e83b"
}

.icofont-cat-face:before {
    content: "\e83c"
}

.icofont-cat:before {
    content: "\e83d"
}

.icofont-cow-head:before {
    content: "\e83e"
}

.icofont-cow:before {
    content: "\e83f"
}

.icofont-crab:before {
    content: "\e840"
}

.icofont-crocodile:before {
    content: "\e841"
}

.icofont-deer-head:before {
    content: "\e842"
}

.icofont-dog-alt:before {
    content: "\e843"
}

.icofont-dog-barking:before {
    content: "\e844"
}

.icofont-dog:before {
    content: "\e845"
}

.icofont-dolphin:before {
    content: "\e846"
}

.icofont-duck-tracks:before {
    content: "\e847"
}

.icofont-eagle-head:before {
    content: "\e848"
}

.icofont-eaten-fish:before {
    content: "\e849"
}

.icofont-elephant-alt:before {
    content: "\e84a"
}

.icofont-elephant-head-alt:before {
    content: "\e84b"
}

.icofont-elephant-head:before {
    content: "\e84c"
}

.icofont-elephant:before {
    content: "\e84d"
}

.icofont-elk:before {
    content: "\e84e"
}

.icofont-fish-1:before {
    content: "\e84f"
}

.icofont-fish-2:before {
    content: "\e850"
}

.icofont-fish-3:before {
    content: "\e851"
}

.icofont-fish-4:before {
    content: "\e852"
}

.icofont-fish-5:before {
    content: "\e853"
}

.icofont-fish:before {
    content: "\e854"
}

.icofont-fox-alt:before {
    content: "\e855"
}

.icofont-fox:before {
    content: "\e856"
}

.icofont-frog-tracks:before {
    content: "\e857"
}

.icofont-frog:before {
    content: "\e858"
}

.icofont-froggy:before {
    content: "\e859"
}

.icofont-giraffe-head-1:before {
    content: "\e85a"
}

.icofont-giraffe-head-2:before {
    content: "\e85b"
}

.icofont-giraffe-head:before {
    content: "\e85c"
}

.icofont-giraffe:before {
    content: "\e85d"
}

.icofont-goat-head:before {
    content: "\e85e"
}

.icofont-gorilla:before {
    content: "\e85f"
}

.icofont-hen-tracks:before {
    content: "\e860"
}

.icofont-horse-head-1:before {
    content: "\e861"
}

.icofont-horse-head-2:before {
    content: "\e862"
}

.icofont-horse-head:before {
    content: "\e863"
}

.icofont-horse-tracks:before {
    content: "\e864"
}

.icofont-jellyfish:before {
    content: "\e865"
}

.icofont-kangaroo:before {
    content: "\e866"
}

.icofont-lemur:before {
    content: "\e867"
}

.icofont-lion-head-1:before {
    content: "\e868"
}

.icofont-lion-head-2:before {
    content: "\e869"
}

.icofont-lion-head:before {
    content: "\e86a"
}

.icofont-lion:before {
    content: "\e86b"
}

.icofont-monkey-2:before {
    content: "\e86c"
}

.icofont-monkey-3:before {
    content: "\e86d"
}

.icofont-monkey-face:before {
    content: "\e86e"
}

.icofont-monkey:before {
    content: "\e86f"
}

.icofont-octopus-alt:before {
    content: "\e870"
}

.icofont-octopus:before {
    content: "\e871"
}

.icofont-owl:before {
    content: "\e872"
}

.icofont-panda-face:before {
    content: "\e873"
}

.icofont-panda:before {
    content: "\e874"
}

.icofont-panther:before {
    content: "\e875"
}

.icofont-parrot-lip:before {
    content: "\e876"
}

.icofont-parrot:before {
    content: "\e877"
}

.icofont-paw:before {
    content: "\e878"
}

.icofont-pelican:before {
    content: "\e879"
}

.icofont-penguin:before {
    content: "\e87a"
}

.icofont-pig-face:before {
    content: "\e87b"
}

.icofont-pig:before {
    content: "\e87c"
}

.icofont-pigeon-1:before {
    content: "\e87d"
}

.icofont-pigeon-2:before {
    content: "\e87e"
}

.icofont-pigeon:before {
    content: "\e87f"
}

.icofont-rabbit:before {
    content: "\e880"
}

.icofont-rat:before {
    content: "\e881"
}

.icofont-rhino-head:before {
    content: "\e882"
}

.icofont-rhino:before {
    content: "\e883"
}

.icofont-rooster:before {
    content: "\e884"
}

.icofont-seahorse:before {
    content: "\e885"
}

.icofont-seal:before {
    content: "\e886"
}

.icofont-shrimp-alt:before {
    content: "\e887"
}

.icofont-shrimp:before {
    content: "\e888"
}

.icofont-snail-1:before {
    content: "\e889"
}

.icofont-snail-2:before {
    content: "\e88a"
}

.icofont-snail-3:before {
    content: "\e88b"
}

.icofont-snail:before {
    content: "\e88c"
}

.icofont-snake:before {
    content: "\e88d"
}

.icofont-squid:before {
    content: "\e88e"
}

.icofont-squirrel:before {
    content: "\e88f"
}

.icofont-tiger-face:before {
    content: "\e890"
}

.icofont-tiger:before {
    content: "\e891"
}

.icofont-turtle:before {
    content: "\e892"
}

.icofont-whale:before {
    content: "\e893"
}

.icofont-woodpecker:before {
    content: "\e894"
}

.icofont-zebra:before {
    content: "\e895"
}

.icofont-brand-acer:before {
    content: "\e896"
}

.icofont-brand-adidas:before {
    content: "\e897"
}

.icofont-brand-adobe:before {
    content: "\e898"
}

.icofont-brand-air-new-zealand:before {
    content: "\e899"
}

.icofont-brand-airbnb:before {
    content: "\e89a"
}

.icofont-brand-aircell:before {
    content: "\e89b"
}

.icofont-brand-airtel:before {
    content: "\e89c"
}

.icofont-brand-alcatel:before {
    content: "\e89d"
}

.icofont-brand-alibaba:before {
    content: "\e89e"
}

.icofont-brand-aliexpress:before {
    content: "\e89f"
}

.icofont-brand-alipay:before {
    content: "\e8a0"
}

.icofont-brand-amazon:before {
    content: "\e8a1"
}

.icofont-brand-amd:before {
    content: "\e8a2"
}

.icofont-brand-american-airlines:before {
    content: "\e8a3"
}

.icofont-brand-android-robot:before {
    content: "\e8a4"
}

.icofont-brand-android:before {
    content: "\e8a5"
}

.icofont-brand-aol:before {
    content: "\e8a6"
}

.icofont-brand-apple:before {
    content: "\e8a7"
}

.icofont-brand-appstore:before {
    content: "\e8a8"
}

.icofont-brand-asus:before {
    content: "\e8a9"
}

.icofont-brand-ati:before {
    content: "\e8aa"
}

.icofont-brand-att:before {
    content: "\e8ab"
}

.icofont-brand-audi:before {
    content: "\e8ac"
}

.icofont-brand-axiata:before {
    content: "\e8ad"
}

.icofont-brand-bada:before {
    content: "\e8ae"
}

.icofont-brand-bbc:before {
    content: "\e8af"
}

.icofont-brand-bing:before {
    content: "\e8b0"
}

.icofont-brand-blackberry:before {
    content: "\e8b1"
}

.icofont-brand-bmw:before {
    content: "\e8b2"
}

.icofont-brand-box:before {
    content: "\e8b3"
}

.icofont-brand-burger-king:before {
    content: "\e8b4"
}

.icofont-brand-business-insider:before {
    content: "\e8b5"
}

.icofont-brand-buzzfeed:before {
    content: "\e8b6"
}

.icofont-brand-cannon:before {
    content: "\e8b7"
}

.icofont-brand-casio:before {
    content: "\e8b8"
}

.icofont-brand-china-mobile:before {
    content: "\e8b9"
}

.icofont-brand-china-telecom:before {
    content: "\e8ba"
}

.icofont-brand-china-unicom:before {
    content: "\e8bb"
}

.icofont-brand-cisco:before {
    content: "\e8bc"
}

.icofont-brand-citibank:before {
    content: "\e8bd"
}

.icofont-brand-cnet:before {
    content: "\e8be"
}

.icofont-brand-cnn:before {
    content: "\e8bf"
}

.icofont-brand-cocal-cola:before {
    content: "\e8c0"
}

.icofont-brand-compaq:before {
    content: "\e8c1"
}

.icofont-brand-debian:before {
    content: "\e8c2"
}

.icofont-brand-delicious:before {
    content: "\e8c3"
}

.icofont-brand-dell:before {
    content: "\e8c4"
}

.icofont-brand-designbump:before {
    content: "\e8c5"
}

.icofont-brand-designfloat:before {
    content: "\e8c6"
}

.icofont-brand-disney:before {
    content: "\e8c7"
}

.icofont-brand-dodge:before {
    content: "\e8c8"
}

.icofont-brand-dove:before {
    content: "\e8c9"
}

.icofont-brand-drupal:before {
    content: "\e8ca"
}

.icofont-brand-ebay:before {
    content: "\e8cb"
}

.icofont-brand-eleven:before {
    content: "\e8cc"
}

.icofont-brand-emirates:before {
    content: "\e8cd"
}

.icofont-brand-espn:before {
    content: "\e8ce"
}

.icofont-brand-etihad-airways:before {
    content: "\e8cf"
}

.icofont-brand-etisalat:before {
    content: "\e8d0"
}

.icofont-brand-etsy:before {
    content: "\e8d1"
}

.icofont-brand-fastrack:before {
    content: "\e8d2"
}

.icofont-brand-fedex:before {
    content: "\e8d3"
}

.icofont-brand-ferrari:before {
    content: "\e8d4"
}

.icofont-brand-fitbit:before {
    content: "\e8d5"
}

.icofont-brand-flikr:before {
    content: "\e8d6"
}

.icofont-brand-forbes:before {
    content: "\e8d7"
}

.icofont-brand-foursquare:before {
    content: "\e8d8"
}

.icofont-brand-foxconn:before {
    content: "\e8d9"
}

.icofont-brand-fujitsu:before {
    content: "\e8da"
}

.icofont-brand-general-electric:before {
    content: "\e8db"
}

.icofont-brand-gillette:before {
    content: "\e8dc"
}

.icofont-brand-gizmodo:before {
    content: "\e8dd"
}

.icofont-brand-gnome:before {
    content: "\e8de"
}

.icofont-brand-google:before {
    content: "\e8df"
}

.icofont-brand-gopro:before {
    content: "\e8e0"
}

.icofont-brand-gucci:before {
    content: "\e8e1"
}

.icofont-brand-hallmark:before {
    content: "\e8e2"
}

.icofont-brand-hi5:before {
    content: "\e8e3"
}

.icofont-brand-honda:before {
    content: "\e8e4"
}

.icofont-brand-hp:before {
    content: "\e8e5"
}

.icofont-brand-hsbc:before {
    content: "\e8e6"
}

.icofont-brand-htc:before {
    content: "\e8e7"
}

.icofont-brand-huawei:before {
    content: "\e8e8"
}

.icofont-brand-hulu:before {
    content: "\e8e9"
}

.icofont-brand-hyundai:before {
    content: "\e8ea"
}

.icofont-brand-ibm:before {
    content: "\e8eb"
}

.icofont-brand-icofont:before {
    content: "\e8ec"
}

.icofont-brand-icq:before {
    content: "\e8ed"
}

.icofont-brand-ikea:before {
    content: "\e8ee"
}

.icofont-brand-imdb:before {
    content: "\e8ef"
}

.icofont-brand-indiegogo:before {
    content: "\e8f0"
}

.icofont-brand-intel:before {
    content: "\e8f1"
}

.icofont-brand-ipair:before {
    content: "\e8f2"
}

.icofont-brand-jaguar:before {
    content: "\e8f3"
}

.icofont-brand-java:before {
    content: "\e8f4"
}

.icofont-brand-joomla:before {
    content: "\e8f5"
}

.icofont-brand-kickstarter:before {
    content: "\e8f6"
}

.icofont-brand-kik:before {
    content: "\e8f7"
}

.icofont-brand-lastfm:before {
    content: "\e8f8"
}

.icofont-brand-lego:before {
    content: "\e8f9"
}

.icofont-brand-lenovo:before {
    content: "\e8fa"
}

.icofont-brand-levis:before {
    content: "\e8fb"
}

.icofont-brand-lexus:before {
    content: "\e8fc"
}

.icofont-brand-lg:before {
    content: "\e8fd"
}

.icofont-brand-life-hacker:before {
    content: "\e8fe"
}

.icofont-brand-linux-mint:before {
    content: "\e8ff"
}

.icofont-brand-linux:before {
    content: "\e900"
}

.icofont-brand-lionix:before {
    content: "\e901"
}

.icofont-brand-loreal:before {
    content: "\e902"
}

.icofont-brand-louis-vuitton:before {
    content: "\e903"
}

.icofont-brand-mac-os:before {
    content: "\e904"
}

.icofont-brand-marvel-app:before {
    content: "\e905"
}

.icofont-brand-mashable:before {
    content: "\e906"
}

.icofont-brand-mazda:before {
    content: "\e907"
}

.icofont-brand-mcdonals:before {
    content: "\e908"
}

.icofont-brand-mercedes:before {
    content: "\e909"
}

.icofont-brand-micromax:before {
    content: "\e90a"
}

.icofont-brand-microsoft:before {
    content: "\e90b"
}

.icofont-brand-mobileme:before {
    content: "\e90c"
}

.icofont-brand-mobily:before {
    content: "\e90d"
}

.icofont-brand-motorola:before {
    content: "\e90e"
}

.icofont-brand-msi:before {
    content: "\e90f"
}

.icofont-brand-mts:before {
    content: "\e910"
}

.icofont-brand-myspace:before {
    content: "\e911"
}

.icofont-brand-mytv:before {
    content: "\e912"
}

.icofont-brand-nasa:before {
    content: "\e913"
}

.icofont-brand-natgeo:before {
    content: "\e914"
}

.icofont-brand-nbc:before {
    content: "\e915"
}

.icofont-brand-nescafe:before {
    content: "\e916"
}

.icofont-brand-nestle:before {
    content: "\e917"
}

.icofont-brand-netflix:before {
    content: "\e918"
}

.icofont-brand-nexus:before {
    content: "\e919"
}

.icofont-brand-nike:before {
    content: "\e91a"
}

.icofont-brand-nokia:before {
    content: "\e91b"
}

.icofont-brand-nvidia:before {
    content: "\e91c"
}

.icofont-brand-omega:before {
    content: "\e91d"
}

.icofont-brand-opensuse:before {
    content: "\e91e"
}

.icofont-brand-oracle:before {
    content: "\e91f"
}

.icofont-brand-panasonic:before {
    content: "\e920"
}

.icofont-brand-paypal:before {
    content: "\e921"
}

.icofont-brand-pepsi:before {
    content: "\e922"
}

.icofont-brand-philips:before {
    content: "\e923"
}

.icofont-brand-pizza-hut:before {
    content: "\e924"
}

.icofont-brand-playstation:before {
    content: "\e925"
}

.icofont-brand-puma:before {
    content: "\e926"
}

.icofont-brand-qatar-air:before {
    content: "\e927"
}

.icofont-brand-qvc:before {
    content: "\e928"
}

.icofont-brand-readernaut:before {
    content: "\e929"
}

.icofont-brand-redbull:before {
    content: "\e92a"
}

.icofont-brand-reebok:before {
    content: "\e92b"
}

.icofont-brand-reuters:before {
    content: "\e92c"
}

.icofont-brand-samsung:before {
    content: "\e92d"
}

.icofont-brand-sap:before {
    content: "\e92e"
}

.icofont-brand-saudia-airlines:before {
    content: "\e92f"
}

.icofont-brand-scribd:before {
    content: "\e930"
}

.icofont-brand-shell:before {
    content: "\e931"
}

.icofont-brand-siemens:before {
    content: "\e932"
}

.icofont-brand-sk-telecom:before {
    content: "\e933"
}

.icofont-brand-slideshare:before {
    content: "\e934"
}

.icofont-brand-smashing-magazine:before {
    content: "\e935"
}

.icofont-brand-snapchat:before {
    content: "\e936"
}

.icofont-brand-sony-ericsson:before {
    content: "\e937"
}

.icofont-brand-sony:before {
    content: "\e938"
}

.icofont-brand-soundcloud:before {
    content: "\e939"
}

.icofont-brand-sprint:before {
    content: "\e93a"
}

.icofont-brand-squidoo:before {
    content: "\e93b"
}

.icofont-brand-starbucks:before {
    content: "\e93c"
}

.icofont-brand-stc:before {
    content: "\e93d"
}

.icofont-brand-steam:before {
    content: "\e93e"
}

.icofont-brand-suzuki:before {
    content: "\e93f"
}

.icofont-brand-symbian:before {
    content: "\e940"
}

.icofont-brand-t-mobile:before {
    content: "\e941"
}

.icofont-brand-tango:before {
    content: "\e942"
}

.icofont-brand-target:before {
    content: "\e943"
}

.icofont-brand-tata-indicom:before {
    content: "\e944"
}

.icofont-brand-techcrunch:before {
    content: "\e945"
}

.icofont-brand-telenor:before {
    content: "\e946"
}

.icofont-brand-teliasonera:before {
    content: "\e947"
}

.icofont-brand-tesla:before {
    content: "\e948"
}

.icofont-brand-the-verge:before {
    content: "\e949"
}

.icofont-brand-thenextweb:before {
    content: "\e94a"
}

.icofont-brand-toshiba:before {
    content: "\e94b"
}

.icofont-brand-toyota:before {
    content: "\e94c"
}

.icofont-brand-tribenet:before {
    content: "\e94d"
}

.icofont-brand-ubuntu:before {
    content: "\e94e"
}

.icofont-brand-unilever:before {
    content: "\e94f"
}

.icofont-brand-vaio:before {
    content: "\e950"
}

.icofont-brand-verizon:before {
    content: "\e951"
}

.icofont-brand-viber:before {
    content: "\e952"
}

.icofont-brand-vodafone:before {
    content: "\e953"
}

.icofont-brand-volkswagen:before {
    content: "\e954"
}

.icofont-brand-walmart:before {
    content: "\e955"
}

.icofont-brand-warnerbros:before {
    content: "\e956"
}

.icofont-brand-whatsapp:before {
    content: "\e957"
}

.icofont-brand-wikipedia:before {
    content: "\e958"
}

.icofont-brand-windows:before {
    content: "\e959"
}

.icofont-brand-wire:before {
    content: "\e95a"
}

.icofont-brand-wordpress:before {
    content: "\e95b"
}

.icofont-brand-xiaomi:before {
    content: "\e95c"
}

.icofont-brand-yahoobuzz:before {
    content: "\e95d"
}

.icofont-brand-yamaha:before {
    content: "\e95e"
}

.icofont-brand-youtube:before {
    content: "\e95f"
}

.icofont-brand-zain:before {
    content: "\e960"
}

.icofont-bank-alt:before {
    content: "\e961"
}

.icofont-bank:before {
    content: "\e962"
}

.icofont-barcode:before {
    content: "\e963"
}

.icofont-bill-alt:before {
    content: "\e964"
}

.icofont-billboard:before {
    content: "\e965"
}

.icofont-briefcase-1:before {
    content: "\e966"
}

.icofont-briefcase-2:before {
    content: "\e967"
}

.icofont-businessman:before {
    content: "\e968"
}

.icofont-businesswoman:before {
    content: "\e969"
}

.icofont-chair:before {
    content: "\e96a"
}

.icofont-coins:before {
    content: "\e96b"
}

.icofont-company:before {
    content: "\e96c"
}

.icofont-contact-add:before {
    content: "\e96d"
}

.icofont-files-stack:before {
    content: "\e96e"
}

.icofont-handshake-deal:before {
    content: "\e96f"
}

.icofont-id-card:before {
    content: "\e970"
}

.icofont-meeting-add:before {
    content: "\e971"
}

.icofont-money-bag:before {
    content: "\e972"
}

.icofont-pie-chart:before {
    content: "\e973"
}

.icofont-presentation-alt:before {
    content: "\e974"
}

.icofont-presentation:before {
    content: "\e975"
}

.icofont-stamp:before {
    content: "\e976"
}

.icofont-stock-mobile:before {
    content: "\e977"
}

.icofont-chart-arrows-axis:before {
    content: "\e978"
}

.icofont-chart-bar-graph:before {
    content: "\e979"
}

.icofont-chart-flow-1:before {
    content: "\e97a"
}

.icofont-chart-flow-2:before {
    content: "\e97b"
}

.icofont-chart-flow:before {
    content: "\e97c"
}

.icofont-chart-growth:before {
    content: "\e97d"
}

.icofont-chart-histogram-alt:before {
    content: "\e97e"
}

.icofont-chart-histogram:before {
    content: "\e97f"
}

.icofont-chart-line-alt:before {
    content: "\e980"
}

.icofont-chart-line:before {
    content: "\e981"
}

.icofont-chart-pie-alt:before {
    content: "\e982"
}

.icofont-chart-pie:before {
    content: "\e983"
}

.icofont-chart-radar-graph:before {
    content: "\e984"
}

.icofont-architecture-alt:before {
    content: "\e985"
}

.icofont-architecture:before {
    content: "\e986"
}

.icofont-barricade:before {
    content: "\e987"
}

.icofont-bolt:before {
    content: "\e988"
}

.icofont-bricks:before {
    content: "\e989"
}

.icofont-building-alt:before {
    content: "\e98a"
}

.icofont-bull-dozer:before {
    content: "\e98b"
}

.icofont-calculations:before {
    content: "\e98c"
}

.icofont-cement-mix:before {
    content: "\e98d"
}

.icofont-cement-mixer:before {
    content: "\e98e"
}

.icofont-concrete-mixer:before {
    content: "\e98f"
}

.icofont-danger-zone:before {
    content: "\e990"
}

.icofont-drill:before {
    content: "\e991"
}

.icofont-eco-energy:before {
    content: "\e992"
}

.icofont-eco-environmen:before {
    content: "\e993"
}

.icofont-energy-air:before {
    content: "\e994"
}

.icofont-energy-oil:before {
    content: "\e995"
}

.icofont-energy-savings:before {
    content: "\e996"
}

.icofont-energy-solar:before {
    content: "\e997"
}

.icofont-energy-water:before {
    content: "\e998"
}

.icofont-engineer:before {
    content: "\e999"
}

.icofont-fire-extinguisher-alt:before {
    content: "\e99a"
}

.icofont-fire-extinguisher:before {
    content: "\e99b"
}

.icofont-fix-tools:before {
    content: "\e99c"
}

.icofont-fork-lift:before {
    content: "\e99d"
}

.icofont-glue-oil:before {
    content: "\e99e"
}

.icofont-hammer-alt:before {
    content: "\e99f"
}

.icofont-hammer:before {
    content: "\e9a0"
}

.icofont-help-robot:before {
    content: "\e9a1"
}

.icofont-industries-1:before {
    content: "\e9a2"
}

.icofont-industries-2:before {
    content: "\e9a3"
}

.icofont-industries-3:before {
    content: "\e9a4"
}

.icofont-industries-4:before {
    content: "\e9a5"
}

.icofont-industries-5:before {
    content: "\e9a6"
}

.icofont-industries:before {
    content: "\e9a7"
}

.icofont-labour:before {
    content: "\e9a8"
}

.icofont-mining:before {
    content: "\e9a9"
}

.icofont-paint-brush:before {
    content: "\e9aa"
}

.icofont-pollution:before {
    content: "\e9ab"
}

.icofont-power-zone:before {
    content: "\e9ac"
}

.icofont-radio-active:before {
    content: "\e9ad"
}

.icofont-recycle-alt:before {
    content: "\e9ae"
}

.icofont-recycling-man:before {
    content: "\e9af"
}

.icofont-safety-hat-light:before {
    content: "\e9b0"
}

.icofont-safety-hat:before {
    content: "\e9b1"
}

.icofont-saw:before {
    content: "\e9b2"
}

.icofont-screw-driver:before {
    content: "\e9b3"
}

.icofont-tools-1:before {
    content: "\e9b4"
}

.icofont-tools-bag:before {
    content: "\e9b5"
}

.icofont-tow-truck:before {
    content: "\e9b6"
}

.icofont-trolley:before {
    content: "\e9b7"
}

.icofont-trowel:before {
    content: "\e9b8"
}

.icofont-under-construction-alt:before {
    content: "\e9b9"
}

.icofont-under-construction:before {
    content: "\e9ba"
}

.icofont-vehicle-cement:before {
    content: "\e9bb"
}

.icofont-vehicle-crane:before {
    content: "\e9bc"
}

.icofont-vehicle-delivery-van:before {
    content: "\e9bd"
}

.icofont-vehicle-dozer:before {
    content: "\e9be"
}

.icofont-vehicle-excavator:before {
    content: "\e9bf"
}

.icofont-vehicle-trucktor:before {
    content: "\e9c0"
}

.icofont-vehicle-wrecking:before {
    content: "\e9c1"
}

.icofont-worker:before {
    content: "\e9c2"
}

.icofont-workers-group:before {
    content: "\e9c3"
}

.icofont-wrench:before {
    content: "\e9c4"
}

.icofont-afghani-false:before {
    content: "\e9c5"
}

.icofont-afghani-minus:before {
    content: "\e9c6"
}

.icofont-afghani-plus:before {
    content: "\e9c7"
}

.icofont-afghani-true:before {
    content: "\e9c8"
}

.icofont-afghani:before {
    content: "\e9c9"
}

.icofont-baht-false:before {
    content: "\e9ca"
}

.icofont-baht-minus:before {
    content: "\e9cb"
}

.icofont-baht-plus:before {
    content: "\e9cc"
}

.icofont-baht-true:before {
    content: "\e9cd"
}

.icofont-baht:before {
    content: "\e9ce"
}

.icofont-bitcoin-false:before {
    content: "\e9cf"
}

.icofont-bitcoin-minus:before {
    content: "\e9d0"
}

.icofont-bitcoin-plus:before {
    content: "\e9d1"
}

.icofont-bitcoin-true:before {
    content: "\e9d2"
}

.icofont-bitcoin:before {
    content: "\e9d3"
}

.icofont-dollar-flase:before {
    content: "\e9d4"
}

.icofont-dollar-minus:before {
    content: "\e9d5"
}

.icofont-dollar-plus:before {
    content: "\e9d6"
}

.icofont-dollar-true:before {
    content: "\e9d7"
}

.icofont-dollar:before {
    content: "\e9d8"
}

.icofont-dong-false:before {
    content: "\e9d9"
}

.icofont-dong-minus:before {
    content: "\e9da"
}

.icofont-dong-plus:before {
    content: "\e9db"
}

.icofont-dong-true:before {
    content: "\e9dc"
}

.icofont-dong:before {
    content: "\e9dd"
}

.icofont-euro-false:before {
    content: "\e9de"
}

.icofont-euro-minus:before {
    content: "\e9df"
}

.icofont-euro-plus:before {
    content: "\e9e0"
}

.icofont-euro-true:before {
    content: "\e9e1"
}

.icofont-euro:before {
    content: "\e9e2"
}

.icofont-frank-false:before {
    content: "\e9e3"
}

.icofont-frank-minus:before {
    content: "\e9e4"
}

.icofont-frank-plus:before {
    content: "\e9e5"
}

.icofont-frank-true:before {
    content: "\e9e6"
}

.icofont-frank:before {
    content: "\e9e7"
}

.icofont-hryvnia-false:before {
    content: "\e9e8"
}

.icofont-hryvnia-minus:before {
    content: "\e9e9"
}

.icofont-hryvnia-plus:before {
    content: "\e9ea"
}

.icofont-hryvnia-true:before {
    content: "\e9eb"
}

.icofont-hryvnia:before {
    content: "\e9ec"
}

.icofont-lira-false:before {
    content: "\e9ed"
}

.icofont-lira-minus:before {
    content: "\e9ee"
}

.icofont-lira-plus:before {
    content: "\e9ef"
}

.icofont-lira-true:before {
    content: "\e9f0"
}

.icofont-lira:before {
    content: "\e9f1"
}

.icofont-peseta-false:before {
    content: "\e9f2"
}

.icofont-peseta-minus:before {
    content: "\e9f3"
}

.icofont-peseta-plus:before {
    content: "\e9f4"
}

.icofont-peseta-true:before {
    content: "\e9f5"
}

.icofont-peseta:before {
    content: "\e9f6"
}

.icofont-peso-false:before {
    content: "\e9f7"
}

.icofont-peso-minus:before {
    content: "\e9f8"
}

.icofont-peso-plus:before {
    content: "\e9f9"
}

.icofont-peso-true:before {
    content: "\e9fa"
}

.icofont-peso:before {
    content: "\e9fb"
}

.icofont-pound-false:before {
    content: "\e9fc"
}

.icofont-pound-minus:before {
    content: "\e9fd"
}

.icofont-pound-plus:before {
    content: "\e9fe"
}

.icofont-pound-true:before {
    content: "\e9ff"
}

.icofont-pound:before {
    content: "\ea00"
}

.icofont-renminbi-false:before {
    content: "\ea01"
}

.icofont-renminbi-minus:before {
    content: "\ea02"
}

.icofont-renminbi-plus:before {
    content: "\ea03"
}

.icofont-renminbi-true:before {
    content: "\ea04"
}

.icofont-renminbi:before {
    content: "\ea05"
}

.icofont-riyal-false:before {
    content: "\ea06"
}

.icofont-riyal-minus:before {
    content: "\ea07"
}

.icofont-riyal-plus:before {
    content: "\ea08"
}

.icofont-riyal-true:before {
    content: "\ea09"
}

.icofont-riyal:before {
    content: "\ea0a"
}

.icofont-rouble-false:before {
    content: "\ea0b"
}

.icofont-rouble-minus:before {
    content: "\ea0c"
}

.icofont-rouble-plus:before {
    content: "\ea0d"
}

.icofont-rouble-true:before {
    content: "\ea0e"
}

.icofont-rouble:before {
    content: "\ea0f"
}

.icofont-rupee-false:before {
    content: "\ea10"
}

.icofont-rupee-minus:before {
    content: "\ea11"
}

.icofont-rupee-plus:before {
    content: "\ea12"
}

.icofont-rupee-true:before {
    content: "\ea13"
}

.icofont-rupee:before {
    content: "\ea14"
}

.icofont-taka-false:before {
    content: "\ea15"
}

.icofont-taka-minus:before {
    content: "\ea16"
}

.icofont-taka-plus:before {
    content: "\ea17"
}

.icofont-taka-true:before {
    content: "\ea18"
}

.icofont-taka:before {
    content: "\ea19"
}

.icofont-turkish-lira-false:before {
    content: "\ea1a"
}

.icofont-turkish-lira-minus:before {
    content: "\ea1b"
}

.icofont-turkish-lira-plus:before {
    content: "\ea1c"
}

.icofont-turkish-lira-true:before {
    content: "\ea1d"
}

.icofont-turkish-lira:before {
    content: "\ea1e"
}

.icofont-won-false:before {
    content: "\ea1f"
}

.icofont-won-minus:before {
    content: "\ea20"
}

.icofont-won-plus:before {
    content: "\ea21"
}

.icofont-won-true:before {
    content: "\ea22"
}

.icofont-won:before {
    content: "\ea23"
}

.icofont-yen-false:before {
    content: "\ea24"
}

.icofont-yen-minus:before {
    content: "\ea25"
}

.icofont-yen-plus:before {
    content: "\ea26"
}

.icofont-yen-true:before {
    content: "\ea27"
}

.icofont-yen:before {
    content: "\ea28"
}

.icofont-android-nexus:before {
    content: "\ea29"
}

.icofont-android-tablet:before {
    content: "\ea2a"
}

.icofont-apple-watch:before {
    content: "\ea2b"
}

.icofont-drawing-tablet:before {
    content: "\ea2c"
}

.icofont-earphone:before {
    content: "\ea2d"
}

.icofont-flash-drive:before {
    content: "\ea2e"
}

.icofont-game-console:before {
    content: "\ea2f"
}

.icofont-game-controller:before {
    content: "\ea30"
}

.icofont-game-pad:before {
    content: "\ea31"
}

.icofont-game:before {
    content: "\ea32"
}

.icofont-headphone-alt-1:before {
    content: "\ea33"
}

.icofont-headphone-alt-2:before {
    content: "\ea34"
}

.icofont-headphone-alt-3:before {
    content: "\ea35"
}

.icofont-headphone-alt:before {
    content: "\ea36"
}

.icofont-headphone:before {
    content: "\ea37"
}

.icofont-htc-one:before {
    content: "\ea38"
}

.icofont-imac:before {
    content: "\ea39"
}

.icofont-ipad:before {
    content: "\ea3a"
}

.icofont-iphone:before {
    content: "\ea3b"
}

.icofont-ipod-nano:before {
    content: "\ea3c"
}

.icofont-ipod-touch:before {
    content: "\ea3d"
}

.icofont-keyboard-alt:before {
    content: "\ea3e"
}

.icofont-keyboard-wireless:before {
    content: "\ea3f"
}

.icofont-keyboard:before {
    content: "\ea40"
}

.icofont-laptop-alt:before {
    content: "\ea41"
}

.icofont-laptop:before {
    content: "\ea42"
}

.icofont-macbook:before {
    content: "\ea43"
}

.icofont-magic-mouse:before {
    content: "\ea44"
}

.icofont-micro-chip:before {
    content: "\ea45"
}

.icofont-microphone-alt:before {
    content: "\ea46"
}

.icofont-microphone:before {
    content: "\ea47"
}

.icofont-monitor:before {
    content: "\ea48"
}

.icofont-mouse:before {
    content: "\ea49"
}

.icofont-mp3-player:before {
    content: "\ea4a"
}

.icofont-nintendo:before {
    content: "\ea4b"
}

.icofont-playstation-alt:before {
    content: "\ea4c"
}

.icofont-psvita:before {
    content: "\ea4d"
}

.icofont-radio-mic:before {
    content: "\ea4e"
}

.icofont-radio:before {
    content: "\ea4f"
}

.icofont-refrigerator:before {
    content: "\ea50"
}

.icofont-samsung-galaxy:before {
    content: "\ea51"
}

.icofont-surface-tablet:before {
    content: "\ea52"
}

.icofont-ui-head-phone:before {
    content: "\ea53"
}

.icofont-ui-keyboard:before {
    content: "\ea54"
}

.icofont-washing-machine:before {
    content: "\ea55"
}

.icofont-wifi-router:before {
    content: "\ea56"
}

.icofont-wii-u:before {
    content: "\ea57"
}

.icofont-windows-lumia:before {
    content: "\ea58"
}

.icofont-wireless-mouse:before {
    content: "\ea59"
}

.icofont-xbox-360:before {
    content: "\ea5a"
}

.icofont-arrow-down:before {
    content: "\ea5b"
}

.icofont-arrow-left:before {
    content: "\ea5c"
}

.icofont-arrow-right:before {
    content: "\ea5d"
}

.icofont-arrow-up:before {
    content: "\ea5e"
}

.icofont-block-down:before {
    content: "\ea5f"
}

.icofont-block-left:before {
    content: "\ea60"
}

.icofont-block-right:before {
    content: "\ea61"
}

.icofont-block-up:before {
    content: "\ea62"
}

.icofont-bubble-down:before {
    content: "\ea63"
}

.icofont-bubble-left:before {
    content: "\ea64"
}

.icofont-bubble-right:before {
    content: "\ea65"
}

.icofont-bubble-up:before {
    content: "\ea66"
}

.icofont-caret-down:before {
    content: "\ea67"
}

.icofont-caret-left:before {
    content: "\ea68"
}

.icofont-caret-right:before {
    content: "\ea69"
}

.icofont-caret-up:before {
    content: "\ea6a"
}

.icofont-circled-down:before {
    content: "\ea6b"
}

.icofont-circled-left:before {
    content: "\ea6c"
}

.icofont-circled-right:before {
    content: "\ea6d"
}

.icofont-circled-up:before {
    content: "\ea6e"
}

.icofont-collapse:before {
    content: "\ea6f"
}

.icofont-cursor-drag:before {
    content: "\ea70"
}

.icofont-curved-double-left:before {
    content: "\ea71"
}

.icofont-curved-double-right:before {
    content: "\ea72"
}

.icofont-curved-down:before {
    content: "\ea73"
}

.icofont-curved-left:before {
    content: "\ea74"
}

.icofont-curved-right:before {
    content: "\ea75"
}

.icofont-curved-up:before {
    content: "\ea76"
}

.icofont-dotted-down:before {
    content: "\ea77"
}

.icofont-dotted-left:before {
    content: "\ea78"
}

.icofont-dotted-right:before {
    content: "\ea79"
}

.icofont-dotted-up:before {
    content: "\ea7a"
}

.icofont-double-left:before {
    content: "\ea7b"
}

.icofont-double-right:before {
    content: "\ea7c"
}

.icofont-expand-alt:before {
    content: "\ea7d"
}

.icofont-hand-down:before {
    content: "\ea7e"
}

.icofont-hand-drag:before {
    content: "\ea7f"
}

.icofont-hand-drag1:before {
    content: "\ea80"
}

.icofont-hand-drag2:before {
    content: "\ea81"
}

.icofont-hand-drawn-alt-down:before {
    content: "\ea82"
}

.icofont-hand-drawn-alt-left:before {
    content: "\ea83"
}

.icofont-hand-drawn-alt-right:before {
    content: "\ea84"
}

.icofont-hand-drawn-alt-up:before {
    content: "\ea85"
}

.icofont-hand-drawn-down:before {
    content: "\ea86"
}

.icofont-hand-drawn-left:before {
    content: "\ea87"
}

.icofont-hand-drawn-right:before {
    content: "\ea88"
}

.icofont-hand-drawn-up:before {
    content: "\ea89"
}

.icofont-hand-grippers:before {
    content: "\ea8a"
}

.icofont-hand-left:before {
    content: "\ea8b"
}

.icofont-hand-right:before {
    content: "\ea8c"
}

.icofont-hand-up:before {
    content: "\ea8d"
}

.icofont-line-block-down:before {
    content: "\ea8e"
}

.icofont-line-block-left:before {
    content: "\ea8f"
}

.icofont-line-block-right:before {
    content: "\ea90"
}

.icofont-line-block-up:before {
    content: "\ea91"
}

.icofont-long-arrow-down:before {
    content: "\ea92"
}

.icofont-long-arrow-left:before {
    content: "\ea93"
}

.icofont-long-arrow-right:before {
    content: "\ea94"
}

.icofont-long-arrow-up:before {
    content: "\ea95"
}

.icofont-rounded-collapse:before {
    content: "\ea96"
}

.icofont-rounded-double-left:before {
    content: "\ea97"
}

.icofont-rounded-double-right:before {
    content: "\ea98"
}

.icofont-rounded-down:before {
    content: "\ea99"
}

.icofont-rounded-expand:before {
    content: "\ea9a"
}

.icofont-rounded-left-down:before {
    content: "\ea9b"
}

.icofont-rounded-left-up:before {
    content: "\ea9c"
}

.icofont-rounded-left:before {
    content: "\ea9d"
}

.icofont-rounded-right-down:before {
    content: "\ea9e"
}

.icofont-rounded-right-up:before {
    content: "\ea9f"
}

.icofont-rounded-right:before {
    content: "\eaa0"
}

.icofont-rounded-up:before {
    content: "\eaa1"
}

.icofont-scroll-bubble-down:before {
    content: "\eaa2"
}

.icofont-scroll-bubble-left:before {
    content: "\eaa3"
}

.icofont-scroll-bubble-right:before {
    content: "\eaa4"
}

.icofont-scroll-bubble-up:before {
    content: "\eaa5"
}

.icofont-scroll-double-down:before {
    content: "\eaa6"
}

.icofont-scroll-double-left:before {
    content: "\eaa7"
}

.icofont-scroll-double-right:before {
    content: "\eaa8"
}

.icofont-scroll-double-up:before {
    content: "\eaa9"
}

.icofont-scroll-down:before {
    content: "\eaaa"
}

.icofont-scroll-left:before {
    content: "\eaab"
}

.icofont-scroll-long-down:before {
    content: "\eaac"
}

.icofont-scroll-long-left:before {
    content: "\eaad"
}

.icofont-scroll-long-right:before {
    content: "\eaae"
}

.icofont-scroll-long-up:before {
    content: "\eaaf"
}

.icofont-scroll-right:before {
    content: "\eab0"
}

.icofont-scroll-up:before {
    content: "\eab1"
}

.icofont-simple-down:before {
    content: "\eab2"
}

.icofont-simple-left-down:before {
    content: "\eab3"
}

.icofont-simple-left-up:before {
    content: "\eab4"
}

.icofont-simple-left:before {
    content: "\eab5"
}

.icofont-simple-right-down:before {
    content: "\eab6"
}

.icofont-simple-right-up:before {
    content: "\eab7"
}

.icofont-simple-right:before {
    content: "\eab8"
}

.icofont-simple-up:before {
    content: "\eab9"
}

.icofont-square-down:before {
    content: "\eaba"
}

.icofont-square-left:before {
    content: "\eabb"
}

.icofont-square-right:before {
    content: "\eabc"
}

.icofont-square-up:before {
    content: "\eabd"
}

.icofont-stylish-down:before {
    content: "\eabe"
}

.icofont-stylish-left:before {
    content: "\eabf"
}

.icofont-stylish-right:before {
    content: "\eac0"
}

.icofont-stylish-up:before {
    content: "\eac1"
}

.icofont-swoosh-down:before {
    content: "\eac2"
}

.icofont-swoosh-left:before {
    content: "\eac3"
}

.icofont-swoosh-right:before {
    content: "\eac4"
}

.icofont-swoosh-up:before {
    content: "\eac5"
}

.icofont-thin-double-left:before {
    content: "\eac6"
}

.icofont-thin-double-right:before {
    content: "\eac7"
}

.icofont-thin-down:before {
    content: "\eac8"
}

.icofont-thin-left:before {
    content: "\eac9"
}

.icofont-thin-right:before {
    content: "\eaca"
}

.icofont-thin-up:before {
    content: "\eacb"
}

.icofont-abc:before {
    content: "\eacc"
}

.icofont-atom:before {
    content: "\eacd"
}

.icofont-award:before {
    content: "\eace"
}

.icofont-bell-alt:before {
    content: "\eacf"
}

.icofont-black-board:before {
    content: "\ead0"
}

.icofont-book-alt:before {
    content: "\ead1"
}

.icofont-book:before {
    content: "\ead2"
}

.icofont-brainstorming:before {
    content: "\ead3"
}

.icofont-certificate-alt-1:before {
    content: "\ead4"
}

.icofont-certificate-alt-2:before {
    content: "\ead5"
}

.icofont-certificate:before {
    content: "\ead6"
}

.icofont-education:before {
    content: "\ead7"
}

.icofont-electron:before {
    content: "\ead8"
}

.icofont-fountain-pen:before {
    content: "\ead9"
}

.icofont-globe-alt:before {
    content: "\eada"
}

.icofont-graduate-alt:before {
    content: "\eadb"
}

.icofont-graduate:before {
    content: "\eadc"
}

.icofont-group-students:before {
    content: "\eadd"
}

.icofont-hat-alt:before {
    content: "\eade"
}

.icofont-hat:before {
    content: "\eadf"
}

.icofont-instrument:before {
    content: "\eae0"
}

.icofont-lamp-light:before {
    content: "\eae1"
}

.icofont-medal:before {
    content: "\eae2"
}

.icofont-microscope-alt:before {
    content: "\eae3"
}

.icofont-microscope:before {
    content: "\eae4"
}

.icofont-paper:before {
    content: "\eae5"
}

.icofont-pen-alt-4:before {
    content: "\eae6"
}

.icofont-pen-nib:before {
    content: "\eae7"
}

.icofont-pencil-alt-5:before {
    content: "\eae8"
}

.icofont-quill-pen:before {
    content: "\eae9"
}

.icofont-read-book-alt:before {
    content: "\eaea"
}

.icofont-read-book:before {
    content: "\eaeb"
}

.icofont-school-bag:before {
    content: "\eaec"
}

.icofont-school-bus:before {
    content: "\eaed"
}

.icofont-student-alt:before {
    content: "\eaee"
}

.icofont-student:before {
    content: "\eaef"
}

.icofont-teacher:before {
    content: "\eaf0"
}

.icofont-test-bulb:before {
    content: "\eaf1"
}

.icofont-test-tube-alt:before {
    content: "\eaf2"
}

.icofont-university:before {
    content: "\eaf3"
}

.icofont-angry:before {
    content: "\eaf4"
}

.icofont-astonished:before {
    content: "\eaf5"
}

.icofont-confounded:before {
    content: "\eaf6"
}

.icofont-confused:before {
    content: "\eaf7"
}

.icofont-crying:before {
    content: "\eaf8"
}

.icofont-dizzy:before {
    content: "\eaf9"
}

.icofont-expressionless:before {
    content: "\eafa"
}

.icofont-heart-eyes:before {
    content: "\eafb"
}

.icofont-laughing:before {
    content: "\eafc"
}

.icofont-nerd-smile:before {
    content: "\eafd"
}

.icofont-open-mouth:before {
    content: "\eafe"
}

.icofont-rage:before {
    content: "\eaff"
}

.icofont-rolling-eyes:before {
    content: "\eb00"
}

.icofont-sad:before {
    content: "\eb01"
}

.icofont-simple-smile:before {
    content: "\eb02"
}

.icofont-slightly-smile:before {
    content: "\eb03"
}

.icofont-smirk:before {
    content: "\eb04"
}

.icofont-stuck-out-tongue:before {
    content: "\eb05"
}

.icofont-wink-smile:before {
    content: "\eb06"
}

.icofont-worried:before {
    content: "\eb07"
}

.icofont-file-alt:before {
    content: "\eb08"
}

.icofont-file-audio:before {
    content: "\eb09"
}

.icofont-file-avi-mp4:before {
    content: "\eb0a"
}

.icofont-file-bmp:before {
    content: "\eb0b"
}

.icofont-file-code:before {
    content: "\eb0c"
}

.icofont-file-css:before {
    content: "\eb0d"
}

.icofont-file-document:before {
    content: "\eb0e"
}

.icofont-file-eps:before {
    content: "\eb0f"
}

.icofont-file-excel:before {
    content: "\eb10"
}

.icofont-file-exe:before {
    content: "\eb11"
}

.icofont-file-file:before {
    content: "\eb12"
}

.icofont-file-flv:before {
    content: "\eb13"
}

.icofont-file-gif:before {
    content: "\eb14"
}

.icofont-file-html5:before {
    content: "\eb15"
}

.icofont-file-image:before {
    content: "\eb16"
}

.icofont-file-iso:before {
    content: "\eb17"
}

.icofont-file-java:before {
    content: "\eb18"
}

.icofont-file-javascript:before {
    content: "\eb19"
}

.icofont-file-jpg:before {
    content: "\eb1a"
}

.icofont-file-midi:before {
    content: "\eb1b"
}

.icofont-file-mov:before {
    content: "\eb1c"
}

.icofont-file-mp3:before {
    content: "\eb1d"
}

.icofont-file-pdf:before {
    content: "\eb1e"
}

.icofont-file-php:before {
    content: "\eb1f"
}

.icofont-file-png:before {
    content: "\eb20"
}

.icofont-file-powerpoint:before {
    content: "\eb21"
}

.icofont-file-presentation:before {
    content: "\eb22"
}

.icofont-file-psb:before {
    content: "\eb23"
}

.icofont-file-psd:before {
    content: "\eb24"
}

.icofont-file-python:before {
    content: "\eb25"
}

.icofont-file-ruby:before {
    content: "\eb26"
}

.icofont-file-spreadsheet:before {
    content: "\eb27"
}

.icofont-file-sql:before {
    content: "\eb28"
}

.icofont-file-svg:before {
    content: "\eb29"
}

.icofont-file-text:before {
    content: "\eb2a"
}

.icofont-file-tiff:before {
    content: "\eb2b"
}

.icofont-file-video:before {
    content: "\eb2c"
}

.icofont-file-wave:before {
    content: "\eb2d"
}

.icofont-file-wmv:before {
    content: "\eb2e"
}

.icofont-file-word:before {
    content: "\eb2f"
}

.icofont-file-zip:before {
    content: "\eb30"
}

.icofont-cycling-alt:before {
    content: "\eb31"
}

.icofont-cycling:before {
    content: "\eb32"
}

.icofont-dumbbell:before {
    content: "\eb33"
}

.icofont-dumbbells:before {
    content: "\eb34"
}

.icofont-gym-alt-1:before {
    content: "\eb35"
}

.icofont-gym-alt-2:before {
    content: "\eb36"
}

.icofont-gym-alt-3:before {
    content: "\eb37"
}

.icofont-gym:before {
    content: "\eb38"
}

.icofont-muscle-weight:before {
    content: "\eb39"
}

.icofont-muscle:before {
    content: "\eb3a"
}

.icofont-apple:before {
    content: "\eb3b"
}

.icofont-arabian-coffee:before {
    content: "\eb3c"
}

.icofont-artichoke:before {
    content: "\eb3d"
}

.icofont-asparagus:before {
    content: "\eb3e"
}

.icofont-avocado:before {
    content: "\eb3f"
}

.icofont-baby-food:before {
    content: "\eb40"
}

.icofont-banana:before {
    content: "\eb41"
}

.icofont-bbq:before {
    content: "\eb42"
}

.icofont-beans:before {
    content: "\eb43"
}

.icofont-beer:before {
    content: "\eb44"
}

.icofont-bell-pepper-capsicum:before {
    content: "\eb45"
}

.icofont-birthday-cake:before {
    content: "\eb46"
}

.icofont-bread:before {
    content: "\eb47"
}

.icofont-broccoli:before {
    content: "\eb48"
}

.icofont-burger:before {
    content: "\eb49"
}

.icofont-cabbage:before {
    content: "\eb4a"
}

.icofont-carrot:before {
    content: "\eb4b"
}

.icofont-cauli-flower:before {
    content: "\eb4c"
}

.icofont-cheese:before {
    content: "\eb4d"
}

.icofont-chef:before {
    content: "\eb4e"
}

.icofont-cherry:before {
    content: "\eb4f"
}

.icofont-chicken-fry:before {
    content: "\eb50"
}

.icofont-chicken:before {
    content: "\eb51"
}

.icofont-cocktail:before {
    content: "\eb52"
}

.icofont-coconut-water:before {
    content: "\eb53"
}

.icofont-coconut:before {
    content: "\eb54"
}

.icofont-coffee-alt:before {
    content: "\eb55"
}

.icofont-coffee-cup:before {
    content: "\eb56"
}

.icofont-coffee-mug:before {
    content: "\eb57"
}

.icofont-coffee-pot:before {
    content: "\eb58"
}

.icofont-cola:before {
    content: "\eb59"
}

.icofont-corn:before {
    content: "\eb5a"
}

.icofont-croissant:before {
    content: "\eb5b"
}

.icofont-crop-plant:before {
    content: "\eb5c"
}

.icofont-cucumber:before {
    content: "\eb5d"
}

.icofont-culinary:before {
    content: "\eb5e"
}

.icofont-cup-cake:before {
    content: "\eb5f"
}

.icofont-dining-table:before {
    content: "\eb60"
}

.icofont-donut:before {
    content: "\eb61"
}

.icofont-egg-plant:before {
    content: "\eb62"
}

.icofont-egg-poached:before {
    content: "\eb63"
}

.icofont-farmer-alt:before {
    content: "\eb64"
}

.icofont-farmer:before {
    content: "\eb65"
}

.icofont-fast-food:before {
    content: "\eb66"
}

.icofont-food-basket:before {
    content: "\eb67"
}

.icofont-food-cart:before {
    content: "\eb68"
}

.icofont-fork-and-knife:before {
    content: "\eb69"
}

.icofont-french-fries:before {
    content: "\eb6a"
}

.icofont-fruits:before {
    content: "\eb6b"
}

.icofont-grapes:before {
    content: "\eb6c"
}

.icofont-honey:before {
    content: "\eb6d"
}

.icofont-hot-dog:before {
    content: "\eb6e"
}

.icofont-ice-cream-alt:before {
    content: "\eb6f"
}

.icofont-ice-cream:before {
    content: "\eb70"
}

.icofont-juice:before {
    content: "\eb71"
}

.icofont-ketchup:before {
    content: "\eb72"
}

.icofont-kiwi:before {
    content: "\eb73"
}

.icofont-layered-cake:before {
    content: "\eb74"
}

.icofont-lemon-alt:before {
    content: "\eb75"
}

.icofont-lemon:before {
    content: "\eb76"
}

.icofont-lobster:before {
    content: "\eb77"
}

.icofont-mango:before {
    content: "\eb78"
}

.icofont-milk:before {
    content: "\eb79"
}

.icofont-mushroom:before {
    content: "\eb7a"
}

.icofont-noodles:before {
    content: "\eb7b"
}

.icofont-onion:before {
    content: "\eb7c"
}

.icofont-orange:before {
    content: "\eb7d"
}

.icofont-pear:before {
    content: "\eb7e"
}

.icofont-peas:before {
    content: "\eb7f"
}

.icofont-pepper:before {
    content: "\eb80"
}

.icofont-pie-alt:before {
    content: "\eb81"
}

.icofont-pie:before {
    content: "\eb82"
}

.icofont-pineapple:before {
    content: "\eb83"
}

.icofont-pizza-slice:before {
    content: "\eb84"
}

.icofont-pizza:before {
    content: "\eb85"
}

.icofont-plant:before {
    content: "\eb86"
}

.icofont-popcorn:before {
    content: "\eb87"
}

.icofont-potato:before {
    content: "\eb88"
}

.icofont-pumpkin:before {
    content: "\eb89"
}

.icofont-raddish:before {
    content: "\eb8a"
}

.icofont-restaurant-menu:before {
    content: "\eb8b"
}

.icofont-restaurant:before {
    content: "\eb8c"
}

.icofont-salt-and-pepper:before {
    content: "\eb8d"
}

.icofont-sandwich:before {
    content: "\eb8e"
}

.icofont-sausage:before {
    content: "\eb8f"
}

.icofont-soft-drinks:before {
    content: "\eb90"
}

.icofont-soup-bowl:before {
    content: "\eb91"
}

.icofont-spoon-and-fork:before {
    content: "\eb92"
}

.icofont-steak:before {
    content: "\eb93"
}

.icofont-strawberry:before {
    content: "\eb94"
}

.icofont-sub-sandwich:before {
    content: "\eb95"
}

.icofont-sushi:before {
    content: "\eb96"
}

.icofont-taco:before {
    content: "\eb97"
}

.icofont-tea-pot:before {
    content: "\eb98"
}

.icofont-tea:before {
    content: "\eb99"
}

.icofont-tomato:before {
    content: "\eb9a"
}

.icofont-watermelon:before {
    content: "\eb9b"
}

.icofont-wheat:before {
    content: "\eb9c"
}

.icofont-baby-backpack:before {
    content: "\eb9d"
}

.icofont-baby-cloth:before {
    content: "\eb9e"
}

.icofont-baby-milk-bottle:before {
    content: "\eb9f"
}

.icofont-baby-trolley:before {
    content: "\eba0"
}

.icofont-baby:before {
    content: "\eba1"
}

.icofont-candy:before {
    content: "\eba2"
}

.icofont-holding-hands:before {
    content: "\eba3"
}

.icofont-infant-nipple:before {
    content: "\eba4"
}

.icofont-kids-scooter:before {
    content: "\eba5"
}

.icofont-safety-pin:before {
    content: "\eba6"
}

.icofont-teddy-bear:before {
    content: "\eba7"
}

.icofont-toy-ball:before {
    content: "\eba8"
}

.icofont-toy-cat:before {
    content: "\eba9"
}

.icofont-toy-duck:before {
    content: "\ebaa"
}

.icofont-toy-elephant:before {
    content: "\ebab"
}

.icofont-toy-hand:before {
    content: "\ebac"
}

.icofont-toy-horse:before {
    content: "\ebad"
}

.icofont-toy-lattu:before {
    content: "\ebae"
}

.icofont-toy-train:before {
    content: "\ebaf"
}

.icofont-burglar:before {
    content: "\ebb0"
}

.icofont-cannon-firing:before {
    content: "\ebb1"
}

.icofont-cc-camera:before {
    content: "\ebb2"
}

.icofont-cop-badge:before {
    content: "\ebb3"
}

.icofont-cop:before {
    content: "\ebb4"
}

.icofont-court-hammer:before {
    content: "\ebb5"
}

.icofont-court:before {
    content: "\ebb6"
}

.icofont-finger-print:before {
    content: "\ebb7"
}

.icofont-gavel:before {
    content: "\ebb8"
}

.icofont-handcuff-alt:before {
    content: "\ebb9"
}

.icofont-handcuff:before {
    content: "\ebba"
}

.icofont-investigation:before {
    content: "\ebbb"
}

.icofont-investigator:before {
    content: "\ebbc"
}

.icofont-jail:before {
    content: "\ebbd"
}

.icofont-judge:before {
    content: "\ebbe"
}

.icofont-law-alt-1:before {
    content: "\ebbf"
}

.icofont-law-alt-2:before {
    content: "\ebc0"
}

.icofont-law-alt-3:before {
    content: "\ebc1"
}

.icofont-law-book:before {
    content: "\ebc2"
}

.icofont-law-document:before {
    content: "\ebc3"
}

.icofont-law-order:before {
    content: "\ebc4"
}

.icofont-law-protect:before {
    content: "\ebc5"
}

.icofont-law-scales:before {
    content: "\ebc6"
}

.icofont-law:before {
    content: "\ebc7"
}

.icofont-lawyer-alt-1:before {
    content: "\ebc8"
}

.icofont-lawyer-alt-2:before {
    content: "\ebc9"
}

.icofont-lawyer:before {
    content: "\ebca"
}

.icofont-legal:before {
    content: "\ebcb"
}

.icofont-pistol:before {
    content: "\ebcc"
}

.icofont-police-badge:before {
    content: "\ebcd"
}

.icofont-police-cap:before {
    content: "\ebce"
}

.icofont-police-car-alt-1:before {
    content: "\ebcf"
}

.icofont-police-car-alt-2:before {
    content: "\ebd0"
}

.icofont-police-car:before {
    content: "\ebd1"
}

.icofont-police-hat:before {
    content: "\ebd2"
}

.icofont-police-van:before {
    content: "\ebd3"
}

.icofont-police:before {
    content: "\ebd4"
}

.icofont-thief-alt:before {
    content: "\ebd5"
}

.icofont-thief:before {
    content: "\ebd6"
}

.icofont-abacus-alt:before {
    content: "\ebd7"
}

.icofont-abacus:before {
    content: "\ebd8"
}

.icofont-angle-180:before {
    content: "\ebd9"
}

.icofont-angle-45:before {
    content: "\ebda"
}

.icofont-angle-90:before {
    content: "\ebdb"
}

.icofont-angle:before {
    content: "\ebdc"
}

.icofont-calculator-alt-1:before {
    content: "\ebdd"
}

.icofont-calculator-alt-2:before {
    content: "\ebde"
}

.icofont-calculator:before {
    content: "\ebdf"
}

.icofont-circle-ruler-alt:before {
    content: "\ebe0"
}

.icofont-circle-ruler:before {
    content: "\ebe1"
}

.icofont-compass-alt-1:before {
    content: "\ebe2"
}

.icofont-compass-alt-2:before {
    content: "\ebe3"
}

.icofont-compass-alt-3:before {
    content: "\ebe4"
}

.icofont-compass-alt-4:before {
    content: "\ebe5"
}

.icofont-golden-ratio:before {
    content: "\ebe6"
}

.icofont-marker-alt-1:before {
    content: "\ebe7"
}

.icofont-marker-alt-2:before {
    content: "\ebe8"
}

.icofont-marker-alt-3:before {
    content: "\ebe9"
}

.icofont-marker:before {
    content: "\ebea"
}

.icofont-math:before {
    content: "\ebeb"
}

.icofont-mathematical-alt-1:before {
    content: "\ebec"
}

.icofont-mathematical-alt-2:before {
    content: "\ebed"
}

.icofont-mathematical:before {
    content: "\ebee"
}

.icofont-pen-alt-1:before {
    content: "\ebef"
}

.icofont-pen-alt-2:before {
    content: "\ebf0"
}

.icofont-pen-alt-3:before {
    content: "\ebf1"
}

.icofont-pen-holder-alt-1:before {
    content: "\ebf2"
}

.icofont-pen-holder:before {
    content: "\ebf3"
}

.icofont-pen:before {
    content: "\ebf4"
}

.icofont-pencil-alt-1:before {
    content: "\ebf5"
}

.icofont-pencil-alt-2:before {
    content: "\ebf6"
}

.icofont-pencil-alt-3:before {
    content: "\ebf7"
}

.icofont-pencil-alt-4:before {
    content: "\ebf8"
}

.icofont-pencil:before {
    content: "\ebf9"
}

.icofont-ruler-alt-1:before {
    content: "\ebfa"
}

.icofont-ruler-alt-2:before {
    content: "\ebfb"
}

.icofont-ruler-compass-alt:before {
    content: "\ebfc"
}

.icofont-ruler-compass:before {
    content: "\ebfd"
}

.icofont-ruler-pencil-alt-1:before {
    content: "\ebfe"
}

.icofont-ruler-pencil-alt-2:before {
    content: "\ebff"
}

.icofont-ruler-pencil:before {
    content: "\ec00"
}

.icofont-ruler:before {
    content: "\ec01"
}

.icofont-rulers-alt:before {
    content: "\ec02"
}

.icofont-rulers:before {
    content: "\ec03"
}

.icofont-square-root:before {
    content: "\ec04"
}

.icofont-ui-calculator:before {
    content: "\ec05"
}

.icofont-aids:before {
    content: "\ec06"
}

.icofont-ambulance-crescent:before {
    content: "\ec07"
}

.icofont-ambulance-cross:before {
    content: "\ec08"
}

.icofont-ambulance:before {
    content: "\ec09"
}

.icofont-autism:before {
    content: "\ec0a"
}

.icofont-bandage:before {
    content: "\ec0b"
}

.icofont-blind:before {
    content: "\ec0c"
}

.icofont-blood-drop:before {
    content: "\ec0d"
}

.icofont-blood-test:before {
    content: "\ec0e"
}

.icofont-blood:before {
    content: "\ec0f"
}

.icofont-brain-alt:before {
    content: "\ec10"
}

.icofont-brain:before {
    content: "\ec11"
}

.icofont-capsule:before {
    content: "\ec12"
}

.icofont-crutch:before {
    content: "\ec13"
}

.icofont-disabled:before {
    content: "\ec14"
}

.icofont-dna-alt-1:before {
    content: "\ec15"
}

.icofont-dna-alt-2:before {
    content: "\ec16"
}

.icofont-dna:before {
    content: "\ec17"
}

.icofont-doctor-alt:before {
    content: "\ec18"
}

.icofont-doctor:before {
    content: "\ec19"
}

.icofont-drug-pack:before {
    content: "\ec1a"
}

.icofont-drug:before {
    content: "\ec1b"
}

.icofont-first-aid-alt:before {
    content: "\ec1c"
}

.icofont-first-aid:before {
    content: "\ec1d"
}

.icofont-heart-beat-alt:before {
    content: "\ec1e"
}

.icofont-heart-beat:before {
    content: "\ec1f"
}

.icofont-heartbeat:before {
    content: "\ec20"
}

.icofont-herbal:before {
    content: "\ec21"
}

.icofont-hospital:before {
    content: "\ec22"
}

.icofont-icu:before {
    content: "\ec23"
}

.icofont-injection-syringe:before {
    content: "\ec24"
}

.icofont-laboratory:before {
    content: "\ec25"
}

.icofont-medical-sign-alt:before {
    content: "\ec26"
}

.icofont-medical-sign:before {
    content: "\ec27"
}

.icofont-nurse-alt:before {
    content: "\ec28"
}

.icofont-nurse:before {
    content: "\ec29"
}

.icofont-nursing-home:before {
    content: "\ec2a"
}

.icofont-operation-theater:before {
    content: "\ec2b"
}

.icofont-paralysis-disability:before {
    content: "\ec2c"
}

.icofont-patient-bed:before {
    content: "\ec2d"
}

.icofont-patient-file:before {
    content: "\ec2e"
}

.icofont-pills:before {
    content: "\ec2f"
}

.icofont-prescription:before {
    content: "\ec30"
}

.icofont-pulse:before {
    content: "\ec31"
}

.icofont-stethoscope-alt:before {
    content: "\ec32"
}

.icofont-stethoscope:before {
    content: "\ec33"
}

.icofont-stretcher:before {
    content: "\ec34"
}

.icofont-surgeon-alt:before {
    content: "\ec35"
}

.icofont-surgeon:before {
    content: "\ec36"
}

.icofont-tablets:before {
    content: "\ec37"
}

.icofont-test-bottle:before {
    content: "\ec38"
}

.icofont-test-tube:before {
    content: "\ec39"
}

.icofont-thermometer-alt:before {
    content: "\ec3a"
}

.icofont-thermometer:before {
    content: "\ec3b"
}

.icofont-tooth:before {
    content: "\ec3c"
}

.icofont-xray:before {
    content: "\ec3d"
}

.icofont-ui-add:before {
    content: "\ec3e"
}

.icofont-ui-alarm:before {
    content: "\ec3f"
}

.icofont-ui-battery:before {
    content: "\ec40"
}

.icofont-ui-block:before {
    content: "\ec41"
}

.icofont-ui-bluetooth:before {
    content: "\ec42"
}

.icofont-ui-brightness:before {
    content: "\ec43"
}

.icofont-ui-browser:before {
    content: "\ec44"
}

.icofont-ui-calendar:before {
    content: "\ec45"
}

.icofont-ui-call:before {
    content: "\ec46"
}

.icofont-ui-camera:before {
    content: "\ec47"
}

.icofont-ui-cart:before {
    content: "\ec48"
}

.icofont-ui-cell-phone:before {
    content: "\ec49"
}

.icofont-ui-chat:before {
    content: "\ec4a"
}

.icofont-ui-check:before {
    content: "\ec4b"
}

.icofont-ui-clip-board:before {
    content: "\ec4c"
}

.icofont-ui-clip:before {
    content: "\ec4d"
}

.icofont-ui-clock:before {
    content: "\ec4e"
}

.icofont-ui-close:before {
    content: "\ec4f"
}

.icofont-ui-contact-list:before {
    content: "\ec50"
}

.icofont-ui-copy:before {
    content: "\ec51"
}

.icofont-ui-cut:before {
    content: "\ec52"
}

.icofont-ui-delete:before {
    content: "\ec53"
}

.icofont-ui-dial-phone:before {
    content: "\ec54"
}

.icofont-ui-edit:before {
    content: "\ec55"
}

.icofont-ui-email:before {
    content: "\ec56"
}

.icofont-ui-file:before {
    content: "\ec57"
}

.icofont-ui-fire-wall:before {
    content: "\ec58"
}

.icofont-ui-flash-light:before {
    content: "\ec59"
}

.icofont-ui-flight:before {
    content: "\ec5a"
}

.icofont-ui-folder:before {
    content: "\ec5b"
}

.icofont-ui-game:before {
    content: "\ec5c"
}

.icofont-ui-handicapped:before {
    content: "\ec5d"
}

.icofont-ui-home:before {
    content: "\ec5e"
}

.icofont-ui-image:before {
    content: "\ec5f"
}

.icofont-ui-laoding:before {
    content: "\ec60"
}

.icofont-ui-lock:before {
    content: "\ec61"
}

.icofont-ui-love-add:before {
    content: "\ec62"
}

.icofont-ui-love-broken:before {
    content: "\ec63"
}

.icofont-ui-love-remove:before {
    content: "\ec64"
}

.icofont-ui-love:before {
    content: "\ec65"
}

.icofont-ui-map:before {
    content: "\ec66"
}

.icofont-ui-message:before {
    content: "\ec67"
}

.icofont-ui-messaging:before {
    content: "\ec68"
}

.icofont-ui-movie:before {
    content: "\ec69"
}

.icofont-ui-music-player:before {
    content: "\ec6a"
}

.icofont-ui-music:before {
    content: "\ec6b"
}

.icofont-ui-mute:before {
    content: "\ec6c"
}

.icofont-ui-network:before {
    content: "\ec6d"
}

.icofont-ui-next:before {
    content: "\ec6e"
}

.icofont-ui-note:before {
    content: "\ec6f"
}

.icofont-ui-office:before {
    content: "\ec70"
}

.icofont-ui-password:before {
    content: "\ec71"
}

.icofont-ui-pause:before {
    content: "\ec72"
}

.icofont-ui-play-stop:before {
    content: "\ec73"
}

.icofont-ui-play:before {
    content: "\ec74"
}

.icofont-ui-pointer:before {
    content: "\ec75"
}

.icofont-ui-power:before {
    content: "\ec76"
}

.icofont-ui-press:before {
    content: "\ec77"
}

.icofont-ui-previous:before {
    content: "\ec78"
}

.icofont-ui-rate-add:before {
    content: "\ec79"
}

.icofont-ui-rate-blank:before {
    content: "\ec7a"
}

.icofont-ui-rate-remove:before {
    content: "\ec7b"
}

.icofont-ui-rating:before {
    content: "\ec7c"
}

.icofont-ui-record:before {
    content: "\ec7d"
}

.icofont-ui-remove:before {
    content: "\ec7e"
}

.icofont-ui-reply:before {
    content: "\ec7f"
}

.icofont-ui-rotation:before {
    content: "\ec80"
}

.icofont-ui-rss:before {
    content: "\ec81"
}

.icofont-ui-search:before {
    content: "\ec82"
}

.icofont-ui-settings:before {
    content: "\ec83"
}

.icofont-ui-social-link:before {
    content: "\ec84"
}

.icofont-ui-tag:before {
    content: "\ec85"
}

.icofont-ui-text-chat:before {
    content: "\ec86"
}

.icofont-ui-text-loading:before {
    content: "\ec87"
}

.icofont-ui-theme:before {
    content: "\ec88"
}

.icofont-ui-timer:before {
    content: "\ec89"
}

.icofont-ui-touch-phone:before {
    content: "\ec8a"
}

.icofont-ui-travel:before {
    content: "\ec8b"
}

.icofont-ui-unlock:before {
    content: "\ec8c"
}

.icofont-ui-user-group:before {
    content: "\ec8d"
}

.icofont-ui-user:before {
    content: "\ec8e"
}

.icofont-ui-v-card:before {
    content: "\ec8f"
}

.icofont-ui-video-chat:before {
    content: "\ec90"
}

.icofont-ui-video-message:before {
    content: "\ec91"
}

.icofont-ui-video-play:before {
    content: "\ec92"
}

.icofont-ui-video:before {
    content: "\ec93"
}

.icofont-ui-volume:before {
    content: "\ec94"
}

.icofont-ui-weather:before {
    content: "\ec95"
}

.icofont-ui-wifi:before {
    content: "\ec96"
}

.icofont-ui-zoom-in:before {
    content: "\ec97"
}

.icofont-ui-zoom-out:before {
    content: "\ec98"
}

.icofont-cassette-player:before {
    content: "\ec99"
}

.icofont-cassette:before {
    content: "\ec9a"
}

.icofont-forward:before {
    content: "\ec9b"
}

.icofont-guiter:before {
    content: "\ec9c"
}

.icofont-movie:before {
    content: "\ec9d"
}

.icofont-multimedia:before {
    content: "\ec9e"
}

.icofont-music-alt:before {
    content: "\ec9f"
}

.icofont-music-disk:before {
    content: "\eca0"
}

.icofont-music-note:before {
    content: "\eca1"
}

.icofont-music-notes:before {
    content: "\eca2"
}

.icofont-music:before {
    content: "\eca3"
}

.icofont-mute-volume:before {
    content: "\eca4"
}

.icofont-pause:before {
    content: "\eca5"
}

.icofont-play-alt-1:before {
    content: "\eca6"
}

.icofont-play-alt-2:before {
    content: "\eca7"
}

.icofont-play-alt-3:before {
    content: "\eca8"
}

.icofont-play-pause:before {
    content: "\eca9"
}

.icofont-play:before {
    content: "\ecaa"
}

.icofont-record:before {
    content: "\ecab"
}

.icofont-retro-music-disk:before {
    content: "\ecac"
}

.icofont-rewind:before {
    content: "\ecad"
}

.icofont-song-notes:before {
    content: "\ecae"
}

.icofont-sound-wave-alt:before {
    content: "\ecaf"
}

.icofont-sound-wave:before {
    content: "\ecb0"
}

.icofont-stop:before {
    content: "\ecb1"
}

.icofont-video-alt:before {
    content: "\ecb2"
}

.icofont-video-cam:before {
    content: "\ecb3"
}

.icofont-video-clapper:before {
    content: "\ecb4"
}

.icofont-video:before {
    content: "\ecb5"
}

.icofont-volume-bar:before {
    content: "\ecb6"
}

.icofont-volume-down:before {
    content: "\ecb7"
}

.icofont-volume-mute:before {
    content: "\ecb8"
}

.icofont-volume-off:before {
    content: "\ecb9"
}

.icofont-volume-up:before {
    content: "\ecba"
}

.icofont-youtube-play:before {
    content: "\ecbb"
}

.icofont-2checkout-alt:before {
    content: "\ecbc"
}

.icofont-2checkout:before {
    content: "\ecbd"
}

.icofont-amazon-alt:before {
    content: "\ecbe"
}

.icofont-amazon:before {
    content: "\ecbf"
}

.icofont-american-express-alt:before {
    content: "\ecc0"
}

.icofont-american-express:before {
    content: "\ecc1"
}

.icofont-apple-pay-alt:before {
    content: "\ecc2"
}

.icofont-apple-pay:before {
    content: "\ecc3"
}

.icofont-bank-transfer-alt:before {
    content: "\ecc4"
}

.icofont-bank-transfer:before {
    content: "\ecc5"
}

.icofont-braintree-alt:before {
    content: "\ecc6"
}

.icofont-braintree:before {
    content: "\ecc7"
}

.icofont-cash-on-delivery-alt:before {
    content: "\ecc8"
}

.icofont-cash-on-delivery:before {
    content: "\ecc9"
}

.icofont-diners-club-alt-1:before {
    content: "\ecca"
}

.icofont-diners-club-alt-2:before {
    content: "\eccb"
}

.icofont-diners-club-alt-3:before {
    content: "\eccc"
}

.icofont-diners-club:before {
    content: "\eccd"
}

.icofont-discover-alt:before {
    content: "\ecce"
}

.icofont-discover:before {
    content: "\eccf"
}

.icofont-eway-alt:before {
    content: "\ecd0"
}

.icofont-eway:before {
    content: "\ecd1"
}

.icofont-google-wallet-alt-1:before {
    content: "\ecd2"
}

.icofont-google-wallet-alt-2:before {
    content: "\ecd3"
}

.icofont-google-wallet-alt-3:before {
    content: "\ecd4"
}

.icofont-google-wallet:before {
    content: "\ecd5"
}

.icofont-jcb-alt:before {
    content: "\ecd6"
}

.icofont-jcb:before {
    content: "\ecd7"
}

.icofont-maestro-alt:before {
    content: "\ecd8"
}

.icofont-maestro:before {
    content: "\ecd9"
}

.icofont-mastercard-alt:before {
    content: "\ecda"
}

.icofont-mastercard:before {
    content: "\ecdb"
}

.icofont-payoneer-alt:before {
    content: "\ecdc"
}

.icofont-payoneer:before {
    content: "\ecdd"
}

.icofont-paypal-alt:before {
    content: "\ecde"
}

.icofont-paypal:before {
    content: "\ecdf"
}

.icofont-sage-alt:before {
    content: "\ece0"
}

.icofont-sage:before {
    content: "\ece1"
}

.icofont-skrill-alt:before {
    content: "\ece2"
}

.icofont-skrill:before {
    content: "\ece3"
}

.icofont-stripe-alt:before {
    content: "\ece4"
}

.icofont-stripe:before {
    content: "\ece5"
}

.icofont-visa-alt:before {
    content: "\ece6"
}

.icofont-visa-electron:before {
    content: "\ece7"
}

.icofont-visa:before {
    content: "\ece8"
}

.icofont-western-union-alt:before {
    content: "\ece9"
}

.icofont-western-union:before {
    content: "\ecea"
}

.icofont-boy:before {
    content: "\eceb"
}

.icofont-business-man-alt-1:before {
    content: "\ecec"
}

.icofont-business-man-alt-2:before {
    content: "\eced"
}

.icofont-business-man-alt-3:before {
    content: "\ecee"
}

.icofont-business-man:before {
    content: "\ecef"
}

.icofont-female:before {
    content: "\ecf0"
}

.icofont-funky-man:before {
    content: "\ecf1"
}

.icofont-girl-alt:before {
    content: "\ecf2"
}

.icofont-girl:before {
    content: "\ecf3"
}

.icofont-group:before {
    content: "\ecf4"
}

.icofont-hotel-boy-alt:before {
    content: "\ecf5"
}

.icofont-hotel-boy:before {
    content: "\ecf6"
}

.icofont-kid:before {
    content: "\ecf7"
}

.icofont-man-in-glasses:before {
    content: "\ecf8"
}

.icofont-people:before {
    content: "\ecf9"
}

.icofont-support:before {
    content: "\ecfa"
}

.icofont-user-alt-1:before {
    content: "\ecfb"
}

.icofont-user-alt-2:before {
    content: "\ecfc"
}

.icofont-user-alt-3:before {
    content: "\ecfd"
}

.icofont-user-alt-4:before {
    content: "\ecfe"
}

.icofont-user-alt-5:before {
    content: "\ecff"
}

.icofont-user-alt-6:before {
    content: "\ed00"
}

.icofont-user-alt-7:before {
    content: "\ed01"
}

.icofont-user-female:before {
    content: "\ed02"
}

.icofont-user-male:before {
    content: "\ed03"
}

.icofont-user-suited:before {
    content: "\ed04"
}

.icofont-user:before {
    content: "\ed05"
}

.icofont-users-alt-1:before {
    content: "\ed06"
}

.icofont-users-alt-2:before {
    content: "\ed07"
}

.icofont-users-alt-3:before {
    content: "\ed08"
}

.icofont-users-alt-4:before {
    content: "\ed09"
}

.icofont-users-alt-5:before {
    content: "\ed0a"
}

.icofont-users-alt-6:before {
    content: "\ed0b"
}

.icofont-users-social:before {
    content: "\ed0c"
}

.icofont-users:before {
    content: "\ed0d"
}

.icofont-waiter-alt:before {
    content: "\ed0e"
}

.icofont-waiter:before {
    content: "\ed0f"
}

.icofont-woman-in-glasses:before {
    content: "\ed10"
}

.icofont-search-1:before {
    content: "\ed11"
}

.icofont-search-2:before {
    content: "\ed12"
}

.icofont-search-document:before {
    content: "\ed13"
}

.icofont-search-folder:before {
    content: "\ed14"
}

.icofont-search-job:before {
    content: "\ed15"
}

.icofont-search-map:before {
    content: "\ed16"
}

.icofont-search-property:before {
    content: "\ed17"
}

.icofont-search-restaurant:before {
    content: "\ed18"
}

.icofont-search-stock:before {
    content: "\ed19"
}

.icofont-search-user:before {
    content: "\ed1a"
}

.icofont-search:before {
    content: "\ed1b"
}

.icofont-500px:before {
    content: "\ed1c"
}

.icofont-aim:before {
    content: "\ed1d"
}

.icofont-badoo:before {
    content: "\ed1e"
}

.icofont-baidu-tieba:before {
    content: "\ed1f"
}

.icofont-bbm-messenger:before {
    content: "\ed20"
}

.icofont-bebo:before {
    content: "\ed21"
}

.icofont-behance:before {
    content: "\ed22"
}

.icofont-blogger:before {
    content: "\ed23"
}

.icofont-bootstrap:before {
    content: "\ed24"
}

.icofont-brightkite:before {
    content: "\ed25"
}

.icofont-cloudapp:before {
    content: "\ed26"
}

.icofont-concrete5:before {
    content: "\ed27"
}

.icofont-delicious:before {
    content: "\ed28"
}

.icofont-designbump:before {
    content: "\ed29"
}

.icofont-designfloat:before {
    content: "\ed2a"
}

.icofont-deviantart:before {
    content: "\ed2b"
}

.icofont-digg:before {
    content: "\ed2c"
}

.icofont-dotcms:before {
    content: "\ed2d"
}

.icofont-dribbble:before {
    content: "\ed2e"
}

.icofont-dribble:before {
    content: "\ed2f"
}

.icofont-dropbox:before {
    content: "\ed30"
}

.icofont-ebuddy:before {
    content: "\ed31"
}

.icofont-ello:before {
    content: "\ed32"
}

.icofont-ember:before {
    content: "\ed33"
}

.icofont-envato:before {
    content: "\ed34"
}

.icofont-evernote:before {
    content: "\ed35"
}

.icofont-facebook-messenger:before {
    content: "\ed36"
}

.icofont-facebook:before {
    content: "\ed37"
}

.icofont-feedburner:before {
    content: "\ed38"
}

.icofont-flikr:before {
    content: "\ed39"
}

.icofont-folkd:before {
    content: "\ed3a"
}

.icofont-foursquare:before {
    content: "\ed3b"
}

.icofont-friendfeed:before {
    content: "\ed3c"
}

.icofont-ghost:before {
    content: "\ed3d"
}

.icofont-github:before {
    content: "\ed3e"
}

.icofont-gnome:before {
    content: "\ed3f"
}

.icofont-google-buzz:before {
    content: "\ed40"
}

.icofont-google-hangouts:before {
    content: "\ed41"
}

.icofont-google-map:before {
    content: "\ed42"
}

.icofont-google-plus:before {
    content: "\ed43"
}

.icofont-google-talk:before {
    content: "\ed44"
}

.icofont-hype-machine:before {
    content: "\ed45"
}

.icofont-instagram:before {
    content: "\ed46"
}

.icofont-kakaotalk:before {
    content: "\ed47"
}

.icofont-kickstarter:before {
    content: "\ed48"
}

.icofont-kik:before {
    content: "\ed49"
}

.icofont-kiwibox:before {
    content: "\ed4a"
}

.icofont-line-messenger:before {
    content: "\ed4b"
}

.icofont-line:before {
    content: "\ed4c"
}

.icofont-linkedin:before {
    content: "\ed4d"
}

.icofont-linux-mint:before {
    content: "\ed4e"
}

.icofont-live-messenger:before {
    content: "\ed4f"
}

.icofont-livejournal:before {
    content: "\ed50"
}

.icofont-magento:before {
    content: "\ed51"
}

.icofont-meetme:before {
    content: "\ed52"
}

.icofont-meetup:before {
    content: "\ed53"
}

.icofont-mixx:before {
    content: "\ed54"
}

.icofont-newsvine:before {
    content: "\ed55"
}

.icofont-nimbuss:before {
    content: "\ed56"
}

.icofont-odnoklassniki:before {
    content: "\ed57"
}

.icofont-opencart:before {
    content: "\ed58"
}

.icofont-oscommerce:before {
    content: "\ed59"
}

.icofont-pandora:before {
    content: "\ed5a"
}

.icofont-photobucket:before {
    content: "\ed5b"
}

.icofont-picasa:before {
    content: "\ed5c"
}

.icofont-pinterest:before {
    content: "\ed5d"
}

.icofont-prestashop:before {
    content: "\ed5e"
}

.icofont-qik:before {
    content: "\ed5f"
}

.icofont-qq:before {
    content: "\ed60"
}

.icofont-readernaut:before {
    content: "\ed61"
}

.icofont-reddit:before {
    content: "\ed62"
}

.icofont-renren:before {
    content: "\ed63"
}

.icofont-rss:before {
    content: "\ed64"
}

.icofont-shopify:before {
    content: "\ed65"
}

.icofont-silverstripe:before {
    content: "\ed66"
}

.icofont-skype:before {
    content: "\ed67"
}

.icofont-slack:before {
    content: "\ed68"
}

.icofont-slashdot:before {
    content: "\ed69"
}

.icofont-slidshare:before {
    content: "\ed6a"
}

.icofont-smugmug:before {
    content: "\ed6b"
}

.icofont-snapchat:before {
    content: "\ed6c"
}

.icofont-soundcloud:before {
    content: "\ed6d"
}

.icofont-spotify:before {
    content: "\ed6e"
}

.icofont-stack-exchange:before {
    content: "\ed6f"
}

.icofont-stack-overflow:before {
    content: "\ed70"
}

.icofont-steam:before {
    content: "\ed71"
}

.icofont-stumbleupon:before {
    content: "\ed72"
}

.icofont-tagged:before {
    content: "\ed73"
}

.icofont-technorati:before {
    content: "\ed74"
}

.icofont-telegram:before {
    content: "\ed75"
}

.icofont-tinder:before {
    content: "\ed76"
}

.icofont-trello:before {
    content: "\ed77"
}

.icofont-tumblr:before {
    content: "\ed78"
}

.icofont-twitch:before {
    content: "\ed79"
}

.icofont-twitter:before {
    content: "\ed7a"
}

.icofont-typo3:before {
    content: "\ed7b"
}

.icofont-ubercart:before {
    content: "\ed7c"
}

.icofont-viber:before {
    content: "\ed7d"
}

.icofont-viddler:before {
    content: "\ed7e"
}

.icofont-vimeo:before {
    content: "\ed7f"
}

.icofont-vine:before {
    content: "\ed80"
}

.icofont-virb:before {
    content: "\ed81"
}

.icofont-virtuemart:before {
    content: "\ed82"
}

.icofont-vk:before {
    content: "\ed83"
}

.icofont-wechat:before {
    content: "\ed84"
}

.icofont-weibo:before {
    content: "\ed85"
}

.icofont-whatsapp:before {
    content: "\ed86"
}

.icofont-xing:before {
    content: "\ed87"
}

.icofont-yahoo:before {
    content: "\ed88"
}

.icofont-yelp:before {
    content: "\ed89"
}

.icofont-youku:before {
    content: "\ed8a"
}

.icofont-youtube:before {
    content: "\ed8b"
}

.icofont-zencart:before {
    content: "\ed8c"
}

.icofont-badminton-birdie:before {
    content: "\ed8d"
}

.icofont-baseball:before {
    content: "\ed8e"
}

.icofont-baseballer:before {
    content: "\ed8f"
}

.icofont-basketball-hoop:before {
    content: "\ed90"
}

.icofont-basketball:before {
    content: "\ed91"
}

.icofont-billiard-ball:before {
    content: "\ed92"
}

.icofont-boot-alt-1:before {
    content: "\ed93"
}

.icofont-boot-alt-2:before {
    content: "\ed94"
}

.icofont-boot:before {
    content: "\ed95"
}

.icofont-bowling-alt:before {
    content: "\ed96"
}

.icofont-bowling:before {
    content: "\ed97"
}

.icofont-canoe:before {
    content: "\ed98"
}

.icofont-cheer-leader:before {
    content: "\ed99"
}

.icofont-climbing:before {
    content: "\ed9a"
}

.icofont-corner:before {
    content: "\ed9b"
}

.icofont-field-alt:before {
    content: "\ed9c"
}

.icofont-field:before {
    content: "\ed9d"
}

.icofont-football-alt:before {
    content: "\ed9e"
}

.icofont-football-american:before {
    content: "\ed9f"
}

.icofont-football:before {
    content: "\eda0"
}

.icofont-foul:before {
    content: "\eda1"
}

.icofont-goal-keeper:before {
    content: "\eda2"
}

.icofont-goal:before {
    content: "\eda3"
}

.icofont-golf-alt:before {
    content: "\eda4"
}

.icofont-golf-bag:before {
    content: "\eda5"
}

.icofont-golf-cart:before {
    content: "\eda6"
}

.icofont-golf-field:before {
    content: "\eda7"
}

.icofont-golf:before {
    content: "\eda8"
}

.icofont-golfer:before {
    content: "\eda9"
}

.icofont-helmet:before {
    content: "\edaa"
}

.icofont-hockey-alt:before {
    content: "\edab"
}

.icofont-hockey:before {
    content: "\edac"
}

.icofont-ice-skate:before {
    content: "\edad"
}

.icofont-jersey-alt:before {
    content: "\edae"
}

.icofont-jersey:before {
    content: "\edaf"
}

.icofont-jumping:before {
    content: "\edb0"
}

.icofont-kick:before {
    content: "\edb1"
}

.icofont-leg:before {
    content: "\edb2"
}

.icofont-match-review:before {
    content: "\edb3"
}

.icofont-medal-sport:before {
    content: "\edb4"
}

.icofont-offside:before {
    content: "\edb5"
}

.icofont-olympic-logo:before {
    content: "\edb6"
}

.icofont-olympic:before {
    content: "\edb7"
}

.icofont-padding:before {
    content: "\edb8"
}

.icofont-penalty-card:before {
    content: "\edb9"
}

.icofont-racer:before {
    content: "\edba"
}

.icofont-racing-car:before {
    content: "\edbb"
}

.icofont-racing-flag-alt:before {
    content: "\edbc"
}

.icofont-racing-flag:before {
    content: "\edbd"
}

.icofont-racings-wheel:before {
    content: "\edbe"
}

.icofont-referee:before {
    content: "\edbf"
}

.icofont-refree-jersey:before {
    content: "\edc0"
}

.icofont-result-sport:before {
    content: "\edc1"
}

.icofont-rugby-ball:before {
    content: "\edc2"
}

.icofont-rugby-player:before {
    content: "\edc3"
}

.icofont-rugby:before {
    content: "\edc4"
}

.icofont-runner-alt-1:before {
    content: "\edc5"
}

.icofont-runner-alt-2:before {
    content: "\edc6"
}

.icofont-runner:before {
    content: "\edc7"
}

.icofont-score-board:before {
    content: "\edc8"
}

.icofont-skiing-man:before {
    content: "\edc9"
}

.icofont-skydiving-goggles:before {
    content: "\edca"
}

.icofont-snow-mobile:before {
    content: "\edcb"
}

.icofont-steering:before {
    content: "\edcc"
}

.icofont-stopwatch:before {
    content: "\edcd"
}

.icofont-substitute:before {
    content: "\edce"
}

.icofont-swimmer:before {
    content: "\edcf"
}

.icofont-table-tennis:before {
    content: "\edd0"
}

.icofont-team-alt:before {
    content: "\edd1"
}

.icofont-team:before {
    content: "\edd2"
}

.icofont-tennis-player:before {
    content: "\edd3"
}

.icofont-tennis:before {
    content: "\edd4"
}

.icofont-tracking:before {
    content: "\edd5"
}

.icofont-trophy-alt:before {
    content: "\edd6"
}

.icofont-trophy:before {
    content: "\edd7"
}

.icofont-volleyball-alt:before {
    content: "\edd8"
}

.icofont-volleyball-fire:before {
    content: "\edd9"
}

.icofont-volleyball:before {
    content: "\edda"
}

.icofont-water-bottle:before {
    content: "\eddb"
}

.icofont-whistle-alt:before {
    content: "\eddc"
}

.icofont-whistle:before {
    content: "\eddd"
}

.icofont-win-trophy:before {
    content: "\edde"
}

.icofont-align-center:before {
    content: "\eddf"
}

.icofont-align-left:before {
    content: "\ede0"
}

.icofont-align-right:before {
    content: "\ede1"
}

.icofont-all-caps:before {
    content: "\ede2"
}

.icofont-bold:before {
    content: "\ede3"
}

.icofont-brush:before {
    content: "\ede4"
}

.icofont-clip-board:before {
    content: "\ede5"
}

.icofont-code-alt:before {
    content: "\ede6"
}

.icofont-color-bucket:before {
    content: "\ede7"
}

.icofont-color-picker:before {
    content: "\ede8"
}

.icofont-copy-invert:before {
    content: "\ede9"
}

.icofont-copy:before {
    content: "\edea"
}

.icofont-cut:before {
    content: "\edeb"
}

.icofont-delete-alt:before {
    content: "\edec"
}

.icofont-edit-alt:before {
    content: "\eded"
}

.icofont-eraser-alt:before {
    content: "\edee"
}

.icofont-font:before {
    content: "\edef"
}

.icofont-heading:before {
    content: "\edf0"
}

.icofont-indent:before {
    content: "\edf1"
}

.icofont-italic-alt:before {
    content: "\edf2"
}

.icofont-italic:before {
    content: "\edf3"
}

.icofont-justify-all:before {
    content: "\edf4"
}

.icofont-justify-center:before {
    content: "\edf5"
}

.icofont-justify-left:before {
    content: "\edf6"
}

.icofont-justify-right:before {
    content: "\edf7"
}

.icofont-link-broken:before {
    content: "\edf8"
}

.icofont-outdent:before {
    content: "\edf9"
}

.icofont-paper-clip:before {
    content: "\edfa"
}

.icofont-paragraph:before {
    content: "\edfb"
}

.icofont-pin:before {
    content: "\edfc"
}

.icofont-printer:before {
    content: "\edfd"
}

.icofont-redo:before {
    content: "\edfe"
}

.icofont-rotation:before {
    content: "\edff"
}

.icofont-save:before {
    content: "\ee00"
}

.icofont-small-cap:before {
    content: "\ee01"
}

.icofont-strike-through:before {
    content: "\ee02"
}

.icofont-sub-listing:before {
    content: "\ee03"
}

.icofont-subscript:before {
    content: "\ee04"
}

.icofont-superscript:before {
    content: "\ee05"
}

.icofont-table:before {
    content: "\ee06"
}

.icofont-text-height:before {
    content: "\ee07"
}

.icofont-text-width:before {
    content: "\ee08"
}

.icofont-trash:before {
    content: "\ee09"
}

.icofont-underline:before {
    content: "\ee0a"
}

.icofont-undo:before {
    content: "\ee0b"
}

.icofont-air-balloon:before {
    content: "\ee0c"
}

.icofont-airplane-alt:before {
    content: "\ee0d"
}

.icofont-airplane:before {
    content: "\ee0e"
}

.icofont-articulated-truck:before {
    content: "\ee0f"
}

.icofont-auto-mobile:before {
    content: "\ee10"
}

.icofont-auto-rickshaw:before {
    content: "\ee11"
}

.icofont-bicycle-alt-1:before {
    content: "\ee12"
}

.icofont-bicycle-alt-2:before {
    content: "\ee13"
}

.icofont-bicycle:before {
    content: "\ee14"
}

.icofont-bus-alt-1:before {
    content: "\ee15"
}

.icofont-bus-alt-2:before {
    content: "\ee16"
}

.icofont-bus-alt-3:before {
    content: "\ee17"
}

.icofont-bus:before {
    content: "\ee18"
}

.icofont-cab:before {
    content: "\ee19"
}

.icofont-cable-car:before {
    content: "\ee1a"
}

.icofont-car-alt-1:before {
    content: "\ee1b"
}

.icofont-car-alt-2:before {
    content: "\ee1c"
}

.icofont-car-alt-3:before {
    content: "\ee1d"
}

.icofont-car-alt-4:before {
    content: "\ee1e"
}

.icofont-car:before {
    content: "\ee1f"
}

.icofont-delivery-time:before {
    content: "\ee20"
}

.icofont-fast-delivery:before {
    content: "\ee21"
}

.icofont-fire-truck-alt:before {
    content: "\ee22"
}

.icofont-fire-truck:before {
    content: "\ee23"
}

.icofont-free-delivery:before {
    content: "\ee24"
}

.icofont-helicopter:before {
    content: "\ee25"
}

.icofont-motor-bike-alt:before {
    content: "\ee26"
}

.icofont-motor-bike:before {
    content: "\ee27"
}

.icofont-motor-biker:before {
    content: "\ee28"
}

.icofont-oil-truck:before {
    content: "\ee29"
}

.icofont-rickshaw:before {
    content: "\ee2a"
}

.icofont-rocket-alt-1:before {
    content: "\ee2b"
}

.icofont-rocket-alt-2:before {
    content: "\ee2c"
}

.icofont-rocket:before {
    content: "\ee2d"
}

.icofont-sail-boat-alt-1:before {
    content: "\ee2e"
}

.icofont-sail-boat-alt-2:before {
    content: "\ee2f"
}

.icofont-sail-boat:before {
    content: "\ee30"
}

.icofont-scooter:before {
    content: "\ee31"
}

.icofont-sea-plane:before {
    content: "\ee32"
}

.icofont-ship-alt:before {
    content: "\ee33"
}

.icofont-ship:before {
    content: "\ee34"
}

.icofont-speed-boat:before {
    content: "\ee35"
}

.icofont-taxi:before {
    content: "\ee36"
}

.icofont-tractor:before {
    content: "\ee37"
}

.icofont-train-line:before {
    content: "\ee38"
}

.icofont-train-steam:before {
    content: "\ee39"
}

.icofont-tram:before {
    content: "\ee3a"
}

.icofont-truck-alt:before {
    content: "\ee3b"
}

.icofont-truck-loaded:before {
    content: "\ee3c"
}

.icofont-truck:before {
    content: "\ee3d"
}

.icofont-van-alt:before {
    content: "\ee3e"
}

.icofont-van:before {
    content: "\ee3f"
}

.icofont-yacht:before {
    content: "\ee40"
}

.icofont-5-star-hotel:before {
    content: "\ee41"
}

.icofont-air-ticket:before {
    content: "\ee42"
}

.icofont-beach-bed:before {
    content: "\ee43"
}

.icofont-beach:before {
    content: "\ee44"
}

.icofont-camping-vest:before {
    content: "\ee45"
}

.icofont-direction-sign:before {
    content: "\ee46"
}

.icofont-hill-side:before {
    content: "\ee47"
}

.icofont-hill:before {
    content: "\ee48"
}

.icofont-hotel:before {
    content: "\ee49"
}

.icofont-island-alt:before {
    content: "\ee4a"
}

.icofont-island:before {
    content: "\ee4b"
}

.icofont-sandals-female:before {
    content: "\ee4c"
}

.icofont-sandals-male:before {
    content: "\ee4d"
}

.icofont-travelling:before {
    content: "\ee4e"
}

.icofont-breakdown:before {
    content: "\ee4f"
}

.icofont-celsius:before {
    content: "\ee50"
}

.icofont-clouds:before {
    content: "\ee51"
}

.icofont-cloudy:before {
    content: "\ee52"
}

.icofont-dust:before {
    content: "\ee53"
}

.icofont-eclipse:before {
    content: "\ee54"
}

.icofont-fahrenheit:before {
    content: "\ee55"
}

.icofont-forest-fire:before {
    content: "\ee56"
}

.icofont-full-night:before {
    content: "\ee57"
}

.icofont-full-sunny:before {
    content: "\ee58"
}

.icofont-hail-night:before {
    content: "\ee59"
}

.icofont-hail-rainy-night:before {
    content: "\ee5a"
}

.icofont-hail-rainy-sunny:before {
    content: "\ee5b"
}

.icofont-hail-rainy:before {
    content: "\ee5c"
}

.icofont-hail-sunny:before {
    content: "\ee5d"
}

.icofont-hail-thunder-night:before {
    content: "\ee5e"
}

.icofont-hail-thunder-sunny:before {
    content: "\ee5f"
}

.icofont-hail-thunder:before {
    content: "\ee60"
}

.icofont-hail:before {
    content: "\ee61"
}

.icofont-hill-night:before {
    content: "\ee62"
}

.icofont-hill-sunny:before {
    content: "\ee63"
}

.icofont-hurricane:before {
    content: "\ee64"
}

.icofont-meteor:before {
    content: "\ee65"
}

.icofont-night:before {
    content: "\ee66"
}

.icofont-rainy-night:before {
    content: "\ee67"
}

.icofont-rainy-sunny:before {
    content: "\ee68"
}

.icofont-rainy-thunder:before {
    content: "\ee69"
}

.icofont-rainy:before {
    content: "\ee6a"
}

.icofont-snow-alt:before {
    content: "\ee6b"
}

.icofont-snow-flake:before {
    content: "\ee6c"
}

.icofont-snow-temp:before {
    content: "\ee6d"
}

.icofont-snow:before {
    content: "\ee6e"
}

.icofont-snowy-hail:before {
    content: "\ee6f"
}

.icofont-snowy-night-hail:before {
    content: "\ee70"
}

.icofont-snowy-night-rainy:before {
    content: "\ee71"
}

.icofont-snowy-night:before {
    content: "\ee72"
}

.icofont-snowy-rainy:before {
    content: "\ee73"
}

.icofont-snowy-sunny-hail:before {
    content: "\ee74"
}

.icofont-snowy-sunny-rainy:before {
    content: "\ee75"
}

.icofont-snowy-sunny:before {
    content: "\ee76"
}

.icofont-snowy-thunder-night:before {
    content: "\ee77"
}

.icofont-snowy-thunder-sunny:before {
    content: "\ee78"
}

.icofont-snowy-thunder:before {
    content: "\ee79"
}

.icofont-snowy-windy-night:before {
    content: "\ee7a"
}

.icofont-snowy-windy-sunny:before {
    content: "\ee7b"
}

.icofont-snowy-windy:before {
    content: "\ee7c"
}

.icofont-snowy:before {
    content: "\ee7d"
}

.icofont-sun-alt:before {
    content: "\ee7e"
}

.icofont-sun-rise:before {
    content: "\ee7f"
}

.icofont-sun-set:before {
    content: "\ee80"
}

.icofont-sun:before {
    content: "\ee81"
}

.icofont-sunny-day-temp:before {
    content: "\ee82"
}

.icofont-sunny:before {
    content: "\ee83"
}

.icofont-thunder-light:before {
    content: "\ee84"
}

.icofont-tornado:before {
    content: "\ee85"
}

.icofont-umbrella-alt:before {
    content: "\ee86"
}

.icofont-umbrella:before {
    content: "\ee87"
}

.icofont-volcano:before {
    content: "\ee88"
}

.icofont-wave:before {
    content: "\ee89"
}

.icofont-wind-scale-0:before {
    content: "\ee8a"
}

.icofont-wind-scale-1:before {
    content: "\ee8b"
}

.icofont-wind-scale-10:before {
    content: "\ee8c"
}

.icofont-wind-scale-11:before {
    content: "\ee8d"
}

.icofont-wind-scale-12:before {
    content: "\ee8e"
}

.icofont-wind-scale-2:before {
    content: "\ee8f"
}

.icofont-wind-scale-3:before {
    content: "\ee90"
}

.icofont-wind-scale-4:before {
    content: "\ee91"
}

.icofont-wind-scale-5:before {
    content: "\ee92"
}

.icofont-wind-scale-6:before {
    content: "\ee93"
}

.icofont-wind-scale-7:before {
    content: "\ee94"
}

.icofont-wind-scale-8:before {
    content: "\ee95"
}

.icofont-wind-scale-9:before {
    content: "\ee96"
}

.icofont-wind-waves:before {
    content: "\ee97"
}

.icofont-wind:before {
    content: "\ee98"
}

.icofont-windy-hail:before {
    content: "\ee99"
}

.icofont-windy-night:before {
    content: "\ee9a"
}

.icofont-windy-raining:before {
    content: "\ee9b"
}

.icofont-windy-sunny:before {
    content: "\ee9c"
}

.icofont-windy-thunder-raining:before {
    content: "\ee9d"
}

.icofont-windy-thunder:before {
    content: "\ee9e"
}

.icofont-windy:before {
    content: "\ee9f"
}

.icofont-addons:before {
    content: "\eea0"
}

.icofont-address-book:before {
    content: "\eea1"
}

.icofont-adjust:before {
    content: "\eea2"
}

.icofont-alarm:before {
    content: "\eea3"
}

.icofont-anchor:before {
    content: "\eea4"
}

.icofont-archive:before {
    content: "\eea5"
}

.icofont-at:before {
    content: "\eea6"
}

.icofont-attachment:before {
    content: "\eea7"
}

.icofont-audio:before {
    content: "\eea8"
}

.icofont-automation:before {
    content: "\eea9"
}

.icofont-badge:before {
    content: "\eeaa"
}

.icofont-bag-alt:before {
    content: "\eeab"
}

.icofont-bag:before {
    content: "\eeac"
}

.icofont-ban:before {
    content: "\eead"
}

.icofont-bar-code:before {
    content: "\eeae"
}

.icofont-bars:before {
    content: "\eeaf"
}

.icofont-basket:before {
    content: "\eeb0"
}

.icofont-battery-empty:before {
    content: "\eeb1"
}

.icofont-battery-full:before {
    content: "\eeb2"
}

.icofont-battery-half:before {
    content: "\eeb3"
}

.icofont-battery-low:before {
    content: "\eeb4"
}

.icofont-beaker:before {
    content: "\eeb5"
}

.icofont-beard:before {
    content: "\eeb6"
}

.icofont-bed:before {
    content: "\eeb7"
}

.icofont-bell:before {
    content: "\eeb8"
}

.icofont-beverage:before {
    content: "\eeb9"
}

.icofont-bill:before {
    content: "\eeba"
}

.icofont-bin:before {
    content: "\eebb"
}

.icofont-binary:before {
    content: "\eebc"
}

.icofont-binoculars:before {
    content: "\eebd"
}

.icofont-bluetooth:before {
    content: "\eebe"
}

.icofont-bomb:before {
    content: "\eebf"
}

.icofont-book-mark:before {
    content: "\eec0"
}

.icofont-box:before {
    content: "\eec1"
}

.icofont-briefcase:before {
    content: "\eec2"
}

.icofont-broken:before {
    content: "\eec3"
}

.icofont-bucket:before {
    content: "\eec4"
}

.icofont-bucket1:before {
    content: "\eec5"
}

.icofont-bucket2:before {
    content: "\eec6"
}

.icofont-bug:before {
    content: "\eec7"
}

.icofont-building:before {
    content: "\eec8"
}

.icofont-bulb-alt:before {
    content: "\eec9"
}

.icofont-bullet:before {
    content: "\eeca"
}

.icofont-bullhorn:before {
    content: "\eecb"
}

.icofont-bullseye:before {
    content: "\eecc"
}

.icofont-calendar:before {
    content: "\eecd"
}

.icofont-camera-alt:before {
    content: "\eece"
}

.icofont-camera:before {
    content: "\eecf"
}

.icofont-card:before {
    content: "\eed0"
}

.icofont-cart-alt:before {
    content: "\eed1"
}

.icofont-cart:before {
    content: "\eed2"
}

.icofont-cc:before {
    content: "\eed3"
}

.icofont-charging:before {
    content: "\eed4"
}

.icofont-chat:before {
    content: "\eed5"
}

.icofont-check-alt:before {
    content: "\eed6"
}

.icofont-check-circled:before {
    content: "\eed7"
}

.icofont-check:before {
    content: "\eed8"
}

.icofont-checked:before {
    content: "\eed9"
}

.icofont-children-care:before {
    content: "\eeda"
}

.icofont-clip:before {
    content: "\eedb"
}

.icofont-clock-time:before {
    content: "\eedc"
}

.icofont-close-circled:before {
    content: "\eedd"
}

.icofont-close-line-circled:before {
    content: "\eede"
}

.icofont-close-line-squared-alt:before {
    content: "\eedf"
}

.icofont-close-line-squared:before {
    content: "\eee0"
}

.icofont-close-line:before {
    content: "\eee1"
}

.icofont-close-squared-alt:before {
    content: "\eee2"
}

.icofont-close-squared:before {
    content: "\eee3"
}

.icofont-close:before {
    content: "\eee4"
}

.icofont-cloud-download:before {
    content: "\eee5"
}

.icofont-cloud-refresh:before {
    content: "\eee6"
}

.icofont-cloud-upload:before {
    content: "\eee7"
}

.icofont-cloud:before {
    content: "\eee8"
}

.icofont-code-not-allowed:before {
    content: "\eee9"
}

.icofont-code:before {
    content: "\eeea"
}

.icofont-comment:before {
    content: "\eeeb"
}

.icofont-compass-alt:before {
    content: "\eeec"
}

.icofont-compass:before {
    content: "\eeed"
}

.icofont-computer:before {
    content: "\eeee"
}

.icofont-connection:before {
    content: "\eeef"
}

.icofont-console:before {
    content: "\eef0"
}

.icofont-contacts:before {
    content: "\eef1"
}

.icofont-contrast:before {
    content: "\eef2"
}

.icofont-copyright:before {
    content: "\eef3"
}

.icofont-credit-card:before {
    content: "\eef4"
}

.icofont-crop:before {
    content: "\eef5"
}

.icofont-crown:before {
    content: "\eef6"
}

.icofont-cube:before {
    content: "\eef7"
}

.icofont-cubes:before {
    content: "\eef8"
}

.icofont-dashboard-web:before {
    content: "\eef9"
}

.icofont-dashboard:before {
    content: "\eefa"
}

.icofont-data:before {
    content: "\eefb"
}

.icofont-database-add:before {
    content: "\eefc"
}

.icofont-database-locked:before {
    content: "\eefd"
}

.icofont-database-remove:before {
    content: "\eefe"
}

.icofont-database:before {
    content: "\eeff"
}

.icofont-delete:before {
    content: "\ef00"
}

.icofont-diamond:before {
    content: "\ef01"
}

.icofont-dice-multiple:before {
    content: "\ef02"
}

.icofont-dice:before {
    content: "\ef03"
}

.icofont-disc:before {
    content: "\ef04"
}

.icofont-diskette:before {
    content: "\ef05"
}

.icofont-document-folder:before {
    content: "\ef06"
}

.icofont-download-alt:before {
    content: "\ef07"
}

.icofont-download:before {
    content: "\ef08"
}

.icofont-downloaded:before {
    content: "\ef09"
}

.icofont-drag:before {
    content: "\ef0a"
}

.icofont-drag1:before {
    content: "\ef0b"
}

.icofont-drag2:before {
    content: "\ef0c"
}

.icofont-drag3:before {
    content: "\ef0d"
}

.icofont-earth:before {
    content: "\ef0e"
}

.icofont-ebook:before {
    content: "\ef0f"
}

.icofont-edit:before {
    content: "\ef10"
}

.icofont-eject:before {
    content: "\ef11"
}

.icofont-email:before {
    content: "\ef12"
}

.icofont-envelope-open:before {
    content: "\ef13"
}

.icofont-envelope:before {
    content: "\ef14"
}

.icofont-eraser:before {
    content: "\ef15"
}

.icofont-error:before {
    content: "\ef16"
}

.icofont-excavator:before {
    content: "\ef17"
}

.icofont-exchange:before {
    content: "\ef18"
}

.icofont-exclamation-circle:before {
    content: "\ef19"
}

.icofont-exclamation-square:before {
    content: "\ef1a"
}

.icofont-exclamation-tringle:before {
    content: "\ef1b"
}

.icofont-exclamation:before {
    content: "\ef1c"
}

.icofont-exit:before {
    content: "\ef1d"
}

.icofont-expand:before {
    content: "\ef1e"
}

.icofont-external-link:before {
    content: "\ef1f"
}

.icofont-external:before {
    content: "\ef20"
}

.icofont-eye-alt:before {
    content: "\ef21"
}

.icofont-eye-blocked:before {
    content: "\ef22"
}

.icofont-eye-dropper:before {
    content: "\ef23"
}

.icofont-eye:before {
    content: "\ef24"
}

.icofont-favourite:before {
    content: "\ef25"
}

.icofont-fax:before {
    content: "\ef26"
}

.icofont-file-fill:before {
    content: "\ef27"
}

.icofont-film:before {
    content: "\ef28"
}

.icofont-filter:before {
    content: "\ef29"
}

.icofont-fire-alt:before {
    content: "\ef2a"
}

.icofont-fire-burn:before {
    content: "\ef2b"
}

.icofont-fire:before {
    content: "\ef2c"
}

.icofont-flag-alt-1:before {
    content: "\ef2d"
}

.icofont-flag-alt-2:before {
    content: "\ef2e"
}

.icofont-flag:before {
    content: "\ef2f"
}

.icofont-flame-torch:before {
    content: "\ef30"
}

.icofont-flash-light:before {
    content: "\ef31"
}

.icofont-flash:before {
    content: "\ef32"
}

.icofont-flask:before {
    content: "\ef33"
}

.icofont-focus:before {
    content: "\ef34"
}

.icofont-folder-open:before {
    content: "\ef35";
    /* color: #84bd5a */
}

.icofont-folder:before {
    content: "\ef36"
}

.icofont-foot-print:before {
    content: "\ef37"
}

.icofont-garbage:before {
    content: "\ef38"
}

.icofont-gear-alt:before {
    content: "\ef39"
}

.icofont-gear:before {
    content: "\ef3a"
}

.icofont-gears:before {
    content: "\ef3b"
}

.icofont-gift:before {
    content: "\ef3c"
}

.icofont-glass:before {
    content: "\ef3d"
}

.icofont-globe:before {
    content: "\ef3e"
}

.icofont-graffiti:before {
    content: "\ef3f"
}

.icofont-grocery:before {
    content: "\ef40"
}

.icofont-hand:before {
    content: "\ef41"
}

.icofont-hanger:before {
    content: "\ef42"
}

.icofont-hard-disk:before {
    content: "\ef43"
}

.icofont-heart-alt:before {
    content: "\ef44"
}

.icofont-heart:before {
    content: "\ef45"
}

.icofont-history:before {
    content: "\ef46"
}

.icofont-home:before {
    content: "\ef47"
}

.icofont-horn:before {
    content: "\ef48"
}

.icofont-hour-glass:before {
    content: "\ef49"
}

.icofont-id:before {
    content: "\ef4a"
}

.icofont-image:before {
    content: "\ef4b"
}

.icofont-inbox:before {
    content: "\ef4c"
}

.icofont-infinite:before {
    content: "\ef4d"
}

.icofont-info-circle:before {
    content: "\ef4e"
}

.icofont-info-square:before {
    content: "\ef4f"
}

.icofont-info:before {
    content: "\ef50"
}

.icofont-institution:before {
    content: "\ef51"
}

.icofont-interface:before {
    content: "\ef52"
}

.icofont-invisible:before {
    content: "\ef53"
}

.icofont-jacket:before {
    content: "\ef54"
}

.icofont-jar:before {
    content: "\ef55"
}

.icofont-jewlery:before {
    content: "\ef56"
}

.icofont-karate:before {
    content: "\ef57"
}

.icofont-key-hole:before {
    content: "\ef58"
}

.icofont-key:before {
    content: "\ef59"
}

.icofont-label:before {
    content: "\ef5a"
}

.icofont-lamp:before {
    content: "\ef5b"
}

.icofont-layers:before {
    content: "\ef5c"
}

.icofont-layout:before {
    content: "\ef5d"
}

.icofont-leaf:before {
    content: "\ef5e"
}

.icofont-leaflet:before {
    content: "\ef5f"
}

.icofont-learn:before {
    content: "\ef60"
}

.icofont-lego:before {
    content: "\ef61"
}

.icofont-lens:before {
    content: "\ef62"
}

.icofont-letter:before {
    content: "\ef63"
}

.icofont-letterbox:before {
    content: "\ef64"
}

.icofont-library:before {
    content: "\ef65"
}

.icofont-license:before {
    content: "\ef66"
}

.icofont-life-bouy:before {
    content: "\ef67"
}

.icofont-life-buoy:before {
    content: "\ef68"
}

.icofont-life-jacket:before {
    content: "\ef69"
}

.icofont-life-ring:before {
    content: "\ef6a"
}

.icofont-light-bulb:before {
    content: "\ef6b"
}

.icofont-lighter:before {
    content: "\ef6c"
}

.icofont-lightning-ray:before {
    content: "\ef6d"
}

.icofont-like:before {
    content: "\ef6e"
}

.icofont-line-height:before {
    content: "\ef6f"
}

.icofont-link-alt:before {
    content: "\ef70"
}

.icofont-link:before {
    content: "\ef71"
}

.icofont-list:before {
    content: "\ef72"
}

.icofont-listening:before {
    content: "\ef73"
}

.icofont-listine-dots:before {
    content: "\ef74"
}

.icofont-listing-box:before {
    content: "\ef75"
}

.icofont-listing-number:before {
    content: "\ef76"
}

.icofont-live-support:before {
    content: "\ef77"
}

.icofont-location-arrow:before {
    content: "\ef78"
}

.icofont-location-pin:before {
    content: "\ef79"
}

.icofont-lock:before {
    content: "\ef7a"
}

.icofont-login:before {
    content: "\ef7b"
}

.icofont-logout:before {
    content: "\ef7c"
}

.icofont-lollipop:before {
    content: "\ef7d"
}

.icofont-long-drive:before {
    content: "\ef7e"
}

.icofont-look:before {
    content: "\ef7f"
}

.icofont-loop:before {
    content: "\ef80"
}

.icofont-luggage:before {
    content: "\ef81"
}

.icofont-lunch:before {
    content: "\ef82"
}

.icofont-lungs:before {
    content: "\ef83"
}

.icofont-magic-alt:before {
    content: "\ef84"
}

.icofont-magic:before {
    content: "\ef85"
}

.icofont-magnet:before {
    content: "\ef86"
}

.icofont-mail-box:before {
    content: "\ef87"
}

.icofont-mail:before {
    content: "\ef88"
}

.icofont-male:before {
    content: "\ef89"
}

.icofont-map-pins:before {
    content: "\ef8a"
}

.icofont-map:before {
    content: "\ef8b"
}

.icofont-maximize:before {
    content: "\ef8c"
}

.icofont-measure:before {
    content: "\ef8d"
}

.icofont-medicine:before {
    content: "\ef8e"
}

.icofont-mega-phone:before {
    content: "\ef8f"
}

.icofont-megaphone-alt:before {
    content: "\ef90"
}

.icofont-megaphone:before {
    content: "\ef91"
}

.icofont-memorial:before {
    content: "\ef92"
}

.icofont-memory-card:before {
    content: "\ef93"
}

.icofont-mic-mute:before {
    content: "\ef94"
}

.icofont-mic:before {
    content: "\ef95"
}

.icofont-military:before {
    content: "\ef96"
}

.icofont-mill:before {
    content: "\ef97"
}

.icofont-minus-circle:before {
    content: "\ef98"
}

.icofont-minus-square:before {
    content: "\ef99"
}

.icofont-minus:before {
    content: "\ef9a"
}

.icofont-mobile-phone:before {
    content: "\ef9b"
}

.icofont-molecule:before {
    content: "\ef9c"
}

.icofont-money:before {
    content: "\ef9d"
}

.icofont-moon:before {
    content: "\ef9e"
}

.icofont-mop:before {
    content: "\ef9f"
}

.icofont-muffin:before {
    content: "\efa0"
}

.icofont-mustache:before {
    content: "\efa1"
}

.icofont-navigation-menu:before {
    content: "\efa2"
}

.icofont-navigation:before {
    content: "\efa3"
}

.icofont-network-tower:before {
    content: "\efa4"
}

.icofont-network:before {
    content: "\efa5"
}

.icofont-news:before {
    content: "\efa6"
}

.icofont-newspaper:before {
    content: "\efa7"
}

.icofont-no-smoking:before {
    content: "\efa8"
}

.icofont-not-allowed:before {
    content: "\efa9"
}

.icofont-notebook:before {
    content: "\efaa"
}

.icofont-notepad:before {
    content: "\efab"
}

.icofont-notification:before {
    content: "\efac"
}

.icofont-numbered:before {
    content: "\efad"
}

.icofont-opposite:before {
    content: "\efae"
}

.icofont-optic:before {
    content: "\efaf"
}

.icofont-options:before {
    content: "\efb0"
}

.icofont-package:before {
    content: "\efb1"
}

.icofont-page:before {
    content: "\efb2"
}

.icofont-paint:before {
    content: "\efb3"
}

.icofont-paper-plane:before {
    content: "\efb4"
}

.icofont-paperclip:before {
    content: "\efb5"
}

.icofont-papers:before {
    content: "\efb6"
}

.icofont-pay:before {
    content: "\efb7"
}

.icofont-penguin-linux:before {
    content: "\efb8"
}

.icofont-pestle:before {
    content: "\efb9"
}

.icofont-phone-circle:before {
    content: "\efba"
}

.icofont-phone:before {
    content: "\efbb"
}

.icofont-picture:before {
    content: "\efbc"
}

.icofont-pine:before {
    content: "\efbd"
}

.icofont-pixels:before {
    content: "\efbe"
}

.icofont-plugin:before {
    content: "\efbf"
}

.icofont-plus-circle:before {
    content: "\efc0"
}

.icofont-plus-square:before {
    content: "\efc1"
}

.icofont-plus:before {
    content: "\efc2"
}

.icofont-polygonal:before {
    content: "\efc3"
}

.icofont-power:before {
    content: "\efc4"
}

.icofont-price:before {
    content: "\efc5"
}

.icofont-print:before {
    content: "\efc6"
}

.icofont-puzzle:before {
    content: "\efc7"
}

.icofont-qr-code:before {
    content: "\efc8"
}

.icofont-queen:before {
    content: "\efc9"
}

.icofont-question-circle:before {
    content: "\efca"
}

.icofont-question-square:before {
    content: "\efcb"
}

.icofont-question:before {
    content: "\efcc"
}

.icofont-quote-left:before {
    content: "\efcd"
}

.icofont-quote-right:before {
    content: "\efce"
}

.icofont-random:before {
    content: "\efcf"
}

.icofont-recycle:before {
    content: "\efd0"
}

.icofont-refresh:before {
    content: "\efd1"
}

.icofont-repair:before {
    content: "\efd2"
}

.icofont-reply-all:before {
    content: "\efd3"
}

.icofont-reply:before {
    content: "\efd4"
}

.icofont-resize:before {
    content: "\efd5"
}

.icofont-responsive:before {
    content: "\efd6"
}

.icofont-retweet:before {
    content: "\efd7"
}

.icofont-road:before {
    content: "\efd8"
}

.icofont-robot:before {
    content: "\efd9"
}

.icofont-royal:before {
    content: "\efda"
}

.icofont-rss-feed:before {
    content: "\efdb"
}

.icofont-safety:before {
    content: "\efdc"
}

.icofont-sale-discount:before {
    content: "\efdd"
}

.icofont-satellite:before {
    content: "\efde"
}

.icofont-send-mail:before {
    content: "\efdf"
}

.icofont-server:before {
    content: "\efe0"
}

.icofont-settings-alt:before {
    content: "\efe1"
}

.icofont-settings:before {
    content: "\efe2"
}

.icofont-share-alt:before {
    content: "\efe3"
}

.icofont-share-boxed:before {
    content: "\efe4"
}

.icofont-share:before {
    content: "\efe5"
}

.icofont-shield:before {
    content: "\efe6"
}

.icofont-shopping-cart:before {
    content: "\efe7"
}

.icofont-sign-in:before {
    content: "\efe8"
}

.icofont-sign-out:before {
    content: "\efe9"
}

.icofont-signal:before {
    content: "\efea"
}

.icofont-site-map:before {
    content: "\efeb"
}

.icofont-smart-phone:before {
    content: "\efec"
}

.icofont-soccer:before {
    content: "\efed"
}

.icofont-sort-alt:before {
    content: "\efee"
}

.icofont-sort:before {
    content: "\efef"
}

.icofont-space:before {
    content: "\eff0"
}

.icofont-spanner:before {
    content: "\eff1"
}

.icofont-speech-comments:before {
    content: "\eff2"
}

.icofont-speed-meter:before {
    content: "\eff3"
}

.icofont-spinner-alt-1:before {
    content: "\eff4"
}

.icofont-spinner-alt-2:before {
    content: "\eff5"
}

.icofont-spinner-alt-3:before {
    content: "\eff6"
}

.icofont-spinner-alt-4:before {
    content: "\eff7"
}

.icofont-spinner-alt-5:before {
    content: "\eff8"
}

.icofont-spinner-alt-6:before {
    content: "\eff9"
}

.icofont-spinner:before {
    content: "\effa"
}

.icofont-spreadsheet:before {
    content: "\effb"
}

.icofont-square:before {
    content: "\effc"
}

.icofont-ssl-security:before {
    content: "\effd"
}

.icofont-star-alt-1:before {
    content: "\effe"
}

.icofont-star-alt-2:before {
    content: "\efff"
}

.icofont-star:before {
    content: "\f000"
}

.icofont-street-view:before {
    content: "\f001"
}

.icofont-support-faq:before {
    content: "\f002"
}

.icofont-tack-pin:before {
    content: "\f003"
}

.icofont-tag:before {
    content: "\f004"
}

.icofont-tags:before {
    content: "\f005"
}

.icofont-tasks-alt:before {
    content: "\f006"
}

.icofont-tasks:before {
    content: "\f007"
}

.icofont-telephone:before {
    content: "\f008"
}

.icofont-telescope:before {
    content: "\f009"
}

.icofont-terminal:before {
    content: "\f00a"
}

.icofont-thumbs-down:before {
    content: "\f00b"
}

.icofont-thumbs-up:before {
    content: "\f00c"
}

.icofont-tick-boxed:before {
    content: "\f00d"
}

.icofont-tick-mark:before {
    content: "\f00e"
}

.icofont-ticket:before {
    content: "\f00f"
}

.icofont-tie:before {
    content: "\f010"
}

.icofont-toggle-off:before {
    content: "\f011"
}

.icofont-toggle-on:before {
    content: "\f012"
}

.icofont-tools-alt-2:before {
    content: "\f013"
}

.icofont-tools:before {
    content: "\f014"
}

.icofont-touch:before {
    content: "\f015"
}

.icofont-traffic-light:before {
    content: "\f016"
}

.icofont-transparent:before {
    content: "\f017"
}

.icofont-tree:before {
    content: "\f018"
}

.icofont-unique-idea:before {
    content: "\f019"
}

.icofont-unlock:before {
    content: "\f01a"
}

.icofont-unlocked:before {
    content: "\f01b"
}

.icofont-upload-alt:before {
    content: "\f01c"
}

.icofont-upload:before {
    content: "\f01d"
}

.icofont-usb-drive:before {
    content: "\f01e"
}

.icofont-usb:before {
    content: "\f01f"
}

.icofont-vector-path:before {
    content: "\f020"
}

.icofont-verification-check:before {
    content: "\f021"
}

.icofont-wall-clock:before {
    content: "\f022"
}

.icofont-wall:before {
    content: "\f023"
}

.icofont-wallet:before {
    content: "\f024"
}

.icofont-warning-alt:before {
    content: "\f025"
}

.icofont-warning:before {
    content: "\f026"
}

.icofont-water-drop:before {
    content: "\f027"
}

.icofont-web:before {
    content: "\f028"
}

.icofont-wheelchair:before {
    content: "\f029"
}

.icofont-wifi-alt:before {
    content: "\f02a"
}

.icofont-wifi:before {
    content: "\f02b"
}

.icofont-world:before {
    content: "\f02c"
}

.icofont-zigzag:before {
    content: "\f02d"
}

.icofont-zipped:before {
    content: "\f02e"
}

.icofont-xs {
    font-size: .5em
}

.icofont-sm {
    font-size: .75em
}

.icofont-md {
    font-size: 1.25em
}

.icofont-lg {
    font-size: 1.5em
}

.icofont-1x {
    font-size: 1em
}

.icofont-2x {
    font-size: 2em
}

.icofont-3x {
    font-size: 3em
}

.icofont-4x {
    font-size: 4em
}

.icofont-5x {
    font-size: 5em
}

.icofont-6x {
    font-size: 6em
}

.icofont-7x {
    font-size: 7em
}

.icofont-8x {
    font-size: 8em
}

.icofont-9x {
    font-size: 9em
}

.icofont-10x {
    font-size: 10em
}

.icofont-fw {
    text-align: center;
    width: 1.25em
}

.icofont-ul {
    list-style-type: none;
    padding-left: 0;
    margin-left: 0
}

.icofont-ul>li {
    position: relative;
    line-height: 2em
}

.icofont-ul>li .icofont {
    display: inline-block;
    vertical-align: middle
}

.icofont-border {
    border: solid .08em #f1f1f1;
    border-radius: .1em;
    padding: .2em .25em .15em
}

.icofont-pull-left {
    float: left
}

.icofont-pull-right {
    float: right
}

.icofont.icofont-pull-left {
    margin-right: .3em
}

.icofont.icofont-pull-right {
    margin-left: .3em
}

.icofont-spin {
    -webkit-animation: icofont-spin 2s infinite linear;
    animation: icofont-spin 2s infinite linear;
    display: inline-block
}

.icofont-pulse {
    -webkit-animation: icofont-spin 1s infinite steps(8);
    animation: icofont-spin 1s infinite steps(8);
    display: inline-block
}

@-webkit-keyframes icofont-spin {
    0% {
        -webkit-transform: rotate(0);
        transform: rotate(0)
    }

    100% {
        -webkit-transform: rotate(360deg);
        transform: rotate(360deg)
    }
}

@keyframes icofont-spin {
    0% {
        -webkit-transform: rotate(0);
        transform: rotate(0)
    }

    100% {
        -webkit-transform: rotate(360deg);
        transform: rotate(360deg)
    }
}

.icofont-rotate-90 {
    -webkit-transform: rotate(90deg);
    transform: rotate(90deg)
}

.icofont-rotate-180 {
    -webkit-transform: rotate(180deg);
    transform: rotate(180deg)
}

.icofont-rotate-270 {
    -webkit-transform: rotate(270deg);
    transform: rotate(270deg)
}

.icofont-flip-horizontal {
    -webkit-transform: scale(-1, 1);
    transform: scale(-1, 1)
}

.icofont-flip-vertical {
    -webkit-transform: scale(1, -1);
    transform: scale(1, -1)
}

.icofont-flip-horizontal.icofont-flip-vertical {
    -webkit-transform: scale(-1, -1);
    transform: scale(-1, -1)
}

:root .icofont-flip-horizontal, :root .icofont-flip-vertical, :root .icofont-rotate-180, :root .icofont-rotate-270, :root .icofont-rotate-90 {
    -webkit-filter: none;
    filter: none;
    display: inline-block
}

.icofont-inverse {
    color: #fff
}

.sr-only {
    border: 0;
    clip: rect(0, 0, 0, 0);
    height: 1px;
    margin: -1px;
    overflow: hidden;
    padding: 0;
    position: absolute;
    width: 1px
}

.sr-only-focusable:active, .sr-only-focusable:focus {
    clip: auto;
    height: auto;
    margin: 0;
    overflow: visible;
    position: static;
    width: auto
}
</style>
<style>
@-webkit-keyframes rotating {
    from {
        -webkit-transform: rotate(0);
        -o-transform: rotate(0);
        transform: rotate(0)
    }

    to {
        -webkit-transform: rotate(360deg);
        -o-transform: rotate(360deg);
        transform: rotate(360deg)
    }
}

@keyframes rotating {
    from {
        -ms-transform: rotate(0);
        -moz-transform: rotate(0);
        -webkit-transform: rotate(0);
        -o-transform: rotate(0);
        transform: rotate(0)
    }

    to {
        -ms-transform: rotate(360deg);
        -moz-transform: rotate(360deg);
        -webkit-transform: rotate(360deg);
        -o-transform: rotate(360deg);
        transform: rotate(360deg)
    }
}

@-webkit-keyframes rotating {
    from {
        -webkit-transform: rotate(0);
        -o-transform: rotate(0);
        transform: rotate(0)
    }

    to {
        -webkit-transform: rotate(360deg);
        -o-transform: rotate(360deg);
        transform: rotate(360deg)
    }
}

@keyframes rotating {
    from {
        -ms-transform: rotate(0);
        -moz-transform: rotate(0);
        -webkit-transform: rotate(0);
        -o-transform: rotate(0);
        transform: rotate(0)
    }

    to {
        -ms-transform: rotate(360deg);
        -moz-transform: rotate(360deg);
        -webkit-transform: rotate(360deg);
        -o-transform: rotate(360deg);
        transform: rotate(360deg)
    }
}

.flex,.flex-column,.flex-column-center,.flex-row,.flex-row-center {
    display: flex;
    display: -webkit-box;
    display: -moz-box;
    display: -ms-flexbox;
    display: -webkit-flex
}

.flex-column {
    flex-direction: column
}

.flex-column-center {
    flex-direction: column;
    align-items: center
}

.flex-row {
    flex-direction: row
}

.flex-row-center {
    flex-direction: row;
    justify-content: center
}

:root {
    --blue: #007bff;
    --indigo: #6610f2;
    --purple: #6f42c1;
    --pink: #e83e8c;
    --red: #dc3545;
    --orange: #fd7e14;
    --yellow: #ffc107;
    --green: #28a745;
    --teal: #20c997;
    --cyan: #17a2b8;
    --white: #fff;
    --gray: #6c757d;
    --gray-dark: #343a40;
    --primary: #007bff;
    --secondary: #6c757d;
    --success: #28a745;
    --info: #17a2b8;
    --warning: #ffc107;
    --danger: #dc3545;
    --light: #f8f9fa;
    --dark: #343a40;
    --breakpoint-xs: 0;
    --breakpoint-sm: 576px;
    --breakpoint-md: 768px;
    --breakpoint-lg: 992px;
    --breakpoint-xl: 1200px;
    --font-family-sans-serif: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
    --font-family-monospace: SFMono-Regular,Menlo,Monaco,Consolas,"Liberation Mono","Courier New",monospace
}

*,::after,::before {
    box-sizing: border-box
}

html {
    font-family: sans-serif;
    line-height: 1.15;
    -webkit-text-size-adjust: 100%;
    -ms-text-size-adjust: 100%;
    -ms-overflow-style: scrollbar;
    -webkit-tap-highlight-color: rgba(0,0,0,0)
}

@-ms-viewport {
    width: device-width
}

article,aside,figcaption,figure,footer,header,hgroup,main,nav,section {
    display: block
}

body {
    margin: 0;
    font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #212529;
    text-align: left;
    background-color: #fff
}

[tabindex="-1"]:focus {
    outline: 0!important
}

hr {
    box-sizing: content-box;
    height: 0;
    overflow: visible
}

h1,h2,h3,h4,h5,h6 {
    margin-top: 0;
    margin-bottom: .5rem
}

p {
    margin-top: 0;
    margin-bottom: 1rem
}

abbr[data-original-title],abbr[title] {
    text-decoration: underline;
    -webkit-text-decoration: underline dotted;
    text-decoration: underline dotted;
    cursor: help;
    border-bottom: 0
}

address {
    margin-bottom: 1rem;
    font-style: normal;
    line-height: inherit
}

dl,ol,ul {
    margin-top: 0;
    margin-bottom: 1rem
}

ol ol,ol ul,ul ol,ul ul {
    margin-bottom: 0
}

dt {
    font-weight: 700
}

dd {
    margin-bottom: .5rem;
    margin-left: 0
}

blockquote {
    margin: 0 0 1rem
}

dfn {
    font-style: italic
}

b,strong {
    font-weight: bolder
}

small {
    font-size: 80%
}

sub,sup {
    position: relative;
    font-size: 75%;
    line-height: 0;
    vertical-align: baseline
}

sub {
    bottom: -.25em
}

sup {
    top: -.5em
}

a {
    color: #007bff;
    text-decoration: none;
    background-color: transparent;
    -webkit-text-decoration-skip: objects
}

a:hover {
    color: #0056b3;
    text-decoration: underline
}

a:not([href]):not([tabindex]) {
    color: inherit;
    text-decoration: none
}

a:not([href]):not([tabindex]):focus,a:not([href]):not([tabindex]):hover {
    color: inherit;
    text-decoration: none
}

a:not([href]):not([tabindex]):focus {
    outline: 0
}

code,kbd,pre,samp {
    font-family: SFMono-Regular,Menlo,Monaco,Consolas,"Liberation Mono","Courier New",monospace;
    font-size: 1em
}

pre {
    margin-top: 0;
    margin-bottom: 1rem;
    overflow: auto;
    -ms-overflow-style: scrollbar
}

figure {
    margin: 0 0 1rem
}

img {
    vertical-align: middle;
    border-style: none
}

svg:not(:root) {
    overflow: hidden;
    vertical-align: middle
}

table {
    border-collapse: collapse
}

caption {
    padding-top: .75rem;
    padding-bottom: .75rem;
    color: #6c757d;
    text-align: left;
    caption-side: bottom
}

th {
    text-align: inherit
}

label {
    display: inline-block;
    margin-bottom: .5rem
}

button {
    border-radius: 0
}

button:focus {
    outline: 1px dotted;
    outline: 5px auto -webkit-focus-ring-color
}

button,input,optgroup,select,textarea {
    margin: 0;
    font-family: inherit;
    font-size: inherit;
    line-height: inherit
}

button,input {
    overflow: visible
}

button,select {
    text-transform: none
}

[type=reset],[type=submit],button,html [type=button] {
    -webkit-appearance: button
}

[type=button]::-moz-focus-inner,[type=reset]::-moz-focus-inner,[type=submit]::-moz-focus-inner,button::-moz-focus-inner {
    padding: 0;
    border-style: none
}

input[type=checkbox],input[type=radio] {
    box-sizing: border-box;
    padding: 0
}

input[type=date],input[type=datetime-local],input[type=month],input[type=time] {
    -webkit-appearance: listbox
}

textarea {
    overflow: auto;
    resize: vertical
}

fieldset {
    min-width: 0;
    padding: 0;
    margin: 0;
    border: 0
}

legend {
    display: block;
    width: 100%;
    max-width: 100%;
    padding: 0;
    margin-bottom: .5rem;
    font-size: 1.5rem;
    line-height: inherit;
    color: inherit;
    white-space: normal
}

progress {
    vertical-align: baseline
}

[type=number]::-webkit-inner-spin-button,[type=number]::-webkit-outer-spin-button {
    height: auto
}

[type=search] {
    outline-offset: -2px;
    -webkit-appearance: none
}

[type=search]::-webkit-search-cancel-button,[type=search]::-webkit-search-decoration {
    -webkit-appearance: none
}

::-webkit-file-upload-button {
    font: inherit;
    -webkit-appearance: button
}

output {
    display: inline-block
}

summary {
    display: list-item;
    cursor: pointer
}

template {
    display: none
}

[hidden] {
    display: none!important
}

.h1,.h2,.h3,.h4,.h5,.h6,h1,h2,h3,h4,h5,h6 {
    margin-bottom: .5rem;
    font-family: inherit;
    font-weight: 500;
    line-height: 1.2;
    color: inherit
}

.h1,h1 {
    font-size: 2.5rem
}

.h2,h2 {
    font-size: 2rem
}

.h3,h3 {
    font-size: 1.75rem
}

.h4,h4 {
    font-size: 1.5rem
}

.h5,h5 {
    font-size: 1.25rem
}

.h6,h6 {
    font-size: 1rem
}

.lead {
    font-size: 1.25rem;
    font-weight: 300
}

.display-1 {
    font-size: 6rem;
    font-weight: 300;
    line-height: 1.2
}

.display-2 {
    font-size: 5.5rem;
    font-weight: 300;
    line-height: 1.2
}

.display-3 {
    font-size: 4.5rem;
    font-weight: 300;
    line-height: 1.2
}

.display-4 {
    font-size: 3.5rem;
    font-weight: 300;
    line-height: 1.2
}

hr {
    margin-top: 1rem;
    margin-bottom: 1rem;
    border: 0;
    border-top: 1px solid rgba(0,0,0,.1)
}

.small,small {
    font-size: 80%;
    font-weight: 400
}

.mark,mark {
    padding: .2em;
    background-color: #fcf8e3
}

.list-unstyled {
    padding-left: 0;
    list-style: none
}

.list-inline {
    padding-left: 0;
    list-style: none
}

.list-inline-item {
    display: inline-block
}

.list-inline-item:not(:last-child) {
    margin-right: .5rem
}

.initialism {
    font-size: 90%;
    text-transform: uppercase
}

.blockquote {
    margin-bottom: 1rem;
    font-size: 1.25rem
}

.blockquote-footer {
    display: block;
    font-size: 80%;
    color: #6c757d
}

.blockquote-footer::before {
    content: "\2014 \00A0"
}

.img-fluid {
    max-width: 100%;
    height: auto
}

.img-thumbnail {
    padding: .25rem;
    background-color: #fff;
    border: 1px solid #dee2e6;
    border-radius: .25rem;
    max-width: 100%;
    height: auto
}

.figure {
    display: inline-block
}

.figure-img {
    margin-bottom: .5rem;
    line-height: 1
}

.figure-caption {
    font-size: 90%;
    color: #6c757d
}

code {
    font-size: 87.5%;
    color: #e83e8c;
    word-break: break-word
}

a>code {
    color: inherit
}

kbd {
    padding: .2rem .4rem;
    font-size: 87.5%;
    color: #fff;
    background-color: #212529;
    border-radius: .2rem
}

kbd kbd {
    padding: 0;
    font-size: 100%;
    font-weight: 700
}

pre {
    display: block;
    font-size: 87.5%;
    color: #212529
}

pre code {
    font-size: inherit;
    color: inherit;
    word-break: normal
}

.mr-10 {
    margin-right: 10px
}

.mr-15 {
    margin-right: 15px
}

.mr-20 {
    margin-right: 20px
}

.ml-10 {
    margin-left: 10px
}

.ml-15 {
    margin-left: 15px
}

.ml-20 {
    margin-left: 20px
}

.mt-10 {
    margin-top: 10px
}

.mt-15 {
    margin-top: 15px
}

.mt-20 {
    margin-top: 20px
}

.mb-10 {
    margin-bottom: 10px
}

.mb-15 {
    margin-bottom: 15px
}

.mb-20 {
    margin-bottom: 20px
}

.mb-25 {
    margin-bottom: 25px
}

.mb-30 {
    margin-bottom: 30px
}

.text-help {
    font-size: 14px;
    font-weight: 500;
    font-style: italic
}

.text-muted {
    color: #999
}

.text-danger {
    display: inline;
    color: #c62828
}

/*!
* Bootstrap Grid v4.0.0 (https://getbootstrap.com)
* Copyright 2011-2018 The Bootstrap Authors
* Copyright 2011-2018 Twitter, Inc.
* Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
*/
@-ms-viewport {
    width: device-width
}

html {
    box-sizing: border-box;
    -ms-overflow-style: scrollbar
}

*,::after,::before {
    box-sizing: inherit
}

.w-25 {
    width: 25%!important
}

.w-50 {
    width: 50%!important
}

.w-75 {
    width: 75%!important
}

.w-100 {
    width: 100%!important
}

.h-25 {
    height: 25%!important
}

.h-50 {
    height: 50%!important
}

.h-75 {
    height: 75%!important
}

.h-100 {
    height: 100%!important
}

.container,.large__container,.small__container {
    width: 100%;
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto
}

@media (min-width: 576px) {
    .small__container {
        max-width:540px
    }
}

@media (min-width: 768px) {
    .small__container {
        max-width:720px
    }
}

@media (min-width: 992px) {
    .small__container {
        max-width:960px
    }
}

@media (min-width: 1200px) {
    .small__container {
        max-width:970px
    }
}

@media (min-width: 1200px) {
    .large__container {
        max-width:1170px
    }
}

@media (min-width: 1450px) {
    .large__container {
        max-width:1230px
    }
}

@media (min-width: 576px) {
    .container {
        max-width:540px
    }
}

@media (min-width: 768px) {
    .container {
        max-width:720px
    }
}

@media (min-width: 992px) {
    .container {
        max-width:960px
    }
}

@media (min-width: 1200px) {
    .container {
        max-width:1140px
    }
}

.container-fluid {
    width: 100%;
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto
}

.row {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    margin-right: -15px;
    margin-left: -15px
}

.no-gutters {
    margin-right: 0;
    margin-left: 0
}

.no-gutters>.col,.no-gutters>[class*=col-] {
    padding-right: 0;
    padding-left: 0
}

.col,.col-1,.col-10,.col-11,.col-12,.col-2,.col-3,.col-4,.col-5,.col-6,.col-7,.col-8,.col-9,.col-auto,.col-lg,.col-lg-1,.col-lg-10,.col-lg-11,.col-lg-12,.col-lg-2,.col-lg-3,.col-lg-4,.col-lg-5,.col-lg-6,.col-lg-7,.col-lg-8,.col-lg-9,.col-lg-auto,.col-md,.col-md-1,.col-md-10,.col-md-11,.col-md-12,.col-md-2,.col-md-3,.col-md-4,.col-md-5,.col-md-6,.col-md-7,.col-md-8,.col-md-9,.col-md-auto,.col-sm,.col-sm-1,.col-sm-10,.col-sm-11,.col-sm-12,.col-sm-2,.col-sm-3,.col-sm-4,.col-sm-5,.col-sm-6,.col-sm-7,.col-sm-8,.col-sm-9,.col-sm-auto,.col-xl,.col-xl-1,.col-xl-10,.col-xl-11,.col-xl-12,.col-xl-2,.col-xl-3,.col-xl-4,.col-xl-5,.col-xl-6,.col-xl-7,.col-xl-8,.col-xl-9,.col-xl-auto {
    position: relative;
    width: 100%;
    min-height: 1px;
    padding-right: 15px;
    padding-left: 15px
}

.col {
    -ms-flex-preferred-size: 0;
    flex-basis: 0;
    -webkit-box-flex: 1;
    -ms-flex-positive: 1;
    flex-grow: 1;
    max-width: 100%
}

.col-auto {
    -webkit-box-flex: 0;
    -ms-flex: 0 0 auto;
    flex: 0 0 auto;
    width: auto;
    max-width: none
}

.col-1 {
    -webkit-box-flex: 0;
    -ms-flex: 0 0 8.333333%;
    flex: 0 0 8.333333%;
    max-width: 8.333333%
}

.col-2 {
    -webkit-box-flex: 0;
    -ms-flex: 0 0 16.666667%;
    flex: 0 0 16.666667%;
    max-width: 16.666667%
}

.col-3 {
    -webkit-box-flex: 0;
    -ms-flex: 0 0 25%;
    flex: 0 0 25%;
    max-width: 25%
}

.col-4 {
    -webkit-box-flex: 0;
    -ms-flex: 0 0 33.333333%;
    flex: 0 0 33.333333%;
    max-width: 33.333333%
}

.col-5 {
    -webkit-box-flex: 0;
    -ms-flex: 0 0 41.666667%;
    flex: 0 0 41.666667%;
    max-width: 41.666667%
}

.col-6 {
    -webkit-box-flex: 0;
    -ms-flex: 0 0 50%;
    flex: 0 0 50%;
    max-width: 50%
}

.col-7 {
    -webkit-box-flex: 0;
    -ms-flex: 0 0 58.333333%;
    flex: 0 0 58.333333%;
    max-width: 58.333333%
}

.col-8 {
    -webkit-box-flex: 0;
    -ms-flex: 0 0 66.666667%;
    flex: 0 0 66.666667%;
    max-width: 66.666667%
}

.col-9 {
    -webkit-box-flex: 0;
    -ms-flex: 0 0 75%;
    flex: 0 0 75%;
    max-width: 75%
}

.col-10 {
    -webkit-box-flex: 0;
    -ms-flex: 0 0 83.333333%;
    flex: 0 0 83.333333%;
    max-width: 83.333333%
}

.col-11 {
    -webkit-box-flex: 0;
    -ms-flex: 0 0 91.666667%;
    flex: 0 0 91.666667%;
    max-width: 91.666667%
}

.col-12 {
    -webkit-box-flex: 0;
    -ms-flex: 0 0 100%;
    flex: 0 0 100%;
    max-width: 100%
}

.order-first {
    -webkit-box-ordinal-group: 0;
    -ms-flex-order: -1;
    order: -1
}

.order-last {
    -webkit-box-ordinal-group: 14;
    -ms-flex-order: 13;
    order: 13
}

.order-0 {
    -webkit-box-ordinal-group: 1;
    -ms-flex-order: 0;
    order: 0
}

.order-1 {
    -webkit-box-ordinal-group: 2;
    -ms-flex-order: 1;
    order: 1
}

.order-2 {
    -webkit-box-ordinal-group: 3;
    -ms-flex-order: 2;
    order: 2
}

.order-3 {
    -webkit-box-ordinal-group: 4;
    -ms-flex-order: 3;
    order: 3
}

.order-4 {
    -webkit-box-ordinal-group: 5;
    -ms-flex-order: 4;
    order: 4
}

.order-5 {
    -webkit-box-ordinal-group: 6;
    -ms-flex-order: 5;
    order: 5
}

.order-6 {
    -webkit-box-ordinal-group: 7;
    -ms-flex-order: 6;
    order: 6
}

.order-7 {
    -webkit-box-ordinal-group: 8;
    -ms-flex-order: 7;
    order: 7
}

.order-8 {
    -webkit-box-ordinal-group: 9;
    -ms-flex-order: 8;
    order: 8
}

.order-9 {
    -webkit-box-ordinal-group: 10;
    -ms-flex-order: 9;
    order: 9
}

.order-10 {
    -webkit-box-ordinal-group: 11;
    -ms-flex-order: 10;
    order: 10
}

.order-11 {
    -webkit-box-ordinal-group: 12;
    -ms-flex-order: 11;
    order: 11
}

.order-12 {
    -webkit-box-ordinal-group: 13;
    -ms-flex-order: 12;
    order: 12
}

.offset-1 {
    margin-left: 8.333333%
}

.offset-2 {
    margin-left: 16.666667%
}

.offset-3 {
    margin-left: 25%
}

.offset-4 {
    margin-left: 33.333333%
}

.offset-5 {
    margin-left: 41.666667%
}

.offset-6 {
    margin-left: 50%
}

.offset-7 {
    margin-left: 58.333333%
}

.offset-8 {
    margin-left: 66.666667%
}

.offset-9 {
    margin-left: 75%
}

.offset-10 {
    margin-left: 83.333333%
}

.offset-11 {
    margin-left: 91.666667%
}

@media (min-width: 576px) {
    .col-sm {
        -ms-flex-preferred-size:0;
        flex-basis: 0;
        -webkit-box-flex: 1;
        -ms-flex-positive: 1;
        flex-grow: 1;
        max-width: 100%
    }

    .col-sm-auto {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 auto;
        flex: 0 0 auto;
        width: auto;
        max-width: none
    }

    .col-sm-1 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 8.333333%;
        flex: 0 0 8.333333%;
        max-width: 8.333333%
    }

    .col-sm-2 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 16.666667%;
        flex: 0 0 16.666667%;
        max-width: 16.666667%
    }

    .col-sm-3 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 25%;
        flex: 0 0 25%;
        max-width: 25%
    }

    .col-sm-4 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 33.333333%;
        flex: 0 0 33.333333%;
        max-width: 33.333333%
    }

    .col-sm-5 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 41.666667%;
        flex: 0 0 41.666667%;
        max-width: 41.666667%
    }

    .col-sm-6 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 50%;
        flex: 0 0 50%;
        max-width: 50%
    }

    .col-sm-7 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 58.333333%;
        flex: 0 0 58.333333%;
        max-width: 58.333333%
    }

    .col-sm-8 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 66.666667%;
        flex: 0 0 66.666667%;
        max-width: 66.666667%
    }

    .col-sm-9 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 75%;
        flex: 0 0 75%;
        max-width: 75%
    }

    .col-sm-10 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 83.333333%;
        flex: 0 0 83.333333%;
        max-width: 83.333333%
    }

    .col-sm-11 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 91.666667%;
        flex: 0 0 91.666667%;
        max-width: 91.666667%
    }

    .col-sm-12 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 100%;
        flex: 0 0 100%;
        max-width: 100%
    }

    .order-sm-first {
        -webkit-box-ordinal-group: 0;
        -ms-flex-order: -1;
        order: -1
    }

    .order-sm-last {
        -webkit-box-ordinal-group: 14;
        -ms-flex-order: 13;
        order: 13
    }

    .order-sm-0 {
        -webkit-box-ordinal-group: 1;
        -ms-flex-order: 0;
        order: 0
    }

    .order-sm-1 {
        -webkit-box-ordinal-group: 2;
        -ms-flex-order: 1;
        order: 1
    }

    .order-sm-2 {
        -webkit-box-ordinal-group: 3;
        -ms-flex-order: 2;
        order: 2
    }

    .order-sm-3 {
        -webkit-box-ordinal-group: 4;
        -ms-flex-order: 3;
        order: 3
    }

    .order-sm-4 {
        -webkit-box-ordinal-group: 5;
        -ms-flex-order: 4;
        order: 4
    }

    .order-sm-5 {
        -webkit-box-ordinal-group: 6;
        -ms-flex-order: 5;
        order: 5
    }

    .order-sm-6 {
        -webkit-box-ordinal-group: 7;
        -ms-flex-order: 6;
        order: 6
    }

    .order-sm-7 {
        -webkit-box-ordinal-group: 8;
        -ms-flex-order: 7;
        order: 7
    }

    .order-sm-8 {
        -webkit-box-ordinal-group: 9;
        -ms-flex-order: 8;
        order: 8
    }

    .order-sm-9 {
        -webkit-box-ordinal-group: 10;
        -ms-flex-order: 9;
        order: 9
    }

    .order-sm-10 {
        -webkit-box-ordinal-group: 11;
        -ms-flex-order: 10;
        order: 10
    }

    .order-sm-11 {
        -webkit-box-ordinal-group: 12;
        -ms-flex-order: 11;
        order: 11
    }

    .order-sm-12 {
        -webkit-box-ordinal-group: 13;
        -ms-flex-order: 12;
        order: 12
    }

    .offset-sm-0 {
        margin-left: 0
    }

    .offset-sm-1 {
        margin-left: 8.333333%
    }

    .offset-sm-2 {
        margin-left: 16.666667%
    }

    .offset-sm-3 {
        margin-left: 25%
    }

    .offset-sm-4 {
        margin-left: 33.333333%
    }

    .offset-sm-5 {
        margin-left: 41.666667%
    }

    .offset-sm-6 {
        margin-left: 50%
    }

    .offset-sm-7 {
        margin-left: 58.333333%
    }

    .offset-sm-8 {
        margin-left: 66.666667%
    }

    .offset-sm-9 {
        margin-left: 75%
    }

    .offset-sm-10 {
        margin-left: 83.333333%
    }

    .offset-sm-11 {
        margin-left: 91.666667%
    }
}

@media (min-width: 768px) {
    .col-md {
        -ms-flex-preferred-size:0;
        flex-basis: 0;
        -webkit-box-flex: 1;
        -ms-flex-positive: 1;
        flex-grow: 1;
        max-width: 100%
    }

    .col-md-auto {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 auto;
        flex: 0 0 auto;
        width: auto;
        max-width: none
    }

    .col-md-1 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 8.333333%;
        flex: 0 0 8.333333%;
        max-width: 8.333333%
    }

    .col-md-2 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 16.666667%;
        flex: 0 0 16.666667%;
        max-width: 16.666667%
    }

    .col-md-3 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 25%;
        flex: 0 0 25%;
        max-width: 25%
    }

    .col-md-4 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 33.333333%;
        flex: 0 0 33.333333%;
        max-width: 33.333333%
    }

    .col-md-5 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 41.666667%;
        flex: 0 0 41.666667%;
        max-width: 41.666667%
    }

    .col-md-6 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 50%;
        flex: 0 0 50%;
        max-width: 50%
    }

    .col-md-7 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 58.333333%;
        flex: 0 0 58.333333%;
        max-width: 58.333333%
    }

    .col-md-8 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 66.666667%;
        flex: 0 0 66.666667%;
        max-width: 66.666667%
    }

    .col-md-9 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 75%;
        flex: 0 0 75%;
        max-width: 75%
    }

    .col-md-10 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 83.333333%;
        flex: 0 0 83.333333%;
        max-width: 83.333333%
    }

    .col-md-11 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 91.666667%;
        flex: 0 0 91.666667%;
        max-width: 91.666667%
    }

    .col-md-12 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 100%;
        flex: 0 0 100%;
        max-width: 100%
    }

    .order-md-first {
        -webkit-box-ordinal-group: 0;
        -ms-flex-order: -1;
        order: -1
    }

    .order-md-last {
        -webkit-box-ordinal-group: 14;
        -ms-flex-order: 13;
        order: 13
    }

    .order-md-0 {
        -webkit-box-ordinal-group: 1;
        -ms-flex-order: 0;
        order: 0
    }

    .order-md-1 {
        -webkit-box-ordinal-group: 2;
        -ms-flex-order: 1;
        order: 1
    }

    .order-md-2 {
        -webkit-box-ordinal-group: 3;
        -ms-flex-order: 2;
        order: 2
    }

    .order-md-3 {
        -webkit-box-ordinal-group: 4;
        -ms-flex-order: 3;
        order: 3
    }

    .order-md-4 {
        -webkit-box-ordinal-group: 5;
        -ms-flex-order: 4;
        order: 4
    }

    .order-md-5 {
        -webkit-box-ordinal-group: 6;
        -ms-flex-order: 5;
        order: 5
    }

    .order-md-6 {
        -webkit-box-ordinal-group: 7;
        -ms-flex-order: 6;
        order: 6
    }

    .order-md-7 {
        -webkit-box-ordinal-group: 8;
        -ms-flex-order: 7;
        order: 7
    }

    .order-md-8 {
        -webkit-box-ordinal-group: 9;
        -ms-flex-order: 8;
        order: 8
    }

    .order-md-9 {
        -webkit-box-ordinal-group: 10;
        -ms-flex-order: 9;
        order: 9
    }

    .order-md-10 {
        -webkit-box-ordinal-group: 11;
        -ms-flex-order: 10;
        order: 10
    }

    .order-md-11 {
        -webkit-box-ordinal-group: 12;
        -ms-flex-order: 11;
        order: 11
    }

    .order-md-12 {
        -webkit-box-ordinal-group: 13;
        -ms-flex-order: 12;
        order: 12
    }

    .offset-md-0 {
        margin-left: 0
    }

    .offset-md-1 {
        margin-left: 8.333333%
    }

    .offset-md-2 {
        margin-left: 16.666667%
    }

    .offset-md-3 {
        margin-left: 25%
    }

    .offset-md-4 {
        margin-left: 33.333333%
    }

    .offset-md-5 {
        margin-left: 41.666667%
    }

    .offset-md-6 {
        margin-left: 50%
    }

    .offset-md-7 {
        margin-left: 58.333333%
    }

    .offset-md-8 {
        margin-left: 66.666667%
    }

    .offset-md-9 {
        margin-left: 75%
    }

    .offset-md-10 {
        margin-left: 83.333333%
    }

    .offset-md-11 {
        margin-left: 91.666667%
    }
}

@media (min-width: 992px) {
    .col-lg {
        -ms-flex-preferred-size:0;
        flex-basis: 0;
        -webkit-box-flex: 1;
        -ms-flex-positive: 1;
        flex-grow: 1;
        max-width: 100%
    }

    .col-lg-auto {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 auto;
        flex: 0 0 auto;
        width: auto;
        max-width: none
    }

    .col-lg-1 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 8.333333%;
        flex: 0 0 8.333333%;
        max-width: 8.333333%
    }

    .col-lg-2 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 16.666667%;
        flex: 0 0 16.666667%;
        max-width: 16.666667%
    }

    .col-lg-3 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 25%;
        flex: 0 0 25%;
        max-width: 25%
    }

    .col-lg-4 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 33.333333%;
        flex: 0 0 33.333333%;
        max-width: 33.333333%
    }

    .col-lg-5 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 41.666667%;
        flex: 0 0 41.666667%;
        max-width: 41.666667%
    }

    .col-lg-6 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 50%;
        flex: 0 0 50%;
        max-width: 50%
    }

    .col-lg-7 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 58.333333%;
        flex: 0 0 58.333333%;
        max-width: 58.333333%
    }

    .col-lg-8 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 66.666667%;
        flex: 0 0 66.666667%;
        max-width: 66.666667%
    }

    .col-lg-9 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 75%;
        flex: 0 0 75%;
        max-width: 75%
    }

    .col-lg-10 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 83.333333%;
        flex: 0 0 83.333333%;
        max-width: 83.333333%
    }

    .col-lg-11 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 91.666667%;
        flex: 0 0 91.666667%;
        max-width: 91.666667%
    }

    .col-lg-12 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 100%;
        flex: 0 0 100%;
        max-width: 100%
    }

    .order-lg-first {
        -webkit-box-ordinal-group: 0;
        -ms-flex-order: -1;
        order: -1
    }

    .order-lg-last {
        -webkit-box-ordinal-group: 14;
        -ms-flex-order: 13;
        order: 13
    }

    .order-lg-0 {
        -webkit-box-ordinal-group: 1;
        -ms-flex-order: 0;
        order: 0
    }

    .order-lg-1 {
        -webkit-box-ordinal-group: 2;
        -ms-flex-order: 1;
        order: 1
    }

    .order-lg-2 {
        -webkit-box-ordinal-group: 3;
        -ms-flex-order: 2;
        order: 2
    }

    .order-lg-3 {
        -webkit-box-ordinal-group: 4;
        -ms-flex-order: 3;
        order: 3
    }

    .order-lg-4 {
        -webkit-box-ordinal-group: 5;
        -ms-flex-order: 4;
        order: 4
    }

    .order-lg-5 {
        -webkit-box-ordinal-group: 6;
        -ms-flex-order: 5;
        order: 5
    }

    .order-lg-6 {
        -webkit-box-ordinal-group: 7;
        -ms-flex-order: 6;
        order: 6
    }

    .order-lg-7 {
        -webkit-box-ordinal-group: 8;
        -ms-flex-order: 7;
        order: 7
    }

    .order-lg-8 {
        -webkit-box-ordinal-group: 9;
        -ms-flex-order: 8;
        order: 8
    }

    .order-lg-9 {
        -webkit-box-ordinal-group: 10;
        -ms-flex-order: 9;
        order: 9
    }

    .order-lg-10 {
        -webkit-box-ordinal-group: 11;
        -ms-flex-order: 10;
        order: 10
    }

    .order-lg-11 {
        -webkit-box-ordinal-group: 12;
        -ms-flex-order: 11;
        order: 11
    }

    .order-lg-12 {
        -webkit-box-ordinal-group: 13;
        -ms-flex-order: 12;
        order: 12
    }

    .offset-lg-0 {
        margin-left: 0
    }

    .offset-lg-1 {
        margin-left: 8.333333%
    }

    .offset-lg-2 {
        margin-left: 16.666667%
    }

    .offset-lg-3 {
        margin-left: 25%
    }

    .offset-lg-4 {
        margin-left: 33.333333%
    }

    .offset-lg-5 {
        margin-left: 41.666667%
    }

    .offset-lg-6 {
        margin-left: 50%
    }

    .offset-lg-7 {
        margin-left: 58.333333%
    }

    .offset-lg-8 {
        margin-left: 66.666667%
    }

    .offset-lg-9 {
        margin-left: 75%
    }

    .offset-lg-10 {
        margin-left: 83.333333%
    }

    .offset-lg-11 {
        margin-left: 91.666667%
    }
}

@media (min-width: 1200px) {
    .col-xl {
        -ms-flex-preferred-size:0;
        flex-basis: 0;
        -webkit-box-flex: 1;
        -ms-flex-positive: 1;
        flex-grow: 1;
        max-width: 100%
    }

    .col-xl-auto {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 auto;
        flex: 0 0 auto;
        width: auto;
        max-width: none
    }

    .col-xl-1 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 8.333333%;
        flex: 0 0 8.333333%;
        max-width: 8.333333%
    }

    .col-xl-2 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 16.666667%;
        flex: 0 0 16.666667%;
        max-width: 16.666667%
    }

    .col-xl-3 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 25%;
        flex: 0 0 25%;
        max-width: 25%
    }

    .col-xl-4 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 33.333333%;
        flex: 0 0 33.333333%;
        max-width: 33.333333%
    }

    .col-xl-5 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 41.666667%;
        flex: 0 0 41.666667%;
        max-width: 41.666667%
    }

    .col-xl-6 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 50%;
        flex: 0 0 50%;
        max-width: 50%
    }

    .col-xl-7 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 58.333333%;
        flex: 0 0 58.333333%;
        max-width: 58.333333%
    }

    .col-xl-8 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 66.666667%;
        flex: 0 0 66.666667%;
        max-width: 66.666667%
    }

    .col-xl-9 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 75%;
        flex: 0 0 75%;
        max-width: 75%
    }

    .col-xl-10 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 83.333333%;
        flex: 0 0 83.333333%;
        max-width: 83.333333%
    }

    .col-xl-11 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 91.666667%;
        flex: 0 0 91.666667%;
        max-width: 91.666667%
    }

    .col-xl-12 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 100%;
        flex: 0 0 100%;
        max-width: 100%
    }

    .order-xl-first {
        -webkit-box-ordinal-group: 0;
        -ms-flex-order: -1;
        order: -1
    }

    .order-xl-last {
        -webkit-box-ordinal-group: 14;
        -ms-flex-order: 13;
        order: 13
    }

    .order-xl-0 {
        -webkit-box-ordinal-group: 1;
        -ms-flex-order: 0;
        order: 0
    }

    .order-xl-1 {
        -webkit-box-ordinal-group: 2;
        -ms-flex-order: 1;
        order: 1
    }

    .order-xl-2 {
        -webkit-box-ordinal-group: 3;
        -ms-flex-order: 2;
        order: 2
    }

    .order-xl-3 {
        -webkit-box-ordinal-group: 4;
        -ms-flex-order: 3;
        order: 3
    }

    .order-xl-4 {
        -webkit-box-ordinal-group: 5;
        -ms-flex-order: 4;
        order: 4
    }

    .order-xl-5 {
        -webkit-box-ordinal-group: 6;
        -ms-flex-order: 5;
        order: 5
    }

    .order-xl-6 {
        -webkit-box-ordinal-group: 7;
        -ms-flex-order: 6;
        order: 6
    }

    .order-xl-7 {
        -webkit-box-ordinal-group: 8;
        -ms-flex-order: 7;
        order: 7
    }

    .order-xl-8 {
        -webkit-box-ordinal-group: 9;
        -ms-flex-order: 8;
        order: 8
    }

    .order-xl-9 {
        -webkit-box-ordinal-group: 10;
        -ms-flex-order: 9;
        order: 9
    }

    .order-xl-10 {
        -webkit-box-ordinal-group: 11;
        -ms-flex-order: 10;
        order: 10
    }

    .order-xl-11 {
        -webkit-box-ordinal-group: 12;
        -ms-flex-order: 11;
        order: 11
    }

    .order-xl-12 {
        -webkit-box-ordinal-group: 13;
        -ms-flex-order: 12;
        order: 12
    }

    .offset-xl-0 {
        margin-left: 0
    }

    .offset-xl-1 {
        margin-left: 8.333333%
    }

    .offset-xl-2 {
        margin-left: 16.666667%
    }

    .offset-xl-3 {
        margin-left: 25%
    }

    .offset-xl-4 {
        margin-left: 33.333333%
    }

    .offset-xl-5 {
        margin-left: 41.666667%
    }

    .offset-xl-6 {
        margin-left: 50%
    }

    .offset-xl-7 {
        margin-left: 58.333333%
    }

    .offset-xl-8 {
        margin-left: 66.666667%
    }

    .offset-xl-9 {
        margin-left: 75%
    }

    .offset-xl-10 {
        margin-left: 83.333333%
    }

    .offset-xl-11 {
        margin-left: 91.666667%
    }
}

.d-none {
    display: none!important
}

.d-inline {
    display: inline!important
}

.d-inline-block {
    display: inline-block!important
}

.d-block {
    display: block!important
}

.d-table {
    display: table!important
}

.d-table-row {
    display: table-row!important
}

.d-table-cell {
    display: table-cell!important
}

.d-flex {
    display: -webkit-box!important;
    display: -ms-flexbox!important;
    display: flex!important
}

.d-inline-flex {
    display: -webkit-inline-box!important;
    display: -ms-inline-flexbox!important;
    display: inline-flex!important
}

@media (min-width: 576px) {
    .d-sm-none {
        display:none!important
    }

    .d-sm-inline {
        display: inline!important
    }

    .d-sm-inline-block {
        display: inline-block!important
    }

    .d-sm-block {
        display: block!important
    }

    .d-sm-table {
        display: table!important
    }

    .d-sm-table-row {
        display: table-row!important
    }

    .d-sm-table-cell {
        display: table-cell!important
    }

    .d-sm-flex {
        display: -webkit-box!important;
        display: -ms-flexbox!important;
        display: flex!important
    }

    .d-sm-inline-flex {
        display: -webkit-inline-box!important;
        display: -ms-inline-flexbox!important;
        display: inline-flex!important
    }
}

@media (min-width: 768px) {
    .d-md-none {
        display:none!important
    }

    .d-md-inline {
        display: inline!important
    }

    .d-md-inline-block {
        display: inline-block!important
    }

    .d-md-block {
        display: block!important
    }

    .d-md-table {
        display: table!important
    }

    .d-md-table-row {
        display: table-row!important
    }

    .d-md-table-cell {
        display: table-cell!important
    }

    .d-md-flex {
        display: -webkit-box!important;
        display: -ms-flexbox!important;
        display: flex!important
    }

    .d-md-inline-flex {
        display: -webkit-inline-box!important;
        display: -ms-inline-flexbox!important;
        display: inline-flex!important
    }
}

@media (min-width: 992px) {
    .d-lg-none {
        display:none!important
    }

    .d-lg-inline {
        display: inline!important
    }

    .d-lg-inline-block {
        display: inline-block!important
    }

    .d-lg-block {
        display: block!important
    }

    .d-lg-table {
        display: table!important
    }

    .d-lg-table-row {
        display: table-row!important
    }

    .d-lg-table-cell {
        display: table-cell!important
    }

    .d-lg-flex {
        display: -webkit-box!important;
        display: -ms-flexbox!important;
        display: flex!important
    }

    .d-lg-inline-flex {
        display: -webkit-inline-box!important;
        display: -ms-inline-flexbox!important;
        display: inline-flex!important
    }
}

@media (min-width: 1200px) {
    .d-xl-none {
        display:none!important
    }

    .d-xl-inline {
        display: inline!important
    }

    .d-xl-inline-block {
        display: inline-block!important
    }

    .d-xl-block {
        display: block!important
    }

    .d-xl-table {
        display: table!important
    }

    .d-xl-table-row {
        display: table-row!important
    }

    .d-xl-table-cell {
        display: table-cell!important
    }

    .d-xl-flex {
        display: -webkit-box!important;
        display: -ms-flexbox!important;
        display: flex!important
    }

    .d-xl-inline-flex {
        display: -webkit-inline-box!important;
        display: -ms-inline-flexbox!important;
        display: inline-flex!important
    }
}

@media print {
    .d-print-none {
        display: none!important
    }

    .d-print-inline {
        display: inline!important
    }

    .d-print-inline-block {
        display: inline-block!important
    }

    .d-print-block {
        display: block!important
    }

    .d-print-table {
        display: table!important
    }

    .d-print-table-row {
        display: table-row!important
    }

    .d-print-table-cell {
        display: table-cell!important
    }

    .d-print-flex {
        display: -webkit-box!important;
        display: -ms-flexbox!important;
        display: flex!important
    }

    .d-print-inline-flex {
        display: -webkit-inline-box!important;
        display: -ms-inline-flexbox!important;
        display: inline-flex!important
    }
}

.flex-row {
    -webkit-box-orient: horizontal!important;
    -webkit-box-direction: normal!important;
    -ms-flex-direction: row!important;
    flex-direction: row!important
}

.flex-column {
    -webkit-box-orient: vertical!important;
    -webkit-box-direction: normal!important;
    -ms-flex-direction: column!important;
    flex-direction: column!important
}

.flex-row-reverse {
    -webkit-box-orient: horizontal!important;
    -webkit-box-direction: reverse!important;
    -ms-flex-direction: row-reverse!important;
    flex-direction: row-reverse!important
}

.flex-column-reverse {
    -webkit-box-orient: vertical!important;
    -webkit-box-direction: reverse!important;
    -ms-flex-direction: column-reverse!important;
    flex-direction: column-reverse!important
}

.flex-wrap {
    -ms-flex-wrap: wrap!important;
    flex-wrap: wrap!important
}

.flex-nowrap {
    -ms-flex-wrap: nowrap!important;
    flex-wrap: nowrap!important
}

.flex-wrap-reverse {
    -ms-flex-wrap: wrap-reverse!important;
    flex-wrap: wrap-reverse!important
}

.justify-content-start {
    -webkit-box-pack: start!important;
    -ms-flex-pack: start!important;
    justify-content: flex-start!important
}

.justify-content-end {
    -webkit-box-pack: end!important;
    -ms-flex-pack: end!important;
    justify-content: flex-end!important
}

.justify-content-center {
    -webkit-box-pack: center!important;
    -ms-flex-pack: center!important;
    justify-content: center!important
}

.justify-content-between {
    -webkit-box-pack: justify!important;
    -ms-flex-pack: justify!important;
    justify-content: space-between!important
}

.justify-content-around {
    -ms-flex-pack: distribute!important;
    justify-content: space-around!important
}

.align-items-start {
    -webkit-box-align: start!important;
    -ms-flex-align: start!important;
    align-items: flex-start!important
}

.align-items-end {
    -webkit-box-align: end!important;
    -ms-flex-align: end!important;
    align-items: flex-end!important
}

.align-items-center {
    -webkit-box-align: center!important;
    -ms-flex-align: center!important;
    align-items: center!important
}

.align-items-baseline {
    -webkit-box-align: baseline!important;
    -ms-flex-align: baseline!important;
    align-items: baseline!important
}

.align-items-stretch {
    -webkit-box-align: stretch!important;
    -ms-flex-align: stretch!important;
    align-items: stretch!important
}

.align-content-start {
    -ms-flex-line-pack: start!important;
    align-content: flex-start!important
}

.align-content-end {
    -ms-flex-line-pack: end!important;
    align-content: flex-end!important
}

.align-content-center {
    -ms-flex-line-pack: center!important;
    align-content: center!important
}

.align-content-between {
    -ms-flex-line-pack: justify!important;
    align-content: space-between!important
}

.align-content-around {
    -ms-flex-line-pack: distribute!important;
    align-content: space-around!important
}

.align-content-stretch {
    -ms-flex-line-pack: stretch!important;
    align-content: stretch!important
}

.align-self-auto {
    -ms-flex-item-align: auto!important;
    align-self: auto!important
}

.align-self-start {
    -ms-flex-item-align: start!important;
    align-self: flex-start!important
}

.align-self-end {
    -ms-flex-item-align: end!important;
    align-self: flex-end!important
}

.align-self-center {
    -ms-flex-item-align: center!important;
    align-self: center!important
}

.align-self-baseline {
    -ms-flex-item-align: baseline!important;
    align-self: baseline!important
}

.align-self-stretch {
    -ms-flex-item-align: stretch!important;
    align-self: stretch!important
}

@media (min-width: 576px) {
    .flex-sm-row {
        -webkit-box-orient:horizontal!important;
        -webkit-box-direction: normal!important;
        -ms-flex-direction: row!important;
        flex-direction: row!important
    }

    .flex-sm-column {
        -webkit-box-orient: vertical!important;
        -webkit-box-direction: normal!important;
        -ms-flex-direction: column!important;
        flex-direction: column!important
    }

    .flex-sm-row-reverse {
        -webkit-box-orient: horizontal!important;
        -webkit-box-direction: reverse!important;
        -ms-flex-direction: row-reverse!important;
        flex-direction: row-reverse!important
    }

    .flex-sm-column-reverse {
        -webkit-box-orient: vertical!important;
        -webkit-box-direction: reverse!important;
        -ms-flex-direction: column-reverse!important;
        flex-direction: column-reverse!important
    }

    .flex-sm-wrap {
        -ms-flex-wrap: wrap!important;
        flex-wrap: wrap!important
    }

    .flex-sm-nowrap {
        -ms-flex-wrap: nowrap!important;
        flex-wrap: nowrap!important
    }

    .flex-sm-wrap-reverse {
        -ms-flex-wrap: wrap-reverse!important;
        flex-wrap: wrap-reverse!important
    }

    .justify-content-sm-start {
        -webkit-box-pack: start!important;
        -ms-flex-pack: start!important;
        justify-content: flex-start!important
    }

    .justify-content-sm-end {
        -webkit-box-pack: end!important;
        -ms-flex-pack: end!important;
        justify-content: flex-end!important
    }

    .justify-content-sm-center {
        -webkit-box-pack: center!important;
        -ms-flex-pack: center!important;
        justify-content: center!important
    }

    .justify-content-sm-between {
        -webkit-box-pack: justify!important;
        -ms-flex-pack: justify!important;
        justify-content: space-between!important
    }

    .justify-content-sm-around {
        -ms-flex-pack: distribute!important;
        justify-content: space-around!important
    }

    .align-items-sm-start {
        -webkit-box-align: start!important;
        -ms-flex-align: start!important;
        align-items: flex-start!important
    }

    .align-items-sm-end {
        -webkit-box-align: end!important;
        -ms-flex-align: end!important;
        align-items: flex-end!important
    }

    .align-items-sm-center {
        -webkit-box-align: center!important;
        -ms-flex-align: center!important;
        align-items: center!important
    }

    .align-items-sm-baseline {
        -webkit-box-align: baseline!important;
        -ms-flex-align: baseline!important;
        align-items: baseline!important
    }

    .align-items-sm-stretch {
        -webkit-box-align: stretch!important;
        -ms-flex-align: stretch!important;
        align-items: stretch!important
    }

    .align-content-sm-start {
        -ms-flex-line-pack: start!important;
        align-content: flex-start!important
    }

    .align-content-sm-end {
        -ms-flex-line-pack: end!important;
        align-content: flex-end!important
    }

    .align-content-sm-center {
        -ms-flex-line-pack: center!important;
        align-content: center!important
    }

    .align-content-sm-between {
        -ms-flex-line-pack: justify!important;
        align-content: space-between!important
    }

    .align-content-sm-around {
        -ms-flex-line-pack: distribute!important;
        align-content: space-around!important
    }

    .align-content-sm-stretch {
        -ms-flex-line-pack: stretch!important;
        align-content: stretch!important
    }

    .align-self-sm-auto {
        -ms-flex-item-align: auto!important;
        align-self: auto!important
    }

    .align-self-sm-start {
        -ms-flex-item-align: start!important;
        align-self: flex-start!important
    }

    .align-self-sm-end {
        -ms-flex-item-align: end!important;
        align-self: flex-end!important
    }

    .align-self-sm-center {
        -ms-flex-item-align: center!important;
        align-self: center!important
    }

    .align-self-sm-baseline {
        -ms-flex-item-align: baseline!important;
        align-self: baseline!important
    }

    .align-self-sm-stretch {
        -ms-flex-item-align: stretch!important;
        align-self: stretch!important
    }
}

@media (min-width: 768px) {
    .flex-md-row {
        -webkit-box-orient:horizontal!important;
        -webkit-box-direction: normal!important;
        -ms-flex-direction: row!important;
        flex-direction: row!important
    }

    .flex-md-column {
        -webkit-box-orient: vertical!important;
        -webkit-box-direction: normal!important;
        -ms-flex-direction: column!important;
        flex-direction: column!important
    }

    .flex-md-row-reverse {
        -webkit-box-orient: horizontal!important;
        -webkit-box-direction: reverse!important;
        -ms-flex-direction: row-reverse!important;
        flex-direction: row-reverse!important
    }

    .flex-md-column-reverse {
        -webkit-box-orient: vertical!important;
        -webkit-box-direction: reverse!important;
        -ms-flex-direction: column-reverse!important;
        flex-direction: column-reverse!important
    }

    .flex-md-wrap {
        -ms-flex-wrap: wrap!important;
        flex-wrap: wrap!important
    }

    .flex-md-nowrap {
        -ms-flex-wrap: nowrap!important;
        flex-wrap: nowrap!important
    }

    .flex-md-wrap-reverse {
        -ms-flex-wrap: wrap-reverse!important;
        flex-wrap: wrap-reverse!important
    }

    .justify-content-md-start {
        -webkit-box-pack: start!important;
        -ms-flex-pack: start!important;
        justify-content: flex-start!important
    }

    .justify-content-md-end {
        -webkit-box-pack: end!important;
        -ms-flex-pack: end!important;
        justify-content: flex-end!important
    }

    .justify-content-md-center {
        -webkit-box-pack: center!important;
        -ms-flex-pack: center!important;
        justify-content: center!important
    }

    .justify-content-md-between {
        -webkit-box-pack: justify!important;
        -ms-flex-pack: justify!important;
        justify-content: space-between!important
    }

    .justify-content-md-around {
        -ms-flex-pack: distribute!important;
        justify-content: space-around!important
    }

    .align-items-md-start {
        -webkit-box-align: start!important;
        -ms-flex-align: start!important;
        align-items: flex-start!important
    }

    .align-items-md-end {
        -webkit-box-align: end!important;
        -ms-flex-align: end!important;
        align-items: flex-end!important
    }

    .align-items-md-center {
        -webkit-box-align: center!important;
        -ms-flex-align: center!important;
        align-items: center!important
    }

    .align-items-md-baseline {
        -webkit-box-align: baseline!important;
        -ms-flex-align: baseline!important;
        align-items: baseline!important
    }

    .align-items-md-stretch {
        -webkit-box-align: stretch!important;
        -ms-flex-align: stretch!important;
        align-items: stretch!important
    }

    .align-content-md-start {
        -ms-flex-line-pack: start!important;
        align-content: flex-start!important
    }

    .align-content-md-end {
        -ms-flex-line-pack: end!important;
        align-content: flex-end!important
    }

    .align-content-md-center {
        -ms-flex-line-pack: center!important;
        align-content: center!important
    }

    .align-content-md-between {
        -ms-flex-line-pack: justify!important;
        align-content: space-between!important
    }

    .align-content-md-around {
        -ms-flex-line-pack: distribute!important;
        align-content: space-around!important
    }

    .align-content-md-stretch {
        -ms-flex-line-pack: stretch!important;
        align-content: stretch!important
    }

    .align-self-md-auto {
        -ms-flex-item-align: auto!important;
        align-self: auto!important
    }

    .align-self-md-start {
        -ms-flex-item-align: start!important;
        align-self: flex-start!important
    }

    .align-self-md-end {
        -ms-flex-item-align: end!important;
        align-self: flex-end!important
    }

    .align-self-md-center {
        -ms-flex-item-align: center!important;
        align-self: center!important
    }

    .align-self-md-baseline {
        -ms-flex-item-align: baseline!important;
        align-self: baseline!important
    }

    .align-self-md-stretch {
        -ms-flex-item-align: stretch!important;
        align-self: stretch!important
    }
}

@media (min-width: 992px) {
    .flex-lg-row {
        -webkit-box-orient:horizontal!important;
        -webkit-box-direction: normal!important;
        -ms-flex-direction: row!important;
        flex-direction: row!important
    }

    .flex-lg-column {
        -webkit-box-orient: vertical!important;
        -webkit-box-direction: normal!important;
        -ms-flex-direction: column!important;
        flex-direction: column!important
    }

    .flex-lg-row-reverse {
        -webkit-box-orient: horizontal!important;
        -webkit-box-direction: reverse!important;
        -ms-flex-direction: row-reverse!important;
        flex-direction: row-reverse!important
    }

    .flex-lg-column-reverse {
        -webkit-box-orient: vertical!important;
        -webkit-box-direction: reverse!important;
        -ms-flex-direction: column-reverse!important;
        flex-direction: column-reverse!important
    }

    .flex-lg-wrap {
        -ms-flex-wrap: wrap!important;
        flex-wrap: wrap!important
    }

    .flex-lg-nowrap {
        -ms-flex-wrap: nowrap!important;
        flex-wrap: nowrap!important
    }

    .flex-lg-wrap-reverse {
        -ms-flex-wrap: wrap-reverse!important;
        flex-wrap: wrap-reverse!important
    }

    .justify-content-lg-start {
        -webkit-box-pack: start!important;
        -ms-flex-pack: start!important;
        justify-content: flex-start!important
    }

    .justify-content-lg-end {
        -webkit-box-pack: end!important;
        -ms-flex-pack: end!important;
        justify-content: flex-end!important
    }

    .justify-content-lg-center {
        -webkit-box-pack: center!important;
        -ms-flex-pack: center!important;
        justify-content: center!important
    }

    .justify-content-lg-between {
        -webkit-box-pack: justify!important;
        -ms-flex-pack: justify!important;
        justify-content: space-between!important
    }

    .justify-content-lg-around {
        -ms-flex-pack: distribute!important;
        justify-content: space-around!important
    }

    .align-items-lg-start {
        -webkit-box-align: start!important;
        -ms-flex-align: start!important;
        align-items: flex-start!important
    }

    .align-items-lg-end {
        -webkit-box-align: end!important;
        -ms-flex-align: end!important;
        align-items: flex-end!important
    }

    .align-items-lg-center {
        -webkit-box-align: center!important;
        -ms-flex-align: center!important;
        align-items: center!important
    }

    .align-items-lg-baseline {
        -webkit-box-align: baseline!important;
        -ms-flex-align: baseline!important;
        align-items: baseline!important
    }

    .align-items-lg-stretch {
        -webkit-box-align: stretch!important;
        -ms-flex-align: stretch!important;
        align-items: stretch!important
    }

    .align-content-lg-start {
        -ms-flex-line-pack: start!important;
        align-content: flex-start!important
    }

    .align-content-lg-end {
        -ms-flex-line-pack: end!important;
        align-content: flex-end!important
    }

    .align-content-lg-center {
        -ms-flex-line-pack: center!important;
        align-content: center!important
    }

    .align-content-lg-between {
        -ms-flex-line-pack: justify!important;
        align-content: space-between!important
    }

    .align-content-lg-around {
        -ms-flex-line-pack: distribute!important;
        align-content: space-around!important
    }

    .align-content-lg-stretch {
        -ms-flex-line-pack: stretch!important;
        align-content: stretch!important
    }

    .align-self-lg-auto {
        -ms-flex-item-align: auto!important;
        align-self: auto!important
    }

    .align-self-lg-start {
        -ms-flex-item-align: start!important;
        align-self: flex-start!important
    }

    .align-self-lg-end {
        -ms-flex-item-align: end!important;
        align-self: flex-end!important
    }

    .align-self-lg-center {
        -ms-flex-item-align: center!important;
        align-self: center!important
    }

    .align-self-lg-baseline {
        -ms-flex-item-align: baseline!important;
        align-self: baseline!important
    }

    .align-self-lg-stretch {
        -ms-flex-item-align: stretch!important;
        align-self: stretch!important
    }
}

@media (min-width: 1200px) {
    .flex-xl-row {
        -webkit-box-orient:horizontal!important;
        -webkit-box-direction: normal!important;
        -ms-flex-direction: row!important;
        flex-direction: row!important
    }

    .flex-xl-column {
        -webkit-box-orient: vertical!important;
        -webkit-box-direction: normal!important;
        -ms-flex-direction: column!important;
        flex-direction: column!important
    }

    .flex-xl-row-reverse {
        -webkit-box-orient: horizontal!important;
        -webkit-box-direction: reverse!important;
        -ms-flex-direction: row-reverse!important;
        flex-direction: row-reverse!important
    }

    .flex-xl-column-reverse {
        -webkit-box-orient: vertical!important;
        -webkit-box-direction: reverse!important;
        -ms-flex-direction: column-reverse!important;
        flex-direction: column-reverse!important
    }

    .flex-xl-wrap {
        -ms-flex-wrap: wrap!important;
        flex-wrap: wrap!important
    }

    .flex-xl-nowrap {
        -ms-flex-wrap: nowrap!important;
        flex-wrap: nowrap!important
    }

    .flex-xl-wrap-reverse {
        -ms-flex-wrap: wrap-reverse!important;
        flex-wrap: wrap-reverse!important
    }

    .justify-content-xl-start {
        -webkit-box-pack: start!important;
        -ms-flex-pack: start!important;
        justify-content: flex-start!important
    }

    .justify-content-xl-end {
        -webkit-box-pack: end!important;
        -ms-flex-pack: end!important;
        justify-content: flex-end!important
    }

    .justify-content-xl-center {
        -webkit-box-pack: center!important;
        -ms-flex-pack: center!important;
        justify-content: center!important
    }

    .justify-content-xl-between {
        -webkit-box-pack: justify!important;
        -ms-flex-pack: justify!important;
        justify-content: space-between!important
    }

    .justify-content-xl-around {
        -ms-flex-pack: distribute!important;
        justify-content: space-around!important
    }

    .align-items-xl-start {
        -webkit-box-align: start!important;
        -ms-flex-align: start!important;
        align-items: flex-start!important
    }

    .align-items-xl-end {
        -webkit-box-align: end!important;
        -ms-flex-align: end!important;
        align-items: flex-end!important
    }

    .align-items-xl-center {
        -webkit-box-align: center!important;
        -ms-flex-align: center!important;
        align-items: center!important
    }

    .align-items-xl-baseline {
        -webkit-box-align: baseline!important;
        -ms-flex-align: baseline!important;
        align-items: baseline!important
    }

    .align-items-xl-stretch {
        -webkit-box-align: stretch!important;
        -ms-flex-align: stretch!important;
        align-items: stretch!important
    }

    .align-content-xl-start {
        -ms-flex-line-pack: start!important;
        align-content: flex-start!important
    }

    .align-content-xl-end {
        -ms-flex-line-pack: end!important;
        align-content: flex-end!important
    }

    .align-content-xl-center {
        -ms-flex-line-pack: center!important;
        align-content: center!important
    }

    .align-content-xl-between {
        -ms-flex-line-pack: justify!important;
        align-content: space-between!important
    }

    .align-content-xl-around {
        -ms-flex-line-pack: distribute!important;
        align-content: space-around!important
    }

    .align-content-xl-stretch {
        -ms-flex-line-pack: stretch!important;
        align-content: stretch!important
    }

    .align-self-xl-auto {
        -ms-flex-item-align: auto!important;
        align-self: auto!important
    }

    .align-self-xl-start {
        -ms-flex-item-align: start!important;
        align-self: flex-start!important
    }

    .align-self-xl-end {
        -ms-flex-item-align: end!important;
        align-self: flex-end!important
    }

    .align-self-xl-center {
        -ms-flex-item-align: center!important;
        align-self: center!important
    }

    .align-self-xl-baseline {
        -ms-flex-item-align: baseline!important;
        align-self: baseline!important
    }

    .align-self-xl-stretch {
        -ms-flex-item-align: stretch!important;
        align-self: stretch!important
    }
}

.w-25 {
    width: 25%!important
}

.w-50 {
    width: 50%!important
}

.w-75 {
    width: 75%!important
}

.w-100 {
    width: 100%!important
}

.w-auto {
    width: auto!important
}

.h-25 {
    height: 25%!important
}

.h-50 {
    height: 50%!important
}

.h-75 {
    height: 75%!important
}

.h-100 {
    height: 100%!important
}

.h-auto {
    height: auto!important
}

.mw-100 {
    max-width: 100%!important
}

.mh-100 {
    max-height: 100%!important
}

.m-0 {
    margin: 0!important
}

.mt-0,.my-0 {
    margin-top: 0!important
}

.mr-0,.mx-0 {
    margin-right: 0!important
}

.mb-0,.my-0 {
    margin-bottom: 0!important
}

.ml-0,.mx-0 {
    margin-left: 0!important
}

.m-1 {
    margin: .25rem!important
}

.mt-1,.my-1 {
    margin-top: .25rem!important
}

.mr-1,.mx-1 {
    margin-right: .25rem!important
}

.mb-1,.my-1 {
    margin-bottom: .25rem!important
}

.ml-1,.mx-1 {
    margin-left: .25rem!important
}

.m-2 {
    margin: .5rem!important
}

.mt-2,.my-2 {
    margin-top: .5rem!important
}

.mr-2,.mx-2 {
    margin-right: .5rem!important
}

.mb-2,.my-2 {
    margin-bottom: .5rem!important
}

.ml-2,.mx-2 {
    margin-left: .5rem!important
}

.m-3 {
    margin: 1rem!important
}

.mt-3,.my-3 {
    margin-top: 1rem!important
}

.mr-3,.mx-3 {
    margin-right: 1rem!important
}

.mb-3,.my-3 {
    margin-bottom: 1rem!important
}

.ml-3,.mx-3 {
    margin-left: 1rem!important
}

.m-4 {
    margin: 1.5rem!important
}

.mt-4,.my-4 {
    margin-top: 1.5rem!important
}

.mr-4,.mx-4 {
    margin-right: 1.5rem!important
}

.mb-4,.my-4 {
    margin-bottom: 1.5rem!important
}

.ml-4,.mx-4 {
    margin-left: 1.5rem!important
}

.m-5 {
    margin: 3rem!important
}

.mt-5,.my-5 {
    margin-top: 3rem!important
}

.mr-5,.mx-5 {
    margin-right: 3rem!important
}

.mb-5,.my-5 {
    margin-bottom: 3rem!important
}

.ml-5,.mx-5 {
    margin-left: 3rem!important
}

.p-0 {
    padding: 0!important
}

.pt-0,.py-0 {
    padding-top: 0!important
}

.pr-0,.px-0 {
    padding-right: 0!important
}

.pb-0,.py-0 {
    padding-bottom: 0!important
}

.pl-0,.px-0 {
    padding-left: 0!important
}

.p-1 {
    padding: .25rem!important
}

.pt-1,.py-1 {
    padding-top: .25rem!important
}

.pr-1,.px-1 {
    padding-right: .25rem!important
}

.pb-1,.py-1 {
    padding-bottom: .25rem!important
}

.pl-1,.px-1 {
    padding-left: .25rem!important
}

.p-2 {
    padding: .5rem!important
}

.pt-2,.py-2 {
    padding-top: .5rem!important
}

.pr-2,.px-2 {
    padding-right: .5rem!important
}

.pb-2,.py-2 {
    padding-bottom: .5rem!important
}

.pl-2,.px-2 {
    padding-left: .5rem!important
}

.p-3 {
    padding: 1rem!important
}

.pt-3,.py-3 {
    padding-top: 1rem!important
}

.pr-3,.px-3 {
    padding-right: 1rem!important
}

.pb-3,.py-3 {
    padding-bottom: 1rem!important
}

.pl-3,.px-3 {
    padding-left: 1rem!important
}

.p-4 {
    padding: 1.5rem!important
}

.pt-4,.py-4 {
    padding-top: 1.5rem!important
}

.pr-4,.px-4 {
    padding-right: 1.5rem!important
}

.pb-4,.py-4 {
    padding-bottom: 1.5rem!important
}

.pl-4,.px-4 {
    padding-left: 1.5rem!important
}

.p-5 {
    padding: 3rem!important
}

.pt-5,.py-5 {
    padding-top: 3rem!important
}

.pr-5,.px-5 {
    padding-right: 3rem!important
}

.pb-5,.py-5 {
    padding-bottom: 3rem!important
}

.pl-5,.px-5 {
    padding-left: 3rem!important
}

.m-auto {
    margin: auto!important
}

.mt-auto,.my-auto {
    margin-top: auto!important
}

.mr-auto,.mx-auto {
    margin-right: auto!important
}

.mb-auto,.my-auto {
    margin-bottom: auto!important
}

.ml-auto,.mx-auto {
    margin-left: auto!important
}

@media (min-width: 576px) {
    .m-sm-0 {
        margin:0!important
    }

    .mt-sm-0,.my-sm-0 {
        margin-top: 0!important
    }

    .mr-sm-0,.mx-sm-0 {
        margin-right: 0!important
    }

    .mb-sm-0,.my-sm-0 {
        margin-bottom: 0!important
    }

    .ml-sm-0,.mx-sm-0 {
        margin-left: 0!important
    }

    .m-sm-1 {
        margin: .25rem!important
    }

    .mt-sm-1,.my-sm-1 {
        margin-top: .25rem!important
    }

    .mr-sm-1,.mx-sm-1 {
        margin-right: .25rem!important
    }

    .mb-sm-1,.my-sm-1 {
        margin-bottom: .25rem!important
    }

    .ml-sm-1,.mx-sm-1 {
        margin-left: .25rem!important
    }

    .m-sm-2 {
        margin: .5rem!important
    }

    .mt-sm-2,.my-sm-2 {
        margin-top: .5rem!important
    }

    .mr-sm-2,.mx-sm-2 {
        margin-right: .5rem!important
    }

    .mb-sm-2,.my-sm-2 {
        margin-bottom: .5rem!important
    }

    .ml-sm-2,.mx-sm-2 {
        margin-left: .5rem!important
    }

    .m-sm-3 {
        margin: 1rem!important
    }

    .mt-sm-3,.my-sm-3 {
        margin-top: 1rem!important
    }

    .mr-sm-3,.mx-sm-3 {
        margin-right: 1rem!important
    }

    .mb-sm-3,.my-sm-3 {
        margin-bottom: 1rem!important
    }

    .ml-sm-3,.mx-sm-3 {
        margin-left: 1rem!important
    }

    .m-sm-4 {
        margin: 1.5rem!important
    }

    .mt-sm-4,.my-sm-4 {
        margin-top: 1.5rem!important
    }

    .mr-sm-4,.mx-sm-4 {
        margin-right: 1.5rem!important
    }

    .mb-sm-4,.my-sm-4 {
        margin-bottom: 1.5rem!important
    }

    .ml-sm-4,.mx-sm-4 {
        margin-left: 1.5rem!important
    }

    .m-sm-5 {
        margin: 3rem!important
    }

    .mt-sm-5,.my-sm-5 {
        margin-top: 3rem!important
    }

    .mr-sm-5,.mx-sm-5 {
        margin-right: 3rem!important
    }

    .mb-sm-5,.my-sm-5 {
        margin-bottom: 3rem!important
    }

    .ml-sm-5,.mx-sm-5 {
        margin-left: 3rem!important
    }

    .p-sm-0 {
        padding: 0!important
    }

    .pt-sm-0,.py-sm-0 {
        padding-top: 0!important
    }

    .pr-sm-0,.px-sm-0 {
        padding-right: 0!important
    }

    .pb-sm-0,.py-sm-0 {
        padding-bottom: 0!important
    }

    .pl-sm-0,.px-sm-0 {
        padding-left: 0!important
    }

    .p-sm-1 {
        padding: .25rem!important
    }

    .pt-sm-1,.py-sm-1 {
        padding-top: .25rem!important
    }

    .pr-sm-1,.px-sm-1 {
        padding-right: .25rem!important
    }

    .pb-sm-1,.py-sm-1 {
        padding-bottom: .25rem!important
    }

    .pl-sm-1,.px-sm-1 {
        padding-left: .25rem!important
    }

    .p-sm-2 {
        padding: .5rem!important
    }

    .pt-sm-2,.py-sm-2 {
        padding-top: .5rem!important
    }

    .pr-sm-2,.px-sm-2 {
        padding-right: .5rem!important
    }

    .pb-sm-2,.py-sm-2 {
        padding-bottom: .5rem!important
    }

    .pl-sm-2,.px-sm-2 {
        padding-left: .5rem!important
    }

    .p-sm-3 {
        padding: 1rem!important
    }

    .pt-sm-3,.py-sm-3 {
        padding-top: 1rem!important
    }

    .pr-sm-3,.px-sm-3 {
        padding-right: 1rem!important
    }

    .pb-sm-3,.py-sm-3 {
        padding-bottom: 1rem!important
    }

    .pl-sm-3,.px-sm-3 {
        padding-left: 1rem!important
    }

    .p-sm-4 {
        padding: 1.5rem!important
    }

    .pt-sm-4,.py-sm-4 {
        padding-top: 1.5rem!important
    }

    .pr-sm-4,.px-sm-4 {
        padding-right: 1.5rem!important
    }

    .pb-sm-4,.py-sm-4 {
        padding-bottom: 1.5rem!important
    }

    .pl-sm-4,.px-sm-4 {
        padding-left: 1.5rem!important
    }

    .p-sm-5 {
        padding: 3rem!important
    }

    .pt-sm-5,.py-sm-5 {
        padding-top: 3rem!important
    }

    .pr-sm-5,.px-sm-5 {
        padding-right: 3rem!important
    }

    .pb-sm-5,.py-sm-5 {
        padding-bottom: 3rem!important
    }

    .pl-sm-5,.px-sm-5 {
        padding-left: 3rem!important
    }

    .m-sm-auto {
        margin: auto!important
    }

    .mt-sm-auto,.my-sm-auto {
        margin-top: auto!important
    }

    .mr-sm-auto,.mx-sm-auto {
        margin-right: auto!important
    }

    .mb-sm-auto,.my-sm-auto {
        margin-bottom: auto!important
    }

    .ml-sm-auto,.mx-sm-auto {
        margin-left: auto!important
    }
}

@media (min-width: 768px) {
    .m-md-0 {
        margin:0!important
    }

    .mt-md-0,.my-md-0 {
        margin-top: 0!important
    }

    .mr-md-0,.mx-md-0 {
        margin-right: 0!important
    }

    .mb-md-0,.my-md-0 {
        margin-bottom: 0!important
    }

    .ml-md-0,.mx-md-0 {
        margin-left: 0!important
    }

    .m-md-1 {
        margin: .25rem!important
    }

    .mt-md-1,.my-md-1 {
        margin-top: .25rem!important
    }

    .mr-md-1,.mx-md-1 {
        margin-right: .25rem!important
    }

    .mb-md-1,.my-md-1 {
        margin-bottom: .25rem!important
    }

    .ml-md-1,.mx-md-1 {
        margin-left: .25rem!important
    }

    .m-md-2 {
        margin: .5rem!important
    }

    .mt-md-2,.my-md-2 {
        margin-top: .5rem!important
    }

    .mr-md-2,.mx-md-2 {
        margin-right: .5rem!important
    }

    .mb-md-2,.my-md-2 {
        margin-bottom: .5rem!important
    }

    .ml-md-2,.mx-md-2 {
        margin-left: .5rem!important
    }

    .m-md-3 {
        margin: 1rem!important
    }

    .mt-md-3,.my-md-3 {
        margin-top: 1rem!important
    }

    .mr-md-3,.mx-md-3 {
        margin-right: 1rem!important
    }

    .mb-md-3,.my-md-3 {
        margin-bottom: 1rem!important
    }

    .ml-md-3,.mx-md-3 {
        margin-left: 1rem!important
    }

    .m-md-4 {
        margin: 1.5rem!important
    }

    .mt-md-4,.my-md-4 {
        margin-top: 1.5rem!important
    }

    .mr-md-4,.mx-md-4 {
        margin-right: 1.5rem!important
    }

    .mb-md-4,.my-md-4 {
        margin-bottom: 1.5rem!important
    }

    .ml-md-4,.mx-md-4 {
        margin-left: 1.5rem!important
    }

    .m-md-5 {
        margin: 3rem!important
    }

    .mt-md-5,.my-md-5 {
        margin-top: 3rem!important
    }

    .mr-md-5,.mx-md-5 {
        margin-right: 3rem!important
    }

    .mb-md-5,.my-md-5 {
        margin-bottom: 3rem!important
    }

    .ml-md-5,.mx-md-5 {
        margin-left: 3rem!important
    }

    .p-md-0 {
        padding: 0!important
    }

    .pt-md-0,.py-md-0 {
        padding-top: 0!important
    }

    .pr-md-0,.px-md-0 {
        padding-right: 0!important
    }

    .pb-md-0,.py-md-0 {
        padding-bottom: 0!important
    }

    .pl-md-0,.px-md-0 {
        padding-left: 0!important
    }

    .p-md-1 {
        padding: .25rem!important
    }

    .pt-md-1,.py-md-1 {
        padding-top: .25rem!important
    }

    .pr-md-1,.px-md-1 {
        padding-right: .25rem!important
    }

    .pb-md-1,.py-md-1 {
        padding-bottom: .25rem!important
    }

    .pl-md-1,.px-md-1 {
        padding-left: .25rem!important
    }

    .p-md-2 {
        padding: .5rem!important
    }

    .pt-md-2,.py-md-2 {
        padding-top: .5rem!important
    }

    .pr-md-2,.px-md-2 {
        padding-right: .5rem!important
    }

    .pb-md-2,.py-md-2 {
        padding-bottom: .5rem!important
    }

    .pl-md-2,.px-md-2 {
        padding-left: .5rem!important
    }

    .p-md-3 {
        padding: 1rem!important
    }

    .pt-md-3,.py-md-3 {
        padding-top: 1rem!important
    }

    .pr-md-3,.px-md-3 {
        padding-right: 1rem!important
    }

    .pb-md-3,.py-md-3 {
        padding-bottom: 1rem!important
    }

    .pl-md-3,.px-md-3 {
        padding-left: 1rem!important
    }

    .p-md-4 {
        padding: 1.5rem!important
    }

    .pt-md-4,.py-md-4 {
        padding-top: 1.5rem!important
    }

    .pr-md-4,.px-md-4 {
        padding-right: 1.5rem!important
    }

    .pb-md-4,.py-md-4 {
        padding-bottom: 1.5rem!important
    }

    .pl-md-4,.px-md-4 {
        padding-left: 1.5rem!important
    }

    .p-md-5 {
        padding: 3rem!important
    }

    .pt-md-5,.py-md-5 {
        padding-top: 3rem!important
    }

    .pr-md-5,.px-md-5 {
        padding-right: 3rem!important
    }

    .pb-md-5,.py-md-5 {
        padding-bottom: 3rem!important
    }

    .pl-md-5,.px-md-5 {
        padding-left: 3rem!important
    }

    .m-md-auto {
        margin: auto!important
    }

    .mt-md-auto,.my-md-auto {
        margin-top: auto!important
    }

    .mr-md-auto,.mx-md-auto {
        margin-right: auto!important
    }

    .mb-md-auto,.my-md-auto {
        margin-bottom: auto!important
    }

    .ml-md-auto,.mx-md-auto {
        margin-left: auto!important
    }
}

@media (min-width: 992px) {
    .m-lg-0 {
        margin:0!important
    }

    .mt-lg-0,.my-lg-0 {
        margin-top: 0!important
    }

    .mr-lg-0,.mx-lg-0 {
        margin-right: 0!important
    }

    .mb-lg-0,.my-lg-0 {
        margin-bottom: 0!important
    }

    .ml-lg-0,.mx-lg-0 {
        margin-left: 0!important
    }

    .m-lg-1 {
        margin: .25rem!important
    }

    .mt-lg-1,.my-lg-1 {
        margin-top: .25rem!important
    }

    .mr-lg-1,.mx-lg-1 {
        margin-right: .25rem!important
    }

    .mb-lg-1,.my-lg-1 {
        margin-bottom: .25rem!important
    }

    .ml-lg-1,.mx-lg-1 {
        margin-left: .25rem!important
    }

    .m-lg-2 {
        margin: .5rem!important
    }

    .mt-lg-2,.my-lg-2 {
        margin-top: .5rem!important
    }

    .mr-lg-2,.mx-lg-2 {
        margin-right: .5rem!important
    }

    .mb-lg-2,.my-lg-2 {
        margin-bottom: .5rem!important
    }

    .ml-lg-2,.mx-lg-2 {
        margin-left: .5rem!important
    }

    .m-lg-3 {
        margin: 1rem!important
    }

    .mt-lg-3,.my-lg-3 {
        margin-top: 1rem!important
    }

    .mr-lg-3,.mx-lg-3 {
        margin-right: 1rem!important
    }

    .mb-lg-3,.my-lg-3 {
        margin-bottom: 1rem!important
    }

    .ml-lg-3,.mx-lg-3 {
        margin-left: 1rem!important
    }

    .m-lg-4 {
        margin: 1.5rem!important
    }

    .mt-lg-4,.my-lg-4 {
        margin-top: 1.5rem!important
    }

    .mr-lg-4,.mx-lg-4 {
        margin-right: 1.5rem!important
    }

    .mb-lg-4,.my-lg-4 {
        margin-bottom: 1.5rem!important
    }

    .ml-lg-4,.mx-lg-4 {
        margin-left: 1.5rem!important
    }

    .m-lg-5 {
        margin: 3rem!important
    }

    .mt-lg-5,.my-lg-5 {
        margin-top: 3rem!important
    }

    .mr-lg-5,.mx-lg-5 {
        margin-right: 3rem!important
    }

    .mb-lg-5,.my-lg-5 {
        margin-bottom: 3rem!important
    }

    .ml-lg-5,.mx-lg-5 {
        margin-left: 3rem!important
    }

    .p-lg-0 {
        padding: 0!important
    }

    .pt-lg-0,.py-lg-0 {
        padding-top: 0!important
    }

    .pr-lg-0,.px-lg-0 {
        padding-right: 0!important
    }

    .pb-lg-0,.py-lg-0 {
        padding-bottom: 0!important
    }

    .pl-lg-0,.px-lg-0 {
        padding-left: 0!important
    }

    .p-lg-1 {
        padding: .25rem!important
    }

    .pt-lg-1,.py-lg-1 {
        padding-top: .25rem!important
    }

    .pr-lg-1,.px-lg-1 {
        padding-right: .25rem!important
    }

    .pb-lg-1,.py-lg-1 {
        padding-bottom: .25rem!important
    }

    .pl-lg-1,.px-lg-1 {
        padding-left: .25rem!important
    }

    .p-lg-2 {
        padding: .5rem!important
    }

    .pt-lg-2,.py-lg-2 {
        padding-top: .5rem!important
    }

    .pr-lg-2,.px-lg-2 {
        padding-right: .5rem!important
    }

    .pb-lg-2,.py-lg-2 {
        padding-bottom: .5rem!important
    }

    .pl-lg-2,.px-lg-2 {
        padding-left: .5rem!important
    }

    .p-lg-3 {
        padding: 1rem!important
    }

    .pt-lg-3,.py-lg-3 {
        padding-top: 1rem!important
    }

    .pr-lg-3,.px-lg-3 {
        padding-right: 1rem!important
    }

    .pb-lg-3,.py-lg-3 {
        padding-bottom: 1rem!important
    }

    .pl-lg-3,.px-lg-3 {
        padding-left: 1rem!important
    }

    .p-lg-4 {
        padding: 1.5rem!important
    }

    .pt-lg-4,.py-lg-4 {
        padding-top: 1.5rem!important
    }

    .pr-lg-4,.px-lg-4 {
        padding-right: 1.5rem!important
    }

    .pb-lg-4,.py-lg-4 {
        padding-bottom: 1.5rem!important
    }

    .pl-lg-4,.px-lg-4 {
        padding-left: 1.5rem!important
    }

    .p-lg-5 {
        padding: 3rem!important
    }

    .pt-lg-5,.py-lg-5 {
        padding-top: 3rem!important
    }

    .pr-lg-5,.px-lg-5 {
        padding-right: 3rem!important
    }

    .pb-lg-5,.py-lg-5 {
        padding-bottom: 3rem!important
    }

    .pl-lg-5,.px-lg-5 {
        padding-left: 3rem!important
    }

    .m-lg-auto {
        margin: auto!important
    }

    .mt-lg-auto,.my-lg-auto {
        margin-top: auto!important
    }

    .mr-lg-auto,.mx-lg-auto {
        margin-right: auto!important
    }

    .mb-lg-auto,.my-lg-auto {
        margin-bottom: auto!important
    }

    .ml-lg-auto,.mx-lg-auto {
        margin-left: auto!important
    }
}

@media (min-width: 1200px) {
    .m-xl-0 {
        margin:0!important
    }

    .mt-xl-0,.my-xl-0 {
        margin-top: 0!important
    }

    .mr-xl-0,.mx-xl-0 {
        margin-right: 0!important
    }

    .mb-xl-0,.my-xl-0 {
        margin-bottom: 0!important
    }

    .ml-xl-0,.mx-xl-0 {
        margin-left: 0!important
    }

    .m-xl-1 {
        margin: .25rem!important
    }

    .mt-xl-1,.my-xl-1 {
        margin-top: .25rem!important
    }

    .mr-xl-1,.mx-xl-1 {
        margin-right: .25rem!important
    }

    .mb-xl-1,.my-xl-1 {
        margin-bottom: .25rem!important
    }

    .ml-xl-1,.mx-xl-1 {
        margin-left: .25rem!important
    }

    .m-xl-2 {
        margin: .5rem!important
    }

    .mt-xl-2,.my-xl-2 {
        margin-top: .5rem!important
    }

    .mr-xl-2,.mx-xl-2 {
        margin-right: .5rem!important
    }

    .mb-xl-2,.my-xl-2 {
        margin-bottom: .5rem!important
    }

    .ml-xl-2,.mx-xl-2 {
        margin-left: .5rem!important
    }

    .m-xl-3 {
        margin: 1rem!important
    }

    .mt-xl-3,.my-xl-3 {
        margin-top: 1rem!important
    }

    .mr-xl-3,.mx-xl-3 {
        margin-right: 1rem!important
    }

    .mb-xl-3,.my-xl-3 {
        margin-bottom: 1rem!important
    }

    .ml-xl-3,.mx-xl-3 {
        margin-left: 1rem!important
    }

    .m-xl-4 {
        margin: 1.5rem!important
    }

    .mt-xl-4,.my-xl-4 {
        margin-top: 1.5rem!important
    }

    .mr-xl-4,.mx-xl-4 {
        margin-right: 1.5rem!important
    }

    .mb-xl-4,.my-xl-4 {
        margin-bottom: 1.5rem!important
    }

    .ml-xl-4,.mx-xl-4 {
        margin-left: 1.5rem!important
    }

    .m-xl-5 {
        margin: 3rem!important
    }

    .mt-xl-5,.my-xl-5 {
        margin-top: 3rem!important
    }

    .mr-xl-5,.mx-xl-5 {
        margin-right: 3rem!important
    }

    .mb-xl-5,.my-xl-5 {
        margin-bottom: 3rem!important
    }

    .ml-xl-5,.mx-xl-5 {
        margin-left: 3rem!important
    }

    .p-xl-0 {
        padding: 0!important
    }

    .pt-xl-0,.py-xl-0 {
        padding-top: 0!important
    }

    .pr-xl-0,.px-xl-0 {
        padding-right: 0!important
    }

    .pb-xl-0,.py-xl-0 {
        padding-bottom: 0!important
    }

    .pl-xl-0,.px-xl-0 {
        padding-left: 0!important
    }

    .p-xl-1 {
        padding: .25rem!important
    }

    .pt-xl-1,.py-xl-1 {
        padding-top: .25rem!important
    }

    .pr-xl-1,.px-xl-1 {
        padding-right: .25rem!important
    }

    .pb-xl-1,.py-xl-1 {
        padding-bottom: .25rem!important
    }

    .pl-xl-1,.px-xl-1 {
        padding-left: .25rem!important
    }

    .p-xl-2 {
        padding: .5rem!important
    }

    .pt-xl-2,.py-xl-2 {
        padding-top: .5rem!important
    }

    .pr-xl-2,.px-xl-2 {
        padding-right: .5rem!important
    }

    .pb-xl-2,.py-xl-2 {
        padding-bottom: .5rem!important
    }

    .pl-xl-2,.px-xl-2 {
        padding-left: .5rem!important
    }

    .p-xl-3 {
        padding: 1rem!important
    }

    .pt-xl-3,.py-xl-3 {
        padding-top: 1rem!important
    }

    .pr-xl-3,.px-xl-3 {
        padding-right: 1rem!important
    }

    .pb-xl-3,.py-xl-3 {
        padding-bottom: 1rem!important
    }

    .pl-xl-3,.px-xl-3 {
        padding-left: 1rem!important
    }

    .p-xl-4 {
        padding: 1.5rem!important
    }

    .pt-xl-4,.py-xl-4 {
        padding-top: 1.5rem!important
    }

    .pr-xl-4,.px-xl-4 {
        padding-right: 1.5rem!important
    }

    .pb-xl-4,.py-xl-4 {
        padding-bottom: 1.5rem!important
    }

    .pl-xl-4,.px-xl-4 {
        padding-left: 1.5rem!important
    }

    .p-xl-5 {
        padding: 3rem!important
    }

    .pt-xl-5,.py-xl-5 {
        padding-top: 3rem!important
    }

    .pr-xl-5,.px-xl-5 {
        padding-right: 3rem!important
    }

    .pb-xl-5,.py-xl-5 {
        padding-bottom: 3rem!important
    }

    .pl-xl-5,.px-xl-5 {
        padding-left: 3rem!important
    }

    .m-xl-auto {
        margin: auto!important
    }

    .mt-xl-auto,.my-xl-auto {
        margin-top: auto!important
    }

    .mr-xl-auto,.mx-xl-auto {
        margin-right: auto!important
    }

    .mb-xl-auto,.my-xl-auto {
        margin-bottom: auto!important
    }

    .ml-xl-auto,.mx-xl-auto {
        margin-left: auto!important
    }
}

.text-monospace {
    font-family: SFMono-Regular,Menlo,Monaco,Consolas,"Liberation Mono","Courier New",monospace
}

.text-justify {
    text-align: justify!important
}

.text-nowrap {
    white-space: nowrap!important
}

.text-truncate {
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap
}

.text-left {
    text-align: left!important
}

.text-right {
    text-align: right!important
}

.text-center {
    text-align: center!important
}

@media (min-width: 576px) {
    .text-sm-left {
        text-align:left!important
    }

    .text-sm-right {
        text-align: right!important
    }

    .text-sm-center {
        text-align: center!important
    }
}

@media (min-width: 768px) {
    .text-md-left {
        text-align:left!important
    }

    .text-md-right {
        text-align: right!important
    }

    .text-md-center {
        text-align: center!important
    }
}

@media (min-width: 992px) {
    .text-lg-left {
        text-align:left!important
    }

    .text-lg-right {
        text-align: right!important
    }

    .text-lg-center {
        text-align: center!important
    }
}

@media (min-width: 1200px) {
    .text-xl-left {
        text-align:left!important
    }

    .text-xl-right {
        text-align: right!important
    }

    .text-xl-center {
        text-align: center!important
    }
}

.text-lowercase {
    text-transform: lowercase!important
}

.text-uppercase {
    text-transform: uppercase!important
}

.text-capitalize {
    text-transform: capitalize!important
}

.font-weight-light {
    font-weight: 300!important
}

.font-weight-normal {
    font-weight: 400!important
}

.font-weight-bold {
    font-weight: 700!important
}

.font-italic {
    font-style: italic!important
}

.text-white {
    color: #fff!important
}

.text-primary {
    color: #007bff!important
}

a.text-primary:focus,a.text-primary:hover {
    color: #0062cc!important
}

.text-secondary {
    color: #6c757d!important
}

a.text-secondary:focus,a.text-secondary:hover {
    color: #545b62!important
}

.text-success {
    color: #28a745!important
}

a.text-success:focus,a.text-success:hover {
    color: #1e7e34!important
}

.text-info {
    color: #17a2b8!important
}

a.text-info:focus,a.text-info:hover {
    color: #117a8b!important
}

.text-warning {
    color: #ffc107!important
}

a.text-warning:focus,a.text-warning:hover {
    color: #d39e00!important
}

.text-danger {
    color: #dc3545!important
}

a.text-danger:focus,a.text-danger:hover {
    color: #bd2130!important
}

.text-light {
    color: #f8f9fa!important
}

a.text-light:focus,a.text-light:hover {
    color: #dae0e5!important
}

.text-dark {
    color: #343a40!important
}

a.text-dark:focus,a.text-dark:hover {
    color: #1d2124!important
}

.text-body {
    color: #212529!important
}

.text-muted {
    color: #6c757d!important
}

.text-black-50 {
    color: rgba(0,0,0,.5)!important
}

.text-white-50 {
    color: rgba(255,255,255,.5)!important
}

.text-hide {
    font: 0/0 a;
    color: transparent;
    text-shadow: none;
    background-color: transparent;
    border: 0
}

.float-left {
    float: left!important
}

.float-right {
    float: right!important
}

.float-none {
    float: none!important
}

@media (min-width: 576px) {
    .float-sm-left {
        float:left!important
    }

    .float-sm-right {
        float: right!important
    }

    .float-sm-none {
        float: none!important
    }
}

@media (min-width: 768px) {
    .float-md-left {
        float:left!important
    }

    .float-md-right {
        float: right!important
    }

    .float-md-none {
        float: none!important
    }
}

@media (min-width: 992px) {
    .float-lg-left {
        float:left!important
    }

    .float-lg-right {
        float: right!important
    }

    .float-lg-none {
        float: none!important
    }
}

@media (min-width: 1200px) {
    .float-xl-left {
        float:left!important
    }

    .float-xl-right {
        float: right!important
    }

    .float-xl-none {
        float: none!important
    }
}

.gwd-lightbox {
    overflow: hidden
}

.gwd-pagedeck {
    position: relative;
    display: block
}

.gwd-pagedeck>.gwd-page.transparent {
    opacity: 0
}

.gwd-pagedeck>.gwd-page {
    position: absolute;
    top: 0;
    left: 0;
    -webkit-transition-property: -webkit-transform,opacity;
    -moz-transition-property: transform,opacity;
    transition-property: transform,opacity
}

.gwd-pagedeck>.gwd-page.linear {
    transition-timing-function: linear
}

.gwd-pagedeck>.gwd-page.ease-in {
    transition-timing-function: ease-in
}

.gwd-pagedeck>.gwd-page.ease-out {
    transition-timing-function: ease-out
}

.gwd-pagedeck>.gwd-page.ease {
    transition-timing-function: ease
}

.gwd-pagedeck>.gwd-page.ease-in-out {
    transition-timing-function: ease-in-out
}

.ease *,.ease-in *,.ease-in-out *,.ease-out *,.linear * {
    -webkit-transform: translateZ(0);
    transform: translateZ(0)
}

.gwd-image.scaled-proportionally>div.intermediate-element>img {
    background-repeat: no-repeat;
    background-position: center
}

.gwd-image {
    display: inline-block
}

.gwd-image>div.intermediate-element {
    width: 100%;
    height: 100%
}

.gwd-image>div.intermediate-element>img {
    display: block;
    width: 100%;
    height: 100%
}

.gwd-page-container {
    position: relative;
    width: 100%;
    height: 100%
}

.gwd-page-content {
    background-color: transparent;
    transform: matrix3d(1,0,0,0,0,1,0,0,0,0,1,0,0,0,0,1);
    -webkit-transform: matrix3d(1,0,0,0,0,1,0,0,0,0,1,0,0,0,0,1);
    -moz-transform: matrix3d(1,0,0,0,0,1,0,0,0,0,1,0,0,0,0,1);
    perspective: 1400px;
    -webkit-perspective: 1400px;
    -moz-perspective: 1400px;
    transform-style: preserve-3d;
    -webkit-transform-style: preserve-3d;
    -moz-transform-style: preserve-3d;
    position: absolute
}

.gwd-page-wrapper {
    background-color: #fff;
    position: absolute;
    transform: translateZ(0);
    -webkit-transform: translateZ(0);
    -moz-transform: translateZ(0)
}

.animation-holder {
    position: relative;
    display: flex;
    width: 100%;
    height: 270px;
    justify-content: space-between
}

.animation-holder .right-section {
    width: 500px;
    position: relative
}

.animation-holder .left-section {
    flex: 1;
    position: relative
}

.animation-holder .middle-section {
    width: 450px;
    z-index: 99
}

.gwd-page-size {
    width: 100%;
    height: 270px
}

.gwd-p-q647 {
    height: auto;
    left: 0;
    position: absolute;
    top: 0;
    width: auto
}

.gwd-img-10x2 {
    position: absolute;
    top: 0;
    left: 0;
    width: 5185px;
    height: 1309px
}

.gwd-image-1de6 {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 270px
}

.gwd-image-1de6 img {
    height: 100%
}

.gwd-image-fjrb {
    position: absolute;
    width: 231px;
    height: 140px;
    left: 0;
    top: 25%;
    transform-style: preserve-3d;
    -webkit-transform-style: preserve-3d;
    -moz-transform-style: preserve-3d;
    transform: translate3d(-4px,10px,0);
    -webkit-transform: translate3d(-4px,10px,0);
    -moz-transform: translate3d(-4px,10px,0)
}

.gwd-image-tue0 {
    position: absolute;
    width: 231px;
    height: 140px;
    left: 24%;
    top: 14px;
    transform-style: preserve-3d;
    -webkit-transform-style: preserve-3d;
    -moz-transform-style: preserve-3d;
    transform: translate3d(-.19939px,-25.2px,0);
    -webkit-transform: translate3d(-.19939px,-25.2px,0);
    -moz-transform: translate3d(-.19939px,-25.2px,0)
}

.gwd-image-1s9t {
    position: absolute;
    width: 232px;
    height: 141px;
    left: 49%;
    top: 40%;
    transform-style: preserve-3d;
    -webkit-transform-style: preserve-3d;
    -moz-transform-style: preserve-3d;
    transform: translate3d(12px,-4px,0);
    -webkit-transform: translate3d(12px,-4px,0);
    -moz-transform: translate3d(12px,-4px,0)
}

.gwd-image-yid6 {
    position: absolute;
    width: 226px;
    height: 137px;
    left: 28%;
    top: 70%;
    transform: translate3d(0,0,0);
    -webkit-transform: translate3d(0,0,0);
    -moz-transform: translate3d(0,0,0)
}

.gwd-image-q2m7 {
    position: absolute;
    width: 232px;
    height: 141px;
    left: 74%;
    top: 15%;
    transform-style: preserve-3d;
    -webkit-transform-style: preserve-3d;
    -moz-transform-style: preserve-3d;
    transform: translate3d(0,0,0);
    -webkit-transform: translate3d(0,0,0);
    -moz-transform: translate3d(0,0,0)
}

.gwd-image-9w5y {
    position: absolute;
    width: 231px;
    height: 140px;
    left: 82%;
    top: 84%;
    transform-style: preserve-3d;
    -webkit-transform-style: preserve-3d;
    -moz-transform-style: preserve-3d;
    transform: translate3d(0,0,0);
    -webkit-transform: translate3d(0,0,0);
    -moz-transform: translate3d(0,0,0)
}

@keyframes gwd-gen-xwlbgwdanimation_gwd-keyframes {
    0% {
        transform: translate3d(-4px,10px,0);
        -webkit-transform: translate3d(-4px,10px,0);
        -moz-transform: translate3d(-4px,10px,0);
        animation-timing-function: ease-out;
        -webkit-animation-timing-function: ease-out;
        -moz-animation-timing-function: ease-out
    }

    32% {
        transform: translate3d(-4.19911px,-14.3999px,0);
        -webkit-transform: translate3d(-4.19911px,-14.3999px,0);
        -moz-transform: translate3d(-4.19911px,-14.3999px,0);
        animation-timing-function: ease-in;
        -webkit-animation-timing-function: ease-in;
        -moz-animation-timing-function: ease-in
    }

    100% {
        transform: translate3d(-4px,10px,0);
        -webkit-transform: translate3d(-4px,10px,0);
        -moz-transform: translate3d(-4px,10px,0);
        animation-timing-function: linear;
        -webkit-animation-timing-function: linear;
        -moz-animation-timing-function: linear
    }
}

@-webkit-keyframes gwd-gen-xwlbgwdanimation_gwd-keyframes {
    0% {
        -webkit-transform: translate3d(-4px,10px,0);
        -webkit-animation-timing-function: ease-out
    }

    32% {
        -webkit-transform: translate3d(-4.19911px,-14.3999px,0);
        -webkit-animation-timing-function: ease-in
    }

    100% {
        -webkit-transform: translate3d(-4px,10px,0);
        -webkit-animation-timing-function: linear
    }
}

@-moz-keyframes gwd-gen-xwlbgwdanimation_gwd-keyframes {
    0% {
        -moz-transform: translate3d(-4px,10px,0);
        -moz-animation-timing-function: ease-out
    }

    32% {
        -moz-transform: translate3d(-4.19911px,-14.3999px,0);
        -moz-animation-timing-function: ease-in
    }

    100% {
        -moz-transform: translate3d(-4px,10px,0);
        -moz-animation-timing-function: linear
    }
}

.icofont-ads.gwd-play-animation .gwd-gen-xwlbgwdanimation {
    animation: gwd-gen-xwlbgwdanimation_gwd-keyframes 2.5s linear 0s infinite normal forwards;
    -webkit-animation: gwd-gen-xwlbgwdanimation_gwd-keyframes 2.5s linear 0s infinite normal forwards;
    -moz-animation: gwd-gen-xwlbgwdanimation_gwd-keyframes 2.5s linear 0s infinite normal forwards
}

@keyframes gwd-gen-1qcxgwdanimation_gwd-keyframes {
    0% {
        transform: translate3d(0,0,0);
        -webkit-transform: translate3d(0,0,0);
        -moz-transform: translate3d(0,0,0);
        animation-timing-function: ease-out;
        -webkit-animation-timing-function: ease-out;
        -moz-animation-timing-function: ease-out
    }

    40% {
        transform: translate3d(-.19939px,-25.2px,0);
        -webkit-transform: translate3d(-.19939px,-25.2px,0);
        -moz-transform: translate3d(-.19939px,-25.2px,0);
        animation-timing-function: linear;
        -webkit-animation-timing-function: linear;
        -moz-animation-timing-function: linear
    }

    100% {
        transform: translate3d(0,0,0);
        -webkit-transform: translate3d(0,0,0);
        -moz-transform: translate3d(0,0,0);
        animation-timing-function: linear;
        -webkit-animation-timing-function: linear;
        -moz-animation-timing-function: linear
    }
}

@-webkit-keyframes gwd-gen-1qcxgwdanimation_gwd-keyframes {
    0% {
        -webkit-transform: translate3d(0,0,0);
        -webkit-animation-timing-function: ease-out
    }

    40% {
        -webkit-transform: translate3d(-.19939px,-25.2px,0);
        -webkit-animation-timing-function: linear
    }

    100% {
        -webkit-transform: translate3d(0,0,0);
        -webkit-animation-timing-function: linear
    }
}

@-moz-keyframes gwd-gen-1qcxgwdanimation_gwd-keyframes {
    0% {
        -moz-transform: translate3d(0,0,0);
        -moz-animation-timing-function: ease-out
    }

    40% {
        -moz-transform: translate3d(-.19939px,-25.2px,0);
        -moz-animation-timing-function: linear
    }

    100% {
        -moz-transform: translate3d(0,0,0);
        -moz-animation-timing-function: linear
    }
}

.icofont-ads.gwd-play-animation .gwd-gen-1qcxgwdanimation {
    animation: gwd-gen-1qcxgwdanimation_gwd-keyframes 2.5s linear 0s infinite normal forwards;
    -webkit-animation: gwd-gen-1qcxgwdanimation_gwd-keyframes 2.5s linear 0s infinite normal forwards;
    -moz-animation: gwd-gen-1qcxgwdanimation_gwd-keyframes 2.5s linear 0s infinite normal forwards
}

@keyframes gwd-gen-pp4ngwdanimation_gwd-keyframes {
    0% {
        transform: translate3d(12px,16px,0);
        -webkit-transform: translate3d(12px,16px,0);
        -moz-transform: translate3d(12px,16px,0);
        animation-timing-function: ease-out;
        -webkit-animation-timing-function: ease-out;
        -moz-animation-timing-function: ease-out
    }

    56% {
        transform: translate3d(12px,-15px,0);
        -webkit-transform: translate3d(12px,-15px,0);
        -moz-transform: translate3d(12px,-15px,0);
        animation-timing-function: ease-in;
        -webkit-animation-timing-function: ease-in;
        -moz-animation-timing-function: ease-in
    }

    100% {
        transform: translate3d(12px,16px,0);
        -webkit-transform: translate3d(12px,16px,0);
        -moz-transform: translate3d(12px,16px,0);
        animation-timing-function: linear;
        -webkit-animation-timing-function: linear;
        -moz-animation-timing-function: linear
    }
}

@-webkit-keyframes gwd-gen-pp4ngwdanimation_gwd-keyframes {
    0% {
        -webkit-transform: translate3d(12px,16px,0);
        -webkit-animation-timing-function: ease-out
    }

    56% {
        -webkit-transform: translate3d(12px,-15px,0);
        -webkit-animation-timing-function: ease-in
    }

    100% {
        -webkit-transform: translate3d(12px,16px,0);
        -webkit-animation-timing-function: linear
    }
}

@-moz-keyframes gwd-gen-pp4ngwdanimation_gwd-keyframes {
    0% {
        -moz-transform: translate3d(12px,16px,0);
        -moz-animation-timing-function: ease-out
    }

    56% {
        -moz-transform: translate3d(12px,-15px,0);
        -moz-animation-timing-function: ease-in
    }

    100% {
        -moz-transform: translate3d(12px,16px,0);
        -moz-animation-timing-function: linear
    }
}

.icofont-ads.gwd-play-animation .gwd-gen-pp4ngwdanimation {
    animation: gwd-gen-pp4ngwdanimation_gwd-keyframes 2.5s linear 0s infinite normal forwards;
    -webkit-animation: gwd-gen-pp4ngwdanimation_gwd-keyframes 2.5s linear 0s infinite normal forwards;
    -moz-animation: gwd-gen-pp4ngwdanimation_gwd-keyframes 2.5s linear 0s infinite normal forwards
}

@keyframes gwd-gen-18fugwdanimation_gwd-keyframes {
    0% {
        transform: translate3d(0,0,0);
        -webkit-transform: translate3d(0,0,0);
        -moz-transform: translate3d(0,0,0);
        animation-timing-function: ease-out;
        -webkit-animation-timing-function: ease-out;
        -moz-animation-timing-function: ease-out
    }

    48% {
        transform: translate3d(0,-31px,0);
        -webkit-transform: translate3d(0,-31px,0);
        -moz-transform: translate3d(0,-31px,0);
        animation-timing-function: ease-in;
        -webkit-animation-timing-function: ease-in;
        -moz-animation-timing-function: ease-in
    }

    100% {
        transform: translate3d(0,0,0);
        -webkit-transform: translate3d(0,0,0);
        -moz-transform: translate3d(0,0,0);
        animation-timing-function: linear;
        -webkit-animation-timing-function: linear;
        -moz-animation-timing-function: linear
    }
}

@-webkit-keyframes gwd-gen-18fugwdanimation_gwd-keyframes {
    0% {
        -webkit-transform: translate3d(0,0,0);
        -webkit-animation-timing-function: ease-out
    }

    48% {
        -webkit-transform: translate3d(0,-31px,0);
        -webkit-animation-timing-function: ease-in
    }

    100% {
        -webkit-transform: translate3d(0,0,0);
        -webkit-animation-timing-function: linear
    }
}

@-moz-keyframes gwd-gen-18fugwdanimation_gwd-keyframes {
    0% {
        -moz-transform: translate3d(0,0,0);
        -moz-animation-timing-function: ease-out
    }

    48% {
        -moz-transform: translate3d(0,-31px,0);
        -moz-animation-timing-function: ease-in
    }

    100% {
        -moz-transform: translate3d(0,0,0);
        -moz-animation-timing-function: linear
    }
}

.icofont-ads.gwd-play-animation .gwd-gen-18fugwdanimation {
    animation: gwd-gen-18fugwdanimation_gwd-keyframes 2.5s linear 0s infinite normal forwards;
    -webkit-animation: gwd-gen-18fugwdanimation_gwd-keyframes 2.5s linear 0s infinite normal forwards;
    -moz-animation: gwd-gen-18fugwdanimation_gwd-keyframes 2.5s linear 0s infinite normal forwards
}

@keyframes gwd-gen-1gt3gwdanimation_gwd-keyframes {
    0% {
        transform: translate3d(0,0,0);
        -webkit-transform: translate3d(0,0,0);
        -moz-transform: translate3d(0,0,0);
        animation-timing-function: ease-out;
        -webkit-animation-timing-function: ease-out;
        -moz-animation-timing-function: ease-out
    }

    64% {
        transform: translate3d(0,-28px,0);
        -webkit-transform: translate3d(0,-28px,0);
        -moz-transform: translate3d(0,-28px,0);
        animation-timing-function: ease-in;
        -webkit-animation-timing-function: ease-in;
        -moz-animation-timing-function: ease-in
    }

    100% {
        transform: translate3d(0,0,0);
        -webkit-transform: translate3d(0,0,0);
        -moz-transform: translate3d(0,0,0);
        animation-timing-function: linear;
        -webkit-animation-timing-function: linear;
        -moz-animation-timing-function: linear
    }
}

@-webkit-keyframes gwd-gen-1gt3gwdanimation_gwd-keyframes {
    0% {
        -webkit-transform: translate3d(0,0,0);
        -webkit-animation-timing-function: ease-out
    }

    64% {
        -webkit-transform: translate3d(0,-28px,0);
        -webkit-animation-timing-function: ease-in
    }

    100% {
        -webkit-transform: translate3d(0,0,0);
        -webkit-animation-timing-function: linear
    }
}

@-moz-keyframes gwd-gen-1gt3gwdanimation_gwd-keyframes {
    0% {
        -moz-transform: translate3d(0,0,0);
        -moz-animation-timing-function: ease-out
    }

    64% {
        -moz-transform: translate3d(0,-28px,0);
        -moz-animation-timing-function: ease-in
    }

    100% {
        -moz-transform: translate3d(0,0,0);
        -moz-animation-timing-function: linear
    }
}

.icofont-ads.gwd-play-animation .gwd-gen-1gt3gwdanimation {
    animation: gwd-gen-1gt3gwdanimation_gwd-keyframes 2.5s linear 0s infinite normal forwards;
    -webkit-animation: gwd-gen-1gt3gwdanimation_gwd-keyframes 2.5s linear 0s infinite normal forwards;
    -moz-animation: gwd-gen-1gt3gwdanimation_gwd-keyframes 2.5s linear 0s infinite normal forwards
}

@keyframes gwd-gen-1f36gwdanimation_gwd-keyframes {
    0% {
        transform: translate3d(0,0,0);
        -webkit-transform: translate3d(0,0,0);
        -moz-transform: translate3d(0,0,0);
        animation-timing-function: ease-out;
        -webkit-animation-timing-function: ease-out;
        -moz-animation-timing-function: ease-out
    }

    72% {
        transform: translate3d(0,-36px,0);
        -webkit-transform: translate3d(0,-36px,0);
        -moz-transform: translate3d(0,-36px,0);
        animation-timing-function: ease-in;
        -webkit-animation-timing-function: ease-in;
        -moz-animation-timing-function: ease-in
    }

    100% {
        transform: translate3d(0,0,0);
        -webkit-transform: translate3d(0,0,0);
        -moz-transform: translate3d(0,0,0);
        animation-timing-function: linear;
        -webkit-animation-timing-function: linear;
        -moz-animation-timing-function: linear
    }
}

@-webkit-keyframes gwd-gen-1f36gwdanimation_gwd-keyframes {
    0% {
        -webkit-transform: translate3d(0,0,0);
        -webkit-animation-timing-function: ease-out
    }

    72% {
        -webkit-transform: translate3d(0,-36px,0);
        -webkit-animation-timing-function: ease-in
    }

    100% {
        -webkit-transform: translate3d(0,0,0);
        -webkit-animation-timing-function: linear
    }
}

@-moz-keyframes gwd-gen-1f36gwdanimation_gwd-keyframes {
    0% {
        -moz-transform: translate3d(0,0,0);
        -moz-animation-timing-function: ease-out
    }

    72% {
        -moz-transform: translate3d(0,-36px,0);
        -moz-animation-timing-function: ease-in
    }

    100% {
        -moz-transform: translate3d(0,0,0);
        -moz-animation-timing-function: linear
    }
}

.icofont-ads.gwd-play-animation .gwd-gen-1f36gwdanimation {
    animation: gwd-gen-1f36gwdanimation_gwd-keyframes 2.5s linear 0s infinite normal forwards;
    -webkit-animation: gwd-gen-1f36gwdanimation_gwd-keyframes 2.5s linear 0s infinite normal forwards;
    -moz-animation: gwd-gen-1f36gwdanimation_gwd-keyframes 2.5s linear 0s infinite normal forwards
}

.gwd-image-1s2c {
    position: absolute;
    width: 231px;
    height: 140px;
    left: 287px;
    top: 26px
}

.gwd-image-5xgc {
    position: absolute;
    width: 231px;
    height: 140px;
    left: 403px;
    top: 106px
}

.gwd-image-1uyd {
    position: absolute;
    width: 231px;
    height: 140px;
    left: 11px;
    top: 44px
}

.gwd-image-1w5y {
    position: absolute;
    width: 232px;
    height: 141px;
    left: 121px;
    top: 124px
}

.gwd-image-sbag {
    position: absolute;
    width: 226px;
    height: 137px;
    left: 249px;
    top: 204px
}

.gwd-image-1u1i {
    position: absolute;
    width: 231px;
    height: 140px;
    left: -94px;
    top: 176px
}

.gwd-image-6t8i {
    position: absolute;
    width: 231px;
    height: 140px;
    left: 7px;
    top: 258px
}

@keyframes gwd-gen-13yegwdanimation_gwd-keyframes {
    0% {
        transform: translate3d(0,0,0);
        -webkit-transform: translate3d(0,0,0);
        -moz-transform: translate3d(0,0,0);
        animation-timing-function: ease-out;
        -webkit-animation-timing-function: ease-out;
        -moz-animation-timing-function: ease-out
    }

    32% {
        transform: translate3d(0,-25px,0);
        -webkit-transform: translate3d(0,-25px,0);
        -moz-transform: translate3d(0,-25px,0);
        animation-timing-function: ease-in;
        -webkit-animation-timing-function: ease-in;
        -moz-animation-timing-function: ease-in
    }

    100% {
        transform: translate3d(0,0,0);
        -webkit-transform: translate3d(0,0,0);
        -moz-transform: translate3d(0,0,0);
        animation-timing-function: linear;
        -webkit-animation-timing-function: linear;
        -moz-animation-timing-function: linear
    }
}

@-webkit-keyframes gwd-gen-13yegwdanimation_gwd-keyframes {
    0% {
        -webkit-transform: translate3d(0,0,0);
        -webkit-animation-timing-function: ease-out
    }

    32% {
        -webkit-transform: translate3d(0,-25px,0);
        -webkit-animation-timing-function: ease-in
    }

    100% {
        -webkit-transform: translate3d(0,0,0);
        -webkit-animation-timing-function: linear
    }
}

@-moz-keyframes gwd-gen-13yegwdanimation_gwd-keyframes {
    0% {
        -moz-transform: translate3d(0,0,0);
        -moz-animation-timing-function: ease-out
    }

    32% {
        -moz-transform: translate3d(0,-25px,0);
        -moz-animation-timing-function: ease-in
    }

    100% {
        -moz-transform: translate3d(0,0,0);
        -moz-animation-timing-function: linear
    }
}

.icofont-ads.gwd-play-animation .gwd-gen-13yegwdanimation {
    animation: gwd-gen-13yegwdanimation_gwd-keyframes 2.5s linear 0s infinite normal forwards;
    -webkit-animation: gwd-gen-13yegwdanimation_gwd-keyframes 2.5s linear 0s infinite normal forwards;
    -moz-animation: gwd-gen-13yegwdanimation_gwd-keyframes 2.5s linear 0s infinite normal forwards
}

@keyframes gwd-gen-1f5ygwdanimation_gwd-keyframes {
    0% {
        transform: translate3d(0,0,0);
        -webkit-transform: translate3d(0,0,0);
        -moz-transform: translate3d(0,0,0);
        animation-timing-function: ease-out;
        -webkit-animation-timing-function: ease-out;
        -moz-animation-timing-function: ease-out
    }

    40% {
        transform: translate3d(.40021px,-25.9999px,0);
        -webkit-transform: translate3d(.40021px,-25.9999px,0);
        -moz-transform: translate3d(.40021px,-25.9999px,0);
        animation-timing-function: ease-in;
        -webkit-animation-timing-function: ease-in;
        -moz-animation-timing-function: ease-in
    }

    100% {
        transform: translate3d(0,0,0);
        -webkit-transform: translate3d(0,0,0);
        -moz-transform: translate3d(0,0,0);
        animation-timing-function: ease-in;
        -webkit-animation-timing-function: ease-in;
        -moz-animation-timing-function: ease-in
    }
}

@-webkit-keyframes gwd-gen-1f5ygwdanimation_gwd-keyframes {
    0% {
        -webkit-transform: translate3d(0,0,0);
        -webkit-animation-timing-function: ease-out
    }

    40% {
        -webkit-transform: translate3d(.40021px,-25.9999px,0);
        -webkit-animation-timing-function: ease-in
    }

    100% {
        -webkit-transform: translate3d(0,0,0);
        -webkit-animation-timing-function: ease-in
    }
}

@-moz-keyframes gwd-gen-1f5ygwdanimation_gwd-keyframes {
    0% {
        -moz-transform: translate3d(0,0,0);
        -moz-animation-timing-function: ease-out
    }

    40% {
        -moz-transform: translate3d(.40021px,-25.9999px,0);
        -moz-animation-timing-function: ease-in
    }

    100% {
        -moz-transform: translate3d(0,0,0);
        -moz-animation-timing-function: ease-in
    }
}

.icofont-ads.gwd-play-animation .gwd-gen-1f5ygwdanimation {
    animation: gwd-gen-1f5ygwdanimation_gwd-keyframes 2.5s linear 0s infinite normal forwards;
    -webkit-animation: gwd-gen-1f5ygwdanimation_gwd-keyframes 2.5s linear 0s infinite normal forwards;
    -moz-animation: gwd-gen-1f5ygwdanimation_gwd-keyframes 2.5s linear 0s infinite normal forwards
}

@keyframes gwd-gen-1x4wgwdanimation_gwd-keyframes {
    0% {
        transform: translate3d(0,0,0);
        -webkit-transform: translate3d(0,0,0);
        -moz-transform: translate3d(0,0,0);
        animation-timing-function: ease-out;
        -webkit-animation-timing-function: ease-out;
        -moz-animation-timing-function: ease-out
    }

    48% {
        transform: translate3d(0,-21px,0);
        -webkit-transform: translate3d(0,-21px,0);
        -moz-transform: translate3d(0,-21px,0);
        animation-timing-function: ease-in;
        -webkit-animation-timing-function: ease-in;
        -moz-animation-timing-function: ease-in
    }

    100% {
        transform: translate3d(0,0,0);
        -webkit-transform: translate3d(0,0,0);
        -moz-transform: translate3d(0,0,0);
        animation-timing-function: linear;
        -webkit-animation-timing-function: linear;
        -moz-animation-timing-function: linear
    }
}

@-webkit-keyframes gwd-gen-1x4wgwdanimation_gwd-keyframes {
    0% {
        -webkit-transform: translate3d(0,0,0);
        -webkit-animation-timing-function: ease-out
    }

    48% {
        -webkit-transform: translate3d(0,-21px,0);
        -webkit-animation-timing-function: ease-in
    }

    100% {
        -webkit-transform: translate3d(0,0,0);
        -webkit-animation-timing-function: linear
    }
}

@-moz-keyframes gwd-gen-1x4wgwdanimation_gwd-keyframes {
    0% {
        -moz-transform: translate3d(0,0,0);
        -moz-animation-timing-function: ease-out
    }

    48% {
        -moz-transform: translate3d(0,-21px,0);
        -moz-animation-timing-function: ease-in
    }

    100% {
        -moz-transform: translate3d(0,0,0);
        -moz-animation-timing-function: linear
    }
}

.icofont-ads.gwd-play-animation .gwd-gen-1x4wgwdanimation {
    animation: gwd-gen-1x4wgwdanimation_gwd-keyframes 2.5s linear 0s infinite normal forwards;
    -webkit-animation: gwd-gen-1x4wgwdanimation_gwd-keyframes 2.5s linear 0s infinite normal forwards;
    -moz-animation: gwd-gen-1x4wgwdanimation_gwd-keyframes 2.5s linear 0s infinite normal forwards
}

@keyframes gwd-gen-t0iwgwdanimation_gwd-keyframes {
    0% {
        transform: translate3d(0,0,0);
        -webkit-transform: translate3d(0,0,0);
        -moz-transform: translate3d(0,0,0);
        animation-timing-function: ease-out;
        -webkit-animation-timing-function: ease-out;
        -moz-animation-timing-function: ease-out
    }

    56% {
        transform: translate3d(0,-23px,0);
        -webkit-transform: translate3d(0,-23px,0);
        -moz-transform: translate3d(0,-23px,0);
        animation-timing-function: ease-in;
        -webkit-animation-timing-function: ease-in;
        -moz-animation-timing-function: ease-in
    }

    100% {
        transform: translate3d(0,0,0);
        -webkit-transform: translate3d(0,0,0);
        -moz-transform: translate3d(0,0,0);
        animation-timing-function: linear;
        -webkit-animation-timing-function: linear;
        -moz-animation-timing-function: linear
    }
}

@-webkit-keyframes gwd-gen-t0iwgwdanimation_gwd-keyframes {
    0% {
        -webkit-transform: translate3d(0,0,0);
        -webkit-animation-timing-function: ease-out
    }

    56% {
        -webkit-transform: translate3d(0,-23px,0);
        -webkit-animation-timing-function: ease-in
    }

    100% {
        -webkit-transform: translate3d(0,0,0);
        -webkit-animation-timing-function: linear
    }
}

@-moz-keyframes gwd-gen-t0iwgwdanimation_gwd-keyframes {
    0% {
        -moz-transform: translate3d(0,0,0);
        -moz-animation-timing-function: ease-out
    }

    56% {
        -moz-transform: translate3d(0,-23px,0);
        -moz-animation-timing-function: ease-in
    }

    100% {
        -moz-transform: translate3d(0,0,0);
        -moz-animation-timing-function: linear
    }
}

.icofont-ads.gwd-play-animation .gwd-gen-t0iwgwdanimation {
    animation: gwd-gen-t0iwgwdanimation_gwd-keyframes 2.5s linear 0s infinite normal forwards;
    -webkit-animation: gwd-gen-t0iwgwdanimation_gwd-keyframes 2.5s linear 0s infinite normal forwards;
    -moz-animation: gwd-gen-t0iwgwdanimation_gwd-keyframes 2.5s linear 0s infinite normal forwards
}

@keyframes gwd-gen-1gozgwdanimation_gwd-keyframes {
    0% {
        transform: translate3d(0,0,0);
        -webkit-transform: translate3d(0,0,0);
        -moz-transform: translate3d(0,0,0);
        animation-timing-function: ease-out;
        -webkit-animation-timing-function: ease-out;
        -moz-animation-timing-function: ease-out
    }

    64% {
        transform: translate3d(0,-24px,0);
        -webkit-transform: translate3d(0,-24px,0);
        -moz-transform: translate3d(0,-24px,0);
        animation-timing-function: ease-in;
        -webkit-animation-timing-function: ease-in;
        -moz-animation-timing-function: ease-in
    }

    100% {
        transform: translate3d(0,0,0);
        -webkit-transform: translate3d(0,0,0);
        -moz-transform: translate3d(0,0,0);
        animation-timing-function: linear;
        -webkit-animation-timing-function: linear;
        -moz-animation-timing-function: linear
    }
}

@-webkit-keyframes gwd-gen-1gozgwdanimation_gwd-keyframes {
    0% {
        -webkit-transform: translate3d(0,0,0);
        -webkit-animation-timing-function: ease-out
    }

    64% {
        -webkit-transform: translate3d(0,-24px,0);
        -webkit-animation-timing-function: ease-in
    }

    100% {
        -webkit-transform: translate3d(0,0,0);
        -webkit-animation-timing-function: linear
    }
}

@-moz-keyframes gwd-gen-1gozgwdanimation_gwd-keyframes {
    0% {
        -moz-transform: translate3d(0,0,0);
        -moz-animation-timing-function: ease-out
    }

    64% {
        -moz-transform: translate3d(0,-24px,0);
        -moz-animation-timing-function: ease-in
    }

    100% {
        -moz-transform: translate3d(0,0,0);
        -moz-animation-timing-function: linear
    }
}

.icofont-ads.gwd-play-animation .gwd-gen-1gozgwdanimation {
    animation: gwd-gen-1gozgwdanimation_gwd-keyframes 2.5s linear 0s infinite normal forwards;
    -webkit-animation: gwd-gen-1gozgwdanimation_gwd-keyframes 2.5s linear 0s infinite normal forwards;
    -moz-animation: gwd-gen-1gozgwdanimation_gwd-keyframes 2.5s linear 0s infinite normal forwards
}

@keyframes gwd-gen-13dkgwdanimation_gwd-keyframes {
    0% {
        transform: translate3d(0,0,0);
        -webkit-transform: translate3d(0,0,0);
        -moz-transform: translate3d(0,0,0);
        animation-timing-function: ease-out;
        -webkit-animation-timing-function: ease-out;
        -moz-animation-timing-function: ease-out
    }

    72% {
        transform: translate3d(0,-20px,0);
        -webkit-transform: translate3d(0,-20px,0);
        -moz-transform: translate3d(0,-20px,0);
        animation-timing-function: ease-in;
        -webkit-animation-timing-function: ease-in;
        -moz-animation-timing-function: ease-in
    }

    100% {
        transform: translate3d(0,0,0);
        -webkit-transform: translate3d(0,0,0);
        -moz-transform: translate3d(0,0,0);
        animation-timing-function: linear;
        -webkit-animation-timing-function: linear;
        -moz-animation-timing-function: linear
    }
}

@-webkit-keyframes gwd-gen-13dkgwdanimation_gwd-keyframes {
    0% {
        -webkit-transform: translate3d(0,0,0);
        -webkit-animation-timing-function: ease-out
    }

    72% {
        -webkit-transform: translate3d(0,-20px,0);
        -webkit-animation-timing-function: ease-in
    }

    100% {
        -webkit-transform: translate3d(0,0,0);
        -webkit-animation-timing-function: linear
    }
}

@-moz-keyframes gwd-gen-13dkgwdanimation_gwd-keyframes {
    0% {
        -moz-transform: translate3d(0,0,0);
        -moz-animation-timing-function: ease-out
    }

    72% {
        -moz-transform: translate3d(0,-20px,0);
        -moz-animation-timing-function: ease-in
    }

    100% {
        -moz-transform: translate3d(0,0,0);
        -moz-animation-timing-function: linear
    }
}

.icofont-ads.gwd-play-animation .gwd-gen-13dkgwdanimation {
    animation: gwd-gen-13dkgwdanimation_gwd-keyframes 2.5s linear 0s infinite normal forwards;
    -webkit-animation: gwd-gen-13dkgwdanimation_gwd-keyframes 2.5s linear 0s infinite normal forwards;
    -moz-animation: gwd-gen-13dkgwdanimation_gwd-keyframes 2.5s linear 0s infinite normal forwards
}

@keyframes gwd-gen-4vlsgwdanimation_gwd-keyframes {
    0% {
        transform: translate3d(0,0,0);
        -webkit-transform: translate3d(0,0,0);
        -moz-transform: translate3d(0,0,0);
        animation-timing-function: ease-in;
        -webkit-animation-timing-function: ease-in;
        -moz-animation-timing-function: ease-in
    }

    80% {
        transform: translate3d(0,-25px,0);
        -webkit-transform: translate3d(0,-25px,0);
        -moz-transform: translate3d(0,-25px,0);
        animation-timing-function: ease-in;
        -webkit-animation-timing-function: ease-in;
        -moz-animation-timing-function: ease-in
    }

    100% {
        transform: translate3d(0,0,0);
        -webkit-transform: translate3d(0,0,0);
        -moz-transform: translate3d(0,0,0);
        animation-timing-function: linear;
        -webkit-animation-timing-function: linear;
        -moz-animation-timing-function: linear
    }
}

@-webkit-keyframes gwd-gen-4vlsgwdanimation_gwd-keyframes {
    0% {
        -webkit-transform: translate3d(0,0,0);
        -webkit-animation-timing-function: ease-in
    }

    80% {
        -webkit-transform: translate3d(0,-25px,0);
        -webkit-animation-timing-function: ease-in
    }

    100% {
        -webkit-transform: translate3d(0,0,0);
        -webkit-animation-timing-function: linear
    }
}

@-moz-keyframes gwd-gen-4vlsgwdanimation_gwd-keyframes {
    0% {
        -moz-transform: translate3d(0,0,0);
        -moz-animation-timing-function: ease-in
    }

    80% {
        -moz-transform: translate3d(0,-25px,0);
        -moz-animation-timing-function: ease-in
    }

    100% {
        -moz-transform: translate3d(0,0,0);
        -moz-animation-timing-function: linear
    }
}

.icofont-ads.gwd-play-animation .gwd-gen-4vlsgwdanimation {
    animation: gwd-gen-4vlsgwdanimation_gwd-keyframes 2.5s linear 0s infinite normal forwards;
    -webkit-animation: gwd-gen-4vlsgwdanimation_gwd-keyframes 2.5s linear 0s infinite normal forwards;
    -moz-animation: gwd-gen-4vlsgwdanimation_gwd-keyframes 2.5s linear 0s infinite normal forwards
}

.gwd-div-1tec {
    position: absolute;
    background-color: transparent;
    border-radius: 8px;
    background: -webkit-linear-gradient(left,#ad07fe 8%,#d925b9 100%);
    background: -moz-linear-gradient(left,#ad07fe 8%,#d925b9 100%);
    background: linear-gradient(to right,#ad07fe 8%,#d925b9 100%);
    top: 50%;
    transform-style: preserve-3d;
    -webkit-transform-style: preserve-3d;
    -moz-transform-style: preserve-3d;
    left: 50%;
    width: 323px;
    height: 75px;
    transform-origin: 161.5px 37.5148px 0;
    -webkit-transform-origin: 161.5px 37.5148px 0;
    -moz-transform-origin: 161.5px 37.5148px 0;
    transform: translate3d(-161px,7px,0);
    -webkit-transform: translate3d(-161px,7px,0);
    -moz-transform: translate3d(-161px,7px,0)
}

.gwd-image-sbqb {
    position: absolute;
    top: 101px;
    left: 50%;
    transform-style: preserve-3d;
    -webkit-transform-style: preserve-3d;
    -moz-transform-style: preserve-3d;
    height: 155px;
    width: 417px;
    transform-origin: 213.904px 77.4531px 0;
    -webkit-transform-origin: 213.904px 77.4531px 0;
    -moz-transform-origin: 213.904px 77.4531px 0;
    transform: translate3d(-207px,3px,0);
    -webkit-transform: translate3d(-207px,3px,0);
    -moz-transform: translate3d(-207px,3px,0)
}

.gwd-span-lw05 {
    position: absolute;
    font-family: avenir;
    font-weight: 700;
    color: #fff;
    font-size: 21px;
    top: 51%;
    transform-style: preserve-3d;
    -webkit-transform-style: preserve-3d;
    -moz-transform-style: preserve-3d;
    left: 50%;
    transform: translate3d(-94px,30px,0);
    -webkit-transform: translate3d(-94px,30px,0);
    -moz-transform: translate3d(-94px,30px,0)
}

.gwd-image-grxm {
    position: absolute;
    top: 40px;
    left: 50%;
    transform-style: preserve-3d;
    -webkit-transform-style: preserve-3d;
    -moz-transform-style: preserve-3d;
    width: 415px;
    height: 72px;
    transform-origin: 207.71px 35.9827px 0;
    -webkit-transform-origin: 207.71px 35.9827px 0;
    -moz-transform-origin: 207.71px 35.9827px 0;
    transform: translate3d(-208px,0,0);
    -webkit-transform: translate3d(-208px,0,0);
    -moz-transform: translate3d(-208px,0,0)
}

@media (max-width: 991px) {
    .animation-holder .right-section {
        display:none
    }
}

@media (max-width: 480px) {
    .gwd-image-grxm {
        left:60%;
        width: 315px
    }
}

.icofont {
    font-family: IcoFont;
    font-style: normal
}
/* 
a,a:focus,a:hover,a:visited,input,input:active,input:focus,input:hover,select {
    text-decoration: none;
    outline: 0!important
}

img {
    max-width: 100%
}

a {
    color: #a763ff;
    transition: color .3s
}

a:active,a:focus,a:hover {
    color: #c496ff;
    text-decoration: none
}

a,span {
    display: inline-block
}

.clearfix::after {
    display: block;
    clear: both;
    content: ""
}

ul {
    margin: 0;
    padding: 0
}

.top--padding {
    padding-top: 80px
}

@media only screen and (min-width: 0px) and (max-width:767px) {
    .top--padding {
        padding-top:50px
    }
}

.btm--padding {
    padding-bottom: 80px
}

@media only screen and (min-width: 0px) and (max-width:767px) {
    .btm--padding {
        padding-bottom:50px
    }
}

.section--padding {
    padding-top: 80px;
    padding-bottom: 80px
}

@media only screen and (min-width: 0px) and (max-width:767px) {
    .section--padding {
        padding-bottom:50px;
        padding-top: 50px
    }
}

.major_color {
    color: #a763ff
}

.hero__area,.major_color_bg,.major_color_gradient {
    background-color: #a763ff
}

.icon__container__area .icofont__search input.search__input:focus,.major_color_bo {
    border-color: #a763ff!important
}

.hero__area,.major_color_gradient {
    background-image: linear-gradient(#3a8eff,#006bfb)
}

body {
    background: #fff;
    font-family: Figtree,sans-serif;
    font-size: 16px;
    line-height: 28px;
    color: #1f1142;
    font-weight: 400;
    text-rendering: auto;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale
}

h1,h2,h3,h4 {
    font-weight: 700;
    line-height: 1.3
}

h1 {
    font-size: 86px;
    line-height: 1.2
}

h2 {
    font-size: 48px;
    line-height: 1.3
}

h3 {
    font-size: 36px;
    line-height: 1.4
}

h4 {
    font-size: 21px;
    line-height: 1.2
}

.btn {
    display: inline-block;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    border: 1.5px solid transparent;
    padding: 14px 20px;
    border-radius: 10px;
    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    cursor: pointer;
    font-weight: 600;
    font-size: 16px;
    line-height: 19px
}

@media only screen and (min-width: 0px) and (max-width:479px) {
    .btn {
        font-size:14px;
        line-height: 17px
    }
}

.btn.btn-outline-primary {
    border-color: #dadce0;
    color: #000
}

.btn.btn-outline-primary:active,.btn.btn-outline-primary:focus,.btn.btn-outline-primary:hover {
    border-color: #9747ff;
    background: #9747ff;
    color: #fff
}

.btn.btn-gray {
    background-color: #eaeaea;
    color: #000;
    padding-left: 12px;
    padding-right: 12px;
    font-weight: 300;
    font-size: 24px;
    border: 0
}

.btn.btn-gray:active,.btn.btn-gray:focus,.btn.btn-gray:hover {
    background-color: #9747ff;
    color: #fff
}

.btn.btn-gray:active svg path,.btn.btn-gray:focus svg path,.btn.btn-gray:hover svg path {
    stroke: #fff
}

.btn.btn-primary {
    border-color: #9747ff;
    background: #9747ff;
    color: #fff
}

.btn.btn-primary:active,.btn.btn-primary:focus,.btn.btn-primary:hover {
    border-color: #9747ff;
    background: #9d51ff;
    color: #fff
}

.btn.btn-danger {
    background: #e96447;
    border-color: #e96447;
    color: #fff
}

.btn.btn-danger:active,.btn.btn-danger:focus,.btn.btn-danger:hover {
    border-color: #e96447;
    background: #e96447;
    color: #fff
}

.btn.btn-md {
    padding: 11px 12px
}

@media only screen and (min-width: 0px) and (max-width:767px) {
    .btn.btn-md {
        padding:6px 10px;
        font-size: 12px;
        line-height: 21px
    }
}

.btn.btn-md.btn-lrp {
    padding-left: 30px;
    padding-right: 30px
}

.btn.btn-md:active,.btn.btn-md:focus,.btn.btn-md:hover {
    box-shadow: 1px 2px 10px rgba(0,0,0,.2)
}

.btn.btn-lg {
    padding: 15.5px 30px;
    font-size: 18px;
    border-radius: 4px
}

@media (min-width: 768px) and (max-width:1023px) {
    .btn.btn-lg {
        padding:13.5px 25px;
        font-size: 16px
    }
}

@media only screen and (min-width: 0px) and (max-width:767px) {
    .btn.btn-lg {
        padding:12.5px 15px;
        font-size: 14px;
        border-radius: 3px
    }
}

.btn.btn-lg.btn-lrp {
    padding-left: 50px;
    padding-right: 50px
}

.btn.btn-lg:active,.btn.btn-lg:focus,.btn.btn-lg:hover {
    box-shadow: 3px 5px 20px rgba(0,0,0,.2)
}

.btn.btn-fw {
    width: 260px
}

.btn.btn-block {
    display: block
}

.section-title {
    text-align: center;
    margin-bottom: 40px;
    font-weight: 500;
    font-size: 16px;
    line-height: 28px
}

.section-title h2 {
    font-size: 36px;
    margin-bottom: 15px
}

.section-title>div {
    max-width: 700px;
    margin: 0 auto
}

.loading {
    text-align: center;
    color: #a763ff
}

.loading.loading-lg {
    padding-top: 30px;
    padding-bottom: 30px
}

.loading.loading-lg .icofont-spinner {
    font-size: 48px;
    line-height: 1
}

header {
    background: #171717;
    padding: 0 15px;
    height: 82px;
    position: relative;
    z-index: 99;
    position: fixed;
    top: 0;
    left: 0;
    right: 0
}

header .large__container {
    max-width: 1312px
}

@media only screen and (min-width: 0px) and (max-width:767px) {
    header .large__container {
        padding:0
    }

    header .btn-download {
        margin-top: 5px
    }
}

header .icofont__logo {
    display: flex;
    padding: 0;
    height: 80px;
    align-items: center;
    justify-content: center
}

header .icofont__logo .icofont-brand-icofont {
    display: inline-block;
    font-size: 36px;
    line-height: 80px;
    vertical-align: middle;
    color: #a763ff;
    transition: color .3s
}

@media only screen and (min-width: 0px) and (max-width:767px) {
    header .icofont__logo .icofont-brand-icofont {
        font-size:20px
    }
}

header .icofont__logo .icofont-brand-icofont:active,header .icofont__logo .icofont-brand-icofont:focus,header .icofont__logo .icofont-brand-icofont:hover {
    color: #b57dff
}

header .icofont__logo img {
    display: inline-block
}

header .icofont__menu {
    list-style: none
}

header .icofont__menu.text-left li a {
    margin-right: 17px
}

@media only screen and (min-width: 992px) and (max-width:1199px) {
    header .icofont__menu.text-left li a {
        margin-right:8px
    }
}

header .icofont__menu.text-right li a {
    margin-left: 17px
}

@media only screen and (min-width: 992px) and (max-width:1199px) {
    header .icofont__menu.text-right li a {
        margin-left:8px
    }
}

header .icofont__menu li {
    display: inline-block
}

header .icofont__menu li a {
    display: block;
    height: 80px;
    line-height: 80px;
    font-size: 16px;
    padding: 0 10px;
    color: rgba(255,255,255,.7)
}

@media only screen and (min-width: 992px) and (max-width:1199px) {
    header .icofont__menu li a {
        padding-left:8px;
        padding-right: 8px
    }
}

header .icofont__menu li a.active,header .icofont__menu li a:active,header .icofont__menu li a:focus,header .icofont__menu li a:hover {
    color: #fff
}

.form-control {
    display: block;
    width: 100%;
    height: 36px;
    background-clip: padding-box;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    padding: 8px 10px 8px 15px;
    font-weight: 500;
    font-size: 16px;
    line-height: 19px;
    color: #000;
    border: 1.5px solid #dadce0;
    border-radius: 8px
}

.form-control:focus {
    color: #495057;
    background-color: #fff;
    border-color: #80bdff;
    outline: 0;
    box-shadow: 0 0 0 .2rem rgba(0,123,255,.25)
}

.form-control::-webkit-input-placeholder {
    color: #6c757d;
    opacity: 1
}

.form-control::-moz-placeholder {
    color: #6c757d;
    opacity: 1
}

.form-control:-ms-input-placeholder {
    color: #6c757d;
    opacity: 1
}

.form-control::-ms-input-placeholder {
    color: #6c757d;
    opacity: 1
}

.form-control::placeholder {
    color: #6c757d;
    opacity: 1
}

.input-group {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    -ms-flex-align: stretch;
    align-items: stretch;
    width: 100%
}

.input-group>.form-control {
    position: relative;
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    width: 1%;
    margin-bottom: 0
}

.input-group>.custom-file+.form-control,.input-group>.custom-select+.form-control,.input-group>.form-control+.form-control {
    margin-left: -1px
}

.input-group>.form-control:focus {
    z-index: 3
}

.input-group-append,.input-group-prepend {
    display: -ms-flexbox;
    display: flex
}

.input-group-append .btn,.input-group-prepend .btn {
    position: relative;
    z-index: 2
}

.input-group-append .btn+.btn,.input-group-append .btn+.input-group-text,.input-group-append .input-group-text+.btn,.input-group-append .input-group-text+.input-group-text,.input-group-prepend .btn+.btn,.input-group-prepend .btn+.input-group-text,.input-group-prepend .input-group-text+.btn,.input-group-prepend .input-group-text+.input-group-text {
    margin-left: -1px
}

.input-group-prepend {
    margin-right: -1px
}

.input-group-append {
    margin-left: -1px
}

.input-group>.input-group-append:last-child>.btn:not(:last-child):not(.dropdown-toggle),.input-group>.input-group-append:last-child>.input-group-text:not(:last-child),.input-group>.input-group-append:not(:last-child)>.btn,.input-group>.input-group-append:not(:last-child)>.input-group-text,.input-group>.input-group-prepend>.btn,.input-group>.input-group-prepend>.input-group-text {
    border-top-right-radius: 0;
    border-bottom-right-radius: 0
}

.input-group>.input-group-append>.btn,.input-group>.input-group-append>.input-group-text,.input-group>.input-group-prepend:first-child>.btn:not(:first-child),.input-group>.input-group-prepend:first-child>.input-group-text:not(:first-child),.input-group>.input-group-prepend:not(:first-child)>.btn,.input-group>.input-group-prepend:not(:first-child)>.input-group-text {
    border-top-left-radius: 0;
    border-bottom-left-radius: 0
}
*/
.hero__area {
    overflow: hidden
}

.page_title {
    position: relative;
    text-align: center;
    background-image: linear-gradient(-225deg,#419fde 0,#b57ad9 100%);
    height: 160px;
    overflow: hidden
}

.page_title>div {
    z-index: 2
}

.page_title h1 {
    font-size: 36px;
    font-weight: 700;
    line-height: 1;
    margin: 0 0 10px;
    color: #fff
}

.page_title p {
    font-size: 18px;
    line-height: 28px;
    color: #fff;
    font-weight: 600;
    max-width: 620px;
    display: inline-block;
    margin-bottom: 0
}

.home_category_box {
    box-shadow: 1px 2px 3px 0 rgba(0,0,0,.1);
    margin-bottom: 30px;
    cursor: pointer;
    transition: box-shadow .3s
}

.home_category_box:hover {
    box-shadow: 2px 3px 5px 0 rgba(0,0,0,.2)
}

.home_category_box.home_category_box_1,.home_category_box.home_category_box_17 {
    background: #ffebee
}

.home_category_box.home_category_box_1 h3,.home_category_box.home_category_box_1 span,.home_category_box.home_category_box_17 h3,.home_category_box.home_category_box_17 span {
    color: #c62828
}

.home_category_box.home_category_box_18,.home_category_box.home_category_box_2 {
    background: #fce4ec
}

.home_category_box.home_category_box_18 h3,.home_category_box.home_category_box_18 span,.home_category_box.home_category_box_2 h3,.home_category_box.home_category_box_2 span {
    color: #ad1457
}

.home_category_box.home_category_box_19,.home_category_box.home_category_box_3 {
    background: #f3e5f5
}

.home_category_box.home_category_box_19 h3,.home_category_box.home_category_box_19 span,.home_category_box.home_category_box_3 h3,.home_category_box.home_category_box_3 span {
    color: #6a1b9a
}

.home_category_box.home_category_box_20,.home_category_box.home_category_box_4 {
    background: #ede7f6
}

.home_category_box.home_category_box_20 h3,.home_category_box.home_category_box_20 span,.home_category_box.home_category_box_4 h3,.home_category_box.home_category_box_4 span {
    color: #4527a0
}

.home_category_box.home_category_box_21,.home_category_box.home_category_box_5 {
    background: #e8eaf6
}

.home_category_box.home_category_box_21 h3,.home_category_box.home_category_box_21 span,.home_category_box.home_category_box_5 h3,.home_category_box.home_category_box_5 span {
    color: #1565c0
}

.home_category_box.home_category_box_22,.home_category_box.home_category_box_6 {
    background: #e3f2fd
}

.home_category_box.home_category_box_22 h3,.home_category_box.home_category_box_22 span,.home_category_box.home_category_box_6 h3,.home_category_box.home_category_box_6 span {
    color: #1565c0
}

.home_category_box.home_category_box_23,.home_category_box.home_category_box_7 {
    background: #e1f5fe
}

.home_category_box.home_category_box_23 h3,.home_category_box.home_category_box_23 span,.home_category_box.home_category_box_7 h3,.home_category_box.home_category_box_7 span {
    color: #0277bd
}

.home_category_box.home_category_box_24,.home_category_box.home_category_box_8 {
    background: #e0f7fa
}

.home_category_box.home_category_box_24 h3,.home_category_box.home_category_box_24 span,.home_category_box.home_category_box_8 h3,.home_category_box.home_category_box_8 span {
    color: #00838f
}

.home_category_box.home_category_box_25,.home_category_box.home_category_box_9 {
    background: #e0f2f1
}

.home_category_box.home_category_box_25 h3,.home_category_box.home_category_box_25 span,.home_category_box.home_category_box_9 h3,.home_category_box.home_category_box_9 span {
    color: #00695c
}

.home_category_box.home_category_box_10,.home_category_box.home_category_box_26 {
    background: #e8f5e9
}

.home_category_box.home_category_box_10 h3,.home_category_box.home_category_box_10 span,.home_category_box.home_category_box_26 h3,.home_category_box.home_category_box_26 span {
    color: #2e7d32
}

.home_category_box.home_category_box_11,.home_category_box.home_category_box_27 {
    background: #f1f8e9
}

.home_category_box.home_category_box_11 h3,.home_category_box.home_category_box_11 span,.home_category_box.home_category_box_27 h3,.home_category_box.home_category_box_27 span {
    color: #558b2f
}

.home_category_box.home_category_box_12,.home_category_box.home_category_box_28 {
    background: #f9fbe7
}

.home_category_box.home_category_box_12 h3,.home_category_box.home_category_box_12 span,.home_category_box.home_category_box_28 h3,.home_category_box.home_category_box_28 span {
    color: #9e9d24
}

.home_category_box.home_category_box_13,.home_category_box.home_category_box_29 {
    background: #fffde7
}

.home_category_box.home_category_box_13 h3,.home_category_box.home_category_box_13 span,.home_category_box.home_category_box_29 h3,.home_category_box.home_category_box_29 span {
    color: #f9a825
}

.home_category_box.home_category_box_14,.home_category_box.home_category_box_30 {
    background: #fff8e1
}

.home_category_box.home_category_box_14 h3,.home_category_box.home_category_box_14 span,.home_category_box.home_category_box_30 h3,.home_category_box.home_category_box_30 span {
    color: #ff8f00
}

.home_category_box.home_category_box_15,.home_category_box.home_category_box_31 {
    background: #fff3e0
}

.home_category_box.home_category_box_15 h3,.home_category_box.home_category_box_15 span,.home_category_box.home_category_box_31 h3,.home_category_box.home_category_box_31 span {
    color: #ef6c00
}

.home_category_box.home_category_box_16,.home_category_box.home_category_box_32 {
    background: #fbe9e7
}

.home_category_box.home_category_box_16 h3,.home_category_box.home_category_box_16 span,.home_category_box.home_category_box_32 h3,.home_category_box.home_category_box_32 span {
    color: #d84315
}

.home_category_box .home_category_icons {
    display: block;
    padding: 30px 20px
}

.home_category_box .home_category_icons .home_category_icon {
    display: block;
    width: 25%;
    float: left
}

.home_category_box .home_category_icons .home_category_icon .home_category_icon_inner {
    display: block;
    text-align: center;
    margin-bottom: 20px
}

.home_category_box .home_category_icons .home_category_icon .home_category_icon_inner span {
    font-size: 32px
}

.home_category_box h3 {
    margin-top: -20px;
    background: #fff;
    font-size: 15px;
    line-height: 1;
    padding: 18px 20px
}

footer {
    background: #fff;
    color: rgba(0,0,0,.6);
    padding: 0 0 25px;
    font-size: 14px
}

.icofont__footer__menu {
    text-align: right
}

@media only screen and (max-width: 1199px) {
    .icofont__footer__menu {
        text-align:center;
        margin-top: 15px
    }
}

.icofont__footer__menu a {
    color: #fff;
    font-weight: 600
}

.icofont__footer__menu a:not(:last-child) {
    margin-right: 25px
}

.icofont__page__title {
    padding: 45px 0 80px
}

.page__title {
    text-align: center;
    color: #fff;
    font-size: 2.6rem;
    line-height: 3.6rem;
    font-weight: 300
}

@media only screen and (max-width: 1199px) {
    .page__title {
        font-size:1.9rem;
        line-height: 1.5
    }
}

.page__title h1 {
    font-size: 5.6rem;
    line-height: 6.1rem;
    color: #fff;
    text-transform: uppercase;
    margin: 0 0 14px
}

@media only screen and (max-width: 1199px) {
    .page__title h1 {
        font-size:4rem;
        line-height: 5rem
    }
}

.icofont__search__wrap {
    background: #f8f9fd;
    padding: 30px
}

.icon__container__area .icofont__search {
    position: relative;
    width: 100%
}

.icon__container__area .icofont__search input.search__input {
    height: 46px;
    border: 0;
    display: block;
    width: 100%;
    font-size: 14px;
    line-height: 30px;
    padding: 0 60px 0 20px;
    font-weight: 400;
    color: #999;
    border-radius: 3px;
    background: #fff;
    box-shadow: 0 1px 2px 0 rgba(0,0,0,.1)
}

.icon__container__area .icofont__search input.search__input.search__input_sm {
    height: 40px;
    padding: 0 40px 0 10px
}

.icon__container__area .icofont__search .icofont-search {
    position: absolute;
    right: 20px;
    top: 0;
    line-height: 46px;
    font-size: 18px;
    color: #d5d7da
}

.icon__container__area .icofont__search .icofont-search.icofont_sm {
    right: 10px;
    line-height: 44px
}

.main {
    margin-top: 70px;
    margin-bottom: 70px
}

.main .article-title {
    font-family: Playfair,serif;
    font-weight: 400;
    font-size: 30px;
    line-height: 35px;
    color: #000;
    margin-bottom: 20px
}

.main .article-text {
    font-size: 17px;
    line-height: 26px;
    color: rgba(0,0,0,.8);
    margin-bottom: 50px
}

.main .article-inline-element {
    font-weight: 600;
    font-size: 17px;
    line-height: 26px;
    color: rgba(0,0,0,.8)
}

.icofont__details__wrap {
    padding: 65px 0
}

@media only screen and (min-width: 0px) and (max-width:479px) {
    .icofont__details__wrap {
        padding-top:40px;
        padding-bottom: 40px
    }
}

.icofont__details__wrap .large__container {
    position: relative
}

.collection_inner_container {
    width: 1312px;
    cursor: auto;
    right: 0;
    top: 80px;
    position: absolute;
    bottom: 0;
    z-index: 999;
    height: calc(100vh - 412px);
    margin-left: auto;
    margin-right: auto;
    background: #fff;
    border: 1.5px solid #dadce0;
    box-shadow: 0 20px 21px rgba(0,0,0,.12);
    border-radius: 0 0 10px 10px
}

@media only screen and (min-width: 0) and (max-width:1312px) {
    .collection_inner_container {
        width:100%
    }
}

@media only screen and (min-width: 0px) and (max-width:767px) {
    .collection_inner_container {
        width:100%
    }
}

@media only screen and (min-width: 0px) and (max-width:479px) {
    .collection_inner_container {
        max-height:370px
    }
}

.collection_inner_container.animated {
    animation-duration: .3s
}

.collection_inner_container .collection-info-bar {
    height: 80px;
    padding: 20px;
    align-items: center;
    border-bottom: 1px solid #dcdce1
}

.collection_inner_container .collection-info-bar .collection_search_area .icofont__search .input.search__input {
    height: 40px
}

.collection_inner_container .collection-info-bar .collection-bar-close {
    display: block;
    float: right;
    font-size: 14px;
    line-height: 40px;
    color: #9e9e9e;
    font-weight: 600;
    cursor: pointer
}

.collection_inner_container .collection-info-bar .collection-bar-close:hover {
    color: #a763ff
}

.collection_inner_container .icofont__details__wrap {
    position: absolute;
    top: 0;
    bottom: 120px;
    left: 0;
    right: 0;
    padding: 0 30px 20px;
    overflow-x: hidden;
    overflow-y: auto
}

@media only screen and (min-width: 0px) and (max-width:479px) {
    .collection_inner_container .icofont__details__wrap {
        padding-left:10px;
        padding-right: 10px
    }
}

.collection_inner_container::after {
    content: "";
    height: 82px;
    width: calc(100% - 14.8%);
    position: absolute;
    top: -82px;
    left: -1px;
    background: rgba(0,0,0,.7);
    z-index: 1;
    pointer-events: none
}

@media only screen and (max-width: 1199px) {
    .collection_inner_container::after {
        width:calc(100% - 91px)
    }
}

@media only screen and (min-width: 0px) and (max-width:479px) {
    .collection_inner_container::after {
        width:calc(100% - 70px)
    }
}

.collection-action-area {
    position: absolute;
    height: 120px;
    bottom: 0;
    left: 0;
    right: 0;
    display: flex;
    align-items: center;
    justify-content: flex-end;
    column-gap: 20px;
    padding: 0 30px
}

@media only screen and (min-width: 0px) and (max-width:479px) {
    .collection-action-area {
        height:80px;
        column-gap: 10px;
        padding: 0 10px
    }
}

.collection-backdrop {
    position: absolute;
    top: 80px;
    background: rgba(0,0,0,.7);
    z-index: 99;
    width: 1000%;
    left: -50%;
    height: 60000%;
    pointer-events: none
}

.default-backdrop-transparent {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 99
}

.collection-icon-loading,.empty-icon-collection-container,.empty-search-result {
    position: absolute;
    height: 100%;
    width: 100%;
    text-align: center
}

.collection-icon-loading span,.empty-icon-collection-container span,.empty-search-result span {
    font-size: 3em;
    top: 30%;
    position: absolute
}

.collection-icon-loading .empty-title,.empty-icon-collection-container .empty-title,.empty-search-result .empty-title {
    font-size: 2em;
    top: 30%;
    position: absolute;
    color: #d8d8d8;
    text-align: center;
    width: 100%
}

@media only screen and (min-width: 0px) and (max-width:767px) {
    .collection-icon-loading .empty-title,.empty-icon-collection-container .empty-title,.empty-search-result .empty-title {
        font-size:1.2em
    }
}

.empty-search-result .empty-title {
    top: 0
}

.icon-controller-box {
    display: flex;
    justify-content: space-between;
    width: 100%;
    margin: 0 0 20px 0;
    align-items: center
}

@media only screen and (min-width: 0px) and (max-width:767px) {
    .icon-controller-box {
        flex-direction:column;
        align-items: flex-start
    }
}

.icon-controller-box .icon__on__selected {
    flex: 1
}

@media only screen and (min-width: 0px) and (max-width:767px) {
    .icon-controller-box .icon__on__selected {
        margin-bottom:30px
    }
}

.icon-controller-box .icon__on__selected span:first-child {
    font-weight: 600;
    font-size: 40px;
    line-height: 48px;
    color: #000;
    display: inline-block;
    text-transform: capitalize
}

@media only screen and (min-width: 0px) and (max-width:479px) {
    .icon-controller-box .icon__on__selected span:first-child {
        font-size:30px;
        line-height: 38px
    }
}

.icon-controller-box .icon__on__selected span:first-child span {
    background: #ff6b00;
    border-radius: 40px;
    display: inline-block;
    margin-left: 9px;
    font-weight: 700;
    font-size: 14px;
    line-height: 17px;
    padding: 3px 10px;
    color: #fff;
    position: relative;
    top: -8px
}

.icon-controller-box .icon__on__selected span:last-child {
    display: block;
    font-weight: 500;
    font-size: 16px;
    line-height: 19px;
    color: rgba(0,0,0,.5)
}

.icon-controller-box .icon__controller {
    flex: 1;
    display: flex;
    justify-content: flex-end
}

.icon-list {
    margin: 25px 0 0;
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
    gap: 25px 25px;
}

@media only screen and (max-width: 1199px) {
    .icon-list {
        gap:30px
    }
}

@media only screen and (min-width: 0px) and (max-width:479px) {
    .icon-list {
        gap:12px
    }
}

.icon-list>.icon-box {
    text-align: center;
    position: relative
}

.icon-list.collection-list {
    margin-top: 20px;
    row-gap: 20px
}

@media only screen and (min-width: 0) and (max-width:1312px) {
    .icon-list.collection-list {
        column-gap:20px
    }
}

.icon-list .icon {
    border-radius: 5px;
    cursor: pointer;
    position: relative;
    padding: 20px 5px 22px;
    max-height: 114px;
    border: 2px solid transparent;
    transition: .3s
}

@media only screen and (min-width: 0px) and (max-width:767px) {
    .icon-list .icon {
        max-width:100%
    }
}

.icon-list .icon i {
    font-size: 48px;
    line-height: 1
}

.icon-list .icon h5.icon__name {

    padding: 0;
    margin: 15px 0 0;
    white-space: nowrap;

    text-overflow: ellipsis;
    font-size: 13px;
    line-height: 16px;
    color: rgba(0,0,0,.6);
    max-width: 150px
}

.icon-list .icon.active {
    background: #000;
    color: #fff;
    z-index: 10;
    opacity: 1
}

.icon-list .icon.active h5.icon__name {
    color: #fff
}

.icon-list .icon.active:hover .add-to-collection-plus-btn {
    opacity: 0
}

.icon-list .icon:not(.active):hover {
    background: #f9f8f8
}

.icon-list .icon:not(.active):hover .add-to-collection-plus-btn {
    border-bottom-left-radius: 5px;
    border-bottom-right-radius: 5px
}

.icon-list .icon:not(.active):hover .add-to-collection-plus-btn.icofont-plus {
    background: #9747ff;
    opacity: 1
}

.icon-list .icon:not(.active):hover .add-to-collection-plus-btn.icofont-minus {
    background: #dadce0
}

.icon-list .icon .add-to-collection-plus-btn {
    position: absolute;
    right: 0;
    top: auto;
    font-size: 14px;
    display: inline-flex;
    justify-content: center;
    align-items: center;
    z-index: 11;
    transition: .3s;
    opacity: 0;
    left: 0;
    height: 30px;
    bottom: 0;
    color: #fff
}

.icon-list .icon.collection-icon {
    max-width: 78px
}

.icon-list .icon.collection-icon i {
    font-size: 48px
}

.icon-list .icon.collection-icon .remove-icon-btn {
    position: absolute;
    right: 0;
    top: auto;
    height: 30px;
    width: 100%;
    font-size: 18px;
    bottom: 0;
    left: 0;
    background: #dadce0;
    border-bottom-left-radius: 2px;
    border-bottom-right-radius: 2px;
    line-height: 30px;
    color: #fff;
    opacity: 0;
    visibility: hidden
}

.icon-list .icon.collection-icon:hover {
    border-color: #dadce0
}

.icon-list .icon.collection-icon:hover .remove-icon-btn {
    opacity: 1;
    visibility: visible
}

.icon-list .icon.icon-selected-state {
    border-color: #dadce0;
    background: #f9f8f8;
    color: #000
}

.icon-list .icon.icon-selected-state .add-to-collection-plus-btn {
    border-bottom-left-radius: 2px!important;
    border-bottom-right-radius: 2px!important;
    opacity: 1
}

.icon-list .icon.icon-selected-state .add-to-collection-plus-btn.icofont-minus {
    background: #dadce0
}

.icon-list .icon.icon-selected-state:hover {
    border-color: #888e9b
}

.icon-list .icon.icon-selected-state:hover .add-to-collection-plus-btn.icofont-minus {
    background: #888e9b
}

.icon-list .icon.icon-selected-state.active {
    background: #2a2a2a;
    border-color: #2a2a2a;
    color: #fff
}

.icon-list .icon.icon-selected-state.active .add-to-collection-plus-btn {
    opacity: 0
}

.icon-list.icon-list-view {
    gap: 20px;
    grid-template-columns: repeat(auto-fill,minmax(185px,1fr))
}

.icon-list.icon-list-view .icon-box .active-window {
    display: flex;
    align-items: center;
    column-gap: 10px
}

.icon-list.icon-list-view .icon-box .add-to-collection-plus-btn {
    background: #9747ff;
    border-radius: 0;
    height: 44px!important;
    position: static;
    width: 48px;
    margin-right: -1px;
    border-radius: 0!important
}

.icon-list.icon-list-view .icon-box .icon {
    padding: 0 0 0 16px;
    border: 2px solid #dadce0;
    display: flex;
    column-gap: 10px;
    justify-content: space-between;
    align-items: center
}

.icon-list.icon-list-view .icon-box .icon h5.icon__name {
    margin-top: 0;
    max-width: 100px;
    flex: 0 0 100px;
    text-align: left
}

.icon-list.icon-list-view .icon-box .icon i {
    font-size: 28px
}

.icon-list.icon-list-view .icon-box .icon:hover {
    border-color: #9747ff
}

.icon-list.icon-list-view .icon-box .icon:hover .add-to-collection-plus-btn {
    opacity: 1
}

.icon-list.icon-list-view .icon-box .icon.active {
    border-color: #000
}

.icon-list.icon-list-view .icon-box .icon.active .add-to-collection-plus-btn {
    opacity: 0
}

.icon-list.icon-list-view .icon-box .icon.icon-selected-state .add-to-collection-plus-btn {
    color: #fff;
    opacity: 1
}

.icon-list.icon-list-view .icon-box .icon.icon-selected-state h5.icon__name {
    color: #000
}

.icon-list.icon-list-view .icon-box .icon.icon-selected-state.active .add-to-collection-plus-btn {
    opacity: 0
}

.icon-list.icon-list-view .icon-box .icon.icon-selected-state.active h5.icon__name {
    color: #fff
}

.icon-list.icon-list-view .icon-box .icon.icon-selected-state:hover {
    border-color: #888e9b
}

.icon__list__2>div:not(:first-child) {
    margin-top: 70px
}

.icon-dialogue-box {
    position: absolute;
    width: 320px;
    background: #fff;
    border: 1.5px solid #dadce0;
    box-shadow: 0 5px 21px rgba(0,0,0,.12);
    border-radius: 5px;
    padding: 20px;
    display: none;
    visibility: hidden;
    z-index: 9;
    margin-bottom: 10px;
    left: 100%;
    top: 0;
    height: 238px;
    z-index: 15
}

.icon-dialogue-box.dialogue-box-added-to-left {
    left: auto;
    right: 100%
}

.icon-dialogue-box.dialogue-box-added-to-left .close-icon-modal {
    right: auto;
    left: -16px
}

@media only screen and (min-width: 0) and (max-width:707px) {
    .icon-dialogue-box.dialogue-box-added-to-left {
        width:300px;
        left: 0;
        position: fixed;
        top: 200px;
        bottom: 0;
        right: 0;
        margin: auto
    }
}

.icon-dialogue-box.open {
    display: block;
    z-index: 100
}

.icon-dialogue-box .icon-dialogue-box-inner .copy-code-title {
    font-weight: 500;
    font-size: 14px;
    line-height: 17px;
    color: rgba(0,0,0,.5);
    display: block;
    text-align: left;
    margin-bottom: 3px
}

.icon-dialogue-box .icon-dialogue-box-inner .copy-code-btn {
    position: absolute;
    right: 10px;
    top: 4px;
    cursor: pointer;
    background: #fff
}

.icon-dialogue-box .icon-dialogue-box-inner .icon-preview {
    position: relative;
    display: flex;
    align-items: center;
    background: #f6f7fb;
    justify-content: center;
    width: 100%
}

.icon-dialogue-box .icon-dialogue-box-inner .icon-preview span {
    font-size: 5em;
    line-height: 1;
    color: #1f1142
}

.icon-dialogue-box .close-icon-modal {
    position: absolute;
    right: -16px;
    top: -18px;
    font-size: 20px;
    color: #fff;
    font-weight: 700;
    cursor: pointer;
    background: #000;
    height: 36px;
    width: 36px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center
}

.icon-dialogue-box .close-icon-modal:hover {
    background: #4d4d4d
}

.icon-dialogue-box .dialogue-btn-wrap {
    display: flex;
    column-gap: 15px;
    justify-content: space-between
}

.icon-dialogue-box .dialogue-btn-wrap .add-to-collection-btn {
    flex: 0 0 75%
}

.notification-box-container {
    position: fixed;
    bottom: 20px;
    right: 20px;
    z-index: 999
}

.notification-box-container>div:not(:first-child) {
    margin-top: 10px
}

.icofont_notification-box {
    text-align: center;
    z-index: 9;
    position: relative;
    max-width: 350px;
    margin: 0 auto;
    background-color: #a763ff;
    color: #fff;
    padding: 10px 35px 10px 15px;
    z-index: 9;
    text-align: left;
    border-radius: 4px;
    box-shadow: 0 2px 4px rgba(0,0,0,.2)
}

.icofont_notification-box.error {
    background: #ff416c
}

.icofont_notification-box .notification-close-btn {
    font-size: 14px;
    position: absolute;
    right: 10px;
    top: 50%;
    transform: translateY(-50%);
    color: #fff;
    font-weight: 700;
    cursor: pointer
}

.icofont_notification-box.animated {
    -webkit-animation-duration: .3s;
    animation-duration: .3s
}

.preloader {
    width: 100%;
    margin-top: 50px;
    height: 300px;
    line-height: 300px;
    text-align: center
}

.preloader .icofont {
    font-size: 48px
}

.burger_menu {
    display: none
}

.icofont-ads-container {
    border-top: 1px solid #efefef
}

.icofont-ads-c {
    height: 270px;
    width: 100%;
    position: relative
}

.icofont-ads .add-image {
    width: 260px;
    background: #fff;
    padding: 5px;
    border: 1px solid #eee;
    border-radius: 3px
}

.icofont-ads .add-content {
    width: 400px;
    padding-left: 30px
}

.icofont-ads .add-content .ads-title {
    font-size: 26px;
    word-break: break-all
}

.icofont-ads .add-content p {
    white-space: normal;
    line-height: 25px;
    margin: 0
}

.icofont-ads .add-content a {
    text-decoration: underline
}

@media (max-width: 991px) {
    .burger_menu {
        position:absolute;
        right: 30px;
        z-index: 9;
        display: block;
        float: right;
        font-size: 24px;
        line-height: 80px;
        color: #4a4a4a
    }

    .burger_menu:hover+.main-header {
        background: red
    }

    .mobile-menu {
        position: absolute;
        top: 80px;
        right: 20px;
        background: #000;
        width: 240px;
        padding: 10px;
        z-index: 999;
        box-shadow: 0 1px 3px rgba(0,0,0,.2)
    }

    .mobile-menu ul {
        display: block;
        text-align: left
    }

    .mobile-menu ul li {
        display: block
    }

    .mobile-menu ul li a {
        height: 40px;
        line-height: 40px
    }

    .icofont-ads .add-content {
        width: 100%;
        padding-left: 15px;
        padding-right: 15px;
        padding-top: 15px
    }

    .icofont-ads .add-content .ads-title {
        font-size: 20px
    }
}

.content-area {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    min-height: 100vh
}

.post-single .post,.posts .post {
    margin-bottom: 40px
}

.post-single .post .post-title,.posts .post .post-title {
    font-size: 28px;
    font-weight: 700;
    color: #4a4a4a;
    padding-bottom: 10px;
    margin: 0
}

.post-single .post .post-title a,.posts .post .post-title a {
    color: #4a4a4a
}

.post-single .post .meta-data,.posts .post .meta-data {
    margin-bottom: 15px
}

.post-single .post .meta-data span,.posts .post .meta-data span {
    font-size: 14px;
    color: #9b9b9b
}

.post-single .post .feature_image,.posts .post .feature_image {
    position: relative;
    min-height: 250px;
    overflow: hidden;
    width: 100%;
    background-size: cover;
    background-position: center center;
    margin-bottom: 10px
}

.post-single .post .post-excerpt .link-more,.posts .post .post-excerpt .link-more {
    display: none
}

.post-single .post .post-excerpt p,.posts .post .post-excerpt p {
    text-align: justify
}

.post-single .post .read-more-post,.posts .post .read-more-post {
    margin-top: 10px
}

.post-single .post .read-more-post a,.posts .post .read-more-post a {
    display: inline-block;
    color: #08c5db;
    font-size: 16px;
    border-bottom: 1px solid rgba(8,198,219,.575);
    line-height: 16px
}

.post-single .post {
    margin-bottom: 0
}

.loadmore-btn {
    display: block;
    border: 1px solid #08c5db;
    text-align: center;
    cursor: pointer;
    transition: all .2s linear 0s
}

.loadmore-btn span {
    display: inline-block;
    color: #08c5db;
    padding: 15px 0;
    font-size: 18px
}

.loadmore-btn:hover {
    background: #08c5db
}

.loadmore-btn:hover span {
    color: #fff
}

.animated {
    -webkit-animation-duration: 1s;
    animation-duration: 1s;
    -webkit-animation-fill-mode: both;
    animation-fill-mode: both
}

.animated.infinite {
    -webkit-animation-iteration-count: infinite;
    animation-iteration-count: infinite
}

@-webkit-keyframes jello {
    11.1%,from,to {
        -webkit-transform: translate3d(0,0,0);
        transform: translate3d(0,0,0)
    }

    22.2% {
        -webkit-transform: skewX(-12.5deg) skewY(-12.5deg);
        transform: skewX(-12.5deg) skewY(-12.5deg)
    }

    33.3% {
        -webkit-transform: skewX(6.25deg) skewY(6.25deg);
        transform: skewX(6.25deg) skewY(6.25deg)
    }

    44.4% {
        -webkit-transform: skewX(-3.125deg) skewY(-3.125deg);
        transform: skewX(-3.125deg) skewY(-3.125deg)
    }

    55.5% {
        -webkit-transform: skewX(1.5625deg) skewY(1.5625deg);
        transform: skewX(1.5625deg) skewY(1.5625deg)
    }

    66.6% {
        -webkit-transform: skewX(-.78125deg) skewY(-.78125deg);
        transform: skewX(-.78125deg) skewY(-.78125deg)
    }

    77.7% {
        -webkit-transform: skewX(.39063deg) skewY(.39063deg);
        transform: skewX(.39063deg) skewY(.39063deg)
    }

    88.8% {
        -webkit-transform: skewX(-.19531deg) skewY(-.19531deg);
        transform: skewX(-.19531deg) skewY(-.19531deg)
    }
}

@keyframes jello {
    11.1%,from,to {
        -webkit-transform: translate3d(0,0,0);
        transform: translate3d(0,0,0)
    }

    22.2% {
        -webkit-transform: skewX(-12.5deg) skewY(-12.5deg);
        transform: skewX(-12.5deg) skewY(-12.5deg)
    }

    33.3% {
        -webkit-transform: skewX(6.25deg) skewY(6.25deg);
        transform: skewX(6.25deg) skewY(6.25deg)
    }

    44.4% {
        -webkit-transform: skewX(-3.125deg) skewY(-3.125deg);
        transform: skewX(-3.125deg) skewY(-3.125deg)
    }

    55.5% {
        -webkit-transform: skewX(1.5625deg) skewY(1.5625deg);
        transform: skewX(1.5625deg) skewY(1.5625deg)
    }

    66.6% {
        -webkit-transform: skewX(-.78125deg) skewY(-.78125deg);
        transform: skewX(-.78125deg) skewY(-.78125deg)
    }

    77.7% {
        -webkit-transform: skewX(.39063deg) skewY(.39063deg);
        transform: skewX(.39063deg) skewY(.39063deg)
    }

    88.8% {
        -webkit-transform: skewX(-.19531deg) skewY(-.19531deg);
        transform: skewX(-.19531deg) skewY(-.19531deg)
    }
}

.jello {
    -webkit-animation-name: jello;
    animation-name: jello;
    -webkit-transform-origin: center;
    transform-origin: center
}

@keyframes slideInRight {
    from {
        -webkit-transform: translate3d(100%,0,0);
        transform: translate3d(100%,0,0);
        visibility: visible
    }

    to {
        -webkit-transform: translate3d(0,0,0);
        transform: translate3d(0,0,0)
    }
}

.slideInRight {
    -webkit-animation-name: slideInRight;
    animation-name: slideInRight
}

@-webkit-keyframes slideInUp {
    from {
        -webkit-transform: translate3d(0,100%,0);
        transform: translate3d(0,100%,0);
        visibility: visible
    }

    to {
        -webkit-transform: translate3d(0,0,0);
        transform: translate3d(0,0,0)
    }
}

@keyframes slideInUp {
    from {
        -webkit-transform: translate3d(0,100%,0);
        transform: translate3d(0,100%,0);
        visibility: visible
    }

    to {
        -webkit-transform: translate3d(0,0,0);
        transform: translate3d(0,0,0)
    }
}

.slideInUp {
    -webkit-animation-name: slideInUp;
    animation-name: slideInUp
}

@keyframes notFound__rotating___1FKCF {
    from {
        transform: rotate(0)
    }

    to {
        transform: rotate(360deg)
    }
}

.notFound__flex-column-center___VQob9,.notFound__flex-column___2LjOv,.notFound__flex-row-center___1--Xd,.notFound__flex-row___1DUiG,.notFound__flex___3-LGa {
    display: flex;
    display: -webkit-flex
}

.notFound__flex-column___2LjOv {
    flex-direction: column
}

.notFound__flex-column-center___VQob9 {
    flex-direction: column;
    align-items: center
}

.notFound__flex-row___1DUiG {
    flex-direction: row
}

.notFound__flex-row-center___1--Xd {
    flex-direction: row;
    justify-content: center
}

.notFound__main___HDbG0 {
    padding: 100px 0
}

.notFound__heading___1ZJJB {
    margin: 0;
    font-size: 128px;
    line-height: 1
}

@keyframes examples__rotating___9y67L {
    from {
        transform: rotate(0)
    }

    to {
        transform: rotate(360deg)
    }
}

.examples__flex-column-center___2Okjc,.examples__flex-column___2edh5,.examples__flex-row-center___2rMtl,.examples__flex-row___2wae7,.examples__flex___1degx {
    display: flex;
    display: -webkit-flex
}

.examples__flex-column___2edh5 {
    flex-direction: column
}

.examples__flex-column-center___2Okjc {
    flex-direction: column;
    align-items: center
}

.examples__flex-row___2wae7 {
    flex-direction: row
}

.examples__flex-row-center___2rMtl {
    flex-direction: row;
    justify-content: center
}

.examples__count___1siyc {
    font-size: 24px;
    font-weight: 700
}

.examples__count___1siyc span {
    font-size: 48px;
    line-height: 48px;
    margin-right: 5px;
    color: #a763ff
}

.examples__card___2rSP- {
    margin: 50px 0
}

.examples__card___2rSP->div {
    padding: 30px;
    border-radius: 8px
}

.examples__card___2rSP->div.examples__card1___3dcMW {
    background: #ffebee
}

.examples__card___2rSP->div.examples__card2___2roDy {
    background: #ede7f6
}

.examples__card___2rSP->div.examples__card3___1Tu10 {
    background: #e1f5fe
}

.examples__card___2rSP->div pre {
    margin: 0!important
}

@keyframes IconsPage__rotating___1qhyq {
    from {
        transform: rotate(0)
    }

    to {
        transform: rotate(360deg)
    }
}

.IconsPage__actions___3YIiA,.IconsPage__flex-column-center___3WJMJ,.IconsPage__flex-column___2rmAS,.IconsPage__flex-row-center___TXoOD,.IconsPage__flex-row___sYqx3,.IconsPage__flex___ltT7h {
    display: flex;
    display: -webkit-flex
}

.IconsPage__flex-column___2rmAS {
    flex-direction: column
}

.IconsPage__flex-column-center___3WJMJ {
    flex-direction: column;
    align-items: center
}

.IconsPage__flex-row___sYqx3 {
    flex-direction: row
}

.IconsPage__actions___3YIiA,.IconsPage__flex-row-center___TXoOD {
    flex-direction: row;
    justify-content: center
}

.IconsPage__root___3_zlO {
    flex-grow: 1
}

.IconsPage__container___22pZr {
    padding: 10px 20px
}

.IconsPage__actions___3YIiA {
    justify-content: center;
    flex-wrap: wrap;
    font-weight: 700
}

.IconsPage__query___1lliW {
    border: 1px solid #979797;
    border-radius: 5px;
    padding: 20px 10px 20px 25px
}

.IconsPage__icon__list___3RyuO {
    margin: -5px;
    margin-top: 100px;
    margin-bottom: 100px
}

.IconsPage__icon__category___1SNBQ {
    padding: 20px 0;
    min-width: 250px;
    position: fixed;
    top: var(--category-top);
    left: var(--category-left);
    background: #f9f8f8;
    z-index: 20;
    max-height: calc(100vh - 330px);
    overflow-y: scroll;
    overflow-y: overlay;
    opacity: 0;
    pointer-events: none;
    box-shadow: 0 8px 10px 4px rgba(0,0,0,.08)
}

@media only screen and (min-width: 0px) and (max-width:479px) {
    .IconsPage__icon__category___1SNBQ {
        min-width:100%
    }
}

.IconsPage__icon__category___1SNBQ form {
    list-style: none
}

.IconsPage__icon__category___1SNBQ form label {
    font-size: 16px;
    line-height: 1;
    display: flex;
    align-items: center;
    cursor: pointer;
    padding: 8px 15px 8px 41px;
    background: 0 0;
    margin-bottom: 7px;
    transition: .3s;
    position: relative
}

.IconsPage__icon__category___1SNBQ form label::before {
    content: "";
    height: 16px;
    width: 16px;
    border: 1px solid #dadce0;
    border-radius: 3px;
    position: absolute;
    left: 15px;
    opacity: 0
}

.IconsPage__icon__category___1SNBQ form label::after {
    content: "\EED6";
    color: #fff;
    position: absolute;
    font-family: IcoFont;
    opacity: 0;
    left: 15px;
    top: 8px
}

.IconsPage__icon__category___1SNBQ form label.IconsPage__icon__category__checked___3V8mb::before {
    background: #9747ff;
    border-color: #9747ff;
    opacity: 1
}

.IconsPage__icon__category___1SNBQ form label.IconsPage__icon__category__checked___3V8mb::after {
    opacity: 1
}

.IconsPage__icon__category___1SNBQ form label.IconsPage__icon__category__checked___3V8mb i {
    opacity: 0
}

.IconsPage__icon__category___1SNBQ form label span {
    display: inline-block;
    text-transform: capitalize;
    font-weight: 500;
    color: rgba(0,0,0,.8);
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none
}

.IconsPage__icon__category___1SNBQ form label span:first-child {
    padding-left: 0
}

.IconsPage__icon__category___1SNBQ form label input[type=checkbox] {
    opacity: 0;
    visibility: hidden;
    position: absolute
}

.IconsPage__icon__category___1SNBQ form label:hover {
    background: #fff
}

.IconsPage__icon__category___1SNBQ form label:hover::before {
    opacity: 1
}

.IconsPage__icon__category___1SNBQ form label:hover i {
    opacity: 0
}

.IconsPage__icon__category___1SNBQ .IconsPage__category_icon_counter___1rUjj {
    right: 10px;
    align-self: flex-end;
    flex: 1;
    text-align: right;
    display: inline-block;
    font-size: 14px;
    line-height: 17px;
    color: rgba(0,0,0,.5)
}

.IconsPage__icon__category__backdrop___2twYG {
    position: fixed;
    width: 100%;
    height: 100%;
    left: 0;
    top: 0
}

div.IconsPage__active__icon__category___2C7MA {
    opacity: 1;
    pointer-events: all
}

.IconsPage__category_select_list___1d88j {
    position: relative;
    margin-bottom: 40px
}

.IconsPage__category_select_list___1d88j ul {
    font-size: 0;
    margin: 0;
    padding: 0;
    list-style: none;
    display: flex;
    gap: 15px;
    flex-wrap: wrap
}

.IconsPage__category_select_list___1d88j ul li {
    display: inline-block;
    color: #fff;
    position: relative;
    padding: 8px 16px;
    margin: 0;
    transition: all .3s;
    cursor: pointer;
    font-weight: 500;
    font-size: 18px;
    line-height: 22px;
    background: #2a2a2a;
    border-radius: 50px;
    text-transform: capitalize
}

.IconsPage__category_select_list___1d88j ul li.IconsPage__clear_category_filter_btn___1ae-v {
    background: 0 0;
    font-weight: 500;
    font-size: 14px;
    line-height: 17px;
    color: rgba(0,0,0,.5)
}

.IconsPage__category_select_list___1d88j ul li span {
    display: inline-block;
    color: #fff;
    font-size: 20px;
    margin-left: 10px
}

.IconsPage__category_select_list___1d88j ul li:hover {
    background: #9747ff
}

.IconsPage__category_select_list___1d88j ul li:hover.IconsPage__clear_category_filter_btn___1ae-v {
    color: #000;
    background: 0 0
}

.IconsPage__icon__wrap___2oMcv i,.IconsPage__icon__wrap___2oMcv input {
    position: absolute!important;
    transition: .3s;
    left: 15px;
    top: 10px
}

.IconsPage__icon__wrap___2oMcv input {
    opacity: 0
}

.banner__droip_banner_wrapper___1gVYp {
    background: linear-gradient(106deg,#242424 72.11%,#de0aff 100%);
    position: relative
}

.banner__droip_banner_heading___5130T {
    display: flex;
    align-items: center;
    justify-content: space-between;
    max-width: 1450px;
    margin: 0 auto
}

.banner__droip_banner_images___whs3h {
    position: relative
}

.banner__droip_banner_images___whs3h .banner__svg_1___ZnNZu {
    position: absolute;
    bottom: 10px;
    left: -98px;
    width: 53px;
    height: 53px
}

.banner__droip_banner_images___whs3h .banner__svg_2___1lJm3 {
    margin: 24px 0;
    width: 196px;
    height: 112px
}

.banner__droip_banner_images___whs3h .banner__svg_3___2N7Z2 {
    position: absolute;
    top: 8px;
    right: -62px;
    width: 33px;
    height: 33px
}

.banner__droip_banner_logo___nm3Gl svg {
    width: 80px;
    height: 32px
}

.banner__droip_banner_text____FyhI {
    margin-right: auto;
    margin-left: 80px;
    display: flex;
    align-items: center
}

.banner__droip_banner_text____FyhI .banner__droip_banner_line___3ty_J {
    display: block;
    background: rgba(255,255,255,.6);
    width: 1px;
    height: 32px;
    margin: 0 32px
}

.banner__droip_banner_text____FyhI span {
    color: #fff;
    font-family: Inter;
    font-size: 32px;
    font-weight: 600;
    line-height: 52px;
    letter-spacing: -.32px
}

.banner__droip_banner_text____FyhI span span {
    font-weight: 300
}

.banner__droip_banner_buttons___3vgdX {
    display: flex;
    -moz-column-gap: 24px;
    column-gap: 24px;
    align-items: center
}

.banner__explore_btn___Ki8wS {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 8px 20px 8px 24px;
    border-radius: 9px;
    background: #0cf5ff;
    color: #000;
    text-align: center;
    font-feature-settings: "clig" off,"liga" off;
    font-family: Inter;
    font-size: 18px;
    font-style: normal;
    font-weight: 500;
    line-height: 30px;
    letter-spacing: -.18px;
    float: left
}

.banner__explore_btn___Ki8wS svg {
    height: 24px;
    width: 24px
}

.banner__explore_btn___Ki8wS:active,.banner__explore_btn___Ki8wS:focus,.banner__explore_btn___Ki8wS:hover {
    color: #000;
    background: rgba(12,245,255,.8)
}

.banner__expand_btn___2mqod {
    display: flex;
    padding: 8px 20px 8px 24px;
    align-items: center;
    gap: 8px;
    border-radius: 9px;
    background: rgba(0,0,0,0);
    border: 1px solid rgba(255,255,255,.7);
    color: rgba(255,255,255,.7);
    text-align: center;
    font-feature-settings: "clig" off,"liga" off;
    font-family: Inter;
    font-size: 16px;
    font-style: normal;
    font-weight: 400;
    line-height: 30px;
    letter-spacing: -.16px
}

.banner__expand_btn___2mqod svg {
    width: 20px;
    height: 20px
}

.banner__expand_btn___2mqod:active,.banner__expand_btn___2mqod:focus,.banner__expand_btn___2mqod:hover {
    color: rgba(255,255,255,.7);
    background: rgba(0,0,0,.1)
}

.banner__collapse_btn___3vL9H {
    display: inline-flex;
    padding: 4px 20px 4px 24px;
    align-items: center;
    gap: 8px;
    border-radius: 9px;
    background: rgba(0,0,0,0);
    border: 1px solid rgba(255,255,255,.7);
    color: rgba(255,255,255,.7);
    text-align: center;
    font-feature-settings: "clig" off,"liga" off;
    font-family: Inter;
    font-size: 16px;
    font-style: normal;
    font-weight: 400;
    line-height: 30px;
    letter-spacing: -.16px;
    position: absolute;
    right: 20px;
    bottom: 20px
}

.banner__collapse_btn___3vL9H svg {
    width: 20px;
    height: 20px
}

.banner__collapse_btn___3vL9H:active,.banner__collapse_btn___3vL9H:focus,.banner__collapse_btn___3vL9H:hover {
    color: rgba(255,255,255,.7);
    background: rgba(0,0,0,.1)
}

.banner__close_btn___3HlVz {
    position: absolute;
    top: 12px;
    right: 12px;
    width: 24px;
    height: 24px;
    cursor: pointer
}

.banner__close_btn___3HlVz path {
    transition: .3s
}

.banner__close_btn___3HlVz:hover path {
    fill-opacity: 1
}

.banner__droip_expand_banner___1qt79 {
    max-width: 1550px;
    margin: 0 auto;
    display: flex;
    align-items: center;
    -moz-column-gap: 109px;
    column-gap: 109px;
    padding: 50px 0
}

.banner__droip_expand_banner_img___2s3YD {
    position: relative
}

.banner__droip_expand_banner_img___2s3YD svg {
    position: absolute;
    bottom: 0;
    left: -53px;
    width: 53px;
    height: 53px
}

.banner__droip_expand_banner_img___2s3YD svg.banner__svg_right___3DPqE {
    left: auto;
    right: -85px;
    bottom: auto;
    top: -17px;
    width: 54px;
    height: 54px
}

.banner__droip_slogan___3pXwT {
    color: #fff;
    font-family: Inter;
    font-size: 48px;
    font-style: normal;
    font-weight: 600;
    line-height: 52px;
    letter-spacing: -.48px;
    margin: 24px 0;
    max-width: 392px
}

.banner__droip_slogan___3pXwT span {
    font-weight: 300;
    display: block
}

.banner__droip_expand_banner_content___3RONa .banner__droip_logo___1IhlU {
    width: 80px;
    height: 32px
}

.banner__droip_expand_banner_content___3RONa li {
    display: flex;
    align-items: center;
    -moz-column-gap: 12px;
    column-gap: 12px;
    color: rgba(255,255,255,.7);
    font-family: Inter;
    font-size: 14px;
    font-style: normal;
    font-weight: 400;
    line-height: 18px;
    padding-bottom: 10px
}

.banner__droip_expand_banner_content___3RONa li span {
    font-family: "Roboto Mono",monospace;
    font-size: 9px;
    display: inline-block;
    margin-top: -6px;
    margin-left: -8px
}

.banner__droip_expand_banner_content___3RONa .banner__explore_btn___Ki8wS {
    margin-top: 30px
}

@media only screen and (min-width: 1280px) and (max-width:1440px) {
    .banner__droip_banner_heading___5130T {
        max-width:1185px
    }

    .banner__droip_banner_images___whs3h .banner__svg_1___ZnNZu {
        width: 36px;
        height: 36px;
        left: -47px
    }

    .banner__droip_banner_images___whs3h .banner__svg_3___2N7Z2 {
        width: 33px;
        height: 33px;
        right: -45px
    }

    .banner__droip_banner_logo___nm3Gl svg {
        width: 72px;
        height: 28px
    }

    .banner__droip_banner_text____FyhI {
        margin-left: auto
    }

    .banner__droip_banner_text____FyhI span {
        font-size: 28px
    }

    .banner__droip_banner_text____FyhI .banner__droip_banner_line___3ty_J {
        margin: 0 16px
    }

    .banner__droip_banner_buttons___3vgdX {
        -moz-column-gap: 16px;
        column-gap: 16px
    }

    .banner__explore_btn___Ki8wS {
        padding: 8px 10px 8px 16px
    }

    .banner__expand_btn___2mqod {
        padding: 8px 12px 8px 16px
    }

    .banner__close_btn___3HlVz {
        right: 4px;
        top: 4px
    }

    .banner__droip_expand_banner___1qt79 {
        -moz-column-gap: 87px;
        column-gap: 87px;
        max-width: 1135px;
        align-items: flex-start
    }

    .banner__droip_expand_banner_img___2s3YD svg {
        left: -46px;
        width: 46px;
        height: 46px
    }

    .banner__droip_expand_banner_img___2s3YD svg.banner__svg_right___3DPqE {
        width: 45px;
        height: 45px;
        right: -71px
    }

    .banner__droip_expand_banner_img___2s3YD img {
        max-width: 750px
    }

    .banner__droip_expand_banner_content___3RONa {
        margin-top: 26px
    }

    .banner__droip_expand_banner_content___3RONa .banner__droip_logo___1IhlU {
        width: 75px;
        height: 29px
    }

    .banner__droip_expand_banner_content___3RONa li {
        font-size: 13px
    }

    .banner__droip_expand_banner_content___3RONa .banner__explore_btn___Ki8wS {
        margin-top: 22px
    }

    .banner__droip_slogan___3pXwT {
        font-size: 40px;
        max-width: 333px
    }
}

@media only screen and (min-width: 1140px) and (max-width:1279px) {
    .banner__droip_banner_heading___5130T {
        max-width:1060px
    }

    .banner__droip_banner_images___whs3h .banner__svg_1___ZnNZu {
        bottom: 24px;
        left: -32px;
        width: 32px;
        height: 32px
    }

    .banner__droip_banner_images___whs3h .banner__svg_2___1lJm3 {
        width: 160px;
        height: 92px
    }

    .banner__droip_banner_images___whs3h .banner__svg_3___2N7Z2 {
        right: -42px;
        width: 32px;
        height: 32px
    }

    .banner__droip_banner_text____FyhI {
        margin-left: auto
    }

    .banner__droip_banner_text____FyhI span {
        font-size: 24px
    }

    .banner__droip_banner_text____FyhI .banner__droip_banner_line___3ty_J {
        margin: 0 24px
    }

    .banner__droip_banner_logo___nm3Gl svg {
        width: 65px;
        height: 26px
    }

    .banner__droip_banner_buttons___3vgdX {
        -moz-column-gap: 16px;
        column-gap: 16px
    }

    .banner__explore_btn___Ki8wS {
        padding: 6px 8px 6px 14px;
        gap: 6px;
        font-size: 16px;
        letter-spacing: -.14px
    }

    .banner__expand_btn___2mqod {
        padding: 6px 8px 6px 14px;
        gap: 6px
    }

    .banner__droip_expand_banner___1qt79 {
        max-width: 1100px;
        -moz-column-gap: 40px;
        column-gap: 40px;
        padding-bottom: 100px
    }

    .banner__droip_expand_banner_img___2s3YD {
        max-width: 735px;
        margin: 0 auto
    }

    .banner__droip_expand_banner_img___2s3YD svg {
        left: -34px;
        width: 34px;
        height: 34px
    }

    .banner__droip_expand_banner_img___2s3YD svg.banner__svg_right___3DPqE {
        right: -45px;
        bottom: auto;
        top: -32px;
        width: 34px;
        height: 34px
    }

    .banner__droip_slogan___3pXwT {
        font-size: 32px;
        line-height: 40px;
        max-width: 280px;
        margin: 16px 0
    }
}

@media only screen and (min-width: 768px) and (max-width:1139px) {
    .banner__droip_banner_heading___5130T {
        max-width:725px
    }

    .banner__droip_banner_images___whs3h .banner__svg_1___ZnNZu {
        width: 13px;
        height: 13px;
        left: -18px
    }

    .banner__droip_banner_images___whs3h .banner__svg_2___1lJm3 {
        width: 97px;
        height: 55px;
        margin: 16px 0
    }

    .banner__droip_banner_images___whs3h .banner__svg_3___2N7Z2 {
        width: 14px;
        height: 14px;
        right: -22px
    }

    .banner__droip_banner_logo___nm3Gl svg {
        width: 35px;
        height: 13px
    }

    .banner__droip_banner_text____FyhI {
        margin-left: auto
    }

    .banner__droip_banner_text____FyhI span {
        font-size: 16px;
        line-height: 24px
    }

    .banner__droip_banner_text____FyhI .banner__droip_banner_line___3ty_J {
        margin: 0 10px;
        height: 26px
    }

    .banner__droip_banner_buttons___3vgdX {
        -moz-column-gap: 10px;
        column-gap: 10px
    }

    .banner__explore_btn___Ki8wS {
        padding: 6px 10px 6px 12px;
        gap: 4px;
        font-size: 12px;
        line-height: 18px;
        font-weight: 500;
        letter-spacing: -.12px
    }

    .banner__explore_btn___Ki8wS svg {
        width: 16px;
        height: 16px
    }

    .banner__expand_btn___2mqod {
        padding: 6px 10px 6px 12px;
        gap: 4px;
        font-size: 12px;
        font-weight: 500;
        line-height: 18px;
        letter-spacing: -.12px
    }

    .banner__expand_btn___2mqod svg {
        width: 16px;
        height: 16px
    }

    .banner__close_btn___3HlVz {
        right: 3px;
        top: 3px;
        width: 14px;
        height: 14px
    }

    .banner__droip_expand_banner___1qt79 {
        -moz-column-gap: 24px;
        column-gap: 24px;
        max-width: 732px;
        align-items: flex-start;
        padding-bottom: 110px
    }

    .banner__droip_expand_banner_img___2s3YD svg {
        left: 0;
        width: 32px;
        height: 32px;
        bottom: -52px
    }

    .banner__droip_expand_banner_img___2s3YD svg.banner__svg_right___3DPqE {
        width: 24px;
        height: 24px;
        right: -29px;
        top: -40px
    }

    .banner__droip_expand_banner_img___2s3YD img {
        max-width: 470px
    }

    .banner__droip_expand_banner_content___3RONa {
        margin-top: -6px
    }

    .banner__droip_expand_banner_content___3RONa .banner__droip_logo___1IhlU {
        width: 40px;
        height: 19px
    }

    .banner__droip_expand_banner_content___3RONa li {
        font-size: 12px;
        white-space: nowrap;
        -moz-column-gap: 8px;
        column-gap: 8px
    }

    .banner__droip_expand_banner_content___3RONa li span {
        margin-left: -4px
    }

    .banner__droip_expand_banner_content___3RONa .banner__explore_btn___Ki8wS {
        margin-top: 22px;
        padding: 8px 20px 8px 24px;
        font-size: 16px;
        letter-spacing: -.16px;
        gap: 8px;
        line-height: 30px
    }

    .banner__droip_expand_banner_content___3RONa .banner__explore_btn___Ki8wS svg {
        width: 24px;
        height: 24px
    }

    .banner__droip_slogan___3pXwT {
        font-size: 24px;
        max-width: 196px;
        line-height: 29px;
        letter-spacing: -.24px;
        margin: 16px 0
    }
}

@media only screen and (min-width: 375px) and (max-width:767px) {
    .banner__droip_banner_images___whs3h {
        display:none
    }

    .banner__droip_banner_heading___5130T {
        flex-direction: column;
        align-items: flex-start;
        padding: 20px 0 30px 17px
    }

    .banner__close_btn___3HlVz {
        top: 4px;
        right: 4px
    }

    .banner__droip_banner_logo___nm3Gl svg {
        width: 24px;
        height: 9px
    }

    .banner__droip_banner_text____FyhI {
        align-items: flex-start;
        flex-direction: column;
        margin-left: 0;
        margin-bottom: 22px
    }

    .banner__droip_banner_text____FyhI span {
        max-width: 184px;
        font-size: 16px;
        line-height: 24px;
        letter-spacing: -.08px
    }

    .banner__droip_banner_text____FyhI .banner__droip_banner_line___3ty_J {
        display: none
    }

    .banner__droip_banner_buttons___3vgdX {
        -moz-column-gap: 10px;
        column-gap: 10px
    }

    .banner__explore_btn___Ki8wS {
        padding: 6px 10px 6px 12px;
        gap: 4px;
        font-size: 12px;
        line-height: 18px;
        font-weight: 500;
        letter-spacing: -.12px
    }

    .banner__explore_btn___Ki8wS svg {
        width: 16px;
        height: 16px
    }

    .banner__expand_btn___2mqod {
        padding: 6px 10px 6px 12px;
        gap: 4px;
        font-size: 12px;
        font-weight: 500;
        line-height: 18px;
        letter-spacing: -.12px
    }

    .banner__expand_btn___2mqod svg {
        width: 16px;
        height: 16px
    }

    .banner__droip_expand_banner___1qt79 {
        padding: 50px 32px 120px;
        flex-direction: column
    }

    .banner__droip_expand_banner_img___2s3YD svg {
        left: -16px;
        width: 16px;
        height: 16px
    }

    .banner__droip_expand_banner_img___2s3YD svg.banner__svg_right___3DPqE {
        right: -18px;
        top: -10px;
        width: 10px;
        height: 10px
    }

    .banner__droip_expand_banner_content___3RONa .banner__droip_logo___1IhlU {
        width: 28px;
        height: 12px;
        margin-top: 20px
    }

    .banner__droip_expand_banner_content___3RONa li {
        -moz-column-gap: 6px;
        column-gap: 6px;
        font-size: 11px;
        line-height: 14px;
        padding-bottom: 8px
    }

    .banner__droip_expand_banner_content___3RONa .banner__explore_btn___Ki8wS {
        margin-top: 20px
    }

    .banner__droip_slogan___3pXwT {
        font-size: 20px;
        font-style: normal;
        line-height: 26px;
        letter-spacing: -.3px;
        max-width: 188px;
        margin: 8px 0 18px
    }

    .banner__collapse_btn___3vL9H {
        padding: 4.91px 12.275px 4.91px 14.73px;
        gap: 4.91px;
        border-radius: 5px;
        line-height: 18px;
        letter-spacing: -.12px;
        font-size: 12px
    }

    .banner__collapse_btn___3vL9H svg {
        width: 16px;
        height: 16px
    }
}

@keyframes Navbar__rotating___210kZ {
    from {
        transform: rotate(0)
    }

    to {
        transform: rotate(360deg)
    }
}

.Navbar__flex-column-center___3aUaV,.Navbar__flex-column___rxICe,.Navbar__flex-row-center___3vC6-,.Navbar__flex-row___3ahxe,.Navbar__flex___2Hdgi {
    display: flex;
    display: -webkit-flex
}

.Navbar__flex-column___rxICe {
    flex-direction: column
}

.Navbar__flex-column-center___3aUaV {
    flex-direction: column;
    align-items: center
}

.Navbar__flex-row___3ahxe {
    flex-direction: row
}

.Navbar__flex-row-center___3vC6- {
    flex-direction: row;
    justify-content: center
}

.Navbar__icon_collection_btn___KN_nf {
    position: relative;
    margin-top: 3px;
    margin-left: 20px;
    float: right
}

.Navbar__icon_collection_btn___KN_nf i {
    font-size: 24px;
    line-height: 40px;
    color: #4a4a4a
}

.Navbar__icon_collection_btn___KN_nf .Navbar__icon__collection___2UxoR {
    position: absolute;
    background: #ed4266;
    border-radius: 3px;
    color: #fff;
    font-size: 10px;
    text-align: center;
    padding: 0 3px;
    top: 0;
    right: -10px;
    line-height: 15px;
    font-weight: 700;
    padding-top: 0
}

@keyframes banner__rotating___1gfBG {
    from {
        transform: rotate(0)
    }

    to {
        transform: rotate(360deg)
    }
}

.banner__flex-column-center___2cr4q,.banner__flex-column___3olCN,.banner__flex-row-center___G91Wd,.banner__flex-row___3EarD,.banner__flex___345Hp {
    display: flex;
    display: -webkit-flex
}

.banner__flex-column___3olCN {
    flex-direction: column
}

.banner__flex-column-center___2cr4q {
    flex-direction: column;
    align-items: center
}

.banner__flex-row___3EarD {
    flex-direction: row
}

.banner__flex-row-center___G91Wd {
    flex-direction: row;
    justify-content: center
}

.banner__banner__wrapper___1o58L {
    background: #171717;
    padding-top: 82px
}

.banner__page__banner___eOH5O {
    max-width: 1312px;
    margin-left: auto;
    margin-right: auto;
    padding: 50px 40px;
    background: #2a2a2a
}

@media only screen and (min-width: 0px) and (max-width:479px) {
    .banner__page__banner___eOH5O {
        padding:20px
    }
}

.banner__page__banner___eOH5O h2 {
    font-family: Playfair,serif;
    font-size: 64px;
    line-height: 74px;
    color: #fff;
    margin: 0;
    max-width: 695px
}

@media only screen and (min-width: 0px) and (max-width:767px) {
    .banner__page__banner___eOH5O h2 {
        font-size:44px;
        line-height: 54px;
        text-align: center
    }
}

@media only screen and (min-width: 0px) and (max-width:767px) {
    .banner__page__banner___eOH5O h2 {
        font-size:36px;
        line-height: 46px
    }
}

.banner__page__banner___eOH5O h2 span {
    color: #a763ff
}

.banner__page__banner___eOH5O p {
    font-size: 24px;
    line-height: 29px;
    margin-top: 10px;
    margin-bottom: 0;
    color: #fff;
    max-width: 695px
}

@keyframes home__rotating___1Clvp {
    from {
        transform: rotate(0)
    }

    to {
        transform: rotate(360deg)
    }
}

.home__flex-column-center___1Ikob,.home__flex-column_____mFn,.home__flex-row-center___3_HaM,.home__flex-row___WUCka,.home__flex___SDINF {
    display: flex;
    display: -webkit-flex
}

.home__flex-column_____mFn {
    flex-direction: column
}

.home__flex-column-center___1Ikob {
    flex-direction: column;
    align-items: center
}

.home__flex-row___WUCka {
    flex-direction: row
}

.home__flex-row-center___3_HaM {
    flex-direction: row;
    justify-content: center
}

.home__hero___2h2t3 {
    background-image: linear-gradient(-155deg,#896be8 0,#5a29b7 95%);
    background-image: linear-gradient(-225deg,#419fde 0,#b57ad9 100%);
    text-align: center;
    height: 640px;
    display: flex;
    align-items: center;
    color: #fff;
    position: relative
}

@media (min-width: 768px) and (max-width:1023px) {
    .home__hero___2h2t3 {
        height:480px
    }
}

@media only screen and (min-width: 0px) and (max-width:767px) {
    .home__hero___2h2t3 {
        height:400px
    }
}

.home__hero___2h2t3 .home__hero_content___3Iu6c {
    display: inline-block;
    position: relative;
    z-index: 1
}

.home__hero___2h2t3 h1 {
    color: #fff;
    font-size: 48px;
    font-weight: 700;
    line-height: 1.2;
    text-align: center;
    max-width: 800px;
    margin-bottom: 10px
}

@media (min-width: 768px) and (max-width:1023px) {
    .home__hero___2h2t3 h1 {
        font-size:36px
    }
}

@media only screen and (min-width: 0px) and (max-width:767px) {
    .home__hero___2h2t3 h1 {
        font-size:24px
    }
}

.home__hero___2h2t3 .home__hero_desc___2_BNl {
    font-size: 18px;
    font-weight: 500;
    line-height: 28px;
    margin: 0 auto 30px;
    max-width: 700px
}

@media only screen and (min-width: 0px) and (max-width:767px) {
    .home__hero___2h2t3 .home__hero_desc___2_BNl {
        font-size:16px;
        line-height: 24px;
        margin-bottom: 20px
    }
}

.home__icon_categories___1xht8 {
    padding: 70px 0
}

.home__load_more_category_button___9srqJ {
    text-align: center
}

.home__feature_collection___3FoJS,.home__feature_fontsvg___2Pucl {
    padding: 60px 0
}

.home__feature_collection___3FoJS h3,.home__feature_fontsvg___2Pucl h3 {
    font-size: 24px;
    margin: 0 0 20px
}

.home__feature_collection___3FoJS {
    background: #e8f4fc
}

.home__feature_fontsvg___2Pucl {
    background: #fff;
    border-bottom: 1px solid #e2e2e2
}

.home__bottom_features___2XMQy {
    padding: 100px 0;
    line-height: 24px;
    background: #fff
}

.home__bottom_features___2XMQy .home__bottom_feature___25p89 {
    text-align: center
}

.home__bottom_features___2XMQy .home__bottom_feature___25p89 .home__icon___2P2iB {
    font-size: 64px;
    display: inline-block;
    width: 170px;
    height: 110px;
    line-height: 110px;
    border-radius: 12px;
    margin-bottom: 50px
}

.home__bottom_features___2XMQy .home__bottom_feature___25p89 .home__icon___2P2iB.home__icon1___2OKl0 {
    background: #e3f2fd;
    color: #1565c0
}

.home__bottom_features___2XMQy .home__bottom_feature___25p89 .home__icon___2P2iB.home__icon2___1ZON7 {
    background: #fffde7;
    color: #f9a825
}

.home__bottom_features___2XMQy .home__bottom_feature___25p89 .home__icon___2P2iB.home__icon3___1-vAg {
    background: #fce4ec;
    color: #ad1457
}

.home__bottom_features___2XMQy .home__bottom_feature___25p89 .home__icon___2P2iB.home__icon4___1Zgo4 {
    background: #ede7f6;
    color: #4527a0
}

.home__bottom_features___2XMQy .home__bottom_feature___25p89 h3 {
    font-size: 21px;
    line-height: 1;
    margin-bottom: 20px
}

.home__home_footer___2rUD8 {
    padding-top: 70px;
    background: #fff;
    text-align: center;
    border-bottom: 10px solid #a6e7ff;
    overflow: hidden
}

.home__home_footer___2rUD8 img {
    display: inline-block;
    margin-bottom: -2px
}

@keyframes controlpanel__rotating___1I52x {
    from {
        transform: rotate(0)
    }

    to {
        transform: rotate(360deg)
    }
}

.controlpanel__flex-column-center___3GhC1,.controlpanel__flex-column___3tmIM,.controlpanel__flex-row-center___2PLcj,.controlpanel__flex-row___JLM4P,.controlpanel__flex___23khA {
    display: flex;
    display: -webkit-flex
}

.controlpanel__flex-column___3tmIM {
    flex-direction: column
}

.controlpanel__flex-column-center___3GhC1 {
    flex-direction: column;
    align-items: center
}

.controlpanel__flex-row___JLM4P {
    flex-direction: row
}

.controlpanel__flex-row-center___2PLcj {
    flex-direction: row;
    justify-content: center
}

.controlpanel__section___10KdE {
    background: #171717;
    height: 80px;
    position: sticky;
    top: 82px;
    z-index: 20
}

@media only screen and (min-width: 0px) and (max-width:479px) {
    .controlpanel__section___10KdE {
        height:auto
    }
}

.controlpanel__wrap___3esMC {
    background: #ebebeb;
    display: flex;
    min-height: 80px;
    align-items: center;
    justify-content: flex-start;
    padding: 0;
    position: relative;
    max-width: 1312px;
    margin-left: auto;
    margin-right: auto
}

.controlpanel__category___1YeJZ {
    padding: 24px 20px 24px 40px;
    cursor: pointer;
    flex: 0 0 15.1%
}

@media only screen and (min-width: 0px) and (max-width:767px) {
    .controlpanel__category___1YeJZ {
        padding-left:20px;
        padding-right: 20px
    }
}

.controlpanel__category___1YeJZ span {
    margin-left: 10px
}

@media only screen and (max-width: 1199px) {
    .controlpanel__category___1YeJZ {
        flex:0 0 auto;
        padding-left: 30px;
        padding-right: 30px
    }

    .controlpanel__category___1YeJZ span {
        display: none
    }
}

.controlpanel__panel__text___3_NZu {
    display: inline-block;
    font-weight: 500;
    font-size: 16px;
    color: #000
}

.controlpanel__search___2VfGT {
    background: #f9f8f8;
    flex: 0 1 100%;
    display: flex;
    align-items: center;
    padding-right: 30px
}

@media only screen and (min-width: 0px) and (max-width:767px) {
    .controlpanel__search___2VfGT {
        padding-right:20px
    }
}

.controlpanel__search___2VfGT input {
    width: 100%;
    min-height: 80px;
    border: 0;
    background: 0 0;
    font-weight: 500;
    font-size: 24px;
    line-height: 29px;
    color: #000;
    padding: 0 30px 0 40px
}

.controlpanel__search___2VfGT input::-moz-placeholder {
    color: rgba(23,23,23,.6);
    opacity: 1
}

.controlpanel__search___2VfGT input::-moz-placeholder,.controlpanel__search___2VfGT input::-webkit-placeholder,.controlpanel__search___2VfGT input::placeholder {
    color: rgba(23,23,23,.6);
    opacity: 1
}

@media only screen and (min-width: 0px) and (max-width:767px) {
    .controlpanel__search___2VfGT input {
        padding-left:20px;
        padding-right: 20px;
        font-size: 18px
    }
}

@media only screen and (min-width: 0px) and (max-width:479px) {
    .controlpanel__search___2VfGT input {
        padding-right:8px;
        font-size: 16px;
        padding-left: 16px
    }
}

.controlpanel__search___2VfGT svg {
    cursor: pointer
}

@media only screen and (min-width: 0px) and (max-width:479px) {
    .controlpanel__search___2VfGT svg {
        flex:0 0 32px
    }
}

.controlpanel__sort__list___3JyRP {
    padding: 24px 20px 24px 18px;
    display: flex;
    gap: 15px;
    border-right: 1.5px solid #d5d5d5
}

.controlpanel__sort__list___3JyRP svg {
    cursor: pointer;
    opacity: .4
}

.controlpanel__active___3UfF3 {
    opacity: 1!important
}

.controlpanel__collection___19hxH {
    background: #ebebeb;
    padding-left: 28px;
    min-height: 80px;
    align-items: center;
    display: flex;
    flex: 0 0 14.9%;
    cursor: pointer
}

@media only screen and (max-width: 1199px) {
    .controlpanel__collection___19hxH {
        flex:0 0 auto;
        padding-left: 30px;
        padding-right: 30px
    }

    .controlpanel__collection___19hxH .controlpanel__panel__text___3_NZu {
        display: none
    }
}

@media only screen and (min-width: 0px) and (max-width:479px) {
    .controlpanel__collection___19hxH {
        padding-left:20px;
        padding-right: 20px
    }
}

.controlpanel__count__wrap___3cli1 {
    position: relative;
    cursor: pointer
}

.controlpanel__count__text___11FtL {
    position: absolute;
    background: #9747ff;
    border-radius: 50px;
    font-weight: 700;
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    top: -14px;
    line-height: 1;
    padding: 4px 6px;
    font-size: 13px;
    left: 20px
}

@media only screen and (min-width: 0px) and (max-width:767px) {
    .controlpanel__count__text___11FtL {
        right:0;
        left: auto;
        top: -18px
    }
} 

</style>
@endsection