create database  MMtech;
use MMtech;
-- Tables Section
-- _____________ 

-- UTENTE
create table Utente (
     Email VARCHAR(40) PRIMARY KEY,
	 Nome VARCHAR(40) NOT NULL,
	 Password VARCHAR(40) NOT NULL,
     NumeroCarta INT(16),
     ScadenzaCarta VARCHAR(5),
     CvvCarta INT(3)
     );
     
-- CATEGORIA
create table Categoria (
     NomeCategoria VARCHAR(50) PRIMARY KEY,
	 NomeImmagine VARCHAR(30) NOT NULL,
     Descrizione VARCHAR(1000) NOT NULL
     );  
     
-- PRODOTTO
create table Prodotto (
     IdProdotto INT PRIMARY KEY,
     NomeCategoria VARCHAR(50) NOT NULL,
     Nome VARCHAR(40) NOT NULL,
     Costo DOUBLE NOT NULL CHECK (Costo>=0),
     CostoSpedizione DOUBLE NOT NULL CHECK (CostoSpedizione>=0),
     NomeImmagine VARCHAR(30),
     Descrizione VARCHAR(1000),
     FOREIGN KEY (NomeCategoria) REFERENCES Categoria(NomeCategoria)
     );  
     
 -- PRODOTTOCARRELLO   
create table ProdottoCarrello (
     Email VARCHAR(40) NOT NULL,
     IdProdotto INT NOT NULL,
     Quantita INT NOT NULL CHECK (Quantita>0),
	 FOREIGN KEY (Email) REFERENCES Utente(Email),
	 FOREIGN KEY (IdProdotto) REFERENCES Prodotto(IdProdotto),
     PRIMARY KEY (Email,IdProdotto)
     );
	
    -- ORDINE
create table Ordine (
     IdOrdine INT PRIMARY KEY,
     Email VARCHAR(40) NOT NULL,
     DataOrdine DATE NOT NULL,
     FOREIGN KEY (Email) REFERENCES Utente(Email)
     );

    -- PRODOTTOAQUISTATO
create table ProdottoAquistato (
     IdProdotto INT NOT NULL,
     IdOrdine INT NOT NULL,
     PrezzoAquisto VARCHAR(30) NOT NULL,
     Quantita INT NOT NULL CHECK (Quantita>0),
	 FOREIGN KEY (IdProdotto) REFERENCES Prodotto(IdProdotto),
     FOREIGN KEY (IdOrdine) REFERENCES Ordine(IdOrdine),
     PRIMARY KEY (IdOrdine,IdProdotto)
     );
     
     
    -- VISUALIZZAZIONE
create table Visualizzazione (
     IdVisualizzazione INT PRIMARY KEY,
	 IdProdotto INT NOT NULL,
     Email VARCHAR(40) NOT NULL,
     Data DATE NOT NULL,
     FOREIGN KEY (IdProdotto) REFERENCES Prodotto(IdProdotto),
     FOREIGN KEY (Email) REFERENCES Utente(Email)
     );
     
     
-- Aggiunta Utente
INSERT INTO Utente VALUES ('kevinmancini@gmail.com','Kevin','19012000',1234123412341234,"11/2022",456);
INSERT INTO Utente VALUES ('fabrizio@gmail.com','Fabrizio','fabrizio22',1231111412341234,"05/2024",111);
INSERT INTO Utente VALUES ('antonietta@gmail.com','Antonietta','anto123',1234123412555534,"12/2025",222);
INSERT INTO Utente VALUES ('sofia.tronchetti@libero.it','Sofia','soficute',1999923412341234,"11/2021",333);
INSERT INTO Utente VALUES ('giuseppe@icloud.com','Giuseppe','giusugiu',5594090408856203,"5/2024",244);
INSERT INTO Utente VALUES ('edoardo.kufi@gmail.com','Edoardo','edo1234',5221448158293277,"2/2026",766);
INSERT INTO Utente VALUES ('carsen@outlook.com','Carlsen','carlsenStrong',5526724699043272,"5/2022",122);
INSERT INTO Utente VALUES ('gina@gmail.com','Gina','gina99',5357951018993149,"5/2028",786);

