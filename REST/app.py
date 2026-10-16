from flask import Flask, jsonify, request

# Créer l'application Flask
app = Flask(__name__)

# Liste d'étudiants (format proche de JSON)
students = [
    {"id":1, "name":"Y", "age":21},
    {"id":2, "name":"S", "age":41},
]

# Racine de l'API pour tester si le serveur fonctionne
@app.route('/')
def home():
    """
    Fonction d'accueil de l'API
    """
    return "Bienvenue dans l'API de gestion des étudiants !"

# Endpoint pour lister l'ensemble des étudiants
@app.route('/students', methods=['GET'])
# Méthode associée à l'endpoint
def liste_students():
    """
    Renvoie le la liste students, transformée en JSON
    """
    return jsonify(students)

# Endpoint pour ajouter un étudiant
@app.route('/students', methods=['POST'])
def add_student():
    new_student=request.get_json()
    # Pour récupérer les données envoyé par le client
    new_student['id']=len(students)+1
    # Attribuer un numéro de manière incrémentable
    students.append(new_student)
    return jsonify(new_student), 201    # on returne 201 pour indiquer que la ressource a été créée

# Endpoint pour récupérer un étudiant par id
@app.route('/students/<int:id>', methods=['GET'])
def get_student(id):
    student = next((s for s in students if s['id']==id), None)
    if student:
        return jsonify(student)
    return jsonify({"erreur":"l'étudiant n'existe pas !"}), 404

# Endpoint pour mettre à jour les informations d'un étudiant
@app.route('/students/<int:id>', methods=['PUT'])
def update_student(id):
    student = next((s for s in students if s['id']==id), None)
    if not student:
        return jsonify({"message":"Etudiant non trouvé !"}), 404
    data=request.get_json()
    student.update(data) # Mise à jour des données
    return jsonify(student)

# Endpoint pour supprimer un étudiant
@app.route('/students/<int:id>', methods=['DELETE'])
def delete_student(id):
    global students
    students = [s for s in students if s['id'] != id]
    return jsonify({"message": "Étudiant supprimé"}), 200

# Force Flask à écouter sur toutes les interfaces (IPv4 + IPv6) :
if __name__ == '__main__':
    app.run(host="0.0.0.0", port=5001, debug=True)