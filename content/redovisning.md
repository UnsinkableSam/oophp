---
---
Redovisning
=========================

Detta innehåll är skrivet i markdown och du hittar innehållet i filen `content/redovisning.md`.



Kmom01
-------------------------

•	Hur känns det att hoppa rakt in i objekt och klasser med PHP, gick det bra och kan du relatera till andra objektorienterade språk?
Innan jag kom till BTH hade jag aldrig jobbat med php. Jag hade aldrig en tänkt tanken. Jag jobbade istället med javascript, java, c++, ruby och massa andra. Men jag måste säga jag tycker php är ett av the roligaste språken. Jag vet inte riktigt varför det bara känns lätt att tänka. Klart hamnar jag i problem med språket men något med php gör det lätt att jobba metodiskt igenom uppgifter utan att bli arg eller irriterad. Att jobba med oophp är bara kul! Nu när man är klar med oopython så är det bara kul att göra detta!
Jag känner igen mig i oojavascript och oopython det känns typ som samma sak fast det är lite roligare med php.
•	Berätta hur det gick det att utföra uppgiften “Gissa numret” med GET, POST och SESSION?
Det gick ganska lätt de var bara det att jag inte direkt fattade hur uppgiften skulle funka om de var att jag skulle skicka med post eller inte men nu fattade jag det som vi bara skulle använda det för att komma ihåg saker. Jag fastnade på en del där mitt objekt konstant återskapades med nytt gissa nummer men jag lyckades lösa det. Det var bara någon liten konstig bugg jag hade lyckat skapa på egen hand.
•	Har du några inledande reflektioner kring me-sidan och dess struktur?
Jag inte direkt några frågor kring me sidan trodde det skulle vara mycket jobbigare att styla den med de vi lärde oss från designkursen men jag tyckte det var kul att leka med less igen och skapa en simple minimilistic hemsida. Jag hittade min design på google. Jag googlade snygga hemsidor och sedan försökte jag kopiera med min egna less kod. Kunde länkat till sidan men de var en lång länk så jag skippar det.

TIL för detta kursmomentet.
Jag tror det enbart var att jag upptäckte hur enkelt det var att komma igång med en design av less. Det tog så lång tid för mig när vi hade designkursen så jag märker jag har blivit mycket bättre.
Det finns inte direkt något riktigt TIL för detta momentet. Kanske får det här efter detta kursmomentet för jag ska lägga mig och läsa lite i databasteknik boken.


Kmom02
-------------------------

Här är redovisningstexten


Hur gick det att överföra spelet “Gissa mitt nummer” in i din me-sida?
Det var rätt enkelt tycker jag. Fick lite problem med att använda namespace på exception för jag hade inte döpt min exception fil till de samma som mitt error. Jag tänkte göra extra uppgifter men kände jag hade redan lagt så mycket tid att jag gjorde bara lite på de tex involverade get och post. Kunde enkelt gjort en route som funkade för alla men de var ju inte direkt någon extra uppgift.

Berätta om din syn på modellering likt UML jämfört med verktyg som phpDocumentor. Fördelar, nackdelar, användningsområde? Vad tycker du om konceptet make doc?
Vad kan jag säga mer än att make doc gör det lite mer värt att investera mer tid i mina kommentarer. Tidigare har det kanske varit lite drygt att skriva kommentarer men jag känner absolut att jag börjar förstå vikten av a skriva kommentarer speciellt när man har phpDocumentor.

phpDocumentor är ett snabbt bra verktyg för att få en helhet i programmets documentation väldigt bra om man har någon som hela tiden vill se nya uppdateringar i text format. Det vill säga man har en kund som kanske vill bli uppdaterad och varje vecka då är det lite enklare att köra med phpDocumentor än att skriva ett nytt uml för det tar ju ganska bra med tid.

Hur känns det att skriva kod utanför och inuti ramverket, ser du fördelar och nackdelar med de olika sätten?
Det blir mycket snyggare att skriva i ramverket. Jag känner det blir sämre struktur på koden att inte ha det i ramverket. Om jag inte fattat det helt fel så kan man även använda ramverkets de bugverktyg på koden som man har i ramverket men inte på den koden som är utanför.