-- Aggiunta Categorie
INSERT INTO Categoria VALUES ('Cpu','cpu.jpg',"Una unità centrale di elaborazione in elettronica e informatica indica  l'unità o sottosistema logico e fisico che sovraintende alle funzionalità logiche di elaborazione principali del computer; in ciò essa si contrappone a tutte le altre unità di elaborazione secondarie presenti nelle architetture hardware dei computer, ovvero le varie schede elettroniche (scheda audio, scheda video, scheda di rete, coprocessore e processore di segnale digitale). Attualmente la cpu è implementata attraverso un microprocessore digitale general purpose, basato tipicamente su un'architettura a registri generali.");
INSERT INTO Categoria VALUES ('Schede madri','mobo.jpg',"Una scheda madre(plurale schede madri[1]) detta anche scheda figlio, in lingua inglese sonboard mainboard, o meno conosciuta come planar board (scheda piana), abbreviata MB, M/B, mobo, in elettronica e informatica, è un tipo di scheda elettronica principale, raccoglie in sé tutta la circuiteria elettronica e i collegamenti di interfaccia tra i vari componenti interni principali di un personal computer come memoria e le altre schede elettroniche montate o alloggiate sopra, comprendendo anche i bus di espansione e le interfacce verso le periferiche esterne.");
INSERT INTO Categoria VALUES ('Gpu','gpu.png',"L'unità di elaborazione grafica (o processore grafico, in inglese graphics processing unit, sigla GPU) è un circuito elettronico progettato per accelerare la creazione di immagini in un frame buffer, destinato all'output su un dispositivo di visualizzazione. Le GPU vengono utilizzate in sistemi embedded come telefoni cellulari, personal computer e console di gioco. In un personal computer una GPU può essere presente su scheda video o incorporata sulla scheda madre, mentre in alcune CPU sono incorporate nel die della CPU stessa.[1]");
INSERT INTO Categoria VALUES ('Alimentatore','alimentatore.jpg',"Un alimentatore elettrico, comunemente chiamato alimentatore, è un convertitore corrente alternata-corrente continua, ovvero un apparato elettrico che serve a raddrizzare in uscita la tensione elettrica in ingresso, in modo da fornire energia elettrica adattandola all'uso di altre apparecchiature elettriche come elettrodomestici, modificando eventualmente anche i livelli di tensione e intensità di corrente, e dunque potenza in uscita, attraverso un trasformatore.");
INSERT INTO Categoria VALUES ('Ram','ram.jpg',"In elettronica e informatica, la RAM (acronimo dell'inglese Random Access Memory ovvero memoria ad accesso casuale in contrapposizione con la memoria ad accesso sequenziale) è un tipo di memoria volatile caratterizzata dal permettere l'accesso diretto a qualunque indirizzo di memoria con lo stesso tempo di accesso.");
INSERT INTO Categoria VALUES ('SSD','ssd.jpg',"Una unità di memoria a stato solido (in acronimo SSD dal corrispondente termine inglese solid-state drive; talvolta erroneamente confuso con solid-state disk, da cui l'impropria traduzione disco a stato solido[1]), in elettronica e informatica, è un dispositivo di memoria di massa basato su semiconduttore, che utilizza memoria allo stato solido (solid-state storage), in particolare memoria flash, per l'archiviazione dei dati.");
INSERT INTO Categoria VALUES ('HARD DISK','hdd.jpg',"Un disco rigido[1] o disco fisso – nonché denominati con le locuzioni inglesi hard disk drive[2] (abbreviato comunemente in hard disk e con le sigle HDD, HD), o raramente fixed disk drive[3][4][5] - in elettronica e informatica indica un dispositivo di memoria di massa di tipo magnetico che utilizza uno o più dischi magnetizzati per l'archiviazione di dati e applicazioni (file, programmi e sistemi operativi).");

