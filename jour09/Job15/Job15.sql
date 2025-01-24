SELECT salles.nom AS nom_salle, étage.nom AS nom_étage 
FROM salles JOIN étages ON salles.étage = étages.id;
