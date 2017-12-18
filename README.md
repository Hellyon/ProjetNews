# ProjetNews

Site internet affichant des news récupérées grâce à des flux RSS.
Structure de Tables de la base de données :
Admin {
    pseudo_admin VARCHAR(16) PRIMARY KEY,
    mdp VARCHAR(20) NOT NULL, // A sécuriser
}
News {
    url VARCHAR(200) PRIMARY KEY,
    titre VARCHAR(200) NOT NULL // si pas de titre titre = url
    date DATE NOT NULL, // date de mise en ligne de la news
    pays CHAR(2) NOT NULL, // code du pays exemple France = FR
    miniature VARCHAR(20) NOT NULL, miniature du site (simplement le nom du fichier _A modifier)
    site VARCHAR(50) NOT NULL // site publiant la news
}
    