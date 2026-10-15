from spyne import Application, rpc, ServiceBase, Integer, Unicode, Iterable, ComplexModel
from spyne.protocol.soap import Soap11
from spyne.server.wsgi import WsgiApplication
from wsgiref.simple_server import make_server

# Liste d'étudiants en mémoire
students = [
     {"id": 1, "name": "Y", "age": 21},
     {"id": 2, "name": "S", "age": 41},
 ]
 
# Définition d'un type complexe Student
class Student(ComplexModel):
    id = Integer
    name = Unicode
    age = Integer

class StudentService(ServiceBase):

    @rpc(_returns=Iterable(Student))
    def get_all_students(ctx):
        """
        Renvoie tous les étudiants de la liste
        """
        # Convertir le dictionnaire en Student
        return [Student(**s) for s in students]

    @rpc(Integer, _returns=Student)
    def get_student(ctx, id):
        """
        Renvoie un étudiant à partir de son id
        """
        for s in students:
            if s["id"] == id:
                return Student(**s)
        return None

    @rpc(Unicode, Integer)
    def add_student(ctx, nom, a):
        """
        Ajoute un nouvel étudiant
        """
        s_id = max((s["id"] for s in students), default=0) + 1
        etudiant = {"id": s_id, "name": nom, "age": a}
        students.append(etudiant)

    @rpc(Integer)
    def remove_student(ctx, id):
        """
        Supprime un étudiant à partir de son id
        """
        for s in students:
            if s["id"] == id:
                students.remove(s)

    @rpc(Integer, Unicode, Integer)
    def update_student(ctx, id, nom, age):
        """
        Modifie le nom et l'âge d'un étudiant
        """
        for s in students:
            if s["id"] == id:
                s["name"] = nom
                s["age"] = age


# Création de l'application Spyne
application = Application(
    [StudentService],
    tns='spyne.examples.students',
    in_protocol=Soap11(validator='lxml'),
    out_protocol=Soap11()
)

wsgi_app = WsgiApplication(application)

if __name__ == "__main__":
    server = make_server('0.0.0.0', 8000, wsgi_app)
    print("Service SOAP démarré sur http://localhost:8000")
    server.serve_forever()