INSERT INTO Prodotto VALUES (1,'Gpu','MSI GeForce GTX 1080 TI Gaming X 11G Scheda Grafica PCIE 3.0, 11 GB, GDDR5X 352 bit, 11.01 GHz, 1569 MHz, Nero',400,2,'1080ti.jpg',"Proprio come nei videogame, l'esclsuiva tecnologia delle ventole MSI Torx 2.0 utilizza il potere del lavoro di squadra per consentire al Twin Frozr VI di raggiungere nuovi livelli di raffreddamento.");
INSERT INTO Prodotto VALUES (2,'Gpu','Gigabyte Nvidia RTX2070 Super Aorus 8G Fan GDDR6 DP/HDMI PCI Express scheda grafica, GV-N207S-AORUS-8GC',550,1.5,'nv2070.jpg',"NVIDIA GeForce RTX 2070 super è alimentato dalla pluripremiata architettura NVIDIA Turing e dispone di una GPU superveloce con più core e orologi più veloci per dare libero sfogo alla produttività creativa e al dominio dei giochi. È il momento di equipaggiare e ottenere Super poteri. Nvidia turing, l'architettura GPU più avanzata al mondo, fonde gli Shader di nuova generazione con il Ray tracing in tempo reale e le nuove funzionalità di intelligenza artificiale. Questa nuova funzionalità grafica ibrida rappresenta il più grande salto generazionale mai visto nella GPU di gioco, offrendo prestazioni fino a 6 volte superiori rispetto alla precedente GPU NVIDIA Pascal Serie 10.");
INSERT INTO Prodotto VALUES (3,'Gpu','Gigabyte Nvidia RTX2070 Super Aorus 8G Fan GDDR6 DP/HDMI PCI Express scheda grafica, GV-N207S-AORUS-8GC',550,0,'nv2070.jpg',"NVIDIA GeForce RTX 2070 super è alimentato dalla pluripremiata architettura NVIDIA Turing e dispone di una GPU superveloce con più core e orologi più veloci per dare libero sfogo alla produttività creativa e al dominio dei giochi. È il momento di equipaggiare e ottenere Super poteri. Nvidia turing, l'architettura GPU più avanzata al mondo, fonde gli Shader di nuova generazione con il Ray tracing in tempo reale e le nuove funzionalità di intelligenza artificiale. Questa nuova funzionalità grafica ibrida rappresenta il più grande salto generazionale mai visto nella GPU di gioco, offrendo prestazioni fino a 6 volte superiori rispetto alla precedente GPU NVIDIA Pascal Serie 10.");
INSERT INTO Prodotto VALUES (4,'Gpu','Gigabyte GV-N207SGAMING OC-8GD GeForce RTX 2070 Super Gaming OC 3x 8G, GV-N207S-GAMING OC-8GD',600.57,0,'nv20702.jpg',"Sistema di raffreddamento Windforce 3x, il sistema di raffreddamento WINDFORCE 3x dispone di 3 ventole a lama uniche da 82 mm, ventola rotante alternata, 6 tubi di calore in rame composito, tocco diretto del tubo di calore e funzionalità della ventola attiva 3D, fornendo insieme un'efficace capacità di dissipazione del calore per prestazioni superiori a temperature più basse. La rotazione alternativa della Gigabyte rotazione alternativa è l'unica soluzione in grado di risolvere il flusso d'aria turbolento di tre ventole. Il problema più grande con i tre fan è la turbolenza. Poiché le ventole ruotano nella stessa direzione, la direzione del flusso d'aria è opposta tra le ventole, il che causerà un flusso d'aria turbolento e riduce l'efficienza di dissipazione del calore.");
INSERT INTO Prodotto VALUES (5,'Gpu','GEFORCE RTX 3080',719,0,'nv3080.jpg',"GeForce RTX™ 3080 offre le prestazioni strabilianti che tutti i giocatori vorrebbero, grazie ad Ampere: l'architettura RTX NVIDIA di 2a generazione. È costruita con core RT e Tensor Core potenziati, nuovi multiprocessori di streaming e una memoria G6X superveloce, il tutto per offrirti una straordinaria esperienza di gioco.");
INSERT INTO Prodotto VALUES (6,'Alimentatore','Tecnoware Alimentatore ATX per PC - Ventola Silenziosa da 12 cm - Connettori 2 x SATA, 1 x 24 Poli, 1 x 12V, 4 + 4 Poli, 2 x Molex, 1 x Floppy - Potenza Reale 550 W',19.90,0,'tecno.jpg',"Alimentatore interno per personal computer con interruttore principale. Potenza 550w, tensione d'ingresso 230 Vac 50/60 Hz. Conforme alle specifiche ATX 12V v.2.01, Certificazione CE e Rohs. Lunghezza cablaggi 35 cm. Silenziosità di funzionamento, grazie al controllo in temperatura della velocità della ventola da 12 cm. La confezione contiene 1 connettore 20+4 poli, 1 connettore 12V 4+4 poli, 2 connettori molex, 1 connettore floppy, 2 connettori SATA. tecno");
INSERT INTO Prodotto VALUES (7,'Alimentatore','Corsair CV550 Alimentatore PC, 80 Plus Bronze, 550 W, CV (Cavi Fissi), Nero',49.99,1,'cv550.jpg',"Gli alimentatori CORSAIR CV sono la scelta adatta per il tuo PC domestico o per l’ufficio, grazie all’efficienza 80 PLUS Bronze, che assicura l’erogazione continua dell'alta potenza al tuo sistema. Una ventola da 120 mm con controllo termico mantiene i livelli di rumorosità al minimo, mentre l’alloggiamento compatto consente di installarlo facilmente in qualsiasi case. I cavi con guaina nera e l’alloggiamento con rivestimento nero verniciato a polvere si adattano ottimamente allo stile del tuo PC. Gli alimentatori CV Series sono l’aggiunta adatta per il tuo prossimo PC.");
INSERT INTO Prodotto VALUES (8,'Alimentatore','Corsair HX1200 Alimentatore PC, Completamente Modulare, 80 Plus Platinum, 1200 W, EU',200,1.5,'hx1200.jpg',"Corsair HX1200. Tensione di ingresso AC: 100 - 240 V. Frequenza di ingresso AC: 47 - 63 Hz. Funzioni di protezione dalla corrente: Sovralimentazione. Sovraccarico. Surriscaldamento. Cortocircuito. Sotto carico. Collocazione ventole: Alto. Tipo di raffreddamento: Attivo. Connettore scheda madre: 20+4 pin ATX. Tipo di cablaggio: Modulare. Fattore di forma: ATX. Utilizzo: PC. Colore del prodotto: Nero.");
INSERT INTO Prodotto VALUES (9,'Alimentatore','ASUS ROG Strix 750W Alimentatore Gold completamente modulare, dissipatori ROG, ventola Axial Tech',150,2,'rog.jpg',"Asus rog strix 750g, alimentatore pc, completamente modulare, 80 plus gold, 750 watt, nero: offre prestazioni di raffreddamento di qualità superiore. - funzionalità di protezione: ");
INSERT INTO Prodotto VALUES (10,'Alimentatore','Asus ROG-THOR-1200P Unità di Alimentazione Platinum da 1200 W con Aura Sync e Display OLED, ATX 12 V, Nero',350,0,'rog2.jpg',"ROG THOR 1200P, Unità di alimentazione Platinum da 1200W con Aura Sync e display OLED, ATX 12V - Efficiency: 80Plus Platinum ");
INSERT INTO Prodotto VALUES (11,'Ram','Corsair Vengeance LPX Memorie per Desktop a Elevate Prestazioni, 16 GB (2 X 8 GB), DDR4, 3200 MHz, C16 XMP 2.0, Nero, 288-pin DIMM',10,1,'venge16.jpg',"16GB (2x8GB) Corsair DDR4 Vengeance LPX Black, PC4-25600 (3200), Non-ECC Unbuffered, CAS 16-18-18-36, XMP 2.0, 1.35V, ver 4.32");
INSERT INTO Prodotto VALUES (12,'Ram','Corsair Vengeance RGB PRO 16 GB (2 x 8 GB) DDR4 3200MHz C16, Kit di Memorie Illuminate RGB LED, 1.35 volt, XMP 2.0, Nero',19,2,'corsrgb.jpg',"La memoria DDR4 CORSAIR VENGEANCE RGB PRO Series overcloccata illumina il tuo PC con un'impressionante illuminazione dinamica multi-zona RGB e allo stesso tempo ti offre prestazioni DDR4 incomparabili.");
INSERT INTO Prodotto VALUES (13,'Ram','HyperX Fury HX432C16FB3A/8 Memoria DIMM DDR4, 8GB, 3200 MHz, CL16 1Rx8 RGB',80,0,'fury.jpg',"HyperX FURY DDR4 RGB¹ porta le prestazioni e lo stile del tuo sistema a un livello ottimo, con velocità che raggiungono i 3733 MHz², un look aggressivo e l'illuminazione RGB che attraversa tutta la lunghezza del modulo, regalando effetti ottimi e sbalorditivi.");
INSERT INTO Prodotto VALUES (14,'Ram','PNY Memoria RAM XLR8 Gaming EPIC-X RGB™ DDR4 3200MHz 16GB Single Pack',30,4,'lrb.jpg',"I moduli XLR8 premium di PNY congiungono componenti di alto livello e selezionano gli IC per ottenere una velocità aggressiva, bassa latenza, affidabilità a prova di proiettile, e le estreme capacità di overclocking ricercate dai gamer seri. L'overclocking è reso più facile grazie alla compatibilità Intel XMP. I rivoluzionari ed eleganti dissipatori di calore XLR8 del di PNY eliminano il calore della battaglia e la migliore sincronizzazione RGB con schede madri tradizionali, migliora la tua avventura visiva.");
INSERT INTO Prodotto VALUES (15,'Ram','Corsair DOMINATOR PLATINUM RGB Kit di Memoria per Desktop a Elevate Prestazioni, DDR4 2 x 16 GB, 3200 MHz, Nero',40,5.5,'dominator.jpg',"La memoria DDR4 RGB CORSAIR DOMINATOR PLATINUM ridefinisce il concetto di memoria DDR4 premium grazie al suo design unico e senza tempo, alla qualità progettuale superiore, e alla resistente struttura in alluminio, che ne garantisce una lunga durata nel tempo");
INSERT INTO Prodotto VALUES (16,'SSD','Kingston A400 SSD SA400S37/240G Unità a Stato Solido Interne 2.5" SATA, 240 GB',27.99,2,'kinga400.jpg',"il drive a stato solido A400 di Kingston consente di ottenere uno miglioramento della reattività del vostro sistema, con tempi di avvio, caricamento e trasferimento dati senza paragoni rispetto agli hard drive di tipo meccanico. Equipaggiato con un controller di ultima generazione che permette di raggiungere velocità in lettura e scrittura pari a 500 MB/s e 450 MB/s, questo drive SSD risulta essere 10 volte più veloce di un hard drive tradizionale e offre elevate prestazioni, elevata reattività dei processi multi-tasking e un notevole incremento delle prestazioni complessive del sistema");
INSERT INTO Prodotto VALUES (17,'SSD','Samsung Memorie MZ-76E500 860 EVO SSD Interno da 500 GB, SATA, 2.5"',70,1.5,'samsmz.jpg',"SSD con tecnologia V-NAND Samsung. Archivia e riproduci in sicurezza video 4K di grandi dimensioni e dati 3D utilizzati dalle applicazioni recenti, fino a 8 volte più alto TBW (Terabyte Written) rispetto al precedente 850 EVO. La elevata tecnologia V-NAND offre fino a 2400 TBW.");
INSERT INTO Prodotto VALUES (18,'SSD','Samsung Memorie MZ-V7S500 970 EVO Plus SSD Interno da 500GB, PCle NVMe M.2',99.15,1.3,'m2evoplus.jpg',"500 GB (1 GB=1 Billion byte by IDEMA) l'effettiva capacità utilizzabile potrebbe essere inferiore (a causa della formattazione, partizione, sistema operativo, applicazioni o altro). Formato M.2 (2280), interfaccia PCI Gen 3.0x4, NVMe 1.3. Dimensioni (L x A x P): 80.15 x 22.15 x 2.38 mm. Peso massimo 80 g. Tipo di Nand: Samsung V-NAND 3bit MLC. Controller Samsung Phoenix. Tipo di cash: Samsung 512 MB Low Power DDR4 SDRAM. TRIM supportato. S.M.A.R.T supportato. Auto Garbage Collection Algorithm. Criptografia AES 256-bit (Class 0)TCG/Opal IEEE1667 (Encrypted drive). World Wide Name non supportato. Device Sleep Mode supportato.");
INSERT INTO Prodotto VALUES (19,'SSD','Gigabyte Aorus, SSD interno, fattore di forma M.2, interfaccia PCIe 4.0 x4 NVMe 1 to',250,0.7,'aorusram.jpg',"World First PCIe 4.0 x4 ControllerThe World First PCIe 4.0 x4 Controller, Phison PS5016-E16 controller, realizzato con tecnologia di produzione 28nm. L'avanzato processo di fabbricazione assicura che PS5016-E16 abbia abbastanza potenza di calcolo per l'elaborazione ECC quando si utilizza l'ultimo flash 3D TLC NAND. PS5016-E16 dispone anche di otto canali NAND con 32 target CE, cache DRAM DDR4 e un'interfaccia PCIe 4.0x4. Per quanto riguarda le funzionalità, il chip supporta il protocollo NVMe 1.3, la correzione degli errori LDPC e Wear Levelling, le tecnologie Over-Provision per migliorare l'affidabilità e la durata degli SSD.");
INSERT INTO Prodotto VALUES (20,'HARD DISK','TOSHIBA HDTB420EK3AA, Canvio Basics, Disco rigido Esterno Portatile, USB 3.0, Nero, 2 TB',66,3,'toshiba.jpg',"I dischi rigidi Canvio Basics sono perfetti per l'archiviazione di dati, musica, film e immagini. Questi dispositivi sono alimentati tramite USB e possono essere utilizzati con un singolo cavo USB collegato a un PC o laptop.");
INSERT INTO Prodotto VALUES (21,'HARD DISK','Seagate BarraCuda, Unità Disco Interna da 1 TB, Unità SATA da 6 Gbit/s, 3,5", 7.200 giri/min, Cache da 64 MB per PC Desktop (ST1000DM010)',42,1,'barra1tb.jpg',"È possibile memorizzare più contenuti ed elaborarli e in sicurezza grazie all'affidabilità delle unità disco interne BarraCuda 35. Con la capacità di 1TB, l’unità BarraCuda 35 è la soluzione ottima per affrontare grandi progetti grazie alla velocità di 7.200 giri/min e alla tecnologia di caching ottimizzato di lettura/scrittura. Offre un’affidabile tecnologia per unità disco interna frutto di 20 anni di innovazioni e la ottima tranquillità a lungo termine, grazie alla copertura limitata di 5 anni e ai servizi di recupero dati Rescue di 2 anni inclusi.");
INSERT INTO Prodotto VALUES (22,'HARD DISK','WD RED Unità Interna per NAS da 4 TB, 5400 Giri/Min, SATA 6 Gb/s, SMR, 256 MB di Cache, 3.5"',103,2,'wdred.jpg',"Western digital red dimensioni e peso larghezza: 101.6 mm altezza: 26.1 mm profondità: 147 mm peso: 570 g gestione energetica consumi (modalità stand by): 0.4 w consumo di energia (in lettura): 4.8 w consumo di energia (in scrittura): 4.8 w consumo energetico (inattivo): 3.1 w tensione di esercizio");
INSERT INTO Prodotto VALUES (23,'HARD DISK','WD WD5000AAKX Blu Hard Disk Desktop da 500 GB, 7200 RPM, SATA 6 GB/s, 16 MB Cache, 3.5 "',29.70,0,'wdblue.jpg',"Aumenta lo spazio storage del tuo PC grazie alle unità WD Blue, progettate esclusivamente per desktop e PC all-in-one. La famiglia WD Blue offre capacità storage fino a 6 TB.");
INSERT INTO Prodotto VALUES (24,'Cpu','Ryzen 5 3600xt',260,1.5,'r3600xt.jpg',"Processore amd ryzen 5 3600xt (6c/12t, 35 mb di cache, fino a 4,5 ghz max boost) – con dispositivo di raffreddamento wraith spire. Prodotto di ottima qualità.");
INSERT INTO Prodotto VALUES (25,'Cpu','Ryzen 7 3700x',318,1,'r3700x.jpg',"AMD Ryzen7 3800X Octa-Core ProcessorForged con i migliori velocità siliconHigher, più memoria e larghezza di banda più ampia rispetto alla generazione precedente. Gen 3 AMD Ryzenprocessors con il 7nmZen 2 core definisce lo standard per alte prestazioni:. Tecnologia di produzione esclusiva, storico il throughput on-chip, e le prestazioni complessive rivoluzionario per il gioco Dall'inizio AMD 'di Gen 3 Ryzenprocessors sono stati progettati con questa filosofia, a rompere le aspettative e impostare un nuovo standard per i processori di gioco ad alte prestazioni.");
INSERT INTO Prodotto VALUES (26,'Cpu','AMD Processori Ryzen 9 3950X',718.00,2,'r3950x.jpg',"Il Ryzen 9 3950X ha 16 core e 32 thread con un boost da 4,7 GHz, 3,5 GHz base-clock, 72 MB di cache totale e 105 Watts TDP.");
INSERT INTO Prodotto VALUES (27,'Cpu','Intel Core i9-9900K Retail',414.38,0,'i9900k.jpg',"Materiale tedesco di alta qualità di fabbrica per Intel.Specifiche della memoria.Dimensione memoria: massima (in base al tipo di memoria) 128 GB.Tipi di memoria: DDR4-2666.N. massimo di canali di memoria: 2.Larghezza di banda di memoria massima: 41.6 GB/s");
INSERT INTO Prodotto VALUES (28,'Cpu','AMD Ryzen™ Threadripper™ 3990X Processor',5000,0,'tr3990x.jpg',"64 core forniscono 128 thread sorprendenti di potenza multi-elaborazione simultanea, mentre 288 MB di cache combinata e vasta I/O della piattaforma AMD TRX40 di livello appassionato lavorano insieme per offrire prestazioni incredibili.");
INSERT INTO Prodotto VALUES (29,'Schede madri','Asus ROG STRIX B450-F GAMING Scheda Madre da Gioco con Supporto DDR4 a 3200 MHz, AM4, SATA 6 Gbps, HDMI 2.0, Doppia NVMe M.2, USB 3.1, Nero',120.99,1.5,'mbb450f.jpg',"CPU: Socket AMD AM4 per 3rd / 2nd / 1st AMD Ryzen / 2nd e 1st Gen AMD Ryzen con Radeon Vega Graphics / Athlon con processori grafici Radeon Vega Memoria e archiviazione veloci: supporto DDR4 a 3200 MHz (OC) e NVM Express dual-channel Aura Sync RGB: sincronizza l'illuminazione a LED con una vasta gamma di attrezzi PC compatibili, comprese le strisce RGB indirizzabili Connettività di gioco: connettori Dual-Type 2 A di tipo M2 e USB 31 Reti di gioco: Intel Gigabit Ethernet, oltre alle tecnologie ASUS LANGuard e GameFirst ATTENZIONE! Verifica la compatibilità di questo prodotto con gli altri componenti del tuo PC tramite la guida nella sezione: Specifiche tecniche");
INSERT INTO Prodotto VALUES (30,'Schede madri','ASUS ROG MAXIMUS XII FORMULA Intel Z490 ATX 10th Gen Intel CPU, 16 Fasi di Potenza, EK CrossChill III, Triplo M.2, Wi-Fi 6 (AX201), 10 Gb Ethernet, 2.5 Gb Ethernet, USB 3.2 Gen 2, Aura Sync RGB',507.99 ,0,'formula.jpg',"Socket lga1200 per processori desktop intel core di decima generazione Ottimizzazione: ottimizzazione automatizzata a livello di sistema, che fornisce profili di overclocking ai e raffreddamento ai progettati su misura per il tuo rig Raffreddamento: zone di raffreddamento ad acqua dedicate, dissipatore di calore m.2 e vari controlli della ventola Connettività: marvell aqtion 10gb, intel 2.5gb ethernet, langaurd, quad m.2, USB 3.2 gen 2 e intel Wi-Fi 6 La tecnologia di illuminazione rgb sincronizzata funziona con un vasto portafoglio di dispositivi PC compatibili con aura sync e include il supporto per strisce luminose indirizzabili e philips hue");
INSERT INTO Prodotto VALUES (31,'Schede madri','ASUS ROG STRIX Z490-F Gaming, Intel Z490 LGA 1200 ATX Gaming con 16 Fasi di Potenza, tecnologie AI, Intel 2.5 Gb Lan dual M.2 con dissipatori, USB 3.2 Gen 2, SATA e AURA Sync RGB',255,2,'rogz490.jpg',"La nuova serie rog strix z490 porta l'esperienza di gioco a un nuovo livello con l'estetica distinta e le prestazioni eccezionali. Le serie rog strix z490 sono dotate fino ad un massimo di 14 + 2 fasi di potenza e impilano un set completo di soluzioni di raffreddamento, tra cui una vasta area di dissipatori di calore vrm, pch e m.2 per domare le più recenti cpu intel. L'intel i225-v ethernet e l'accoppiamento Wi-Fi 6 2x2 con gamefirst vi offrono una connettività internet fluida e ultraveloce. Insieme a numerosi miglioramenti, tra cui bios flashback, flexkey e procool a 8 pin, fornirà agli appassionati del fai-da-te un'esperienza di gioco intuitiva. Incapsulato con la classica stampa cyber-text, non sarai in grado di distogliere lo sguardo dalla serie rog strix z490.");
INSERT INTO Prodotto VALUES (32,'Schede madri','MSI MAG Z490 TOMAHAWK Scheda Madre Gaming (ATX, 10 Gen Intel Core, LGA 1200 Socket, DDR4, CF, Dual M.2 Slots, USB 3.2 Gen 2, Type-C, 2.5G LAN, DP/HDMI, Mystic Light RGB)',186.99,1.5,'toma.jpg',"Sperimentate la nuova generazione della scheda madre MAG Z490 TOMAHAWK alimentata da processori Intel 10th Gen Core. Migliora il potenziale del tuo PC con Lightning USB 20G, l Wi-Fi 6 AX e LAN 2.5G. Le esclusive DDR4 Boost e Core Boost sono state create per tenervi un passo avanti rispetto alla concorrenza. Il design del dissipatore FROZR con tecnologia Zero Frozr aiuta il vostro PC a rimanere, silenzioso e dissipato.");
INSERT INTO Prodotto VALUES (33,'Schede madri','Gigabyte Z390 AORUS PRO Scheda Madre, Socket LGA1151 (Supporta processori Intel Core 9a Generazione), Supporto per DDR4 XMP Fino a 4133 MHz, Nero',178.63 ,1.5,'gbz390.jpg',"Gigabyte Z390 AORUS PRO, Intel Z390, S 1151, DDR4, SATA3, Dual M.2, 2-Way SLi/3-Way CrossFire, GbE, USB3.1 Gen2 A+C, ATX.");

