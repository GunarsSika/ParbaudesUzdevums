# ParbaudesUzdevums
Testa uzdevums kandidātiem SIA "Printful. Autors: Gunārs Sīka


SVEICINĀTI!

Šajā repozitorijā esmu pievienojis savu pārbaudes uzdevumu.
Pirmais, kas būtu jāizdara, ir jāizveido jauna datubāze uz mysql servera. Man kodā tā ir nosaukta kā "imports" un to vajadzētu
uzsetot kā utf-8-general, bet nosaukumu var izvēlēties kādu vēlas, tikai tādā gadījumā kodā būs jāveic izmaiņas : failā dbh.inc.php 16. rindā, kur mainīgajam $this->dbname tiek 
uzstādīta vērtība, būs jāieraksta šīs datubāzes nosaukums. Tāpat 13. rindā, kur mainīgajam $this->servername tiek uzstādīta vērtība, 
būs visticamāk jānomaina vērtība. Tā kā es šo uzdevumu veidoju uz lokālā wamp64 servera, man servera nosaukums bija localhost,
bet, ja uz Jūsu servera tā nav, tas ir jānomaina uz Jūsu servera nosaukumu. Tāpat būs nepieciešams mysql izveidot lietotāju 
ar visām tiesībām, kura vārds un parole būs jāieraksta 15. un 16. rindiņā. Man uz wamp64 servera lietotājs bija "root" bez paroles.
Ja uz Jūsu serera ir tāds lietotājs, nekas nav jāmaina.

Tālāk Jums būs jāatver komandrinda ar administratora tiesībām un jāieraksta komanda (pēctam, kad ar komandrindu būsiet tikuši līdz 
vietai, kura atrodas Jūsu mysql servris):
mysql -h (servera nosaukums) -u (lietotājvārds) (datubāzes nosaukums) < (pilnais ceļš līdz gunarssika.sql failam),
kur servera nosaukms - Jūsu servera nosaukums,
lietoājvārds - uz mysql servera izveidotais lietotājs,
datubāzes nosaukums - uz Jūsu mysql servera izveidotā datubāze
pilnais ceļš līdz gunarssika.sql failam - pilnais ceļš, līdz vietai, kur uz Jūsu datora atrodas gunarssika.sql ar nepieciešamajiem skriptiem

Tā kā es nezināju, vai man ir nepieciešams iesniegt skriptus ar aizpildītām tabulām, tika izveidoti ieraksti ar diviem testu
nosaukumiem, kas glabājas tabulā tests, kur katram jautājumam ir ir vismaz 2 atbildes (tabulā answers),
kā arī pareizo atbilžu tabula (correct-answers)

Ceru, ka visu šiet esmu aprakstījis skaidri un saprotami! Ja rodas kādi jautājumi, droši dodiet ziņu uz manu epastu gunarssika@inbox.lv


Ar cieņu, Gunārs Sīka
