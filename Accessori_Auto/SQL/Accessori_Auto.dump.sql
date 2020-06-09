USE ACCESSORI_AUTO;

INSERT INTO Automobile VALUES
(1, "Alfa Romeo", "Giulietta", '2016', 5),
(2, "Audi", "Q3", '2019', 5),
(3, "Ferrari", "360", '2002', 3),
(4, "Hyundai", "i30", '2018', 5),
(5, "Opel", "Zafira", '2010', 5);

INSERT INTO Accessorio VALUES
(1, "Baule posteriore", "Comodo baule posteriore dalla capienza di 12L", 3),
(2, "Porta sci", "Porta sci in alluminio facile da montare", 2),
(3, "Tappeti semi custom", "Tappeto su misura di colore nero, facile da pulire", 4),
(4, "Specchietto Race", "Dai un ulteriore tocco di stile al tuo specchietto con questo simpatico accessorio", 1),
(5, "Portabagagli", "Indispensabile per i tuoi lunghi viaggi, facile da montare", 5),


INSERT INTO Magazzino VALUES
(1, "Colosseo", "Roma"),
(2, "Arena", "Verona"),
(3, "Vesuvio", "Napoli");


INSERT INTO Fornitura VALUES
(1, 1, 1340),
(2, 2, 160),
(3, 5, 140),
(2, 4, 1160),
(1, 2, 40),
(3, 4, 63);
