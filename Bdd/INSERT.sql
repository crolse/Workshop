/* -----------------------------------------------------------------------------
      TABLE : ROLE
----------------------------------------------------------------------------- */
INSERT INTO ROLE VALUES ('1', 'Admin');
INSERT INTO ROLE VALUES ('2', 'Mod�rateur');
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
INSERT INTO TOPIC VALUES ('1', 'Les d�couvertes scientifiques de demain se feront-elles encore � Nantes ?', 'La recherche, si essentielle � Nantes, est fragile. Le co�t comme la raret� du foncier disponible rend difficile d�implanter de nouveaux laboratoires, de faire de la place � de nouveaux instituts et � de jeunes �quipes de recherche.', '2020/11/02', '5', '1');
INSERT INTO TOPIC VALUES ('2', 'Que fait Nnates pour me prot�ger des canicules ?', 'Il fait de plus en plus chaud � Nantes. L��t�, les �pisodes de canicule sont plus nombreux, longs et pr�coces. C�est encore plus difficile � supporter en ville o� la pierre et le b�ton renforcent la chaleur (c�est ce que les sp�cialistes appellent les � �lots de chaleur urbains �). Les canicules, c�est tr�s d�sagr�able pour tout le monde et dangereux pour la sant� des plus vuln�rables. Depuis 2014, nous agissons pour permettre � toutes et tous de se rafra�chir pendant ces p�riodes de fortes chaleurs.', '2020/07/01', '0', '2');

/* -----------------------------------------------------------------------------
      TABLE : COMMENTAIRES
----------------------------------------------------------------------------- */
INSERT INTO COMMENTAIRES VALUES ('1', 'sympa comme id�e!', '2020/11/02', '1', '5');
INSERT INTO COMMENTAIRES VALUES ('2', 'pas mal', '2020/08/01', '2', '4');
