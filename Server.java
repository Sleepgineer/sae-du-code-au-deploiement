// Serveur RMI

import java.rmi.registry.*;

public class Server {
    public static void main(String[] args) throws Exception {
        HiIMPL objet = new HiIMPL();
        LocateRegistry.createRegistry(1099);
        Naming.rebind("rmi://localhost/Hi", objet);
        System.out.println("Le serveur est prêt.");
    };
};