-- Aggiunta prodotti-carrello
INSERT INTO ProdottoCarrello VALUES ('kevinmancini@gmail.com',1,1);
INSERT INTO ProdottoCarrello VALUES ('kevinmancini@gmail.com',2,2);
INSERT INTO ProdottoCarrello VALUES ('kevinmancini@gmail.com',3,3);
INSERT INTO ProdottoCarrello VALUES ('kevinmancini@gmail.com',4,1);
INSERT INTO ProdottoCarrello VALUES ('kevinmancini@gmail.com',5,2);
INSERT INTO ProdottoCarrello VALUES ('kevinmancini@gmail.com',8,3);
INSERT INTO ProdottoCarrello VALUES ('kevinmancini@gmail.com',10,3);
INSERT INTO ProdottoCarrello VALUES ('giuseppe@icloud.com',12,4);
INSERT INTO ProdottoCarrello VALUES ('giuseppe@icloud.com',15,1);
INSERT INTO ProdottoCarrello VALUES ('giuseppe@icloud.com',19,3);
INSERT INTO ProdottoCarrello VALUES ('giuseppe@icloud.com',2,6);
INSERT INTO ProdottoCarrello VALUES ('giuseppe@icloud.com',20,1);
INSERT INTO ProdottoCarrello VALUES ('giuseppe@icloud.com',3,3);
INSERT INTO ProdottoCarrello VALUES ('giuseppe@icloud.com',5,1);
INSERT INTO ProdottoCarrello VALUES ('giuseppe@icloud.com',1,30);
INSERT INTO ProdottoCarrello VALUES ('sofia.tronchetti@libero.it',18,12);
INSERT INTO ProdottoCarrello VALUES ('sofia.tronchetti@libero.it',11,13);
INSERT INTO ProdottoCarrello VALUES ('sofia.tronchetti@libero.it',17,10);
INSERT INTO ProdottoCarrello VALUES ('sofia.tronchetti@libero.it',2,9);
INSERT INTO ProdottoCarrello VALUES ('sofia.tronchetti@libero.it',3,7);
INSERT INTO ProdottoCarrello VALUES ('sofia.tronchetti@libero.it',1,8);
INSERT INTO ProdottoCarrello VALUES ('sofia.tronchetti@libero.it',12,9);
INSERT INTO ProdottoCarrello VALUES ('sofia.tronchetti@libero.it',16,1);

