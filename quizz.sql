-- -----------------------------------------------------------------------------
-- 
-- BusinessQuizz.com
-- Version 4.13
-- 01/02/2014
-- 
-- http://www.businessquizz.com
--
-- Éditeur et fournisseur de contenu depuis 2007. 
--  
-- -----------------------------------------------------------------------------

-- 
-- Structure de la table `businessquizz`
-- 

DROP TABLE IF EXISTS `businessquizz`;
CREATE TABLE IF NOT EXISTS `businessquizz` (
  `quizz_id` mediumint(8) unsigned NOT NULL default '0',
  `categorie` varchar(60) NOT NULL default '',
  `question` varchar(255) NOT NULL default '',
  `prop1` varchar(40) NOT NULL default '',
  `prop2` varchar(40) NOT NULL default '',
  `prop3` varchar(40) NOT NULL default '',
  `prop4` varchar(40) NOT NULL default '',
  `difficulte` varchar(9) NOT NULL default '',
  `anecdote` varchar(100) NOT NULL default '',
  `wiki` varchar(50) NOT NULL default '',
  PRIMARY KEY  (`quizz_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Contenu de la table `businessquizz`
-- 

INSERT INTO `businessquizz` VALUES (1, 'Histoire', 'Au Moyen-Âge, comment appelait-on les villages fortifiés ?', 'Bastide', 'Château fort', 'Rempart', 'Tour', 'Moyen', 'Les plus connues sont celles de Monflanquin, Monpazier, Grenade ou bien encore Libourne.', 'Bastide_(ville)');
INSERT INTO `businessquizz` VALUES (2, 'Films', 'Dans quel film un couple en croisière va-t-il recueillir un naufragé qui va les terrifier ?', 'Calme blanc', 'Tempête en mer', 'Le naufragé', 'Les disparus', 'Moyen', 'Sam Neill a rencontré sa femme, la maquilleuse Noriko Watanabe, sur le tournage du film.', 'Calme_blanc');
INSERT INTO `businessquizz` VALUES (3, 'Acteurs', 'Quel acteur français avait le premier rôle dans le film de Luchino Visconti "Le Guépard" ?', 'Alain Delon', 'Claude Brasseur', 'Jean Gabin', 'Jean-Paul Belmondo', 'Moyen', 'Le film décrit la chute de l''aristocratie italienne, dont la scène du bal donne la clé.', 'Le_Guépard_(film,_1963)');
INSERT INTO `businessquizz` VALUES (4, 'Films', 'Quel film à succès a réuni sur les écrans Sean Connery et Christophe Lambert ?', 'Highlander', 'Subway', 'Mad Max', 'Greystoke', 'Facile', '"A Kind of Magic" de Queen inclut 6 titres du film "Highlander".', 'Highlander');
INSERT INTO `businessquizz` VALUES (5, 'Nature', 'Comment appelle-t-on le fruit du plaqueminier ?', 'Kaki', 'Kacha', 'Kali', 'Kakou', 'Difficile', 'Originaire de Chine, le kaki est principalement cultivé au Japon depuis 1850.', 'Plaqueminier');
INSERT INTO `businessquizz` VALUES (6, 'Religion', 'Qui était le compagnon de saint Paul ?', 'Saint-Luc', 'Saint-Matthieu', 'Saint-Jean', 'Saint-Marc', 'Moyen', 'Saint Paul a marqué le christianisme par son interprétation de l''enseignement de Jésus.', 'Paul_de_Tarse');
INSERT INTO `businessquizz` VALUES (7, 'Films', 'Dans quel film John Travolta incarne-t-il un ange tombé du ciel ?', 'Michael', 'Johnny', 'Sam', 'Jerry', 'Moyen', 'Deux journalistes enquêtent sur un soi-disant vrai ange vivant chez une dame âgée.', 'Michael_(film,_1996)');
INSERT INTO `businessquizz` VALUES (8, 'Culture générale', 'Quel titre de noblesse est immédiatement inférieur à celui de comte ?', 'Vicomte', 'Marquis', 'Duc', 'Archiduc', 'Moyen', '« Vicomte » est une distinction héréditaire à laquelle ne sont attachés aucuns pouvoirs.', 'Vicomte');
INSERT INTO `businessquizz` VALUES (9, 'Films', 'De quelle série de six films un champion de boxe est-il la vedette ?', 'Rocky', 'Ritchie', 'Rambo', 'Randy', 'Facile', 'Le thème est très largement inspiré du combat entre Mohamed Ali et Chuck Wepner.', 'Rocky_(film,_1976)');
INSERT INTO `businessquizz` VALUES (10, 'Capitales', 'Quelle est la capitale de la Nouvelle-Zélande ?', 'Wellington', 'Dublin', 'Sydney', 'Auckland', 'Moyen', 'Wellington fait partie des 12 meilleures villes dans laquelle vivre.', 'Nouvelle-Zélande');
INSERT INTO `businessquizz` VALUES (11, 'Cinéma', 'À quel réalisateur français doit-on le film "Banzaï" ?', 'Claude Zidi', 'Claude Lelouch', 'Claude Chabrol', 'Claude Sautet', 'Moyen', 'Michel Bernardin travaille dans une société d''aide aux voyageurs français à l''étranger.', 'Banzaï_(film)');
INSERT INTO `businessquizz` VALUES (12, 'Films', 'Quel film a réuni sur les écrans Isabelle Adjani et Sharon Stone ?', 'Diabolique', 'Les sorcières', 'Ange et Démon', 'Les ensorceleuses', 'Moyen', 'La femme et la maîtresse d''un professeur s''associent pour planifier son assassinat.', 'Diabolique');
INSERT INTO `businessquizz` VALUES (13, 'Sports', 'Comment est également appelée la « Transat Jacques Vabre » ?', 'Route du café', 'Route du rhum', 'Trophée du rhum', 'Vendée Globe', 'Facile', 'Cette course transatlantique en double se déroule tous les deux ans depuis 1993.', 'Transat_Jacques_Vabre');
INSERT INTO `businessquizz` VALUES (14, 'Informatique', 'Quel nom porte le logiciel de traitement de texte mis au point par Microsoft ?', 'Word', 'Excel', 'PowerPoint', 'Access', 'Facile', 'Microsoft publie d''autres logiciels de ce genre, mais Word en reste la « vedette ».', 'Renard_polaire');
INSERT INTO `businessquizz` VALUES (15, 'Capitales', 'Quel pays a pour capitale Katmandou ?', 'Le Népal', 'Le Tibet', 'La Corée du Sud', 'Le Pakistan', 'Facile', 'C''est la capitale politique et religieuse du Népal ainsi que la plus grande ville.', 'Népal');
INSERT INTO `businessquizz` VALUES (16, 'Cinéma', 'À quel réalisateur français doit-on "Le Corniaud" ou "La Grande Vadrouille" ?', 'Gérard Oury', 'Claude Zidi', 'Patrice Leconte', 'Patrice Lefebvre', 'Facile', 'Gérard Oury a publié sa première autobiographie en 1989 intitulée "Mémoire d''éléphant".', 'Gérard_Oury');
INSERT INTO `businessquizz` VALUES (17, 'Bande originale', 'À quel groupe musical international doit-on la bande originale du film "Flash Gordon" ?', 'Queen', 'Led Zeppelin', 'The Doors', 'Yes', 'Moyen', 'Après cet album, Queen se jurera de ne plus sortir une bande originale de façon brute.', 'Queen');
INSERT INTO `businessquizz` VALUES (18, 'Animaux', 'À quelle classe animale le scorpion appartient-il ?', 'Aux arachnides', 'Aux reptiles', 'Aux insectes', 'Aux mammifères', 'Moyen', 'Ils se distinguent des araignées par l''aiguillon venimeux situé au bout de leur abdomen.', 'Scorpiones');
INSERT INTO `businessquizz` VALUES (19, 'Oiseaux', 'Quel oiseau palmipède a pour particularité de construire un nid flottant ?', 'La grèbe', 'La grèle', 'La grève', 'La grène', 'Difficile', 'La position des pattes par rapport au corps leur a valu le nom de « pieds au derrière ».', 'Grèbe');
INSERT INTO `businessquizz` VALUES (20, 'Séries télé', 'Quelle est la race du chien de Columbo ?', 'Basset', 'Beagle', 'Bichon', 'Barbet', 'Moyen', 'Interrompue en 1978, la série a été ressuscitée en 1989, toujours avec Peter Falk.', 'Columbo');
INSERT INTO `businessquizz` VALUES (21, 'Langue française', 'Dans le langage familier, comment appelle-t-on la dent du petit enfant ?', 'Quenotte', 'Menotte', 'Bouillotte', 'Marmotte', 'Facile', 'Il est particulièrement important de bien se brosser les dents de manière régulière.', 'Quenotte');
INSERT INTO `businessquizz` VALUES (22, 'Peinture', 'Quel peintre, né en 1844, est également appelé « le Douanier » ?', 'Henri Rousseau', 'Pablo Picasso', 'Edgar Degas', 'Salvador Dali', 'Facile', 'Le premier portrait réalisé par le peintre semble être celui de sa première femme.', 'Henri_Rousseau');
INSERT INTO `businessquizz` VALUES (23, 'Musique', 'Dans les années 1980, quel groupe musical a chanté le titre "Shout" ?', 'Tears For Fears', 'Queen', 'Simple Minds', 'U2', 'Facile', 'Roland Orzabal donne ce nom à sa formation en écho au psychothérapeute Arthur Janov.', 'Tears_For_Fears');
INSERT INTO `businessquizz` VALUES (24, 'Culture générale', 'Comment appelle-t-on le versant de la montagne non situé au soleil ?', 'Ubac', 'Adret', 'Etant', 'Ressac', 'Moyen', 'Dans l''hémisphère Nord, l''ubac est généralement la face Nord d''une montagne.', 'Ubac');
INSERT INTO `businessquizz` VALUES (25, 'Divertissement', 'Quelle est la seule valeur à la roulette à porter la couleur verte ?', 'Le zéro', 'Le quarante', 'Le cinquante', 'Le treize', 'Facile', 'À la roulette, chaque joueur mise sur un numéro qu''il espère être tiré.', 'Roulette_(jeu_de_hasard)');
INSERT INTO `businessquizz` VALUES (26, 'Informatique', 'Quelle est la plus petite unité de mémoire utilisable sur un ordinateur ?', 'Le bit', 'Le byte', 'Le giga', 'Le mega', 'Moyen', 'La mémoire est un composant essentiel, présent dans tous les ordinateurs et consoles.', 'Mémoire_informatique');
INSERT INTO `businessquizz` VALUES (27, 'Insectes', 'Quel insecte appelle-t-on aussi « la bête à bon dieu » ?', 'La coccinelle', 'Le scarabée', 'La libellule', 'La luciole', 'Facile', 'Véritable « ogre à pucerons », la coccinelle est un très efficace insecticide naturel.', 'Coccinellidae');
INSERT INTO `businessquizz` VALUES (28, 'Histoire', 'Qui fut le premier européen à arriver aux Philippines ?', 'Magellan', 'Christophe Colomb', 'Vasco de Gama', 'Mauperthuis', 'Difficile', 'Au long de leur histoire, aucune identité culturelle nationale n''est pourtant apparue.', 'Philippines');
INSERT INTO `businessquizz` VALUES (29, 'Séries télé', 'Qui joua le rôle de Donna Martin dans la série télévisée "Beverly Hills 90210" ?', 'Tori Spelling', 'Jenny Garth', 'Tiffany Amber Thiessen', 'Carol Potter', 'Moyen', '90210 est l''un des codes postaux de Beverly Hills.', 'Beverly_Hills_90210');
INSERT INTO `businessquizz` VALUES (30, 'Politique', 'Combien de temps dure le mandat du président des États-Unis ?', '4 ans', '5 ans', '6 ans', '7 ans', 'Facile', 'Le président des États-Unis est élu tous les quatre ans au suffrage universel indirect.', 'Président_des_États-Unis');
INSERT INTO `businessquizz` VALUES (31, 'Sports', 'Dans quel pays se trouve le circuit automobile de Zandvoort ?', 'Les Pays-Bas', 'La Suisse', 'La France', 'La Belgique', 'Moyen', 'Plusieurs accidents fatals sont intervenus dans l''histoire du circuit, en 1970 et 1973.', 'Circuit_de_Zandvoort');
INSERT INTO `businessquizz` VALUES (32, 'Littérature', 'Quel roman George Orwell a-t-il écrit en 1948 ?', '1984', '2001', '2010', '1948', 'Moyen', 'L''œuvre d''Orwell porte la marque de ses engagements et de son expérience personnelle.', 'George_Orwell');
INSERT INTO `businessquizz` VALUES (33, 'Tourisme', 'Dans quelle ville se trouve la fontaine de Trevi ?', 'Rome', 'Venise', 'Seville', 'Barcelone', 'Moyen', 'La fontaine de Trevi est en permanence assaillie de touristes et de photographes.', 'Fontaine_de_Trevi');
INSERT INTO `businessquizz` VALUES (34, 'Culture générale', 'En quoi un nihiliste croit-il ?', 'En rien', 'En tout', 'En lui-même', 'En la chance', 'Moyen', 'Selon Nietzsche, l''état normal du nihilisme est une «manière divine» de penser.', 'Nihilisme');
INSERT INTO `businessquizz` VALUES (35, 'Animaux', 'Avec quel autre animal vit généralement une oie ?', 'Le jars', 'Le canard', 'Le cygne', 'La poule', 'Moyen', 'Le terme jars ne s''applique toutefois qu''aux mâles des oies domestiques.', 'Oie');
INSERT INTO `businessquizz` VALUES (36, 'Animaux', 'Quelle est la plus grande tortue marine connue à ce jour ?', 'La tortue luth', 'La tortue franche', 'La tortue argneuse', 'La tortue ninja', 'Moyen', 'La tortue luth est la plus grande des sept espèces actuelles de tortues marines.', 'Tortue_luth');
INSERT INTO `businessquizz` VALUES (37, 'Cinéma', 'De quelle comédie musicale font partie les Pink Ladies ?', 'Grease', 'Save the Last Dance', 'West Side Story', 'Moulin Rouge', 'Difficile', '"Grease" fut popularisée en 1978 avec John Travolta et Olivia Newton-John.', 'Grease');
INSERT INTO `businessquizz` VALUES (38, 'Animaux', 'Dans quoi vit le rat des moissons ?', 'Dans un nid', 'Dans un antre', 'Dans une tannière', 'Dans un tronc creux', 'Moyen', 'On trouve le rat des moissons dans les champs de céréales comme le blé et l''avoine.', 'Rat_des_moissons');
INSERT INTO `businessquizz` VALUES (39, 'Animaux', 'Quel animal est le plus rapide à terre ?', 'Le guépard', 'Le léopard', 'La panthère noire', 'Le lynx', 'Moyen', 'Taillé pour la course, le guépard a une allure svelte et de longues pattes fines.', 'Guépard');
INSERT INTO `businessquizz` VALUES (40, 'Sciences', 'Avec quoi mesure-t-on la profondeur des océans ?', 'Un sonar', 'Un radar', 'Un compteur Geiger', 'Un sextant', 'Facile', 'Les sonars peuvent être actifs (émission d''un son) ou passifs (écoute des bruits).', 'Sonar');
INSERT INTO `businessquizz` VALUES (41, 'Géographie', 'Où sont situées les plus célèbres falaises de France ?', 'Étretat', 'Nice', 'Brest', 'Saint-Malo', 'Moyen', 'Les falaises sont constituées de calcaire du Crétacé et non pas du Jurassique.', 'Étretat');
INSERT INTO `businessquizz` VALUES (42, 'Anatomie', 'Combien de paires de côtes possède-t-on ?', 'Douze paires', 'Huit paires', 'Dix paires', 'Quatorze paires', 'Moyen', 'Avec le sternum et les vertèbres thoraciques, les côtes forment la cage thoracique.', 'Côte_(anatomie)');
INSERT INTO `businessquizz` VALUES (43, 'Acteurs', 'Qui joue le rôle du nettoyeur dans le film "Nikita" ?', 'Jean Reno', 'Tchéky Karyo', 'Jean-Hugues Anglade', 'Jean-Marc Barr', 'Moyen', '"La Femme Nikita" est une série télévisée qui s''inspire de ce film.', 'Nikita_(film)');
INSERT INTO `businessquizz` VALUES (44, 'Antiquité', 'Quelle capitale actuelle était appelée « Philadelphia » du temps des Romains ?', 'Amman', 'Damas', 'Bagdad', 'Téhéran', 'Difficile', 'Amman est également la plus grande et la plus vieille ville de Jordanie.', 'Amman');
INSERT INTO `businessquizz` VALUES (45, 'Célébrités', 'De qui Warren Beatty est-il le frère ?', 'Shirley MacLaine', 'Elle Macpherson', 'Aline MacMahon', 'Ann-Marie MacDonald', 'Moyen', 'Sportif puis pianiste, Warren Beatty se lancera dans le cinéma dans les années 1960.', 'Warren_Beatty');
INSERT INTO `businessquizz` VALUES (46, 'Anatomie', 'Quel os du squelette humain est le plus long et le plus solide ?', 'Le fémur', 'Le radius', 'Le carpe', 'Le cubitus', 'Facile', 'Grâce à leur structure, les os sont à la fois légers, souples et solides.', 'Os');
INSERT INTO `businessquizz` VALUES (47, 'Cinéma', 'Dans quelles aventures retrouve-t-on les personnages de Loïs et Clark ?', 'Superman', 'Spiderman', 'Batman', 'Hulk', 'Facile', 'Clark Kent et Loïs Lane sont journalistes au Daily Planet.', 'Loïs_et_Clark');
INSERT INTO `businessquizz` VALUES (48, 'Nature', 'Quel arbre est connu pour être le plus grand au monde ?', 'Le séquoia', 'Le chêne', 'Le pin', 'Le hêtre', 'Facile', 'Les séquoias ont joué un grand rôle dans la flore fossile.', 'Séquoia');
INSERT INTO `businessquizz` VALUES (49, 'Nature', 'De quelle plante le nom signifie-t-il « turban » en perse ?', 'La tulipe', 'La digitale', 'La jonquille', 'La renoncule', 'Moyen', 'Les tulipes sont des plantes vivaces bulbeuses à tige longues, dures et solitaires.', 'Tulipe');
INSERT INTO `businessquizz` VALUES (50, 'Cinéma', 'Quel est le prénom de Kate Winslet dans le film "Titanic" de James Cameron ?', 'Rose', 'Liz', 'Carla', 'Jeanne', 'Facile', '"Titanic" est l''un des plus grands succès de l''histoire du cinéma.', 'Titanic_(film,_1997)');
