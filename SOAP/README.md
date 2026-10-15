
Ce répertoire contient la partie SOAP réalisée dans le cadre de la SAÉ "Du code au déploiement".

Le SOAP (Simple Object Access Protocol) est un protocole de messagerie qui permet à deux 
applications écrites dans des langages différents (par exemple une en Java et une autre en Python) de communiquer entre elles via un standard normalisé basé sur le XML. Ce protocole
assure l'interopérabilité entre les applications. Pour effectuer certains tests, SOAPUI est notamment utilisé.

Dans le BACKEND, les fichiers Python font appel à @rpc. Cette signature transforme une méthode Python en opération SOAP. Il explicite les types des paramètres et ce qui est renvoyé par la méthode.
Chaque méthode prend obligatoirement ctx en paramètre, fourni directement par Spyne.