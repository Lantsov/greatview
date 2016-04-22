<?php
require_once '../back/setting.php';
$page_id = 'rules';
require '../back/db.php';
require '../front/base_top.php';
require '../front/header.php';
require '../front/page_start.php';
//$passwordHash = md5(md5($solt).md5(md5('vj32-x035').md5($solt)));
//echo $passwordHash;
echo <<<END

<h1>Отказ от ответственности</h1>

<p>Сайт и домен greatview.ru, а также все размещенные на greatview.ru сайты и домены (далее Сайт) содержат информацию, предназначеную для свободного ознакомления пользователей с вопросами, которые могут представлять для них интерес. Администрация Сайта не дает каких-либо гарантий в отношении Сайта, его содержимого и нарушения прав третьих лиц. В том числе, в отношении актуальности и точности содержимого. А также в том, что при использовании Сайта не возникнет ошибок. Администрация Сайта размещает сама и может предоставлять права размещения, изменения или удаления информации на его страницах. Вся информация предоставляется без гарантий полноты или своевременности, и без иных явно выраженных или подразумеваемых гарантий. Доступ к Сайту, а также использование его содержимого осуществляются исключительно по вашему усмотрению и на ваш риск. Администрация Сайта и доверенные лица имеют право изменять и удалять аудио-, видео- и другие файлы и ссылки, размещенные на Сайте без предварительного уведомления и объяснения причин.</p>

<p>Ни администрация Сайта, ни хостинг провайдер, ни любые другие физические или юридические лица не несут ответственности за размещенные материалы. Если вы считаете, что какой-либо файл или ссылка нарушают ваши права, как можно скорее свяжитесь с администрацией Сайта, чтобы устранить правонарушение. Администрация Сайта предупреждает также, что не осуществляет контроль за действиями пользователей, которые могут повторно размещать ссылки на информацию, являющуюся объектом вашего исключительного права. Любая информация на Сайте размещается, без какого-либо контроля с чьей-либо стороны, что соответствует общепринятой мировой практике размещения информации в сети интернет. Однако мы в любом случае рассмотрим все ваши корректно сформулированные запросы относительно файлов и ссылок, нарушающих ваши права. Все цены, условия, характеристики и сроки, указанные на нашем сайте приведены как справочная информация и не являются публичной офертой. Они могут быть изменены или удалены в любое время без предупреждения.</p>

<p>Некоторые ссылки на этом Сайте ведут на сторонние ресурсы. Данные ссылки размещены для вашего удобства и не означают, что администрация Сайта одобряет содержание других веб-ресурсов. Кроме этого, администрация Сайта не несет никакой ответственности за доступность этих ресурсов и их содержимое. Это справедливо для всех ссылок на Сайте.</p>

<p>В соответствии с действующим законодательством, администрация Сайта отказывается от каких-либо заверений и гарантий в отношении Сайта, его содержимого и использования. Ни при каких обстоятельствах администрация Сайта не несет ответственности ни перед какой стороной за какой-либо ущерб в результате любого использования содержимого материалов, представленных на этом Сайте или на любом другом сайте, на который имеется ссылка с нашего Сайта.</p>

<p>За рекламу, размещаемую на Сайте, несет ответственность только рекламодатель. Администрация предупреждает, что не гарантирует приобретение или использование рекламируемых товаров и услуг по ценам и/или на условиях, указанных в рекламе. Вы соглашаетесь с тем, что Сайт не несет никакой ответственности за любые возможные последствия от отношений с рекламодателями.</p>

<p>Пользуясь нашим Сайтом вы принимаете и соглашаетесь со всеми нашими правилами, включая "Отказ от ответственности".</p>


END;
require '../front/page_end.php';
require '../front/base_bottom.php';
?>