Vilken är din TIL för detta kmom?
Det stora jag har lärt mig från detta kursmomentet är hur viktigt det är att skriva kommentarer. Men får även säga att de var lite av ett TIL att lära sig man kan köra any route med en array av tex post, get. Det var inget jag kände till tidigare men det är väldigt händigt.



me-sidaLänk (Länkar till en externa sida.)Länkar till en externa sida.







Vet inte vad som hände men fick lämna in igen. Lämnade direkt efter du skrev typ. Men verkar som jag inte fattade hur man skulle lämna på canvas. Aja fixat nu så rätt när du kan tack.

Kmom03
-------------------------


Här är redovisningstexten

Har du tidigare erfarenheter av att skriva kod som testar annan kod?
Ja vi gjorde det i en tidigare kurs OOpython. Det funkade på typ samma sätt. Det är rätt enkelt att testa men jag antar det kan bli lite mer avancerat.

Hur ser du på begreppen enhetstestning och att skriva testbar kod?
Jobbigt men väldigt nyttigt när man jobbar med större projekt. Det kan vara bra som en lite check att göra ett test på varje funktion man gör bara för att man ska veta den göra vad man vill och inget annat.

Förklara kort begreppen white/grey/black box testing samt positiva och negativa tester, med dina egna ord.
White box testing handlar om att testa det i application och inte det på utsidan.  Handlar mer om att man testar mekaniken in ifrån.

Black box testing är som sagt testa från utsidan. Från personen som använder application.

Gray box är mer en mix av både white box och black box testing. Används mest för att hitta defekter. Jag tror dettta är den bättre delen av testnings för den testar för båda och inte bara en.

Positiva tester är ju att man kör de som man har tänkt sig de ska funka medans negativa är när man kör de som man inte tänkt sig de ska funka. Det är lite som man försöker krascha programmet.

Berätta om hur du löste uppgiften med Tärningsspelet 100, hur du tänkte, planerade och utförde uppgiften samt hur du organiserade din kod?
Jag jobbade först me uml för att tänka ut hur jag skulle göra koden. Det var lite annorlunda för mig för jag hade missat att göra tärningsspelet på kmom02 i uppgifterna. Så jag hade redan börjat jobba på kmom utan det. Så som sagt började med UML fundera på hur jag skulle göra. Jag känner att jag kunde gjort det bättre men man är så förbaskat dålig på att planera koden.

Game är huvudklassen man kan säga det är hjärnan i det hela. Det är den som ger order om hur spelet ska spelas.

Hand är precis som det låter en hand som kan rulla träningar och hålla ett antal träningar.

Computer är bara en klass som använder hand som extension. För att rulla träningar och så automatiskt.

Jag är rätt säker på jag hade kunnat skippa Computer och bara köra två händer sedan två knappar en för computer och en för spelare. Men jag valde den lite mer knepiga vägen.  

Dice fungerar nästan som en node. Det är inte mycket den gör förutom håller nummer.

Spelet fungerar så här. Du startar upp det genom att gå till sök vägen dice/hand.

Du kommer till en sida där det står Player 0 och Computer 0.

Första tränings rullningen kommer vara för vem som börjar. Du trycker på start för att rulla träningen och även för att sedan gå vidare till själva spelet.

Sen fungerar det så att du kör med 6 tärningar. Det var bara något jag föredrog över 1 träning. Det finns inte direkt så du kan välja eftersom jag inte hade tiden.

Det är försten till hundra i total som vinner.

Glöm inte save dina rullningar.

Hur väl lyckades du testa tärningsspelet 100?
Lyckades inte testa det så väl hade inte tiden gjorde ganska slarvigt när jag testade eftersom jag hade ont om tid. Så det blev ingen bra kodtäckning.

Vilken är din TIL för detta kmom?
Lägg mindre tid på städa i koden så man hinner med kursmomenten.


Kmom04
-------------------------


me-sida (Länkar till en externa sida.)Länkar till en externa sida.





Vilka är dina tankar och funderingar kring trait och interface?

