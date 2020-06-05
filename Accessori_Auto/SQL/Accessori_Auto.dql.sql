USE ACCESSORI_AUTO;

-- 1) Trova nome e descrizione di tutti gli accessori per le auto a 5 porte

SELECT DISTINCT Nome, Descrizione 
FROM accessorio, automobile
WHERE accessorio.Automobile = automobile.id And automobile.Numero_Porte = 5

-- 2) Trova i magazzini nei quali sono contenuti "Porta sci" per le macchine di casa "Audi"

SELECT DISTINCT magazzino.Nome
FROM magazzino, accessorio, fornitura, automobile
WHERE accessorio.Id = fornitura.AccessorioId AND accessorio.Nome = "Porta sci" 
AND accessorio.Automobile = automobile.id AND automobile.Casa_Automobilistica = "Audi" 
AND fornitura.MagazzinoId = magazzino.Id


