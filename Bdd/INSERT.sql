/* -----------------------------------------------------------------------------
      TABLE : ROLE
----------------------------------------------------------------------------- */
INSERT INTO ROLE VALUES ('1', 'Admin');
INSERT INTO ROLE VALUES ('2', 'Modérateur');
INSERT INTO ROLE VALUES ('3', 'Utilisateur');

/* -----------------------------------------------------------------------------
      TABLE : PERSONNES
----------------------------------------------------------------------------- */
INSERT INTO PERSONNES VALUES ('1', 'Bellefeuille', 'Rachelle', 'rachelle@gmail.com', '123', '1');
INSERT INTO PERSONNES VALUES ('2', 'Gervais', 'Isaac', 'isaac@gmail.com', '456', '2');
INSERT INTO PERSONNES VALUES ('3', 'Poulin', 'Mason', 'mason@gmail.com', '789', '3');
INSERT INTO PERSONNES VALUES ('4', 'Marcoux', 'Guerin', 'mason@gmail.com', '147', '3');
INSERT INTO PERSONNES VALUES ('5', 'Duval', 'Odette', 'mason@gmail.com', '258', '3');


/* -----------------------------------------------------------------------------
      TABLE : TOPIC
----------------------------------------------------------------------------- */
INSERT INTO TOPIC VALUES ('1', 'Les découvertes scientifiques de demain se feront-elles encore à Nantes ?', 'La recherche, si essentielle à Nantes, est fragile. Le coût comme la rareté du foncier disponible rend difficile d’implanter de nouveaux laboratoires, de faire de la place à de nouveaux instituts et à de jeunes équipes de recherche.', '2020/11/02', '5', '1');
INSERT INTO TOPIC VALUES ('2', 'Que fait Nnates pour me protéger des canicules ?', 'Il fait de plus en plus chaud à Nantes. L’été, les épisodes de canicule sont plus nombreux, longs et précoces. C’est encore plus difficile à supporter en ville où la pierre et le béton renforcent la chaleur (c’est ce que les spécialistes appellent les « îlots de chaleur urbains »). Les canicules, c’est très désagréable pour tout le monde et dangereux pour la santé des plus vulnérables. Depuis 2014, nous agissons pour permettre à toutes et tous de se rafraîchir pendant ces périodes de fortes chaleurs.', '2020/07/01', '0', '2');

/* -----------------------------------------------------------------------------
      TABLE : COMMENTAIRES
----------------------------------------------------------------------------- */
INSERT INTO COMMENTAIRES VALUES ('1', 'sympa comme idée!', '2020/11/02', '1', '5');
INSERT INTO COMMENTAIRES VALUES ('2', 'pas mal', '2020/08/01', '2', '4');
