ce qui marche:
Après création compte et login: rediriger vers le tableau de bord
Après deconnexion: rediriger vers login
dans la page tableau de bord:
- trois liens dans le sidebar à gauche: listes, liens et photos
- le contenu est vide
- chaque liens du sidebar est redirigé vers leur page respective
dans la page listes (listing seulement pas d'ajout):
- insertion données dans la base de données 
- données bien affiché
- recherche fonctionne
- action voir détail fonctionne
dans la page liens (listing seulement pas d'ajout):
- insertion données dans la base de données
- données bien afficher
- action voir détail fonctionne
dans la page photos (listing seulement pas d'ajout)
- insertion données dans base de données
- action voir détail fonctionne
- données bien enregistré
les actions suppressions et editions fonctionnent pour l'utilisateur qui a l'E-mail "challengesh.info@gmail.com"


ce qui ne marche pas:
mot de passe perdu, après inserton adresse E-mail l'erreur suivant est retourner "Cannot send message without a sender address"
page ajout données n'existe pas, juste des pages listings pour les autres utilisateurs

remarque: 
- pour la création il y a un condition dans le code source que seul l'utilisateur qui a l'adresse E-mail "challengesh.info@gmail.com" peut avoir l'option ajout des données dans le front
- l'ajout fonctionne pour l'utilisateur qui a l'E-mail "challengesh.info@gmail.com"
- les listes des données ne sont pas spécifique pour chaque utilisateur c'est dire la page listing liste juste ce qui sont dans la base de donées
- seul l'utilisateur avec l'adresse E-mail "challengesh.info@gmail.com" a les options: supprimer et editer
- problème de source image dans la page photos
- problème affichage des icons action dans la page photos