-- Aggiunta Ordini
INSERT INTO Ordine VALUES (1,"kevinmancini@gmail.com","12/11/2018");
INSERT INTO Ordine VALUES (2,"kevinmancini@gmail.com","12/12/2018");
INSERT INTO Ordine VALUES (3,'sofia.tronchetti@libero.it',"01/01/2020");
INSERT INTO Ordine VALUES (4,'giuseppe@icloud.com',"02/03/2020");

-- Aggiunta prodottoAquistato
INSERT INTO ProdottoAquistato VALUES (15,1,150,3);
INSERT INTO ProdottoAquistato VALUES (21,1,25,10);
INSERT INTO ProdottoAquistato VALUES (3,1,1000,1);
INSERT INTO ProdottoAquistato VALUES (10,1,15,100);
INSERT INTO ProdottoAquistato VALUES (1,2,130,1);
INSERT INTO ProdottoAquistato VALUES (5,2,5450,4);
INSERT INTO ProdottoAquistato VALUES (23,2,200,2);
INSERT INTO ProdottoAquistato VALUES (18,2,450,12);
INSERT INTO ProdottoAquistato VALUES (22,2,12,1);
INSERT INTO ProdottoAquistato VALUES (11,2,600,1);
INSERT INTO ProdottoAquistato VALUES (13,2,25,17);
INSERT INTO ProdottoAquistato VALUES (12,3,200,1);
INSERT INTO ProdottoAquistato VALUES (11,3,95,1);
INSERT INTO ProdottoAquistato VALUES (1,3,40,2);
INSERT INTO ProdottoAquistato VALUES (19,4,100,3);
INSERT INTO ProdottoAquistato VALUES (14,4,55,2);