Jag känner att trait kan vara väldigt bra när man behöver en extra klass kan man säga eller något liknande till en. Det är bra just för att man inte kan extends på dubbla klasser. Interface kan säkert vara bra men jag känner inte direkt någon större mening med det. Det känns mer som en referensklass som refererar till funktioner.

Hur gick det att skapa intelligensen och taktiken till tärningsspelet, hur gjorde du?
Jag körde mest på att min dator rullar igen om den tidigare tärningsslag var mindre än spelarens.  Det verkar funka rätt bra med näst minst risk att få noll men en väldigt stor chans att öka sitt tärnings slag.

Några reflektioner från att integrera hårdare in i ramverkets klasser och struktur?
Mja jag tycker det är rätt enkelt men jag känner det kan vara jobbigt ibland att leta genom dokumentationen. Det är även ett minus att man inte vet djupet av koden i anax. Jag vet fortfarande inte varför man skapar $di direkt men jag förstår lite hur den fungerar eftersom jag fick leta och försöka förstå den för att få min $app->session att funka.

Berätta hur väl du lyckades med make test inuti ramverket och hur väl du lyckades att testa din kod med enhetstester och vilken kodtäckning du fick.
91% kunde fått mer men ville inte lägga mer tid på att testa histogram/histogram trait.

Det var även lite svårt att fatta hur jag skulle testa klasser i interface eftersom de heter samma som i en klass och de blir lätt att de ignorerar interface funktionen när den rättar.

Vilken är din TIL för detta kmom?
Mitt TIL kom till när jag höll på göra tester. Jag hade byggt mitt spel så att klassen game tog emot $app för att fungera och spara kod. Jag insåg rätt fort detta blev ett problem när jag satt och testade för jag kunde inte få $app att funka i test. Det var då jag lärde mig att man kan köra med dubbla namespaces genom att sätta ett namespace på use ungefär som ett trait. Det låter mig låna klasser från just det namespacet


Kmom05
-------------------------

Här är redovisningstexten

KMOM05

•	Några reflektioner kring koden i övningen för PHP PDO och MySQL?
Jag känner igen koden. Jag är inte hundra men tror jag känner igen det just ifrån HTML/php kursen. Jag tycker det är lätt att jobba med PDO. Jag föredrar att bygga upp min funktion för databasen i just atom istället för att skapade i workbench. Det känns som man får mer kontroll men samtidigt skulle jag spara massa kod genom att göra allt i workbench istället.
•	PDO har massa med funktioner som underlättar jobbet med just databaser. Det är även väldigt enkelt att förstå och använda överlag.  
•	Hur gick det att överföra koden in i ramverket, stötte du på några utmaningar?
Nej jag kan inte säga direkt jag stötte på några större utmaningar utan det kanske var mer att jag gjorde lite slav fel som kostade lite tid annars var detta en väldigt enkel del av kursen. Jag tror vi har fått en väldigt stadig grund från tidigare kursen för att jobba med databaser. Jag känner mig väldigt bekväm att jobba med php och databaser.
•	Berätta om din slutprodukt för filmdatabasen, gjorde du endast basfunktionaliteten eller lade du till extra features och hur tänkte du till kring användarvänligheten och din kodstruktur?
Nej jag har inte direkt gjort några extra uppgifter eller lagt extra tid. Jag gjorde det så enkelt som möjligt för en användare. Man har ett litet sök bar högst upp och man har delete, read, update på varje rad där man har en film. Jag vet inte direkt hur jag börjad jobba på denna konstruktionen det var bara det som kändes rätt.
Jag delade även upp koden på olika php sidor i view just för att det skulle vara lite lättare att läsa och koda i.
Jag hade funderingar kring att bygga upp objekt runt de olika funktionerna jag hade för att jobba med databasen och överföra informationen till view sidorna.
•	Vilken är din TIL för detta kmom?
Inte större direkt det var mer att jag lärde mig hur man loggade in på blu-ray servern och hur man fixade med config för databas både lokalt och på servern.




Kmom06
-------------------------

Här är redovisningstexten



Kmom07-10
-------------------------

Här är redovisningstexten
