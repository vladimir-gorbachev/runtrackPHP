SELECT étage.nom AS étage_nom, salles.nom 
AS "Biggest Room", salles.capacite_etage 
AS capacite FROM salles JOIN étage ON salles.id_etage = étage.id 
ORDER BY salles.capacite_etage DESC LIMIT 1;