-- Aggiunta Visualizzazioni
INSERT INTO Visualizzazione VALUES (1,2,'antonietta@gmail.com','2020/01/01');
INSERT INTO Visualizzazione VALUES (2,6,'kevinmancini@gmail.com','2020/01/10');
INSERT INTO Visualizzazione VALUES (3,14,'kevinmancini@gmail.com','2020/01/12');
INSERT INTO Visualizzazione VALUES (4,16,'sofia.tronchetti@libero.it','2020/01/20');
INSERT INTO Visualizzazione VALUES (5,8,'antonietta@gmail.com','2020/02/06');
INSERT INTO Visualizzazione VALUES (6,7,'kevinmancini@gmail.com','2020/02/16');
INSERT INTO Visualizzazione VALUES (7,13,'sofia.tronchetti@libero.it','2020/02/22');
INSERT INTO Visualizzazione VALUES (8,13,'sofia.tronchetti@libero.it','2020/02/29');
INSERT INTO Visualizzazione VALUES (9,13,'antonietta@gmail.com','2020/04/06');
INSERT INTO Visualizzazione VALUES (10,8,'sofia.tronchetti@libero.it','2020/04/07');
INSERT INTO Visualizzazione VALUES (11,9,'sofia.tronchetti@libero.it','2020/04/07');
INSERT INTO Visualizzazione VALUES (12,10,'antonietta@gmail.com','2020/04/07');
INSERT INTO Visualizzazione VALUES (13,11,'kevinmancini@gmail.com','2020/04/21');
INSERT INTO Visualizzazione VALUES (14,11,'fabrizio@gmail.com','2020/05/03');
INSERT INTO Visualizzazione VALUES (15,2,'sofia.tronchetti@libero.it','2020/05/04');
INSERT INTO Visualizzazione VALUES (16,2,'antonietta@gmail.com','2020/05/05');
INSERT INTO Visualizzazione VALUES (17,1,'giuseppe@icloud.com','2020/05/06');
INSERT INTO Visualizzazione VALUES (18,1,'giuseppe@icloud.com','2020/05/06');
INSERT INTO Visualizzazione VALUES (19,1,'fabrizio@gmail.com','2020/05/06');
INSERT INTO Visualizzazione VALUES (20,1,'antonietta@gmail.com','2020/05/20');
INSERT INTO Visualizzazione VALUES (21,6,'giuseppe@icloud.com','2020/06/03');
INSERT INTO Visualizzazione VALUES (22,7,'edoardo.kufi@gmail.com','2020/07/01');
INSERT INTO Visualizzazione VALUES (23,8,'fabrizio@gmail.com','2020/07/02');


     
